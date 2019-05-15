<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "atursaku";

$koneksi = mysqli_connect($host,  $user,  $pass) or die("Koneksi ke database gagal!");
mysqli_select_db($koneksi, $name) or die("Tidak ada database yang dipilih!");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));	
?>
<table border="1" width="80%" style="border-collapse: collapse;">
                            <thead>
                            	<caption><h4>Laporan Rekapitulasi Kas</h4></caption>
                                <tr >
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Masuk</th>
                                    <th>Keluar</th>
                                    <th>Jenis</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php 

                                    $no = 1;
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas");
                                    while ($data = mysqli_fetch_assoc($sql)) {

                                ?>
                                    <tr class="odd gradeX">
                                        <td style="text-align: center;">
                                            <?php echo $no++; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php echo $data['kode']; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php echo date('d F Y', strtotime($data['tgl'])); ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php echo $data['keterangan']; ?>
                                        </td>
                                        
                                        <td align="right">
                                            <?php echo number_format($data['jumlah']).",-"; ?>
                                        </td>
                                       
                                        <td align="right">
                                            <?php echo number_format($data['keluar']).",-"; ?>
                                        </td>
                                         <td style="text-align: center;">
                                            <?php echo $data['jenis']; ?>
                                        </td>
                                    </tr>
                                    <?php 
                                    $total = $total+$data['jumlah'];
                                    $total_keluar = $total_keluar+$data['keluar'];

                                    $saldo_akhir = $total - $total_keluar;                      
                                    } 
                                ?>
                            </tbody>

                            <tr>
                                <td colspan="4" style="text-align: left; font-size: 16px; color: maroon;">Total Kas Masuk :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: green;"><?php echo " Rp." . number_format($total).",-"; ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="5" style="text-align: left; font-size: 16px; color: maroon;">Total Kas Keluar :</td>
                                <td style="font-size: 17px; text-align: right; "><font style="color: red;"><?php echo " Rp." . number_format($total_keluar).",-"; ?></font></td>
                            </tr>

                            <tr>
                                <td colspan="6" style="text-align: left; font-size: 16px; color: red;">Saldo Akhir :</td>
                                <th style="font-size: 17px; text-align: right;"><font style="color: purple;"><?php echo " Rp." . number_format($saldo_akhir).",-"; ?></font></th>
                            </tr>
                                
                        </table>