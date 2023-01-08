<!DOCTYPE html>
<html>

<head>
    <title>Barang</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Toko Elektronik
            </a>
            <button class="navbar-toggler" type="button" data-bstoggle="collapse" data-bs-target="#navbarSupportedContent"
                ariacontrols="navbarSupportedContent" aria-expanded="false"aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kasir">Kasir</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" ariahaspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>
    <div class="container mt-3">
        @if (session('Sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('Sukses') }}
            </div>
        @endif
        <div class="row">
            <div class="col-6 my-3">
                <h1>Data barang</h1>
            </div>
            <div class="col-6 my-4" align="right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float right" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Tambah barang
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Stok Barang</th>
                            <th>Satuan Barang</th>
                            <th>Status Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($dataBarang as $item)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->Nama_Barang }}</td>
                                <td>@currency($item->Harga_Barang)</td>
                                <td>{{ $item->Stok_Barang }}</td>
                                <td>{{ $item->Satuan_Barang }}</td>
                                <td>{{ $item->Status_Barang }}</td>
                                <td>
                                    <a href="/barang/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <a href="/barang/delete/{{ $item->id }}"class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah anda ingin menghapus nomor {{ $loop->iteration }}')">
                                        Delete
                                    </a>
                                    </a>
                                    <button type="button" class="btn btn-light btn-sm"><a
                                            href="/barang/exportpdf">PDF</a></button>

                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- Form Modal --}}
                    <form action="{{ route('tambah.barang') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="formGroupExampleInput" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="Nama" name="Nama_Barang"
                                placeholder="Terminal Kuningan">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2" class="form-label">Harga Barang</label>
                            <input type="text" class="form-control" id="Harga_Barang" name="Harga_Barang"
                                placeholder="15000">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput3" class="form-label">Stok Barang</label>
                            <input type="number" class="form-control" id="Stok_Barang" name="Stok_Barang"
                                placeholder="5">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput4" class="form-label">Satuan Barang</label>
                            <select class="form-select form-select-md" aria-label=".form-select-sm example"
                                name="Satuan_Barang">
                                <option selected disabled>Silahkan Pilih Satuan</option>
                                <option value="Meter">Meter</option>
                                <option value="Centimeter">Centimeter</option>
                                <option value="Roll">Roll</option>
                                <option value="PCS">PCS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput4" class="form-label">Status Barang</label>
                            <select class="form-select form-select-md" aria-label=".form-select-sm example"
                                name="Status_Barang">
                                <option selected disabled>Silahkan Pilih Status</option>
                                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                <option value="Sedang Dikirim">Sedang Dikirim</option>
                                <option value="Telah diterima">Telah diterima</option>
                                <option value="Pengembalian Barang">Pengembalian Barang</option>
                            </select>
                        </div>
                        {{-- Form Modal --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
