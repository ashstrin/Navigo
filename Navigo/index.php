<?php
/*
 * Author: Alicia, Ashley, Brandi, William
 * Date: 4/2/17
 * Name: index.php
 * Description: index file
 */
//load application settings
require_once ("application/config.php");

//load autoloader
require_once ("application/autoloader.class.php");

//load the displather that dissects a request URL
new Dispatcher();