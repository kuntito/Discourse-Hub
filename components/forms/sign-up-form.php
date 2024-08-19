<?php
    function signUserUp($conn, $hashedPassword, $fname, $lname, $email, $dob) {
        $query = "INSERT INTO customers (password_hash, customer_forename, customer_surname, customer_email, date_of_birth) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $hashedPassword, $fname, $lname, $email, $dob);
        
        try {
            mysqli_stmt_execute($stmt);

            global $G_alertMessage;
            global $G_alertType;

            $alertMessage = "sign up successful";
            $alertType = "alert-success";


            header("Location: log-in.php?$G_alertMessage=$alertMessage&$G_alertType=$alertType");
            exit();
        } catch (mysqli_sql_exception $e) {
            if (strpos($e->getMessage(), 'customer_email') !== false) {
                displayAlertMessage("Email already in use");
            } else {
                displayAlertMessage("An error occurred");
            }
        }
    }
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {        
        $fname = htmlspecialchars(trim($_POST["first-name"]));
        $lname = htmlspecialchars(trim($_POST["last-name"]));
        $dob = htmlspecialchars(trim($_POST["dob"]));
        $email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm-password"];
     
        
        if ($fname && $lname && $dob && $email) {
            if ($password == $confirm_password) {
                $hashedPassword = password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );
    
                signUserUp($conn, $hashedPassword, $fname, $lname, $email, $dob);
            } else {
                displayAlertMessage("passwords do not match");
            }            
        } else {
            displayAlertMessage("fields cannot be blank");
        }
    }
?>
<form class="form" method="post">
    <div class="top-section">
        <div class="title">
            Sign up
        </div>
    </div>
    <div class="mid-section">
        <div class="input-field">
            <label for="first-name">first name</label>
            <input type="text" id="first-name" name="first-name" required value=" ">
        </div>
        <div class="input-field">
            <label for="last-name">last name</label>
            <input type="text" id="last-name" name="last-name" required value="">
        </div>
        <div class="input-field">
            <label for="dob">date of birth <span class="text-prompt">&lpar;min 18 years&rpar;</span></label>
            <input type="date" id="dob" name="dob" required value="">
        </div>
        <div class="input-field">
            <label for="email">email</label>
            <input type="email" id="email" name="email" required value="" >
        </div>
        <div class="input-field">
            <label for="password">password</label>
            <input type="password" name="password" id="password" required value="">
        </div>
        <div class="input-field">
            <label for="confirm-password">confirm password</label>
            <input type="password" name="confirm-password" id="confirm-password" required value="">
        </div>
    </div>
    <div class="bottom-section">
        <input type="submit" name="log-in" class="btn btn--outline btn--lg" value="Sign up">
        <div class="text-prompt">
            have an account?
            <span class="link"><a href="log-in.php">log in</a></span>
        </div>
    </div>
</form>
<script>
    window.onload = function() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear() - 18; // Subtract 18 years

        var maxDate = yyyy + '-' + mm + '-' + dd;
        document.getElementById("dob").setAttribute("max", maxDate);
    };
</script>
