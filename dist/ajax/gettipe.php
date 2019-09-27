<?php
	include('../../app/config/Database.php');
	if(isset($_POST['id_proyek'])) { 
		$id = $_POST['id_proyek']; 
		$query = mysqli_query($GLOBALS['db'],"SELECT * FROM tipe WHERE id_proyek = $id");
		echo "<option value=''>-- Silahkan Pilih Tipe --</option>";
        while($qry = mysqli_fetch_array($query)) {
            echo '<option value="'.$qry[0].'"">'.$qry[2].'</option>';
	    }
	}
?>