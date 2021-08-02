<?php

namespace jon\autenticacao\controllers;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use jon\autenticacao\helpers\RenderViewTrait;
use jon\autenticacao\helpers\EntityManagerFactory;

class RealizarLoginController implements RequestHandlerInterface
{
    use RenderViewTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(){
        $this->entityManager = (new EntityManagerFactory)->getEntityManager();
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface{
        extract($request->getParsedBody());

        $usuario = ($this->entityManager->getRepository('jon\autenticacao\models\Usuario'))->
                        findOneBy(['email'=> $email]);

        if($usuario == null){
            $html = $this->renderView('FormularioLogin', 
                [
                    'flashMessage' => 'Usuário não encontrado',
                    'flashMessageClass' => "alert alert-danger"
                ]
            );

            return new Response(204, [], $html);
        }
        
        if(!$usuario->verificarSenha($senha)){
            $html = $this->renderView('FormularioLogin', 
                [
                    'flashMessage' => 'Senha incorreta',
                    'flashMessageClass' => "alert alert-danger"
                ]
            );
            return new Response(204, [], $html);
        }

        $_SESSION['usuario'] = $usuario->getNomeCompleto();
        return new Response(200, ['location' => '/']);
    }
}