<?php

require 'conexao.php';

class Utilizador {

    function UtilizadorEValido($email,$password){
        $conexao = new Conexao();
        $stmt = $conexao->runQuery('SELECT * FROM utilizadores WHERE email = :email');
        $stmt-> execute(array(':email' => $email));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data == false) {
            return false;
        } else {
            if ($password == $data['password']) {
              $filtrarDados = array( 'Id_utilizador'=> $data["Id_utilizador"], 
                                     'nomeUnico' => $data["nomeUnico"],
                                     'permissao' => $data["permissao"]
                                   );

                return $filtrarDados;
            } else{
            return false;
            }
        }
    }
  }

// if(!empty($_SESSION['mensagem'])) {
// 	$mensagem = $_SESSION['mensagem'];
// 	echo "<script> alert('$mensagem')</script>";
// 	unset($_SESSION['mensagem']);
// }	

// if($_SESSION['utilizador']==true){
//     $nome= $_SESSION['utilizador'] [1];
//     $nomeUnico=$_SESSION['utilizador'] [2];
//     $email= $_SESSION['utilizador'] [3];
//     $password= $_SESSION['utilizador'] [4];
//     $permissao= $_SESSION['utilizador'] [7];
// }

// $_SESSION['resgistrar']=false;




// function guardarDados($data, $connect){
//     $_SESSION['utilizador'] = array($data['Id_utilizador'], $data['nomeCompleto'], $data['nomeUnico'],$data['email'], $data['password'], $data['imagemPerfil'], $data['pontuacao'],$data['permissao']);
//     $_SESSION["loggedIn"] = true;      
//     echo "sucesso";
// }


//     // Obter variáveis do login

//     $email = $_POST['email'];
//     $password = $_POST['password'];
    
//             echo "erro";
//     selecionarUtilizadores($email, $password, $connect);


// function selecionarUtilizadores($email, $password) {

//     $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
//     $stmt-> execute(array(':email' => $email));
//     $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
//     if ($data == false) {
//         echo "erro";
//     } else {

// }


//     // Obter variáveis do from
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     selecionarUtilizadores($email, $password);
?>