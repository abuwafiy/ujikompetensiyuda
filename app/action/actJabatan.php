<?php
	require_once('../controller/ctrlJabatan.php');

	if(isset($_POST['tambah'])){
		insertJabatan($_POST['nama_jabatan'],$_POST['status_jabatan']);
		echo $_POST['id_jabatan'];
		header("location:../../Jabatan");
	}

	if(isset($_POST['edit'])){
		updateJabatan($_POST['id_jabatan'],$_POST['nama_jabatan'],$_POST['status_jabatan']);
		header("location:../../Jabatan");
	}

	if(isset($_GET['act']) && $_GET['act'] == 'hapus'){
		deleteJabatan($_GET['id']);
		header("location:../../Jabatan");
	}

	if(isset($_GET['act']) && $_GET['act'] == 'edit'){
		$reader = selectJabatan($_GET['id']);
		$location = "location:../../?page=Jabatan&act=edit";
		$x=0;
		while($qry = mysqli_fetch_array($reader)){
			$query = mysqli_query($GLOBALS['db'],"SHOW COLUMNS FROM Jabatan");
			while($qr = mysqli_fetch_array($query)){ 
					$location = $location.'&'.$qr[0].'='.$qry[$x];
					$x++;
			}			
		}
		
		header($location);
	}

	if(isset($_GET['act']) && $_GET['act'] == 'akses'){
		$reader = selectJabatan($_GET['id']);
		$location = "location:../../?page=Hak_Akses&act=akses";
		$x=0;
		while($qry = mysqli_fetch_array($reader)){
			$query = mysqli_query($GLOBALS['db'],"SHOW COLUMNS FROM Jabatan");
			while($qr = mysqli_fetch_array($query)){ 
					$location = $location.'&'.$qr[0].'='.$qry[$x];
					$x++;
			}			
		}
		
		header($location);
	}
?>