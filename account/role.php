<?php
$role_1 = "admin";
$role_2 = "subscriber";
function set_role($user_role) {
    $role_1 = "admin";
    $role_2 = "subscriber";
    $url_1 = "profile/profile_admin.php";
    $url_2 = "profile/profile.php";

    if(strcmp($user_role, $role_1) == 0) {
       return $url_1;
    }
    else {
        return $url_2;
    }
}
?>
