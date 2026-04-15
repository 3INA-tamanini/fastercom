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

if ($ruolo == "studente") {
    header("Location: dashboard");
    exit();
}

$docente = getDocenteByEmail($_SESSION['email']);
$classe = getClassByTeacher($docente['nome'], $docente['cognome']);

$studenti = [];
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $classe_id = $_POST['classe'];
    $studenti = getStudentiByClass($classe_id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard Docenti</h1>

<form method="POST" action="">
    <select name="classe">
        <?php foreach ($classe as $c) { ?>
            <option value="<?php echo $c['id'] ?>"><?php echo $c['nome'] ?></option>
        <?php } ?>
    </select>
    <input type="submit">
</form>

<?php 
if(count($studenti)==0){
    echo "no studenti";
}else{?> 
<ul>
    <?php foreach ($studenti as $studente) {?>
    <li> <?= $studente['nome']?> </li>
</ul>
<?php } }?>




<a href="logout.php">Logout</a>
</body>
</html>


<?php require_once 'components/footer.php'; ?>