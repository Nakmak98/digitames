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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.ihavecookies.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('body').ihavecookies({
                title: '&#x1F36A; Разрешить сайту принимать Cookie?',
                message: 'На этом сайте не используются файлы cookie, соглашаясь вы предоставите возможность принимать файли куки, или можете их настроить самостоятельно',
                delay: 600,
                expires: -1,
                link: 'cookies_rules.php',
                onAccept: function(){
                    var myPreferences = $.fn.ihavecookies.cookie();
                    console.log('Yay! The following preferences were saved...');
                    console.log(myPreferences);
                },
                uncheckBoxes: true,
                acceptBtnLabel: 'Соглашаюсь',
                moreInfoLabel: 'Больше информации',
                cookieTypesTitle: 'Выберите, файлы куки которые хотите принимать:',
                fixedCookieTypeLabel: 'Основное',
                fixedCookieTypeDesc: 'These are essential for the website to work correctly.'
            });

            if ($.fn.ihavecookies.preference('marketing') === true) {
                console.log('This should run because marketing is accepted.');
            }
        });
    </script>
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