<?php
require_once 'components/session.php';
require_once 'db/connection.php';
require_once 'components/navbar.php';
require_once 'db/functions.php';

$errors = [];

$ruolo = $_SESSION['ruolo'];

if($ruolo != "admin"){
    header("Location: dashboard");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["materia"])) {
        $errors[] = "materia mancante";
    } else {
        $materia = $_POST["materia"];
    }
    if (empty($_POST["classe"])) {
        $errors[] = "classe mancante";
    } else {
        $classe = $_POST["classe"];
    }
    if (empty($_POST["docente"])) {
        $errors[] = "docente mancante";
    } else {
        $docente = $_POST["docente"];
    }

    if (empty($errors)) { 
        if(assegnaDocente($docente, $materia, $classe)){
            echo("docente assegnato");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>assegna docenti</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php require_once "components/navbarAdmin.php"; ?>
    <main>       
        <?php if (!empty($errors)){ ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error){ ?>
                        <li style="color: red"><?= $error ?></li>
                    <?php }; ?>
                </ul>
            </div>
        <?php }; ?>

        <form method="POST" class="form">

            <h2 id="heading">Register</h2>

            <div class="field">
                <input
                    type="text"
                    name="docente"
                    placeholder="Inserisci id docente..."
                    class="input-field">
            </div>
            <div class="field">
                <input
                    type="text"
                    name="materia"
                    placeholder="Inserisci id materia..."
                    class="input-field">
            </div>
            <div class="field">
                <input
                    type="text"
                    name="classe"
                    placeholder="Inserisci id classe..."
                    class="input-field">
            </div>

            <div class="btn">
                <button type="submit" class="button1">Inserisci</button>
            </div>

        </form>

    </main>

    <?php require_once "components/footer.php" ?>
</body>
</html>