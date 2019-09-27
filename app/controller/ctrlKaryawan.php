<?php
	require_once('../config/Database.php');

	function insertKaryawan($nik, $id_jabatan, $nama_karyawan, $alamat_karyawan, $telepon_karyawan, $pin, $status_karyawan){
		$sql = "INSERT INTO `karyawan`(`nik`, `id_jabatan`, `nama_karyawan`, `alamat_karyawan`, `telepon_karyawan`, `pin`, `status_karyawan`) VALUES ('$nik', '$id_jabatan', '$nama_karyawan', '$alamat_karyawan', '$telepon_karyawan', md5('$pin'), '$status_karyawan')";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}

	function updateKaryawan($nik, $id_jabatan, $nama_karyawan, $alamat_karyawan, $telepon_karyawan, $pin, $status_karyawan){
		$sql = "UPDATE `karyawan` SET `id_jabatan`='$id_jabatan',`nama_karyawan`='$nama_karyawan',`alamat_karyawan`='$alamat_karyawan',`telepon_karyawan`='$telepon_karyawan',`pin`=md5('$pin'),`status_karyawan`='$status_karyawan' WHERE nik = '$nik' and pin != '$pin'";
		$input = mysqli_query($GLOBALS['db'],$sql); 
		$sql = "UPDATE `karyawan` SET `id_jabatan`='$id_jabatan',`nama_karyawan`='$nama_karyawan',`alamat_karyawan`='$alamat_karyawan',`telepon_karyawan`='$telepon_karyawan',`pin`='$pin',`status_karyawan`='$status_karyawan' WHERE nik = '$nik' and pin = '$pin'";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}

	function deleteKaryawan($id){
		$sql = "DELETE FROM karyawan WHERE NIK = '$id'";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}	

	function selectKaryawan($id){
		$sql = "SELECT * FROM karyawan where NIK = '$id'";
		$input = mysqli_query($GLOBALS['db'],$sql); 
		return $input;
	}	
?>