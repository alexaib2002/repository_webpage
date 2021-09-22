<?php
if($_SESSION["loggedin"] == true) {
    header("location: welcome.php");
} else {
    header("location: login.php");
}
?>