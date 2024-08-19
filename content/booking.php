<?php
    session_start();

    include("../misc/variables.php");
    include("../misc/functions.php");
    include("../db/database.php");

    $currentPage = "booking.php";
    $eventId = getEventIdFromUrl();

    // if user is not logged in, it redirects to the login page
    if (!isUserLoggedIn()) {
        $alertMessage = "you need to log in to book event";
        $alertType = "alert-error";
        $eventID = getEventIdFromUrl();

        setDestinationAfterLogin("booking.php?$G_eventID=$eventID");
        header("Location: log-in.php?$G_alertMessage=$alertMessage&$G_alertType=$alertType");
        exit(); // Ensure that the script stops execution after the redirect
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/style.css">
    <link rel="stylesheet" href="../assets/stylesheets/normalize.css">
    <title>Booking</title>
</head>
<body>
    <?php
        include("../components/header.php");
        displayAlertsIfAny();
    ?>
    <main>
        <?php
            include("../components/sections/book-event-section.php");
        ?>
    </main>
    <?php
        include("../components/footer.php");        
    ?>
    <script src="../scripts/nav-toggle.js"></script>
</body>
</html>