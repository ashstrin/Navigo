<?php
/*
 * Author: Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * Name: destination_search.class.php
 * Description: this script defines the SearchDestination class. The class contains a method named display, which
 *     accepts an array of destination objects and displays them in a grid.
 */

class DestinationSearch extends DestinationIndexView {
    /*
     * the displays accepts an array of movie objects and displays
     * them in a grid.
     */

     public function display($terms, $destinations) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($destinations)) ? "( 0 - 0 )" : "( 1 - " . count($destinations) . " )");
            ?>
        </span>
        <hr>

       <!-- display all records in a grid -->
               <div class="grid-container">
            <?php
            if ($destinations === 0) {
                echo "No destination was found.<br><br><br><br><br>";
            } else {
                //display destinations in a grid; six destinations per row
                foreach ($destinations as $i => $destination) {
                    $destination_id = $destination->getDestination_Id();
                    $title = $destination->getTitle();
                    $price = $destination->getPrice();
                    $description = $destination->getDescription();
                    $image = $destination->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . DESTINATION_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='" . BASE_URL . "/destination/detail/$destination_id'><img src='" . $image .
                    "'></a><span>$title" . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($destinations) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>
        <a href="<?= BASE_URL ?>/destination/index">Go to Destination List</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}