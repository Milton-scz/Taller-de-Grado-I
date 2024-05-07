<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Curso;
use App\Models\Video;
use App\Models\Venta;
use App\Models\Pago;
use App\Models\DetalleVenta;
use App\Models\Progreso;

class CallBackAdminController extends Controller{

    public function __invoke(Request $request){

        $pago_id = $request->input("PedidoID");
        $Fecha = $request->input("Fecha");
        $NuevaFecha = date("Y-m-d", strtotime($Fecha));
        $Hora = $request->input("Hora");
        $MetodoPago = $request->input("MetodoPago");
        $Estado = $request->input("Estado");
        $Ingreso = true;

        $pago = Pago::findOrFail($pago_id);
        $pago->fechapago = $Fecha;
        $pago->estado = $Estado;
        $pago->metodopago = $MetodoPago;
        $pago->update();


        $venta= Venta::where('pago_id', $pago->id)
                      ->first();
        $venta->estado =  $Estado;
        $venta->update();


        $detalleVenta = DetalleVenta::where('venta_id', $venta->id)->first(['curso_id']);
        $existingProgreso = Progreso::where('user_id', $venta->user_id)
                                     ->where('curso_id',$detalleVenta->curso_id)
                                     ->exists();

                                     if(!$existingProgreso){
                                        $progreso = Progreso::create([
                                            'user_id' => $venta->user_id,
                                            'curso_id' => $detalleVenta->curso_id,
                                            'porcentaprogreso' => 0,
                                        ]);
                                    }

        try {
            $arreglo = ['error' => 0, 'status' => 1, 'message' => "Pago realizado correctamente.", 'values' => true];
        } catch (\Throwable $th) {
            $arreglo = ['error' => 1, 'status' => 1, 'messageSistema' => "[TRY/CATCH] " . $th->getMessage(), 'message' => "No se pudo realizar el pago, por favor intente de nuevo.", 'values' => false];
        }

        return response()->json($arreglo);
    }


}
