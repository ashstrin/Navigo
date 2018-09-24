<?php

/*
 * Author(s): Brandi, Ashley, Alicia, William
 * Date: 4/11/17
 * File Name: items_model.class.php
 * Desc: the items model class
 */

class ItemModel {

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblItems;
    private $tblCategory;

    //private constuctor
    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblItems = $this->db->getItemsTable();
        $this->tblCategory = $this->db->getCategoryTable();
 

        //escapes special characters in a string for use in an SQL statement 
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //escapes special characters in a string
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
        //initialize category
       if (!isset($_SESSION['category'])) {
            $categorys = $this->get_category();
           $_SESSION['category'] = $categorys;
       }
   
    }

    //static method to ensure there is just one ItemModel instance
    public static function getItemModel() {
        if (self::$_instance == NULL) {
            self::$_instance = new ItemModel();
        }
        return self::$_instance;
    }

    public function list_item() {
        // construct the sql SELECT statement
        //$sql = "SELECT * FROM " . $this->tblItems . ", " . $this->tblCategory . 
         // " WHERE " . $this->tblItems . ".category=" . $this->tblCategory . ".category_id";
        
         $sql = "SELECT * FROM " . $this->tblItems . " INNER JOIN " . $this->tblCategory . " ON "
         . $this->tblItems. ".category=" . $this->tblCategory . ".category_id";
        //execute the query
        try {
         $query = $this->dbConnection->query($sql);
          if (!$query){
           $errmsg = $this->dbConnection->error;
            throw new DatabaseException("HEllo");
          //  return false;
          }
          else if($query->num_rows == 0){
            return 0;
          
          }
          else{
              $items = array();

        //loop through all rows 
        while ($obj = $query->fetch_object()) {
            $item = new Item(stripslashes($obj->title), stripslashes($obj->price), stripslashes($obj->image), stripslashes($obj->description), stripslashes($obj->category));

            //set the id for a item
            $item->setItem_Id($obj->item_id);

            //add the item into an array
            $items[] = $item;
        }
        return $items;
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
     * the viewItem method retrieves the details of the items specified by its id
     * and returns a item object. Return false if failed.
     */

    public function view_item($item_id) {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblItems . "," . $this->tblCategory . 
                " WHERE " . $this->tblItems . ".category=" . $this->tblCategory . ".category_id" .
                " AND " . $this->tblItems . ".item_id='$item_id'";
        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a item object
            $item = new Item(stripslashes($obj->title), stripslashes($obj->price), stripslashes($obj->image), stripslashes($obj->description), stripslashes($obj->category));

            //set the id for the item
            $item->setItem_Id($obj->item_id);

            return $item;
        }

        return false;
    }

    //search the database for items that match words in titles. Return an array of items if succeed; false otherwise.
    public function search_item($terms) {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblItems . "," . $this->tblCategory .
                " WHERE " . $this->tblItems . ".category=" . $this->tblCategory . ".category_id AND(1";

        foreach ($terms as $term) {
            $sql .= " AND title LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false. 
        if (!$query)
            return false;

        //search succeeded, but no item was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 item found.
        //create an array to store all the returned items
        $items = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $item = new Item($obj->title, $obj->price, $obj->image, $obj->description, $obj->category);

            //set the id for the item
            $item->setItem_Id($obj->item_id);

            //add the item into the array
            $items[] = $item;
        }
        return $items;
    }



    public function update_item($item_id) {
        //if the script did not received post data, display an error message and then terminite the script immediately
        if (!filter_has_var(INPUT_POST, 'title') ||
                !filter_has_var(INPUT_POST, 'description') ||
                !filter_has_var(INPUT_POST, 'price') ||
                !filter_has_var(INPUT_POST, 'image') ||
                !filter_has_var(INPUT_POST, 'category')) 
               {

            return false;
        }

        //retrieve data for the new item; data are sanitized and escaped for security.
        $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
        $price = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_NUMBER_FLOAT)));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
        $category = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING)));

        //query string for update
        $sql = "UPDATE " . $this->tblItems .
                " SET title='$title', description='$description', price='$price', image='$image',  category='$category'" . 
                "WHERE item_id='$item_id'";

        //execute the query
        return $this->dbConnection->query($sql);
    }



    //get all categories
    private function get_category() {
        $sql = "SELECT * FROM " . $this->tblCategory;

        //execute the query
        $query = $this->dbConnection->query($sql);

        if (!$query) {
            return false;
        }

        //loop through all rows
        $categorys = array();
        while ($obj = $query->fetch_object()) {
            $categorys[$obj->category] = $obj->category_id;
        }
        return $categorys;
    }

}