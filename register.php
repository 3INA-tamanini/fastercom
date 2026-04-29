<?php
require_once 'components/session.php';
require_once 'db/connection.php';
require_once 'components/navbar.php';
require_once 'db/functions.php';

$errors = [];
$email = "";
$password = "";

$ruolo = $_SESSION['ruolo'];

if ($ruolo != "admin") {
    header("Location: dashboard");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["email"])) {
        $errors[] = "Email mancante";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $errors[] = "Password mancante";
    } else {
        $password = $_POST["password"];
    }
    if (empty($_POST["ruolo"])) {
        $errors[] = "Ruolo mancante";
    } else {
        $ruolo = $_POST["ruolo"];
    }

    if (empty($errors)) {
        if (createUser($email, $password, $ruolo)) {
            echo ("utente creato");
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
        <?php if (!empty($errors)) { ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li style="color: red"><?= $error ?></li>
                    <?php }; ?>
                </ul>
            </div>
        <?php }; ?>

        <form method="POST" class="form">

            <h2 id="heading">Inserisci Utente</h2>

            <div class="field">
                <input
                    type="text"
                    name="email"
                    placeholder="Inserisci email..."
                    class="input-field">
            </div>

            <div class="field">
                <input
                    type="password"
                    name="password"
                    placeholder="Inserisci password..."
                    class="input-field">
            </div>

            <div class="field">
                <select id="ruolo" name="ruolo">
                    <option value="Studente">Studente</option>
                    <option value="Docente">Docente</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <div class="btn">
                <button type="submit" class="button1">Inserisci</button>
            </div>

        </form>

    </main>

    <?php require_once "components/footer.php" ?>
</body>

</html>