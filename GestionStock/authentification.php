<?php

require_once("conn.php");
$login = $_POST["email"];
$pass = md5($_POST["password"]);
//echo ($login);
//echo ($pass);
$ps=$pdo->prepare("SELECT * FROM admin WHERE email=? AND password=?");
$param=array($login,$pass);
$ps->execute($param);
if($users=$ps->fetch()){
    
    //session_start();
   // $_SESSION['role']=$users;
    //echo 'authentification avec succe';
    
    header("location:mes-articles.html");
    
}
 else {
    echo 'authentification echouer ';
    header("location:login2.html");
    
}



?>

