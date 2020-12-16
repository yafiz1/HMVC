<section class="resume-section">
    <div class="resume-section-content container">
        <h3 class="mb-5"><?php echo $title ?></h3>
        <?php echo form_open_multipart(base_url().'/perpustakaan/submit/peminjaman') ?>
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_pinjam" autocomplete="off" value="<?= $data['tanggal_pinjam'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Kembali</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tanggal_kembali" autocomplete="off" value="<?= $data['tanggal_kembali'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_buku">
                    <?php foreach ($buku as $row): ?>
                        <option value="<?=$row->id_buku; ?>" <?= ($row->id_buku == $data['id_buku']) ? "selected" : "" ?>><?=$row->judul_buku; ?></option>
                    <?php endforeach; ?>
                </select>    
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Petugas</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_petugas">
                    <?php foreach ($petugas as $row): ?>
                        <option value="<?=$row->id_petugas; ?>"  <?= ($row->id_petugas == $data['id_petugas']) ? "selected" : "" ?>><?=$row->nama_petugas; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Anggota</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_anggota">
                    <?php foreach ($anggota as $row): ?>
                        <option value="<?=$row->id_anggota; ?>"  <?= ($row->id_anggota == $data['id_anggota']) ? "selected" : "" ?>><?=$row->nama_anggota; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
        </form>
    </div>
</section>