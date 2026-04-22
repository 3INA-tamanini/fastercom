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

$insegnamenti = getInsegnamenti();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard Studenti</h1>

<table>
  <tr>
    <th>Materia</th>
    <th>Docente</th>
  </tr>

  <?php foreach ($insegnamenti as $row) { ?>
    <tr>
      <td>
        <?= $row['materia']; ?>
      </td>
      <td>
        <?= $row['nome_docente'] . " " . $row['cognome_docente']; ?>
      </td>
    </tr>
  <?php } ?>

</table>
</body>
</html>



<?php require_once 'components/footer.php'; ?>