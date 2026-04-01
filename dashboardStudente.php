<?php
require_once 'components/session.php';
require_once 'db/connection.php';
require_once 'components/navbar.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$ruolo = $_SESSION['ruolo'];

if($ruolo == "docente"){
    header("Location: dashboard");
    exit();
}

?>

<h1>Dashboard Studenti</h1>

<table>
  <tr>
    <th>Person 1</th>
    <th>Person 2</th>
    <th>Person 3</th>
  </tr>
  <tr>
    <td>Emil</td>
    <td>Tobias</td>
    <td>Linus</td>
  </tr>
  <tr>
    <td>16</td>
    <td>14</td>
    <td>10</td>
  </tr>
</table>

<?php require_once 'components/footer.php'; ?>