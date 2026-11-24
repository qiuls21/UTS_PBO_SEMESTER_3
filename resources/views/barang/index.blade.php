@extends('layouts.app')
@section('title', 'Daftar Barang')

@section('content')
    <h3>Daftar Barang</h3>
    <a href="{{ route('barang.create') }}">+ Tambah Barang</a>
    <br><br>

    @if(count($barangs) > 0)
    <table>
        <tr>
            <th>Kode</th><th>Nama</th><th>Kategori</th>
            <th>Lokasi</th><th>Jumlah</th><th>Kondisi</th><th>Aksi</th>
        </tr>
        @foreach($barangs as $b)
        <tr>
            <td>{{ $b['kode'] }}</td>
            <td>{{ $b['nama'] }}</td>
            <td>{{ $b['kategori'] }}</td>
            <td>{{ $b['lokasi'] }}</td>
            <td>{{ $b['jumlah'] }}</td>
            <td>{{ $b['kondisi'] }}</td>
            <td>
                <a href="{{ route('barang.show', $b['kode']) }}">Detail</a> |
                <a href="{{ route('barang.edit', $b['kode']) }}">Edit</a> |
                <form action="{{ route('barang.destroy', $b['kode']) }}" method="POST" style="display:inline"
                      onsubmit="return confirm('Yakin hapus barang ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @else
        <p>Belum ada data barang.</p>
    @endif
@endsection