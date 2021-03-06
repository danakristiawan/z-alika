<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tarif Pajak</h1>
    </div>
    <div class="row">
        <div class="col">
            <?php if ($this->session->flashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> <?= $this->session->flashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
            <a href="<?= base_url('tarif-pajak/create'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1"> Tambah Data</a>
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="tahun">
                    <button class="btn btn-sm btn-outline-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tahun</th>
                            <th>Ptkp_wp</th>
                            <th>Ptkp_istri</th>
                            <th>Ptkp_anak</th>
                            <th>Iuran_pensiun</th>
                            <th>Biaya_jabatan</th>
                            <th>Bjab_maks</th>
                            <th>Pph_tarif_1</th>
                            <th>Pph_tarif_2</th>
                            <th>Pph_tarif_3</th>
                            <th>Pph_tarif_4</th>
                            <th>Pph_limit_1</th>
                            <th>Pph_limit_2</th>
                            <th>Pph_limit_3</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($ref_spt_tahunan as $r) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r['tahun']; ?></td>
                                <td><?= $r['ptkp_wp']; ?></td>
                                <td><?= $r['ptkp_istri']; ?></td>
                                <td><?= $r['ptkp_anak']; ?></td>
                                <td><?= $r['iuran_pensiun']; ?></td>
                                <td><?= $r['biaya_jabatan']; ?></td>
                                <td><?= $r['biaya_jabatan_maks']; ?></td>
                                <td><?= $r['pph_tarif_1']; ?></td>
                                <td><?= $r['pph_tarif_2']; ?></td>
                                <td><?= $r['pph_tarif_3']; ?></td>
                                <td><?= $r['pph_tarif_4']; ?></td>
                                <td><?= $r['pph_limit_1']; ?></td>
                                <td><?= $r['pph_limit_2']; ?></td>
                                <td><?= $r['pph_limit_3']; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('tarif-pajak/update/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Ubah</a>
                                        <a href="<?= base_url('tarif-pajak/delete/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $keyword == null ? $pagination : ''; ?>
        </div>
    </div>
</main>