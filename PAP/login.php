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

form h1 {
  text-align: center;
  color: rgba(255, 255, 255, 0.42);
  padding-top: 64px;
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
.signup {
  background: #9e3434;
  border: 1px solid #9e3434;
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

if (!empty($_SESSION['loggedIn'])) {
    header('Location: index.php');
}
if (isset($_POST['submit'])) {
    $errMsg = '';
    // Obter variáveis do from
    $email = $_POST['email'];
    $password = $_POST['password'];

        try {

            $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
            $stmt-> execute(array(':email' => $email));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($data == false) {
                echo "<script>alert('Utilizador não existe.')</script>";
            } else {
                if ($password == $data['password']) {
                    $_SESSION['utilizador'] = array($data['nome'], $data['email'], $data['password'], $data['Id_utilizador'], $data['imagemPerfil']);
                    $_SESSION["loggedIn"] = true;
                    
                    header("Location: index.php");
                    exit;
                } else {
                    echo "<script>alert('Password não corresponde.')</script>";
                }
            }
        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
?>

<div id='AppendHere'></div>

<form action="" method="POST">
    <br>
    <br>

    <div class="input-info">

        <input type="email" placeholder="E-mail" required autocomplete="off" validate name="email">
        <i class="fa fa-lock"></i>

        <input required="required" type="password" placeholder="passsword" id="myInput" name="password">

      
    <div class="log-sign">
        <button class="login" type="submit" name="submit">
             Login
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