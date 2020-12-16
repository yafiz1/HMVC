<section class="resume-section">
    <div class="resume-section-content">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="flex-grow-1">
                <h3 class="mb-5"><?php echo $title ?></h3>
            </div>
            <div class="flex-shrink-0">
                <a href="<?php echo site_url('mahasiswa/add') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th style="width:10%">No.</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($mhs as $row) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['nim'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['jenis_kelamin'] ?></td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
        <?php //echo $pager->links() ?>
        <?php echo $pager->links('bootstrap', 'bootstrap_pagination') ?>
    </div>
</section>