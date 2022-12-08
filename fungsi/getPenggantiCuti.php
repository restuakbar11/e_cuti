<?php 
session_start();
$sess_divisi = $_SESSION['sess_divisi'];
include "../dist/config/koneksi.php";

$sql = "SELECT npp, nama_emp FROM employee WHERE divisi = '$sess_divisi' AND active = 'Aktif'
ORDER BY npp ASC ";
	$queryPenggantiCuti = mysqli_query($conn,$sql);
	//$result = mysqli_fetch_array($query);
?>
<select name="pengganti" id="pengganti" class="form-control" >
<option value="" selected>======== Pilih Pegawai ========</option>
	<?php while ($s =mysqli_fetch_array($queryPenggantiCuti)) { ?>
		<option style="margin-left:20px;" value="<?php echo $s['npp'] ?>"><?php echo $s['nama_emp'] ?></option>
	<?php } ?>
</select>