<?php
require_once 'db/connection.php';
require_once 'components/navbar.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$ruolo = $_SESSION['ruolo'];

?>

<h1>Dashboard Studenti</h1>


<a href="logout.php">Logout</a>

<?php require_once 'components/footer.php'; ?>