<?php

  class Conn {

    public function connect() {

      $host = 'localhost';

      $uname = 'root';

      $pword = '';

      $db = 'chat_app';

      $dsn = "mysql:host=$host;dbname=$db";

      try {

        $pdo = new PDO($dsn, $uname, $pword);

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        if (!$pdo) {

          echo 'Not Connected';

        }

        return $pdo;

      } catch (PDOException $e) {

        echo $e->getMessage();

      }

    }

    public function validateEmail($email) {

      $query = "SELECT COUNT(email) FROM user WHERE email = :email";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':email' => $email]);

      $row = $stmt->fetchColumn();

      return $row;

    }

    public function insertData($unique_id, $fname, $lname, $email, $pword, $img, $status) {

      $query = "INSERT INTO user (unique_id, fname, lname, email, pword, img, status)
      
                VALUES (:unique_id, :fname, :lname, :email, :pword, :img, :status)";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':unique_id' => $unique_id,
        
                      ':fname' => $fname, 
      
                      ':lname' => $lname,
                      
                      ':email' => $email,
                      
                      ':pword' => $pword,
                      
                      ':img' => $img,
                      
                      ':status' => $status]);

      return $stmt;

    }

    public function getUserCred($email, $pword) {

      $query = "SELECT COUNT(*) FROM user WHERE email = :email AND pword = :pword";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':email' => $email, ':pword' => $pword]);

      $row = $stmt->fetchColumn();

      return $row;

    }

    public function getUserId($email, $pword) {

      $query = "SELECT * FROM user WHERE email = :email AND pword = :pword";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':email' => $email, ':pword' => $pword]);

      return $stmt;

    }

    public function getUser($id) {

      $query = "SELECT * FROM user WHERE unique_id = :unique_id";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':unique_id' => $id]);

      return $stmt;

    }

    public function getAllUsers($id) {

      $query = "SELECT * FROM user WHERE NOT unique_id = :unique_id";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':unique_id' => $id]);

      return $stmt;

    }

    public function searchUser($id, $term) {

      $query = "SELECT * FROM user WHERE NOT unique_id = :unique_id AND  (fname LIKE :term OR lname LIKE :term)";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':unique_id' => $id, ':term' => '%'.$term.'%']);

      return $stmt;

    }

    public function getReceiver($id) {

      $query = "SELECT * FROM user WHERE unique_id = :unique_id";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':unique_id' => $id]);

      return $stmt;

    }

    public function insertChat($sender_id, $receiver_id, $message) {

      $query = "INSERT INTO messages (sender_id, receiver_id, msg)VALUES(:sender_id, :receiver_id, :msg)";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':sender_id' => $sender_id, ':receiver_id' => $receiver_id, ':msg' => $message]);

      return $stmt;

    }

    public function getChat($sender_id, $receiver_id) {

      $query = "SELECT * FROM messages LEFT JOIN user ON user.unique_id = messages.receiver_id WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id) ORDER BY msg_id";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':sender_id' => $sender_id, ':receiver_id' => $receiver_id]);

      return $stmt;

    }

    public function getLastChat($sender_id, $receiver_id) {

      $query = "SELECT * FROM messages WHERE (sender_id = :sender_id AND receiver_id = :receiver_id) OR (sender_id = :receiver_id AND receiver_id = :sender_id) ORDER BY msg_id DESC LIMIT 1";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':sender_id' => $sender_id, ':receiver_id' => $receiver_id]);

      return $stmt;

    }

    public function onlineStatus($id) {

      $query = "UPDATE user SET status = 'Active now' WHERE unique_id = :unique_id ";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':unique_id' => $id]);

      return $stmt;

    }

    public function offlineStatus($id) {

      $query = "UPDATE user SET status = 'Offline now' WHERE unique_id = :unique_id ";

      $stmt = $this->connect()->prepare($query);

      $stmt->execute([':unique_id' => $id]);

      return $stmt;

    }

  }

?>