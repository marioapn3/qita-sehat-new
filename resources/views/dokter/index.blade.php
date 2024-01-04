@extends('layouts.dokter')

@section('content')
    <div class="pagetitle">
        <h1 class="">Dashboard</h1>
        <p class="">Selamat Datang, {{ Auth::user()->dokter->nama }}</p>
    </div>
@endsection
