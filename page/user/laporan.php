<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "kas";


$koneksi = mysqli_connect($host,  $user,  $pass) or die("Koneksi ke database gagal!");
mysqli_select_db($koneksi, $name) or die("Tidak ada database yang dipilih!");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));    
?>

<head>
    <meta charset="utf-8">
    <title>Laporan Data User</title>
    <link rel="apple-touch-icon" href="../../images/favicon2.png">
    <link rel="shortcut icon" href="../../images/favicon2.png">
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    
</head>
<body>
    <?php
    echo"<script>
        window.print()
         </script>";
    ?>

  
        <div class=" col-lg-12 ">
           <div class="card border border-success">
                <div class="card-header  text-center" >

                    <center><a href="../../home.php" title=""><img class=" logo" src="../../images/logo11.png" alt="Logo"></a></center>
                    <a href="../../home.php?page=user" class="titles" ><h2 >Laporan Data User</h2></a>
                    <?php echo date('d-m-Y');?>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="user">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <!-- <th>ID</th> -->
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_user");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <!-- <td>
                                                 <?php echo $data['id']; ?>
                                            </td> -->
                                            <td>
                                                <?php echo $data['nama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['username']; ?>
                                            </td>
                                             <td>
                                                <?php echo $data['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['password']; ?>
                                            </td>
                                           
                                           
                                        </tr>
                                        <?php 
                                    } 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>