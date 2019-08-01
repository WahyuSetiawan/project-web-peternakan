@extends('_part/layout', $head)

@section('content')
<?php
if ($head['type'] == "karyawan") {
    ?>
        @include('page.dashboard.welcomekaryawan')
    <?php
} else {
    ?>
        @include('page.dashboard.welcomeadmin')
    <?php
}
?>

@endsection