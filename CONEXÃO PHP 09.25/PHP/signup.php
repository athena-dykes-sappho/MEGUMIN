<?php

require 'library.php';

$username = $_POST['username'];
$email = $_POST['email'];
$userpassword = $_POST['password'];

$query= "SELECT * FROM usuario WHERE email = '".$email."'";
// William dá a bunda yoooo B)

if ($result=mysqli_query($conex,$query)) {
    if (mysqli_num_rows($result)>0) { alertMessage("Este email já está em uso (< ù  ⁔ ú)> .", "../signup.html"); }
    else
    {
        $smtp = $conex->prepare("INSERT INTO usuario (username,email,password) VALUES (?,?,?)");
        $smtp->bind_param("sss",$username,$email,$userpassword);

        
        if($smtp->execute()) { alertMessage("Seu C# foi registrado com sucesso (~ ^ _^)~ !", "../login.html"); } 

        
        else { alertMessage("Erro em registrar seu C# ( ‷ ú _ù): '.$smtp->error.'", "../signup.html"); }

        $smtp->close();
    }
}

$conex->close();

?>