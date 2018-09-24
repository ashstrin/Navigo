<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of item_controller
 *
 * @author cite_
 */
class ItemController {
    private $item_model;

    //default constructor
    public function __construct() {
        //create an instance of the ItemModel class
        $this->item_model = ItemModel::getItemModel();
    }

    //index action that displays all items
    public function index() {
       // echo "Hello";
        //retrieve all items and store them in an array
        try{
        $items = $this->item_model->list_item();
        //echo "Hello";
        if (!$items) {
            //display an error
            $message = "There was a problem displaying the items.";
            //echo "Hello";
           // $this->error($message);
          //  echo "Hello";
           // return;
        }
//echo "Hello";
        // display all items
        $view = new ItemIndex();
        $view->display($items);
        }
        catch(Exception $e){
            $this->error($e->getMessage());
        }
    }

    //show details of a item
    public function detail($item_id) {
        //retrieve the specific item
        $item = $this->item_model->view_item($item_id);

        if (!$item) {
            //display an error
            $message = "There was a problem displaying the item id='" . $item_id . "'.";
            $this->error($message);
            return;
        }

        //display items details
        $view = new ItemDetail();
        $view->display($item);
    }

    //search items
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all items
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching items
        $items = $this->item_model->search_item($query_terms);

        if ($items === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched items
        $search = new ItemSearch();
        $search->display($query_terms, $items);
    }

    //autosuggestion
    public function suggest($terms) {
 
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $items = $this->item_model->search_item($query_terms);

        //retrieve all titles and store them in an array
        $titles = array();
        if ($items) {
            foreach ($items as $item) {
                $titles[] = $item->getTitle();
            }
        }

        echo json_encode($titles);
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new ItemError();

        //display the error page
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments) {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

    //display a item in a form for editing
    public function edit($item_id) {
        //retrieve the specific items
        $item = $this->item_model->view_item($item_id);

        if (!$item) {
            //display an error
            $message = "There was a problem displaying the item id='" . $item_id . "'.";
            $this->error($message);
            return;
        }

        $view = new ItemEdit();
        $view->display($item);
    }

    //update a items in the database
    public function update($item_id) {
        //update the items
       
        $update = $this->item_model->update_item($item_id);
        
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the item id='" . $item_id . "'.";
            $this->error($message);
            return;
        }

        //display the updateed items details
        $confirm = "The item was successfully updated.";
        $item = $this->item_model->view_item($item_id);

        $view = new ItemDetail();
        $view->display($item, $confirm);
        
         
      
    }

}


