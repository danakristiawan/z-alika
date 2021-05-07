<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <!-- non gpp -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
            <span>Data Server</span>
        </h6>
        <?php
        $menu1 = [
            [
                'name' => 'Tunjangan Kinerja',
                'url' => 'tunjangan-kinerja'
            ],
            [
                'name' => 'Pembayaran Lainnya',
                'url' => 'pembayaran-lainnya'
            ],
            [
                'name' => 'Daftar Satker',
                'url' => 'daftar-satker'
            ],
            [
                'name' => 'Profil Satker',
                'url' => 'profil-satker'
            ],
            [
                'name' => 'SPT Pegawai',
                'url' => 'spt-pegawai'
            ],
            [
                'name' => 'Unit Pegawai',
                'url' => 'unit-pegawai'
            ],
            [
                'name' => 'Tarif Pajak',
                'url' => 'tarif-pajak'
            ],
            [
                'name' => 'Referensi Jabatan',
                'url' => 'referensi-jabatan'
            ],
            [
                'name' => 'Referensi Pangkat',
                'url' => 'referensi-pangkat'
            ],
            [
                'name' => 'User Alika',
                'url' => 'user'
            ]
        ];
        ?>
        <ul class="nav flex-column">
            <?php foreach ($menu1 as $r) : ?>
                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(1) == $r['url'] ? 'active' : ''; ?> pb-1" href="<?= base_url() . $r['url']; ?>">
                        &nbsp; <?= $r['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <!-- sistem -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-3 mb-1 text-muted">
            <span>Data Local</span>
        </h6>
        <?php
        $menu2 = [
            ['name' => 'Tukin Online', 'url' => 'tukin-online'],
            ['name' => 'Tukin NKP', 'url' => 'tukin-nkp'],
            ['name' => 'SPT', 'url' => 'spt'],
            ['name' => 'Payment', 'url' => 'payment']
        ];
        ?>
        <ul class="nav flex-column">
            <?php foreach ($menu2 as $r) : ?>
                <li class="nav-item">
                    <a class="nav-link <?= $this->uri->segment(1) == $r['url'] ? 'active' : ''; ?> pb-1" href="<?= base_url() . $r['url']; ?>">
                        &nbsp; <?= $r['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>