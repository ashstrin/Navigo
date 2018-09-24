<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginError extends IndexView{
    public function display($message){
        parent::displayHeader("Login Error");
        ?>
<html>
            <head>
                <title></title>
                <link rel="stylesheet" href="app_style.css" type="text/css" />
            </head>
            <body>
                <h2></h2>
                <h3><?php echo $message; ?></h3>
               <!-- <p><a href="index.php?action=show">Show Guest Book</a></p>-->
            </body>
        </html>
        <?php
        parent::displayFooter();
    }
}