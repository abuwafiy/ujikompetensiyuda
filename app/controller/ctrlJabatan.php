<?php
	require_once('../config/Database.php');

	function insertJabatan($nama,$status){
		$sql = "INSERT INTO `jabatan`(`nama_jabatan`, `status_jabatan`) VALUES ('$nama','$status')";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}

	function updateJabatan($id,$nama,$status){
		$sql = "UPDATE `jabatan` SET `nama_jabatan`='$nama',`status_jabatan`='$status' WHERE ID_jabatan = $id";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}

	function deleteJabatan($id){
		$sql = "DELETE FROM jabatan WHERE ID_jabatan = $id";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}	

	function selectJabatan($id){
		$sql = "SELECT * FROM jabatan where ID_jabatan = $id";
		$input = mysqli_query($GLOBALS['db'],$sql); 
		return $input;
	}	
?>