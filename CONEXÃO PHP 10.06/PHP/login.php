<?php

require 'connect.php';

$email        = $_POST['email'   ] ;
$userpassword = $_POST['password'] ;

$query= "SELECT * FROM usuario WHERE email = '".$email."' AND password = '".$userpassword."'";

if ($result=mysqli_query($conex,$query)) {
    if (mysqli_num_rows($result)>0) { alertMessage("Seu C#  é real \(Ò o Ó)/ !", "../index.html"); }
    else { echo alertMessage("Erro. Seu C#  és falácias (  ‷ó  ~ ò): '.$smtp->error.'", "../login.html"); }
}

$conex->close();

?>