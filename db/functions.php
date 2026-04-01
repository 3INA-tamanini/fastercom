<?php
require_once "connection.php";


function checkLogin($email, $password){
    global $pdo;

    try{
        $error = "";

        $sql = "SELECT * FROM utenti WHERE email = ?";
        $result = $pdo->prepare($sql);
        $result->execute([$email]);

        $utente = $result->fetch(PDO::FETCH_ASSOC);

        if (empty($utente)) {
            $error = "Email non esistente!";
        }
        else{
            if(!password_verify($password,$utente['password_hash'])){
                $error = "Password errata!";
            }
        }
        return $error;
    }
    catch(PDOException $e){
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}

function getUserByEmail($email){
    global $pdo;

    try{
        $sql = "SELECT * FROM utenti WHERE email = ?";
        $result = $pdo->prepare($sql);
        $result->execute([$email]);

        $utente = $result->fetch(PDO::FETCH_ASSOC);

        return $utente;
    }
    catch(PDOException $e){
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}


function getInsegnamenti(){
    global $pdo;

    try{
        $sql = "SELECT materie.nome, docenti.nome, docenti.cognome FROM materie, docenti, insegnamenti";
        $result = $pdo->prepare($sql);
        $result->execute();

        $materie = $result->fetchAll(PDO::FETCH_ASSOC);

        return $materie;
    }catch(PDOException $e){
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}
function getMaterie(){
    global $pdo;

    try{
        $sql = "SELECT nome FROM materie";
        $result = $pdo->prepare($sql);
        $result->execute();

        $materie = $result->fetchAll(PDO::FETCH_ASSOC);

        return $materie;
    }catch(PDOException $e){
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}


function getDocenti(){
    global $pdo;

    try{
        $sql = "SELECT nome, cognome FROM docenti";
        $result = $pdo->prepare($sql);
        $result->execute();

        $docenti = $result->fetchAll(PDO::FETCH_ASSOC);

        return $docenti;
    }catch(PDOException $e){
        echo "<script>alert('Errore" . $e->getMessage() . "')</script>";
    }
}