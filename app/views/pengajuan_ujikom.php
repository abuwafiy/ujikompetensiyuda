  <div class="stepwizard">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Data Asesi</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Daftar Unit Kompetensi </p>
      </div>

      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Upload Dokumen </p>
      </div>
    </div>
  </div>

  <form action="app/action/actKonsumen.php" method="POST" enctype="multipart/form-data">
    <div class="setup-content" id="step-1">
      <div class="box box-solid" >
        <div class="box-header">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right" >
            <button type="button" class="btn btn-box-tool" data-widget=""><i class="fa fa-plus"></i> <?php echo ifsetAct($_GET['act']); ?></button>
          </div>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="hidden" class="form-control" name="id_konsumen" >
                <input  type="text" class="form-control" name="nama_konsumen"  value="<?php echo ifset($_GET['nama_konsumen']); ?>" / >
              </div>
              <div class="form-group">
                <label> Tempat Lahir</label>
                <input type="text" class="form-control" name="no_ktp" value="<?php echo ifset($_GET['no_ktp']); ?>" req>
              </div>
              <div class="form-group">
                <label> Tanggal Lahir</label>
                <input type="date" class="form-control" name="no_ktp" value="<?php echo ifset($_GET['no_ktp']); ?>" req>
              </div>
              <div class="form-group">
                <label for="sel1">Jenis Kelamin:</label>
                <select class="form-control" id="sel1">
                  <option>--- Pilih Jenis Kelamin---</option>
                  <option>Laki - Laki</option>
                  <option>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sel1">Kebangsaan:</label>
                <select class="form-control" id="sel1">
                  <option>--- Pilih Kebangsaan---</option>
                  <option>WNI</option>
                  <option>WNA</option>
                </select>
              </div>
              <div class="form-group">
                <label>Alamat Rumah</label>
                <textarea class="form-control" name="alamat_kantor" req><?php echo ifset($_GET['alamat_kantor']); ?></textarea>
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="form-control" name="telepon_pribadi" value="<?php echo ifset($_GET['telepon_pribadi']); ?>" req>
              </div>
              <div class="form-group">
                <label>Nama Institusi</label>
                <input type="text" class="form-control" name="pekerjaan" value="<?php echo ifset($_GET['pekerjaan']); ?>" req>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Jurusan</label>
                <input type="text" class="form-control" name="nama_kantor" value="<?php echo ifset($_GET['nama_kantor']); ?>" req>
              </div>
              <div class="form-group">
                <label>Tahun Lulus</label>
                <input type="text" class="form-control" name="nama_kantor" value="<?php echo ifset($_GET['nama_kantor']); ?>" req>
              </div>
              <div class="form-group">
                <label>Nama Instasi Sekarang</label>
                <input type="text" class="form-control" name="telepon_kantor" value="<?php echo ifset($_GET['telepon_kantor']); ?>" req>
              </div>
              <div class="form-group">
                <label>Alamat Sakarang</label>
                <textarea class="form-control" name="alamat_kantor" req><?php echo ifset($_GET['alamat_kantor']); ?></textarea>
              </div>
               <div class="form-group">
                <label for="sel1">Skema Sertifikasi:</label>
                <select class="form-control" id="sel1">
                  <option>--- Pilih Skema---</option>
                  <option>Unit</option>
                  <option>Klaster</option>
                   <option>Okupasi</option>
                  <option>KKNI</option>
                </select>
              </div>
                  <div class="form-group">
                <label for="sel1">Acuan Pembanding:</label>
                <select class="form-control" id="sel1">
                  <option>--- Pilih Pemabanding---</option>
                  <option>Standar Kompetensi</option>
                  <option>Standar Produk</option>
                   <option>Standar Sistem</option>
                  <option>Regulasi Teknis</option>
                  <option>SOP</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">

          <button class="btn btn-primary nextBtn pull-right" type="button" >Berikutnya</button>
        </div>
      </div>
    </div>

    <div class="setup-content" id="step-2">
      <div class="box box-solid" >
        <div class="box-header">
          <h3 class="box-title">Daftar Unit Kompetensi</h3>
          <div class="box-tools pull-right" >
            <button type="button" class="btn btn-box-tool" data-widget=""><i class="fa fa-plus"></i> <?php echo ifsetAct($_GET['act']); ?></button>
          </div>
        </div>
        <div class="box-body" >
              <div class="form-group">
                <label>Pemesan</label>
                <div class="input-group">
                  <input type="text" class="form-control pull-right" id="nama_pemesan" required data-readonly>
                  <input type="hidden" class="form-control pull-right" name="id_konsumen" id="id_pemesanan" required value="<?php echo ifset($_GET['id_konsumen']); ?>">
                  <div class="input-group-addon">
                    <a href="#" type="button" class="pull-right" data-toggle="modal" data-target="#modal1" ><i class="fa fa-user"></i> Pilih</a>
                  </div>
                </div>
              </div>
          <div id="entry" ></div>
          <div class="row">
            <div class="col-xs-3">
              <button style="margin-bottom: 15px;" class="btn btn-primary" type="button" id="addBtn"><i class="fa fa-plus"></i> Tambah Dokumen</button>
            </div>
          </div>
          
          <div class="box-footer">
            <br>
            <input type="submit" name="<?php echo ifsetAct($_GET['act']); ?>" value="Simpan" class="btn btn-primary pull-right">
          </div>
        </div>
        <div class="box-footer">
          <button class="btn btn-primary nextBtn pull-right" type="button" >Berikutnya</button>
        </div>
      </div>

    </div>

    <div class="setup-content" id="step-3">
      <div class="box box-solid" >
        <div class="box-header">
          <h3 class="box-title">Upload Dokumen</h3>

          <div class="box-tools pull-right" >
            <button type="button" class="btn btn-box-tool" data-widget=""><i class="fa fa-plus"></i> <?php echo ifsetAct($_GET['act']); ?></button>
          </div>
        </div>
        <div class="box-body" >

          <div class="row" style="margin-bottom: 15px;">
            <div class="col-xs-5">
              <input type="text" class="form-control" name="nama_dokumen[]" placeholder="Keterangan">
            </div>
            <div class="col-xs-5">
              <input type="file" class="form-control" name="dokumen[]" placeholder="Dokumen" multiple/>
            </div>
            <div class="col-xs-2"> 
            </div>
          </div>
          <div id="entry" ></div>
          <div class="row">
            <div class="col-xs-3">
              <button style="margin-bottom: 15px;" class="btn btn-primary" type="button" id="addBtn"><i class="fa fa-plus"></i> Tambah Dokumen</button>
            </div>
          </div>
          
          <div class="box-footer">
            <br>
            <input type="submit" name="<?php echo ifsetAct($_GET['act']); ?>" value="Simpan" class="btn btn-primary pull-right">

          </div>
        </div>

         <div class="box-footer">
          <a onclick="parent.history.back();" class="btn btn-sm btn-info">back</a>
        </div>

      </div>
    </div>
    </form>

    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
 <div class="modal-dialog modal-800">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="exampleModalLabel">Pilih Konsumen</h4>
    </div>
    <div class="modal-body">
      <a class="btn btn-primary" href="Tambah_Konsumen"><i class="fa fa-plus"></i> Tambah</a>
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="100px">ID Konsumen</th>
              <th>Nama Konsumen</th>
              <th>No. KTP</th>
              <th>Alamat</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($_SESSION['jabatan'] == 'Sales'){
              $query = mysqli_query($GLOBALS['db'],"SELECT a.* FROM Konsumen a join karyawan b on a.nik=b.nik where b.id_jabatan = 4 AND a.nik='$_SESSION[nik]'");
            }else{
              $query = mysqli_query($GLOBALS['db'],"SELECT * FROM Konsumen");
            }
            while($qry = mysqli_fetch_array($query)) {
              ?> 
              <tr style="cursor: pointer;" onclick="getKonsumen('<?php echo $qry[0]; ?>','<?php echo $qry[1]; ?>','<?php echo $qry[3]; ?>','<?php echo $qry[6]; ?>','<?php echo $qry[4]; ?>','<?php echo $qry[2]; ?>')" data-dismiss="modal">
                <td ><?php echo $qry[0]; ?></td>     
                <td><?php echo $qry[1]; ?></td>     
                <td><?php echo $qry[2]; ?></td>
                <td><?php echo $qry[3]; ?></td>
                <td><?php echo $qry[4]; ?></td>
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



    