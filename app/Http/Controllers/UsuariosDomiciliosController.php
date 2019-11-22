<?php

namespace App\Http\Controllers;

use App\UsuarioDomicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsuariosDomiciliosController extends Controller
{
    public function index(Request $request)
    {
        $usuario_domicilio = UsuarioDomicilio::get();

        return response()->json($usuario_domicilio,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        /*$user = [
          'name' => $data['nombre'],
          'email' => $data['correo'],
          'password' => $data['contraseña']
        ];*/
        
        UsuarioDomicilio::create($data);

        return response()->json($data,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_find = UsuarioDomicilio::findOrFail($id);

        $user_first = UsuarioDomicilio::where('id',$id)->firstOrFail();

        $user = UsuarioDomicilio::select('user_id')
            ->where('id', $id)
            ->first();

        return response()->json($user,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = UsuarioDomicilio::where('id',$id)->firstOrFail();

        $user->update($request->all());

        return response()->json($user,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UsuarioDomicilio::findOrFail($id)->delete();

        return response()->json(['result' => 'ok'],200);

    }
}
