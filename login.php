<?php
require_once "db/connection.php";
require_once "db/functions.php";
require_once 'db/connection.php';
require_once 'components/navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utenti WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {

        $_SESSION['user'] = $user['id'];
        $_SESSION['ruolo'] = $user['ruolo'];

        header("dashboard.php");

    } else {
        $errore = "Credenziali non valide";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Accedi</button>
</form>

</body>
</html>

<?php require_once 'components/footer.php'; ?>