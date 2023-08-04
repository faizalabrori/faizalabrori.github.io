<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
    <div  class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
        <form action="<?php echo $action; ?>" method="post" autocomplete="off">
        <div class="card-body">
            <?php if(validation_errors()){
                ?>
                  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?php echo validation_list_errors() ?>
                </div>
                <?php
            }
            ?>
                <?php
                if(session()->getFlashdata('errror')){
                ?>
                  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-warning"></i> Error</h5>
                  <?php echo session()->getFlashdata('error'); ?>
                </div>
                <?php
                }
                ?>
                 <?php echo csrf_field() ?>
                 <?php 
                 if(current_url(true)->getSegment(2) =='edit'){
                    ?>

                    <input type="hidden" name="param" id="param" value="<?php echo $edit_data['idjurusan']; ?>">
                    <?php
                 }
                 ?>
              
                <div class="form-group">
                    <label for="kdjurusan">Id Jurusan</label>
                    <input type="text" name="idjurusan" id="idjurusan" value="<?php echo empty(set_value('idjurusan')) ? (empty($edit_data['idjurusan']) ? "" :$edit_data['idjurusan']) : set_value('idjurusan'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama_jurusan">Nama_Jurusan</label>
                    <input type="text" name="nama_jurusan" id="nama_jurusan" value="<?php echo empty(set_value('nama_jurusan')) ? (empty($edit_data['nama_jurusan']) ? "" : $edit_data['nama_jurusan']) : set_value('nama_jurusan'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sekolah">Sekolah</label>
                    <input type="text" name="sekolah" id="sekolah" value="<?php echo empty(set_value('sekolah')) ? (empty($edit_data['sekolah']) ? "" : $edit_data['sekolah']) : set_value('sekolah'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
        </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>Simpan</button>
                </div>
              </form>
              </div>
        </div>
</div>
<?php
echo $this->endSection();