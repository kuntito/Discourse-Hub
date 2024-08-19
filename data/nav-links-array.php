<?php
    $nav_links_array = array(
        "home" => array("link" => "index.php", "is_mobile_only" => false),
        "talks" => array("link" => "talks.php", "is_mobile_only" => false),
        "credits" => array("link" => "credits.php", "is_mobile_only" => false),
    );
    
    if (isUserLoggedIn()) {
        $nav_links_array["log out"] = array("link" => "log-out.php?$G_prevPage=$currentPage", "is_mobile_only" => true);
    } else {
        $nav_links_array["log in"] = array("link" => "log-in.php", "is_mobile_only" => true);
        $nav_links_array["sign up"] = array("link" => "sign-up.php", "is_mobile_only" => true);
    }
?>