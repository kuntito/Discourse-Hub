<div class="alert-box" id="alert-box">
    <div class="alert-text">some alert message</div>
    <img class="close-btn" src="../assets/icons/ic_close.svg" alt="">
</div>
<script>
    const alertBox = document.getElementById('alert-box');
    const closeBtn = alertBox.querySelector('.close-btn');
    closeBtn.addEventListener('click', function() {
        // Your code to be executed when the button is clicked
        alertBox.classList.remove('alert-show');
    });
</script>
<script>
    const displayAlertMessage = (message, alertType="alert-error") => {
        const alertBox = document.getElementById('alert-box');
        const alertText = alertBox.querySelector('.alert-text');
        const alertVisibilityClass = "alert-show";
        
        alertBox.classList.add(alertVisibilityClass);
        alertBox.classList.add(alertType);
        alertText.innerText = message;


        const transitionDuration = 500;
        setTimeout(() => {
            alertBox.classList.remove(alertVisibilityClass);
            clearAlertMessageFromUrl()
        }, 3000 + transitionDuration);
    }

    const clearAlertMessageFromUrl = () => {
        const currentUrl = window.location.href;
        const urlWithoutAlertMessage = currentUrl.split('?')[0];
        window.location.replace(urlWithoutAlertMessage);
    }


</script>