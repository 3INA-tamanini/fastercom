<?php
require_once 'components/session.php';
require_once 'db/functions.php';

$ruolo = $_SESSION['ruolo'];

if ($ruolo != "admin") { ?>
    <nav>
        <div>
        <div class="registr"><a href="register.php">register</a></div>
        <div class="registr"><a href="login.php">login</a></div>
        <?php if (isset($_SESSION['ruolo'])) {
            if ($_SESSION['ruolo'] === 'studente') { ?>
                <div class="registr"><a href="dashboardStudente.php">dashboard</a></div>
                <div class="registr"><a href="logout.php">Logout</a></div>
        <?php }
        } ?>
        <?php if (isset($_SESSION['ruolo'])) {
            if ($_SESSION['ruolo'] === 'docente') { ?>
                <div class="registr"><a href="dashboardDocente.php">dashboard</a></div>
                <div class="registr"><a href="logout.php">Logout</a></div>
        <?php }
        } ?>
        </div>
    </nav>
    
<?php } else { ?>
    <nav>
        <div>
        <div class="registr"><a href="dashboardAdmin.php">dashboard Amministratori</a></div>
        <div class="registr"><a href="logout.php">Logout</a></div>
        </div>
    </nav>
    
<?php } ?>