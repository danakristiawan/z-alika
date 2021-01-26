<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah SPT Pegawai</h1>
    </div>

    <form action="" method="post" autocomplete="off">

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">kdsatker:</label>
                    <input type="text" name="kdsatker" class="form-control <?= form_error('kdsatker') ? 'is-invalid' : ''; ?>" value="<?= $spt['kdsatker']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdsatker'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">tahun:</label>
                    <input type="text" name="tahun" class="form-control <?= form_error('tahun') ? 'is-invalid' : ''; ?>" value="<?= $spt['tahun']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('tahun'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nip:</label>
                    <input type="text" name="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : ''; ?>" value="<?= $spt['nip']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nip'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-2">
                    <label for="">npwp:</label>
                    <input type="text" name="npwp" class="form-control <?= form_error('npwp') ? 'is-invalid' : ''; ?>" value="<?= $spt['npwp']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('npwp'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">kdgol:</label>
                    <input type="text" name="kdgol" class="form-control <?= form_error('kdgol') ? 'is-invalid' : ''; ?>" value="<?= $spt['kdgol']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdgol'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">alamat:</label>
                    <input type="text" name="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : ''; ?>" value="<?= $spt['alamat']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('alamat'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">kdkawin:</label>
                    <input type="text" name="kdkawin" class="form-control <?= form_error('kdkawin') ? 'is-invalid' : ''; ?>" value="<?= $spt['kdkawin']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdkawin'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">kdjab:</label>
                    <input type="text" name="kdjab" class="form-control <?= form_error('kdjab') ? 'is-invalid' : ''; ?>" value="<?= $spt['kdjab']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdjab'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nourut:</label>
                    <input type="text" name="nourut" class="form-control <?= form_error('nourut') ? 'is-invalid' : ''; ?>" value="<?= $spt['nourut']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nourut'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('spt-pegawai'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>