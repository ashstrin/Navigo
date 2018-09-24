<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LoginSign extends IndexView{
    public function display(){
        parent::displayHeader("Your account has been created.");
        ?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <h3>Thank you for registering. Now log in to view your profile.</h3>
    <p><a href="<?= BASE_URL ?>/login/signUser">Log in</a></p>
    </body>
</html>
<?php
parent::displayFooter();
    }
}
