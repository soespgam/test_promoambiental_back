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
        try {
            $seguimientos= seguimiento::all();
            return response()->json($seguimientos);
        } catch (\Throwable $th) {
            $response = [
                'type' => "error",
                'content' => "Ocurrió un error al consultar los seguimentos"
            ];
            return $response;
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
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
            return response()->json('seguimiento creado');

        } catch (Throwable $throwableException) {
            $response = [
                'type' => "error",
                'content' => "Ocurrió un error al crear el seguimiento."
            ];
            return $response;
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function get_seguimiento_id(string $id)
    {   
        if(isset($id)){
            try {
                $seguimiento_by_id= seguimiento::find($id);
                return response()->json($seguimiento_by_id);
            } catch (Throwable $throwableException) {
                $response = [
                    'type' => "error",
                    'content' => "Ocurrió un error al consultar el seguimiento."
                ];
                return $response;
            }
        }else{
            $response = [
                'type' => "error",
                'content' => "el seguimiento consultado no existe."
            ];
            return $response;
        }
    }

      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
         try {
            $seguimientoNew = seguimiento::find($request->id);
            if(isset($seguimientoNew)){
                $seguimientoNew->Nombres= $request->Nombres;
                $seguimientoNew->Apellidos= $request->Apellidos;
                $seguimientoNew->Asunto= $request->Asunto;
                $seguimientoNew->correo= $request->correo;
                $seguimientoNew->Telefono= $request->Telefono;
                $seguimientoNew->fecha= $request->fecha;
                $seguimientoNew->dias= $request->dias;
                $seguimientoNew->proximo_seguimiento= $request->fecha_proximo_seguimiento;
                $seguimientoNew->save();
                return response()->json($seguimientoNew);
            }else{
                $response = [
                    'type' => "error",
                    'content' => "el seguimiento consultado no existe."
                ];
                return $response;
            }
        } catch (Throwable $throwableException) {
            $response = [
                'type' => "error",
                'content' => "Ocurrió un error al actualizar el seguimiento."
            ];
            return $response;
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(isset($id)){
            try {
                $seguimiento = seguimiento::findOrFail($id);
                $seguimiento->delete();
                return response()->json('seguimiento eliminado');
            } catch (Throwable $throwableException) {
                $response = [
                    'type' => "error",
                    'content' => "Ocurrió un error al eliminar el seguimiento."
                ];
            }
        }else{
            $response = [
                'type' => "error",
                'content' => "el seguimiento que intenta eliminar no existe."
            ];
            return $response;
        }
        
    }
}
