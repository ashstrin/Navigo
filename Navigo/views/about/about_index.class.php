<?php

/*
 * Author: Alicia, Ashley, Brandi, William
 * Date: 4/2/17
 * File Name: about_index.class.php
 * Desc: shows the about us page
 */
class AboutIndex extends IndexView {

    public function display() {
        //display page header
        parent::displayHeader("About Us");
        ?>    
        <div id="main-header"></div>

        <div id="message">
            <img src='<?= BASE_URL ?>/www/images/message.png' style=" width: 400px; position: relative; left: 300px; "/>
        </div>
        <br>


        <table id='about' style="text-align: center; border: none; ">
        
            <tr>
                <td></td>
            <td>
                <p>We started organizing for vacations to space in the early 2017. 
                    It was once a dream for the general public to voyage to space! 
                    Now with modern zero gravity technology, we can travel to space 
                    in a matter of hours and survive for weeks! 
                </p>

            </td>
            <td></td>
            </tr>
            <tr><td></td>
            <td>
                <p>Call Us at : 888-GO2-SPACE</p>
            </td>
                </tr>
                <tr>
                    <td></td>
            <td>
                <p>Email Us at : navigo@gmail.come</p>

            </td>
                </tr>
                <tr>
                    <td></td>
            <td>
                <p> <a href='https://www.nasa.gov/'>NASA Home</a></p>
            </td>
            </tr>
            

        </table>     

        <br>

        <?php
        //display page footer
        parent::displayFooter();
    }

}
