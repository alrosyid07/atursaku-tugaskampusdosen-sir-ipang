
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>|| User Management</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="images/favicon.png">
    <link rel="shortcut icon" href="images/favicon.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <link href="assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/tes.css">

    <link href="assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> 
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <style type="text/css" class="init">
    
    </style>



</head>

           <body>

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 style="color:white;">Data User</h3>

                        <span title="Tambah Data"><button style="float: right;" class="btn-md btn btn-success"data-toggle="modal" data-target="#myModal">
                            <b>+ Tambah</b>
                    </button></span>
                    </div>
                    <div class="card-body">
                        <div class="btn-ex">        
                            <a href="page/user/laporan_excel.php"  class="btn btn-secondary  " tabindex="0" aria-controls="rekap" ><span>Excel</span></a> 
                            <a href="page/user/laporan_csv.php" class="btn btn-secondary  " tabindex="0" aria-controls="rekap" ><span>CSV</span></a> 
                            <!-- <a href="page/kas_rekap/laporan_pdf.php" class="btn btn-secondary  " tabindex="0" aria-controls="rekap" ><span>PDF</span></a>  -->
                            <a  href="page/user/laporan.php" target="_blank" class="btn btn-secondary " tabindex="0" aria-controls="rekap"  ><span>Laporan</span></a> 
                        </div>
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
                                        <th>Aksi</th>
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
                                           
                                            <td>
                                                <button style="color: white;" id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['id']; ?>" data-nama="<?php echo $data['nama']; ?>" data-username="<?php echo $data['username']; ?>" data-email="<?php echo $data['email']; ?>" data-password="<?php echo $data['password']; ?>"   class="btn btn-warning btn-md" title="Ubah Data"><i class="fa fa-pencil"> </i></button>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="?page=user&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger btn-md" title="Hapus Data"><i class="fa fa-trash"> </i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                    } 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                        <!--  Halaman Tambah-->
                        <div class="panel-body">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Tambah User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input class="form-control" name="nama" placeholder="Nama" required="" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input class="form-control" name="username" placeholder="Username" required=""/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" name="email" placeholder="Email" required="" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" name="password" type="password" placeholder="*****" required="" />
                                                </div>

                                                
                                                
                                                                                              
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                    if(isset($_POST['simpan'])) {
                        
                        $nama = $_POST['nama'];
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $password = md5($_POST['password']);
                      

                        $sql = mysqli_query($koneksi, "INSERT INTO tb_user (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$password')");

                        if($sql) {

                            echo "
                                <script>
                                alert('Data Berhasil Ditambahkan');
                                document.location.href = '';
                                </script>";   
                        }
                    }
                ?>
                            <!-- Akhir Halaman Tambah -->

                            <!-- Halaman Ubah -->
                            <div class="panel-body">
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Form Ubah User</h4>
                                            </div>
                                            <div class="modal-body" id="modal_edit">
                                                <form role="form" method="POST" enctype="multi/form-data">
                                                    <div class="">
                                                        <label>ID</label>
                                                        <input class="form-control" name="id"  id="id" readonly />
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input class="form-control" name="nama"  id="nama" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input class="form-control" name="username" id="username" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input class="form-control" name="email" id="email" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" name="password"  type="password" placeholder="******" required="" />
                                                    </div>
                                                    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                                </form>

                                    <?php 
                                        if(isset($_POST['ubah'])) {
                                            $id = $_POST['id'];
                                            $nama = $_POST['nama'];
                                            $username = $_POST['username'];
                                            $email = $_POST['email'];
                                            $password = md5($_POST['password']);
                                           
                                            

                                            $sql = mysqli_query($koneksi, "UPDATE tb_user SET nama = '$nama', username = '$username', email = '$email', password = '$password' WHERE id = '$id' ");
                                            if($sql) {
                                                echo "
                                                    <script>
                                                    alert('Data Berhasil Diubah');
                                                    document.location.href = '';
                                                    </script>";     
                                            }
                                        }
                                    ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Halaman Ubah -->
                    </div>
                </div>
         
 
    
         <script src="assets/js/jquery-1.10.2.js"></script>

        


        <script type="text/javascript">
            $(document).on("click", "#edit_data", function() {
                var id = $(this).data('id');
                var nama = $(this).data('nama');
                var username = $(this).data('username');
                var email = $(this).data('email');
                var password = $(this).data('password');
                

                $("#modal_edit #id").val(id);
                $("#modal_edit #nama").val(nama);
                $("#modal_edit #username").val(username);
                $("#modal_edit #email").val(email);
                $("#modal_edit #password").val(password);
                
                
            })
        </script>

 <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
   
 <script type="text/javascript" class="init">
    


$(document).ready(function() {
    $('#user').DataTable( {
        
    } );
} );


</script>
  
      
  </body>