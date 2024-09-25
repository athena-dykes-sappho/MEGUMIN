<?php

require 'library.php';

$image = $_POST['image'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$brand = $_POST['brand'];
$material = $_POST['material'];
$articulation = $_POST['articulation'];

$action = $_POST['action'];

function func_Inserir() {
    global $image, $name, $desc, $price, $quantity, $brand, $material, $articulation, $conex; // global acessa variável de fora da função
    
    $smtp = $conex->prepare("INSERT INTO produto (image,name,description,price,quantity,brand,material,articulation) VALUES (?,?,?,?,?,?,?,?)");
    $smtp->bind_param("sssdisss",$image,$name,$desc,$price,$quantity,$brand,$material,$articulation);

    if($smtp->execute()) { alertMessage("Nudes enviado com sucesso (~ ^ _^)~ !", "../servicos.php"); }
    else { alertMessage("Erro no envio de seu nudes ( ‷ > _<): '.$smtp->error.'", "../controle.html"); }
}

function func_Alterar() {
    global $image, $name, $desc, $price, $quantity, $brand, $material, $articulation, $conex;

    $smtp = $conex->prepare("UPDATE produto SET image = ?, description = ?, price = ?, quantity = ? WHERE name = ? AND brand = ? AND material = ? AND articulation = ?");
    $smtp->bind_param("ssdissss",$image,$desc,$price,$quantity,$name,$brand,$material,$articulation);
        
    if ($smtp->execute()) { alertMessage("Nudes atualizado com sucesecso (~ ^ _^)~ !", "../servicos.php"); }
    else { alertMessage("Erro na atualização de seu nudes( ‷ > _<): '.$smtp->error.'", "../controle.html"); }
}

function func_Deletar() {
    global $image, $name, $desc, $price, $quantity, $brand, $material, $articulation, $conex;

    $smtp = $conex->prepare("DELETE FROM produto WHERE name = '".$name."' AND brand ='".$brand."' AND material = '".$material."' AND articulation = '".$articulation."'");

    if ($smtp->execute()) { alertMessage("Seu nudes foi deletado com sucesso (/ Ò o Ó)/ !", "../servicos.php"); }
    else { alertMessage("Erro em deletar teu nudes, ele realmente existe (< Ô ^ Ô)> ?: '.$smtp->error.'", "../controle.html"); }
}

$query= "SELECT * FROM produto WHERE name = '".$name."' AND brand = '".$brand."' AND material = '".$material."' AND articulation = '".$articulation."'";

$checkQuery = $conex->prepare("SELECT COUNT(*) FROM produto WHERE name = ? AND brand = ? AND material = ? AND articulation = ?");
$checkQuery->bind_param("ssss", $name, $brand, $material, $articulation);
$checkQuery->execute();
$checkQuery->bind_result($count); // o resultado da consulta (contagem de registros) é vinculado à variável $count -- se maior que 0, significa que o registro existe e a atualização pode ser feita
$checkQuery->fetch(); // método fetch() é chamado para obter o resultado da consulta e preencher a variável $count com o valor retornado
$checkQuery->close();

switch ($action) {
    case 'Inserir':
        func_Inserir();
        break;
    case 'Alterar':
        if ($count > 0) { func_Alterar(); }
        else { alertMessage("Erro no envio de seu nudes ( ‷ > _<): '.$smtp->error.'", "../controle.html"); }
        break;
    case 'Deletar':
        if ($count > 0) { func_Deletar(); }
        else { alertMessage("Erro no envio de seu nudes ( ‷ > _<): '.$smtp->error.'", "../controle.html"); }
        break;
    default:
        alertMessage("Nenhuma ação foi selecionada (  ó > ò) .", "../controle.html");
        break;
}

$conex->close();

?>