<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF8+BOM">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Produits</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
      <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
      <link href="css/animate.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link href="css/forms/kforms.css" rel="stylesheet">
   </head>
   <body>
      <div id="wrapper">
            
          <?php include('nav.php'); ?>
         <div id="page-wrapper" class="gray-bg">

                                   <?php include('head.php'); ?>

            <div style="clear: both; height: 61px;"></div>
            <div class="wrapper wrapper-content animated fadeInRight">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="inqbox float-e-margins">
                        <div class="inqbox-content">
                           <h2>Home</h2>
                           <ol class="breadcrumb">
                              <li>
                                 <a href="index.html">Produit</a>
                              </li>
                              <li>
                                 <a>Ajouter Produit</a>
                              </li>
                              <li class="active">
                                 <strong>Validation</strong>
                              </li>
                           </ol>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="inqbox ">
                        <div class="inqbox-title border-top-primary">
                           <h5>Ajouter Produit</h5>

      <?php  

 if(isset($_GET['ss'])){   echo '<hr><div class="alert alert-success">
                                    <strong>Opps!!Bien ajouter  .</strong>
        </div>';}
      ?>
         <?php  

 if(isset($_GET['rr'])){   echo '<hr><div class="alert alert-danger">
                                    <strong>ERREUR! Remplissez-vous tout les champs .</strong>
        </div>';}
      ?>

                        </div>
                        <div class="inqbox-content">
                           <form role="form" id="form"  action="#" method="post">
                              <div class="form-group"><label>Fournisseur</label> 
                                
                                <?php  include('cnx.php');
                                $req= $db->prepare('SELECT * from fournisseurs ');
                               $req->execute();

                              

                               ?> 
                                    <select name="fr">
                                       <?php  while($rr = $req->fetch()){ ?>
                                                        
                                                            <option value="<?php echo $rr['id']; ?>" ><?php echo $rr['raison_social']; ?></option>
                                                            
                                                     <?php  }?>

                                     </select>

                              </div>
                                <div class="form-group"><label>Categorie</label> 
                                
                                <?php  
                                $req2= $db->prepare('SELECT * from categorie ');
                               $req2->execute();

                               ?> 
                                    <select name="cat">
                                       <?php  while($rr2 = $req2->fetch()){ ?>
                                                        
                                                            <option value="<?php echo $rr2['id']; ?>" ><?php echo $rr2['nomCategorie']; ?></option>
                                                            
                                                     <?php  }?>

                                     </select>

                              </div>
                            
                              <div class="form-group"><label>Nom de Produit</label> <input type="text" placeholder="Entrer libelle" class="form-control" name="np" required></div>
                              <div class="form-group"><label>prix</label> <input type="text" placeholder="1920DH" class="form-control" name="pr"></div>
                              <div class="form-group"><label>Quantité</label> <input type="number" placeholder="2" class="form-control" name="qt"></div>
                                   <div class="form-group"><label>Sera Utilisé dans  le Projet :</label> 
                                
                                <?php  include('cnx.php');
                                 $req= $db->prepare('SELECT * from projets ');
                               $req->execute();
                               ?> 
                                    <select name="prj">
                                       <?php  while($rr = $req->fetch()){ ?>
                                                            <option value="<?php echo $rr['id']; ?>" ><?php echo $rr['nom_projet']; ?></option>
                                                            
                                                     <?php  }?>

                                     </select>

                              </div>

                              <div>
                                 <button class="btn btn-sm btn-primary m-t-n-xs" type="submit" name="btn"><strong>Submit</strong></button>
                              </div>


                           </form>
                        </div>
                     </div>
                  </div>
                 
               </div>
            </div>
          
         </div>
      </div>
      <!-- Mainly scripts -->
      <script src="js/jquery-2.1.1.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
      <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <!-- Custom and plugin javascript -->
      <script src="js/main.js"></script>
      <script src="js/plugins/pace/pace.min.js"></script>
      <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Jquery Validate -->
      <script src="js/plugins/validate/jquery.validate.min.js"></script>
      <script>
         $(document).ready(function () {
             "use strict";
             
             $("#form").validate({
                 rules: {
                     password: {
                         required: true,
                         minlength: 3
                     },
                   mber: {
                         required: true,
                         number: true
                     },
                     min: {
                         required: true,
                         minlength: 6
                     },
                     max: {
                         required: true,
                         maxlength: 4
                     }
                 }
             });
         });
      </script>
   </body>
</html>

 <?php// include('head.php'); ?>
                        <?php

                        if(isset($_POST["btn"]))
                            {

                            if (empty($_POST['cat'])||empty($_POST['fr'])||empty($_POST['np'])||empty($_POST['pr'])||empty($_POST['qt'])) {
                              # code...
                           
                            echo '<script language="Javascript">  document.location.replace("Ajouter_produit.php?rr=1");  </script>'; 
    

                     }
                 else{
                           
               include("cnx.php");
               $q2="INSERT into produit values(NULL,'".$_POST['cat']."','".$_POST['fr']."','".$_POST['prj']."','".$_POST['np']."','".$_POST['pr']."','".$_POST['qt']."')";
                $db->exec($q2);

                         $req4= $db->prepare('SELECT max(id) from produit ');
                         $req4->execute();
                         $rr4 = $req4->fetch();
                         $q2="INSERT into liste_produit values(NULL,'".$_POST['prj']."','".$rr[0]."')";
                         $db->exec($q2);
                         echo '<script language="Javascript">  document.location.replace("Ajouter_produit.php?ss=1&'.$_POST['prj'].'");  </script>'; 

                     
                     }

                        }


                        ?>

