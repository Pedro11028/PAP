<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Play Games_Eliminar</title>
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
 
.fa-refresh, .fa-lock, 
.fa-envelope, .fa-user-plus, 
.fa-user {
    position: absolute;
    margin-top: 14px;
    margin-left: 24px;
    color: #828999;
    display: block;
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

.footer-distributed {
  background-color: #292c2f;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: center;
  font: normal 16px sans-serif;
  padding: 45px 50px;
  position:absolute;
  bottom:0;
}

.footer-distributed .footer-center p {
  color: #8f9296;
  font-size: 14px;
  margin: 0;
  position: center;
}

.footer-distributed p.footer-links {
  font-size: 18px;
  font-weight: bold;
  color: #ffffff;
  margin: 0 0 10px;
  padding: 0;
  transition: ease .25s;
}

.footer-distributed p.footer-links a {
  display: inline-block;
  line-height: 1.8;
  text-decoration: none;
  color: inherit;
  transition: ease .25s;
}

.footer-distributed .footer-links a:before {
  content: "·";
  font-size: 20px;
  left: 0;
  color: #fff;
  display: inline-block;
  padding-right: 5px;
}

.footer-distributed .footer-links .link-1:before {
  content: none;
}

.footer-distributed .footer-links a:hover{
  text-decoration:underline;
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
        header("Location: index.php");
    }else{
      $email= $_SESSION['utilizador'] [1];
      $ID_utilizador= $_SESSION['utilizador'] [3];
    }
    if (isset($_POST['submit'])) {

      $password = $_POST['password'];
      $confirmarpass= $_POST['confirmarpass'];

          if($confirmarpass== $password){
            $sql = "SELECT * FROM utilizadores WHERE email='$email' AND password='$password'";
            $result = mysqli_query($conectar, $sql);

            if ($result->num_rows > 0) {

              $sql = "DELETE FROM utilizadores WHERE ID_utilizador = '$ID_utilizador'";
              $result = mysqli_query($conectar, $sql);

              $sql = "DELETE FROM utilizadores WHERE ID_utilizador = '$ID_utilizador'";
              $result = mysqli_query($conectar, $sql);

              $sql = "DELETE FROM utilizadores WHERE ID_utilizador = '$ID_utilizador'";
              $result = mysqli_query($conectar, $sql);

              $sql = "DELETE FROM utilizadores WHERE ID_utilizador = '$ID_utilizador'";
              $result = mysqli_query($conectar, $sql);
              
              if(!$result){
                echo "<script> alert('Password incorreta!')</script>";
                $password = "";
                $confirmarpass= "";

              }else{
                   $_SESSION["loggedIn"] = false;
                   $_SESSION['mensagem'] = 'Conta eliminada com sucesso';
                   header("Location: index.php");
              }
            }else {
                echo "<script> alert('Password incorreta!')</script>";
                $password = "";
                $confirmarpass= "";
              }
          }else{
                echo "<script> alert('As passwords devem ser iguais')</script>";
                $password = "";
                $confirmarpass= "";
               }
    }

?>

<div id='AppendHere'></div>

<form action="" method="POST" class="form">

    <br>
    <br>

    <div class="input-info">

        <input type="password" placeholder="passsword" id="myInput" name="password" value="<?php echo $password; ?>" required>

        <input type="password" placeholder="confirmarpass" id="myInput" name="confirmarpass" value="<?php echo $confirmarpass; ?>" required>

    
        <div class="log-sign">
        
          <button class="login" type="submit" name="submit">
             Eliminar
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