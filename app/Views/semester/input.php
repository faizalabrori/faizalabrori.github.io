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

                    <input type="hidden" name="param" id="param" value="<?php echo $edit_data['idsemester']; ?>">
                    <?php
                 }
                 ?>
              
                <div class="form-group">
                    <label for="idsemester">Id Semester</label>
                    <input type="text" name="idsemester" id="idsemester" value="<?php echo empty(set_value('idsemester')) ? (empty($edit_data['idsemester']) ? "" :$edit_data['idsemester']) : set_value('idsemester'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="text" name="semester" id="semester" value="<?php echo empty(set_value('semester')) ? (empty($edit_data['semester']) ? "" : $edit_data['semester']) : set_value('semester'); ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" value="<?php echo empty(set_value('kelas')) ? (empty($edit_data['kelas']) ? "" : $edit_data['kelas']) : set_value('kelas'); ?>" class="form-control">
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