<?php

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$password=$_POST['password'];
if(!empty($nom)&&!empty($prenom)&&!empty($email)&&!empty($password)){


require_once("conn.php");
$ps=$pdo->prepare("INSERT INTO admin(nom,prenom,email,password) VALUES(?,?,?,?)");
$params=array($nom,$prenom,$email,$password);
$ps->execute($params);
header("location:login.html");
}
 else {
    header("location:enregistrer.html");
    
}



?>
