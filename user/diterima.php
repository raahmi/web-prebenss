<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location: login.php");
}

require "../koneksidb.php";
?>
<?php
$idtrans = $_GET['id'];
$tglterima = date("Y-m-d");

$sql = "UPDATE transaksi SET tgl_diterima='$tglterima' WHERE id_transaksi='$idtrans' ";

$sql1 = "UPDATE transaksi SET status_trans='Pesanan Diterima' WHERE id_transaksi='$idtrans' ";

if ($conn->query($sql) === TRUE) {
	$sql1 = "UPDATE transaksi SET status_trans='Pesanan Diterima' WHERE id_transaksi='$idtrans' ";

	if ($conn->query($sql1) === TRUE) {
		echo "<script>
            window.alert('Pesanan Diterima');
            window.location='riwayat.php';
          </script>";
	}

} else {
    
    echo  $sql;
}
echo "<script>
        window.location('riwayat.php');
      </script>";
?>