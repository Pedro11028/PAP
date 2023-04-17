<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Play Games_registrar</title>

<style type="text/css">
        
* {
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
  }


form {
  height: 400px;
  width: 350px;
  margin: 60px auto;
  border-radius: 8px;
  background: white;
}
button{
  box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.58);
}


form p {
  color: #828999;
  font-size: 11px;
  text-align: center;
  margin-top: -19px;
}

form p>a{color:#828999;text-decoration: none;transition: 0.3s }
form p>a:hover{color: #1da1f2}
form p>a:active{color: #1da1f2 }




.input-info {
  margin-top: 30px;
  margin-bottom: 15px;
}

input[type="text"],input[type="email"],input[type="password"],input[type="confirmarpass"]  {
    border: 1px solid #828999;
    padding: 10px;
    border-radius: 5px;
    width: 90%;
    background: none;
    margin: 5px 5px 5px 17px;
    outline: none;
    transition: 0.3s;
    text-indent: 15px;
    overflow: hidden;
}

.input-info input:hover{background: #435688}
.input-info input[type="checkbox"] {margin-left: 17px;cursor: pointer;margin-top: 7px}
.input-info span {color: #83899a;font-size: 11px;}
.input-info span>a{color:#1da1f2 }
.input-info span>a:hover{color:#fff }




.log-sign{text-align: center;}
.signup,
.login{
    padding: 10px;
    margin-top: 16px;
    background: #435688;
    color: #fff;
    width: 103px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.5s;
    border: 1px solid #435688;
    outline: none;
}



.log-sign .signup>a{color: #fff;text-decoration: none;}

.log-sign button:hover{
   background:none;
   border:1px solid #828999;
   color: #828999;
}

.send{
    padding: 10px;
    margin-top: 16px;
    background: #435688;
    color: #fff;
    width: 103px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.5s;
    border: 1px solid #435688;
    outline: none;
    margin-left: 32%
}

.voltar{
        padding: 10px;
        margin-top: 16px;
        background: #000000;
        color: #fff;
        width: 103px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.5s;
        border: 1px solid #435688;
        outline: none;
        text-align: center;
       }


body {
  background-image: url('img/background.jpg') ;
}

</style>

</head>
<body>
<?php
require 'conexao.php';

if (isset($_POST['submit'])) {
    $errMsg = '';
    // Obter variáveis do FROM
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $imagemPerfil = "img/perfilPadrao.png";

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

                    //Se não existir então guarda os dados
                    if ($data == false) {
                        $stmt = $connect->prepare('INSERT INTO utilizadores (nome, password, email, imagemPerfil) VALUES (:nome_utiliz, :pass_utiliz, :email_utiliz, :imagemPerfil)');

                        $stmt->execute(array(':nome_utiliz' => $nome, ':pass_utiliz' => $password, ':email_utiliz' => $email, ':imagemPerfil' => $imagemPerfil));
                        date_default_timezone_set('Etc/UTC');

                        $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
                        $stmt->execute(array(':email' => $email));
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        // são guardadas duas sessions uma com as informações do utilizador e outra para confirmar que está dentro da conta
                        $_SESSION['utilizador'] = array($data['nome'], $data['email'], $data['password'], $data['Id_utilizador'], $data['imagemPerfil']);
                        $_SESSION["loggedIn"] = true;
                        echo '<script>window.location.replace("index.php")</script>';
                        exit;
                    } else {
                    echo "<script>alert('Woops! Esse utilizador já existe.')</script>";
                    
                    }
                }
            }

        }catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
    
    if (isset($_GET['action']) && $_GET['action'] == 'joined') {
        $successMsg = 'Registration successful Now you can <a href="/">login</a>';
    }
?>

<form action="" method="POST" class="login-email">
    <br>
    <br>
    <div class="input-info">

        <input type="text" required="required" placeholder="nome" name="nome">

        <input type="email" placeholder="E-mail" required autocomplete="off" validate name="email">

        <input type="password" placeholder="password" id="myInput" name="password" required="required">
    <div class="log-sign">    
            <button class="signup" type="submit" name="submit"> 
               Registrar
            </button>
            <br>
            <a href="index.php">
                <button class="voltar" style="align-content: center;" form="voltarform">
                    Cancelar
                </button>
            </a>
    </div>
    </div>
</form>