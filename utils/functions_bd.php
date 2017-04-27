<?php
function connect () {
    $host = "localhost";
    $usuario = "root";
    $senha = "root";
    $banco = "sistema_estoque";
    $conn = mysql_connect($host, $usuario, $senha)
    or die ('Erro na conexão:' .mysql_error());
    mysql_select_db($banco) or die ('Erro na conexão:' .mysql_error());
    };

connect();

?>