<?php

/*
 * Author: Alicia, Ashley, Brandi, William
 * Date: 4/2/17
 * File Name: destination_controller.class.php
 * Desc: the destination controller
 */

class DestinationController {
   
 private $destination_model;

    //default constructor
    public function __construct() {
        //create an instance of the destinationModel class
        $this->destination_model = DestinationModel::getDestinationModel();
    }

    //index action that displays all destinations
    public function index() {
        //retrieve all destinations and store them in an array
        $destinations = $this->destination_model->list_destination();

        if (!$destinations) {
            //display an error
            $message = "There was a problem displaying destinations.";
            $this->error($message);
            return;
        }

        // display all destinations
        $view = new DestinationIndex();
        $view->display($destinations);
    }

    //show details of a destination
    public function detail($destination_id) {
        //retrieve the specific destination
        $destination = $this->destination_model->view_destination($destination_id);

        if (!$destination) {
            //display an error
            $message = "There was a problem displaying the destination id='" . $destination_id . "'.";
            $this->error($message);
            return;
        }

        //display destination details
        $view = new DestinationDetail();
        $view->display($destination);
    }

    //search destinations
    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all destinations
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching destinations
        $destinations = $this->destination_model->search_destination($query_terms);

        if ($destinations === false) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }
        //display matched destinations
        $search = new DestinationSearch();
        $search->display($query_terms, $destinations);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $destinations = $this->destination__model->search_destination($query_terms);

        //retrieve all titles and store them in an array
        $titles = array();
        if ($destinations) {
            foreach ($destinations as $destination) {
                $titles[] = $destination->getTitle();
            }
        }

        echo json_encode($titles);
    }

    //handle an error
    public function error($message) {
        //create an object of the Error class
        $error = new DestinationError();

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

    //display a destination in a form for editing
    public function edit($destination_id) {
        //retrieve the specific destination
        $destination = $this->destination_model->view_destination($destination_id);

        if (!$destination) {
            //display an error
            $message = "There was a problem displaying the destination id='" . $destination_id . "'.";
            $this->error($message);
            return;
        }
/*
 * try{
 * $destination = $this->destination_model->view_destination($destination_id);
 * if(!$destination){
 *    throw new DestinationException();
 *    }
 *  }
 * catch(DestinationException $e){
 * $message = "ff";
 * $this->error($message);
 * 
 *      }
 * catch(Exception $e){
 * $message = "Unexpected error has occurred";
 * $this->error($message);
 *  }
 */
        $view = new DestinationEdit();
        $view->display($destination);
    }
 //display a form to add a destination
        public function add($destination_id) {
        //retrieve the specific destination
        $destination = $this->destination_model->view_destination($destination_id);

        if (!$destination) {
            //display an error
            $message = "There was a problem adding the destination id='" . $destination_id . "'.";
            $this->error($message);
            return;
        }

        $view = new DestinationAdd();
        $view->display($destination);
    }
    public function insert() {
        $insert = $this->destination_model->add_destination();        
        
         
        $view = new DestinationAdd();
        $view->display();
    }
    //update a destination in the database
    public function update($destination_id) {
        //update the destination
        $update = $this->destination_model->update_destination($destination_id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the destination id='" . $destination_id . "'.";
            $this->error($message);
            return;
        }

        //display the updateed destination details
        $confirm = "The destination was successfully updated.";
        $destination = $this->destination_model->view_destination($destination_id);

        $view = new DestinationDetail();
        $view->display($destination, $confirm);
    }

}
