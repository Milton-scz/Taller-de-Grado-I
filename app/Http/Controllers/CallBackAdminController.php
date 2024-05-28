<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Guia;
use App\Models\Ruta_Rastreo;
use App\Models\Venta;
use App\Models\Pago;
use App\Models\DetalleVenta;


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


        $detalleVenta = DetalleVenta::where('venta_id', $venta->id)->first(['guia_id']);
        $guia = Guia::findOrFail($detalleVenta->guia_id);
        $guia->estado = 1;
        $guia->update();

        $detalleVenta2 = DetalleVenta::where('venta_id', $venta->id)->first(['guia_id']);
        if ($detalleVenta2) {
            $guia = Guia::findOrFail($detalleVenta2->guia_id);
            if ($guia) {
                $ruta_rastreo = Ruta_Rastreo::where('guia_id', $guia->id)
                                            ->where('almacen_id', $guia->almacen_llegada)
                                            ->first();
                if ($ruta_rastreo) {
                    $ruta_rastreo->estado = 1;
                    $ruta_rastreo->save();
                }
            }
        }


        try {
            $arreglo = ['error' => 0, 'status' => 1, 'message' => "Pago realizado correctamente.", 'values' => true];
        } catch (\Throwable $th) {
            $arreglo = ['error' => 1, 'status' => 1, 'messageSistema' => "[TRY/CATCH] " . $th->getMessage(), 'message' => "No se pudo realizar el pago, por favor intente de nuevo.", 'values' => false];
        }

        return response()->json($arreglo);
    }


}

