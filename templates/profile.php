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
    <!--    <script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
</head>
<body>

<!--Navbar-->
<?php include $_SERVER['DOCUMENT_ROOT']."templates/header.php"; ?>
<!--Navbar-->

<div class="messages content text-center  text-white" style="height: 90vh;">
<div class="row">
    <div class="col-sm-2">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
               aria-controls="v-pills-profile" aria-selected="true">Account Settings</a>
            <a class="nav-link" id="v-pills-games-tab" data-toggle="pill" href="#v-pills-games" role="tab"
               aria-controls="v-pills-games" aria-selected="false">Games</a>
            <a class="nav-link" id="v-pills-subs-tab" data-toggle="pill" href="#v-pills-subs" role="tab"
               aria-controls="v-pills-subs" aria-selected="false">Subscriptions</a>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h2>Account settings</h2>
            </div>
            <div class="tab-pane fade" id="v-pills-games" role="tabpanel" aria-labelledby="v-pills-games-tab">
                <h2>Games</h2>
            </div>
            <div class="tab-pane fade" id="v-pills-subs" role="tabpanel" aria-labelledby="v-pills-subs-tab">
                <h2>Subscriptions</h2>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT']."templates/footer.php"; ?>
<!-- Footer -->

<!--JS-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="templates/subscriber.js"></script>
<!--JS-->

</body>
</html>