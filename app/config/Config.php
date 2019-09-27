<?php	

	function ifset(&$var, $else = '') {
	  	return isset($var) && $var ? $var : $else;
	}

	function ifsetK(&$var, $else = '') {
		$else = getIDN('unit_kompetensi');
	  	return isset($var) && $var ? $var : $else;
	}

	function ifsetP(&$var, $else = '') {
		$else = getIDP();
	  	return isset($var) && $var ? $var : $else;
	}

	function ifsetVal(&$var, $else) {
	  	return isset($var) && $var ? $var : $else;
	}

	function ifsetN(&$var, $else = '0') {
	  	return isset($var) && $var ? $var : $else;
	}

	function ifsetCol(&$var, $else = 'style="display:none;"') {
	  	return isset($var) && $var ? $var : $else;
	}

	function ifsetNone(&$var, $var2, $e='', $else = 'style="display:none;"') {
		if($var == $var2){
			return $else;
		}
	  	return $e;
	}

	function ifsetCols(&$var, $else = 'collapsed-box') {
	  	return isset($var) && $var ? $var : $else;
	}

	function readonly(&$var, $else = '') {
		if(isset($var)){
			return 'readonly=""';
		}
	  	return isset($var) && $var ? $var : $else;
	}

	function disabled(&$var, $else = '') {
		if(isset($var)){
			return 'disabled=""';
		}
	  	return isset($var) && $var ? $var : $else;
	}

	function selected(&$var,$id, $else = '') {
		if(isset($var)){
			if($id==$var){
				return 'selected';
			}
			
		}
	  	return isset($var) && $var ? $var : $else;
	}

	function actived(&$var,$id, $else = '') {
		if(isset($var)){
			if($id==$var){
				return 'active';
			}
			
		}
	  	return isset($var) && $var ? $var : $else;
	}

	function activedP(&$var,$a,$else = '') {
		$sql = mysqli_query ($GLOBALS['db'],"SELECT * FROM MENU_PARENT WHERE NAMA_PARENT = '$var' AND ID_MENU = '$a'");
        while($qry = mysqli_fetch_array($sql)){
			return 'active';
		}
		
	  	return isset($var) && $var ? $var : $else;
	}

	function treeView($a) {
		$sql = mysqli_query ($GLOBALS['db'],"select count(*) from menu_parent where id_menu = '$a'");
        while($qry = mysqli_fetch_array($sql)){
        	if($qry[0] > 1){
        		return 'treeview';
        	}else{
        		return '';
        	}
			
		}
		
	}

	function getIDN($tabel) {
		$query = mysqli_query($GLOBALS['db'],"SHOW TABLE STATUS LIKE '$tabel'");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[10];
		}
		return $id;		
	}

	function getIDJ() {
		$query = mysqli_query($GLOBALS['db'],"SELECT CONCAT('J',RIGHT(CONCAT('000000000000',IFNULL(right(max(id_jurnal),10),0)+1),10)) FROM `jurnal_umum`");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[0];
		}
		return $id;		
	}

	function getBTL() {
		$query = mysqli_query($GLOBALS['db'],"SELECT CONCAT(RIGHT(CONCAT('00000',IFNULL(MAX(id_pembatalan),0)+1),5),'/DDS/BTL/',LPAD(MONTH(NOW()), 2, '0'),'/',YEAR(NOW())) FROM `PEMBATALAN` WHERE YEAR(NOW()) = RIGHT(id_pembatalan,4)");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[0];
		}
		return $id;		
	}

	function getIDB() {
		$query = mysqli_query($GLOBALS['db'],"SELECT CONCAT(RIGHT(CONCAT('00000',IFNULL(MAX(id_pembayaran),0)+1),5),'/DDS/INV/',LPAD(MONTH(NOW()), 2, '0'),'/',YEAR(NOW())) FROM `pembayaran` WHERE YEAR(NOW()) = RIGHT(id_pembayaran,4)");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[0];
		}
		return $id;		
	}

	function getIDBB() {
		$query = mysqli_query($GLOBALS['db'],"SELECT CONCAT(RIGHT(CONCAT('00000',IFNULL(MAX(id_pembayaran),0)+1),5),'/DDS/SOU/',LPAD(MONTH(NOW()), 2, '0'),'/',YEAR(NOW())) FROM `pembayaran_pembelian` WHERE YEAR(NOW()) = RIGHT(id_pembayaran,4)");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[0];
		}
		return $id;		
	}

	function getIDP() {
		$query = mysqli_query($GLOBALS['db'],"SELECT CONCAT(RIGHT(CONCAT('0000',IFNULL(MAX(no_spr),0)+1),4),'/DDS/SPR/',LPAD(MONTH(NOW()), 2, '0'),'/',YEAR(NOW())) FROM `pemesanan` WHERE YEAR(NOW()) = RIGHT(no_spr,4)");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[0];
		}
		return $id;		
	}

	function getIDPeng() {
		$query = mysqli_query($GLOBALS['db'],"SELECT CONCAT(RIGHT(CONCAT('00000',IFNULL(MAX(id_pengeluaran),0)+1),5),'/DDS/OUT/',LPAD(MONTH(NOW()), 2, '0'),'/',YEAR(NOW())) FROM `pengeluaran` WHERE YEAR(NOW()) = RIGHT(id_pengeluaran,4)");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[0];
		}
		return $id;		
	}

	function getIDPem() {
		$query = mysqli_query($GLOBALS['db'],"SELECT CONCAT(RIGHT(CONCAT('00000',IFNULL(MAX(id_pembelian),0)+1),5),'/DDS/TGH/',LPAD(MONTH(NOW()), 2, '0'),'/',YEAR(NOW())) FROM `pembelian` WHERE YEAR(NOW()) = RIGHT(id_pembelian,4)");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[0];
		}
		return $id;		
	}

	function getIDJadwal() {
		$query = mysqli_query($GLOBALS['db'],"SELECT CONCAT(RIGHT(CONCAT('00000',IFNULL(MAX(id_jadwal),0)+1),5),'/DDS/PGR/',LPAD(MONTH(NOW()), 2, '0'),'/',YEAR(NOW())) FROM `jadwal_pembayaran` WHERE YEAR(NOW()) = RIGHT(id_jadwal,4)");
		while($qr = mysqli_fetch_array($query)){ 
			$id = $qr[0];
		}
		return $id;		
	}

	function ifsetAct(&$var, $else = 'tambah') {
	  	return isset($var) && $var ? $var : $else;
	}

	function get($tabel,$kolom,$id,$param){
		$data='';
		$sql = "SELECT $kolom FROM $tabel where $id = '$param'";
		$input = mysqli_query($GLOBALS['db'],$sql);
		while($qry = mysqli_fetch_array($input)){
			$data = $qry[0];
		}
		return $data;
	}

	function getJoin($tabela,$tabelb,$kolom,$ida,$idb,$param){
		$data='';
		$sql = "SELECT $tabela.$kolom FROM $tabela join $tabelb on $tabela.$ida = $tabelb.$idb where $tabela.$ida = '$param'";

		$input = mysqli_query($GLOBALS['db'],$sql);
		while($qry = mysqli_fetch_array($input)){
			$data = $qry[0];
		}
		return $data;
	}

	function getJoin3($tabela,$tabelb,$tabelc,$kolom,$ida,$idb,$exp,$param){
		$data='';
		$sql = "SELECT $tabela.$kolom FROM $tabela join $tabelb on $tabela.$ida = $tabelb.$ida join $tabelc on $tabelc.$idb = $tabelb.$idb where $tabelc.$exp = '$param'";
		
		$input = mysqli_query($GLOBALS['db'],$sql);
		while($qry = mysqli_fetch_array($input)){
			$data = $qry[0];
		}
		return $data;
	}

	function getJoin2($tabela,$tabelb,$kolom,$ida,$exp,$param){
		$data='';
		$sql = "SELECT $tabela.$kolom FROM $tabela join $tabelb on $tabela.$ida = $tabelb.$ida    where $tabela.$exp = '$param'";
		
		$input = mysqli_query($GLOBALS['db'],$sql);
		while($qry = mysqli_fetch_array($input)){
			$data = $qry[0];
		}
		return $data;
	}

	function check($idjabatan,$idmodul){
		$sql = mysqli_query ($GLOBALS['db'],"SELECT * FROM DETAIL_GROUP WHERE ID_JABATAN = '$idjabatan' and id_parent='$idmodul'");
        while($qry = mysqli_fetch_array($sql)){
        	if($qry[0] == $idmodul){
        		return "checked";
        	}else{
        		return "";
        	}
			
		}
	}

	function viewPemesanan($no_spr){
		return mysqli_query($GLOBALS['db'],"SELECT a.no_spr,a.id_konsumen,c.nama_tipe,a.no_kavling,a.nik,d.nama_proyek FROM Pemesanan a join kavling b on a.no_kavling=b.no_kavling join tipe c on c.id_tipe=b.id_tipe join proyek d on d.id_proyek=c.id_proyek where a.no_spr = '$no_spr'");
	}
?>