@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Crear Usuario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuario.input') }}">
                        @csrf

                        <div class="row">
                            <label for="correo"
                                class="col-md-3 col-form-label text-md">{{ __('correo Address') }}</label>
                            <div class="col-md-3">
                                <input id="correo" type="email"
                                    class="form-control @error('correo') is-invalid @enderror" name="correo"
                                    value="{{ old('correo') }}" required autocomplete="correo" autofocus>
                                @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="identidad" class="col-md-3 col-form-label text-md">Identidad</label>
                            <div class="col-md-3">
                                <input id="identidad" type="text"
                                    class="form-control @error('identidad') is-invalid @enderror" name="identidad"
                                    value="{{ old('identidad') }}" required autocomplete="identidad" autofocus>
                                @error('identidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="nombre_usuario" class="col-md-3 col-form-label text-md">Nombre Usuario</label>
                            <div class="col-md-3">
                                <input id="nombre_usuario" type="text"
                                    class="form-control @error('nombre_usuario') is-invalid @enderror"
                                    name="nombre_usuario" required autocomplete="current-nombre_usuario">
                                @error('nombre_usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="telefono" class="col-md-3 col-form-label text-md">Telefono</label>
                            <div class="col-md-3">
                                <input id="telefono" type="text"
                                    class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                    required autocomplete="current-telefono">
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="id_tipo_identidad" class="col-md-3 col-form-label text-md">Tipo
                                Documento</label>
                            <div class="col-md-3">
                                <select name="id_tipo_identidad" id="id_tipo_identidad" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($combo1 as $val )
                                    <option value="{{$val->id}}">{{$val->nombre_tipo}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="telefono" class="col-md-3 col-form-label text-md">Ciudades</label>
                            <div class="col-md-3">
                                <select name="id_ciudad" id="id_ciudad" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($combo as $val )
                                    <option value="{{$val->id}}">{{$val->nombre_ciudad}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-10 offset-md-5">
                                <br>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>

                    <br>
                    <div class="row align-items-start">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td scope="col">N Documento</td>
                                    <td scope="col">Tipo Documento</td>
                                    <td scope="col">Nombre Usuario</td>
                                    <td scope="col">Telefono</td>
                                    <td scope="col">Correo</td>
                                    <td scope="col">Ciudad</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($lista as $data)
                                <tr>
                                    <td scope="row">{!! $data->identidad !!}</td>
                                    <td>{!! $data->nombre_tipo !!}</td>
                                    <td>{!! $data->nombre_usuario !!}</td>
                                    <td>{!! $data->telefono !!}</td>
                                    <td>{!! $data->correo !!}</td>
                                    <td>{!! $data->nombre_ciudad !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection