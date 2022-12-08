<?php
session_start();
$sess_divisi = $_SESSION['sess_divisi'];
include "../dist/config/koneksi.php";

$npp	= $_POST['npp'];
$ajuan = date('Y-m-d');
$mulai	= $_POST['tgl_mulai'];
$akhir	= $_POST['tgl_akhir'];
$ket	= $_POST['keterangan'];
$pengganti_tugas = $_POST['pengganti'];
$start = new DateTime($mulai);
$finish = new DateTime($akhir);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur+1;

$id = date('dmYHis');

$pgw = "SELECT * FROM employee WHERE npp='$npp'";
$qpgw = mysqli_query($conn,$pgw);
$ress = mysqli_fetch_array($qpgw);

$jml = $ress['jml_cuti'];


if($durasi>$jml){
	echo "<script type='text/javascript'>
			alert('Durasi cuti lebih banyak dari jumlah cuti tersedia!.'); 
			document.location = 'cuti_create.php'; 
		</script>";	
		$data = array('status'=> 'FAILED : Durasi cuti lebih banyak dari jumlah cuti tersedia!.');
}else{
	// $sql 	= "INSERT INTO cuti (no_cuti, npp, tgl_pengajuan, tgl_awal, tgl_akhir, durasi, keterangan, pengganti_tugas, divisi, ket_reject) 
	// 			VALUES ('$id','$npp','$ajuan','$mulai','$akhir','$durasi','$ket','$pengganti_tugas','$sess_divisi','')";
	// $query 	= mysqli_query($conn,$sql);
	// if($query){
	// 	echo "<script type='text/javascript'>
	// 			alert('Pengajuan cuti berhasil!'); 
	// 			document.location = 'cuti_waitapp.php'; 
	// 		</script>";

	// }else {
	// 	echo "<script type='text/javascript'>
	// 			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
	// 			document.location = 'cuti_create.php'; 
	// 		</script>";
	// }

	  // if(!$query)
      //           {
      //               $return = array('status'=> 'FAILED');
      //           } else {
	// 				//insert into barang_masuk_detail
					
      //           }
                    //$data = array('status'=> 'SUCCESS');
}
        $data = array(
			'error' => false
		);
		echo json_encode($data);
?>