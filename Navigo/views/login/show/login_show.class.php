<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LoginShow extends LoginIndexView{
    public function display($users){
        ?>
<table cellspacing='0'>
            <tr>
                <th style="width:150px">First Name</th>
                <th style="width:150px">Last Name</th>
                <th style="width:150px">Birth Date</th>
                <th style="width:150px">Email</th>
                <th style="width:150px">Username</th>
            </tr>
            <tr>
                <?php 
                  echo "<td>" . $users->getFirstName(); "</td>";
                  echo "<td>" . $users->getLastName() . "</td>";
                  echo "<td>" . $users->getBirthDate() . "</td>";
                  echo "<td>" . $users->getEmail() . "</td>";
                  echo "<td>" . $users->getUsername() . "</td>";
                  echo "</tr>";
                
                
                ?>
            </tr>
            <tr><a href="<?= BASE_URL ?>/login/index">Go to Index</a></tr>
</table>
<?php
    }
}
