<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Logout extends IndexView{
    public function display(){
        parent::displayHeader("Log out");
        ?>
<html>
    <head></head>
    <body>
        <h2>You are now logged out of your account</h2>
        <div><a href="<?= BASE_URL?>/login/signUser">Login</a></div>
        <div><a href="<?= BASE_URL?>/welcome/index">Return</a></div>
    </body>
</html>
<?php
parent::displayFooter();
    }
}
