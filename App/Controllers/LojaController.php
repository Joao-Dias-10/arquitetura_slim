<?php

namespace App\Controllers;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use  App\DAO\MySQL\gerenciador_de_lojas\lojasDAO;
use App\Models\MySQL\gerenciador_de_lojas\LojaModel;



final class LojaController
{

    public function getLojas(Request $request, Response $response, array $args ): Response
    {
        #Cria um objeto   
        $lojasDAO = new lojasDAO();
        #refere a class
        $lojas = $lojasDAO->getAllLojas();
        #Devolve em jason
        $response = $response->withJson($lojas);
        return $response;
    }

    public function insertLoja(Request $request, Response $response, array $args ): Response
    {

        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();
        $loja->setNome($data['nome'])
            ->setEndereco($data['endereco'])
            ->setTelefone($data['telefone']);
        $lojasDAO->insertLoja($loja);

        $response = $response->withJson([
            'message' => 'Loja inserida com sucesso!'
        ]);

        return $response;

    }

    public function updateLoja(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $loja = new LojaModel();
        $loja->setId((int)$data['id'])
            ->setNome($data['nome'])
            ->setEndereco($data['endereco'])
            ->setTelefone($data['telefone']);
        $lojasDAO->updateLoja($loja);

        $response = $response->withJson([
            'message' => 'Loja alterada com sucesso!'
        ]);

        return $response;
    }

    public function deleteLoja(Request $request, Response $response, array $args): Response
    {
        $data = $request->getParsedBody();

        $lojasDAO = new LojasDAO();
        $id = (int)$data['id'];
        $lojasDAO->deleteLoja($id);

        $response = $response->withJson([
            'message' => 'Loja excluída com sucesso! :'
        ]);

        return $response;
    }
}