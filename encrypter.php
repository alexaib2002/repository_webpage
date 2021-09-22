<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $hash_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body{ font: 14px sans-serif; }
            .wrapper{ width: 360px; padding: 20px; }
        </style>
    </head>
    <body>
        <div>
            <?php
            if(!empty($hash_password)){
                echo '<div class="alert alert-success">' . $hash_password . '</div>';
            }  
            ?>
            <h2>Password Encrypter</h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="PHP Encrypt">
                </div>
            </form>
        </div>
    </body>
</html>