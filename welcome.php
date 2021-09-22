<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Welcome <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1> 
    <p>Connected from <b><?php echo $_SERVER['REMOTE_ADDR']; ?></b>.</p>
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
    </p>
    <div><h2>Select system</h2></div>
    <div class='container border rounded'>
        <?php
        include "config.php";
        $sql = "SELECT system FROM roms GROUP BY system";
        $array = mysqli_fetch_all(mysqli_query($link, $sql));
        foreach($array as $sys) {
            echo "<div class='col'><a class='btn btn-link' href='selector.php?sys=$sys[0]' role='button'>$sys[0]</a></div>";
        }
        unset($sys);
        ?>
    </div>

</body>
</html>