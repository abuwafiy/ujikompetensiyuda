<form action="app/action/actAkses.php" method="POST" id="form">
  <div class="box box-solid">
    <a href="#"><div class="box-header  with-border" data-widget="collapse">
      <h3 class="box-title">Manage Kelompok Hak Akses</h3>

      <div class="box-tools pull-right" >
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> <?php echo ifsetAct($_GET['act']); ?></button>
      </div>
    </div>
  </a>
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Jabatan</label>
          <div class="input-group">
            <input type="text" class="form-control pull-right" id="nama_jabatan" required data-readonly value="<?php echo ifset($_GET['nama_jabatan']); ?>">
            <input type="hidden" class="form-control pull-right" name="id_jabatan" id="id_jabatan" required value="<?php echo ifset($_GET['id_jabatan']); ?>">
            <div class="input-group-addon">
              <a href="#" type="button" class="pull-right" data-toggle="modal" data-target="#modal1" ><i class="fa fa-user"></i> Pilih</a>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="box-footer" >
    <input type="submit" name="<?php echo ifsetAct($_GET['act']); ?>" value="Simpan" class="btn btn-primary" id="simpan" readonly>
  </div>
</div>

<!-- Data Table-->
<div class="row">
  <?php
  $query = mysqli_query($GLOBALS['db'],"SELECT * FROM Menu");
  while($qry = mysqli_fetch_array($query)) {
    ?>
    <div class="col-md-4">
      <div class="box box-solid <?php echo ifsetCols($_GET['id_jabatan']); ?>">
        <a href="#"><div class="box-header  with-border" data-widget="collapse">
          <h3 class="box-title"><?php echo $qry[2]; ?></h3>

          <div class="box-tools pull-right" >
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> <?php echo ifsetAct($_GET['act']); ?></button>
          </div>
        </div>
      </a>
      <div class="box-body" <?php echo ifsetCol($_GET['id_jabatan']); ?>>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <?php
              $query1 = mysqli_query($GLOBALS['db'],"SELECT * FROM Menu_parent where id_menu = $qry[0] and id_parent_child='0'");
              while($qr = mysqli_fetch_array($query1)) {

                ?>
                <div class="checkbox">
                  <label>
                    
                    <input  type="checkbox"  name="modul[]" value="<?php echo $qr[0]; ?>" <?php echo check($_GET['id_jabatan'],$qr[0]); ?>>
                    <?php echo str_replace("_"," ",$qr[2]); ?>
                  </label>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>
</form>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
 <div class="modal-dialog modal-800">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="exampleModalLabel">Jabatan</h4>
    </div>
    <div class="modal-body">
      <a class="btn btn-primary" href="Tambah_Konsumen"><i class="fa fa-plus"></i> Tambah</a>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="100px">ID Jabatan</th>
              <th>Nama Jabatan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = mysqli_query($GLOBALS['db'],"SELECT * FROM Jabatan");
            while($qry = mysqli_fetch_array($query)) {
              ?> 
              <tr style="cursor:pointer" onclick='location.href="<?php echo $GLOBALS['base']; ?>app/action/actJabatan.php?act=akses&id=<?php echo $qry[0]; ?>"' data-dismiss="modal">
                <td ><?php echo $qry[0]; ?></td>     
                <td><?php echo $qry[1]; ?></td>     
              </tr> 

            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="modal-footer">
     <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
   </div>
 </div>
</div>
</div>

<script type="text/javascript">
  function getJabatan(id,nama) {
   $("#nama_jabatan").val(nama);
   $("#id_jabatan").val(id);
 }
</script>