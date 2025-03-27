<?php

namespace App\Http\Controllers;

use App\Models\Trab_hab;
use Illuminate\Http\Request;

class Trab_habController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //http://127.0.0.1:8000/api/trab_hab?page=2&q=Perez
        //$buscar = $request->query(q);
       $buscar = isset($request->q)?$request->q:'';
       $limit=isset($request->limit)?$request->limit:10;

        if($buscar){
            $trab_habs=Trab_hab::orderBy('id_trabajador_hab','desc')
                                    ->where('pat_trabajador_hab', 'like', '%'.$buscar.'%')
                                    ->with("empresa")
                                    ->paginate($limit);
        }else{
            $trab_habs=Trab_hab::orderBy('id_trabajador_hab','desc')->with("empresa")->paginate($limit);
        }

        /*$trab_habs=Trab_hab::orderBy ('id_trabajador_hab', 'desc')->with("empresa")->get();*/
        return response()->json($trab_habs,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $request->validate([
            "pat_trabajador_hab" => "required",
            "id_empresa" => "required",
         ]);
        
        //guardar
        $trab=new Trab_hab();
        $trab->pat_trabajador_hab=$request->pat_trabajador_hab;
        $trab->id_empresa=$request->id_empresa;
        $trab->cargo_trabajador_hab=$request->cargo_trabajador_hab;
        $trab->save();
        //responder
        return response()->json(["message"=>"Trabajador registrado"],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trabajador = Trab_hab::with('empresa')->findOrFail($id);
        return response()->json($trabajador, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validar
        $request->validate([
            "pat_trabajador_hab" => "required",
            "id_empresa" => "required",
         ]);
        //buscar
        $trab = Trab_hab::findOrFail($id);
        //guardar
        //$trab=new Trab_hab();
        $trab->pat_trabajador_hab=$request->pat_trabajador_hab;
        $trab->id_empresa=$request->id_empresa;
        $trab->cargo_trabajador_hab=$request->cargo_trabajador_hab;
        $trab->update();         
        //responder
        return response()->json(["message"=>"Trabajador actualizado"],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trab = Trab_hab::findOrFail($id);
        $trab->delete();
        return response()->json(["message"=>"Trabajador eliminado"],200);

    }

    public function actualizarImagen(Request $request, $id) {
        if($file = $request->file("imagen")){
            $direccion_imagen = time()."-".$file->getClientOriginalName();
            $file->move("imagen/", $direccion_imagen);
            $direccion_imagen = "imagen/". $direccion_imagen;

            $trab = Trab_hab::find($id);
            $trab->profesion_trabajador_hab = $direccion_imagen;
            $trab->update();
            return response()->json(["message" => "Imagen del trabajador Actualizado"], 200);
        }

        return response()->json(["message" => "Se requiere Imagen del trabajador"], 422);
    }

}
