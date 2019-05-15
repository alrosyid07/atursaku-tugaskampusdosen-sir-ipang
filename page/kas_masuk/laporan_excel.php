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
header("Content-Disposition:attachment; filename=Laporan-Kas-Masuk $tgl-export.xls");
?>
   

        <table border="1" width="80%" style="border-collapse: collapse;">
                            <thead>
                               
                                <p style="padding-left:8px;">Atursaku
                                <br>
                                Laporan Kas Masuk
                                <br>
                                <?php echo date('d-m-Y');?></p>
                                
                                
 
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
                       