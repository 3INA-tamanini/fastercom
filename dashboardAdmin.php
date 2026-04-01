<?php
require_once 'components/session.php';
require_once 'db/connection.php';
require_once 'components/navbarAdmin.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$ruolo = $_SESSION['ruolo'];

if($ruolo != "admin"){
    header("Location: dashboard");
    exit();
}
?>

<h1>Dashboard Amministratori</h1>


<a href="logout.php">Logout</a>

<?php require_once 'components/footer.php'; ?>