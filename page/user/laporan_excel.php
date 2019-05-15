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
header("Content-Disposition:attachment; filename=Laporan-user $tgl-export.xls");
?>
   

        <table border="1" width="80%" style="border-collapse: collapse;">
                            <thead>
                               
                                <p style="padding-left:8px;">Atursaku
                                <br>
                                Data User
                                <br>
                                <?php echo date('d-m-Y');?></p>
                                
                                
 
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