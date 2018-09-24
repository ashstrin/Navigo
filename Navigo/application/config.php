<?php

/*
 * Author: Alicia, Ashley, Brandi, William
 * Date: 4/2/17
 * Name: config.php
 * Description: set application settings
 */

//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
//define("BASE_URL", "http://localhost/I211/final_project");
define("BASE_URL", "http://localhost:8888/Navigo");

/*************************************************************************************
 *                       settings for destinations                                        *
 ************************************************************************************/

//define default path for destination images
define("DESTINATION_IMG", "www/images/destinations/");


