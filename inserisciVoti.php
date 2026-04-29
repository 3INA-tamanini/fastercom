<?php
require_once 'components/session.php';
require_once 'db/connection.php';
require_once 'db/functions.php';

$errors = [];
$nota = "";

$ruolo = $_SESSION['ruolo'];

if($ruolo != "docente"){
    header("Location: dashboard");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["valore"])) {
        $errors[] = "Valore mancante";
    } else {
        $valore = $_POST["valore"];
    }

    if (empty($_POST["tipo"])) {
        $errors[] = "Tipo mancante";
    } else {
        $tipo = $_POST["tipo"];
    }
    if (empty($_POST["nota"])) {
        $errors[] = "Nota mancante";
    } else {
        $nota = $_POST["nota"];
    }
    if (empty($_POST["insegnamento_id"])) {
        $errors[] = "Insengamneto_id mancante";
    } else {
        $insegnamento_id = $_POST["insegnamento_id"];
    }
    if (empty($_POST["studente_id"])) {
        $errors[] = "Studente_id mancante";
    } else {
        $studente_id = $_POST["studente_id"];
    }


    if (empty($errors)) { 
        if(inserisciVoto($valore, $tipo, $insegnamento_id, $studente_id,$nota)){
            echo("voto inserito");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voti</title>
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

            <h2 id="heading">Voti</h2>

            <div class="field">
                <input
                    type="number"
                    name="valore"
                    placeholder="Inserisci voto..."
                    class="input-field">
            </div>

            <div class="field">
                <input
                    type="text"
                    name="tipo"
                    placeholder="Inserisci tipo..."
                    class="input-field">
            </div>

            <div class="field">
                <input
                    type="text"
                    name="nota"
                    placeholder="Inserisci nota..."
                    class="input-field">
            </div>

            <div class="field">
                <input
                    type="number"
                    name="insegnamento_id"
                    placeholder="Inserisci insegnamento_id..."
                    class="input-field">
            </div>

            <div class="field">
                <input
                    type="number"
                    name="studente_id"
                    placeholder="Inserisci studente_id..."
                    class="input-field">
            </div>

            <div class="btn">
                <button type="submit" class="button1">inserisci voto</button>
            </div>

        </form>

    </main>

    <?php require_once "components/footer.php" ?>
</body>
</html>