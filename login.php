<?php
require_once "components/session.php";

if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
}

require_once "db/functions.php";

$errors = [];
$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["email"])) { // in questo caso, visto che i campi di login sono  obbligatori, isset non serve
        $errors[] = "email mancante";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $errors[] = "Password mancante";
    } else {
        $password = $_POST["password"];
    }


    if (empty($errors)) { // faccio check login solo se non ci sono stati errori
        $loginError = checkLogin($email, $password);
        
        if (empty($loginError)) {
            $utente = getUserByEmail($email);
            $_SESSION["email"] = $utente['email']; // creo la sessione con la mail
            $_SESSION["ruolo"] = $utente['ruolo'];
            header("Location: dashboard.php"); // mando l'utente alla dashboard
            exit;
        } else {
            $errors[] = $loginError;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fastercom</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php require_once "components/navbar.php"; ?>
    <main>
        <!-- stampo gli errori (se ci sono stati) -->
        <?php if (!empty($errors)){ ?>
            <div class="errors">
                <ul>
                    <?php foreach ($errors as $error){ ?>
                        <li style="color: red"><?= $error ?></li>
                    <?php }; ?>
                </ul>
            </div>
        <?php }; ?>

        <form method="POST">
            <label for="email">Email</label>
            <input 
                type="text" 
                name="email" 
                placeholder="Inserisci email..."
            >

            <label for="password">Password</label>
            <input 
                type="password" 
                name="password" 
                placeholder="Inserisci password..."
            >

            <button type="submit">Login</button>
        </form>

    </main>

    <?php require_once "components/footer.php" ?>
</body>
</html>