 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>|| Rekapitulasi </title>
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
    <!-- <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
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
        
 <div class="card">
                <div class="card-header bg-success c" >
                    <h2 style="color: white;">Data Rekapitulasi</h2>
                        
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <div class="btn-ex">        
                            <a href="page/kas_rekap/laporan_excel.php"  class="btn btn-secondary  " tabindex="0" aria-controls="rekap" ><span>Excel</span></a> 
                            <a href="page/kas_rekap/laporan_csv.php" class="btn btn-secondary  " tabindex="0" aria-controls="rekap" ><span>CSV</span></a> 
                            <!-- <a href="page/kas_rekap/laporan_pdf.php" class="btn btn-secondary  " tabindex="0" aria-controls="rekap" ><span>PDF</span></a>  -->
                            <a  href="page/kas_rekap/laporan.php" class="btn btn-secondary " target="blank" tabindex="0" aria-controls="rekap" ><span>Laporan</span></a> 
                        </div>
                        
                        <table class="table table-striped table-bordered table-hover" id="rekap">
                            
                            <thead>
                                <tr>
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
                                       
                                        <td align="right">
                                            <?php echo number_format($data['keluar']).",-"; ?>
                                        </td>
                                         <td>
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
                    </div>
            </div>
        </div>
 



   
         <script src="assets/js/jquery-1.10.2.js"></script>

       
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
   \
    
    <script type="text/javascript" class="init">
    


$(document).ready(function() {
    $('#rekap').DataTable( {
       
    } );
} );


</script>
        
    
      
  </body>