@extends("_part.layout", $head)

@section("content")

<div class="row">
    <h3 class="title-5 m-b-25">Persediaan</h3>

    <div class="col-lg-12 m-b-25">
        <button class="au-btn au-btn-icon au-btn--green au-btn-small btn-add-supplier" type="button">
            <i class="zmdi zmdi-plus"></i>Tambah Persediaan
        </button>
    </div>

    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-25">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Persediaan</th>
                        <th>Type Persediaan</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Cara Pemakaian</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section("model")

@endsection