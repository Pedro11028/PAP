<!DOCTYPE html>
<html>
<head>
	<title>Play Games- Página Inicial</title>
	<meta charset="utf-8">
	
<style type="text/css">	

* {
    margin: 0 auto;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
  }

nav {
	margin: 0 auto;
	background: black;
	box-shadow:0 3px 15px rgba(0,0,0,.15);
}

nav::after {
	display: block;
	content: '';
	clear: both;
}

nav ul {
	padding: 0;
	margin: 0;
	list-style: none;
}

nav ul li {
	float: left;
	position: relative;
}

nav ul li a {
			 display: block;
			 color: blue;
			 text-decoration: none;
			 padding: 1rem 2rem;
             color:white;
			}

nav li:hover ul, .menu li.over ul{
    display:block;
}

nav ul li a:hover {
                     background-color: rgb(24, 139, 233);
                    }
nav li ul li{
border:1px solid #c0c0c0;
display:block;
width:123px;
}

nav ul li ul li a {
	background: transparent;
	border-bottom: 1px solid #DDE0E7;
}

nav ul li ul li a:hover {
	background-color: #1111;
}


.dropar {
	display: none;
	position: absolute;
	background: #fff;
	text-align: center;
}
.colorBlack{
    color: black;
}

.direita{
        float: right;
        margin-right: 0px;
	    width:123px;
        }

.conteudo {
            position: relative;
            width: 20%;
          }

.footer-distributed {
  background-color: #292c2f;
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: center;
  font: normal 16px sans-serif;
  padding: 45px 50px;
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

.cookie-overlay {
  position: fixed;
  bottom: 1rem;
  left: 1rem;
  background: black;
  line-height: 30px;
  font-size: 14px;
  border-radius: 3px;
  color: white;
}
  > div:first-child {
    width: 458px;
  }

.bt_cookies{
  background: black;
  color: white;
  line-height: 30px;
  font-size: 14px;
}

.bt_cookies:hover {
    background: grey;
}


</style>

</head>
<body>
<?php

    $hostname='localhost';
    $username='root';
    $password='';
    $bd='projetobd';
    $conectar= mysqli_connect($hostname, $username, $password,$bd);

    session_start();

    error_reporting(0);

    if(!empty($_SESSION['mensagem'])) {
   		$mensagem = $_SESSION['mensagem'];
   		echo "<script> alert('$mensagem')</script>";
   		unset($_SESSION['mensagem']);
	}	

	if($_SESSION['utilizador']==true){
      $nome= $_SESSION['utilizador'] [0];
      $email= $_SESSION['utilizador'] [1];
      $password= $_SESSION['utilizador'] [2];
      $permissao= $_SESSION['utilizador'] [4];
    }

  $_SESSION['resgistrar']=false;

    if (isset($_POST['aceitar'])) {
        if(!isset($_COOKIE['cookie']))
        {
            setcookie('cookie', time()+60*60*24*30);
            echo '<script>alert(\'Cookies adicionados com sucesso)\');</script>';
            header('Location: refreshCookie.php');
        }
    }

    if (isset($_SESSION['recusar']) && (time() - $_SESSION['recusar'] > 60*60*24*30)) {

        unset($_SESSION['recusar']);

    }else{
        if (isset($_POST['negar'])) {
            $_SESSION['recusar']= time();
            header('Location: refreshCookie.php');
        }
    }


?>


<nav class="nav">
	<ul>
		<li>
			<a href="index.php">Início</a>
		</li> 
    <li><a href="">Pesquisa</a></li>

    <?php if($permissao=='1'):?>
    <li ><a href="PainelAdmin.php">Painel_ADM</a></li>
    <?php endif; ?>

    <?php if($_SESSION['loggedIn']==true):?>
		<li  class="direita"><a><?php echo strtok(mb_strimwidth("$nome", 0,11, "..."), " ");?></a>
			<ul class="dropar">
				<li><a class="colorBlack" href="perfil.php">Perfil</a></li>
                <li><a class="colorBlack" href="renamePass.php">Alterar pass</a></li>
				<li><a class="colorBlack" href="Logout.php">Log Out</a></li>
				<li><a class="colorBlack" href="">Eliminar</a></li>
			</ul>
		</li>
	<?php else: ?>  
	
		<li class="direita"><a href="login.php">Login</a></li>
		<li class="direita"><a href="registro.php">Register</a></li>
	<?php endif; ?>
    </ul>
</nav>


<br>
<p></p>
<br>
<p></p><br>
<p></p>
<br>
<p></p><br>
<p></p>
<br>
<p></p><br>
<p></p>
<br>
<p></p><br>
<p></p>
<br>
<p></p><br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>
<br>
<p></p>

<footer class="footer-distributed">

  <div class="footer-center">

    <p class="footer-links">
      <a class="link-1" href="#">Inicio</a>

      <a href="">Pesquisa</a>

      <a>Contato 999-999-999</a>
    </p>

    <p>Play Games &copy; 2022</p>
  </div>

</footer>

</body>
</html>