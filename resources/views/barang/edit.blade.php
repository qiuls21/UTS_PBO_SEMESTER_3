@extends('layouts.app')
@section('title', 'Edit Barang')

@section('content')
    <h3>Edit Barang</h3>
    <form action="{{ route('barang.update', $barang['kode']) }}" method="POST">
        @csrf
        @method('PUT')
        @include('barang._form', ['barang' => $barang])
        <button type="submit">Perbarui</button>
    </form>
@endsection