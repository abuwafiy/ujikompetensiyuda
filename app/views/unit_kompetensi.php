<!-- Data Table-->
<div class="box box-solid" >
  <div class="box-header">
    <h3 class="box-title">
      <a class="btn btn-primary" href="Tambah_Unit"><i class="fa fa-plus"></i> Tambah</a>
    </h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th width="100px">ID Unit</th>
          <th>Judul Unit</th>
          <th>Deskripsi UNit</th>
          <th width="100px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $query = mysqli_query($GLOBALS['db'],"SELECT * FROM unit_kompetensi");
        while($qry = mysqli_fetch_array($query)) {
          ?>
          <tr>
            <td ><?php echo $qry[0]; ?></td>     
            <td><?php echo $qry[1]; ?></td>     
            <td><?php echo $qry[2]; ?></td>
            <td align="center">
              <a style="cursor:pointer" onclick='location.href="<?php echo $GLOBALS['base']; ?>app/action/actKonsumen.php?act=hapus&id=<?php echo $qry[0]; ?>"'><i class="fa fa-trash"></i></a> 
              &nbsp|&nbsp 
              <a style="cursor:pointer" onclick='location.href="<?php echo $GLOBALS['base']; ?>app/action/actKonsumen.php?act=edit&id=<?php echo $qry[0]; ?>"'><i class="fa fa-pencil"></i></a>
              &nbsp|&nbsp 
              <a style="cursor:pointer"  onclick='location.href="<?php echo $GLOBALS['base']; ?>app/action/actUnitKompetensi.php?act=detail&id=<?php echo $qry[0]; ?>"'><i class="fa fa-files-o"></i></a>
            </td>
          </tr> 
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>