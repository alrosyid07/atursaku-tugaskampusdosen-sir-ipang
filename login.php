<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: home.php");
    die();
}
?>
<!doctype html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>.: Atursaku || login</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link rel="shortcut icon" href="images/favicon2.png">


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">


    <link href="assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="inner.css">
    <link href="assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> 



</head>
<body class="bg-flat-color-5">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
               
                <div class="login-form">
                     <div class="login-logo">
                    <a href="index.php">
                        <img class="align-content" src="images/logo11.png" alt="">
                    </a>
                </div>
                    <form action="ceklogin.php" method="post">
                         <div class="form-group">
                            <label> Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        
                        
                                </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
