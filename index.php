<?php
	session_start();
	include "dist/config/koneksi.php";
	$isLoggedIn = $_SESSION['signed_in'];
	$sess_admname = $_SESSION['sess_admname'];
	$sess_admn = $_SESSION['sess_admin'];
	$sess_hakakses = $_SESSION['sess_akses'];
	$sess_admnpp = $_SESSION['sess_admnpp'];
	$sess_divisi = $_SESSION['sess_divisi'];
	// echo $sess_admin;
	$pagedesc = "Beranda";
	include("layout_top.php");

	if($isLoggedIn == false){
    	session_destroy();
    	header('Location: login.php');
	}else {
		include("page.php");
	}

	include("layout_bottom.php");
?>