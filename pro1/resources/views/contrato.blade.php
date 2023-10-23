@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Crear Contratos</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contrato.input') }}">
                        @csrf

                        <div class="row">

                            <label for="n_lineas" class="col-md-3 col-form-label text-md">Numero de lineas</label>
                            <div class="col-md-3">
                                <input id="n_lineas" type="text"
                                    class="form-control @error('n_lineas') is-invalid @enderror" name="n_lineas"
                                    value="{{ old('n_lineas') }}" required autocomplete="n_lineas" autofocus>
                                @error('n_lineas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="codigo" class="col-md-3 col-form-label text-md">Codigo</label>
                            <div class="col-md-3">
                                <input id="codigo" type="text"
                                    class="form-control @error('codigo') is-invalid @enderror"
                                    name="codigo" required autocomplete="current-codigo">
                                @error('codigo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="val_plan" class="col-md-3 col-form-label text-md">Valor del Plan</label>
                            <div class="col-md-3">
                                <input id="val_plan" type="text"
                                    class="form-control @error('val_plan') is-invalid @enderror" name="val_plan"
                                    required autocomplete="current-val_plan">
                                @error('val_plan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="id_usuario" class="col-md-3 col-form-label text-md">Usuarios</label>
                            <div class="col-md-3">
                                <select name="id_usuario" id="id_usuario" class="form-control" required>
                                    <option value=""></option>
                                    @foreach ($combo as $val )
                                    <option value="{{$val->id}}">{{$val->nombre_usuario}}</option>
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
                                    <td scope="col">Codigo</td>
                                    <td scope="col">N Lineas</td>
                                    <td scope="col">Fecha Activacion</td>
                                    <td scope="col">Valor Plan</td>
                                    <td scope="col">Usuario</td>
                                    <td scope="col">Estado</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($lista as $data)
                                <tr>
                                    <td scope="row">{!! $data->codigo !!}</td>
                                    <td>{!! $data->n_lineas !!}</td>
                                    <td>{!! $data->fecha_activacion !!}</td>
                                    <td>{!! $data->val_plan !!}</td>
                                    <td>{!! $data->nombre_usuario !!}</td>
                                    <td>{!! $data->estado = 1 ?'Activo':'Inactivo'  !!}</td>
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