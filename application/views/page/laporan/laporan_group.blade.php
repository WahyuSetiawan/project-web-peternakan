@extends("_part.layout_laporan")

@section('title', $title)

@section("content")
<div style="width: 100%; display: flex;flex-direction: row;justify-content:space-between; margin-bottom: 10px">

</div>
<div id="outtable">
    <table class="data">
        <thead>
            <tr>
                <th rowspan="2" class="center">No</th>
                <th rowspan="2" class="center">ID</th>
                <th rowspan="2" class="center"></th>
                <th rowspan="2">Gudang</th>
                <th rowspan="2" class="center">Tanggal</th>
                <th rowspan="2" class="center">Jumlah</th>
                <th colspan="2" class="center">
                    Dibuat
                </th>
                <th colspan="2" class="center">
                    Diubah
                </th>
            </tr>
            <tr>
                <th class="center">Oleh</th>
                <th class="center">Tanggal</th>
                <th class="center">Oleh</th>
                <th class="center">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value) { ?>
            <tr>
                <td class="center"> {{$key + 1}} </td>
                <td class="center"> {{ $value->id_transaksi }} </td>
                <td> {{$value->aksi}} </td>
                <td> {{$value->nama_kandang}} </td>
                <td class="center"> {{$value->tanggal}} </td>
                <td class="center">{{$value->jumlah_ayam}} </td>
                <td class="center">
                    @if ($value->id_admin == null)
                    {{$value->nama_karyawan}}
                    @else
                    {{$value->nama_admin}}
                    @endif
                </td>

                <td class="center">
                    {{$value->created_at}}
                </td>

                <td class="center">
                    @if ($value->update_by_admin == null)
                    {{$value->update_by_karyawan_nama}}
                    @else
                    {{$value->update_by_admin_nama}}
                    @endif
                </td>

                <td class="center">
                    {{$value->updated_at}}
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

@include('_part.footer_laporan')
@endsection