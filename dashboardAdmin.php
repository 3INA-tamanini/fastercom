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

if ($ruolo != "admin") {
    header("Location: dashboard.php");
    exit();
}


$stud = getAllStudents();
$doc = getAllTeachers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>

<body>
    <h1>Dashboard Amministratori</h1>
    <div class="tabelle">
        <table>
        <tr>
            <th>Studenti</th>
        </tr>

        <?php foreach ($stud as $row) { ?>
            <tr>
                <td>
                    <?= $row['nome'] . " " . $row['cognome']; ?>
                </td>
            </tr>
            <?php } ?>

    </table>


    <table>
        <tr>
            <th>Docenti</th>
        </tr>

       <?php foreach ($doc as $row) { ?>
            <tr>
                <td>
                    <?= $row['nome'] . " " . $row['cognome']; ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    </div>
    
    
    <a href="register.php">
        <button>inserisci utenti</button>
    </a>
    <a href="gestioneMaterie.php"><button>gestisci materie</button></a>
    </body>

</html>


<?php require_once 'components/footer.php'; ?>