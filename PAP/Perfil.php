<!DOCTYPE html>
<html>
<head>
    <title>Language Quizz- Perfil</title>
    <meta charset="utf-8">
</style>

</head>
<body>
<?php
    require 'conexao.php';

    if($_SESSION["loggedIn"] == false){
        header("Location: index.php");
    }

    if($_SESSION['utilizador']==true){
        $nome= $_SESSION['utilizador'] [0];
        $nomeUnico=$_SESSION['utilizador'] [1];
        $email= $_SESSION['utilizador'] [2];
        $password= $_SESSION['utilizador'] [3];
        $id_utilizador= $_SESSION['utilizador'] [4];
        $permissao= $_SESSION['utilizador'] [6];
    }

    if(!empty($_SESSION['mensagem'])) {
        $mensagem = $_SESSION['mensagem'];
        echo "<script> alert('$mensagem')</script>";
        unset($_SESSION['mensagem']);
    }   

        $sql = $connect->prepare('SELECT * FROM utilizadores WHERE Id_utilizador = :id_utilizador');
        $sql-> execute(array(':id_utilizador' => $id_utilizador));
        $data = $sql->fetch(PDO::FETCH_ASSOC);

        $guardarNome= "$data[nome]";

        $pontuacao= "";
        $pontuacao = "$data[pontuacao]";
        $nivel= "0";

        intval($pontuacao);

        switch (true) {

            case ($pontuacao >=100 && $pontuacao <200):
                $nivel="1";
                break;

            case ($pontuacao >=200 && $pontuacao <300):
                $nivel="2";
                break;

            case ($pontuacao >=300 && $pontuacao <400):
                $nivel="3";
                break;

            case ($pontuacao >=400 && $pontuacao <500):
                $nivel="4";
                break;
            case $pontuacao >=500:
                $nivel="5";
                break;
        }

    if (isset($_POST['alterarNome'])) {
        $errMsg = '';
        // Obter nome do FROM
        $nome = $_POST['nome'];

        try {
            //Verificar se o nome é diferete do atual
            if ($guardarNome != $nome) {
                
                $sql = 'UPDATE utilizadores SET nome = :nome WHERE Id_utilizador = :Id_utilizador';

                // preparar declaração
                $stmt = $connect->prepare($sql);

                // atribuir valores aos parametros
                $stmt->bindParam(':Id_utilizador', $id_utilizador, PDO::PARAM_INT);
                $stmt->bindParam(':nome', $nome);

                // exexutar a atualização
                if ($stmt->execute()) {
                    echo "<script>alert('O seu nome foi atualizado com sucesso!')</script>";
                }
                $_SESSION['utilizador'] [0]= $nome;
                $guardarNome="$nome";
                
            } else {
            echo "<script>alert('Woops! O nome não pode ser o mesmo.')</script>";
            
            }

    }catch(PDOException $error) {
        echo $error->getMessage();
    }
}
?>


<link rel="stylesheet" type="text/css" href="Perfil.css">

<script src="https://kit.fontawesome.com/410e89720f.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="jsPerfil.js" crossorigin="anonymous"></script>



<nav class="nav">
    <ul>
        <li>
            <a href="index.php">Início</a>
        </li> 
        <form>
          <li>
            <input  class="barraPesquisa">
          </li>
          <li>
            <button class="search"><i class="fa-solid fa-magnifying-glass"></i></button>
          </li>
        </form>

        <?php if($_SESSION['loggedIn']==true):?>
          <li class="criarQuizz"><a href="criarQuiz.php">Criar um Quizz</a></li>
        <?php endif; ?>

        <?php if($_SESSION['loggedIn']==true):?>
            <li  class="direita"><a><?php echo strtok(mb_strimwidth("$data[nomeUnico]", 0,11, "..."), " ");?></a>
                <ul class="dropar">
                    <li><a class="dropContent" href="#" style="color:rgb(24, 139, 233);"> <i class="fa-solid fa-user"></i> Perfil</a></li>
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

<div class='Informações'>
    <div class="borderFront">
        <img id='imgPerfil' <?php echo("src='$data[imagemPerfil]'") ?>>
        <button class='changeImg' onclick="openForm()">Alterar Imagem</button>
    </div>
    <div>
        <p class="textInsertImg">Permitido JPG e PNG. </p>
    </div>
    <div class="showLines">
        <form action="" method="POST">
            <div class="input-info">
                <label class="form-label">Nome Utilizador</label> <p>
                <input type="text" required="required" name="nome" <?php echo("value='$data[nome]'") ?>>
                <button class="button" name="alterarNome">Mudar Nome</button>
            </div>
        </form>
    </div>
    <div>
            <div class="input-info">
                <label class="form-label">Password Utilizador</label><p>
                <input type="password" name="password" <?php echo("value='$data[password]'") ?> readonly>&nbsp
                <a href="renamePass.php" > <button class="button">Mudar password</button> </a>
            </div>
    </div>
    <div>
        <div class="input-info">
            <table style="width:100%">
                <tr>
                  <th>
                     <label class="form-label" align="left">Quizzes Criados</label>
                  </th>
                </tr>
                <tr>
                  <td>
                     <label> <?php echo("$data[quizzCriados]") ?>&nbsp </label>
                  </td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <div class="input-info">
            <table style="width:100%">
                <tr>
                  <th>
                     <label class="form-label" align="left">Quizzes Realizados</label>
                  </th>
                </tr>
                <tr>
                  <td>
                     <label> <?php echo("$data[quizzesRealizados]") ?>&nbsp </label>
                  </td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <div class="input-info">
            <table style="width:100%">
                <tr>
                  <th>
                     <label class="form-label" align="left">Número de avaliações feitas</label>
                  </th>
                </tr>
                <tr>
                  <td>
                     <label> <?php echo("$data[num_avaliações]") ?>&nbsp </label>
                  </td>
                </tr>
            </table>
        </div>
    </div>
    <div>
        <form action="" method="POST">
            <div class="input-info">
                <a class="alterarFuncoes" href="elimin_conta.php">Excluir Conta</button>
            </div>
        </form>
    </div>
    <div>
        <form action="" method="POST">
            <div class="input-info">
                <a class="alterarFuncoes" href="logout.php">Sair</button></a>
            </div>
        </form>
    </div>
</div>
<br>

<div class="outCloseForm" id="showBackground">
    <div class='imagensPopUp' id="showForm">
        <div class="borderFront">
            <img id='imgPerfil' <?php echo("src='$data[imagemPerfil]'") ?>>
            &nbsp&nbsp&nbsp
            <span  style="vertical-align: top;">Imagem Atual</span>
        </div>

        <br>
        <hr class="separarImagens">
        <br>

        <form action="" method="POST">
        <div class="borderFront">

            <?php if($nivel>='1'):?>
                <input class="radio" type="radio" id="imgRoblox" name="groupOfimages" value="0"> 

                <label for="imgRoblox">
                    <img id='imgPerfil' src='img/Roblox.jpg'>
                </label>
                &nbsp&nbsp&nbsp
            <?php else: ?>
                <img id='imgPerfil' src='img/Cadeado.png'>
                &nbsp&nbsp&nbsp
            <?php endif; ?>
                
            <?php if($nivel>='2'):?>
                <input class="radio" type="radio" id="imgLOL" name="groupOfimages" value="0"> 

                <label for="imgLOL">
                    <img id='imgPerfil' src='img/LOL.jpg'>
                </label>
                &nbsp&nbsp&nbsp
            <?php else: ?>
                <img id='imgPerfil' src='img/Cadeado.png'>
                &nbsp&nbsp&nbsp
            <?php endif; ?>

        </div>
        </form>
        <div class="borderFront">
            <button class='changeImg' onclick="closeForm()">Cancelar</button>
        </div>
    </div>
</div>

</body>
</html>