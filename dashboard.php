<?php 


error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$sql = mysqli_query($koneksi, "SELECT * FROM kas");
while($data=mysqli_fetch_assoc($sql)) {

    $jml = $data['jumlah'];
    $total_masuk = $total_masuk+$jml;

    $jml_keluar = $data['keluar'];
    $total_keluar = $total_keluar+$jml_keluar;

    $total = $total_masuk-$total_keluar;
}
?>

<head>
    <meta charset="utf-8">
     <title>.: Atursaku</title>
</head>

    <h2>   Welcome </h2>
 <hr>
 
 
 <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
                        <section class="card   ">
                           <a class=" text-center" ><img width="60%" src="images/logo11.png" alt="Logo"></a>
                        </section>
                    </div>

 </div>
 <div class="row">


                    <div class="col">
                        <a href="?page=masuk" > 
                        <section class="card  bg-primary">
                            <div class="twt-feed">
                                <div class="corner-ribon black-ribon">
                                    <i class="pe-7f-cash"></i>
                                </div>
                                <div class="pe-7f-cash wtt-mark"></div>
                                <div class="media">
                                    <div class="media-body">
                                        <h2 class="text-white display-6">Rp.<?php echo number_format($total_masuk); ?>,-</h2>
                                        <p class="text-light">Kas Masuk</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        </a>
                    </div>

                    <div class="col">
                        <a href="?page=keluar" >
                        <section class="card bg-danger">
                            <div class="twt-feed ">
                                <div class="corner-ribon black-ribon">
                                    <i class="pe-7f-cart"></i>
                                </div>
                                <div class="pe-7f-cart wtt-mark"></div>
                                <div class="media">
                                    <div class="media-body">
                                        <h2 class="text-white display-6">Rp.<?php echo number_format($total_keluar); ?>,-</h2>
                                        <p class="text-light">Kas Keluar</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        </a>
                    </div>

                    <div class="col">
                        <a href="?page=rekap"  >
                        <section class="card bg-success">
                            <div class="twt-feed ">
                                <div class="corner-ribon black-ribon">
                                    <i class="ti-wallet"></i>
                                </div>
                                <div class="ti-wallet wtt-mark"></div>
                                <div class="media">
                                    <div class="media-body">
                                        <h2 class="text-white display-6">Rp.<?php echo number_format($total); ?>,-</h2>
                                        <p class="text-light">Saldo Akhir</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        </a>
                    </div>

</div>
