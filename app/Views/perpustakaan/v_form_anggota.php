<section class="resume-section">
    <div class="resume-section-content container">
        <h3 class="mb-5"><?php echo $title ?></h3>
        <?php echo form_open_multipart(base_url().'/perpustakaan/submit/anggota') ?>
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Anggota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_anggota" autocomplete="off" value="<?= $data['nama_anggota']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                <div class="col-md-10 form-inline">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jk" value="Laki-Laki" <?= ($data['jk'] == 'laki-laki') ? 'checked' : ''; ?>>Laki-Laki
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jk" value="Perempuan" <?= ($data['jk'] == 'perempuan') ? 'checked' : ''; ?>>Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
        </form>
    </div>
</section>