<?php

/*
 * Author(s): Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * File Name: destination_edit.class.php
 * Desc: edit a destination in the database.
 */
class DestinationAdd extends DestinationIndexView {
    //put your code here



    public function display($destination) {
        //display page header
        parent::displayHeader("Edit Destination");

       
        ?>

        <div id="main-header">Add Destinations</div>

        <!-- display destination details in a form -->
        <form class="grid-container"  action='<?= BASE_URL ?>/destination/add/' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
          <input type="hidden" name="destination_id" value="<?= $destination_id ?>">
            <p style="color: white;"><strong>Title</strong><br>
                <input name="title" type="text" size="100" value="Title" required autofocus></p>
            <p style="color: white;"><strong>Price</strong>: <br>
                <input name="price" type="float" size="40" value="Price" required=""></p>
            <p style="color: white;"><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="Image"></p>
            <p style="color: white;"><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="100" value="Description"></textarea></p>
            <input type="submit" name="action" value="Add Destination">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/destination/detail/" . $destination_id ?>"'>  
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}