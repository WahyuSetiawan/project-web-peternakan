@extends('_part/layout', $head)

@section('content')
@if ($head['type'] == "karyawan")
@include('page.dashbaord.welcomekaryawan')
@elseif ($head['type'] == "admin")
@include('page.dashboard.welcomeadmin')
@endif
@endsection