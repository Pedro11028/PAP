<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Play Games_Atualizar</title>

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

form p>a{
    color:#828999;text-decoration: none;transition: 0.3s 
}
form p>a:hover{
    color: #1da1f2
}
form p>a:active{
    color: #1da1f2 
}

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

.input-info input:hover{
    background: #435688
}
.input-info input[type="checkbox"] {
    margin-left: : 17px;cursorpointer;margin-top: 7px
}




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

    if($_SESSION['loggedIn']==NULL){
        header("Location: index.php");
    }else{
      $email= $_SESSION['utilizador'] [1];
      $pass= $_SESSION['utilizador'] [2];
      $id_utilizador= $_SESSION['utilizador'] [3];
    }

    if (isset($_POST['submit'])) {
          $passAntiga= $_POST['passAntiga'];
          $novaPass = $_POST['novaPass'];
          $confirmarpass= $_POST['confirmarpass'];

          if($confirmarpass == $novaPass){

          	if($pass == $novaPass){
				echo "<script> alert('A nova palavra pass não pode ser igual á anterior!')</script>";
                $novaPass = "";
                $confirmarpass= "";

          	}else{
              if (preg_match('/\s/', $novaPass) || strlen($novaPass)<8) {
                echo "<script>alert('Woops! Por favor digite um formato de password correto.')</script>";
              
              }else{

                $sql = 'UPDATE utilizadores SET password = :password WHERE Id_utilizador = :id_utilizador';

                // preparar declaração
                $stmt = $connect->prepare($sql);

                // atribuir valores aos parametros
                $stmt->bindParam(':id_utilizador', $id_utilizador, PDO::PARAM_INT);
                $stmt->bindParam(':password', $novaPass);

                // exexutar a atualização
                if ($stmt->execute()) {

                    $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
                    $stmt->execute(array(':email' => $email));
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['mensagem'] = 'Dados atualizados com sucesso.';

                    $_SESSION['utilizador'] = array($data['nome'], $data['email'], $data['password'], $data['Id_utilizador'], $data['imagemPerfil']);
                    header("Location: Perfil.php");
                }
              }
          }
          }else{
              echo "<script> alert('As passwords devem ser iguais!')</script>";
              $novaPass = "";
              $confirmarpass= "";
          }
    }

?>

<div id='AppendHere'></div>

<form action="" method="POST">

  <h1></h1>  
    <div class="input-info">
        
        <i class="fa fa-user"></i>
        
        <input type="password" required="required" placeholder="Password Antiga" id="myInput" name="passAntiga" >

        <input type="password" required="required" placeholder="Nova Password" id="myInput" name="novaPass" >

        <input type="password" required="required" placeholder="Confirmar Password" id="myInput" name="confirmarpass">

      
    <div class="log-sign">
        <button class="login" type="submit" name="submit">
           Atualizar
        </button>
        <br>
        <a href="Perfil.php">
          <button class="voltar" style="align-content: center;" form="voltarform">
              Cancelar
          </button>
        </a>
    </div>
    </div>
</form>


</body>
</html>