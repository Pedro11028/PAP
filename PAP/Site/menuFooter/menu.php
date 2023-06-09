<!DOCTYPE html>
<html>
<head>
	<title>Language Quizz- Página Inicial</title>
	<meta charset="utf-8">
	<script src="https://kit.fontawesome.com/410e89720f.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="menuFooter/menu.css">

</head>
<body>

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
          <li class="criarQuizz"><a href="escolherTipoQuizz.html">Criar um Quizz</a></li>


    		<li id="dropUtilizador" class="direita"><a id="nomeUtilizador"></a>
    			<ul id="dropUtilizador" class="dropar">
    				<li><a id="dropUtilizador" class="dropContent" href="perfil.html"> <i class="fa-solid fa-user"></i> Perfil</a></li>
    				<li><a id="dropUtilizador" class="dropContent" href="Logout.html"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Sair </a></li>
    			</ul>
    		</li>
    	    <?php ?>
    	
    		<li id="login" class="direita"><a href="login.html">Login</a></li>
    		<li id="register" class="direita"><a href="registo.html">Register</a></li>
    	<?php ?> 
    </ul>
</nav>


<script src="menuFooter/menu.js"></script>