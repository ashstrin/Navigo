<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AboutController{
   public function index(){
       $view = new AboutIndex();
       $view->display();
       if(!$view){
           $message = "There was an unexpected error in displaying the About page.";
           $this->error($message);
       }
   }
   public function error($message){
       $view = new AboutError();
       $view->display($message);
   }
}