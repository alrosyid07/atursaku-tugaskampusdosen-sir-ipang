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
    <title>Laporan Kas Masuk</title>
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
                    <a href="../../home.php?page=masuk" class="titles" ><h2 >Laporan Kas Masuk</h2></a>
                    <?php echo date('d-m-Y');?>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="rekap">
                            
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas WHERE jenis = 'masuk' ");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
                                        <tr class="odd gradeX">
                                            <td>
                                                <?php echo $no++; ?>
                                            </td>
                                            <td>
                                                <?php echo $data['kode']; ?>
                                            </td>
                                            <td>
                                                <?php echo date('d F Y', strtotime($data['tgl'])); ?>
                                            </td>
                                            <td>
                                                <?php echo $data['keterangan']; ?>
                                            </td>
                                            <td align="right">
                                                <?php echo number_format($data['jumlah']).",-"; ?>
                                            </td>
                                            
                                        </tr>
                                        <?php 
                                    $total = $total+$data['jumlah'];
                                    } 
                                ?>
                                </tbody>

                                <tr>
                                    <td colspan="4" style="text-align: left; font-size: 17px; color: maroon;">Total Kas Masuk :</td>
                                    <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
                                </tr>
                            </table>
                        </div>
                    </div>
