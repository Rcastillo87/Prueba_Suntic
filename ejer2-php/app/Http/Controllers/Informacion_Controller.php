<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Informacion;

use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Utilidades\ReportExportArray;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Informacion_Controller extends Controller
{
    //#COMENTARIO - variable de manejo de mensajes
    private $success_lista =   '¡Se ha generado la lista con éxito!';
    private $error_validaciones  = "La data no cumple con las validaciones";
    private $error_consulta = 'No existen resgistros asociados en el sistema';
    private $error_tipo_dato = "Debe Ingresar un numero entero";

    //#COMENTARIO - lista de parametros
    public function Lista( Request $request ){
        $lista = Informacion::all();
        return view('/welcome')->with('lista', $lista );
    }

    public function Excel( Request $request ){

        $lista[] = Informacion::where('id', $request->id)->get();
        $fileAttributes = [];

        $headings[] =  [
            'codigo',
            'nombrearchivo',
            'cantlineas',
            'cantpalabras',
            'cantcaracteres',
            'fecharegistro'
          ];
      
          $export = new ReportExportArray($lista , $headings, $fileAttributes);
          return Excel::download($export, 'lista.xlsx');
    }

    public function PDF( Request $request ){

        $array = Informacion::where('id', $request->id)->get();
        $pdf = app('dompdf.wrapper');
        $body = '<table class="default">
        <tr>
            <td>codigo</td>
            <td>nombrearchivo</td>
            <td>cantlineas</td>
            <td>cantpalabras</td>
            <td>cantcaracteres</td>
            <td>fecharegistro</td>
        </tr>
        <tr>
        data
        </tr>
        </table>';

        $data = null;
        foreach ($array as $key => $value) {
            $data .= 
            "<td> $value->id</td>
            <td> $value->nombrearchivo</td>
            <td> $value->cantlineas</td>
            <td> $value->cantpalabras</td>
            <td> $value->cantcaracteres</td>
            <td> $value->fecharegistro</td>";
        }

        $body = str_replace("data", $data, $body);

        $pdf->loadHTML($body);
        return $pdf->download('lista.pdf');
    }

    public function Input( Request $request ){

        $validator = Validator::make($request->all(), [
            'file' => 'mimes:txt|max:2000',
        ]);
        if ($validator->fails()) {
            return redirect('/');
        }

        if ($request->hasfile('file')) {

            $id = Informacion::max('id') + 1;
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $ruta = $file->move(public_path('file'), $id . '_' . $name);

            DB::beginTransaction();
            try {
                
                $file_handle = fopen($ruta, 'r');
                $contents = fread($file_handle, filesize($ruta));
                fclose($file_handle);

                $cantlineas = count(explode('\n', $contents));
                $cantpalabras = count(explode(' ', $contents));
                $cantcaracteres = strlen($contents);
                $fecharegistro = Carbon::now()->toDateTimeString();

                $Informacion  = new Informacion;
                $Informacion->nombrearchivo = $name;
                $Informacion->cantlineas = $cantlineas;
                $Informacion->cantpalabras = $cantpalabras;
                $Informacion->cantcaracteres =$cantcaracteres;
                $Informacion->fecharegistro = $fecharegistro;
                $Informacion->save();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return $e;
            }

        }
        return redirect('/');
    }
}