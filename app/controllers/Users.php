<?php
class Users extends Controller
{
  public $userModel;
  public $postModel;
  public function __construct()
  {
    if (isset($_COOKIE['user_id'])) {
      redirect('users/login');
    } else {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
    }
    $this->userModel = $this->model('User');
    $this->postModel = $this->model('Post');
  }

  public function index()
  {
    redirect('posts');
  }

  public function register()
  {
    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Validate email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter an email';
        // Validate name
        if (empty($data['name'])) {
          $data['name_err'] = 'Please enter a name';
        }
      } else {
        // Check Email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email is already taken.';
        }
      }

      // Validate password
      if (empty($data['password'])) {
        $password_err = 'Please enter a password.';
      } elseif (strlen($data['password']) < 6) {
        $data['password_err'] = 'Password must have atleast 6 characters.';
      }

      // Validate confirm password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Please confirm password.';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Password do not match.';
        }
      }

      // Make sure errors are empty
      if (empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // SUCCESS - Proceed to insert

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //Execute
        if ($this->userModel->register($data)) {
          // Redirect to login
          flash('register_success', 'You are now registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load View
        $this->view('users/register', $data);
      }
    } else {
      // IF NOT A POST REQUEST

      // Init data
      $data = [
        'name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load View
      $this->view('users/register', $data);
    }
  }

  public function login()
  {
    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Check for email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email.';
      }

      // Check for name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name.';
      }

      // Check for user
      if ($this->userModel->findUserByEmail($data['email'])) {
        // User Found
      } else {
        // No User
        $data['email_err'] = 'This email is not registered.';
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err'])) {

        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // User Authenticated!
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect.';
          // Load View
          $this->view('users/login', $data);
        }
      } else {
        // Load View
        $this->view('users/login', $data);
      }
    } else {
      // If NOT a POST

      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load View
      $this->view('users/login', $data);
    }
  }

  public function profile()
  {
    $user = $this->userModel->getUserById($_SESSION['user_id']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'name' => trim($_POST['name']),
        'email' => trim($_POST['email']),
        'phone' => trim($_POST['phone']),
        'residence' => trim($_POST['residence']),
      ];
      if ($this->userModel->updateProfile($data)) {
        // Redirect to login
        flash('profile_message', 'Profile Updated');
        redirect('users/profile');
      } else {
        die('Something went wrong');
      }
    } else {
      // IF NOT A POST REQUEST
      $data = [
        'user' => $user
      ];

      // Load about view
      $this->view('users/profile', $data);
    }
  }

  public function wall()
  {
    $posts = $this->userModel->getPosts();

    $data = [
      'posts' => $posts
    ];

    $this->view('users/wall', $data);
  }

  public function series($s_id)
  {
    $posts = $this->postModel->getseries($s_id);

    $data = [
      'posts' => $posts
    ];

    $this->view('users/series', $data);
  }

  // Create Session With User Info
  public function createUserSession($user)
  {
    setcookie('user_id', $user->id, time() + (86400 * 365), '/');
    redirect('posts');
  }

  // Logout & Destroy Session
  public function logout()
  {
    $id = $_COOKIE['user_id'];

    setcookie('user_id', $id, time() - 3, '/');
    session_unset();
    session_destroy();
    redirect('users/login');
  }
}
