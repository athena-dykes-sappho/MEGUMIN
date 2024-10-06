<?php

require 'connect.php';

$name         = $_POST ['name'   ]  ;
$email        = $_POST ['email'  ]  ;
$number       = $_POST ['number' ]  ;
$subject      = $_POST ['subject']  ;
$message      = $_POST ['message']  ;
$current_date = date('d/m/Y')       ;
$current_time = date('H:i:s')       ;
$read         = 0                   ;

$query= "SELECT * FROM usuario WHERE email = '".$email."' AND number = '".$number."'";

if ($result=mysqli_query($conex,$query)) {
    if (mysqli_num_rows($result) > 0)
    {
        $smtp = $conex->prepare("INSERT INTO mensagem (name,email,number,subject,message,date,time,`read`) VALUES (?,?,?,?,?,?,?,?)");
        $smtp->bind_param("sssssssi",$name,$email,$number,$subject,$message,$current_date,$current_time,$read);

        if($smtp->execute()) { alertMessage("Mensagem enviada com sucesso (~ ^ _^)~ !", "../contato.html"); }
        else { alertMessage("Erro no envio do seu dildo ( ‷ > _<): ".$smtp->error."", "../contato.html"); }

        $smtp->close();
    }
    else { alertMessage("Conta não encontrada ( @ ~@)", "../contato.html"); }
}

$conex->close();

?>