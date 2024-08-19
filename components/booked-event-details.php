<?php
    $eventTitle = $talkEvent["event_title"];
    $eventSpeaker = $talkEvent["event_speaker"];
    $eventImagePath = $talkEvent["event_imagepath"];
    $eventRoom = $talkEvent["room"];
    $eventPrice = $talkEvent["price_per_person"];
    
    $bookedEvent = getBookedEvent($conn, $eventId, $userID);
    $ticketsBought = $bookedEvent["number_people"];
    $bookingNotes = $bookedEvent["booking_notes"];
?>
<form method="post" class="event-details-box">
    <div class="title-and-speaker">
        <div class="event-title"><?php echo $eventTitle ?></div>
        <div class="by-and-speaker-name">
            <span class="by">by</span>
            <span class="speaker-name"><?php echo $eventSpeaker ?></span>
        </div>
    </div>
    <div class="tickets-booked">
        <span>Tickets: </span>
        <span class="tickets-bought"><?php echo $ticketsBought ?></span>
    </div>
    <div class="cost-and-location">
        <div class="payment-cost">
            <div class="cost-item">
                <span class="label">Cost:</span>
                <span class="cost-value">
                    <span>&pound;</span>
                    <span class="total-cost" id="total-cost"><?php echo $eventPrice; ?></span>
                </span>
            </div>
        </div>
        <div class="location">
            <span>Location:</span>
            <span class="event-room"><?php echo $eventRoom ?></span>
        </div>
    </div>
    <?php
        if (!empty($bookingNotes)) {
            echo "
                <div class='booking-notes-box'>
                    <div class='text-header'>
                        booking notes
                    </div>
                    <span class='booking-notes-description'>$bookingNotes</span>
                </div>
            ";
        }
    ?>
    <?php
        include("../components/booked-tag.php");
        echo '<span class="booked-event-redirect">Redirecting to <span class="redirect-talks-text">talks</span> in <span id="timer">20</span> seconds...</span>';
    ?>
</form>
<script>
    var timeLeft = 20;
    var timerElement = document.getElementById('timer');

    var countdown = setInterval(function() {
        timeLeft--;
        timerElement.textContent = timeLeft;

        if (timeLeft <= 0){ 
            clearInterval(countdown);
            // TODO TEST-ON-SERVER test this redirect on submission server
            window.location.replace("http://localhost/projects/web2_kf7013/content/talks.php");
        }

    }, 1000);
</script>
