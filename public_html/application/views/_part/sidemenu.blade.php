<nav class="navbar-sidebar">
    <ul class="list-unstyled navbar__list">
        <li>
            <a href="<?= base_url() ?>">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
        </li>

        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-columns"></i>Data Peternakan</a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="<?= base_url("supplier") ?>">
                        <i class="fas fa-archive"></i>Supplier</a>
                </li>
                <li>
                    <a href="<?= base_url("kandang") ?>">
                        <i class="fas fa-building"></i>Kandang</a>
                </li>
                <li>
                    <a href="<?= base_url("persediaan") ?>">
                        <i class="fas fa-building"></i>Persediaan</a>
                </li>
                <li>
                    <a href="<?= base_url("gudang") ?>">
                        <i class="fas fa-list-ol"></i>Pemakaian</a>
                </li>
                <li>
                    <a href="<?= base_url('typegudang') ?>">
                        <i class="fas fa-bug"></i>Type Gudang</a>
                </li>
                <?php if ($type == "admin") { ?>
                    <li>
                        <a href="<?= base_url('karyawan') ?>">
                            <i class="fas fa-group"></i>Data Karyawan</a>
                    </li>
                <?php } ?>
            </ul>
        </li>

        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-list-alt"></i>Transaksi Peternakan</a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">

                <li>
                    <a href="<?= base_url("kandang/pembelian") ?>">
                        <i class="fas fa-list-ol"></i>Pembelian Ayam</a>
                </li>
                <li>
                    <a href="<?= base_url("kandang/penjualan") ?>">
                        <i class="fas fa-list-ol"></i>Penjualan Ayam</a>
                </li>

                <li>
                    <a href="<?= base_url("typegudang/pembelian") ?>">
                        <i class="fas fa-list-ol"></i>Pembelian Persedian</a>
                </li>
                <li>
                    <a href="<?= base_url("typegudang/penjualan") ?>">
                        <i class="fas fa-list-ol"></i>Pemakaian Persediaan</a>
                </li>

            </ul>
        </li>

        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fas fa-list-alt"></i>Data Kandang</a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">

                <li>
                    <a href="<?= base_url("stokayam") ?>">
                        <i class="fas fa-list-ol"></i>Stok Ayam</a>
                </li>
                <li>
                    <a href="<?= base_url("jatahpersediaan") ?>">
                        <i class="fas fa-list-ol"></i>Jatah Persediaan</a>
                </li>

                <li>
                    <a href="<?= base_url("typegudang/jumlah") ?>">
                        <i class="fas fa-list-ol"></i>Jumlah Persediaan 
                    </a>
                </li>
            </ul>
        </li>

        <?php if ($type == "admin") { ?>
            <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fas fa-copy"></i>Laporan</a>
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                    <li>
                        <a href="<?= base_url("laporan/gudang") ?>">
                            <i class="fas fa-paperclip"></i>Laporan Gudang
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url("laporan/Ayam") ?>">
                            <i class="fas fa-paperclip"></i>Laporan Ayam
                        </a>
                    </li>
                    <?php /*
                      <li>
                      <a href="<?= base_url("laporan/kandang") ?>">
                      <i class="fas fa-paperclip"></i>Laporan Kandang</a>
                      </li>
                      <li>
                      <a href="<?= base_url("laporan/karyawan") ?>">
                      <i class="fas fa-paperclip"></i>Laporan Karyawan</a>
                      </li>
                      <li>
                      <a href="<?= base_url("laporan/vaksin") ?>">
                      <i class="fas fa-paperclip"></i>Laporan Persediaan</a>
                      </li>
                      <li>
                      <a href="<?= base_url("laporan/stokayam") ?>">
                      <i class="fas fa-paperclip"></i>Laporan Jumlah Stok Ayam</a>
                      </li>
                      <li>
                      <a href="<?= base_url("laporan/transaksi") ?>">
                      <i class="fas fa-paperclip"></i>Laporan Transaksi
                      </a>
                      </li>
                     * 
                     * 
                     */ ?>
                </ul>
            </li>
        <?php } ?>
        <li class="has-sub">
            <a class="js-arrow" href="#">
                <i class="fa fa-gear"></i> Setting
            </a>
            <ul class="list-unstyled navbar__sub-list js-sub-list">
                <li>
                    <a href="<?= base_url('admin') ?>">
                        <i class="fas fa-table"></i>Admin</a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
