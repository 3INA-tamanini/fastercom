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
    header("Location: dashboard.php");
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
    <title>Dashboard docente</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    <main>
    <h1 class="docTitle">Dashboard Docenti</h1>

    <div class="docenti">
<form method="POST" action="">
    <select class="btn btn-secondary dropdown-toggle" name="classe">
        <?php foreach ($classe as $c) { ?>
            <option value="<?php echo $c['id'] ?>"><?php echo $c['nome'] ?></option>
        <?php } ?>
    </select>
    <input type="submit" class="invio" value="Mostra studenti">
</form>
</div>

<?php 
if(count($studenti)==0){
    
}else{?> 
<ul class="list-group">
    <?php foreach ($studenti as $studente) {?>
    <li class="list-group-item"> <?= $studente['nome']?> </li>

<?php } }?>
</ul>


<div class="btn1">
    <a href="gestioneVoti.php"><button class="gVoti">Gestisci voti</button></a>
</div>
</main>
</body>
</html>


<?php require_once 'components/footer.php'; ?>