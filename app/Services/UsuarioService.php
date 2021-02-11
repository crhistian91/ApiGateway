<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class UsuarioService
{
    use ConsumesExternalService;

    /**
     * dada la variable de configuracion se envia la url
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
        $this->baseUri = config('services.usuarios.base_uri');
        $this->secret = config('services.usuarios.secret');
    }

    /**
     * 
     * @return string
     */
    public function obtainUsuarios()
    {
        return $this->performRequest('GET', '/usuarios');
    }

    /**
     * 
     * @return string
     */
    public function createUsuario($data)
    {
        return $this->performRequest('POST', '/usuarios', $data);
    }

    /**
     * 
     * @return string
     */
    public function obtainUsuario($usuario)
    {
        return $this->performRequest('GET', "/usuarios/{$usuario}");
    }

    /**
     * 
     * @return string
     */
    public function editUsuario($data, $usuario)
    {
        return $this->performRequest('PUT', "/usuarios/{$usuario}", $data);
    }

    /**
     * 
     * @return string
     */
    public function deleteUsuario($usuario)
    {
        return $this->performRequest('DELETE', "/usuarios/{$usuario}");
    }
}
