<form action="app/action/actKaryawan.php" method="POST">
  <div class="box box-solid <?php echo ifsetCols($_GET['nik']); ?>">
    <a href="#"><div class="box-header  with-border" data-widget="collapse">
      <h3 class="box-title">Manage Karyawan</h3>

      <div class="box-tools pull-right" >
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> <?php echo ifsetAct($_GET['act']); ?></button>
      </div>
    </div>
  </a>
  <div class="box-body" <?php echo ifsetCol($_GET['nik']); ?>>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>NIK</label>
          <input type="text" class="form-control" name="nik" value="<?php echo ifset($_GET['nik']); ?>" required>
        </div>
        <div class="form-group">
          <label>Nama Karyawan</label>
          <input type="text" class="form-control" name="nama_karyawan" value="<?php echo ifset($_GET['nama_karyawan']); ?>" required>
        </div>
        <div class="form-group">
          <label>Jabatan</label>
          <select class="form-control" name="id_jabatan">
            <?php
            $sql = mysqli_query ($GLOBALS['db'],"select id_jabatan,nama_jabatan from jabatan");
            while($qry = mysqli_fetch_array($sql)){
              ?>
              <option value="<?php echo $qry[0];?>" <?php echo selected($_GET['nik'],$qry[0]); ?> ><?php echo $qry[1]; ?></option>
            <?php } ?>
          </select>
        </div>         
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat_karyawan" class="form-control"><?php echo ifset($_GET['alamat_karyawan']); ?></textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Telepon</label>
          <input type="text" class="form-control" name="telepon_karyawan" value="<?php echo ifset($_GET['telepon_karyawan']); ?>" required>
        </div>
        <div class="form-group">
          <label>PIN</label>
          <input type="text" class="form-control" name="pin" value="<?php echo ifset($_GET['pin']); ?>" required>
        </div>
        <div class="form-group">
          <label>Status Karyawan</label>
          <select class="form-control" name="status_karyawan">
            <option <?php echo selected($_GET['status_jabatan'],"Aktif"); ?>>Aktif</option>
            <option <?php echo selected($_GET['status_jabatan'],"Tidak Aktif"); ?>>Tidak Aktif</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="box-footer"  <?php echo ifsetCol($_GET['nik']); ?>>
    <input type="submit" name="<?php echo ifsetAct($_GET['act']); ?>" value="Simpan" class="btn btn-primary">
  </div>
</div>
</form>
<!-- Data Table-->
<div class="box box-solid" >
  <div class="box-header">
    <h3 class="box-title">List Karyawan</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="80px">NIK</th>
          <th>Nama Karyawan</th>
          <th>Jabatan</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>PIN</th>
          <th>Status</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($GLOBALS['db'],"SELECT * FROM Karyawan");
        while($qry = mysqli_fetch_array($query)) {
          ?>
          <tr>
            <td ><?php echo $qry[0]; ?></td>              
            <td><?php echo $qry[2]; ?></td>
            <td><?php echo get('jabatan','nama_jabatan','id_jabatan',$qry[1]); ?></td>
            <td><?php echo $qry[3]; ?></td>
            <td><?php echo $qry[4]; ?></td>
            <td><?php echo $qry[5]; ?></td>
            <td><?php echo $qry[6]; ?></td>
            <td align="center">
              <a style="cursor:pointer" onclick='location.href="<?php echo $GLOBALS['base']; ?>app/action/actKaryawan.php?act=hapus&id=<?php echo $qry[0]; ?>"'><i class="fa fa-trash"></i></a> 
              &nbsp|&nbsp 
              <a style="cursor:pointer" onclick='location.href="<?php echo $GLOBALS['base']; ?>app/action/actKaryawan.php?act=edit&id=<?php echo $qry[0]; ?>"'><i class="fa fa-pencil"></i></a>
            </td>
          </tr> 
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>