<?php 
session_start();
unset($_SESSION["utilizador"]);
unset($_SESSION["loggedIn"]);

require 'conexao.php';
session_destroy();
header('Location: index.php');
?>