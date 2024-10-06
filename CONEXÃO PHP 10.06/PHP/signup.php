<?php

require 'connect.php';

$username       = $_POST['username'] ;
$email          = $_POST['email'   ] ;
$userpassword   = $_POST['password'] ;
$gender         = $_POST['gender'  ] ;
$number         = $_POST['number'  ] ;
$credits        = 500                ;
$admin          = 0                  ;

$query= "SELECT * FROM usuario WHERE email = '".$email."'";
// William dá a bunda yoooo B)

if ($result=mysqli_query($conex,$query)) {
    if (mysqli_num_rows($result) > 0) { alertMessage("Este email já está registrado (< ù  ⁔ ú)> .", "../signup.html"); }
    else
    {
        $smtp = $conex->prepare("INSERT INTO usuario (username,email,password,gender,number,credits,admin) VALUES (?,?,?,?,?,?,?)");
        $smtp->bind_param("sssssds",$username,$email,$userpassword,$gender,$number,$credits,$admin);

        
        if($smtp->execute()) { alertMessage("Seu C# foi registrado com sucesso (~ ^ _^)~ !", "../login.html"); } 

        
        else { alertMessage("Erro em registrar seu C# ( ‷ ú _ù): '.$smtp->error.'", "../signup.html"); }

        $smtp->close();
    }
}

$conex->close();

?>