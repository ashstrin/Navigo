<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login{
    private $user_id, $email, $first_name, $last_name, $birth_date, $username, $password, $zip, $city, $state, $street, $role;
    
    public function __construct($email, $first_name, $last_name, $birth_date, $username, $password){
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->password = $password;
        $this->birth_date = $birth_date;
    }
    public function getId(){
        return $this->user_id;
    }
    public function getEmail(){
        //return $this->email;
        if($this->email){
            return $this->email;
        }
        else{
            echo "Email does not exist!";
        }
    }
    public function getFirstName(){
        return $this->first_name;
    }
    public function getLastName(){
        return $this->last_name;
    }
    public function getBirthDate(){
        return $this->birth_date;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setId($id){
        $this->user_id = $id;
    }
}
?>
