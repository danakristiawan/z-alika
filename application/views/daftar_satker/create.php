<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Daftar Satker</h1>
    </div>

    <form action="" method="post" autocomplete="off">

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">kdsatker:</label>
                    <input type="text" name="kdsatker" class="form-control <?= form_error('kdsatker') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdsatker'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nmsatker:</label>
                    <input type="text" name="nmsatker" class="form-control <?= form_error('nmsatker') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmsatker'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group mb-2">
                    <label for="">header1:</label>
                    <input type="text" name="header1" class="form-control <?= form_error('header1') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('header1'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">header2:</label>
                    <input type="text" name="header2" class="form-control <?= form_error('header2') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('header2'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="form-group mb-2">
                    <label for="">subheader1:</label>
                    <input type="text" name="subheader1" class="form-control <?= form_error('subheader1') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('subheader1'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">subheader2:</label>
                    <input type="text" name="subheader2" class="form-control <?= form_error('subheader2') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('subheader2'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">subheader3:</label>
                    <input type="text" name="subheader3" class="form-control <?= form_error('subheader3') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('subheader3'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('daftar-satker'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>