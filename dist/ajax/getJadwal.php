<?php
	include('../../app/config/Database.php');
	$id = $_POST['no']; 
?>
 <tr id="<?php echo $id; ?>">
  <td>
    <input  class="form-control" style="text-align: right;" type="number" name="progress[]">
  </td>
  <td>
    <input class="form-control" style="text-align: right;"  type="number" name="tagihan[]">
  </td>
  <td width="30px">
    <button style="cursor:pointer;" class="btn btn-primary" type="button"  onclick='hapusPeng(<?php echo $id; ?>)'><i class="fa fa-trash"></i></button>
  </td>
</tr> 