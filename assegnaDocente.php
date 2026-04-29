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

    if (empty($_POST["docente_id"])) {
        $errors[] = "ID docente mancante";
    } else {
        $docente_id = $_POST["docente_id"];
    }

    if (empty($_POST["materia_id"])) {
        $errors[] = "ID materia mancante";
    } else {
        $materia_id = $_POST["materia_id"];
    }
    if (empty($_POST["classe_id"])) {
        $errors[] = "ID classe mancante";
    } else {
        $classe_id = $_POST["classe_id"];
    }

    if (empty($errors)) { 
        if(assegnaDocente($docente_id, $materia_id, $classe_id)){
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
    <title>register</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php require_once "components/navbar.php"; ?>
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

            <h2 id="heading">Assegna Docente</h2>

            <div class="field">
                <input
                    type="number"
                    name="docente_id"
                    placeholder="Inserisci ID docente..."
                    class="input-field">
            </div>

            <div class="field">
                <input
                    type="number"
                    name="materia_id"
                    placeholder="Inserisci ID materia..."
                    class="input-field">
            </div>

            <div class="field">
                <input
                    type="number"
                    name="classe_id"
                    placeholder="Inserisci ID classe..."
                    class="input-field">
            </div>

            <div class="btn">
                <button type="submit" class="button1">Assegna</button>
            </div>

        </form>

    </main>

    <?php require_once "components/footer.php" ?>
</body>
</html>