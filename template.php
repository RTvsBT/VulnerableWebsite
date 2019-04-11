<?php

$whilelist = array("index", "loadme");

ini_set("open_basedir", "/var/www/"); // This will stop them openinging anything below /var/www

require_once 'common.php';
print_r(substr($_GET['load'], -1) === '\0');
$file = $_GET['load'] . '.php'; // This will stop them for sure!!!
$file = str_replace(chr(0), "", $file); // Null bytes removed! awesome
require_once($file);
