<?php
    $userInfo = getCurrentUserInfo($conn);

    $userFullname = $userInfo["customer_forename"] . " " . $userInfo["customer_surname"];
    $userEmail = $userInfo["customer_email"];
    $userDob = formatDateOfBirth($userInfo["date_of_birth"]);
?>
<div class="user-info-pane">
    <div class="user-info">
        <div class="item">
            <img class="icon" src="../assets/icons/ic_person.svg" alt="person icon">
            <div class="user-name"><?php echo $userFullname ?></div>
        </div>
        <div class="item">
            <img class="icon" src="../assets/icons/ic_mail.svg" alt="person icon">
            <div class="user-email"><?php echo $userEmail ?></div>
        </div>
        <div class="item">
            <img class="icon" src="../assets/icons/ic_calendar.svg" alt="person icon">
            <div class="user-dob"><?php echo $userDob ?></div>
        </div>
    </div>
    <a href='edit-profile.php'>
        <button class="btn btn--outline btn--lg">edit profile</button>
    </a>
</div>