<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tukin Online</h1>
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
    <div class="row mb-2">
        <div class="col">
            <a href="<?= base_url('tukin-online/impor'); ?>" class="btn btn-sm btn-outline-secondary ml-1"><b>+</b> Impor Data Excel</a>
        </div>
    </div>
    <div class=" row mb-1">
        <div class="col">
            <?php foreach ($tahun as $t) : ?>
                <a href="<?= base_url('tukin-online/index/') . $t['tahun'] . '/' . $bln; ?>" class="btn btn-sm btn-outline-secondary <?= $t['tahun'] == $thn ? 'active' : '' ?> ml-1 mt-2 mb-2"><?= $t['tahun']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <?php foreach ($bulan as $b) : ?>
                <a href="<?= base_url('tukin-online/index/') . $thn . '/' . $b['bulan']; ?>" class="btn btn-sm btn-outline-secondary <?= $b['bulan'] == $bln ? 'active' : '' ?> ml-1 mt-2 mb-2"><?= $b['bulan']; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Kode Satker</th>
                            <th>Pegawai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $jml = 0;
                        foreach ($tukin as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['kdsatker']; ?></td>
                                <td class="text-right"><?= number_format($r['jml'], 0, ',', '.'); ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('tukin-online/detail/') . $thn . '/' . $bln . '/' . $r['kdsatker'] . '/1'; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Detail</a>
                                        <a href="<?= base_url('tukin-online/upload/') . $thn . '/' . $bln . '/' . $r['kdsatker']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan mengupload data ini?');">Upload</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $jml += $r['jml'];
                        endforeach; ?>
                        <tr>
                            <td class="text-center" colspan="2">Jumlah</td>
                            <td class="text-right"><?= number_format($jml, 0, ',', '.'); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>