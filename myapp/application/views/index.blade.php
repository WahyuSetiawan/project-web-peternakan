@extends('_part/layout', $head)

@section('content')
@if ($head['type'] == "karyawan")
@include('page.welcomekaryawan')
@elseif ($head['type'] == "admin")
@include('page.welcomeadmin')
@endif
@endsection