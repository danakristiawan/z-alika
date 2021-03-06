<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Referensi Jabatan</h1>
    </div>

    <form action="" method="post" autocomplete="off">

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group mb-2">
                    <label for="">kode:</label>
                    <input type="text" name="kode" class="form-control <?= form_error('kode') ? 'is-invalid' : ''; ?>" value="<?= $jabatan['kode']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kode'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nama:</label>
                    <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" value="<?= $jabatan['nama']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nama'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('referensi-jabatan'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>