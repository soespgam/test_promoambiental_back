<?php

namespace App\Http\Controllers;
use App\Models\seguimiento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class seguimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_seguimientos()
    {
        $seguimientos= seguimiento::all();
        //$seguimientos= "hola ";
        return response()->json($seguimientos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $seguimiento = new seguimiento;
        $seguimiento->Nombres= $request->nombres;
        $seguimiento->Apellidos= $request->apellidos;
        $seguimiento->Asunto= $request->asunto;
        $seguimiento->correo= $request->correo;
        $seguimiento->Telefono= $request->telefono;
        $seguimiento->fecha= $request->fecha;
        $seguimiento->dias= $request->dias;
        $seguimiento->proximo_seguimiento= $request->proximo_seguimento;
        $seguimiento->save();
        return back()->with('succes','seguimiento creado');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function get_seguimiento_id(string $id)
    {   
        $seguimiento_by_id= seguimiento::find($id);
        return response()->json($seguimiento_by_id);
    }

      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        dd($request);
        
        $seguimiento = seguimiento::find($id);
        $seguimiento->Nombres= $request->nombres;
        $seguimiento->Apellidos= $request->apellidos;
        $seguimiento->Asunto= $request->asunto;
        $seguimiento->correo= $request->correo;
        $seguimiento->Telefono= $request->telefono;
        $seguimiento->fecha= $request->fecha;
        $seguimiento->dias= $request->dias;
        $seguimiento->proximo_seguimiento= $request->proximo_seguimento;
        $seguimiento->save();
        return back()->with('notice', 'El usuario ha sido modificado correctamente.');
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $response = [
                'type' => "success",
                'content' => "Se el seguimiento de manera correcta."
            ];

            $seguimiento = seguimiento::findOrFail($id);
            $seguimiento->delete();
            return $this->responseApi( $response);

        } catch (Throwable $throwableException) {
            $response = [
                'type' => "error",
                'content' => "Ocurrió un error al eliminar el seguimiento."
            ];
        }
        
    }
}
