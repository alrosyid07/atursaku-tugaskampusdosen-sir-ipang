
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>.: Atursaku</title>
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <link href="assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/tes.css">

    <link href="assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> 




</head>

           <body>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                
                <div class="card">
                    <div class="card-header">
                        <span>Data Kas Masuk</span>
                        <span title="Tambah Data"><button style="float: right;" class="btn-md btn btn-success"data-toggle="modal" data-target="#myModal">
                            <b>+ Tambah</b>
                    </button></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
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
                                            <td>
                                                <button id="edit_data" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['kode']; ?>" data-ket="<?php echo $data['keterangan']; ?>" data-tgl="<?php echo $data['tgl']; ?>" data-jml="<?php echo $data['jumlah']; ?>" class="btn btn-warning btn-md" title="Ubah Data"><i class="fa fa-pencil"> </i></button>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data?')" href="?page=masuk&aksi=hapus&id=<?php echo $data['kode'];?>" class="btn btn-danger btn-md" title="Hapus Data"><i class="fa fa-trash"> </i></a>
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

                        <!--  Halaman Tambah-->
                        <div class="panel-body">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Tambah Data</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                    <label>Kode</label>
                                                    <input class="form-control" name="kode" placeholder="Input Kode" />
                                                </div>
                                                <div>
                                                    <label>Keterangan</label>
                                                    <textarea class="form-control" rows="3" name="ket"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <input class="form-control" type="date" name="tgl" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah</label>
                                                    <input class="form-control" type="number" name="jml" />
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
                        $kode = $_POST['kode'];
                        $tgl = $_POST['tgl'];
                        $ket = $_POST['ket'];
                        $jml = $_POST['jml'];

                        $sql = mysqli_query($koneksi, "INSERT INTO kas (kode, keterangan, tgl, jumlah, jenis, keluar) VALUES ('$kode', '$ket', '$tgl', '$jml', 'masuk', 0)");

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
                                                <h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
                                            </div>
                                            <div class="modal-body" id="modal_edit">
                                                <form role="form" method="POST">
                                                    <div class="">
                                                        <label>Kode</label>
                                                        <input class="form-control" name="kode" placeholder="Input Kode" id="kode" readonly />
                                                    </div>
                                                    <div>
                                                        <label>Keterangan</label>
                                                        <textarea class="form-control" rows="3" name="ket" id="ket"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input class="form-control" type="date" name="tgl" id="tgl" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input class="form-control" type="number" name="jml" id="jml" />
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                                </form>

                                    <?php 
                                        if(isset($_POST['ubah'])) {
                                            $kode = $_POST['kode'];
                                            $ket = $_POST['ket'];
                                            $tgl = $_POST['tgl'];
                                            $jml = $_POST['jml'];

                                            $sql = mysqli_query($koneksi, "UPDATE kas SET keterangan = '$ket', tgl = '$tgl', jumlah = '$jml', jenis = 'masuk', keluar = 0 WHERE kode = '$kode' ");
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
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>


        <script type="text/javascript">
            $(document).on("click", "#edit_data", function() {
                var kode = $(this).data('id');
                var ket = $(this).data('ket');
                var tgl = $(this).data('tgl');
                var jml = $(this).data('jml');

                $("#modal_edit #kode").val(kode);
                $("#modal_edit #ket").val(ket);
                $("#modal_edit #tgl").val(tgl);
                $("#modal_edit #jml").val(jml);

            })
        </script>



  


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>
   
      
  </body>