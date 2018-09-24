<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SignAdmin extends IndexView{
public function display(){
    parent::displayHeader("Sign in as administrator");
        ?>
    <form method="post" action="<?= BASE_URL ?>/login/welcome">
        <h3>Log in as an administrator</h3>
<tr>
    <th>Username</th>
    <td>
    <input type="text" name="username" size="30">
    </td>
</tr>
<tr>
    <th>Password</th>
    <td>
        <input type="password" name="password" size="30">
    </td>
</tr>
<input type="submit" name="subBtn" value="Login">
    </form>
<?php
parent::displayFooter();
    }
}
