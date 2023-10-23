<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use App\Models\Identidad_tipo;
use App\Models\Ciudades;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Utilidades\ReportExportArray;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Usuario_Controller extends Controller
{
    //#COMENTARIO - variable de manejo de mensajes
    private $success_lista =   '¡Se ha generado la lista con éxito!';
    private $error_validaciones  = "La data no cumple con las validaciones";
    private $error_consulta = 'No existen resgistros asociados en el sistema';
    private $error_tipo_dato = "Debe Ingresar un numero entero";

    //#COMENTARIO - lista de parametros
    public function Lista( Request $request ){
        $lista = Ciudades::all();
        $lista1 = Identidad_tipo::all();
        $lista2 = Usuario::join('ciudades','usuarios.id_ciudad', 'ciudades.id')
        ->join('identidad_tipo','usuarios.id_tipo_identidad', 'identidad_tipo.id')
        ->get(['usuarios.*', 'ciudades.nombre_ciudad', 'identidad_tipo.nombre_tipo']);
        return view('/users')->with(['combo1'=> $lista1, 'combo'=> $lista, 'lista' => $lista2]);
    }

    public function Input( Request $request ){

        $request->validate([
            'id' => 'nullable|integer',
            'identidad' => 'required|integer',
            'nombre_usuario' => 'required',
            'telefono' => 'required|integer',
            'correo' => 'required|email',
            'id_tipo_identidad' => 'required|integer',
            'id_ciudad' => 'required|integer'
        ]);

        DB::beginTransaction();
        try {
            $data = $request->all();
            Usuario::create($data);
            DB::commit();
        } catch (\Exception $e) {
            return redirect('/');
        }

        return redirect('/');
    }
}