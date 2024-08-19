<?php
    include("../data/nav-links-array.php");
?>
<header class="site-header">
    <div class="nav collapsible">
        <a href="index.php">
            <img src="../assets/images/logo_big.svg" alt="discourse hub big logo">
        </a>
        <div class="mobile-nav">
            <?php
                if (isUserLoggedIn()) {
                    include("../components/user-profile-link.php");
                }
            ?>
            <img class="nav-toggler" src="../assets/icons/ic_hamburger_menu.svg" alt="nav menu">
        </div>
        <?php
            include("../components/nav-links.php");
        ?>
        <div class="nav-buttons">
            <?php
                if (isUserLoggedIn()) {
                    include("../components/user-profile-link.php");
                    echo "
                        <a href='log-out.php?$G_prevPage=$currentPage'>
                            <button class='btn btn--outline btn--md'>Log out</button>
                        </a>
                    ";
                } else {
                    echo '                
                        <a href="log-in.php">
                            <button class="btn btn--outline btn--md">Log in</button>
                        </a>
                        <a href="sign-up.php">
                            <button class="btn btn--outline btn--md">Sign up</button>
                        </a>
                    ';
                }
            ?>
        </div>
    </div>
    <?php
        include("../components/alert-box.php");
    ?>
</header>