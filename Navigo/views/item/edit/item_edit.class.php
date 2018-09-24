<?php

/*
 * Author(s): Alicia, Ashley, William, Brandi
 * Date: 4/19/17
 * File Name: item_edit.class.php
 * Desc: edit an item in the database.
 */
class ItemEdit extends ItemIndexView {
    //put your code here

    public function display($item) {
        
        //display page header
        parent::displayHeader("Edit Item");
        
        //get category from a session variable
       if (isset($_SESSION['category'])) {
           $categorys = $_SESSION['category'];
       }
        
        

        //retrieve item details by calling get methods
        $item_id = $item->getItem_Id();
        $title = $item->getTitle();
        $price = $item->getPrice();
        $image = $item->getImage();
        $description = $item->getDescription();
        $category = $item->getCategory();
        ?>

        <div id="main-header">Edit Item Details</div>

        <!-- display item details in a form -->
        <form class="grid-container"  action='<?= BASE_URL . "/item/update/" . $item_id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
          <input type="hidden" name="item_id" value="<?= $item_id ?>">
            <p style="color: white;"><strong>Title</strong><br>
                <input name="title" type="text" size="100" value="<?= $title ?>" required autofocus></p>
            <p style="color: white;"><strong>Price</strong>: <br>
                <input name="price" type="float" size="40" value="<?= $price?>" required=""></p>
            <p style="color: white;"><strong>Image</strong>: url (http:// or https://) or local file including path and file extension<br>
                <input name="image" type="text" size="100" required value="<?= $image ?>"></p>
            <p style="color: white;"><strong>Description</strong>:<br>
                <textarea name="description" rows="8" cols="50"><?= $description ?></textarea></p>
            <p style="color: white;"><strong>Category</strong>:
                <?php
                foreach ($categorys as $c => $c_id) {
                   $checked = ($category == $c) ? "checked" : "";
                   echo "<input type='checkbox' name='category' value='$c_id' $checked> $c &nbsp;&nbsp;";
              
                }
                 ?>
               
               
         
            </p>
            
            <input type="submit" name="action" value="Update Item">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/item/detail/" . $item_id ?>"'>  
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }
    
//end of display method
}