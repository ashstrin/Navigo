<?php
/*
 * Author(s): Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * File Name: item_detail.class.php
 * Desc: When a thumbnail is clicked, details of the items display in an HTML table.
 */

class ItemDetail extends ItemIndexView {

    //public function for display
    public function display($item, $confirm = "") {
       
        //display header
        parent::displayHeader("Item Details");

        //use the get methods from item.class.php functions
        $item_id = $item->getItem_Id();
        $title = $item->getTitle();
        $price = $item->getPrice();
        $image = $item->getImage();
        $description = $item->getDescription();
      

   if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . ITEM_IMG . $image;
        }
        ?>

        <div id="main-header">Item Details</div>
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
                      <div id="button-group">
                        <input type="button" id="edit-button" value="   Edit   "
                               onclick="window.location.href = '<?= BASE_URL ?>/item/edit/<?= $item_id ?>'">&nbsp;
                    </div>
                </td>
                <td>
                    <p><?= $title ?></p>
                    <p>$<?= number_format($price) ?></p>
                    <p><?= $description?></p>
                    <p class="media-description"><?= $item ?></p>
                    <div id="confirm-message"><?= $confirm ?></div>
                </td>
            </tr>
        </table>

        <a href="<?= BASE_URL ?>/item/index">Go to Items</a>

        <?php
        //display page footer
        parent::displayFooter();
    }

//end display method
}
