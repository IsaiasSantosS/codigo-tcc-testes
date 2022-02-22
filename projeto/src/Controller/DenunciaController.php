<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DenunciaController extends BaseController
{
    public function index(Request $request, Response $response, array $args = []): Response
    {
        return $this->render($request, $response, 'denuncia/index.twig');
    }
}