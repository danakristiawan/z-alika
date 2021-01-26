<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Tarif Pajak</h1>
    </div>

    <form action="" method="post" autocomplete="off">

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">tahun:</label>
                    <input type="text" name="tahun" class="form-control <?= form_error('tahun') ? 'is-invalid' : ''; ?>" value="<?= $tarif['tahun']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('tahun'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">ptkp_wp:</label>
                    <input type="text" name="ptkp_wp" class="form-control <?= form_error('ptkp_wp') ? 'is-invalid' : ''; ?>" value="<?= $tarif['ptkp_wp']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('ptkp_wp'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">ptkp_istri:</label>
                    <input type="text" name="ptkp_istri" class="form-control <?= form_error('ptkp_istri') ? 'is-invalid' : ''; ?>" value="<?= $tarif['ptkp_istri']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('ptkp_istri'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">ptkp_anak:</label>
                    <input type="text" name="ptkp_anak" class="form-control <?= form_error('ptkp_anak') ? 'is-invalid' : ''; ?>" value="<?= $tarif['ptkp_anak']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('ptkp_anak'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">iuran_pensiun:</label>
                    <input type="text" name="iuran_pensiun" class="form-control <?= form_error('iuran_pensiun') ? 'is-invalid' : ''; ?>" value="<?= $tarif['iuran_pensiun']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('iuran_pensiun'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">biaya_jabatan:</label>
                    <input type="text" name="biaya_jabatan" class="form-control <?= form_error('biaya_jabatan') ? 'is-invalid' : ''; ?>" value="<?= $tarif['biaya_jabatan']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('biaya_jabatan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">biaya_jabatan_maks:</label>
                    <input type="text" name="biaya_jabatan_maks" class="form-control <?= form_error('biaya_jabatan_maks') ? 'is-invalid' : ''; ?>" value="<?= $tarif['biaya_jabatan_maks']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('biaya_jabatan_maks'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">pph_tarif_1:</label>
                    <input type="text" name="pph_tarif_1" class="form-control <?= form_error('pph_tarif_1') ? 'is-invalid' : ''; ?>" value="<?= $tarif['pph_tarif_1']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('pph_tarif_1'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">pph_tarif_2:</label>
                    <input type="text" name="pph_tarif_2" class="form-control <?= form_error('pph_tarif_2') ? 'is-invalid' : ''; ?>" value="<?= $tarif['pph_tarif_2']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('pph_tarif_2'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">pph_tarif_3:</label>
                    <input type="text" name="pph_tarif_3" class="form-control <?= form_error('pph_tarif_3') ? 'is-invalid' : ''; ?>" value="<?= $tarif['pph_tarif_3']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('pph_tarif_3'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">pph_tarif_4:</label>
                    <input type="text" name="pph_tarif_4" class="form-control <?= form_error('pph_tarif_4') ? 'is-invalid' : ''; ?>" value="<?= $tarif['pph_tarif_4']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('pph_tarif_4'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">pph_limit_1:</label>
                    <input type="text" name="pph_limit_1" class="form-control <?= form_error('pph_limit_1') ? 'is-invalid' : ''; ?>" value="<?= $tarif['pph_limit_1']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('pph_limit_1'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">pph_limit_2:</label>
                    <input type="text" name="pph_limit_2" class="form-control <?= form_error('pph_limit_2') ? 'is-invalid' : ''; ?>" value="<?= $tarif['pph_limit_2']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('pph_limit_2'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">pph_limit_3:</label>
                    <input type="text" name="pph_limit_3" class="form-control <?= form_error('pph_limit_3') ? 'is-invalid' : ''; ?>" value="<?= $tarif['pph_limit_3']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('pph_limit_3'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('tarif-pajak'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>