<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                @if (Route::has('login'))
                    <div class="hidden">
                        @auth
                            <a class="btn btn-warning" href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a class="btn btn-outline-warning" href="{{ route('login') }}">Log in</a>

                            @if (Route::has('register'))
                                <a class="btn btn-outline-dark" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center pt-5 pb-5">Scan Tiket</h1>
            </div>

            <div class="col-3"></div>
            <div class="col-6">
                <form class="navbar-search mb-3" action="{{ route('scan') }}" method="get">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control bg-light border-1 small"
                            placeholder="Cari Tiket.." aria-label="Search" aria-describedby="basic-addon2"
                            style="border-color: #3f51b5;">

                        <button class="btn btn-primary" type="submit">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-3 mb-5"></div>

            <div class="container card">
                <div class="card-body">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr style="text-align: center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nomor Telepon</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Kode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tiket as $row)
                                    <tr style="text-align: center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->nomor }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td>{{ $row->kode }}</td>
                                        <td>
                                            <form action="/tiket/{{ $row->id }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a href="/tiket/{{ $row->id }}/edit"
                                                    class="btn btn-warning">Edit</a>
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
