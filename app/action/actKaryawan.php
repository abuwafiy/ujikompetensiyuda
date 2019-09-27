<?php
	require_once('../controller/ctrlKaryawan.php');

	if(isset($_POST['tambah'])){
		insertKaryawan($_POST['nik'], $_POST['id_jabatan'], $_POST['nama_karyawan'], $_POST['alamat_karyawan'], $_POST['telepon_karyawan'], $_POST['pin'], $_POST['status_karyawan']);
		header("location:../../Karyawan");
	}

	if(isset($_POST['edit'])){
		updateKaryawan($_POST['nik'], $_POST['id_jabatan'], $_POST['nama_karyawan'], $_POST['alamat_karyawan'], $_POST['telepon_karyawan'], $_POST['pin'], $_POST['status_karyawan']);
		header("location:../../Karyawan");
	}

	if(isset($_GET['act']) && $_GET['act'] == 'hapus'){
		deleteKaryawan($_GET['id']);
		header("location:../../Karyawan");
	}

	if(isset($_GET['act']) && $_GET['act'] == 'edit'){
		$reader = selectKaryawan($_GET['id']);
		$location = "location:../../?page=Karyawan&act=edit";
		$x=0;
		while($qry = mysqli_fetch_array($reader)){
			$query = mysqli_query($GLOBALS['db'],"SHOW COLUMNS FROM Karyawan");
			while($qr = mysqli_fetch_array($query)){ 
					$location = $location.'&'.$qr[0].'='.$qry[$x];
					$x++;
			}			
		}
		
		header($location);
	}
?>