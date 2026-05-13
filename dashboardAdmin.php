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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <h1 class="docTitle">Dashboard Amministratori</h1>
    <div class="tabella">
        <table class="table table-dark table-sm">
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
    </div>

    <div class="tabella">
        <table class="table table-dark table-sm">
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


    <div class="btn1">
        <a href="register.php">
            <button class="gVoti">inserisci utenti</button>
        </a>
    </div>
    <div class="btn1">
        <a href="gestioneMaterie.php"><button class="gVoti">gestisci materie</button></a>
    </div>
</body>

</html>


<?php require_once 'components/footer.php'; ?>