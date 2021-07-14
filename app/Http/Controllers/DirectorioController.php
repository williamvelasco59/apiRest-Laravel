<?php

namespace App\Http\Controllers;

use App\Directorio;
use App\Http\Requests\CreateDirectorioRequest;
use App\Http\Requests\UpdateDirectorioRequest;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    
    //GET listar registros
    public function index(Request $request)
    {
        if ($request->has( 'txtBuscar' )) {
            $directorios = Directorio::where('nombre', 'like', '%' . $request->txtBuscar . '%')
                    ->orWhere('telefono',$request->txtBuscar)
                    ->get();
        }else{
            $directorios = Directorio::all();
        }
        return $directorios;
    }

    private function cargarArchivo($file){
        $nombreArchivo = time() . "." . $file->getClientOriginalExtension();
        $file->move(public_path( 'fotografias' ), $nombreArchivo);
        
        return $nombreArchivo;
    }

    //POST insertar datos
    public function store(CreateDirectorioRequest $request)
    {
        // dd($request);
        $input = $request->all();
        if ($request->has('foto')) {
            $input['foto'] = $this->cargarArchivo($request->foto);
        }

        Directorio::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro creado correctamente'
        ], 200);
    }

    //GET retorna un solo resgitro
    public function show(Directorio $directorio)
    {
        return $directorio;
    }

    //PUT actualizar registros
    public function update(UpdateDirectorioRequest $request, Directorio $directorio)
    {
        
        $input = $request->all();
        if ($request->has('foto')) {
            $input['foto'] = $this->cargarArchivo($request->foto);
        }

        $directorio->update($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente'
        ], 200);
    }

    //DELETE eliminar registros
    public function destroy($id)
    {
        Directorio::destroy($id);

        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado correctamente'
        ], 200);
    }
}
