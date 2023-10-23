<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container">
        
        <div>
            <form action="{{ route('informacion.input') }}" method="post" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="file" name="file">
                <label class="input-group-text" for="inputGroupFile02">Subir</label>
            </div>
                <button type="submit" class="btn btn-primary">enviar</button>
            </form>
        </div>


        <div class="row align-items-start">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col">Codigo</td>
                        <td scope="col">Nombre Archivo</td>
                        <td scope="col">Cantidad Lineas</td>
                        <td scope="col">Cantidad Palabras</td>
                        <td scope="col">Cantidad Caracteres</td>
                        <td scope="col">Fecha Registro</td>
                        <td scope="col">Descargas</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach($lista as $data)
                        <tr>
                            <td scope="row">{!! $data->id !!}</td>
                            <td>{!! $data->nombrearchivo !!}</td>
                            <td>{!! $data->cantlineas !!}</td>
                            <td>{!! $data->cantpalabras !!}</td>
                            <td>{!! $data->cantcaracteres !!}</td>
                            <td>{!! $data->fecharegistro !!}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('informacion.excel', ['id' => $data->id]) }}">EXCEL</a>
                                <a class="btn btn-danger" href="{{ route('informacion.pdf', ['id' => $data->id]) }}">PDF</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>