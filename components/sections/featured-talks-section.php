<?php
    function getFeaturedTalks($conn) {

        $query = "SELECT * FROM events WHERE `is_featured` = 1 ORDER BY `event_date`;";
        $queryResult = mysqli_query($conn, $query);
        
        $featuredTalks = array();
        
        if (mysqli_num_rows($queryResult) > 0) {
            while ($row = mysqli_fetch_assoc($queryResult)) {
                $featuredTalks[] = $row;
            }
        }

        return $featuredTalks;
    }
?>
<section class="section-container featured-talks-section">
    <div class="section-header-text">Featured Talks</div>
    <div class="main-content">
        <div class="talks-container">
            <?php
                $featuredTalks = getFeaturedTalks($conn);
                foreach($featuredTalks as $talkEvent) {
                    $eventID = $talkEvent["eventID"];
                    $eventTitle = $talkEvent["event_title"];
                    $eventSpeaker = $talkEvent["event_speaker"];
                    $eventImagePath = $talkEvent["event_imagepath"];
    
    
                    $eventDateTime = $talkEvent["event_date"];
                    $res = extractDateAndTime($eventDateTime);
                    $eventDate = $res[0];
                    $eventTime = $res[1];

                    include("../components/event-card.php");
                }
            ?>
        </div>
        <div class="link">
            <a href="talks.php">view all talks</a>
        </div>
    </div>
</section>