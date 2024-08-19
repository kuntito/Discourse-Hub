<?php
    session_start();
    
    include("../misc/variables.php");
    include("../misc/functions.php");
    include("../db/database.php");

    $currentPage = "talks.php";

    // login destination is the page the user is redirected to if they login from the this page
    setDestinationAfterLogin("talks.php");

?>
<?php
    function getTalksCount($conn) {
        $talksCount = 0;
        $getTalksCount = "SELECT COUNT(eventID) AS talk_count FROM `events`";
        $queryResult = mysqli_query($conn, $getTalksCount);
    
        if (mysqli_num_rows($queryResult) > 0) {
            $row = mysqli_fetch_assoc($queryResult);
            $talksCount = $row["talk_count"];
        }

        return $talksCount;
    }

    function getPageCount($itemCount, $itemsPerPage) {
        $quotient = intdiv($itemCount, $itemsPerPage);
        $remainder = $itemCount%$itemsPerPage;

        $pageCount = $quotient + (($remainder > 0) ? 1 : 0);

        return $pageCount;
    }

    function getTalksForPage($conn, $pageNumber, $talksPerPage) {
        $offset = ($pageNumber - 1) * $talksPerPage;

        $query = "SELECT * FROM events ORDER BY `event_date` LIMIT $offset, $talksPerPage;";
        $queryResult = mysqli_query($conn, $query);
        
        $talks = array();
        
        if (mysqli_num_rows($queryResult) > 0) {
            while ($row = mysqli_fetch_assoc($queryResult)) {
                $talks[] = $row;
            }
        }

        return $talks;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stylesheets/style.css">
    <link rel="stylesheet" href="../assets/stylesheets/normalize.css">
    <title>talks</title>
</head>
<body>
    <?php
        $talksPerPage = 6;
        $itemCount = getTalksCount($conn);
        $pageCount = getPageCount($itemCount, $talksPerPage);
    
        $currentPageNumber = getPaginationPageFromUrl();
    
        if (($currentPageNumber < 1) || ($currentPageNumber > $itemCount)) {
            include("../components/forbidden-resource.php");
        }

        $allTalks = getTalksForPage($conn, $currentPageNumber, $talksPerPage);
    ?>
    <?php
        include("../components/header.php");
        displayAlertsIfAny();
    ?>
    <main>
        <?php
            include("../components/sections/all-talks-section.php");
        ?>
    </main>
    <?php
        include("../components/footer.php");        
    ?>
    <script src="../scripts/nav-toggle.js"></script>
    <script src="../scripts/event-card-resize-handler.js"></script>
</body>
</html>