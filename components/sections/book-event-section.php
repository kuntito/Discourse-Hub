<?php
    $talkEvent = getTalkEvent($conn, $eventId);       
    if ($talkEvent == null) {
        echo '<h1>no event details</h1>';
        exit();
    }
?>
<?php
    $userID = getCurrentUserId();

    if (isset($_POST["book-event"])) {

        $attendees = (float)$_POST["attendees"];

        $eventPrice = $talkEvent["price_per_person"];
        $eventPrice = (float) $eventPrice;
        $totalCost = $attendees * $eventPrice;

        $bookingNotes = htmlspecialchars(trim($_POST["booking-notes"]));


        $bookingQuery = "
        INSERT INTO `booking` (
            `eventID`,
            `customerID`,
            `number_people`,
            `total_booking_cost`,
            `booking_notes`
        ) VALUES (?, ?, ?, ?, ?)";

        global $G_eventID;

        $eventTitle = $talkEvent["event_title"];
        try {
            $stmt = mysqli_prepare($conn, $bookingQuery);
            // Bind the parameters to the statement
            mysqli_stmt_bind_param($stmt, "iidis", $eventId, $userID, $attendees, $totalCost, $bookingNotes);

            // Execute the prepared statement
            mysqli_stmt_execute($stmt);

            header("Location: booking.php?$G_eventID=$eventId");
            exit();
        } catch (mysqli_sql_exception $e) {
            displayAlertMessage("booking error occurred, try again");
        }        
    }
?>
<div class="book-event-section container--2x1">
    <div class="box-1">
        <?php
            if(isBookingExist($conn, $eventId, $userID)) {
                include("../components/booked-event-details.php");
            } else {
                include("../components/unbooked-event-details.php");
            }   
        ?>
    </div>
    <div class="box-2">
        <div class=" image-box img-container-sq">
            <?php
                $eventImagePath = $talkEvent["event_imagepath"];
                echo "<img src='$eventImagePath' alt='event image'>";
            ?>
        </div>
    </div>
</div>
<script>
    const eventPrice = parseFloat(<?php echo $eventPrice; ?>);

    // Get the input element by its ID
    const attendeesInput = document.getElementById('attendees');
    const totalCostTag = document.getElementById('total-cost');

    const onAttendeesValueChange = () => {
        const totalCost = parseFloat(attendeesInput.value) * eventPrice
        totalCostTag.textContent = totalCost.toFixed(2);
    }

    // Add an event listener to detect changes in the input value
    attendeesInput.addEventListener('input', onAttendeesValueChange);
</script>
