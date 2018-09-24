<?php
/*
 * Author: Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * Name: item_search.class.php
 * Description: this script defines the SearchItems class. The class contains a method named display, which
 *     accepts an array of item objects and displays them in a grid.
 */

class ItemSearch extends ItemIndexView {
    /*
     * the displays accepts an array of items and displays
     * them in a grid.
     */

     public function display($terms, $items) {
        //display page header
        parent::displayHeader("Search Results");
        ?>
        <div id="main-header"> Search Results for <i><?= $terms ?></i></div>
        <span class="rcd-numbers">
            <?php
            echo ((!is_array($items)) ? "( 0 - 0 )" : "( 1 - " . count($items) . " )");
            ?>
        </span>
        <hr>

       <!-- display all records in a grid -->
               <div class="grid-container">
            <?php
            if ($items === 0) {
                echo "No item was found.<br><br><br><br><br>";
            } else {
                //displayitems in a grid; 4 items per row
                foreach ($items as $i => $item) {
                    $item_id = $item->getItem_Id();
                    $title = $item->getTitle();
                    $image = $item->getImage();
              
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . ITEM_IMG . $image;
                    }
                    if ($i % 4 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='" . BASE_URL . "/item/detail/$item_id'><img src='" . $image .
                    "'></a><span>$title<br>" . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 4 == 3 || $i == count($items) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>  
        </div>
        <a href="<?= BASE_URL ?>/item/index">Go to Items</a>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}
