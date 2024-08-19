<?php
    $talkEvent = getTalkEvent($conn, $eventId);

    if ($talkEvent == null) {
        echo '<h1>no event details</h1>';
        exit();
    } else {
        $eventID = $talkEvent["eventID"];
        $eventTitle = $talkEvent["event_title"];
        $eventSpeaker = $talkEvent["event_speaker"];
        $eventImagePath = $talkEvent["event_imagepath"];
        $eventRoom = $talkEvent["room"];
        $eventDescription = $talkEvent["description"];


        $eventDateTime = $talkEvent["event_date"];
        $res = extractDateAndTime($eventDateTime);
        $eventDate = $res[0];
        $eventTime = $res[1];
    }
    
?>
<div class="event-details-section container--2x1">
    <div class="box-1">
        <div class=" image-box img-container-sq">
            <?php
                echo "<img src='$eventImagePath' alt='event image'>";
            ?>
        </div>
    </div>
    <div class="box-2">
        <div class="event-details-box">
            <div class="first-section">
                <div class="title-and-speaker">
                    <div class="event-title"><?php echo $eventTitle ?></div>
                    <div class="by-and-event-speaker">
                        <span>by</span>
                        <span><?php echo $eventSpeaker ?></span>
                    </div>
                </div>
            </div>
            <div class="second-section">
                <div class="event-description">
                    <?php echo $eventDescription ?> 
                </div>
            </div>
            <div class="third-section">
                <div class="details-item">
                    <img src="../assets/icons/ic_date.svg" alt="date icon" class="icon">
                    <div class="event-date"><?php echo $eventDate ?></div>
                </div>
                <div class="details-item">
                    <img src="../assets/icons/ic_clock.svg" alt="clock icon" class="icon">
                    <div class="event-date"><?php echo $eventTime ?></div>
                </div>
                <div class="details-item">
                    <img src="../assets/icons/ic_location.svg" alt="location icon" class="icon">
                    <div class="event-date"><span id="room-number"><?php echo $eventRoom ?></span>, Discourse Hub</div>
                </div>
            </div>
            <div class="fourth-section">
                <?php
                    if (isBookingExist($conn, $eventID, getCurrentUserId())) {
                        $bookedEvent = getBookedEvent($conn, $eventID, getCurrentUserId());
                        $bookingId = $bookedEvent["bookingID"];
                    

                        if (isset($_POST["delete-booking-$bookingId"])) {
                            deleteBooking($conn, $bookingId, getCurrentUserId());
                            echo "<script>window.location.replace(window.location.href);</script>";
                        }

                        include("../components/booked-tag.php");
                        echo "
                            <form class='delete-booking-event-details' method='post' onsubmit='return confirmDelete()'>
                                <input type='submit' name='delete-booking-$bookingId' class='btn btn--action btn--md' value='delete booking'>
                            </form>
                        ";            
                    } else {
                        echo"<a href='booking.php?$G_eventID=$eventID'>
                            <button class='btn btn--outline btn--lg'>Buy Tickets</button>
                        </a>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this booking?');
    }
</script>