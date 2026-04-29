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

if ($ruolo == "docente") {
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
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
  <h1 class="dih">DASHBOARD STUDENTI</h1>

  <div class="tabella">
    <table class="table table-dark table-sm">
      <tr>
        <th class="materia">Materia</th>
        <th class="docente">Docente</th>
      </tr>

      <?php foreach ($insegnamenti as $row) { ?>
        <tr class="elem">
          <td>
            <?= $row['materia']; ?>
          </td>
          <td>
            <?= $row['nome_docente'] . " " . $row['cognome_docente']; ?>
          </td>
        </tr>
      <?php } ?>

    </table>
  </div>
</body>

</html>

<?php require_once 'components/footer.php'; ?>