<section class="resume-section">
    <div class="resume-section-content container">
        <h3 class="mb-5"><?php echo $title ?></h3>
        <?php echo form_open_multipart(base_url().'/perpustakaan/submit/buku') ?>
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul_buku" autocomplete="off" value="<?= $data['judul_buku']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tahun_terbit" autocomplete="off" value="<?= $data['tahun_terbit']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="stok" autocomplete="off" value="<?= $data['stok']; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
        </form>
    </div>
</section>