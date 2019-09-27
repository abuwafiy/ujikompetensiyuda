<?php
	include('../../app/config/Database.php');
  include('../../app/config/Config.php');
	$id = $_POST['no']; 
   
?>
 <tr id="<?php echo $id; ?>">            
  <td>
      <input type="text"  class="form-control pull-right"  name="deskripsi[]">
  </td>
  <td width="10px">
    <input  class="form-control" style=" cursor:pointer;" type="number" name="id_akun[]" data-toggle="modal" data-target="#modal1s" data-whatever="<?php echo $id; ?>" id="no_akun<?php echo $id; ?>" readonly>
  </td>
  <td>
    <input class="form-control" style="text-align: right;" id="i<?php echo $id; ?>"  value="" type="number" onkeyup="hitungTotals()" name="jumlah[]">
    <input type="hidden"  readonly="readonly" name="progress[]" value="0">
  </td>
  <td width="30px">
    <button style="cursor:pointer;" class="btn btn-primary" type="button"  onclick='hapusPeng(<?php echo $id; ?>)'><i class="fa fa-trash"></i></button>
  </td>
</tr> 