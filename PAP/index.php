<!DOCTYPE html>
<html>
<head>
	<title>Language Quizz- Página Inicial</title>
	<meta charset="utf-8">
	<script src="https://kit.fontawesome.com/410e89720f.js" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="index.css">

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
    $nomeUnico=$_SESSION['utilizador'] [1];
    $email= $_SESSION['utilizador'] [2];
    $password= $_SESSION['utilizador'] [3];
    $permissao= $_SESSION['utilizador'] [6];
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
            <input type="text" class="barraPesquisa">
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
    				<li><a class="dropContent" href="perfil.php"> <i class="fa-solid fa-user"></i> Perfil</a></li>
    				<li><a class="dropContent" href="Logout.php"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Sair </a></li>
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