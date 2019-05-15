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
header("Content-Disposition:attachment; filename=Laporan-Kas-Masuk $tgl-export.csv");
?>

Atursaku 
Laporan Kas Masuk 
<?php echo date('d-m-Y');?>

No,Kode,Tanggal,Keterangan,Jumlah,
<?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas WHERE jenis = 'masuk'");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
<?php echo $no++; ?>
,<?php echo $data['kode']; ?>
,<?php echo date('d F Y', strtotime($data['tgl'])); ?>
,<?php echo $data['keterangan']; ?>
,<?php echo $data['jumlah'] ?>,
<?php 
                                    $total = $total+$data['jumlah'];
                                    } 
                                ?>
Total,<?php echo$total ?>,

