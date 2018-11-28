<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Игровой портал</title>
    <link rel="icon" href="../img/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <!--    <script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
</head>
<body>
{{ test }}
<?php include "header_default.php"; ?>

<div class="login h-100">
    <div class="container text-white">
        <br>
        <div class="dropdown-divider"></div>
        <br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 rt-col">
                <form method="POST" action="account/login.php">
                    <h3 class="text-center">Sign in</h3>
                    <div class="alert alert-error"><?php
                        if(isset($_SESSION['message_login'])) { echo $_SESSION['message_login']; }
                        ?></div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">Email</p></label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputPassword4">Password</p></label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
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
            <div class="col-sm-3"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <p>Don't have an account? Create now!</p>
                <a href="account/registration.php" method="post">
                    <button class="btn btn-primary" id="sup">Create account</button>
                </a>
            </div>
            <div class="col-sm-3">
                <a href="#" method="post" class="text-white" style="align: right">
                    Forgot your password?
                </a>
            </div>
            <div class="col-sm-3"></div>
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