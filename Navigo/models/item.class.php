<?php

/*
 * Author: Alicia, Ashley, Brandi, William
 * Date: 4/4/17
 * Name: items.class.php
 * Description: the items class models a real-world space item.
 */

class Item {

    //private properties of a item object
    private $item_id, $title, $price, $description, $image, $category;

    //the constructor that initializes all properties
    public function __construct($title, $price, $image, $description, $category) {
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
        $this->description = $description;
        $this->category = $category;
    }

    //get the id of a item
    public function getItem_Id() {
        return $this->item_id;
    }

    //get the title of a item
    public function getTitle() {
        return $this->title;
    }

    //get the price of item
    public function getPrice() {
        return $this->price;
    }

    //get the image file name of a item
    public function getImage() {
        return $this->image;
    }

    //get the description of a item
    public function getDescription() {
        return $this->description;
    }
    
    //get the category of an item
        public function getCategory() {
        return $this->category;
    }
    
    //set item id
    public function setItem_Id($item_id) {
        $this->item_id = $item_id;
    }

}
