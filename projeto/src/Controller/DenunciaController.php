<?php
namespace App\Controller;

use App\Entity\Denuncia;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DenunciaController extends BaseController
{
    public function index(Request $request, Response $response, array $args = []): Response
    {
        //$this->carregarDenuncias();
        return $this->render($request, $response, 'denuncia/index.twig');
    }

    private function carregarDenuncias(){
        $denuncias = file_get_contents('../var/arquivos_projeto/PDA_LATITUDE_NEGATIVO_ESPACIAL.json');
        $objeto_denuncias = json_decode($denuncias);

        foreach ($objeto_denuncias as $key => $denuncia) {
        $localidade = explode(',', $objeto_denuncias[$key]->localidade);

        $latitude = floatval($localidade[0]);
        $longitude = floatval($localidade[1]);

        $novaDenuncia = new Denuncia();
        $novaDenuncia->setId($denuncia->id)
        ->setBairro($denuncia->bairro)
        ->setLogradouro($denuncia->logradouro)
        ->setComplemento($denuncia->complemento)
        ->setCep($denuncia->cep)
        ->setCadastro($denuncia->cadastro)
        ->setLatitude($latitude)
        ->setLongitude($longitude)
        ->setObservacao($denuncia->observacao)
        ->setServico($denuncia->servico);
        
        $this->em->persist($novaDenuncia);
        $this->em->flush();
        }
    }
}