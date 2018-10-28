<?php
session_start();

unset($_SESSION['message_db']);
unset($_SESSION['message_login']);
/*if(isset($_COOKIE['password']) && isset($_COOKIE['email'])){

}*/
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    include $_SERVER['DOCUMENT_ROOT']."/dbconnect_anon_user.php";
    //include $_SERVER['DOCUMENT_ROOT']."account/role.php";
    $role_1="admin";
    $mysqli = dbconnect();
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $sql = "SELECT id, password FROM users WHERE email='$email'";
    $results = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($results) > 0) {
        $user_id = mysqli_fetch_assoc($results);
        if(password_verify($password, $user_id['password'])) {
            setcookie("user_id", $user_id['id'], time() + (86400 * 30), "/gamesite");
            if (isset($_POST['save_data'])) {
                setcookie("email", $email, time() + (86400 * 30), "/gamesite");
                setcookie('s_id', session_id(), time() + (86400 * 30), "/gamesite");
                //setcookie( 'password', $password,time() + (86400 * 30), "/gamesite");
            }
            else {
                setcookie("email", $email, time() + (7200), "/gamesite");
                setcookie('s_id', session_id(), time() + (7200), "/gamesite");
            }
            $sql = "UPDATE user_data SET session_id='" . $_COOKIE['s_id'] . "' WHERE user_id='" . $_COOKIE['user_id'] . "'";
            if (mysqli_query($mysqli, $sql)) {
                $sql = "SELECT role FROM user_role WHERE user_id='$user_id'";
                if ($results = mysqli_query($mysqli, $sql)) {
                    $user_role = mysqli_fetch_assoc($results);
                    setcookie("user_role", $user_role['role'], time() + (86400 * 30), "/gamesite");
                    header('Location: profile/profile.php');
                }
                else {
                    $_SESSION['message_db'] = "SELECT USER_ROLE ERROR" . mysqli_error($mysqli);
                    header('Location: templates/error.php');
                }
            }
            else {
                $_SESSION['message_db'] = "INSERT USER_DATA ERROR" . mysqli_error($mysqli);
                header('Location: templates/error.php');
            }
        }
        else {
            $_SESSION['message_login'] = "Incorrect password!";
        }
    }
    else {
        $_SESSION['message_login'] = "User with this email doesn't exists!";
    }
}
?>
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
<?php include $_SERVER['DOCUMENT_ROOT']."/templates/header_default.php"; ?>
<!--Navbar-->

<div class="login h-100">
    <div class="container text-white">
        <h2 style="text-align:center">Login with Social Media or Manually</h2>
        <br>
        <div class="dropdown-divider"></div>
        <br>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <h3 class="text-center">Login with social media</h3>
                <br><br>
                <a href="#" class="twitter btn text-white">
                    <i class="fab fa-twitter fa-fw"></i> Login with Twitter
                </a>
                <a href="#" class="google btn text-white"><i class="fab fa-google fa-fw">
                    </i> Login with Google+
                </a>
                <a href="#" class="steam btn text-white"><i class="fab fa-steam fa-fw">
                    </i> Login with Steam
                </a>
            </div>
            <div class="col-sm-2">
                <br><br>
                <div class="vl">
                    <span class="vl-innertext">or</span>
                </div>
                <div class="hide-md-lg">
                    <br>
                    <p>Or sign in manually:</p>
                </div>
            </div>
            <div class="col-sm-4 rt-col">
                <form method="POST" action="account/login.php">
                    <h3 class="text-center">Sign in</h3>
                    <div class="alert alert-error"><?php
                        if(isset($_SESSION['message_login'])) { echo $_SESSION['message_login']; }
                        ?></div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">Email</p></label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $_COOKIE['email']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputPassword4">Password</p></label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $_COOKIE['password']; ?>" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="save_data" value="YES">Remember me
                        </label>
                    </div>
                    <br>
                    <div class="g-recaptcha" data-sitekey="your_site_key" data-theme="dark"></div>
                    <br><br>
                    <!--<button type="submit" class="btn btn-primary " id="reg_btn">Create account</button>-->
                    <input type="submit" class="btn btn-primary " value="Login" id="reg_btn" name="login">
                    <br><br>
                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <p>Don't have an account? Create now!</p>
                <a href="account/registration.php" method="post">
                    <button class="btn btn-primary" id="sup">Create account</button>
                </a>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4" >
                <a href="#" method="post" class="text-white" style="align: right">
                    Forgot your password?
                </a>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

</div>


<!-- Footer -->
<?php include $_SERVER['DOCUMENT_ROOT']."/templates/footer.php"; ?>
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