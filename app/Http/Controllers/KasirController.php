<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    //
    public function index()
    {
        $dataKasir = \App\Models\Kasir::all();
        return view('kasir.index', ['dataKasir' => $dataKasir]);
    }

    public function create(Request $request)
    {
        \App\Models\Kasir::create($request->all());
        return redirect('/kasir')->with('Sukses', 'Data Berhasil ditambahkan');
    }
}