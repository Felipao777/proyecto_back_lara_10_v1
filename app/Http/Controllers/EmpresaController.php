<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Validation\Rule;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$empresas=Empresa::get();
        $empresas=Empresa::orderBy ('id_empresa', 'desc')->get();
        return response()->json($empresas, 200);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
       $request->validate([
           "nombre_empresa" => "required|unique:empresas"
        ]);

        //guardar
        $emp = new Empresa();
        $emp->region_empresa = $request->region_empresa;
        $emp->nombre_empresa = $request->nombre_empresa;
        //$emp->nombre_empresa = "Tapia";
        $emp->save();
       // $emp->

        return response()->json(["message"=>"Empresa Registrada"],201);
        //return response()->json($request, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $empresa=Empresa::find($id);
        return response()->json($empresa,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $emp=Empresa::find($id);
        $request->validate([
           //"nombre_empresa" => "unique:empresas|rule::ignore($id_empresa)"
           "nombre_empresa" => [
            "required",
            Rule::unique('empresas')->ignore($emp),
           ]
         ]);
         //$emp = new Empresa();
         $emp->nombre_empresa = $request->nombre_empresa;
         $emp->region_empresa = $request->region_empresa;
         //$emp->nombre_empresa = "Tapia";
         $emp->update();
         return response()->json(["message"=>"Empresa Modificada"],200);
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $emp=Empresa::find($id);
        $emp->delete();
        return response()->json(["message"=>"Empresa Eliminada"],200);
 

    }
}
