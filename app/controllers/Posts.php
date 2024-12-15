<?php
class Posts extends Controller
{
  public $postModel;
  public $userModel;
  public function __construct()
  {
    if (isset($_COOKIE['user_id'])) {
      redirect('users/login');
    } else {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
    }
    // Load Models
    $this->postModel = $this->model('Post');
    $this->userModel = $this->model('User');
  }

  // Load All Posts
  public function index()
  {
    $posts = $this->postModel->getPosts();

    $data = [
      'posts' => $posts
    ];

    $this->view('posts/index', $data);
  }

  // Show Single Post
  public function show($id)
  {
    $post = $this->postModel->getPostById($id);
    $user = $this->userModel->getUserById($post->user_id);

    $data = [
      'post' => $post,
      'user' => $user
    ];

    $this->view('posts/show', $data);
  }

  // Add Post
  public function add()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'id' => substr(md5(time()), 28),
        's_id' => substr(md5(time()), 22),
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'day' => date('M d, Y'),
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate email
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter name';
        // Validate name
        if (empty($data['body'])) {
          $data['body_err'] = 'Please enter the post body';
        }
      }

      // Make sure there are no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validation passed
        $data['body'] = nl2br($data['body']);
        //Execute
        if ($this->postModel->addPost($data)) {
          $this->postModel->insertIntoSeries($data);
          // Redirect to login
          flash('post_added', 'Post Added');
          redirect('posts/append/' . $data['id']);
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/add', $data);
      }
    } else {
      $data = [
        'title' => '',
        'body' => '',
      ];

      $this->view('posts/add', $data);
    }
  }


  public function append($id)
  {
    $post = $this->postModel->getPostBy_s_id($id);
    $posts = $this->postModel->getseries($post->s_id);
    //Set Data
    $data = [
      's_id' => $id,
      'post' => $post,
      'body' => '',
      'posts' => $posts
    ];

    // Load about view
    $this->view('posts/append', $data);
  }

  // Edit Post
  public function edit($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $post = $this->postModel->getPostById($id);
      $data = [
        'id' => $id,
        's_id' => $post->s_id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'user_id' => $_SESSION['user_id'],
        'edited' => date('M d, Y'),
        'title_err' => '',
        'body_err' => ''
      ];

      // Validate email
      if (empty($data['title'])) {
        $data['title_err'] = 'Please enter Post Title';
        // Validate name
        if (empty($data['body'])) {
          $data['body_err'] = 'Please enter the post body';
        }
      }

      // Make sure there are no errors
      if (empty($data['title_err']) && empty($data['body_err'])) {
        // Validation passed
        $data['body'] = nl2br($data['body']);
        //Execute
        if ($this->postModel->updatePost($data)) {
          // Update twin post from Series table
          $this->postModel->updateSeries($data);
          flash('post_message', 'Post Updated');
          if ($post->title !== $data['title']) {
            $this->postModel->updateByS_id($data);
          }
          redirect('users/wall');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('posts/edit', $data);
      }
    } else {
      // Get post from model
      $post = $this->postModel->getPostById($id);

      // Check for owner
      if ($post->user_id != $_SESSION['user_id']) {
        redirect('posts');
      }

      $data = [
        'id' => $id,
        'title' => $post->title,
        'body' => $post->body,
      ];

      $this->view('posts/edit', $data);
    }
  }
  public function s_edit($id)
  {
    // Get post from model
    $post = $this->postModel->getPostById2($id);

    // Check for owner
    if ($post->user_id != $_SESSION['user_id']) {
      redirect('users/wall');
    }

    $data = [
      'id' => $id,
      'title' => $post->title,
      'body' => $post->body,
      'post' => $post
    ];

    $this->view('posts/s_edit', $data);
  }
  public function status_on($id)
  {
    $this->postModel->publishPost($id);
    flash('post_message', 'Post Published');
    redirect('users/wall');
  }

  public function status_off($id)
  {
    $this->postModel->unPublishPost($id);
    flash('post_message', 'Post Retrieved');
    redirect('users/wall');
  }

  // Delete Post
  public function delete_series($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Execute
      if ($this->postModel->deleteSeries($id)) {
        // Redirect to login
        flash('post_message', 'Post Removed', 'alert alert-danger ');
        redirect('users/series/' . $_POST['s_id']);
      } else {
        die('Something went wrong');
      }
    } else {
      redirect('users/wall');
    }
  }

  public function delete_post($id)
  {
    if ($this->postModel->deletePost($id)) {
      // Redirect to login
      flash('post_message', 'Post Removed', 'alert alert-danger ');
      redirect('users/wall');
    } else {
      redirect('users/wall');
    }
  }
}
