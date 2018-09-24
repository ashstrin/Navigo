<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DatabaseException extends Exception{
    public function __construct(){
        parent::__construct("An error has occurred with the database");
    }
}
