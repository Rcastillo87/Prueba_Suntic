<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use App\Models\Identidad_tipo;
use App\Models\Ciudades;
use App\Models\Contratos;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Utilidades\ReportExportArray;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Contrato_Controller extends Controller
{
    //#COMENTARIO - variable de manejo de mensajes
    private $success_lista =   '¡Se ha generado la lista con éxito!';
    private $error_validaciones  = "La data no cumple con las validaciones";
    private $error_consulta = 'No existen resgistros asociados en el sistema';
    private $error_tipo_dato = "Debe Ingresar un numero entero";

    //#COMENTARIO - lista de parametros
    public function Lista( Request $request ){
        $lista = Usuario::all();
        $lista2 = Contratos::join('usuarios','usuarios.id_ciudad', 'contratos.id')
        ->get(['contratos.*','usuarios.nombre_usuario']);
        return view('/contrato')->with(['combo'=> $lista, 'lista' => $lista2]);
    }

    public function Input( Request $request ){

        $request->validate([
            'id' => 'nullable|integer',
            'n_lineas' => 'required|integer',
            'codigo' => 'required|integer',
            'val_plan' => 'required|integer',
            'id_usuario' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['fecha_activacion'] = now();
            $data['estado'] = 1;
            Contratos::create($data);
            DB::commit();
        } catch (\Exception $e) {
            return redirect('/contrato');
        }

        return redirect('/contrato');
    }
}