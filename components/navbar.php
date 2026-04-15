<?php 
require_once 'components/session.php';
?>


<nav>
    <a href="register.php">register</a>
    <a href="login.php">login</a>
    <?php if($_SESSION['ruolo'] === 'studente'){ ?>
        <a href="dashboardStudente.php">dashboard</a>
        <a href="logout.php">Logout</a>
    <?php } ?>
    <?php if($_SESSION['ruolo'] === 'docente'){ ?>
        <a href="dashboardDocente.php">dashboard</a>
        <a href="logout.php">Logout</a>
    <?php } ?>
</nav>