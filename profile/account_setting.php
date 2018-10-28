<?php
include $_SERVER['DOCUMENT_ROOT']."dbconnect_anon_user.php";
$mysqli = dbconnect();
session_start();

$sql = "SELECT * FROM users WHERE id='".$_COOKIE['user_id']."'";
$results = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($results) > 0) {
    $users = mysqli_fetch_assoc($results);
} else {
    $_SESSION['message_db'] = "SELECT USERS ERROR".mysqli_error($mysqli);
    header('Location: templates/error.php');
}
$sql = "SELECT * FROM user_data WHERE user_id='".$_COOKIE['user_id']."'";
$results = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($results) > 0) {
    $user_data = mysqli_fetch_assoc($results);
} else {
    $_SESSION['message_db'] = "SELECT USER_DATA ERROR".mysqli_error($mysqli);
    header('Location: templates/error.php');
}

if (isset($_POST['profile_tab'])) {
    $sql = "SELECT * FROM users WHERE email='".$_COOKIE['email']."'";
    $results = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($results) > 0) {
        $sql = "SELECT * FROM user_data WHERE user_id='".$_COOKIE['user_id']."'";
        $results_data = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($results_data) > 0) {
            $user = mysqli_fetch_assoc($results);
            $user_data = mysqli_fetch_assoc($results_data);
        }  else {
            $_SESSION['message_db'] = "SELECT USER_DATA 2 ERROR" . mysqli_error($mysqli);
            header('Location: templates/error.php');
        }
    } else {
        $_SESSION['message_db'] = "SELECT USERS 1 ERROR" . mysqli_error($mysqli);
        header('Location: templates/error.php');
    }
}
if (isset($_POST['submit'])) {
    if(isset($_POST['new_password']) && isset($_POST['confirm_new_password'])) {
        if (strcmp($_POST['new_password'], $_POST['confirm_new_password'])) {
            $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            if(strcmp($_COOKIE['email'], $_POST['email']) != 0) {
                $sql = "INSERT INTO users (email, password)
                      VALUES ('" . $_POST['email'] . "', '$password') WHERE user_id = '" . $_COOKIE['user_id'] . "'";
                if (mysqli_query($mysqli, $sql)) {

                }
            } else {
                $sql = "INSERT INTO users (password)
                      VALUES ('$password') WHERE user_id = '" . $_COOKIE['user_id'] . "'";
                if (mysqli_query($mysqli, $sql)) {

                }
            }
            if(isset($_POST['nickname'])) {

            }
        } else {
            $_SESSION['message_password'] = "Passwords don't match!";
        }
    }
}
?>

<br>
<h2 class="text-white">Hello admin!</h2>
<br>
<div class="account settings">
    <div class="container text-white">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h3 class="text-center">Account settings:</h3>
                <form method="POST" action="templates/profile/php#v-pills-profile">
                    <div class="alert alert-error"><?php
                        if(isset($_SESSION['message_password'])) { echo $_SESSION['message_password']; }
                        //if(isset($_SESSION['message_email'])) { echo $_SESSION['message_email']; }
                        ?></div>
                    <div class="form-row">
                        <div class="form-group col-sm-5">
                            <label for="inputEmail4">Nickname:</label>
                            <input type="text" class="form-control" id="new_nickname" placeholder="nickname" name="nickname" required>
                            <br>
                            <label for="inputEmail4">Email:</label>
                            <input type="email" class="form-control" id="new_email" placeholder="Email" name="email" value="<?php echo $users['email']; ?>" required>
                        </div>
                        <div class="form-group col-sm-2"></div>
                        <div class="form-group col-sm-5">
                            <label for="inputPassword4">New Password:</label>
                            <input type="password" class="form-control" id="new_password" placeholder="Password" name="new_password" required>
                            <br>
                            <label for="inputPassword4">Confirm New Password:</label>
                            <input type="password" class="form-control" id="new_password" placeholder="Confirm Password" name="confirm_new_password" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-sm-5">
                            <label for="inputAddress">Your age:</label>
                            <!--                                            <input type="text" class="form-control" id="age" name="age"  required>-->
                            <select class="custom-select" id="age" name="age" required>
                                <option selected disabled value="<?php echo $user_data['age'];?>"><?php echo $user_data['age'];?></option>
                                <option value="3">Older than 3</option>
                                <option value="7">7-11</option>
                                <option value="12">12-15</option>
                                <option value="16">16-17</option>
                                <option value="18">18 or above</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-5">
                            <label for="inputAddress">Your region*</label>
                            <select class="custom-select" id="region" name="region" required>
                                <option selected disabledvalue="<?php echo $user_data['region'];?>"><?php echo $user_data['region'];?></option>
                                <option value="af">Africa</option>
                                <option value="as">Asia</option>
                                <option value="eu">Europe</option>
                                <option value="na">North America</option>
                                <option value="sa">South America</option>
                                <option value="au">Oceanic</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <!--<button type="submit" class="btn btn-primary " id="reg_btn">Create account</button>-->
                    <input type="submit" class="btn btn-primary " value="Save changes" id="reg_btn" name="register">
                    <br><br>
                </form> <!-- /form -->
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

</div>