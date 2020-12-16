<section class="resume-section">
    <div class="resume-section-content">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="flex-grow-1 ml-5">
                <h3 class="mb-5"><?php echo $title ?></h3>
            </div>
            <div class="flex-shrink-0 mr-5">
                <a href="<?php echo site_url('perpustakaan/buku/add') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th style="width:10%">No.</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($data as $row) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['judul_buku'] ?></td>
                    <td><?php echo $row['tahun_terbit'] ?></td>
                    <td><?php echo $row['stok'] ?></td>
                    <td>
                        <a href="<?= base_url() ?>/perpustakaan/buku/edit/<?= $row['id_buku']."/".$row['judul_buku']."/".$row['tahun_terbit']."/".$row['stok'] ?>">Edit</a>
                        <a href="<?= base_url() ?>/perpustakaan/buku/delete/<?= $row['id_buku'] ?>">| Delete</a>
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