@extends('layouts.app')
@section('content')

    <body>
        <div class="container">
            @if (session('Sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('Sukses') }}
                </div>
            @endif
            <h1 class="py-3">Edit Data Barang</h1>
            <div class="row">
                <form method="post" action="/barang/{{ $item->id }}/update">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input name="Nama" type="text" class="form-control mt-2" id="exampleInputEmail1"
                            aria-describedby="EmailHelp" placeholder="Terminal Kuningan" value="{{ $item->Nama_Barang }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Harga Barang</label>
                        <input name="Telepon" type="text" class="form-control mt-2" id="exampleInputEmail1"
                            aria-describedby="EmailHelp" placeholder="45000" value="{{ $item->Harga_Barang }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Stok Barang</label>
                        <input name="Telepon" type="number" class="form-control mt-2" id="exampleInputEmail1"
                            aria-describedby="EmailHelp" placeholder="6" value="{{ $item->Stok_Barang }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Satuan Barang</label>
                        <select class="form-select form-select-md" aria-label=".form-select-sm example"
                            name="Satuan_Barang">
                            <option selected>{{ $item->Satuan_Barang }}</option>
                            <option value="Meter">Meter</option>
                            <option value="Centimeter">Centimeter</option>
                            <option value="Roll">Roll</option>
                            <option value="PCS">PCS</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputEmail1">Status Barang</label>
                        <select class="form-select form-select-md" aria-label=".form-select-sm example"
                            name="Status_Barang">
                            <option selected>{{ $item->Status_Barang }}</option>
                            <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                            <option value="Sedang Dikirim">Sedang Dikirim</option>
                            <option value="Telah diterima">Telah diterima</option>
                            <option value="Pengembalian Barang">Pengembalian Barang</option>
                        </select>
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-success">Ubah</button>
                        <a href="/barang"class="btn btn-danger mx3">Cancel</a>
                    </div>
                </form>
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" cross origin="anonymous">
            </script>
    </body>
@endsection
