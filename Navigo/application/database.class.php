
<?php

/*
 * Author: Alicia, Ashley, Brandi, William
 * Date: 4/2/17
 * File: database,class.php
 * Description: Description: the Database class sets the database details.
 * 
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'root',
        'password' => 'root',
        'database' => 'space_db',
        'tblDestinations' => 'destinations',
        'tblItem' => 'items',
        'tblUsers' => 'users',
        'tblCategory' => 'category',
      
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        /*
        $this->objDBConnection = @new mysqli(
                $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
         * 
         */
        try{
           $this->objDBConnection = @new mysqli(
           $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']); 
       if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            throw new DatabaseException($message);
           // include 'error.php';
            exit();
            }
        }
        catch(DatabaseException $e){
            $error = new LoginError();
            $error->display($e->getMessage());
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores destinations
    public function getDestinationsTable() {
        return $this->param['tblDestinations'];
    }

    //returns the name of the table that stores items
    public function getItemsTable() {
        return $this->param['tblItems'];
    }

    //returns the name of the table storing user info
    public function getUsersTable() {
        return $this->param['tblUsers'];
    }
    public function getCategoryTable(){
        return $this->param['tblCategory'];
    }



}
