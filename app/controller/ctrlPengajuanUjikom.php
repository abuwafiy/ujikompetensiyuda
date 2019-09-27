<?php
	require_once('../config/Database.php');

	function insertPengajuanKompetensi($no_pendaftaran, $nik, $nama_lengkap, $ttl, $jenis_kelamin, $kebangsaan, $alamat_rumah, $ppn, $total_diskon_ppn, $booking_fee, $jatuh_tempo_fee, $cara_pembayaran, $uang_muka, $lama_um, $jatuh_tempo_um, $sisa_pembayaran, $lama_pembayaran, $kpr, $jatuh_tempo, $status_pesan, $p_um,$pemakaian_um){
		$sql = "INSERT INTO `pemesanan`(`no_spr`, `id_konsumen`, `no_kavling`, `nik`, `tanggal_pemesanan`, `harga_kesepakatan`, `diskon`, `ppn`, `total_diskon_ppn`,`booking_fee`, `jatuh_tempo_fee`, `cara_pembayaran`, `uang_muka`, `lama_um`, `jatuh_tempo_um`, `sisa_pembayaran`, `lama_pembayaran`, `kpr`, `jatuh_tempo`, `status_pesan`, `p_um`,`pemakaian_um`) VALUES ('$no_spr', '$id_konsumen', '$no_kavling', '$nik', '$tanggal_pemesanan', '$harga_kesepakatan', '$diskon', '$ppn', '$total_diskon_ppn','$booking_fee', '$jatuh_tempo_fee', '$cara_pembayaran', '$uang_muka', '$lama_um', '$jatuh_tempo_um', '$sisa_pembayaran', '$lama_pembayaran', '$kpr', '$jatuh_tempo', '$status_pesan','$p_um','$pemakaian_um')";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}

	function updatePemesanan($no_spr, $id_konsumen, $no_kavling, $nik, $tanggal_pemesanan, $harga_kesepakatan, $diskon, $ppn, $total_diskon_ppn, $booking_fee, $jatuh_tempo_fee, $cara_pembayaran, $uang_muka, $lama_um, $jatuh_tempo_um, $sisa_pembayaran, $lama_pembayaran, $kpr, $jatuh_tempo, $status_pesan, $p_um){
		$sql = "UPDATE `pemesanan` SET `id_konsumen`='$id_konsumen',`no_kavling`='$no_kavling',`tanggal_pemesanan`='$tanggal_pemesanan',`harga_kesepakatan`=$harga_kesepakatan,`diskon`=$diskon,`ppn`= $ppn,`total_diskon_ppn`=$total_diskon_ppn,`booking_fee`=$booking_fee,`jatuh_tempo_fee`='$jatuh_tempo_fee',`cara_pembayaran`='$cara_pembayaran',`uang_muka`=$uang_muka,`lama_um`=$lama_um,`jatuh_tempo_um`='$jatuh_tempo_um',`sisa_pembayaran`=$sisa_pembayaran,`lama_pembayaran`=$lama_pembayaran,`kpr`=$kpr,`jatuh_tempo`='$jatuh_tempo',`p_um`=$p_um WHERE no_spr='$no_spr'";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}

	function validPemesanan($no_spr){
		$sql = "UPDATE `pemesanan` SET status_pesan = 'Tervalidasi' WHERE no_spr='$no_spr'";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}

	function deletePemesanan($id){
		$sql = "DELETE FROM Pemesanan WHERE no_spr = '$id'";
		$input = mysqli_query($GLOBALS['db'],$sql); 
	}	

	function selectPemesanan($id){
		$sql = "SELECT * FROM Pemesanan where no_spr = '$id'";
		$input = mysqli_query($GLOBALS['db'],$sql); 
		return $input;
	}	

?>