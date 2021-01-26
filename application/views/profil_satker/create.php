<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Profil Satker</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <div class="row">
            <div class="col-lg-3">
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
                <div class="form-group mb-2">
                    <label for="">no_skp:</label>
                    <input type="text" name="no_skp" class="form-control <?= form_error('no_skp') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('no_skp'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nama_ttd_skp:</label>
                    <input type="text" name="nama_ttd_skp" class="form-control <?= form_error('nama_ttd_skp') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nama_ttd_skp'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">nip_ttd_skp:</label>
                    <input type="text" name="nip_ttd_skp" class="form-control <?= form_error('nip_ttd_skp') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nip_ttd_skp'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">jab_ttd_skp:</label>
                    <input type="text" name="jab_ttd_skp" class="form-control <?= form_error('jab_ttd_skp') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('jab_ttd_skp'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nama_ttd_kp4:</label>
                    <input type="text" name="nama_ttd_kp4" class="form-control <?= form_error('nama_ttd_kp4') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nama_ttd_kp4'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nip_ttd_kp4:</label>
                    <input type="text" name="nip_ttd_kp4" class="form-control <?= form_error('nip_ttd_kp4') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nip_ttd_kp4'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">jab_ttd_kp4:</label>
                    <input type="text" name="jab_ttd_kp4" class="form-control <?= form_error('jab_ttd_kp4') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('jab_ttd_kp4'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">npwp_bendahara:</label>
                    <input type="text" name="npwp_bendahara" class="form-control <?= form_error('npwp_bendahara') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('npwp_bendahara'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nama_bendahara:</label>
                    <input type="text" name="nama_bendahara" class="form-control <?= form_error('nama_bendahara') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nama_bendahara'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">nip_bendahara:</label>
                    <input type="text" name="nip_bendahara" class="form-control <?= form_error('nip_bendahara') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nip_bendahara'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">tgl_spt:</label>
                    <input type="text" name="tgl_spt" class="form-control <?= form_error('tgl_spt') ? 'is-invalid' : ''; ?>" placeholder="dd-mm-yyyy">
                    <div class="invalid-feedback">
                        <?= form_error('tgl_spt'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">file:</label>
                    <input type="text" name="file" class="form-control <?= form_error('file') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('file'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('profil-satker'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>