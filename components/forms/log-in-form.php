<?php
    function logUserIn($conn, $email, $password) {        
        $query = "SELECT `password_hash`, `customerID` FROM `customers` WHERE `customer_email` = ?";

        $stmt = mysqli_prepare($conn, $query);
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        
        $queryResult = mysqli_stmt_get_result($stmt);


        if (mysqli_num_rows($queryResult) == 1) {
            $customer_info = mysqli_fetch_assoc($queryResult);
            $hash = $customer_info["password_hash"];

            if (password_verify($password, $hash)) {                
                setSessionUserId($customer_info["customerID"]);
    
                $dstAfterLogin = getDestinationAfterLogin();
                header("Location: $dstAfterLogin");
            } else {
                displayAlertMessage("invalid email or password");
            }
        } else {
            displayAlertMessage("invalid email or password");
        }

    }
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = $_POST["password"];

        if ($email && $password) {
            logUserIn($conn, $email, $password);
        } else {
            displayAlertMessage("Invalid input");
        }
    }
?>
<form class="form" method="post">
    <div class="top-section">
        <div class="title">Log in</div>
    </div>
    <div class="mid-section">
        <div class="input-field">
            <label for="email">email</label>
            <input type="email" id="email" name="email" value="" >
        </div>
        <div class="input-field">
            <label for="password">password</label>
            <input type="password" name="password" id="password" value="" required>
        </div>
    </div>
    <div class="bottom-section">
        <input type="submit" name="log-in" class="btn btn--outline btn--lg" value="Log in">
        <div class="text-prompt">
            new user?
            <span class="link"><a href="sign-up.php">sign up</a></span>
        </div>
    </div>
</form>