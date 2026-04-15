<?php
require_once 'components/session.php';
require_once 'db/connection.php';
require_once 'components/navbar.php';
require_once 'db/functions.php';

$errors = [];
$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["email"])) {
        $errors[] = "email mancante";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $errors[] = "Password mancante";
    } else {
        $password = $_POST["password"];
    }

    if (empty($errors)) { 
        if(createUser($email, $password)){
            header("Location: login.php");
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
    <link rel="stylesheet" href="assets/css/style.css">
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

            <button type="submit">register</button>
        </form>

    </main>

    <?php require_once "components/footer.php" ?>
</body>
</html>