<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = htmlspecialchars(trim($_POST["first-name"]));
        $lname = htmlspecialchars(trim($_POST["last-name"]));
        $email = htmlspecialchars(trim($_POST["email"]));


        if ($fname & $lname && $email) {
            updateUserInfo($conn, $fname, $lname, $email);
        } else {
            displayAlertMessage("fields cannot be blank");
        }
    }


    function updateUserInfo($conn, $fname, $lname, $email) {
        $userId = getCurrentUserId();
        $query = "UPDATE `customers`
                  SET customer_forename = ?,
                      customer_surname = ?,
                      customer_email = ?
                  WHERE customerID = ?";
    
        try {
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssi", $fname, $lname, $email, $userId);
            mysqli_stmt_execute($stmt);
    
            global $G_alertMessage;
            global $G_alertType;
    
            $alertMessage = "update successful";
            $alertType = "alert-success";
    
            header("Location: user-details.php?$G_alertMessage=$alertMessage&$G_alertType=$alertType");
            exit();
        } catch (mysqli_sql_exception $e) {
            displayAlertMessage("update error occurred, try again");
        }
    }
    
?>
<?php
    $userInfo = getCurrentUserInfo($conn);

    $userFname = $userInfo["customer_forename"];
    $userLname = $userInfo["customer_surname"];
    $userEmail = $userInfo["customer_email"];
?>
<form class="form" method="post">
    <div class="top-section">
        <div class="title">
            Edit profile
        </div>
    </div>
    <div class="mid-section">
        <div class="input-field">
            <label for="first-name">first name</label>
            <input type="text" id="first-name" name="first-name" required value="<?php echo $userFname ?>">
        </div>
        <div class="input-field">
            <label for="last-name">last name</label>
            <input type="text" id="last-name" name="last-name" required value="<?php echo $userLname ?>">
        </div>
        <div class="input-field">
            <label for="email">email</label>
            <input type="email" id="email" name="email" required value="<?php echo $userEmail ?>" >
        </div>
    </div>
    <div class="bottom-section">
        <input type="submit" name="save-edits" id="save-edits" class="btn btn--outline btn--lg disabled" value="Update">
    </div>
</form>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const firstNameInput = document.getElementById('first-name');
    const lastNameInput = document.getElementById('last-name');
    const emailInput = document.getElementById('email');

    const saveEditsButton = document.getElementById('save-edits');

    const originalValues = {
        firstName: firstNameInput.value,
        lastName: lastNameInput.value,
        email: emailInput.value
    };

    function checkForChanges() {
        if (firstNameInput.value !== originalValues.firstName ||
            lastNameInput.value !== originalValues.lastName ||
            emailInput.value !== originalValues.email) {
            
            saveEditsButton.classList.remove("disabled");
        } else {
            saveEditsButton.classList.add("disabled");
        }
    }

    firstNameInput.addEventListener('input', checkForChanges);
    lastNameInput.addEventListener('input', checkForChanges);
    emailInput.addEventListener('input', checkForChanges);
});
</script>