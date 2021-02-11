<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\UsuarioService;

class UsuarioController extends Controller
{
    use ApiResponser;

    public $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        // inyeccion de dependencias
        $this->usuarioService = $usuarioService;
    }

    
    public function index()
    {

        return $this->successResponse($this->usuarioService->obtainUsuarios());
    }

   
    public function store(Request $request)
    {
        return $this->successResponse($this->usuarioService->createUsuario($request->all()), Response::HTTP_CREATED);
    }

    public function show($usuario)
    {
        return $this->successResponse($this->usuarioService->obtainUsuario($usuario));
    }

    
    public function update(Request $request, $usuario)
    {
        return $this->successResponse($this->usuarioService->editUsuario($request->all(), $usuario));
    }

 
    public function destroy($usuario)
    {
        return $this->successResponse($this->usuarioService->deleteUsuario($usuario));
    }
}
