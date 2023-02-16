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
                <a class="btn btn-warning" href="{{ url('/') }}">Dashboard</a>
            </div>
        </div>
    </div>
    </div>

    <div class="container">
        <form action="{{route('tiket.update', $tiket->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center pt-5 pb-5">Edit Tiket</h1>

                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                    <input name="nama" value="{{$tiket->nama}}" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>

                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nomor Telpon</label>
                                    <input name="nomor" value="{{$tiket->nomor}}" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>

                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                                    <input name="jumlah" value="{{$tiket->jumlah}}" type="number" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>

                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kode</label>
                                    <input readonly value="{{$tiket->kode}}" type="number" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>

                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <button class="btn btn-primary" type="submit">Edit</button>
                                </div>
                            </div>
                            <div class="col-3"></div>
                        </div>

                </div>
            </div>
        </form>
    </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
