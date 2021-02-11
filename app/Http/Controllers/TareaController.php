<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\TareaService;
use Illuminate\Http\Response;
use App\Services\UsuarioService;

class TareaController extends Controller
{
    use ApiResponser;

    /**
     *
     * @var TareaService
     */
    public $tareaService;

    /**
     *
     * @var UsuarioService
     */
    public $usuarioService;

    /**
     *
     *
     * @return void
     */
    public function __construct(TareaService $tareaService, UsuarioService $usuarioService)
    {
        $this->tareaService = $tareaService;
        $this->usuarioService = $usuarioService;
    }

    /**
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->tareaService->obtainTareas());
    }

    /**
     * 
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->usuarioService->obtainUsuario($request->usuario_id);

        return $this->successResponse($this->tareaService->createTarea($request->all()), Response::HTTP_CREATED);
    }

    /**
     *
     * @return Illuminate\Http\Response
     */
    public function show($tarea)
    {
        return $this->successResponse($this->tareaService->obtainTarea($tarea));
    }

    /**
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $tarea)
    {
        return $this->successResponse($this->tareaService->editTarea($request->all(), $tarea));
    }

    /**
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($tarea)
    {
        return $this->successResponse($this->tareaService->deleteTarea($tarea));
    }

}
