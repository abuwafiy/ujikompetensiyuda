<?php
	require_once('../config/Database.php');

	function insertUnitKompetensi($id_unit,$judul_unit, $deskripsi_unit){
		$sql = "INSERT INTO `unit_kompetensi`(`id_unit`,`judul_unit`, `deskripsi_unit`) VALUES ('$id_unit','$judul_unit', '$deskripsi_unit')";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}

    function selectUnitKompetensi($id){
		$sql = "SELECT * FROM unit_kompetensi where id_unit = $id";
		$input = mysqli_query($GLOBALS['db'],$sql); 
		return $input;
	}

	// function updateKonsumen($id_konsumen, $nama_konsumen, $no_ktp, $alamat_ktp, $email_konsumen, $penghasilan, $telepon_pribadi, $pekerjaan, $nama_kantor, $alamat_kantor, $telepon_kantor, $nama_keluarga, $alamat_keluarga, $hubungan, $telepon_keluarga){
	// 	$sql = "UPDATE `konsumen` SET `nama_konsumen`='$nama_konsumen',`no_ktp`='$no_ktp',`alamat_ktp`='$alamat_ktp',`email_konsumen`='$email_konsumen',`penghasilan`=$penghasilan,`telepon_pribadi`='$telepon_pribadi',`pekerjaan`='$pekerjaan',`nama_kantor`='$nama_kantor',`alamat_kantor`='$alamat_kantor',`telepon_kantor`='$telepon_kantor',`nama_keluarga`='$nama_keluarga',`alamat_keluarga`='$alamat_keluarga',`hubungan`='$hubungan',`telepon_keluarga`='$telepon_keluarga' WHERE id_konsumen = $id_konsumen";
	// 	$input = mysqli_query($GLOBALS['db'],$sql); 
	// }

	// function deleteKonsumen($id){
	// 	$sql = "DELETE FROM KONSUMEN WHERE ID_KONSUMEN = $id";
	// 	$input = mysqli_query($GLOBALS['db'],$sql); 
	// }	

	// function selectKonsumen($id){
	// 	$sql = "SELECT * FROM KONSUMEN where ID_KONSUMEN = $id";
	// 	$input = mysqli_query($GLOBALS['db'],$sql); 
	// 	return $input;
	// }	

?>