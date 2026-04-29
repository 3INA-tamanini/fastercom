<?php
require_once 'components/session.php';
require_once 'db/functions.php';
?>

<nav>
    <div>
        <div class="registr"><a href="register.php">Register</a></div>
        <div class="registr"><a href="login.php">Login</a></div>
        <?php if (isset($_SESSION['ruolo'])) {
            if ($_SESSION['ruolo'] === 'studente') { ?>
                <div class="registr"><a href="dashboardStudente.php">Dashboard</a></div>
                <div class="registr"><a href="logout.php">Logout</a></div>

        <?php }
        } ?>
        <?php if (isset($_SESSION['ruolo'])) {
            if ($_SESSION['ruolo'] === 'docente') { ?>
                <div class="registr"><a href="dashboardDocente.php">Dashboard</a></div>
                <div class="registr"><a href="logout.php">Logout</a></div>
        <?php }
        } ?>
    </div>
</nav>