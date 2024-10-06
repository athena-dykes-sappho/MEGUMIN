<?php

require 'connect.php';

$query = $_POST['sql-command'] ;

$checkQuery = $conex->prepare("SELECT COUNT(*) FROM usuario");
$checkQuery->execute();
$checkQuery->bind_result($count);
$checkQuery->fetch();
$checkQuery->close();

if ($count > 0) {
        $smtp = $conex->prepare($query);
        
        if($smtp->execute()) { alertMessage("Commando executado com sucesso (~ ^ _^)~ !", "../controle-usuario.php"); } 

        
        else { alertMessage("Erro em executar seu comando ( ‷ ú _ù): '.$smtp->error.'", "../controle-usuario.php"); }

        $smtp->close();
}

else {
    alertMessage("Registros inexistentes (< ù  ⁔ ú)> .", "../controle-usuario.php");
}

$conex->close();

?>