<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Session{
    public function create(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    
    }
    public function destroy(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION = array();
         setcookie(session_name(), "", time() - 3600);

        session_destroy();
        
    }
}