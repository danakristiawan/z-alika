<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail</h1>
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
        <div class="col-lg-8">
        </div>
        <div class="col-lg-4">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control">
                    <button class="btn btn-sm btn-outline-secondary" type="submit">Cari</button>
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
                            <th>Kdsatker</th>
                            <th>Tahun</th>
                            <th>NIP</th>
                            <th>NPWP</th>
                            <th>Kdgol</th>
                            <th>Alamat</th>
                            <th>Kdkawin</th>
                            <th>Kdjab</th>
                            <th>Nourut</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($spt as $r) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r['kdsatker']; ?></td>
                                <td><?= $r['tahun']; ?></td>
                                <td><?= $r['nip']; ?></td>
                                <td><?= $r['npwp']; ?></td>
                                <td><?= $r['kdgol']; ?></td>
                                <td><?= $r['alamat']; ?></td>
                                <td><?= $r['kdkawin']; ?></td>
                                <td><?= $r['kdjab']; ?></td>
                                <td><?= $r['nourut']; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <?php if ($r['sts'] == null) : ?>
                                            <a href="<?= base_url('spt/upload-detail/') . $r['nip'] . '/' . $r['tahun'] . '/' . $r['kdsatker']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan mengupload data ini?');">Upload</a>
                                        <?php endif; ?>
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
        <div class="col">
            <?= $keyword == null ? $pagination : ''; ?>
        </div>
    </div>
</main>