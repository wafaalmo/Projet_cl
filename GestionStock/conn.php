<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
   
       try {
           $strConnexion = 'mysql:host=localhost;dbname=gestionstock';
           $pdo=new PDO($strConnexion,'root','');
           
          // echo "connexion avec succes ";
           
       } catch (PDOException $e) {
           $msg='EREUR PDO DANS ' . $e->getMessage();
           die($msg);
           
       }
        
        ?>
    </body>
</html>


