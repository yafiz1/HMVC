<section class="resume-section">
    <div class="resume-section-content">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="flex-grow-1 ml-5">
                <h3 class="mb-5"><?php echo $title ?></h3>
            </div>
            <div class="flex-shrink-0 mr-5">
                <a href="<?php echo site_url('perpustakaan/anggota/add') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th style="width:10%">No.</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($data as $row) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['nama_anggota'] ?></td>
                    <td><?php echo $row['jk_anggota'] ?></td>
                    <td>
                        <a href="<?=base_url();?>/perpustakaan/anggota/edit/<?= $row['id_anggota']."/".$row['nama_anggota']."/".$row['jk_anggota'] ?>">Edit</a>
                        <a href="<?=base_url();?>/perpustakaan/anggota/delete/<?= $row['id_anggota'] ?>">| Delete</a>
                    </td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-100">
            <?php echo $pager->links('bootstrap', 'bootstrap_pagination') ?>
        </div>
    </div>
</section>