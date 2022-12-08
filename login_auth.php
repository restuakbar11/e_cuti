	<?php
	// memulai session
	session_start();
	// memanggil file koneksi
	include("dist/config/koneksi.php");
	$ext = "restuakbarnugraha";
	$pass = $_POST['password'];
	$username = $_POST['username'];
	$password = md5($pass . $ext);
	$result = mysqli_query($conn,"SELECT * FROM employee WHERE username='". $username ."' AND password='". $password ."'");
	$r=mysqli_fetch_array($result);

	if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
	   echo "Anda dalam keadaan Login. </br> Anda bisa <a href='logout.php'> Keluar. </a>";
	}

	if(mysqli_num_rows($result) == 0){
	    echo"<script>alert('LOGIN Failed, please check your username and password, or contact Web Administrator.');window.history.go(-1);</script>";
	}else{
		if($_SESSION['signed_in'] = true && $_SESSION['username'] = $r['username']){

			$_SESSION['sess_admin'] = $r['id_adm'];
   			$_SESSION['sess_admuser'] = $r['username'];
   			$_SESSION['sess_admname'] = $r['nama_emp'];
   			$_SESSION['sess_admnpp'] = $r['npp'];
   			$_SESSION['sess_akses'] = $r['hak_akses'];
   			$_SESSION['sess_divisi'] = $r['divisi'];
			header("Location: index.php");
			//echo "10";
		}else{
			header('location:index.php');
			//echo "2";
		}
	}
























	// mengecek apakah tombol login sudah di tekan atau belum
	// if(isset($_POST['login'])) {
	// 	// mengecek apakah username dan password sudah di isi atau belum
	// 	if(empty($_POST['username']) || empty($_POST['password'])) {
	// 		// mengarahkan ke halaman login.php
	// 		header("location: login.php?err=empty");
	// 	}
	// 	else {
	// 		// membaca nilai variabel username dan password
	// 		$ext = "restuakbarnugraha";
	// 		
	// 		// mencegah sql injection
	// 		$username = htmlentities(trim(strip_tags($username)));
	// 		$password = htmlentities(trim(strip_tags($password)));
	// 			// memeriksa username di tabel admin

	// 			if($akses=="Admin"){			
	// 				$sql = "SELECT * FROM admin WHERE user_adm='". $username ."' AND pass_adm='". $password ."'";
	// 				$ress = mysqli_query($conn, $sql);
	// 				$rows = mysqli_num_rows($ress);
	// 				$dataku = mysqli_fetch_array($ress);
	// 				// mendaftarkan session jika username di temukan
	// 				if($rows == 1) {
	// 					// membuat variabel session
	// 					$_SESSION['admin'] = strtolower($dataku['id_adm']);
	// 					// mengarahkan ke halaman indeks.php
	// 					header("location: index.php?login=success");
	// 				}else{
	// 					header("location: login.php?err=not_found");
	// 				}
	// 			}else{
	// 				$sql = "SELECT * FROM employee WHERE username='". $username ."' AND password='". $password ."'";
	// 				$ress = mysqli_query($conn, $sql);
	// 				$rows = mysqli_num_rows($ress);
	// 				$dataku = mysqli_fetch_array($ress);
	// 				// mendaftarkan session jika username di temukan
	// 				if($rows == 1) {
	// 					// membuat variabel session
	// 					$_SESSION['leader'] = strtolower($dataku['npp']);
	// 					// mengarahkan ke halaman indeks.php
	// 					header("location: index.php?login=success");
	// 				}else{
	// 					header("location: login.php?err=not_found");
	// 				}
	// 			}
	// 	}
	// }
	?>