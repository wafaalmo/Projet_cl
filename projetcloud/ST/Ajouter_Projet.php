<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF8+BOM">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Projets</title>
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
                                 <a href="index.html">Projet</a>
                              </li>
                              <li>
                                 <a>Ajouter Projet</a>
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
                           <h5>Ajouter Projet</h5>

      <?php  

 if(isset($_GET['ss'])){   echo '<hr><div class="alert alert-success">
                                    <strong>Opps!!Bien ajouter  .</strong>
        </div>';}
      ?>

                        </div>
                        <div class="inqbox-content">
                           <form role="form" id="form"  action="#" method="post">
                              <div class="form-group"><label>Client</label> 
                                
                                <?php  include('cnx.php');
                                 $req= $db->prepare('SELECT * from clients ');
                               $req->execute();
                               ?> 
                                    <select name="rs">
                                       <?php  while($rr = $req->fetch()){ ?>
                                                            <option value="<?php echo $rr['id']; ?>" ><?php echo $rr['raison_social']; ?></option>
                                                            
                                                     <?php  }?>

                                     </select>

                              </div>

                            
                              <div class="form-group"><label>Nom de Projet</label> <input type="text" placeholder="Entrer libelle" class="form-control" name="np" required></div>
                              <div class="form-group"><label>Ville</label> <input type="text" placeholder="Ville" class="form-control" name="vl"></div>
                              <div class="form-group"><label>prix</label> <input type="text" placeholder="1290DH" class="form-control" name="pr"></div>
                                 <div class="form-group"><label>Date</label> <input type="date" class="form-control" name="dt"></div>
                              
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


                           
                           include("cnx.php");
                          


        $q2="INSERT into projets values(NULL,'".$_POST['rs']."','".$_POST['np']."','".$_POST['vl']."','".$_POST['pr']."','".$_POST['dt']."')";
                         $db->exec($q2);


                echo '<script language="Javascript">  document.location.replace("Ajouter_Projet.php?ss=1");  </script>'; 

                        }


                        ?>

