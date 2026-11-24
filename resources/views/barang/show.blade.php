@extends('layouts.app')
@section('title', 'Detail Barang')

@section('content')
    <h3>Detail Barang</h3>
    <table>
        <tr><th>Kode</th><td>{{ $barang['kode'] }}</td></tr>
        <tr><th>Nama</th><td>{{ $barang['nama'] }}</td></tr>
        <tr><th>Kategori</th><td>{{ $barang['kategori'] }}</td></tr>
        <tr><th>Lokasi</th><td>{{ $barang['lokasi'] }}</td></tr>
        <tr><th>Jumlah</th><td>{{ $barang['jumlah'] }}</td></tr>
        <tr><th>Kondisi</th><td>{{ $barang['kondisi'] }}</td></tr>
    </table>
    <br>
    <a href="{{ route('barang.edit', $barang['kode']) }}">Edit</a> |
    <a href="{{ route('barang.index') }}">Kembali</a>
@endsection