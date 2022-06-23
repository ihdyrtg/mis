<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
        <img src="<?php echo base_url('assets/img/icon.png'); ?>" class="brand-image img-circle elevation-3" style="opacity: .5">
        <span class="brand-text font-weight-light"></span>Kerumahtanggaan
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('assets/img/admin.png'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $user['username']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo base_url('dashboard'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') echo 'active'; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if ($user['id_user'] == 1) : ?>
                    <li class="nav-item <?php if (masterdata("pegawai")) echo 'menu-open'; ?> || <?php if (masterdata("tambah_pegawai")) echo 'menu-open'; ?> || <?php if (masterdata("edit_pegawai")) echo 'menu-open'; ?> || <?php if (masterdata("detail")) echo 'menu-open'; ?> || <?php if (masterdata("barang")) echo 'menu-open'; ?> || <?php if (masterdata("tambah_barang")) echo 'menu-open'; ?> || <?php if (masterdata("edit_barang")) echo 'menu-open'; ?> || <?php if (masterdata("print_detail")) echo 'menu-open'; ?> || <?php if (masterdata("print_detail")) echo 'menu-open'; ?> || <?php if (masterdata("ruang")) echo 'menu-open'; ?> || <?php if (masterdata("tambah_ruang")) echo 'menu-open'; ?> || <?php if (masterdata("edit_ruang")) echo 'menu-open'; ?> || <?php if (masterdata("penerima")) echo 'menu-open'; ?> || <?php if (masterdata("tambah_penerima")) echo 'menu-open'; ?> || <?php if (masterdata("edit_penerima")) echo 'menu-open'; ?> || <?php if (masterdata("unit")) echo 'menu-open'; ?> || <?php if (masterdata("tambah_unit")) echo 'menu-open'; ?> || <?php if (masterdata("edit_unit")) echo 'menu-open'; ?>">
                        <a href="#" class="nav-link <?php if (masterdata("pegawai")) echo 'active'; ?> || <?php if (masterdata("tambah_pegawai")) echo 'active'; ?> || <?php if (masterdata("edit_pegawai")) echo 'active'; ?> || <?php if (masterdata("detail")) echo 'active'; ?> || <?php if (masterdata("barang")) echo 'active'; ?> || <?php if (masterdata("tambah_barang")) echo 'active'; ?> || <?php if (masterdata("edit_barang")) echo 'active'; ?> || <?php if (masterdata("print_detail")) echo 'active'; ?> || <?php if (masterdata("print_detail")) echo 'active'; ?> || <?php if (masterdata("ruang")) echo 'active'; ?> || <?php if (masterdata("tambah_ruang")) echo 'active'; ?> || <?php if (masterdata("edit_ruang")) echo 'active'; ?> || <?php if (masterdata("penerima")) echo 'active'; ?> || <?php if (masterdata("tambah_penerima")) echo 'active'; ?> || <?php if (masterdata("edit_penerima")) echo 'active'; ?> || <?php if (masterdata("unit")) echo 'active'; ?> || <?php if (masterdata("tambah_unit")) echo 'active'; ?> || <?php if (masterdata("edit_unit")) echo 'active'; ?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('masterdata/pegawai'); ?>" class="nav-link <?php if (masterdata("pegawai")) echo 'active'; ?> || <?php if (masterdata("tambah_pegawai")) echo 'active'; ?> || <?php if (masterdata("edit_pegawai")) echo 'active'; ?> || <?php if (masterdata("detail")) echo 'active'; ?> || <?php if (masterdata("print_detail")) echo 'active'; ?> ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pegawai</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('masterdata/barang'); ?>" class="nav-link <?php if (masterdata("barang")) echo 'active'; ?> || <?php if (masterdata("tambah_barang")) echo 'active'; ?> || <?php if (masterdata("edit_barang")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('masterdata/ruang'); ?>" class="nav-link <?php if (masterdata("ruang")) echo 'active'; ?> || <?php if (masterdata("tambah_ruang")) echo 'active'; ?> || <?php if (masterdata("edit_ruang")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ruang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('masterdata/penerima'); ?>" class="nav-link <?php if (masterdata("penerima")) echo 'active'; ?> || <?php if (masterdata("tambah_penerima")) echo 'active'; ?> || <?php if (masterdata("edit_penerima")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pegawai IAIN PSP</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('masterdata/unit'); ?>" class="nav-link <?php if (masterdata("unit")) echo 'active'; ?> || <?php if (masterdata("tambah_unit")) echo 'active'; ?> || <?php if (masterdata("edit_unit")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Unit Kerja</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?php if (info("tor")) echo 'menu-open'; ?> || <?php if (info("barang_kosong")) echo 'menu-open'; ?> || <?php if (info("keterangan")) echo 'menu-open'; ?> || <?php if (info("lokasi")) echo 'menu-open'; ?> || <?php if (info("cekbarang")) echo 'menu-open'; ?> || <?php if (info("lokasi_barang")) echo 'menu-open'; ?> || <?php if (info("detail_lokasi")) echo 'menu-open'; ?> || <?php if (info("edit_lokasi")) echo 'menu-open'; ?> || <?php if (info("detail_lokasi")) echo 'menu-open'; ?> || <?php if (info("brusak")) echo 'menu-open'; ?>">
                        <a href="#" class="nav-link <?php if (info("tor")) echo 'active'; ?> || <?php if (info("barang_kosong")) echo 'active'; ?> || <?php if (info("keterangan")) echo 'active'; ?> || <?php if (info("lokasi")) echo 'active'; ?> || <?php if (info("cekbarang")) echo 'active'; ?> || <?php if (info("lokasi_barang")) echo 'active'; ?> || <?php if (info("detail_lokasi")) echo 'active'; ?> || <?php if (info("edit_lokasi")) echo 'active'; ?> || <?php if (info("brusak")) echo 'active'; ?> || <?php if (info("edit_lokasi")) echo 'active'; ?>">
                            <i class="nav-icon fas fa-info"></i>
                            <p>
                                Info Barang
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('info/tor'); ?>" class="nav-link <?php if (info("tor")) echo 'active'; ?> || <?php if (info("barang_kosong")) echo 'active'; ?> || <?php if (info("keterangan")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Stok Barang</p>
                                    <!-- <i class="fas fa-angle-left right"></i> -->
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('info/lokasi'); ?>" class="nav-link <?php if (info("lokasi")) echo 'active'; ?> || <?php if (info("cekbarang")) echo 'active'; ?> || <?php if (info("lokasi_barang")) echo 'active'; ?> || <?php if (info("detail_lokasi")) echo 'active'; ?> || <?php if (info("edit_lokasi")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lokasi Barang</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('info/brusak'); ?>" class="nav-link <?php if (info("brusak")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Barang Rusak</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item <?php if (transaksi("bm")) echo 'menu-open'; ?> || <?php if (transaksi("inisialisasi")) echo 'menu-open'; ?> || <?php if (transaksi("tambah_bm")) echo 'menu-open'; ?> || <?php if (transaksi("edit_bm")) echo 'menu-open'; ?> || <?php if (transaksi("bk")) echo 'menu-open'; ?> || <?php if (transaksi("tambah_bk")) echo 'menu-open'; ?> || <?php if (transaksi("authpegawai")) echo 'menu-open'; ?> || <?php if (transaksi("tambah_transaksi")) echo 'menu-open'; ?> || <?php if (transaksi("edit_bk")) echo 'menu-open'; ?>">
                        <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'bm') echo 'active'; ?> || <?php if ($this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'inisialisasi') echo 'active'; ?> || <?php if ($this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'tambah_bm') echo 'active'; ?> || <?php if ($this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'edit_bm') echo 'active'; ?> || <?php if ($this->uri->segment(1) == 'transaksi' && $this->uri->segment(2) == 'bk') echo 'active'; ?> || <?php if (transaksi("tambah_bk")) echo 'active'; ?> || <?php if (transaksi("authpegawai")) echo 'active'; ?> || <?php if (transaksi("tambah_transaksi")) echo 'active'; ?> || <?php if (transaksi("edit_bk")) echo 'active'; ?>">
                            <i class="nav-icon fas fa-file-invoice"></i>
                            <p>
                                Transaksi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('transaksi/bm'); ?>" class="nav-link <?php if (transaksi("bm")) echo 'active'; ?> || <?php if (transaksi("inisialisasi")) echo 'active'; ?> || <?php if (transaksi("tambah_bm")) echo 'active'; ?> || <?php if (transaksi("edit_bm")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Barang Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('transaksi/bk'); ?>" class="nav-link <?php if (transaksi("bk")) echo 'active'; ?> || <?php if (transaksi("tambah_bk")) echo 'active'; ?> || <?php if (transaksi("authpegawai")) echo 'active'; ?> || <?php if (transaksi("tambah_transaksi")) echo 'active'; ?> || <?php if (transaksi("edit_bk")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Barang Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item <?php if (pelaporan("masuk")) echo 'menu-open'; ?> || <?php if (pelaporan("filter_bm")) echo 'menu-open'; ?> || <?php if (pelaporan("keluar")) echo 'menu-open'; ?> || <?php if (pelaporan("filter_bk")) echo 'menu-open'; ?>">
                        <a href="#" class="nav-link <?php if (pelaporan("masuk")) echo 'active'; ?> || <?php if (pelaporan("filter_bm")) echo 'active'; ?> || <?php if (pelaporan("keluar")) echo 'active'; ?> || <?php if (pelaporan("filter_bk")) echo 'active'; ?>">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Pelaporan
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('pelaporan/masuk'); ?>" class="nav-link <?php if (pelaporan("masuk")) echo 'active'; ?> || <?php if (pelaporan("filter_bm")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Barang Masuk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('pelaporan/keluar'); ?>" class="nav-link <?php if (pelaporan("keluar")) echo 'active'; ?> || <?php if (pelaporan("filter_bk")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Barang Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('sirkulasi'); ?>" class="nav-link <?php if (sirkulasi("")) echo 'active'; ?> || <?php if (sirkulasi("tambah_sirkulasi")) echo 'active'; ?> || <?php if (sirkulasi("detail")) echo 'active'; ?> || <?php if (sirkulasi("kembali")) echo 'active'; ?> || <?php if (sirkulasi("pengembali")) echo 'active'; ?> || <?php if (sirkulasi("history")) echo 'active'; ?>">
                            <i class="nav-icon fas fa-recycle"></i>
                            <p>
                                Sirkulasi
                            </p>
                        </a>
                    </li>
                <?php elseif ($user['id_user'] == 2) : ?>
                    <li class="nav-item <?php if (stm("pembayaran")) echo 'menu-open'; ?> || <?php if (stm("bayar")) echo 'menu-open'; ?> || <?php if (stm("edit_bayar")) echo 'menu-open'; ?> || <?php if (stm("serah")) echo 'menu-open'; ?>">
                        <a href="#" class="nav-link <?php if (stm("pembayaran")) echo 'active'; ?> || <?php if (stm("bayar")) echo 'active'; ?> || <?php if (stm("edit_bayar")) echo 'active'; ?> || <?php if (stm("serah")) echo 'active'; ?> || <?php if (stm("history")) echo 'active'; ?>">
                            <i class="nav-icon fas fa-donate"></i>
                            <p>
                                STM
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('stm/admin/pembayaran'); ?>" class="nav-link <?php if (stm("pembayaran")) echo 'active'; ?> || <?php if (stm("bayar")) echo 'active'; ?> || <?php if (stm("edit_bayar")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pembayaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('stm/admin/serah'); ?>" class="nav-link <?php if (stm("serah")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Serah STM</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php elseif ($user['id_user'] == 3) : ?>
                    <li class="nav-item <?php if (infaq("pembayaran")) echo 'menu-open'; ?> || <?php if (infaq("serah")) echo 'menu-open'; ?> || <?php if (infaq("dana")) echo 'menu-open'; ?>">
                        <a href="#" class="nav-link <?php if (infaq("pembayaran")) echo 'active'; ?> || <?php if (infaq("bayar")) echo 'active'; ?> || <?php if (infaq("edit_bayar")) echo 'active'; ?> || <?php if (infaq("serah")) echo 'active'; ?> || <?php if (infaq("history")) echo 'active'; ?> || <?php if (infaq("dana")) echo 'active'; ?> || <?php if (infaq("detail_serah")) echo 'active'; ?>">
                            <i class="nav-icon fas fa-mosque"></i>
                            <p>
                                Infaq Masjid IAIN
                                <i class="fas fa-angle-left right"></i>
                                <!-- <span class="badge badge-info right">6</span> -->
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('infaq/admin/pembayaran'); ?>" class="nav-link <?php if (infaq("pembayaran")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Pembayaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('infaq/admin/dana'); ?>" class="nav-link <?php if (infaq("serah")) echo 'active'; ?> || <?php if (infaq("dana")) echo 'active'; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Serah Dana Infaq</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>