<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Referensi Jabatan</h1>
    </div>

    <form action="" method="post" autocomplete="off">

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group mb-2">
                    <label for="">kdgol:</label>
                    <input type="text" name="kdgol" class="form-control <?= form_error('kdgol') ? 'is-invalid' : ''; ?>" value="<?= $pangkat['kdgol']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdgol'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nmgol:</label>
                    <input type="text" name="nmgol" class="form-control <?= form_error('nmgol') ? 'is-invalid' : ''; ?>" value="<?= $pangkat['nmgol']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmgol'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">kdgapok:</label>
                    <input type="text" name="kdgapok" class="form-control <?= form_error('kdgapok') ? 'is-invalid' : ''; ?>" value="<?= $pangkat['kdgapok']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdgapok'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nama:</label>
                    <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>" value="<?= $pangkat['nama']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nama'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('referensi-pangkat'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>