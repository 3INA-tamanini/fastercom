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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard Amministratori</h1>


<a href="logout.php">Logout</a>
</body>
</html>


<?php require_once 'components/footer.php'; ?>