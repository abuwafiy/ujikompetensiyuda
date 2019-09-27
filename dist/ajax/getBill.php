<?php
	include('../../app/config/Database.php');
  include('../../app/config/Config.php');
	$id = $_POST['id']; 

  $query = mysqli_query($GLOBALS['db'],"SELECT a.*,b.total_proyek FROM DETAIL_JADWAL a join jadwal_pembayaran b on a.id_jadwal=b.id_jadwal where a.id_detail_jadwal = '$id'");
  while($qr = mysqli_fetch_array($query)){ 
    $amt = ($qr[3]/100) * $qr[4] ;
   
?>
 <tr id="0">
  <td width="110px" style="display: none;">           
      <div class="input-group">
        
      </div>
  </td>              
  <td>
      <input type="text"  class="form-control pull-right" value="<?php echo get('akun','nama_akun','id_akun','5102'); ?>" data-readonly name="deskripsi[]">
  </td>
  <td width="10px">
      <input type="text"  class="form-control pull-right" value="5102" data-readonly name="id_akun[]" >
  </td>
  <td>
    <input class="form-control" style="text-align: right;" readonly id="i0" value="<?php echo $amt; ?>" type="number" onkeyup="hitungTotals()" name="jumlah[]">
    <input style="cursor: pointer; width: 100px;" type="hidden" class="form-control" readonly="readonly" name="progress[]"  value="<?php echo $qr[2]; ?>">
  </td>
  <td width="30px">
    <button style="cursor:pointer;" class="btn btn-primary" type="button"  onclick='hapusPeng(0)'><i class="fa fa-trash"></i></button>
  </td>
</tr> 
<?php } ?>
