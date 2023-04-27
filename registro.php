<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Language Quizz- registro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="registro.css">

</head>
<body>
<form> 
    <br><br>
    <center>
        <h2>Criar uma Conta</h2>
    </center>

    <div class="input-info">

        <br>
            <input class="nomeInteiro" type="text" required="required" placeholder="Primeiro Nome" id="primeiroNome">
            <input class="nomeInteiro" type="text" required="required" placeholder="Sobrenome" id="sobrenome">
        <br>
        <br>
            <input type="text" required="required" placeholder="Nome Único" id="nomeUnico">
        <br>
        <br>
            <input type="email" placeholder="E-mail" required autocomplete="off" validate id="email">
        <br>
        <br>
            <input type="password" placeholder="Password" id="password" autocomplete="on" required="required">
        <div class="log-sign">
        <br>
            <button id="submit" class="signup" type="submit" name="submit"> 
               Registrar
            </button>
</form>
        <a href="index.php">
            <button class="voltar" style="align-content: center;" form="voltarform">
                Cancelar
            </button>
        </a>
        </div>
</div>
</form>
<script src="registro.js"></script>
</body>
</html>