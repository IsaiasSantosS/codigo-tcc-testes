<?php
declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', 'App\Controller\HomeController:index')->setName('home');

    $app->get('/denuncias', 'App\Controller\DenunciaController:index')->setName('denuncia');
    $app->post('/buscar', 'App\Controller\BuscaController:index')->setName('buscar');    
    
    
    //Rotas padrões do sistema - retirar depois
    $app->get('/post/{id}', 'App\Controller\HomeController:viewPost')->setName('post');

    $app->group('/member', function (Group $group) {
        $group->map(['GET', 'POST'],'/login', 'App\Controller\AuthController:login')->setName('login');
        $group->get('/logout', 'App\Controller\AuthController:logout')->setName('logout');

    });


};
