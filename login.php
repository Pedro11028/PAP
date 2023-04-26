<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Language Quizz- Login</title>

<link rel="stylesheet" href="login.css">
</head>
<body>

<?php
require 'conexao.php';

if (!empty($_SESSION['loggedIn'])) {
    header('Location: index.php');
}
if (isset($_POST['submit'])) {
    $errMsg = '';
    // Obter variáveis do from
    $email = $_POST['email'];
    $password = $_POST['password'];
                    echo "<script>alert('$password')</script>";
        try {

            $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
            $stmt-> execute(array(':email' => $email));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($data == false) {
                echo "<script>alert('Utilizador não existe.')</script>";
            } else {
                if ($password == $data['password']) {
                        $_SESSION['utilizador'] = array($data['nome'], $data['nomeUnico'],$data['email'], $data['password'], $data['Id_utilizador'], $data['imagemPerfil'], $data['permissao']);
                    $_SESSION["loggedIn"] = true;
                    
                    header("Location: index.php");
                    exit;
                } else {
                    echo "<script>alert('$password')</script>";
                }
            }
        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
?>


<div id='AppendHere'></div>

    <br>
    <br>
    <br>
<form action="" method="POST">

    <br>
    <br>
    <br>
    <center>
        <h2>Bem vindo de volta</h2>
    </center>
    
    <div class="input-info">

        <br>
            <input type="email" placeholder="E-mail" required autocomplete="off" validate name="email">
        <br>
        <br>
            <input required="required" type="password" placeholder="passsword" id="myInput" name="password">
        <div class="log-sign">
        <br>
      
    <div class="log-sign">
        <button class="login" type="submit" name="submit">
             Login
        </button>

                &nbsp&nbsp&nbsp
        
        <a href="index.php">
            <button class="voltar" style="align-content: center;" form="voltarform">
                Cancelar
            </button>
        </a>
    </div>
    </div>
</form>