<?php
    // default port is `3306
    $db_server = "localhost:3307";
    $db_user = "root";
    $db_pass = "";
    $db_name = "discourse_hub";
    $conn = "";

    try {
        $conn = mysqli_connect(
            $db_server,
            $db_user,
            $db_pass,
            $db_name
        );
    } catch(mysqli_sql_exception) {
        echo "db connection failed" . "<br>";        
    }
?>