<?php
require_once 'components/session.php';
require_once 'db/functions.php';

$ruolo = $_SESSION['ruolo'];

if ($ruolo != "admin") { ?>
    <nav>
        <a href="register.php">register</a>
        <a href="login.php">login</a>
        <?php if (isset($_SESSION['ruolo'])) {
            if ($_SESSION['ruolo'] === 'studente') { ?>
                <a href="dashboardStudente.php">dashboard</a>
                <a href="logout.php">Logout</a>
        <?php }
        } ?>
        <?php if (isset($_SESSION['ruolo'])) {
            if ($_SESSION['ruolo'] === 'docente') { ?>
                <a href="dashboardDocente.php">dashboard</a>
                <a href="logout.php">Logout</a>
        <?php }
        } ?>
    </nav>
<?php } else { ?>
    <nav>
        <a href="dashboardAdmin.php">dashboard Amministratori</a>
        <a href="logout.php">Logout</a>
    </nav>
<?php } ?>