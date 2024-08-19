<?php
    function setSessionUserId($userID) {
        global $SESSION_USER_ID_KEY;
        $_SESSION[$SESSION_USER_ID_KEY] = $userID;
    }

    function getCurrentUserId() {
        global $SESSION_USER_ID_KEY;
        if(isUserLoggedIn()) {
            return $_SESSION[$SESSION_USER_ID_KEY];
        }

        return null;
    }

    function setDestinationAfterLogin($value) {
        global $LOGIN_DST_KEY;
        $_SESSION[$LOGIN_DST_KEY] = $value;
    }
    
    function getDestinationAfterLogin() {
        global $LOGIN_DST_KEY;
        $dstAfterLogin = $_SESSION[$LOGIN_DST_KEY];
        unset($_SESSION[$LOGIN_DST_KEY]);

        return $dstAfterLogin;
    }

    function getPaginationPageFromUrl() {
        global $G_page;
        $page = "1";
        if (isset($_GET[$G_page])) {
            // Retrieve the eventID from the URL
            $page = $_GET[$G_page];
        }

        return $page;
    }

    function getEventIdFromUrl() {
        global $G_eventID;
        $eventId = "1";
        if (isset($_GET[$G_eventID])) {
            $eventId = $_GET[$G_eventID];
        }

        return $eventId;
    }

    function isEventIdValid($conn, $eventId) {
        $query = "SELECT eventID FROM `events` WHERE `eventID` = $eventId";

        try {
            $queryResult = mysqli_query($conn, $query);
        } catch (mysqli_sql_exception $e) {
            // displayAlertMessage("an error occurred");
        }

        return (mysqli_num_rows($queryResult) == 1);
    }

    function getPreviousPageFromUrl() {
        global $G_prevPage;
        $prevPage = "index.php";
        if (isset($_GET[$G_prevPage])) {
            $prevPage = $_GET[$G_prevPage];
        }

        return $prevPage;
    }
    // ****** alert-box functions ******

    function getAlertMessageFromUrl() {
        global $G_alertMessage;
        $alertMessage = "";
        if (isset($_GET[$G_alertMessage])) {
            // Retrieve the eventID from the URL
            $alertMessage = $_GET[$G_alertMessage];
        }

        return $alertMessage;
    }

    function getAlertTypeFromUrl() {
        global $G_alertType;
        $alertType = "";
        if (isset($_GET[$G_alertType])) {
            // Retrieve the eventID from the URL
            $alertType = $_GET[$G_alertType];
        }

        return $alertType;
    }

    function displayAlertMessage($message, $type = "alert-error") {
        echo "<script> displayAlertMessage('$message', '$type'); </script>";
    }

    function displayAlertsIfAny() {
        $alertMessage = getAlertMessageFromUrl();
        $alertType = getAlertTypeFromUrl();
        if (!empty($alertMessage)) {
            displayAlertMessage(
                $alertMessage, 
                empty($alertType) ? "alert-error" : $alertType
            );
        }
    }
    // ****** date functions ******
    function formatDateString($dateString) {
        // date in the format `2023-08-19` is formatted as `Saturday, 19 August`
        $timestamp = strtotime($dateString);

        $formattedDate = date("l, j F", $timestamp);
        return $formattedDate;
    }

    function extractDateAndTime($dateTimeString) {
        $dateTimeArray = explode(" ", $dateTimeString);

        $dateString = $dateTimeArray[0];
        $time = substr($dateTimeArray[1], 0, 5); // Extract the first 5 characters
        $formattedDate = formatDateString($dateString);

        return array($formattedDate, $time);
    }

    // ****** login, logout functions ******
    
    function isUserLoggedIn() {
        global $SESSION_USER_ID_KEY;
        return array_key_exists($SESSION_USER_ID_KEY, $_SESSION);
    }

    function onLogout() {
        session_destroy();

        $prevPage = getPreviousPageFromUrl();
        
        if (in_array($prevPage, array("user-details.php", "booking.php", "edit-profile.php"))) {
            header("Location: " . "index.php");
        } else {
            header("Location: " . $prevPage);
        }
    }

    function getTalkEvent($conn, $eventId) {
        $query = "SELECT * FROM `events` WHERE eventID=$eventId";
        
        $talkEventRecord = null;
        try {
            $queryResult = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($queryResult) == 1) {
                $talkEventRecord = mysqli_fetch_assoc($queryResult);
            }
        } catch (mysqli_sql_exception $e) {
            // displayAlertMessage("an error occurred");        
        }

        return $talkEventRecord;
    }


    function getBookedEvent($conn, $eventId, $customerId) {
        $query = "SELECT * FROM `booking` WHERE eventID=$eventId AND customerID = $customerId;";
        
        $eventRecord = null;
        try {
            $queryResult = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($queryResult) == 1) {
                $eventRecord = mysqli_fetch_assoc($queryResult);
            }
        } catch (mysqli_sql_exception $e) {
            // displayAlertMessage("an error occurred");        
        }

        return $eventRecord;
    }

    function getCustomerBookings($conn, $customerId) {
        $query = "SELECT * FROM `booking` INNER JOIN `events` 
        ON `events`.`eventID` = `booking`.`eventID` WHERE `customerID` = $customerId;";
        
        $customerBookings = array();
        try {
            $queryResult = mysqli_query($conn, $query);

            if (mysqli_num_rows($queryResult) > 0) {
                while($row = mysqli_fetch_assoc($queryResult)) {
                    $customerBookings[] = $row;
                }
            }
        } catch (mysqli_sql_exception $e) {
            // displayAlertMessage("an error occurred");        
        }
        


        return $customerBookings;
    }

    function isBookingExist($conn, $eventId, $customerId) {
        $query = "SELECT * FROM `booking` WHERE eventID=$eventId AND customerID = $customerId;";
        
        $flag = false;
        try {
            $queryResult = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($queryResult) >= 1) {
                $flag = true;
            }
        } catch (mysqli_sql_exception $e) {
            // displayAlertMessage("an error occurred");        
        }

        return $flag;
    }

    function deleteBooking($conn, $bookingID, $customerID) {
        $query = "DELETE FROM booking WHERE `booking`.`bookingID` = $bookingID AND `booking`.`customerID` = $customerID";

        try {
            mysqli_query($conn, $query);
        } catch (mysqli_sql_exception $e) {
            // displayAlertMessage("an error occurred");
        }
    }

    function getCurrentUserInfo($conn) {
        $userId = getCurrentUserId();

        if ($userId != null) {
            $query = "SELECT * FROM `customers` WHERE `customers`.`customerID` = $userId";

            try {
                $queryResult = mysqli_query($conn, $query);

                if (mysqli_num_rows($queryResult) == 1) {
                    return mysqli_fetch_assoc($queryResult);
                }
    
            } catch (mysqli_sql_exception $e) {
                // displayAlertMessage("an error occurred");
            }
        }

        return null;
    }

    function formatDateOfBirth($dateTime) {
        return explode(" ", $dateTime)[0];
    }
?>
