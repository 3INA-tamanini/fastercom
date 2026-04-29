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

    if (empty($errors)) { 
        if(createMateria($materia)){
            echo("materia inserita");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inserisci materie</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
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

            <h2 id="heading">Inserimento</h2>

            <div class="field">
                <input
                    type="text"
                    name="materia"
                    placeholder="Inserisci materia..."
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