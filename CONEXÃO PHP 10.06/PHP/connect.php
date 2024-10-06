<?php
/* ====== CONNECTION CHECK ====== */
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'formulario';

$conex = new mysqli('localhost','root','','formulario');

if($conex->connect_error) { die("Falha ao dar o cu pro banco de dados :( erro: ".$conex->connect_error); }



/* ====== FUNCTIONS ====== */
function alertMessage($msgText, $redirectTo) {
    echo "<script>
            alert('".$msgText."');
            window.location.href = '".$redirectTo."';
        </script>";
}

?>