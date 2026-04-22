<?php
require_once "connection.php";


function checkLogin($email, $password)
{
    global $pdo;

    try {
        $error = "";

        $sql = "SELECT * FROM utenti WHERE email = ?";
        $result = $pdo->prepare($sql);
        $result->execute([$email]);

        $utente = $result->fetch(PDO::FETCH_ASSOC);

        if (empty($utente)) {
            $error = "Email non esistente!";
        } else {
            if (!password_verify($password, $utente['password_hash'])) {
                $error = "Password errata!";
            }
        }
        return $error;
    } catch (PDOException $e) {
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}

function getUserByEmail($email)
{
    global $pdo;

    try {
        $sql = "SELECT * FROM utenti WHERE email = ?";
        $result = $pdo->prepare($sql);
        $result->execute([$email]);

        $utente = $result->fetch(PDO::FETCH_ASSOC);

        return $utente;
    } catch (PDOException $e) {
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}


function getInsegnamenti()
{
    global $pdo;

    try {
        $sql = "SELECT m.nome AS materia, d.nome AS nome_docente, d.cognome AS cognome_docente
FROM INSEGNAMENTI i
JOIN MATERIE m ON i.materia_id = m.id
JOIN DOCENTI d ON i.docente_id = d.id;";

        $result = $pdo->prepare($sql);
        $result->execute();

        $insegnamenti = $result->fetchAll(PDO::FETCH_ASSOC);

        return $insegnamenti;
    } catch (PDOException $e) {
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}
function getMaterie()
{
    global $pdo;

    try {
        $sql = "SELECT nome FROM materie";
        $result = $pdo->prepare($sql);
        $result->execute();

        $materie = $result->fetchAll(PDO::FETCH_ASSOC);

        return $materie;
    } catch (PDOException $e) {
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}


function getDocenteByEmail($email)
{
    global $pdo;

    try {
        $sql = "SELECT nome, cognome FROM docenti
                JOIN utenti on docenti.utente_id = utenti.id
                WHERE utenti.email = ?";
        $result = $pdo->prepare($sql);
        $result->execute([$email]);

        $docenti = $result->fetch(PDO::FETCH_ASSOC);

        return $docenti;
    } catch (PDOException $e) {
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}

function getClassByTeacher($nome, $cognome){
    global $pdo;

    try {
        $sql = "SELECT classi.id, classi.nome FROM classi
JOIN insegnamenti on classi.id = insegnamenti.classe_id
JOIN docenti on docenti.id = insegnamenti.docente_id
WHERE docenti.nome = ? AND docenti.cognome = ?";
        $result = $pdo->prepare($sql);
        $result->execute([$nome, $cognome]);

        $classe = $result->fetchAll(PDO::FETCH_ASSOC);
        return $classe;
    } catch (PDOException $e) {
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}


function getStudentiByClass($classe){
    global $pdo;

    try {
        $sql = "SELECT studenti.nome, studenti.cognome FROM studenti
JOIN classi on classi.id = studenti.classe_id
WHERE classi.id = ?";
        $result = $pdo->prepare($sql);
        $result->execute([$classe]);

        $stud = $result->fetchAll(PDO::FETCH_ASSOC);

        return $stud;
    } catch (PDOException $e) {
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}

function CreateUser($email, $password,$ruolo){
    global $pdo;
    $hashedPassword=password_hash($password, PASSWORD_BCRYPT);
    try{
        $sql = "INSERT INTO utenti (email,password_hash,ruolo) VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$email,$hashedPassword,$ruolo]);
    }
    catch(PDOException $e){
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}

function CreateMateria($materia){
    global $pdo;
    try{
        $sql = "INSERT INTO materie (nome) VALUES (?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$materia]);
    }
    catch(PDOException $e){
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}


function assegnaDocente($docente,$materia,$classe){
    global $pdo;

    try {
        $sql = "INSERT INTO insegnamenti (docente_id,materia_id,classe_id) VALUES(?,?,?)";
        $result = $pdo->prepare($sql);
        $result->execute([$docente,$materia,$classe]);

        $classe = $result->fetchAll(PDO::FETCH_ASSOC);
        return $classe;
    } catch (PDOException $e) {
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}