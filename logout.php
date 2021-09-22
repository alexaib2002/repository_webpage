<?php
include "config.php";

// Initialize the session
session_start();

// Log the event to database

$country = $_SESSION["json"]["country"];
$region = $_SESSION["json"]["region"];
$city = $_SESSION["json"]["city"];

$sql = "INSERT INTO `logs` (`lid`, `username`, `lip`, `date`, `hour`, `lcountry`, `lregion`, `lcity`, `type`) VALUES (NULL, '$_SESSION[username]', '$_SESSION[ip]', CURRENT_DATE(), CURRENT_TIME(), '$country', '$region', '$city', \"LOGOUT\")";
mysqli_query($link, $sql);

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>