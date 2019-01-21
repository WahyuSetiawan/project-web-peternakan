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
        <a href=""><i class="fa fa-database"></i> Transaksi</a>
    </div>

    <div class="submenu">
        <a href="{{base_url('kandang/pembelian')}}"><i class="fa fa-shopping-basket"></i> Pembelian Ayam</a>
        <a href="{{base_url('kandang/penjualan')}}"><i class="fa fa-industry"></i> Penjualan Ayam</a>
        <a href="{{base_url('kandang/kerugian')}}"><i class="fa fa-industry"></i> Kerugian Ayam</a>
        <a href="{{base_url('persediaan/pembelian')}}"><i class="fa fa-shopping-basket"></i> Pembelian Persediaan</a>
        <a href="{{base_url('persediaan/penjualan')}}"><i class="fa fa-signing"></i> Pengunaan Persediaan</a>

    </div>
</div>
<div class="menu">
    <div class="title">
        <a href=""><i class="fa fa-inbox"></i> Data Kandang</a>
    </div>

    <div class="submenu">
        <a href="{{base_url('stokkandang')}}"><i class="fa fa-inbox"></i> Stok Ayam</a>
        <a href="{{base_url('stokpersediaan')}}"><i class="fa fa-inbox"></i> Stok Persediaan</a>
           <a href="{{base_url('jadwalpersediaan')}}"><i class="fa fa-inbox"></i> Jadwal Kandang</a>
    </div>
</div>
<div class="menu">
    <div class="title">
        <a href=""><i class="fa fa-file-o"></i> Laporan</a>
    </div>

    <div class="submenu">
        <a href="{{base_url('laporan/kandang')}}"><i class="fa fa-file-o"></i> Kandang</a>
        <a href="{{base_url('laporan/persediaan')}}"><i class="fa fa-file-o"></i> Persediaan</a>
        <a href="{{base_url('laporan/jadwalkandang')}}"><i class="fa fa-file-o"></i> Jadwal Kandang</a>
        <a href="{{base_url('laporan/gudang')}}"><i class="fa fa-file-o"></i> Laporan Gudang</a>
        <a href="{{base_url('laporan/transaksiayam')}}"><i class="fa fa-file-o"></i> Laporan Ayam</a>
    </div>
</div>
<div class="menu">
    <div class="title">
        <a href=""><i class="fa fa-gear"></i> Setting</a>
    </div>

    <div class="submenu">
        <a href="{{base_url('admin')}}">Admin</a>
    </div>
</div>