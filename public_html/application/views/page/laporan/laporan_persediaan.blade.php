@extends("_part.layout_laporan")

@section('title', $title)

@section("content")
<div style="width: 100%; display: flex;flex-direction: row;justify-content:space-between; margin-bottom: 10px">

    <pre>

    </pre>

    <table class="informasi">
        <tbody>
            <tr>
                <td colspan="2">
                    <p>Laporan persediaan yang dicetak pada tanggal : {{date("d-m-Y")}}</p>
                </td>
            </tr>

            <tr>
                <td>Data ditampilkan telah disaring berdasarkan data :</td>
                <td class="text-center penanggung-jawab">Penanggung Jawab</td>
            </tr>

            <tr>
                <td>
                    <table>
                        <tbody>
                            @foreach ($data_get as $key => $item)

                            @if ($item != "0")
                            <tr>
                                <td width=20% style="padding-right: 20px; text-transform: capitalize">Data {{$key}}</td>
                                <td style="text-align: left;">: {{"(".((array) $item)["id_$key"] .") $item->nama"}}</td>
                                <td></td>
                            </tr>
                            @endif

                            @endforeach
                        </tbody>
                    </table>
                </td>
                <td>
                    <table class="informasi">
                        <tbody>
                            <tr>
                                <td style="height:100px;text-align: center; vertical-align: bottom">
                                    (_______________)
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>

            </tr>


        </tbody>
    </table>




</div>
<div id="outtable">
    <table class="data">
        <thead>
            <tr>
                <th rowspan="2" class="center">No</th>
                <th rowspan="2" class="center">ID</th>
                <th rowspan="2" class="center"></th>
                <th rowspan="2">Persediaan</th>
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
            <?php foreach ($transaksi as $key => $value) { ?>
            <tr>
                <td class="center"> {{$key + 1}} </td>
                <td class="center"> {{ $value->id_transaksi }} </td>
                <td> {{$value->aksi}} </td>
                <td> {{$value->nama_persediaan}} </td>
                <td class="center"> {{$value->tanggal}} </td>
                <td class="center">{{$value->jumlah}} </td>
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
@endsection