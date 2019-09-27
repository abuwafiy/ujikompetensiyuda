<?php
	require_once('../controller/ctrlAkses.php');
	if(isset($_POST['akses'])){
		mysqli_begin_transaction($GLOBALS['db'], MYSQLI_TRANS_START_READ_ONLY);
		deleteAkses($_POST['id_jabatan']);
		$modul = isset($_POST['modul']) ? $_POST['modul'] : array();
		foreach ($modul as $key) {
			insertAkses($key,$_POST['id_jabatan']);
		}
		mysqli_commit($GLOBALS['db']);
		header("location:actJabatan.php?act=akses&id=$_POST[id_jabatan]");
	}

	if(isset($_POST['edit'])){
		updateAkses($_POST['id_Akses'], $_POST['id_jenis_Akses'], $_POST['nama_Akses'], $_POST['posisi'], $_POST['saldo'], $_POST['status']);
		header("location:../../Akses");
	}

	if(isset($_GET['act']) && $_GET['act'] == 'hapus'){
		deleteAkses($_GET['id']);
		header("location:../../Akses");
	}

	if(isset($_GET['act']) && $_GET['act'] == 'edit'){
		$reader = selectAkses($_GET['id']);
		$location = "location:../../?page=Akses&act=edit";
		$x=0;
		while($qry = mysqli_fetch_array($reader)){
			$query = mysqli_query($GLOBALS['db'],"SHOW COLUMNS FROM Akses");
			while($qr = mysqli_fetch_array($query)){ 
					$location = $location.'&'.$qr[0].'='.$qry[$x];
					$x++;
			}			
		}
		
		header($location);
	}
?>