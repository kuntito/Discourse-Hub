<?php
    session_start();

    include("../misc/variables.php");
    include("../misc/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/style.css">
    <link rel="stylesheet" href="../assets/stylesheets/normalize.css">
    <title>Log out</title>
</head>
<body>
    <?php    
        if (isUserLoggedIn()) {
            onLogout();
        } else {
            include("../components/forbidden-resource.php");
        }
    ?>
</body>
</html>