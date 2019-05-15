<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "kas";


$koneksi = mysqli_connect($host,  $user,  $pass) or die("Koneksi ke database gagal!");
mysqli_select_db($koneksi, $name) or die("Tidak ada database yang dipilih!");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));	
?><?php
date_default_timezone_set("Asia/Jakarta");
$tgl = date('Y-M-d');
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=Laporan-Rekapitulasi-Kas $tgl-export.csv");
?>

Atursaku 
Laporan Rekapitulasi Kas 
<?php echo date('d-m-Y');?>

No.,Kode,Tanggal,Keterangan,Masuk,Keluar,Jenis
<?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
<?php echo $no++; ?>,<?php echo $data['kode']; ?>,<?php echo date('d F Y', strtotime($data['tgl'])); ?>,<?php echo $data['keterangan']; ?>,<?php echo $data['jumlah']; ?>,<?php echo $data['keluar']; ?>,<?php echo $data['jenis']; ?>,
<?php               $total = $total+$data['jumlah'];
                                    $total_keluar = $total_keluar+$data['keluar'];

                                    $saldo_akhir = $total - $total_keluar;                      
                                    } 
                                ?>

Total Kas Masuk :   <?php echo ($total); ?>,
Total Kas Keluar :  <?php echo ($total_keluar); ?>,
Saldo Akhir :   <?php echo ($saldo_akhir); ?>

