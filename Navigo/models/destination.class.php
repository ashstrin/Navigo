<?php

/*
 * Author: Alicia, Ashley, Brandi, William
 * Date: 4/4/17
 * Name: destination.class.php
 * Description: the destination class models a real-world destination.
 */

class Destination {

    //private properties of a destination object
    private $destination_id, $title, $price, $description, $image;

    //the constructor that initializes all properties
    public function __construct($title, $price, $image, $description) {
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
        $this->description = $description;
    }

    //get the id of a destination
    public function getDestination_Id() {
        return $this->destination_id;
    }

    //get the title of a destination
    public function getTitle() {
        return $this->title;
    }

    //get the price of destination
    public function getPrice() {
        return $this->price;
    }

    //get the image file name of a destination
    public function getImage() {
        return $this->image;
    }

    //get the description of a destination
    public function getDescription() {
        return $this->description;
    }

    //set destination id
    public function setDestination_Id($destination_id) {
        $this->destination_id = $destination_id;
    }

}