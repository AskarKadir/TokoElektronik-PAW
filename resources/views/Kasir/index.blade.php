@extends('layouts.app')
@section('content')

<body>
    <div class="container">
        <div class="row">
            <h1>Data Kasir</h1>
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <th>Telepon</th>
                </tr>
                @foreach ($dataKasir as $item)
                <tr>
                    <td>{{ $item->Nama }}</td>
                    <td>{{ $item->Telepon }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-
beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9E
kf" cross origin="anonymous"></script>
</body>
@endsection