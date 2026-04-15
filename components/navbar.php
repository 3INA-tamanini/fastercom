<?php 
require_once 'components/session.php';
require_once 'db/functions.php';
?>


<nav>
    <a href="register.php">register</a>
    <a href="login.php">login</a>
    <?php if(isset($_SESSION['ruolo'])){
        if($_SESSION['ruolo'] === 'studente'){ ?>
        <a href="dashboardStudente.php">dashboard</a>
        <a href="logout.php">Logout</a>
    <?php }} ?>
    <?php if(isset($_SESSION['ruolo'])){
        if($_SESSION['ruolo'] === 'docente'){ ?>
        <a href="dashboardDocente.php">dashboard</a>
        <a href="logout.php">Logout</a>
    <?php }} ?>
</nav>