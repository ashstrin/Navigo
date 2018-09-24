<?php

/*
 * Author(s): Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * File Name: item_index.class.php
 * Desc:  the items index
 */


class ItemIndex extends ItemIndexView{
    //put your code here

    public function display($items) {

        //display header
        parent::displayHeader("List All Items");
        ?>

        <div id="main-header">Items Available</div>

        <div class="grid-container">
            <?php
            if ($items === 0) {
                echo "No item was found.<br><br><br><br><br>";
            } else {
                //display items in a grid; items per row
                foreach ($items as $i => $item) {
                    $item_id = $item->getItem_Id();
                    $title = $item->getTitle();
                    $image = $item->getImage();
                   
                    

                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . 'ITEM_IMG' . $image;
                    }
                    if ($i % 4 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/item/detail/$item_id'><img src='" . $image .
                    "'></a><span>$title<br><br>" . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 4 == 3 || $i == count($items) - 1) {
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

