<?php
require_once 'components/session.php';
require_once 'db/connection.php';
require_once 'components/navbar.php';
require_once 'db/functions.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$ruolo = $_SESSION['ruolo'];

if ($ruolo == "studente") {
    header("Location: dashboard.php");
    exit();
}

$docente = getDocenteByEmail($_SESSION['email']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestione voti</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<main>

    <body>

        <h1 class="docTitle">Gestione Voti</h1>


        <div class="btn1">
            <a href="inserisciVoti.php"><button class="gVoti">inserisci voti</button></a>
        </div>

</main>
</body>

</html>


<?php require_once 'components/footer.php'; ?>