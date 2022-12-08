<?php error_reporting ( E_ALL & ~E_NOTICE);
$page = isset($_GET['page']) ? $_GET['page'] : '';

    switch($page)
    {
      	 
		
		// MASTER
		case 'karyawan'  : include "modul/karyawan/v_karyawan.php";
		break;
		case 'karyawan_tambah'  : include "modul/karyawan/v_add_karyawan.php";
		break;
		case 'karyawan_edit'  : include "modul/karyawan/v_edit_karyawan.php";
		break;
		case 'permintaan' : include "modul/persetujuan_cuti/v_permintaan.php";
		break;

		// LAPORAN
		case 'laporan' : include "modul/laporan/v_laporan.php";
		break;
		case 'laporan_cetak' : include "modul/laporan/laporan_cetak.php";
		break;

		//PENGAJUAN CUTI
		case 'pengajuan' : include "modul/pengajuan_cuti/v_cuti_create.php";
		break;
		case 'menunggu' : include "modul/pengajuan_cuti/v_wait_cuti.php";
		break;
		case 'setuju' : include "modul/pengajuan_cuti/v_acc_cuti.php";
		break;
		case 'tolak' : include "modul/pengajuan_cuti/v_reject_cuti.php";
		break;
		
			
		default : include "home.php"; break;
    } ;
?>	