<?php
    session_start();

    include("../misc/variables.php");
    include("../misc/functions.php");
    include("../db/database.php");

    $currentPage = "index.php";

    // login destination is the page the user is redirected to if they login from the this page
    setDestinationAfterLogin("talks.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/style.css">
    <link rel="stylesheet" href="../assets/stylesheets/normalize.css">
    <title>Index</title>
</head>
<body class="index-page">
    <?php
        include("../components/header.php");
        displayAlertsIfAny();
    ?>
    <main>
        <?php
            include("../components/sections/hero-section.php");
            include("../components/sections/featured-talks-section.php");
            include("../components/sections/about-us-section.php");
            ?>
    </main>
    <div class="opening-times-and-footer">
        <?php
            include("../components/opening-hours.php");
            include("../components/footer.php");        
        ?>
    </div>
    <script src="../scripts/nav-toggle.js"></script>
    <script src="../scripts/event-card-resize-handler.js"></script>
</body>
</html>