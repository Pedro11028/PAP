<?php
require 'conexao.php';

    // Obter variáveis do FROM
    $primeiroNome = $_POST['primeiroNome'];
    $sobrenome= $_POST['sobrenome'];
    $nomeUnico= $_POST['nomeUnico'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $imagemPerfil = "img/perfilPadrao.png";
    $nomeCompleto= $primeiroNome." ".$sobrenome;

    try {
        // Verificar se os dados inseridos estão escritos corretamente
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email)<8){
                $msg= 'Woops! Formato do email invalido, ou email menor que 8 letras.';
                    echo json_encode($msg); 
            }else{
                if (preg_match('/\s/', $password)|| strlen($password)<8) {
                    $msg= "Woops! Por favor digite um formato de password correto com mais de 8 letras.";
                    echo json_encode($msg); 

                }else{

                    // Verificar se já existe algum utilizador com o mesmo email
                    $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
                    $stmt->execute(array(':email' => $email));
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);

                    //Se não existir então verifica-se o nome único
                    if ($data == false) {

                        // Verificar se já existe algum utilizador com o mesmo nome Único
                        $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE nomeUnico = :nomeUnico');
                        $stmt->execute(array(':nomeUnico' => $nomeUnico));
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        //Se não existir então guarda os dados
                        if ($data == false) {

                        $stmt = $connect->prepare('INSERT INTO utilizadores (nomeCompleto, nomeUnico, password, email, imagemPerfil, permissao) VALUES (:nomeCompleto, :nomeUnico,:pass_utiliz, :email_utiliz, :imagemPerfil, :permissao)');

                        $stmt->execute(array(':nomeCompleto' => $nomeCompleto, ':nomeUnico' => $nomeUnico,':pass_utiliz' => $password, ':email_utiliz' => $email, ':imagemPerfil' => $imagemPerfil, ':permissao' => 0));
                        date_default_timezone_set('Etc/UTC');

                        $stmt = $connect->prepare('SELECT * FROM utilizadores WHERE email = :email');
                        $stmt->execute(array(':email' => $email));
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);

                        // são guardadas duas sessions uma com as informações do utilizador e outra para confirmar que está dentro da conta
                        $_SESSION['utilizador'] = array($data['Id_utilizador'], $data['nomeCompleto'], $data['nomeUnico'],$data['email'], $data['password'], $data['imagemPerfil'], $data['pontuacao'],$data['permissao']);
                        $_SESSION["loggedIn"] = true;

                        $msg= "aksuaz.";
                        echo json_encode($msg); 
                        exit;
                        }else{
                            $msg= "Woops! Esse Nome de utilizador ja existe.";
                            echo json_encode($msg); 
                        }
                    } else {
                    $msg= "Woops! Esse email já existe.";
                    echo json_encode($msg); 
                    
                    }
                }
            }

        }catch(PDOException $error) {
            $msg= "Parece estar a ocorrer um erro com a base de dados!";
            echo json_encode($msg); 
        }
?>