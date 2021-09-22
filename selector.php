<?php
if(isset($_GET['sys'])){
    $sys=$_GET['sys'];
} else {
    header('location: welcome.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body{ font: 14px sans-serif; text-align: center; }
        </style>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1 class="my-5"><?php echo "$sys"?></h1>
        <p>
            <a href="welcome.php" class="btn btn-success my-2 ml-3">Return to main page</a>
        </p>
        <div class="container">
            <?php
            include "config.php";
            $sql = "SELECT `name`, `md5`, `sha256`, `sha1` FROM `roms` WHERE `system` LIKE '$sys'";
            $array = mysqli_fetch_all(mysqli_query($link, $sql));
            $id = 0;
            foreach($array as $rom) {
                echo "<div><button class='btn my-1 btn-link' data-toggle='modal' data-target='#id$id'>$rom[0]</button></div>

                <div class=\"modal fade\" id=\"id$id\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"romInfoModal\">
                    <div class=\"modal-dialog modal-dialog-centered modal-lg\" role=\"document\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h5 class=\"modal-title\" id=\"romModalLongTitle\">$rom[0]</h5>
                                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                                </button>
                            </div>
                            <div class=\"modal-body\">
                                <div><b>md5</b>: $rom[1]</div>
                                <div><b>sha256</b>: $rom[2]</div>
                                <div><b>sha1</b>: $rom[3]</div>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                                <a href='vault/$sys/$rom[0]'><button type=\"button\" class=\"btn btn-primary\">Download</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                ";
                $id += 1;
            }
            ?>
        </div>
        <!-- Modal -->
        
        </body>
</html>