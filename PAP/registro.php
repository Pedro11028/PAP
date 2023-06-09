<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Language Quizz- registro</title>

    <link rel="stylesheet" type="text/css" href="registro.css">

</head>
<body>
<?php
require 'conexao.php';

if (isset($_POST['submit'])) {
    $errMsg = '';
    // Obter variáveis do FROM
    $primeiroNome = $_POST['primeiroNome'];
    $sobrenome= $_POST['sobrenome'];
    $nomeUnico= $_POST['nomeUnico'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $imagemPerfil = "img/perfilPadrao.png";
    $nome= $primeiroNome." ".$sobrenome;

    try {
        // Verificar se os dados inseridos estão escritos corretamente
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email)<8){
                echo "<script>alert('Woops! Formato do email inválido, ou email menor que 8 letras.')</script>";
            }else{
                if (preg_match('/\s/', $password)|| strlen($password)<8) {
                    echo "<script>alert('Woops! Por favor digite um formato de password correto com mais de 8 letras.')</script>";
                }else{

                    // Verificar se já existe algum utilizador com o mesmo email
                    $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
                    $stmt->execute(array(':email' => $email));
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);

                    //Se não existir então verifica-se o nome único
                    if ($data == false) {

                        // Verificar se já existe algum utilizador com o mesmo nome Único
                        $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE nomeUnico = :nomeUnico');
                        $stmt->execute(array(':nomeUnico' => $nomeUnico));
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        //Se não existir então guarda os dados
                        if ($data == false) {

                        $stmt = $connect->prepare('INSERT INTO utilizadores (nome, nomeUnico, password, email, imagemPerfil, permissao) VALUES (:nome_utiliz, :nomeUnico,:pass_utiliz, :email_utiliz, :imagemPerfil, :permissao)');

                        $stmt->execute(array(':nome_utiliz' => $nome, ':nomeUnico' => $nomeUnico,':pass_utiliz' => $password, ':email_utiliz' => $email, ':imagemPerfil' => $imagemPerfil, ':permissao' => 0));
                        date_default_timezone_set('Etc/UTC');

                        $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
                        $stmt->execute(array(':email' => $email));
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        // são guardadas duas sessions uma com as informações do utilizador e outra para confirmar que está dentro da conta
                        $_SESSION['utilizador'] = array($data['nome'], $data['nomeUnico'],$data['email'], $data['password'], $data['Id_utilizador'], $data['imagemPerfil'], $data['permissao']);
                        
                        $_SESSION["loggedIn"] = true;

                        header("Location: index.php");
                        exit;
                        }else{
                            echo "<script>alert('Woops! Esse Nome de utilizador já existe.')</script>";
                        }
                    } else {
                    echo "<script>alert('Woops! Esse email já existe.')</script>";
                    
                    }
                }
            }

        }catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
    
?>

<form action="" method="POST" class="login-email"> 
    <br><br>
    <center>
        <h2>Criar uma Conta</h2>
    </center>

    <div class="input-info">

        &nbsp&nbsp&nbsp Nome Completo: 
        <br>
            <input class="nome" type="text" required="required" placeholder="Primeiro Nome" name="primeiroNome">
            <input class="nome" type="text" required="required" placeholder="Sobrenome" name="sobrenome">
        <br>
        <br>
        &nbsp&nbsp&nbsp Nome Utilizador:
        <br>
            <input class="nome" type="text" required="required" placeholder="Nome Único" name="nomeUnico">
        <br>
        <br>
        &nbsp&nbsp&nbsp Email:
        <br>
            <input type="email" placeholder="E-mail" required autocomplete="off" validate name="email">
        <br>
        <br>
        &nbsp&nbsp&nbsp Password:
        <br>
            <input type="password" placeholder="Password" id="myInput" name="password" required="required">
        <div class="log-sign">
        <br>
            <button class="signup" type="submit" name="submit"> 
               Registrar
            </button>
</form>
        &nbsp&nbsp&nbsp
        <a href="index.php">
            <button class="voltar" style="align-content: center;" form="voltarform">
                Cancelar
            </button>
        </a>
        </div>
</div>
