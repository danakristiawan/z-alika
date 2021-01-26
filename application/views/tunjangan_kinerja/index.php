<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tunjangan Kinerja</h1>
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
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="keyword1" class="form-control" placeholder="nip">
                    <input type="text" name="keyword2" class="form-control" placeholder="tahun">
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
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Kdsatker</th>
                            <th>NIP</th>
                            <th>Grade</th>
                            <th>Tjpokok</th>
                            <th>Tjtamb</th>
                            <th>Abspotr</th>
                            <th>Abspotp</th>
                            <th>Tkpph</th>
                            <th colspan="22">Rincian Potongan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($tukin as $r) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r['bulan']; ?></td>
                                <td><?= $r['tahun']; ?></td>
                                <td><?= $r['kdsatker']; ?></td>
                                <td><?= $r['nip']; ?></td>
                                <td><?= $r['grade']; ?></td>
                                <td><?= $r['tjpokok']; ?></td>
                                <td><?= $r['tjtamb']; ?></td>
                                <td><?= $r['abspotr']; ?></td>
                                <td><?= $r['abspotp']; ?></td>
                                <td><?= $r['tkpph']; ?></td>
                                <td><?= $r['p1']; ?></td>
                                <td><?= $r['p2']; ?></td>
                                <td><?= $r['p3']; ?></td>
                                <td><?= $r['p4']; ?></td>
                                <td><?= $r['p5']; ?></td>
                                <td><?= $r['p6']; ?></td>
                                <td><?= $r['p7']; ?></td>
                                <td><?= $r['p8']; ?></td>
                                <td><?= $r['p9']; ?></td>
                                <td><?= $r['p10']; ?></td>
                                <td><?= $r['p11']; ?></td>
                                <td><?= $r['p12']; ?></td>
                                <td><?= $r['p13']; ?></td>
                                <td><?= $r['p14']; ?></td>
                                <td><?= $r['p15']; ?></td>
                                <td><?= $r['p16']; ?></td>
                                <td><?= $r['p17']; ?></td>
                                <td><?= $r['p18']; ?></td>
                                <td><?= $r['p19']; ?></td>
                                <td><?= $r['p20']; ?></td>
                                <td><?= $r['p21']; ?></td>
                                <td><?= $r['p22']; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('tunjangan-kinerja/delete/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">Hapus</a>
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