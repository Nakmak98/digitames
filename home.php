<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Игровой портал</title>
    <link rel="icon" href=" img/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/navbar.js"></script>
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

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/templates/container.php";
?>



<!-- Footer -->
<?php include "templates/footer.php"; ?>
<!-- Footer -->

<!--JS-->
<!--<script src="templates/signup.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("img").onclick(function () {
            // Get the src of the image
            var game = $(this).attr("id");

            // Send Ajax request to backend.php, with src set as "img" in the POST data
            $.post(" game_trans.php", {"game": game});
        });
    });
</script>
<!--JS-->

</body>
</html>