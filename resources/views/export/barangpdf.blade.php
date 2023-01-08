<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Barang Toko Elektronik</h5>
        <h1>Data Barang</h1>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Barang</th>
                <th>Stok Barang</th>
                <th>Satuan Barang</th>
                <th>Status Barang</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($dataBarang as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->Nama_Barang }}</td>
                    <td>@currency($item->Harga_Barang)</td>
                    <td>{{ $item->Stok_Barang }}</td>
                    <td>{{ $item->Satuan_Barang }}</td>
                    <td>{{ $item->Status_Barang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
