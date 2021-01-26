<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profil Satker</h1>
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
            <a href="<?= base_url('profil-satker/create'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1"> Tambah Data</a>
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="kode satker">
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
                            <th>Kdsatker</th>
                            <th>No_skp</th>
                            <th>Nama_ttd_skp</th>
                            <th>NIP_ttd_skp</th>
                            <th>Jab_ttd_skp</th>
                            <th>Nama_ttd_kp4</th>
                            <th>NIP_ttd_kp4</th>
                            <th>Jab_ttd_kp4</th>
                            <th>NPWP_bendahara</th>
                            <th>Nama_bendahara</th>
                            <th>NIP_bendahara</th>
                            <th>Tgl_spt</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($profil as $r) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r['tahun']; ?></td>
                                <td><?= $r['kdsatker']; ?></td>
                                <td><?= $r['no_skp']; ?></td>
                                <td><?= $r['nama_ttd_skp']; ?></td>
                                <td><?= $r['nip_ttd_skp']; ?></td>
                                <td><?= $r['jab_ttd_skp']; ?></td>
                                <td><?= $r['nama_ttd_kp4']; ?></td>
                                <td><?= $r['nip_ttd_kp4']; ?></td>
                                <td><?= $r['jab_ttd_kp4']; ?></td>
                                <td><?= $r['npwp_bendahara']; ?></td>
                                <td><?= $r['nama_bendahara']; ?></td>
                                <td><?= $r['nip_bendahara']; ?></td>
                                <td><?= date('d-m-Y', $r['tgl_spt']); ?></td>
                                <td><?= $r['file']; ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('profil-satker/update/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Ubah</a>
                                        <a href="<?= base_url('profil-satker/delete/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">Hapus</a>
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