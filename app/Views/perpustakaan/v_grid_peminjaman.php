<section class="resume-section">
    <div class="resume-section-content">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <div class="flex-grow-1 ml-5">
                <h3 class="mb-5"><?php echo $title ?></h3>
            </div>
            <div class="flex-shrink-0 mr-5">
                <a href="<?php echo site_url('perpustakaan/peminjaman/add') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th style="width:10%">No.</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Judul Buku</th>
                    <th>Nama Petugas</th>
                    <th>Nama Anggota</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($data as $row) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['tgl_pinjam'] ?></td>
                    <td><?php echo $row['tgl_kembali'] ?></td>
                    <td><?php echo $row['judul_buku'] ?></td>
                    <td><?php echo $row['nama_petugas'] ?></td>
                    <td><?php echo $row['nama_anggota'] ?></td>
                    <td>
                        <a href="<?= base_url()?>/perpustakaan/peminjaman/edit/<?= $row['id_peminjaman']."/".$row['tgl_pinjam']."/".$row['tgl_kembali']."/".$row['id_buku']."/".$row['id_petugas']."/".$row['id_anggota'] ?>">Edit</a>
                        <a href="<?= base_url(); ?>/perpustakaan/peminjaman/delete/<?= $row['id_peminjaman'] ?>">| Hapus</a>
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