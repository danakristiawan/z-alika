<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Impor Data Excel</h1>
    </div>

    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="row mt-4 mb-3">
            <div class="col-lg-6">
                <select class="form-select form-select-sm" name="kdsatker">
                    <option selected>Pilih Satker:</option>
                    <?php foreach ($satker as $r) : ?>
                        <option value="<?= $r['kdsatker']; ?>"><?= $r['nmsatker']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-2">
                <input type="text" class="form-control form-control-sm" placeholder="bulan" name="bulan">
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control form-control-sm" placeholder="tahun" name="tahun">
            </div>
            <div class="col-lg-2">
                <input type="text" class="form-control form-control-sm" placeholder="jenis" name="jenis">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-6">
                <input type="text" class="form-control form-control-sm" placeholder="uraian" name="uraian">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-2">
                <input type="text" class="form-control form-control-sm" placeholder="dd-mm-yyyy" name="tanggal">
            </div>
            <div class="col-lg-1">
                <input type="text" class="form-control form-control-sm" placeholder="nospm" name="nospm">
            </div>
            <div class="col-lg-3">
                <input type="file" class="form-control form-control-sm" placeholder="file" name="berkas_excel">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('payment'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>