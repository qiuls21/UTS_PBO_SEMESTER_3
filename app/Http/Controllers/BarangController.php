<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Pesan error validasi dalam bahasa Indonesia
    private function pesan()
    {
        return [
            'required'    => ':attribute wajib diisi.',
            'string'      => ':attribute harus berupa teks.',
            'integer'     => ':attribute harus berupa angka bulat.',
            'max.string'  => ':attribute maksimal :max karakter.',
            'min.numeric' => ':attribute tidak boleh kurang dari :min.',
        ];
    }

    // Nama field yang tampil di pesan error
    private function atribut()
    {
        return [
            'kode'     => 'Kode',
            'nama'     => 'Nama barang',
            'kategori' => 'Kategori',
            'lokasi'   => 'Lokasi',
            'jumlah'   => 'Jumlah',
            'kondisi'  => 'Kondisi',
        ];
    }

    public function index()
    {
        $barangs = session('barang', []);
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode'     => 'required|string|max:20',
            'nama'     => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'lokasi'   => 'required|string|max:50',
            'jumlah'   => 'required|integer|min:0',
            'kondisi'  => 'required|string|max:50',
        ], $this->pesan(), $this->atribut());

        $barangs = session('barang', []);
        $barangs[$data['kode']] = $data;   // simpan baru / timpa kalau kode sama
        session(['barang' => $barangs]);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil disimpan.');
    }

    public function show($kode)
    {
        $barang = session('barang', [])[$kode] ?? null;
        if (!$barang) {
            return redirect()->route('barang.index')
                ->with('error', 'Barang dengan kode ' . $kode . ' tidak ditemukan.');
        }
        return view('barang.show', compact('barang'));
    }

    public function edit($kode)
    {
        $barang = session('barang', [])[$kode] ?? null;
        if (!$barang) {
            return redirect()->route('barang.index')
                ->with('error', 'Barang tidak ditemukan.');
        }
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $kode)
    {
        $barangs = session('barang', []);
        if (!isset($barangs[$kode])) {
            return redirect()->route('barang.index')
                ->with('error', 'Barang tidak ditemukan.');
        }

        $data = $request->validate([
            'nama'     => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'lokasi'   => 'required|string|max:50',
            'jumlah'   => 'required|integer|min:0',
            'kondisi'  => 'required|string|max:50',
        ], $this->pesan(), $this->atribut());

        $barangs[$kode] = array_merge($barangs[$kode], $data);
        session(['barang' => $barangs]);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy($kode)
    {
        $barangs = session('barang', []);
        if (!isset($barangs[$kode])) {
            return redirect()->route('barang.index')
                ->with('error', 'Barang tidak ditemukan.');
        }
        unset($barangs[$kode]);
        session(['barang' => $barangs]);

        return redirect()->route('barang.index')
            ->with('success', 'Data barang berhasil dihapus.');
    }
}