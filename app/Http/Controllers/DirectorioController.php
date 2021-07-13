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

    //POST insertar datos
    public function store(CreateDirectorioRequest $request)
    {
        $input = $request->all();
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
        $directorio->update($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
