<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LoginIndex extends IndexView{
    public function display(){
        parent::displayHeader("Sign up");
        ?>
<!DOCTYPE html>
        <html>
            <head>
                <title>Login</title>
                <link rel="stylesheet" href="www/css/app_style.css" type="text/css" />
            </head>
            <body>
                <h2 style="margin-top: 45px">Register</h2>
                <h3> Please complete the form. All fields are required.</h3>
                <form method="post" action="<?= BASE_URL ?>/login/sign">
                    <table cellspacing='0'>
                        <tr>
                            <th>Username</th>
                            <td><input type="text" name="username" size="30"></td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td><input type="text" name="first_name" size="30"></td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td><input type="text" name="last_name" size="30"></td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td><input type="text" name="birth_date" size="30"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="email" name="email" size="30" required /></td>
                        </tr>
                        <tr>
                           <!-- <th>Username</th>
                            <td><input type="text" name="username" size="30"></td>
                        </tr>-->
                        <tr>
                            <th>Password</th>
                            <td><input type="password" name="password" required></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="Submit" /></td>
                            <td><input type="button" onclick="window.location.href='<?= BASE_URL?>/login/signUser'" value="Login"></td>
                            <td><input type="button" onclick="window.location.href='<?= BASE_URL ?>/welcome/index'" value="Back"></td>
                        </tr>
                    </table>
                </form>
               <!-- <p><a href="index.php?action=show">Show Guest Book</a></p>-->
            </body>
        </html>
        <?php
        parent::displayFooter();
    }
}
