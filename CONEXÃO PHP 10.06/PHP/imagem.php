<?php

require 'connect.php';

$data = $_POST['image'];

$smtp = $conex->prepare("INSERT INTO tbimagem(data) VALUES(?)");
$smtp->bind_param("s", $data);

if ($smtp->execute()) {
    $slc = $conex->prepare("SELECT * FROM tbimagem");
    $slc->execute();
    $result = $slc->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "
        <div>
            <img src='". $row['data'] . "'>
            <p>". $row['data'] ."</p>
        </div>";
    }
}
else {
    alertMessage("Erro ao enviar imagem  ( ‷ > _<): '.$smtp->error.'", "../controle.html");
}
             

$conex->close();

?>