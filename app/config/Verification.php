<?php
session_start();
$base_url='http://localhost/ujikompetensi/';
require_once('Database.php');

$nik = $_POST['nik'];
$pin = $_POST['pin'];
$sql = mysqli_query ($db,"SELECT a.nik, a.nama_karyawan,b.nama_jabatan,a.id_jabatan from karyawan a join jabatan b on a.id_jabatan=b.id_jabatan where a.nik = '$nik' and a.pin=md5('$pin') and a.status_karyawan = 'aktif'");
if (mysqli_num_rows($sql)==1){
	while($qry = mysqli_fetch_array($sql)){
		$_SESSION['nik'] = $qry[0];
		$_SESSION['nama'] = $qry[1];
		$_SESSION['jabatan'] = $qry[2];
		$_SESSION['id_jabatan'] = $qry[3];
		header("location:".$base_url);
	}
}else{
	echo '<script>alert("Username atau Password Salah")</script>';
	header("location:".$base_url."login.php?error=1");		
}