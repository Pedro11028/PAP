<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Language Quizz- Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="login.css">

</head>
<body>

<div id='AppendHere'></div>

    <br>
    <br>
    <br>
<form>

    <br>
    <br>
    <br>
    <center>
        <h2>Bem vindo de volta</h2>
    </center>
    
    <div class="input-info">

        <br>
            <input id="email" type="email" placeholder="E-mail" required autocomplete="off" name="email">
        <br>
        <br>
            <input id="password" required="required" type="password" placeholder="passsword" name="password">
        <div class="log-sign">
        <br>
      
    <div class="log-sign">
        <button id="submit"class="login" type="submit" name="submit">
             Login
        </button>
        
        <a href="index.php">
            <button class="voltar" style="align-content: center;" form="voltarform">
                Cancelar
            </button>
        </a>
    </div>
    </div>
</form>
<script src="login.js"></script>
</body>
</html>