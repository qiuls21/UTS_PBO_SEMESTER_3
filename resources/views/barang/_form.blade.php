@php $isEdit = !is_null($barang); @endphp

<label>Kode</label>
<input type="text" name="kode" value="{{ old('kode', $barang['kode'] ?? '') }}" {{ $isEdit ? 'readonly' : '' }}>
@error('kode') <div class="err-text">{{ $message }}</div> @enderror

<label>Nama Barang</label>
<input type="text" name="nama" value="{{ old('nama', $barang['nama'] ?? '') }}">
@error('nama') <div class="err-text">{{ $message }}</div> @enderror

<label>Kategori</label>
<input type="text" name="kategori" value="{{ old('kategori', $barang['kategori'] ?? '') }}">
@error('kategori') <div class="err-text">{{ $message }}</div> @enderror

<label>Lokasi</label>
<input type="text" name="lokasi" value="{{ old('lokasi', $barang['lokasi'] ?? '') }}">
@error('lokasi') <div class="err-text">{{ $message }}</div> @enderror

<label>Jumlah</label>
<input type="number" name="jumlah" value="{{ old('jumlah', $barang['jumlah'] ?? '') }}">
@error('jumlah') <div class="err-text">{{ $message }}</div> @enderror

<label>Kondisi</label>
<select name="kondisi">
    @foreach(['Baik', 'Rusak Ringan', 'Rusak Berat'] as $k)
        <option value="{{ $k }}" {{ old('kondisi', $barang['kondisi'] ?? '') == $k ? 'selected' : '' }}>{{ $k }}</option>
    @endforeach
</select>