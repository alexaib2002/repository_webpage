<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'webclient');
define('DB_PASSWORD', '2a2HZXa9HPNBtYW4');
define('DB_NAME', 'romeuvault');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>