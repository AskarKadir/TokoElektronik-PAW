<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

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

    public function edit($id)
    {
        $dataKasir = \App\Models\Kasir::find($id);
        return view('kasir.edit', ['item' => $dataKasir]);
    }

    public function update(Request $request, $id)
    {
        $dataKasir = \App\Models\Kasir::find($id);
        $dataKasir->update($request->all());
        return redirect('kasir')->with('Sukses', 'Data Berhasil diubah');
    }

    public function delete($id)
    {
        $dataKasir = \App\Models\Kasir::find($id);
        $dataKasir->delete();
        return redirect('/kasir')->with('Sukses', 'Data Berhasil dihapus');
    }

    public function exportPdf()
    {
        $dataKasir = \App\Models\Kasir::all();
        $pdf       = PDF::loadView('export.kasirpdf', ['dataKasir' => $dataKasir]);
        return $pdf->download('kasir.pdf');
    }
}