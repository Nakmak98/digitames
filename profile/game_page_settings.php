<?php
session_start();

if(isset($_REQUEST['id'])) {
    include $_SERVER['DOCUMENT_ROOT'] . "dbconnect_anon_user.php";
    $mysqli = dbconnect();

    $sql = "SELECT * FROM game_page WHERE proj_id='" . $_REQUEST['id'] . "'";
    //$results = mysqli_query($mysqli, $sql);
    if ($results = mysqli_query($mysqli, $sql))
    {
        $game_page = mysqli_fetch_assoc($results);
    }
    else
    {
        $_SESSION['message_db'] = "SELECT GAME_PAGE ERROR" . mysqli_error($mysqli);
        header('Location: templates/error.php');
    }

    $sql = "SELECT * FROM proj_platform WHERE proj_id='" . $_REQUEST['id'] . "'";
    //$results = mysqli_query($mysqli, $sql);

    if ($results = mysqli_query($mysqli, $sql))
    {
        $proj_platform = mysqli_fetch_assoc($results);
    }
    else
    {
        $_SESSION['message_db'] = "SELECT PROJ_PLATFORM ERROR" . mysqli_error($mysqli);
        header('Location: templates/error.php');
    }

    $sql = "SELECT * FROM proj_service WHERE proj_id='" . $_REQUEST['id'] . "'";
    //$results = mysqli_query($mysqli, $sql);

    if ($results = mysqli_query($mysqli, $sql))
    {
        $proj_service = mysqli_fetch_assoc($results);
    }
    else
    {
        $_SESSION['message_db'] = "SELECT PROJ_SERVICE ERROR" . mysqli_error($mysqli);
        header('Location: templates/error.php');
    }
    $sql = "SELECT * FROM game_page_carousel WHERE proj_id='" . $_REQUEST['id'] . "'";
    //$results = mysqli_query($mysqli, $sql);

    if ($results_c = mysqli_query($mysqli, $sql))
    {

    }
    else
    {
        $_SESSION['message_db'] = "SELECT GAME_PAGE_CAROUSEL ERROR" . mysqli_error($mysqli);
        header('Location: templates/error.php');
    }
}

if(isset($_POST['add_changes'])) {

    if(!isset($_POST['video'])) {
        $_POST['video'] = "NULL";
    }
    if(!isset($_POST['about'])) {
        $_POST['video'] = "NULL";
    }

    if(!isset($_FILES['img'])) {

    }
    if(isset($_FILES['img'])) {

    }
}
?>

<div class="row text-center text-white" id="gamePage">
    <div class="col-mg-3 col-lg-3"></div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <form method="POST" action="account/login.php">
            <div class="alert alert-error"><?php
                if (isset($_SESSION['message_login'])) {
                    echo $_SESSION['message_login'];
                }
                ?></div>
            <br>
            <div class="dropdown-divider"></div>
            <br>
            <h3>Main content</h3><br>
            <div class="form-row">
                <div class="form-group col">
                    <label for="file_img">Image</label>
                    <input type="file" class="form-control" id="file_img" placeholder="File" name="img" value="<?php if(isset($game_page['img'])) echo $game_page['img']; ?>">
                </div>
                <div class="form-group col">
                    <label for="video">Video</label>
                    <input type="text" class="form-control" id="video" placeholder="Insert URL of the video" name="video" value="<?php if(isset($game_page['video'])) echo $game_page['video']; ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="about">About Game</label>
                    <input type="text" class="form-control" id="about" placeholder="Game description" name="about" value="<?php if(isset($game_page['about'])) echo $game_page['about']; ?>">
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <h3>Select available platforms</h3>
            <div class="form-row text-left">
                <div class="form-group col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_platform['pc']) ? '1' : '0');?>" id="platformCheck1" <?php if(isset($proj_platform['pc'])) echo "checked"?>>
                        <label class="form-check-label" for="platformCheck1">
                            PC
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_platform['android']) ? '1' : '0');?>" id="platformCheck2" <?php if(isset($proj_platform['android'])) echo "checked"?>>
                        <label class="form-check-label" for="platformCheck2">
                            Android
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_platform['ios']) ? '1' : '0');?>" id="platformCheck3" <?php if(isset($proj_platform['ios'])) echo "checked"?>>
                        <label class="form-check-label" for="platformCheck3">
                           IOS
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_platform['ps']) ? '1' : '0');?>" id="platformCheck4" <?php if(isset($proj_platform['ps'])) echo "checked"?>>
                        <label class="form-check-label" for="platformCheck4">
                            PlayStation
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_platform['xbox']) ? '1' : '0');?>" id="platformCheck5" <?php if(isset($proj_platform['xbox'])) echo "checked"?>>
                        <label class="form-check-label" for="platformCheck5">
                            Xbox
                        </label>
                    </div>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <h3>Select available services</h3>
            <div class="form-row text-left">
                <div class="form-group col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_service['steam']) ? '1' : '0');?>" id="serviceCheck1" <?php if(isset($proj_service['steam'])) echo "checked"?>>
                        <label class="form-check-label" for="serviceCheck1">
                            Steam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_service['gog']) ? '1' : '0');?>" id="serviceCheck2" <?php if(isset($proj_service['gog'])) echo "checked"?>>
                        <label class="form-check-label" for="serviceCheck2">
                            Gog
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_service['origin']) ? '1' : '0');?>" id="serviceCheck3" <?php if(isset($proj_service['origin'])) echo "checked"?>>
                        <label class="form-check-label" for="serviceCheck3">
                            Origin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_service['ps_store']) ? '1' : '0');?>" id="serviceCheck5" <?php if(isset($proj_service['ps_store'])) echo "checked"?>>
                        <label class="form-check-label" for="serviceCheck5">
                            Playstation Store
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_service['microsoft_xbox']) ? '1' : '0');?>" id="serviceCheck6" <?php if(isset($proj_service['microsoft_xbox'])) echo "checked"?>>
                        <label class="form-check-label" for="serviceCheck6">
                            Microsoft Xbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_service['google_play']) ? '1' : '0');?>" id="serviceCheck7" <?php if(isset($proj_service['google_play'])) echo "checked"?>>
                        <label class="form-check-label" for="serviceCheck7">
                            Google Play
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo(isset($proj_service['app_store']) ? '1' : '0');?>" id="serviceCheck8" <?php if(isset($proj_service['app_store'])) echo "checked"?>>
                        <label class="form-check-label" for="serviceCheck8">
                            App store
                        </label>
                    </div>
                </div>
            </div>
<!--            while from-->
            <?php
            $num_rows=1;
            while($game_page_carousel = mysqli_fetch_assoc($results_c)){
                include $_SERVER['DOCUMENT_ROOT'] . " profile/admins/game_page_carousel.php";
                $num_rows++;
            }
            ?>
            <div class="dropdown-divider"></div>
            <h3>Add New Slider <?php echo $num_rows++;?></h3><br>
            <div class="form-row">
                <div class="form-group col">
                    <label for="file_slider">Image for Slider</label>
                    <input type="file" class="form-control" id="file_slider<?php echo $num_rows;?>" placeholder="File" name="slider">
                </div>
                <div class="form-group col">
                    <label for="slider_title">Slider title</label>
                    <input type="text" class="form-control" id="slider_title<?php echo $num_rows;?>" placeholder="Slider Title" name="slider_title">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="slider_info">Slider info</label>
                    <input type="text" class="form-control" id="slider_info<?php echo $num_rows;?>" placeholder="Slider info" name="slider_info">
                </div>
            </div>
<!--            while to-->
            <input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="add_changes_id">
            <input type="submit" class="btn btn-primary " value="Add changes" id="addChanges" name="add_changes">
            <br><br>
        </form>
    </div>
    <div class="col-mg-3 col-lg-3"></div>
</div>