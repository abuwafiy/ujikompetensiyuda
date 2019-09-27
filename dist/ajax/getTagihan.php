<?php
	include('../../app/config/Database.php');
	$id = $_POST['no']; 
?>
 <tr id="<?php echo $id; ?>">
  <td width="110px">           
      <div class="input-group">
        <input style="cursor: pointer; width: 100px;" type="text" class="form-control" readonly="readonly" id="no_akun<?php echo $id; ?>"  name="no_akun[]" data-toggle="modal" data-target="#modal1">
        <div class="input-group-addon">
          <a href="#" type="button" class="pull-right" data-toggle="modal" data-target="#modal1s" data-whatever="<?php echo $id; ?>"><i class="fa fa-folder-open"></i> </a>
        </div>
      </div>
  </td>              
  <td>
      <input type="number "  class="form-control pull-right" id="nama_akun<?php echo $id; ?>" data-readonly name="nama_akun[]" >
  </td>
  <td>
    <input  class="form-control" style="text-align: right;" type="number" name="progres[]" placeholder="Opsional">
  </td>
  <td>
    <input class="form-control" style="text-align: right;" id="i<?php echo $id; ?>" type="number" onkeyup="hitungTotals()" name="jumlah[]">
  </td>
  <td width="30px">
    <button style="cursor:pointer;" class="btn btn-primary" type="button"  onclick='hapusPeng(<?php echo $id; ?>)'><i class="fa fa-trash"></i></button>
  </td>
</tr> 