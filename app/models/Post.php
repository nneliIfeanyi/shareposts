<?php
class Post
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Get All Posts
  public function getPosts()
  {
    $this->db->query("SELECT *, 
                        posts.id2 as postId, 
                        users.id as userId
                        FROM posts 
                        INNER JOIN users 
                        ON posts.user_id = users.id
                        WHERE status = :status ORDER BY posts.created_at DESC;");
    $this->db->bind(':status', 'on');
    $results = $this->db->resultset();

    return $results;
  }

  // Get Post By ID
  public function getPostById($id)
  {
    $this->db->query("SELECT * FROM posts WHERE id = :id");

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function getPostById2($id)
  {
    $this->db->query("SELECT * FROM series WHERE id = :id");

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  public function getPostBy_s_id($id)
  {
    $this->db->query("SELECT * FROM series WHERE id = :id");

    $this->db->bind(':id', $id);

    $row = $this->db->single();

    return $row;
  }

  // Add Post
  public function addPost($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO posts (id, title, user_id, s_id, body, day) 
      VALUES (:id, :title, :user_id, :s_id, :body, :day)');

    // Bind Values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':body', $data['body']);
    $this->db->bind(':day', $data['day']);
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':s_id', $data['s_id']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function insertIntoSeries($data)
  {
    // Prepare Query
    $this->db->query('INSERT INTO series (id, title, user_id, s_id, body, day) 
      VALUES (:id, :title, :user_id, :s_id, :body, :day)');

    // Bind Values
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':body', $data['body']);
    $this->db->bind(':day', $data['day']);
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':s_id', $data['s_id']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Update Post
  public function updatePost($data)
  {
    // Prepare Query
    $this->db->query('UPDATE posts SET title = :title, body = :body, edited = :edited WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);
    $this->db->bind(':edited', $data['edited']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function updateSeries($data)
  {
    // Prepare Query
    $this->db->query('UPDATE series SET title = :title, body = :body, edited = :edited WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $data['id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':body', $data['body']);
    $this->db->bind(':edited', $data['edited']);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function publishPost($id)
  {
    // Prepare Query
    $this->db->query('UPDATE posts SET status = :status WHERE id2 = :id');

    // Bind Values
    $this->db->bind(':id', $id);
    $this->db->bind(':status', 'on');
    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function unPublishPost($id)
  {
    // Prepare Query
    $this->db->query('UPDATE posts SET status = :status WHERE id2 = :id');

    // Bind Values
    $this->db->bind(':id', $id);
    $this->db->bind(':status', '');
    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getSeries($s_id)
  {
    $this->db->query("SELECT * FROM series WHERE user_id = :user_id AND s_id = :s_id ;");
    $this->db->bind(':user_id', $_SESSION['user_id']);
    $this->db->bind(':s_id', $s_id);
    $results = $this->db->resultset();
    return $results;
  }

  public function checkIfSeries($s_id)
  {
    $this->db->query("SELECT * FROM series WHERE user_id = :user_id AND s_id = :s_id;");
    $this->db->bind(':user_id', $_SESSION['user_id']);
    $this->db->bind(':s_id', $s_id);
    $this->db->resultset();
    if ($this->db->rowCount() > "1") {
      return $this->db->rowCount();
    } else {
      return false;
    }
  }


  // Delete Post
  public function deleteSeries($id)
  {
    // Prepare Query
    $this->db->query('DELETE FROM series WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $id);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function deletePost($id)
  {
    // Prepare Query
    $this->db->query('DELETE FROM posts WHERE id = :id');

    // Bind Values
    $this->db->bind(':id', $id);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
