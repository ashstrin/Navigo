<?php

/*
 * Author(s): Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * File Name: destination_index.class.php
 * Desc:  the destination index
 */


class DestinationIndex extends DestinationIndexView{
    //put your code here

    public function display($destinations) {

        //display header
        parent::displayHeader("List All Destinations");
        ?>

        <div id="main-header">Destinations Available</div>

        <div class="grid-container">
            <?php
            if ($destinations === 0) {
                echo "No destination was found.<br><br><br><br><br>";
            } else {
                //display destinations in a grid; destinations per row
                foreach ($destinations as $i => $destination) {
                    $destination_id = $destination->getDestination_Id();
                    $title = $destination->getTitle();
                    $price = $destination->getPrice();
                    $description = $destination->getDescription();
                    $image = $destination->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . DESTINATION_IMG . $image;
                    }
                    if ($i % 4 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/destination/detail/$destination_id'><img src='" . $image .
                    "'></a><span>$title<br><br>" . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 4 == 3 || $i == count($destinations) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>

        <?php
        //display footer
        parent::displayFooter();
    }

//end of display method
}
