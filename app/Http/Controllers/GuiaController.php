<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Paquete;
use App\Models\Guia;
use App\Models\Almacen;
use App\Models\Servicio;
use App\Models\Pago;
use App\Models\Venta;
use App\Models\Vertice;
use App\Models\Ruta;
use App\Models\Arco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class GuiaController extends Controller
{
    public function index(){
        $guias  =Guia::paginate(20);
       return view('GestionarGuias.guias.index',compact('guias'));
    }

    public function create(){
        $paquetes  = Paquete::all();
        $users  = User::all();
        $servicios  = Servicio::all();
        $almacenes  = Almacen::all();
        $vertices  = Vertice::all();
        $arcos  = Arco::all();
        return view('GestionarGuias.guias.create')->with("users", $users)->with("paquetes", $paquetes)
        ->with("servicios", $servicios)->with("almacenes", $almacenes)->with("vertices", $vertices)->with("arcos", $arcos);
    }

    public function store(Request $request) {

        $paquete = Paquete::create([
            'dimensiones' => $request->dimensiones,
            'peso' => $request->peso,
        ]);

        return Redirect::route('admin.paquete.create');
    }

    public function update(Request $request, $id){
        $paquete = Paquete::findOrFail($id);
        $paquete->fill($request->all());
        $paquete->save();
        return Redirect::route('admin.paquetes');
    }

    public function edit($paquete_id){
        $paquete = Paquete::findOrFail($paquete_id);
        return view('GestionarPaquetes.paquetes.edit')->with("paquete", $paquete);
    }

    public function destroy($paquete_id){
        $paquete = Paquete::find($paquete_id);
        $paquete->delete();
        return Redirect::route('admin.paquetes');
    }




}
