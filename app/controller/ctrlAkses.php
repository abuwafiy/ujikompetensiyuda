<?php
	require_once('../config/Database.php');

	function insertAkses($id_parent,$id_jabatan){
		$sql = "INSERT INTO `detail_group`(`id_parent`, `id_jabatan`) VALUES ('$id_parent','$id_jabatan')";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}


	function deleteAkses($id){
		$sql = "DELETE FROM detail_group WHERE id_jabatan = $id";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}	

	function selectAkses($id){
		$sql = "SELECT * FROM Akses where ID_Akses = $id";
		$input = mysqli_query($GLOBALS['db'],$sql); 
		return $input;
	}	

?>