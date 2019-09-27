<?php
require_once('../controller/ctrlUnitKompetensi.php');
require_once('../controller/ctrlPersyaratan.php');
session_start();

if(isset($_POST['tambah'])){	

		//insert Data Unit
	insertUnitKompetensi($_POST['id_unit'],$_POST['judul_unit'], $_POST['deskripsi_unit']);



		//insert persyaratan
	foreach($_POST['nama_persyaratan'] as $key => $id)
	{
		$nama_persyaratan = $_POST ['nama_persyaratan'];
		insertPersyaratan($_POST['id_unit'],$nama_persyaratan[$key]);

	}
	header("location:../../unit_kompetensi");
}
	if(isset($_GET['act']) && $_GET['act'] == 'detail'){
		$reader = selectUnitKompetensi($_GET['id']);
		$location = "location:../../?page=detail_kompetensi&act=detail";
		$x=0;
		while($qry = mysqli_fetch_array($reader)){
			$query = mysqli_query($GLOBALS['db'],"SHOW COLUMNS FROM unit_kompetensi");
			while($qr = mysqli_fetch_array($query)){ 
				$location = $location.'&'.$qr[0].'='.$qry[$x];
				$x++;
			}			
		}
		header($location);
	}


	?>	