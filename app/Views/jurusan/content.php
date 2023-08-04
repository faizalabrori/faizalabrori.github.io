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
          

                <a class="btn btn-sm btn-primary "href="<?php echo base_url();?>/jurusan/tambah"><i class="fa-solid fa-plus"></i>Tambah Jurusan</a>
              <table class="table">
        
                  <thead>
                    <tr>
                      <th>    </th>
                      <th style="width: 10px">No</th>
                      <th>Id Jurusan</th>
                      <th>Nama Jurusan</th>
                      <th>sekolah</th>
                      <th>Aksi</th>  
                    </tr>
                  </thead>
                <tbody>
                    <?php
                    $no=1;
                        foreach ($data_jurusan as $r) {
                        ?>
                        <tr>
                          <td></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['idjurusan']; ?></td>
                            <td><?php echo $r['nama_jurusan']; ?></td>
                            <td><?php echo $r['sekolah']; ?></td>
                            <td>
                              <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/jurusan/edit/<?php echo $r['idjurusan']; ?>"><i class="fa-solid fa-edit"></i></a>
                              <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['idjurusan']; ?>);"><i class="fa-solid fa-trash"></i></a>
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
                     window.location.href = '<?php echo base_url();?>/jurusan/hapus/' + id;
                    }
                  })
                }
            </script>
<?php
echo $this->endSection();