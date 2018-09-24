<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginModel{
  private $db;
  private $dbConnection;
  static private $_instance = NULL;
  private $tblUsers;  
  
  public function __construct(){
      $this->db = Database::getDatabase();
      $this->dbConnection = $this->db->getConnection();
      $this->tblUsers = $this->db->getUsersTable();
        //escapes special characters in a string for use in an SQL statement 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //escapes special characters in a string
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }       
  }
  
  public static function getLoginModel(){
       if (self::$_instance == NULL) {
       self::$_instance = new LoginModel();
        }
      return self::$_instance;
  }
  
  public function list_user($id){
      $sql = "SELECT * FROM " . $this->tblUsers . " WHERE " . $this->tblUsers
              . ".user_id= " . $id;
      
      $query = $this->dbConnection->query($sql);
      
         //if the query failed return false. 
        if (!$query){
            return false;
        }
        //no destination was found.
        if ($query->num_rows == 0){
            return 0;
        }

        if($query && $query->num_rows > 0){
            $obj = $query->fetch_assoc();
            $user = new Login($obj->email, $obj->first_name, $obj->last_name, $obj->birth_date, $obj->username, $obj->password);
            $user->setId($obj->user_id);
            return $user;
        }
  }
  /*
   public function authenticate(){
   if(sesson_start() === PHP_SESSION_NONE){
   session_start();
      }
   $_SESSION['login_status'];
   $_SESSION['login'];
   $_SESSION['name'];
   $sql = "SELECT * FROM " . $this->tblUsers . " WHERE " . $this->tblUsers
              . ".user_id=" . $this->tblUsers . ".user_id";
   $query = $this->dbConnection->query($sql);
   if(($query->num_rows) !== NULL){
   $_SESSION['login_status'] = 1;
      }
   }
   * 
   */
  public function addUser(Login $user){
  $first_name = $user->getFirstName();
   $last_name = $user->getLastName();
   $birth_date = $user->getBirthDate();
   $email = $user->getEmail();
   $username = $user->getUsername();
   $password = $user->getPassword();
     // $user = new Login();
  $sql = "INSERT INTO " . $this->tblUsers . " (`first_name`, `last_name`, `email`, `password`, `username`, `birthdate`) VALUES('$first_name', '$last_name', '$email', '$password', '$username', '$birth_date')";
  
   try{
       $query = $this->dbConnection->query($sql);
       if(!$query){
           $errmsg = $this->dbConnection->error;
           throw new DatabaseException($errmsg);
       }
       return $query;
   }
   catch(DatabaseException $e){
       $error = new LoginError();
       $error->display($e->getMessage());
       return false;
   }
   catch(Exception $e){
       $error = new LoginError();
       $error->display("An unexpected error has occurred.");
       return false;
   }
   
//if()
          
        
  }
  public function validateRole($username, $password){
      $sql = "SELECT * FROM " . $this->tblUsers . " WHERE " . $this->tblUsers . ".first_name='$username'"
              . " AND " . $this->tblUsers . ".password= '$password'";
      Session::create();
      /*
       * Session::create();
       * $sql = "SELECT role FROM " . $this->tblUsers . " WHERE" . ".username='$username'" . " AND ";
       * . $this->tblUsers . ".password='$password'";
       * $query = $this->dbConnection->query($sql);
       * if($query && $query->num_rows > 0){
       * while(($row = $query->fetch_assoc()) !== NULL){
       * $row['role'] = $_SESSION['role'];
       *    }
       * if($_SESSION['role'] == 0){
       *    $_SESSION['user'];
       *    }
       * else if($_SESSION['role'] == 1){
       *    $_SESSION['admin'];
       *    }
       * }
       */
      try{
          $query = $this->dbConnection->query($sql);
          if(!$query){
              throw new DatabaseException("There was an unexpected error with the database.");
          }
          else if(empty($username) || empty($password)){
              throw new DataMissingException("Cannot find username or password");
          }
          else{
              while(($row = $query->fetch_assoc()) !== NULL){
                  //$row['role'] = $_SESSION['role'];
                  $_SESSION['role'] = $row['role'];
              }
          }
      }
      catch(DataMissingException $e){
       $error = new LoginError();
       $error->display($e->getMessage());
        //  $this->error($e->getMessage());
      }
      catch(DataMissingException $e){
       $error = new LoginError();
       $error->display($e->getMessage());
         // $this->error($e->getMessage());
      }
      catch(Exception $e){
       $error = new LoginError();
       $error->display($e->getMessage());
         // $this->error($e->getMessage());
      }
      /*
      $query = $this->dbConnection->query($sql);
      Session::create();
       $_SESSION['login_status'];
      $_SESSION['username'];
      $_SESSION['password'];
      $_SESSION['user_id'];
      if($query && $query->num_rows > 0){
          while(($row = $query->fetch_assoc()) !== NULL) {
                $_SESSION['login_status'] = 1;
       $_SESSION['user_id'] = $row['user_id'];
          }
       $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;
       return true;
          }
          return false;
       * 
       */
      }
  public function authenticateLogin($username, $password){
      $sql = "SELECT * FROM " . $this->tblUsers . " WHERE "
              . $this->tblUsers . ".username='$username'" .
               " AND " . $this->tblUsers . ".password= '$password'";
      
      Session::create();
      $_SESSION['login_status'];
      $_SESSION['username'];
      $_SESSION['password'];
      $_SESSION['user_id'];
     // try{
     //     $query = $this->dbConnection->query($sql);
    // if($query && $query->num_rows > 0){
         
    //      }
    //  }
      
       
      $query = $this->dbConnection->query($sql);
      Session::create();
      $_SESSION['login_status'];
      $_SESSION['username'];
      $_SESSION['password'];
      $_SESSION['user_id'];
      
       if($query && $query->num_rows > 0){
        while(($row = $query->fetch_assoc()) !== NULL){
        $_SESSION['login_status'] = 1;
       $_SESSION['user_id'] = $row['user_id'];
          }
       $_SESSION['username'] = $username;
       $_SESSION['password'] = $password;
       return true;
       }
       return false; 
       /*
*/
          
  }
  
}
