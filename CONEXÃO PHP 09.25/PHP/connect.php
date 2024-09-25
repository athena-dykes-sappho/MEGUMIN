<?php

require 'library.php';

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$gender = $_POST['gender'];
$message = $_POST['message'];

$current_date = date('d/m/Y');
$current_time = date('H:i:s');

$query= "SELECT * FROM usuario WHERE email = '".$email."'";

if ($result=mysqli_query($conex,$query)) {
    if (mysqli_num_rows($result) > 0)
    {
        $smtp = $conex->prepare("INSERT INTO mensagem (name,email,message,date,time,gender,number) VALUES (?,?,?,?,?,?,?)");
        $smtp->bind_param("sssssss",$name,$email,$message,$current_date,$current_time,$gender,$number);

        if($smtp->execute()) { echo "Mensagem enviada com sucesso (~ ^ _^)~ !"; }
        else { echo "Erro no envio do seu dildo ( ‷ > _<): ".$smtp->error; }

        $smtp->close();
    }
    else { echo "Este email não está logadis ( @ ~@)"; }
}

$conex->close();

?>