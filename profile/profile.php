<?php

//include $_SERVER['DOCUMENT_ROOT']." profile/secure_check.php";

//include $_SERVER['DOCUMENT_ROOT']."templates/admin.php";
/*include $_SERVER['DOCUMENT_ROOT']." dbconnect_anon_user.php";
$mysqli = dbconnect();
if (isset($_POST[''])) {
    $sql = "SELECT session_id FROM users_data WHERE user_id='."$_COOKIE['user_id']".'";  // check if email exists in db
    $results = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($results) > 0) {
        $session = mysqli_fetch_assoc($results);
        if (strcmp($session, $_COOKIE['s_id']) == 0) {
            $sql = "SELECT id, email, password FROM users WHERE email='."$_COOKIE['email']".'";
            $results = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($results) > 0) {
                $user = mysqli_fetch_assoc($results);

            }
            else {
                $_SESSION['message_db'] = "SELECT USERS ERROR" . mysqli_error($mysqli);
                header('Location:  templates/error.php');
            }
        }
        else {
            $_SESSION['message_db'] = "Your session id is wrong";
            header('Location:  templates/error.php');
        }
    }
    else {
        $_SESSION['message_db'] = "SELECT USER_DATA ERROR" . mysqli_error($mysqli);
        header('Location:  templates/error.php');
    }
}*/

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Игровой портал</title>
    <link rel="icon" href=" img/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=" css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet">
</head>
<body>

<!--Navbar-->
<?php include $_SERVER['DOCUMENT_ROOT']."/templates/header.php"; ?>
<!--Navbar-->

<div class="content">
    <br>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link btn-primary tab text-white" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
               role="tab"
               aria-controls="v-pills-profile" aria-selected="false">Account Settings</a>
        </li>
       <!-- <li class="nav-item">
            <a class="nav-link btn-primary tab text-white" id="v-pills-game-settings-tab" data-toggle="pill"
               href="#v-pills-game-settings" role="tab"
               aria-controls="v-pills-game-settings" aria-selected="false">Game Page Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-primary tab text-white" id="v-pills-settings-home-tab" data-toggle="pill"
               href="#v-pills-settings-home" role="tab"
               aria-controls="v-pills-settings-home" aria-selected="false">Home Page Settings</a>
        </li>-->
    </ul>
    <div class="text-center">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                 aria-labelledby="v-pills-profile" style="min-height: 70vh; margin-right: 10px; margin-left: 10px">
            </div>
            <div class="tab-pane fade" id="v-pills-game-settings" role="tabpanel"
                 aria-labelledby="v-pills-game-settings"
                 style="min-height: 70vh; margin-right: 10px; margin-left: 10px">
                <br>
                <h2 class="text-white">Game Page Settings</h2>
                <br><br>
                <div class="row text-center">
                    <div class="col-md-3 col-lg-3"></div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <select class="select2" id="select2" style="width: 90%" name="state"">
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-3"></div>
                </div>
                <div id="content-searched">

                </div>
                <?php //include $_SERVER['DOCUMENT_ROOT'] . " profile/admins/game_page_settings.php"; ?>
            </div>
            <div class="tab-pane fade" id="v-pills-settings-home" role="tabpanel"
                 aria-labelledby="v-pills-settings-home"
                 style="min-height: 70vh; margin-right: 10px; margin-left: 10px">
                <?php include $_SERVER['DOCUMENT_ROOT'] . " profile/admins/home_page_settings.php"; ?>
            </div>
        </div>
    </div>
</div>


<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT']."/templates/footer.php"; ?>
<!-- Footer -->

<!--JS-->
<!--<script src="templates/signup.js"></script>-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src=" profile/subscribers/subscriber.js"></script>
<!--JS-->

</body>
</html>