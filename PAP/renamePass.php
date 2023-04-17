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
    $hostname='localhost';
    $username='root';
    $password='';
    $bd='papbd';
    $conectar= mysqli_connect($hostname, $username, $password,$bd);

    session_start();

    error_reporting(0);

    if($_SESSION['loggedIn']==NULL){
        echo "Ainda não está numa conta!";
    }else{
      $email= $_SESSION['utilizador'] [1];
      $pass= $_SESSION['utilizador'] [2];   
    }

    if (isset($_POST['submit'])) {

          $novaPass = $_POST['novaPass'];
          $confirmarpass= $_POST['confirmarpass'];

          if($confirmarpass== $novaPass){

          	if($pass == $novaPass){
				        echo "<script> alert('A nova palavra pass não pode ser igual á anterior!')</script>";
                $novaPass = "";
                $confirmarpass= "";
          	}else{
              if (preg_match('/\s/', $novaPass) || strlen($novaPass)<8) {
              echo "<script>alert('Woops! Por favor digite um formato de password correto.')</script>";
              }else{
    	            $sql = "SELECT password FROM utilizadores WHERE email='$email'";
    	            $result = mysqli_query($conectar, $sql);
    	      
    	            if ($result->num_rows > 0) {

    	              $sql = "UPDATE utilizadores SET password='$novaPass' WHERE email='$email'";
    	              $result = mysqli_query($conectar, $sql);

    	              if(!$result){
    	                echo "<script> alert('woops! Parece estar a acontecer um erro!')</script>";

    	                $novaPass = "";
    	                $confirmarpass= "";

    	              }else{
    	                $_SESSION['mensagem'] = 'Dados alterados com sucesso.';

    	                $sql = "SELECT * FROM utilizadores WHERE email='$email'";
    	                $result = mysqli_query($conectar, $sql);
    	                $row = mysqli_fetch_assoc($result);
    	                $_SESSION['utilizador'] = array($row['nome'], $row['email'], $row['password']);

    	                header("Location: index.php");
    	              }
    	            }else {
    	                echo "<script> alert('Email não existe na base de dados!')</script>";
    	                $novaPass = "";
    	                $confirmarpass= "";
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
        
        <input type="password" placeholder="novaPass" id="myInput" name="novaPass" value="<?php echo $novaPass; ?>" required>

        <input type="password" placeholder="confirmarpass" id="myInput" name="confirmarpass" value="<?php echo $confirmarpass; ?>" required>

      
    <div class="log-sign">
        <button class="login" type="submit" name="submit">
           Atualizar
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


</body>
</html>