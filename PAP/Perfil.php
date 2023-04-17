<!DOCTYPE html>
<html>
<head>
	<title>Language Quizz- Perfil</title>
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

.imgPerfil{
  border: #CCF solid 4px;
  padding: 1px;
  border-radius: 70%;
  border-top-color: #0000FF;
  border-left-color: #0000FF;
  width: 100px;
  height: 100px;
  position: absolute;
  left: 29%;
}

.divPosition{
    border-style: solid;
    border-color: coral;
    position: left;
    width: 600px;
    height: 140px;
}

.Informações{
    border-style: solid;
    border-color: coral;
    position: left;
    width: 560px;
    height: 270px;
}

.changeImg{
    position: absolute;
    top: 17%;
    left: 38%;
    margin-left: -.2em;
    margin-top: -.4em;
    width: 100px;
    height: 30px;
    color: #138ABE;
    background-color: white;
    border-radius: 4px;
    transition: background-color 1s;

}

.input-info {
    margin-top: 20px;
    margin-bottom: 15px;
}

input[type="text"],input[type="email"],input[type="password"],input[type="confirmarpass"]  {
    border: 1px solid #828999;
    padding: 6px;
    border-radius: 5px;
    width: 65%;
    background: none;
    margin: 0px 5px 5px 10px;
    outline: none;
    transition: 0.5s;
    text-indent: 10px;
    overflow: hidden;
}

.input-info input:hover{
    background: gray;
    color :white
}

.button{
    padding: 5px;
    margin-top: 16px;
    width: 103px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.5s;
    border: 1px solid #435688;
    outline: none;
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
    }

  $_SESSION['resgistrar']=false;
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
		
	<?php else: ?>  
	
		<li class="direita"><a href="login.php">Login</a></li>
		<li class="direita"><a href="registro.php">Register</a></li>
	<?php endif; ?>
    </ul>
</nav>

<?php
    require 'conexao.php';

    if($_SESSION['utilizador']==true){
      $nome= $_SESSION['utilizador'] [0];
      $email= $_SESSION['utilizador'] [1];
      $password= $_SESSION['utilizador'] [2];
      $id_utilizador= $_SESSION['utilizador'] [3];
    }

        if ($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }

        $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE Id_utilizador = :id_utilizador');
        $stmt-> execute(array(':id_utilizador' => $id_utilizador));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<br>

<div class='divPosition'> 
    <img class='imgPerfil' <?php echo("src='$data[imagemPerfil]'") ?>>
    <button class='changeImg'>Alterar Imagem</button>
</div>
<hr>
<div class='Informações'>
    <div>
        <form action="" method="POST">
            <div class="input-info">
                <label class="form-label">Nome: </label>
                <input type="text" name="aaa" <?php echo("value='$data[nome]'") ?>>
                <button class="button" >Mudar Nome</button>
            </div>
        </form>
    </div>
</div>

<br>
        


</body>
</html>