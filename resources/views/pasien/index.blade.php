@extends('layouts.pasien')

@section('content')
    <div class="pagetitle">
        <h1 class="">Dashboard</h1>

        <p class="">Selamat Datang, {{ Auth::user()->pasien->nama }}</p>

    </div>
@endsection
