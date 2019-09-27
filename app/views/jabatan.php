<form action="app/action/actJabatan.php" method="POST">
  <div class="box box-solid <?php echo ifsetCols($_GET['id_jabatan']); ?>">
    <a href="#"><div class="box-header  with-border" data-widget="collapse">
      <h3 class="box-title">Manage Jabatan</h3>

      <div class="box-tools pull-right" >
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> <?php echo ifsetAct($_GET['act']); ?></button>
      </div>
    </div>
  </a>
  <div class="box-body" <?php echo ifsetCol($_GET['id_jabatan']); ?>>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>ID Jabatan</label>
          <input type="text" class="form-control" name="id_jabatan" value="<?php echo ifset($_GET['id_jabatan']); ?>" readonly="">
        </div>
        <div class="form-group">
          <label>Nama Jabatan</label>
          <input type="text" class="form-control" name="nama_jabatan" value="<?php echo ifset($_GET['nama_jabatan']); ?>">
        </div>
      </div>
      <div class="col-md-6">
       <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status_jabatan">
          <option <?php echo selected($_GET['status_jabatan'],"Aktif"); ?>>Aktif</option>
          <option <?php echo selected($_GET['status_jabatan'],"Tidak Aktif"); ?>>Tidak Aktif</option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="box-footer"  <?php echo ifsetCol($_GET['id_jabatan']); ?>>
  <input  type="submit" name="<?php echo ifsetAct($_GET['act']); ?>" value="Simpan" class="btn btn-primary">
</div>
</div>
</form>
<!-- Data Table-->
<div class="box box-solid" >
  <div class="box-header">
    <h3 class="box-title">List Jabatan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="80px">ID Jabatan</th>
          <th>Nama Jabatan</th>
          <th>Status</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($GLOBALS['db'],"SELECT * FROM jabatan");
        while($qry = mysqli_fetch_array($query)) {
          ?>
          <tr>
            <td ><?php echo $qry[0]; ?></td>
            <td><?php echo $qry[1]; ?></td>
            <td><?php echo $qry[2]; ?></td>
            <td align="center">
              <a style="cursor:pointer" onclick='location.href="<?php echo $GLOBALS['base']; ?>app/action/actJabatan.php?act=hapus&id=<?php echo $qry[0]; ?>"'><i class="fa fa-trash"></i></a> 
              &nbsp|&nbsp 
              <a style="cursor:pointer" onclick='location.href="<?php echo $GLOBALS['base']; ?>app/action/actJabatan.php?act=edit&id=<?php echo $qry[0]; ?>"'><i class="fa fa-pencil"></i></a>
            </td>
          </tr> 
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>