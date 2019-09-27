  <div class="stepwizard">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>Data Unit</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>Persyaratan Unit</p>
      </div>
    </div>
  </div>

  <form action="app/action/actUnitKompetensi.php" method="POST" enctype="multipart/form-data">
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
                <label>ID Unit</label>
                <input type="text" class="form-control" name="id_unit" value="<?php echo ifsetK($_GET['id_unit']); ?>" readonly="">
              </div>
              <div class="form-group">
                <label>Judul Unit</label>
                <input type="text" class="form-control" name="judul_unit" value="<?php echo ifset($_GET['judul_unit']); ?>" req>
              </div>
              <div class="form-group">
                <label>Deskripsi Unit</label>
                <input type="text" class="form-control" name="deskripsi_unit" value="<?php echo ifset($_GET['deskripsi_unit']); ?>" req>
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
          <h3 class="box-title">Persyaratan Unit</h3>

          <div class="box-tools pull-right" >
            <button type="button" class="btn btn-box-tool" data-widget=""><i class="fa fa-plus"></i> <?php echo ifsetAct($_GET['act']); ?></button>
          </div>
        </div>
        <div class="box-body" >

          <div class="row" style="margin-bottom: 15px;">
            <div class="col-xs-5">
              <input type="text" class="form-control" name="nama_persyaratan[]" placeholder="Persyaratan">
            </div>
          </div>
          <div id="entry" ></div>
          <div class="row">
            <div class="col-xs-3">
              <button style="margin-bottom: 15px;" class="btn btn-primary" type="button" id="addBtn"><i class="fa fa-plus"></i> Tambah Persyaratan</button>
            </div>
          </div>
          
          <div class="box-footer">
            <br>
            <input type="submit" name="<?php echo ifsetAct($_GET['act']); ?>" value="Simpan" class="btn btn-primary pull-right">
          </div>
        </div>
      </div>
    </form>