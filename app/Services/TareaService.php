<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class TareaService
{
    use ConsumesExternalService;

    /**
     * 
     * @var string
     */
    public $baseUri;

    /**
     * 
     * @var string
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.tareas.base_uri');
        $this->secret = config('services.tareas.secret');
    }

    /**
     * 
     * @return string
     */
    public function obtainTareas()
    {
        return $this->performRequest('GET', '/tareas');
    }

    /**
     * 
     * @return string
     */
    public function createTarea($data)
    {
        return $this->performRequest('POST', '/tareas', $data);
    }

    /**
     * 
     * @return string
     */
    public function obtainTarea($tarea)
    {
        return $this->performRequest('GET', "/tareas/{$tarea}");
    }

    /**
     * 
     * @return string
     */
    public function editTarea($data, $tarea)
    {
        return $this->performRequest('PUT', "/tareas/{$tarea}", $data);
    }

    /**
     * 
     * @return string
     */
    public function deleteTarea($tarea)
    {
        return $this->performRequest('DELETE', "/tareas/{$tarea}");
    }

}
