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
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Kdsatker</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Bruto</th>
                            <th>Pph</th>
                            <th>Netto</th>
                            <th>Jenis</th>
                            <th>Uraian</th>
                            <th>Tanggal</th>
                            <th>Nospm</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($payment as $r) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r['bulan']; ?></td>
                                <td><?= $r['tahun']; ?></td>
                                <td><?= $r['kdsatker']; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= $r['nip']; ?></td>
                                <td><?= $r['bruto']; ?></td>
                                <td><?= $r['pph']; ?></td>
                                <td><?= $r['netto']; ?></td>
                                <td><?= $r['jenis']; ?></td>
                                <td><?= $r['uraian']; ?></td>
                                <td><?= date('d-m-Y', $r['tanggal']); ?></td>
                                <td><?= $r['nospm']; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <?php if ($r['sts'] == null) : ?>
                                            <a href="<?= base_url('payment/upload-detail/') . $r['nip'] . '/' . $r['bulan'] . '/' . $r['tahun'] . '/' . $r['kdsatker'] . '/' . $r['nospm']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan mengupload data ini?');">Upload</a>
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