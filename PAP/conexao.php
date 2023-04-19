<?php

// defenir base de dados
define('host', 'localhost');
define('user', 'root');
define('pass', '');
define('nomebd', 'papbd');

// Conectar á base de dados
try {
    $connect = new PDO("mysql:host=" . host . "; dbname=" . nomebd, user, pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $error) {
    echo $error->getMessage();
}

    session_start();
    error_reporting(0);
?>