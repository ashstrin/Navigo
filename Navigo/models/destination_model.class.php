<?php

/*
 * Author(s): Alicia Franklin
 * Date: 3/31/17
 * File Name: destination_model.class.php
 * Desc: the destination model class
 */

class DestinationModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblDestinations;


    //private constuctor
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblDestinations = $this->db->getDestinationsTable();
 

        //escapes special characters in a string for use in an SQL statement 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //escapes special characters in a string
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
     
   
    }

    //static method to ensure there is just one DestinationModel instance
    public static function getDestinationModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new DestinationModel();
        }
        return self::$_instance;
    }

    public function list_destination() {
        // construct the sql SELECT statement
        try{
        $sql = "SELECT * FROM " . $this->tblDestinations . 
                " WHERE " . $this->tblDestinations . ".destination_id=" . $this->tblDestinations . ".destination_id";

        //execute the query
        $query = $this->dbConnection->query($sql);

        //if the query failed return false. 
        if (!$query){
            //return false;
            throw new DatabaseException();
        }
        //no destination was found.
        elseif ($query->num_rows == 0){
            return 0;
        }
        //create an array to store all destinations
       else{
        $destinations = array();

        //loop through all rows 
        while ($obj = $query->fetch_object()) {
            $destination = new Destination(stripslashes($obj->title), stripslashes($obj->price), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for a destination
            $destination->setDestination_Id($obj->destination_id);

            //add the destination into an array
            $destinations[] = $destination;
        }
        return $destinations;
       }
     }
     catch(DatabaseException $e){
         $error = new LoginError();
         $error->display($e->getMessage());
     }
     catch(Exception $e){
         $error = new LoginError();
         $error->display($e->getMessage());
     }
    }

    /*
     * the viewDestination method retrieves the details of the destination specified by its id
     * and returns a destination object. Return false if failed.
     */

    public function view_destination($destination_id) {
        //the select sql statement
       //execute the query
        try{
        $sql = "SELECT * FROM " . $this->tblDestinations . 
            " WHERE " . $this->tblDestinations . ".destination_id='$destination_id'";
        $query = $this->dbConnection->query($sql);
        if(!$query){
            throw new DatabaseException();
        }
        elseif ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a destination object
            $destination = new Destination(stripslashes($obj->title), stripslashes($obj->price), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the destination
            $destination->setDestination_Id($obj->destination_id);

            return $destination;
        }

        //return false;
      } 
      catch(DatabaseException $e){
          $error = new DesinationError();
          $error->display($e->getMessage());
      }
      catch(Exception $e){
          $error = new DestinationError();
          $error->display($e->getMessage());
      }
    }

    //search the database for destinations that match words in titles. Return an array of destinations if succeed; false otherwise.
    public function search_destination($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblDestinations . 
                " WHERE " . $this->tblDestinations . ".destination_id=" . $this->tblDestinations . ".destination_id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false. 
        if (!$query)
            return false;

        //search succeeded, but no destination was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 destination found.
        //create an array to store all the returned destinations
        $destinations = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $destination = new Destination($obj->title, $obj->price, $obj->image, $obj->description);

            //set the id for the destination
            $destination->setDestination_Id($obj->destination_id);

            //add the destination into the array
            $destinations[] = $destination;
        }
        return $destinations;
    }



    public function update_destination($destination_id) {
        //if the script did not received post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'title') ||
                !filter_has_var(INPUT_POST, 'price') ||
                !filter_has_var(INPUT_POST, 'image') ||
                !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        //retrieve data for the new destination; data are sanitized and escaped for security.
        $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
        $price = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_NUMBER_FLOAT)));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

        //query string for update
        try{
        $sql = "UPDATE " . $this->tblDestinations .
                " SET title='$title', price='$price', image='$image', description='$description' WHERE destination_id='$destination_id'";

        //execute the query
        $query = $this->dbConnection->query($sql);
        if(!$query){
            throw new DatabaseException();
            }
         }
         catch(DatabaseException $e){
             $error = new LoginError();
             $error->display($e->getMessage());
         }
    }

}
