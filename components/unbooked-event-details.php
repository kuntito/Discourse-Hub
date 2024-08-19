<?php
    $eventTitle = $talkEvent["event_title"];
    $eventSpeaker = $talkEvent["event_speaker"];
    $eventImagePath = $talkEvent["event_imagepath"];
    $eventRoom = $talkEvent["room"];
    $eventPrice = $talkEvent["price_per_person"];
    $eventDescription = $talkEvent["description"];


    $eventDateTime = $talkEvent["event_date"];
    $res = extractDateAndTime($eventDateTime);
    $eventDate = $res[0];
    $eventTime = $res[1];
?>
<form method="post" class="event-details-box">
    <div class="title-and-speaker">
        <div class="event-title"><?php echo $eventTitle ?></div>
        <div class="by-and-speaker-name">
            <span class="by">by</span>
            <span class="speaker-name"><?php echo $eventSpeaker ?></span>
        </div>
    </div>
    <div class="input-field">
        <label for="attendees">attendees</label>
        <input type="number" id="attendees" name="attendees" value="1" min="1" required>
    </div>
    <div class="payment-cost">
        <div class="cost-item">
            <span class="label">Cost:</span>
            <span class="cost-value">
                <span>&pound;</span>
                <span class="total-cost" id="total-cost"><?php echo $eventPrice; ?></span>
            </span>
        </div>
    </div>
    <div class="booking-notes-box">
        <div class="text-header">
            booking notes
        </div>
        <textarea placeholder="e.g. wheelchair access" class="text-box" name="booking-notes" id="booking-notes" rows="3"></textarea>
    </div>
    <input type="submit" class="book-event-btn btn btn--outline btn--lg" name="book-event" value="Book event">
</form>
