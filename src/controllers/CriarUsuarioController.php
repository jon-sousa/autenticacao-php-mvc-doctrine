<?php

namespace jon\autenticacao\controllers;

use Nyholm\Psr7\Response;
use jon\autenticacao\models\Usuario;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use jon\autenticacao\helpers\EntityManagerFactory;

class CriarUsuarioController implements RequestHandlerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(){
        $this->entityManager = (new EntityManagerFactory())->getEntityManager();
    }
    public function handle(ServerRequestInterface $request) : ResponseInterface{
        try{
            $usuarioBody = $request->getParsedBody();

            $usuario = new Usuario();
            $usuario->setNomeCompleto($usuarioBody['nomeCompleto']);
            $usuario->setEmail($usuarioBody['email']);
            $usuario->setLogin($usuarioBody['login']);
            $usuario->cadastrarSenha($usuarioBody['senha']);
            $data = new \DateTimeImmutable($usuarioBody['dataNascimento']);
            $usuario->setDataNascimento($data);

            $this->entityManager->persist($usuario);
            $this->entityManager->flush();

            return new Response(200, ['location' => '/']);
        }
        catch(Error|Exception $e){
            return new Response(500, "Aconteceu um erro: $e");
        }
    }
}