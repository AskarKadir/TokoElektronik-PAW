<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function index()
    {
        $dataBarang = \App\Models\Barang::all();
        return view('barang.index', ['dataBarang' => $dataBarang]);
    }

    public function create(Request $request)
    {
        \App\Models\Barang::create($request->all());
        return redirect('/barang')->with('Sukses', 'Data Berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dataBarang = \App\Models\Barang::find($id);
        return view('barang.edit', ['item' => $dataBarang]);
    }

    public function update(Request $request, $id)
    {
        $dataBarang = \App\Models\Barang::find($id);
        $dataBarang->update($request->all());
        return redirect('barang')->with('Sukses', 'Data Berhasil diubah');
    }

    public function delete($id)
    {
        $dataBarang = \App\Models\Barang::find($id);
        $dataBarang->delete();
        return redirect('/barang')->with('Sukses', 'Data Berhasil dihapus');
    }
}