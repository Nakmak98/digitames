<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . "/dbconnect_anon_user.php";
$mysqli = dbconnect();
//$sql = "SELECT * FROM game_page WHERE proj_is = '".$_SESSION['id']."'";
$sql = "SELECT * FROM game_page WHERE proj_id = '".$_GET['game']."'";
if ($results = mysqli_query($mysqli, $sql)) {
    $result = mysqli_fetch_assoc($results);
}
else {
    $_SESSION['message_db'] = "SELECT GAME_PAGE ERROR".mysqli_error($mysqli);
    header('Location: templates/error.php');
}
$sql = "SELECT * FROM game_project WHERE id = '".$_GET['game']."'";
if ($results = mysqli_query($mysqli, $sql)) {
    $result_p = mysqli_fetch_assoc($results);
}
else {
    $_SESSION['message_db'] = "SELECT GAME_PROJECT ERROR".mysqli_error($mysqli);
    header('Location: templates/error.php');
}
$sql = "SELECT * FROM game_page_carousel WHERE proj_id = '".$_GET['game']."'";
if ($carousel = mysqli_query($mysqli, $sql)) {
    $carousel_count = $carousel ->num_rows;
}
else {
    $_SESSION['message_db'] = "SELECT GAME_PROJECT ERROR".mysqli_error($mysqli);
    header('Location: templates/error.php');
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Игровой портал</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
     <link rel="icon" href="../img/icon.png">
    <!--    <script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
    <style>
        .myButton {
            /*-moz-box-shadow: 0px 0px 0px 21px #fff6af;*/
            /*-webkit-box-shadow: 0px 0px px 21px #fff6af;*/
            /*box-shadow: 0px 0px 46px 28px #fff6af;*/
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffec64), color-stop(1, #ffab23));
            background:-moz-linear-gradient(top, #ffec64 5%, #ffab23 100%);
            background:-webkit-linear-gradient(top, #ffec64 5%, #ffab23 100%);
            background:-o-linear-gradient(top, #ffec64 5%, #ffab23 100%);
            background:-ms-linear-gradient(top, #ffec64 5%, #ffab23 100%);
            background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffec64', endColorstr='#ffab23',GradientType=0);
            background-color:#ffec64;
            -moz-border-radius:23px;
            -webkit-border-radius:23px;
            border-radius:23px;
            border:5px solid #ffaa22;
            display:inline-block;
            cursor:pointer;
            color:#333333;
            font-family:Impact;
            font-size:24px;
            font-weight:bold;
            padding:17px 47px;
            text-decoration:none;
            text-shadow:0px 1px 18px #a1a1a1;
        }
        .myButton:hover {
            background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffab23), color-stop(1, #ffec64));
            background:-moz-linear-gradient(top, #ffab23 5%, #ffec64 100%);
            background:-webkit-linear-gradient(top, #ffab23 5%, #ffec64 100%);
            background:-o-linear-gradient(top, #ffab23 5%, #ffec64 100%);
            background:-ms-linear-gradient(top, #ffab23 5%, #ffec64 100%);
            background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffab23', endColorstr='#ffec64',GradientType=0);
            background-color:#ffab23;
        }
        .myButton:active {
            position:relative;
            top:1px;
        }

        #shadows {
            box-shadow: 1px 1px 8px 8px #101010;

        }

        .video {
            width: 100%;
            height: 0;
            padding-bottom: 56.25%;
            position: relative;
            margin: 0 auto;
        }
        .video iframe {
            position: absolute;
            width: 100%;
            height: 80%;
        }
        /*div {
            overflow: hidden;
        }*/
    </style>

</head>
<body>

<!--Navbar-->
<?php
if(isset($_COOKIE['user_id'])) {
    include $_SERVER['DOCUMENT_ROOT'] . "/templates/header.php";
}
else {
    include $_SERVER['DOCUMENT_ROOT'] . "/templates/header_default.php";
}
?>
<!--Navbar-->

<!--Game page content-->
<div class="game-page" style="background-color: #1a1a1a;">
    <div class="conteiner">
        <!--img-->
        <div class="hide-box">
            <div class="image">
                <img class="d-block w-100 h-100" src="<?php echo $result['img'];?>">
            </div>
        </div>
        <br>
        <!--img-->
        <div class="row text-center" id="shadows">
            <br>
            <div class="col">
                <a href=""><i class="fab fa-google-play text-white fa-3x"></i></a>
            </div>
            <div class="col">
                <a href=""><i class="fab fa-steam text-white fa-3x"></i></a>
            </div>
            <div class="col">
                <a href=""><i class="fab fa-app-store-ios text-white fa-3x"></i></a>
            </div>
            <div class="col">
                <a href=""><i class="fab fa-playstation text-white fa-3x"></i></a>
            </div>
            <div class="col">
                <a href=""><i class="fab fa-steam text-white fa-3x"></i></a>
            </div>
            <div class="col">
                <a href=""><i class="fab fa-xbox text-white fa-3x"></i></a>
            </div>
        </div>
        <br><br><br>
        <div class="row text-center">
            <div class="col">
                <button class="myButton" >Subscribe on <?php echo $result_p['proj_name'];?></button>
            </div>
        </div>
        <br><br>
        <!--VIDEO-->
        <br>
        <div class="video container">
            <iframe width="560px" height="315px" src="<?php echo $result['video'];?>"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>

        <!--VIDEO-->
        <!--ABOUT-->
        <div class="hide-box" id="shadows">
            <div class="text-center text-white">
                <h1>About <?php echo $result_p['proj_name'];?></h1>
                <p><?php echo $result['about'];?></p>
            </div>
        </div>
        <!--ABOUT-->
        <br><br>
        <!--Carousel-->
        <div class="hide-box">
            <div id="myCarousel" class="h-100 carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                    $i = 0;
                    while ($i < $carousel_count) {
                        if($i < 1) {
                            echo '<li data-target="#myCarousel" data-slide-to=' . $i . ' class="active"></li>';
                        } else {
                            echo '<li data-target="#myCarousel" data-slide-to=' . $i . '></li>';
                        }
                        $i++;
                    }
                    ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                <?php
                $n = 0;
                while($row = mysqli_fetch_assoc($carousel)) {
                    if ($n < 1) {
                        echo '<div class="carousel-item active">';
                    } else {
                        echo '<div class="carousel-item">';
                    }
                    $n = 1;
                    echo "<img class=\"d-block w-100\" src=\" $row[carousel];\" alt=\"$row[proj_id]\">";
                    echo "<div class=\"carousel-caption d-none d-md-block\">";
                    echo "<h3>$row[carousel_title]</h3>";
                    echo "<p>$row[carousel_info]</p>";
                    echo "</div></div>";
                }
                    ?>
            </div>
                <!-- Left and right controls -->
                <?php
                if($carousel_count > 1) {
                    echo '<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">';
                    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                    echo '<span class="sr-only">Previous</span></a>';
                    echo '<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">';
                    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                    echo '<span class="sr-only">Next</span></a>';
                }
                ?>
        </div>
        <!--Carousel-->
    </div>
</div>
</div>
<!--Game page contect-->

<?php
/*$result->free();
$result_p->free();
$carousel->free();
unset($results);
unset($result);
unset($carousel);
unset($result_p);*/
?>

<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] ."/templates/footer.php"; ?>
<!-- Footer -->

<!--JS-->
<!--<script src="templates/signup.js"></script>-->
<!--<script src="/templates/signup.js"></script>-->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<!--JS-->

</body>
</html>