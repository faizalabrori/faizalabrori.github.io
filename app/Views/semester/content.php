<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body">

                <?php
                if(session()->getFlashdata('success')){
                ?>
                  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Success!</h5>
                  <?php echo session()->getFlashdata('success'); ?>
                </div>
                <?php
                }
                ?>
          

                <a class="btn btn-sm btn-primary "href="<?php echo base_url();?>/semester/tambah"><i class="fa-solid fa-plus"></i>Tambah Semester</a>
              <table class="table">
        
                  <thead>
                    <tr>
                      <th>    </th>
                      <th style="width: 10px">No</th>
                      <th>Id Semester</th>
                      <th>Semester</th>
                      <th>Kelas</th>
                      <th>Aksi</th>  
                    </tr>
                  </thead>
                <tbody>
                    <?php
                    $no=1;
                        foreach ($data_semester as $r) {
                        ?>
                        <tr>
                          <td></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['idsemester']; ?></td>
                            <td><?php echo $r['semester']; ?></td>
                            <td><?php echo $r['kelas']; ?></td>
                            <td>
                              <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/semester/edit/<?php echo $r['idsemester']; ?>"><i class="fa-solid fa-edit"></i></a>
                              <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['idsemester']; ?>);"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                    ?>
                </tbody>
                </table>
                 </div>
               </div>
              </div>
            </div>
            <script>
              function hapusConfig(id) {
              Swal.fire({
                    title: 'Anda yakin akan menghapus data ini?',
                    text: "Data akan dihapus secara permanen",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus'
                  }).then((result) => {
                    if (result.isConfirmed) {
                     window.location.href = '<?php echo base_url();?>/semester/hapus/' + id;
                    }
                  })
                }
            </script>
            
          </tbody>
        </thead>
      </table>
    </div>
  </div>
</div>
<?php
echo $this->endSection();