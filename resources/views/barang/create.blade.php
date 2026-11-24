@extends('layouts.app')
@section('title', 'Tambah Barang')

@section('content')
    <h3>Tambah Barang</h3>
    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        @include('barang._form', ['barang' => null])
        <button type="submit">Simpan</button>
    </form>
@endsection