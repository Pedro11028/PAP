<?php

require '../Utilizador.php';


function UtilizadorEValido_comValido(){
    try {    
        $utilizador = new Utilizador();
        $obterUtilizador = $utilizador->UtilizadorEValido("pedro@gmail.com","qaws1234");  

        echo "UtilizadorEValido: expected(true) receive(".$obterUtilizador.")";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
};

UtilizadorEValido_comValido();

?>