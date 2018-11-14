<?php
session_start();

unset($_SESSION['message_email']);
unset($_SESSION['message_password']);
unset($_SESSION['message_db']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //if ($_POST['new_password'] == $_POST['confirm_password']) { //matching passwords
        // connecting to db
        include $_SERVER['DOCUMENT_ROOT']."dbconnect_anon_user.php";

        $mysqli = dbconnect();

        $email = $mysqli->real_escape_string($_POST['new_email']);
        $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $sql = "SELECT id FROM users WHERE email='$email'";  // check if email exists in db
        $results = mysqli_query($mysqli, $sql);
        if ($results->num_rows > 0) { //email exists == true
            $_SESSION['message_email'] = "Account with this email already existed.";
        }
        else { //email exists == false
            $sql = "INSERT INTO users (email, password)
                      VALUES ('$email', '$password')";
             // email and password inserted
            if (mysqli_query($mysqli, $sql)) {
                $sql = "SELECT id FROM users WHERE email='$email'";
                $results = mysqli_query($mysqli, $sql);
                if (mysqli_num_rows($results) > 0) {
                    $user_id = mysqli_fetch_assoc($results); // getting user id
                    $sql = "INSERT INTO user_data (user_id, age, region) VALUES ('".$user_id['id']."', '" . $_POST['age'] . "', '" . $_POST['region'] . "')";
                    if (mysqli_query($mysqli, $sql)) {
                        $role = "subscriber";
                        $sql = "INSERT INTO user_role (user_id, role) VALUES ('".$user_id['id']."', '".$role."')";
                        if (mysqli_query($mysqli, $sql)) {
                            //setcookie("user_id", $user_id, time() + (86400 * 30), "/gamesite");
                            //setcookie("email", $email, time() + (86400 * 30), "/gamesite");
                            unset($sql);
                            unset($user_id);
                            unset($email);
                            unset($password);
                            unset($results);
                            unset($_SESSION['message_email']);
                            mysqli_close($mysqli);
                            header('Location: templates/welcome.php');
                        }
                        else {
                            $_SESSION['message_db'] = "INSERT USER_ROLE ERROR".mysqli_error($mysqli);
                            header('Location: templates/error.php');
                        }
                    }
                    else {
                        $_SESSION['message_db'] = "INSERT USER_DATA ERROR".mysqli_error($mysqli);
                        header('Location: templates/error.php');
                    }
                }
                else {
                    $_SESSION['message_db'] = "SELECT USER_ID ERROR".mysqli_error($mysqli);
                    header('Location: templates/error.php');
                }
            }
            else {
                $_SESSION['message_db'] = "INSERT USER ERROR".mysqli_error($mysqli);
                header('Location: templates/error.php');
                }
        }
/*    }
    else {
        $_SESSION['message_password'] = "Password doesn't match";
    }*/
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
    <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/js/navbar.js"></script>
</head>
<body>

<!--Navbar-->
<?php include $_SERVER['DOCUMENT_ROOT']."/templates/header_default.php"; ?>
<!--Navbar-->

<div class="sign">
    <div class="container text-white">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <form method="POST" action="account/registration.php">
                    <h2 class="text-center">Sign up</h2>
                    <div class="alert alert-error"><?php
                        if(isset($_SESSION['message_password'])) { echo $_SESSION['message_password']; }
                        if(isset($_SESSION['message_email'])) { echo $_SESSION['message_email']; }
                        ?></div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">Email*</p></label>
                            <input type="email" class="form-control" id="new_email" placeholder="Email" name="new_email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputPassword4">Password*</p></label>
                            <input type="password" class="form-control" id="new_password" placeholder="Password" name="new_password" required>
                        </div>
                    </div>
                   <!-- <div class="form-row">
                        <div class="form-group col">
                            <label for="inputPassword4">Confirm Password*</p></label>
                            <input type="password" class="form-control" id="new_password" placeholder="Password" name="confirm_password" required>
                        </div>
                    </div>-->
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputAddress">Select your age*</label>
                            <select class="custom-select" id="age" name="age" required>
                                <option selected disabled value=''>Select your age</option>
                                <option value="3">3-6</option>
                                <option value="7">7-11</option>
                                <option value="12">12-15</option>
                                <option value="16">16-17</option>
                                <option value="18">18+</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputAddress">Select your region*</label>
                            <select class="custom-select" id="region" name="region" required>
                                <option selected disabled value=''>Select your region</option>
                                <option value="af">Africa</option>
                                <option value="as">Asia</option>
                                <option value="eu">Europe</option>
                                <option value="na">North America</option>
                                <option value="sa">South America</option>
                                <option value="au">Oceanic</option>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="g-recaptcha" data-sitekey="your_site_key" data-theme="dark"></div>
                    <br><br>
                    <!--<button type="submit" class="btn btn-primary " id="reg_btn">Create account</button>-->
                    <input type="submit" class="btn btn-primary " value="Create account" id="reg_btn" name="register">
                    <br><br>
                </form> <!-- /form -->
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4 rt-col">
                <br><br>
                    <p>Already have account?</p>
                    <a href="login.php">
                        <button class="btn btn-primary">Login with your account</button>
                    </a>
                    <br><br>
                    <p>Here is terms of user. We won't share your date.
                        We will only collecting it for our personal statistic and
                        so you will be enable to get some additional featured on our website.</p>
            </div>
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

