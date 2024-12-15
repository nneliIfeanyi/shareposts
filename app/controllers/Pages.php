<?php
class Pages extends Controller
{
  public function __construct()
  {
    // if (isset($_SESSION['user_id'])) {
    //   redirect('posts');
    // }// If logged in, redirect to posts

  }

  // Load Homepage
  public function index()
  {
    if (isset($_SESSION['user_id'])) {
      redirect('posts');
    }
    //Set Data
    $data = [
      'title' => 'Save For Future Use',
      'description' => 'Simple social app built for storing written treasures for the upcoming..'
    ];

    // Load homepage/index view
    $this->view('pages/index', $data);
  }

  public function about()
  {
    //Set Data
    $data = [
      'version' => '1.0.0'
    ];

    // Load about view
    $this->view('pages/about', $data);
  }
}
