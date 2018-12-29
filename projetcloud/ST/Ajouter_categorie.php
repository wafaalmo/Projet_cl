<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF8+BOM">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Hard Building</title>
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
                                 <a href="index.html">Catégories</a>
                              </li>
                              <li>
                                 <a>Ajouter catégories</a>
                              </li>
                              <li class="active">
                                 <strong>Ajouter</strong>
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
                           <h5>Ajouter Categories</h5>

      <?php  

 if(isset($_GET['ss'])){   echo '<hr><div class="alert alert-success">
                                    <strong>Opps!!Bien ajouter  .</strong>
        </div>';}
      ?>

                        </div>
                        <div class="inqbox-content">
                           <form role="form" id="form"  action="#" method="post">
                              <div class="form-group"><label>Libélle Categorie</label> <input type="text" placeholder="Pompe" class="form-control" name="cat" required></div>
                              
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
                   mbrt: {
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
                          


                         $q2="INSERT into categorie values(NULL,'".$_POST['cat']."')";
                         $db->exec($q2);


                echo '<script language="Javascript">  document.location.replace("Ajouter_categorie.php?ss=1");  </script>'; 

                        }


                        ?>

