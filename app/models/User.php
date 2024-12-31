<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Add User / Register
  public function register($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO users (name, email,password) 
      VALUES (:name, :email, :password)');

    // Bind Values
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Find USer BY Email
  public function findUserByEmail($email)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    //Check Rows
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  // Login / Authenticate User
  public function login($email, $password)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  // Find User By ID
  public function getUserById($id)
  {
    $this->db->query("SELECT * FROM users WHERE id = :id");
    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  // Update Post
  public function updateProfile($data)
  {
    // Prepare Query
    $this->db->query('UPDATE users SET name = :name, email = :email, phone = :phone, residence = :residence WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $_SESSION['user_id']);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':residence', $data['residence']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Get All User Posts
  public function getPosts()
  {
    $this->db->query("SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC;");
    $this->db->bind(':user_id', $_SESSION['user_id']);
    $results = $this->db->resultset();
    return $results;
  }

  public function getPublic()
  {
    $this->db->query("SELECT * FROM posts WHERE user_id = :user_id AND status = :status ORDER BY created_at DESC;");
    $this->db->bind(':user_id', $_SESSION['user_id']);
    $this->db->bind(':status', 'on');
    $results = $this->db->resultset();
    return $results;
  }

  public function getPrivate()
  {
    $this->db->query("SELECT * FROM posts WHERE user_id = :user_id AND status = :status ORDER BY created_at DESC;");
    $this->db->bind(':user_id', $_SESSION['user_id']);
    $this->db->bind(':status', '');
    $results = $this->db->resultset();
    return $results;
  }
}
