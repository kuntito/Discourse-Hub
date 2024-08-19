<?php
    if (isset($_POST["delete-booking-$bookingId"])) {
        deleteBooking($conn, $bookingId, getCurrentUserId());
        echo "<script>window.location.replace(window.location.href);</script>";
    }
?>
<div class="booked-event-item">
    <div class="title-and-speaker">
        <span class="event-title"><?php echo $eventTitle ?></span>
        <span class="event-speaker"><?php echo $eventSpeaker ?></span>
    </div>
    <div class="buttons">
        <?php
            echo "
                <a href='booking.php?$G_eventID=$eventID'>
                    <button class='btn btn--outline btn--md'>view booking</button>
                </a>
            ";
        ?>
        <form method="post" onsubmit="return confirmDelete()">
            <?php
                echo "<input type='submit' name='delete-booking-$bookingId' class='btn btn--action btn--md' value='delete booking'>";
            ?>
        </form>
    </div>
</div>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this booking?');
    }
</script>