<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginController {

    private $login_model;

    public function __construct() {
        $this->login_model = LoginModel::getLoginModel();
    }

    public function index() {

        $view = new LoginIndex();
        $view->display();
    }

    public function show() {
        $view = new LoginShow();
        $view->display();
    }

    public function sign() {
        if(filter_has_var(INPUT_POST,"username")){
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        }
        if (filter_has_var(INPUT_POST, "first_name")) {
            $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        }
        if (filter_has_var(INPUT_POST, "last_name")) {
            $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_STRING);
        }
        if (filter_has_var(INPUT_POST, "birth_date")) {
            $birth_date = filter_input(INPUT_POST, 'birth_date', FILTER_SANITIZE_STRING);
        }
        if (filter_has_var(INPUT_POST, "email")) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }
        if (filter_has_var(INPUT_POST, "password")) {
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        }
        try{
        if(empty($username) || empty($first_name) || empty($last_name) || empty($birth_date) || empty($email) ||empty($password)){
              throw new DataMissingException("All fields required");  
            }
            else if(!Utilities::validatedate($birth_date)){
                throw new DateException("You have entered an invalid birthdate");
            }
            else if(!Utilities::checkemail($email)){
                throw new EmailException("You have entered an invalid email");
            }
            //else if(Utilities::){}
            else{
         $user = new Login($email, $first_name, $last_name, $birth_date, $username, $password);
         $user_model = new LoginModel();
         $user_model->addUser($user);
         $view = new LoginSign();
         $view->display();
            }
        }
        catch(DataMissingException $e){
            $this->error($e->getMessage());
        }
        catch(DateException $e){
            $this->error($e->getMessage());
        }
        catch(EmailException $e){
            $this->error($e->getMessage());
        }
        catch(Exception $e){
            $this->error($this->getMessage());
        }
        //$userContent = array($first_name, $last_name, $birth_date, $email);
       // $user = new Login($email, $first_name, $last_name, $birth_date, $username, $password);
        //  echo $user::getEmail();
        // $user_model = new LoginModel();
        // $user_model->addUser($user);

        // $user = new Login("hello@gmail.com", "there", "my", "name", "is", "Ash"); 
       // $testing = $user_model->addUser($user);
      //  if(!$testing){
      //      echo "There is something wrong";
       // }
        
       // echo "Hello, ", $user->getEmail();
      //  if(!$emailTst){
      //      echo "Email does not exist for some reason...";
      // }
       
       //echo "Hello";
      //  $view = new LoginSign();
      //  $view->display();
    }

    public function signUser() {
        $view = new SignUser();
        $view->display();
    }
   public function signAdmin(){
        $view = new SignAdmin();
        $view->display();
    }

    public function welcome() {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $user_model = $this->user_model = LoginModel::getLoginModel();
      //  $validate = $user_model->authenticateLogin($username, $password);
        
         try{
          $validate = $user_model->authenticateLogin($username, $password);
          $validateRole = $user_model->validateRole($username, $password);
         if($validate && $validateRole){
          $view = new LoginWelcome();
          $view->display();
             }
             
         else{
         throw new LoginException("The username or password you entered is invalid");
             }
          }
         catch(LoginException $e){
         $this->error($e->getMessage());
           }
         catch(Exception $e){
        // $message = "An unexpected error has occurred.";
         $this->error($e->getMessage());
          }
        /* 
        if ($validate) {
            $view = new LoginWelcome();
            $view->display();
        } else {
            $message = "Invalid username or password";
            $this->error($message);
        }
         * 
         */
    }

    public function logout() {
        Session::destroy();
        $view = new Logout();
        $view->display();

       
    }

    public function error($msg) {
        $error = new LoginError();
        $error->display($msg);
    }
    
}
