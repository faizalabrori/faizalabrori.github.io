<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="container">
  <div class="row">
    <div class="col">
      <table class="table">
        <h1 class="mt-2">Siswa Tahun ini</h1>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Id siswa</th>
            <th scope="col">semester</th>
            <th scope="col">nisn</th>
            <th scope="col">Aksi</th>
          </tr>
          <tbody>
          <?php
             $no=1;
             foreach ($data_siswa as $r) {
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['idsiswa']; ?></td>
                <td><?php echo $r['semester']; ?></td>
                <td><?php echo $r['nisn']; ?></td>
              <td>
                              <a class="btn btn-xs btn-info" href=""><i class="fa-solid fa-edit"></i></a>
                              <a class="btn btn-xs btn-danger" href="#" ><i class="fa-solid fa-trash"></i></a>
                            </td>              </td>
            </tr>
            <?php
             $no++;
            }
            ?>

            
          </tbody>
        </thead>
      </table>
    </div>
  </div>
</div>
<?php
echo $this->endSection();
