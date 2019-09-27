<?php
	include('../../app/config/Database.php');
	$id = $_POST['no']; 
?>
<tr id="<?php echo $id; ?>" >
<td>
  <select class="form-control" name="cara_bayar[]" onchange="tampil(this,<?php echo $id; ?>)">
    <option value="Tunai">Tunai</option>
    <option value="Transfer">Transfer</option>                 
  </select>
</td>              
<td>
  <select class="form-control" name="id_bank[]" >
    <?php
      $query = mysqli_query($GLOBALS['db'],"SELECT * from bank");
      while($qry = mysqli_fetch_array($query)) {
    ?>
      <option value="<?php echo $qry[0]; ?>"><?php echo $qry[2]; ?></option>
    <?php } ?>
  </select>
   <input id="ut<?php echo $id; ?>" style="margin-top:5px;" class="form-control" type="file" name="bukti[]">
   <textarea id="uk<?php echo $id; ?>" style="margin-top:5px;" class="form-control" name="ket[]" placeholder="Keterangan"></textarea>
</td>
<td>
  <input class="form-control" type="date" name="tanggal_bayar[]">
</td>
<td>
  <input id="i<?php echo $id; ?>" class="form-control" onkeyup="hitungTotal(<?php echo $id; ?>)"  type="number" name="jumlah_bayar[]">
</td>
<td onclick='hapusBayar(this,<?php echo $id; ?>)'>
<a href='#' class='btn btn-primary' style='cursor:pointer;'> <i class='fa fa-trash'></i></a>
</td>
</tr> 