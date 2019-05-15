<?php 
session_start();
require 'include/conn.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$username = isset($_SESSION['username']) ? $_SESSION['username'] : false;
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="apple-touch-icon" href="images/favicon2.png">
    <link rel="shortcut icon" href="images/favicon2.png">


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">



    <link rel="stylesheet" href="assets/css/tes.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link href="assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> 
     

    <!-- Custom styles for this template -->
    



</head>
<body>


 <?php include ('include/left-panel.php');?>
    <div id="right-panel" class="right-panel">
        <?php include ('include/header.php');?>
      

            <!-- <div id="page-wrapper"> -->
              <div id="page-inner">
                <div class="content pb-0">
                <div clas="rows">
                    <div clas="col-md-13">
                            <?php

                        $page = $_GET['page'];
                        $aksi = $_GET['aksi'];

                        if($page == "masuk") {
                            if($aksi =="") {
                                include 'page/kas_masuk/masuk.php';
                            } if($aksi =="hapus") {
                                include 'page/kas_masuk/hapus.php';
                            }
                        } elseif ($page == "keluar") {
                            if($aksi =="") {
                                include 'page/kas_keluar/keluar.php';
                            } if($aksi =="hapus") {
                               include 'page/kas_keluar/hapus.php';
                            }
                        }elseif ($page == "user") {
                            if($aksi =="") {
                                include 'page/user/user.php';
                            } if($aksi =="hapus") {
                               include 'page/user/hapus.php';
                            }
                             
                         }elseif ($page == "rekap") {
                            if($aksi =="") {
                                include 'page/kas_rekap/rekap.php';
                            }

                        } elseif ($page == "") {                           
                                include 'dashboard.php';
                            }                       
                     ?>
                    </div>
                </div>   
             
            </div>
            
        </div>
        </div> <?php include ('include/footer.php');?>

        

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
   




</body>
</html>
