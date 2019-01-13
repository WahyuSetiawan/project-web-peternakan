<div class="menu">
    <div class="title">
        <a href="{{base_url()}}">Dashboard</a>
    </div>
</div>
<div class="menu">
    <div class="title">
        <a href=""><span class="fa fa-bookmark"></span> Data Peternakan <i class="fa fa-caret-down"></i></a>
    </div>

    <div class="submenu">
        <a href="{{base_url('kandang')}}"> <i class="fa fa-tags"></i> Kandang</a>
        <a href="{{base_url('supplier')}}"><i class="fa fa-group"></i> Supplier</a>
        <a href="{{base_url('persediaan')}}"><i class="fa fa-truck"></i> Persediaan</a>
        <a href="{{base_url('jadwalpersediaan')}}"><i class="fa fa-calendar-o"></i> Jadwal Persediaan</a>
        <a href="{{base_url('karyawan')}}"><i class="fa fa-address-card"></i> Karyawan</a>
    </div>
</div>
<div class="menu">
    <div class="title">
        <a href=""><i class="fa fa-bank"></i> Transaksi</a>
    </div>

    <div class="submenu">
        <a href="{{base_url('kandang/pembelian')}}"><i class="fa fa-shopping-basket"></i> Pembelian Ayam</a>
        <a href="{{base_url('kandang/penjualan')}}"><i class="fa fa-industry"></i> Penjualan Ayam</a>
        <a href="{{base_url('persediaan/pembelian')}}"><i class="fa fa-shopping-basket"></i> Pembelian Persediaan</a>
        <a href="{{base_url('persediaan/penjualan')}}"><i class="fa fa-signing"></i> Pengunaan Persediaan</a>

    </div>
</div>
<div class="menu">
    <div class="title">
        <a href="">Data Kandang</a>
    </div>

        <div class="submenu">
            <a href="{{base_url('stokkandang')}}">Stok Ayam</a>
            <a href="{{base_url('stokpersediaan')}}">Stok Persediaan</a>
    </div>
</div>
<div class="menu">
    <div class="title">
        <a href="">Laporan</a>
    </div>

    <div class="submenu">
        <a href="{{base_url('laporan/gudang')}}">Laporan Gudang</a>
        <a href="{{base_url('laporan/Ayam')}}">Laporan Persediaan</a>
    </div>
</div>
<div class="menu">
    <div class="title">
        <a href="">Setting</a>
    </div>

    <div class="submenu">
        <a href="{{base_url('admin')}}">Admin</a>
    </div>
</div>



<nav class="navbar-sidebar" style="display: none">
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
                    <a href="<?= base_url(" supplier") ?>">
                        <i class="fas fa-archive"></i>Supplier</a>
                </li>
                <li>
                    <a href="<?= base_url(" kandang") ?>">
                        <i class="fas fa-building"></i>Kandang</a>
                </li>
                <?php /*
                  <li>
                  <a href="<?= base_url("persediaan") ?>">
                <i class="fas fa-building"></i>Persediaan</a>
        </li>

        <li>
            <a href="<?= base_url(" gudang") ?>">
                <i class="fas fa-list-ol"></i>Pemakaian</a>
        </li>
        * * */ ?>

        <li>
            <a href="<?= base_url('persediaan') ?>">
                <i class="fas fa-bug"></i>Persediaan</a>
        </li>
        <li>
            <a href="<?= base_url(" jadwalpersediaan") ?>">
                <i class="fas fa-list-ol"></i>Jatah Persediaan</a>
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
                <a href="<?= base_url(" kandang/pembelian") ?>">
                    <i class="fas fa-list-ol"></i>Pembelian Ayam</a>
            </li>
            <li>
                <a href="<?= base_url(" kandang/penjualan") ?>">
                    <i class="fas fa-list-ol"></i>Penjualan Ayam</a>
            </li>

            <li>
                <a href="<?= base_url(" persediaan/pembelian") ?>">
                    <i class="fas fa-list-ol"></i>Pembelian Persedian</a>
            </li>
            <li>
                <a href="<?= base_url(" persediaan/penjualan") ?>">
                    <i class="fas fa-list-ol"></i>Pemakaian Persediaan</a>
            </li>

        </ul>
    </li>

    <li class="has-sub">
        <a class="js-arrow" href="#">
            <i class="fas fa-list-alt"></i>Data Kandang</a>
        <ul class="list-unstyled navbar__sub-list js-sub-list">

            <li>
                <a href="<?= base_url(" stokkandang") ?>">
                    <i class="fas fa-list-ol"></i>Stok Ayam</a>
            </li>
            <?php /*
                  <li>
                  <a href="<?= base_url("jatahpersediaan") ?>">
            <i class="fas fa-list-ol"></i>Jadwal Kandang</a>
    </li>
    *
    */ ?>
    <li>
        <a href="<?= base_url(" stokpersediaan") ?>">
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
                <a href="<?= base_url(" laporan/gudang") ?>">
                    <i class="fas fa-paperclip"></i>Laporan Gudang
                </a>
            </li>

            <li>
                <a href="<?= base_url(" laporan/Ayam") ?>">
                    <i class="fas fa-paperclip"></i>Laporan Ayam
                </a>
            </li>
            <?php /*
                      <li>
                      <a href="<?= base_url("laporan/kandang") ?>">
            <i class="fas fa-paperclip"></i>Laporan Kandang</a>
    </li>
    <li>
        <a href="<?= base_url(" laporan/karyawan") ?>">
            <i class="fas fa-paperclip"></i>Laporan Karyawan</a>
    </li>
    <li>
        <a href="<?= base_url(" laporan/vaksin") ?>">
            <i class="fas fa-paperclip"></i>Laporan Persediaan</a>
    </li>
    <li>
        <a href="<?= base_url(" laporan/stokayam") ?>">
            <i class="fas fa-paperclip"></i>Laporan Jumlah Stok Ayam</a>
    </li>
    <li>
        <a href="<?= base_url(" laporan/transaksi") ?>">
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