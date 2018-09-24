<?php
/*
 * Author(s): Alicia, Ashley, William, Brandi
 * Date: 4/3/17
 * Name: welcome_index.class.php
 * Description: This class defines the method "display" that displays the home page.
 */

class WelcomeIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("Navigo Home");
        ?>    
        <div id="main-header"></div>
                    
       
        <br>


        <table id="thumbnails" style="text-align: center; border: none; position: relative; right: 50px ">
            <td>
        
            <a href="<?= BASE_URL ?>/destination/index">
                <img src="<?= BASE_URL ?>/www/images/solar.jpeg" title="Destinations" style="width: 200px"/>
            </a>
                <p>Destinations</p>
            </td>
            <td>
                
               <a href="<?= BASE_URL ?>/item/index">
                <img src='<?= BASE_URL ?>/www/images/spacefood.jpeg' title="Items" style="width: 200px"/>
            </a>
                 <p>Space Items</p>
            </td>
            <td>
              
            <a href="<?= BASE_URL ?>/login/index">
                <img src='<?= BASE_URL ?>/www/images/astronaut.jpeg' title="Login" style="width: 200px"/>
            </a>
                 <p>Register/Login</p>
            </td>
            <td>
                
            <a href="<?= BASE_URL ?>/about/index">
                <img src='<?= BASE_URL ?>/www/images/us.jpeg' title="About Us" style="width: 200px"/>
            </a>
                <p>About Us</p>
            </td>


        </table>
<!--        <div id="message">
                        <img src='<?= BASE_URL ?>/www/images/message.png' style=" width: 400px; position: relative; left: 300px; "/>
                    </div>

        <br>-->

        <?php
        //display page footer
        parent::displayFooter();
    }

}
