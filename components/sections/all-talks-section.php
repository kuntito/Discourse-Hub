<section class="all-talks-section section-container">
    <div class="section-header-text">
        <?php
            if ($itemCount == 0) {
                echo "No upcoming talks";
            } else {
                echo "Talks";
            }
        ?>
    </div>
    <div class="main-content">
        <div class="talks-container">
            <?php
                foreach($allTalks as $talkEvent) {
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
        <?php
            include("../components/all-talks-pagination.php");
        ?>
    </div>
</section>