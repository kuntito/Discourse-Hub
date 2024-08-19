<?php
    include("../components/user-info-pane.php");
?>
<section class="section-container my-bookings-section">
    <div class="section-header-text">My Bookings</div>
    <div class="main-content">
        <div class="all-bookings">
            <?php
                $customerBookings = getCustomerBookings($conn, getCurrentUserId());
                if (empty($customerBookings)) {
                    echo "<h1 class='text-align-center'>no shows booked</h1>";
                } else {
                    foreach($customerBookings as $bookingItem) {
                        $bookingId = $bookingItem["bookingID"];
                        $eventID = $bookingItem["eventID"];
                        $eventTitle = $bookingItem["event_title"];
                        $eventSpeaker = $bookingItem["event_speaker"];
                        include("../components/booked-event-item.php");
                    }
                }
            ?>
        </div>
    </div>
</section>