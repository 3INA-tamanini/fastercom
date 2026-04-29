<?php
require_once 'components/session.php';
require_once 'db/connection.php';
require_once 'components/navbar.php';
require_once 'db/functions.php';

$ruolo = $_SESSION['ruolo'];

if($ruolo != "admin"){
    header("Location: dashboard");
    exit();
}

$materie = getMaterie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Materie</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main>       
        <h1>Gestione Materie</h1>
        <div class="tabelle">
            <h3>Materie</h3>
            <p><?php foreach ($materie as $row) { ?>
                <?= $row['nome']; ?><br>
            <?php } ?>
            </p>

        </div>
    </main>

    <a href="inserisciMaterie.php"><button>Inserisci Nuova Materia</button></a>
    <a href="assegnaDocente.php"><button>assegna docenti</button></a>
<?php require_once "components/footer.php" ?>
</body>
</html>