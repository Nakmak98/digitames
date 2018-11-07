<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Игровой портал</title>
    <link rel="icon" href="img/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<body>
<!--Navbar-->
<?php include $_SERVER['DOCUMENT_ROOT']."templates/header_default.php"; ?>
<!--Navbar-->
<div class="messages content text-center  text-white" style="height: 90vh;">
    <br><br>
    <h1>Welcome!</h1>
    <h2>You have successfully created your account!</h2>
    <h2>
        <?php
        session_start();
        if(!empty($_SESSION['message_db'])){
            echo $_SESSION['message_db'];
        }
        if(!empty($_SESSION['message'])){
            echo $_SESSION['message'];
        }
        ?>
    </h2>
    <br><br><br>
    <a href="index.php" class="text-green">
        <button class="btn btn-primary" id="sup">Go back to home page</button>
    </a>
</div>
<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT']."templates/footer.php"; ?>
<!-- Footer -->

<!--JS-->
<!--<script src="templates/signup.js"></script>-->
<!--<script src="/templates/signup.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<!--JS-->

</body>
</html>