<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "kas";


$koneksi = mysqli_connect($host,  $user,  $pass) or die("Koneksi ke database gagal!");
mysqli_select_db($koneksi, $name) or die("Tidak ada database yang dipilih!");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));	
?>
<?php
date_default_timezone_set("Asia/Jakarta");
$tgl = date('Y-M-d');
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=Laporan-user $tgl-export.csv");
?>

Atursaku 
Laporan Data User  
<?php echo date('d-m-Y');?>

No.,Nama,Username,Email,Password 
 <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_user");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
<?php echo $no++; ?>,<?php echo $data['nama']; ?>,<?php echo $data['username']; ?>,<?php echo $data['email']; ?>,<?php echo $data['password']; ?> 
<?php 
                                    } 
                                ?>
