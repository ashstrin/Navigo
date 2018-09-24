<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LoginWelcome extends IndexView{
    public function display(){
        parent::displayHeader("Login Welcome")
        ?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h2>User login</h2>
        <h3>You have successfully logged in.</h3>
        <!--<h3><a href="<?= BASE_URL ?>/login/index">Hello</a></h3>-->
        <input type="button" onclick="window.location.href='<?= BASE_URL?>/login/signUser'" value="Login">
       <input type="button" onclick="window.location.href='<?= BASE_URL?>/login/logout'" value="Logout">
       <input type="button" onclick="window.location.href='<?= BASE_URL?>/welcome/index'" value="Home">
    </body>
</html>
<?php
parent::displayFooter();
    }
}

