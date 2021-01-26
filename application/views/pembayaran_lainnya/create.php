<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Pembayaran Lainnya</h1>
    </div>

    <form action="" method="post" autocomplete="off">

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">bulan:</label>
                    <input type="text" name="bulan" class="form-control <?= form_error('bulan') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('bulan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">tahun:</label>
                    <input type="text" name="tahun" class="form-control <?= form_error('tahun') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('tahun'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">kdsatker:</label>
                    <input type="text" name="kdsatker" class="form-control <?= form_error('kdsatker') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdsatker'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">nip:</label>
                    <input type="text" name="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nip'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">bruto:</label>
                    <input type="text" name="bruto" class="form-control <?= form_error('bruto') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('bruto'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">pph:</label>
                    <input type="text" name="pph" class="form-control <?= form_error('pph') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('pph'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">netto:</label>
                    <input type="text" name="netto" class="form-control <?= form_error('netto') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('netto'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">jenis:</label>
                    <input type="text" name="jenis" class="form-control <?= form_error('jenis') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('jenis'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nospm:</label>
                    <input type="text" name="nospm" class="form-control <?= form_error('nospm') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nospm'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">uraian:</label>
                    <input type="text" name="uraian" class="form-control <?= form_error('uraian') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('uraian'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">tanggal:</label>
                    <input type="text" name="tanggal" class="form-control <?= form_error('tanggal') ? 'is-invalid' : ''; ?>" placeholder="dd-mm-yyyy">
                    <div class="invalid-feedback">
                        <?= form_error('tanggal'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('pembayaran-lainnya'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>