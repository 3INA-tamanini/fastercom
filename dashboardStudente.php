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

if($ruolo == "docente"){
    header("Location: dashboard");
    exit();
}

$materie = getMaterie();
$docenti = getDocenti();
var_dump($docenti);

?>

<h1>Dashboard Studenti</h1>

<table>
  <tr>
    <th>Materia</th>
    <th>Docente</th>
  </tr>
    <?php foreach ($materie as $nome) {?>
        <tr>
            <td>
                <?= $nome['nome']; ?>
            </td>
            
        </tr>
    <?php }?> 

  <tr>
  <?php foreach ($docenti as $docente ) {  ?>
        <tr>
            <td>
                <?= $docente['nome'] . " " . $docente['cognome']; ?>
            </td>
        </tr>
    <?php }?> 
  </tr>
</table>

<?php require_once 'components/footer.php'; ?>