<?php
/*
 * Author(s): Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * File Name: destination_detail.class.php
 * Desc: When a thumbnail is clicked, details of the destination display in an HTML table.
 */

class DestinationDetail extends DestinationIndexView {

    //public function for display
    public function display($destination, $confirm = "") {
       
        //display header
        parent::displayHeader("Destination Details");

        //use the get methods from destination.class.php functions
        $destination_id = $destination->getDestination_Id();
        $title = $destination->getTitle();
        $price = $destination->getPrice();
        $image = $destination->getImage();
        $description = $destination->getDescription();


        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . DESTINATION_IMG . $image;
        }
        ?>

        <div id="main-header">Destination Details</div>
        <hr>
        <!-- use a table to display details -->
     
            <table id="detail">
            <tr>
                <td style="width: 150px;">
                    <img src="<?= $image ?>" alt="<?= $title ?>" />
                </td>
                <td style="width: 100px;">
                    <p><strong>Title:</strong></p>
                    <p><strong>Price:</strong></p>
                    <p><strong>Description:</strong></p>
                </td>
                <td>
                    <p><?= $title ?></p>
                    <p>$<?= number_format($price) ?></p>
                    <p class="media-description"><?= $description ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>

        <a href="<?= BASE_URL ?>/destination/index">Go to Destination List</a>
     <!--   <a href="<?= BASE_URL ?>/destination/testing">Testing</a>-->
        <?php
        //display page footer
        parent::displayFooter();
    }

//end display method
}
