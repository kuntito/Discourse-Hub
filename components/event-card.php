<?php
    // dummy values
    // $eventID = "1";
    // $eventTitle = "The art of free throws";
    // $eventSpeaker = "Portable";
    // $eventImagePath = "../assets/images/img_rec.jpg";
    // $eventDate = "Friday, 13 August";
    // $eventTime = "21:00";
?>
<div class="event-card event-card--lg" id="<?php echo $eventID; ?>">
    <div class="top-section">
        <a href="event-details.php?eventID=<?php echo $eventID; ?>">
            <img class="event-details-link" src="../assets/icons/ic_slanted_arrow.svg" alt="slanted arrow icon">
        </a>
    </div>
    <div class="mid-section">
        <div class="title-and-speaker">
            <div class="event-title"><?php echo $eventTitle ?></div>
            <div class="by-and-event-speaker">
                <span>by</span>
                <span><?php echo $eventSpeaker ?></span>
            </div>
        </div>
        <div class="event-image">
            <div class="img-container-rec">
                <img src="<?php echo $eventImagePath ?>" alt="rectangular image container">
            </div>
        </div>
        <div class="event-datetime">
            <div class="item">
                <img class="icon" src="../assets/icons/ic_calendar.svg" alt="calendar icon">
                <span class="event-date"><?php echo $eventDate ?></span>
            </div>
            <div class="item">
                <img class="icon" src="../assets/icons/ic_clock.svg" alt="clock icon">
                <span class="event-date"><?php echo $eventTime ?></span>
            </div>
        </div>
    </div>
    <div class="bottom-section">
        <?php
            if(isBookingExist($conn, $eventID, getCurrentUserId())) {
                include("../components/booked-tag.php");
            } else {
                echo "
                    <a href='booking.php?$G_eventID=$eventID'>
                        <button class='btn btn--outline btn--lg'>Buy Tickets</button>
                    </a>
                ";
            }
        ?>
    </div>
</div>
