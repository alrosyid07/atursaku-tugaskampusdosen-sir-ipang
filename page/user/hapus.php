<?php 

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id = '$id' ");
if($sql) {
	?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus");
        window.location.href = "?page=user";
    </script>
    <?php		
}

?>