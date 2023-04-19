<!DOCTYPE html>
<html>
<head>
	<title>Language Quizz- Página Inicial</title>
	<meta charset="utf-8">
	<script src="https://kit.fontawesome.com/410e89720f.js" crossorigin="anonymous"></script>
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
    border-radius: 24px;
    transition: 0.5s;
    text-align: center;
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

input[type="text"] {
   position: relative;
   top: 10px;
   left: 30px;
   border: 1px solid #828999;
   padding: 6px;
   border-radius: 5px;
   width: 80%;
   outline: none;
   text-indent: 10px;
}

.search{
   position: relative;
   top: 13px;
   width: 200%;
   height: 25%;
   transition: 0.5s;
   outline: none;
   background: none;
   border:none;
   color:white;
   cursor: pointer;
}

.search:hover{
   font-size: 120%;
   top: 13px;
   left: -4px;
}

.criarQuizz{
   position: relative;
   left:30px;
}
</style>

</head>
<body>
<?php

require 'conexao.php';

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
    if(!isset($_COOKIE['cookie'])){
      setcookie('cookie', time()+60*60*24*30);
      echo '<script>alert(\'Cookies adicionados com sucesso)\');</script>';
      header('Location: refreshCookie.php');
    }
}

if (isset($_SESSION['recusar']) && (time() - $_SESSION['recusar'] > 60*60*24*30)){
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
        <form>
          <li>
            <input type="text" />
          </li>
          <li>
            <button class="search"><i class="fa-solid fa-magnifying-glass"></i></button>
          </li>
        </form>

        <?php if($_SESSION['loggedIn']==true):?>
          <li class="criarQuizz"><a href="criarQuiz.php">Criar um Quizz</a></li>
        <?php endif; ?>

        <?php if($_SESSION['loggedIn']==true):?>
    		<li  class="direita"><a><?php echo strtok(mb_strimwidth("$nome", 0,11, "..."), " ");?></a>
    			<ul class="dropar">
    				<li><a class="colorBlack" href="perfil.php">Perfil</a></li>
    				<li><a class="colorBlack" href="Logout.php">Log Out</a></li>
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

    <p>Language Quizz &copy; 2022</p>
  </div>

</footer>

</body>
</html>