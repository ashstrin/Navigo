<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SignUser extends IndexView{
    public function display(){
        parent::displayHeader("Sign in");
        Session::create();
        ?>
<h2>User Login</h2>
<h3>Please login to your account</h3>
<form method="post" action="<?= BASE_URL ?>/login/welcome">
    <tr>
        <th>Username</th>
        <td><input type="text" name="username" size="30"></td>
    </tr>
    <tr>
        <th>Password</th>
        <td><input type="password" name="password" size="30"></td>
    </tr>
    <input type="submit" name="submit" value="login">
</form>
<?php if($_SESSION['username']){?>
<p><a href="<?= BASE_URL?>/login/logout">Logout</a></p>
<?php
    }
    else{
        echo "";
    }
?>      
<p><a href="<?= BASE_URL?>/login/index">Return</a></p>
<!--<p><a href="<?= BASE_URL?>/login/signAdmin">Log in as an administrator</a></p>-->

<?php
parent::displayFooter();
    }
}