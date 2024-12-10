<?php
class Process extends Controller
{
    public $postModel;
    public $userModel;
    public function __construct()
    {
        if (!isset($_COOKIE['user_id'])) {
            redirect('users/login');
        } else {
            $_SESSION['user_id'] = $_COOKIE['user_id'];
        }
        // Load Models
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    } // Construct Magic Function Ends

    public function append($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = $this->postModel->getPostBy_s_id($id);
            $data = [
                'id' => substr(md5(time()), 28),
                's_id' => $post->s_id,
                'title' => $post->title,
                'user_id' => $_SESSION['user_id'],
                'day' => date('M d, Y'),
                'ep2' => trim($_POST['ep2']),
                'title_err' => '',
                'body_err' => ''
            ];
            $data['body'] = nl2br($data['ep2']);
            //Execute
            if ($this->postModel->insertIntoSeries($data)) {
                flash('post_added', 'Created Series Titled: ' . $data['title']);
                redirect('users/series/' . $post->s_id);
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('users/wall');
        }
    }
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST

            $data = [
                'id2' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'edited' => date('M d, Y'),
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
                if ($this->postModel->updateSeries($data)) {
                    // Redirect to login
                    flash('post_message', 'Post Updated');
                    redirect('posts/s_edit/' . $id);
                    //redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('posts/edit', $data);
            }
        } else {
            redirect('users/wall');
        }
    }
}