<?php

namespace jon\autenticacao\controllers;

use Nyholm\Psr7\Response;
use jon\autenticacao\models\Usuario;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use jon\autenticacao\helpers\RenderViewTrait;
use jon\autenticacao\helpers\EntityManagerFactory;
use jon\autenticacao\errors\InvalidPasswordException;

class CriarUsuarioController implements RequestHandlerInterface
{
    use RenderViewTrait;

    private EntityManagerInterface $entityManager;

    public function __construct(){
        $this->entityManager = (new EntityManagerFactory())->getEntityManager();
    }
    public function handle(ServerRequestInterface $request) : ResponseInterface{
        try{
            $usuarioBody = $request->getParsedBody();

            $emailDB = ($this->entityManager->getRepository('jon\autenticacao\models\Usuario'))->
                            findOneBy(['email' => $usuarioBody['email']]);

            if($emailDB != null){
                $html = $this->renderView('FormularioInscricao',
                    [
                        'flashMessage' => 'E-mail já utilizado',
                        'flashMessageClass' => 'alert alert-danger text-center'
                    ]
                );
                return new Response(204, [], $html);
            }

            $usuario = new Usuario();
            $usuario->setNomeCompleto($usuarioBody['nomeCompleto']);
            $usuario->setEmail($usuarioBody['email']);
            $usuario->setLogin($usuarioBody['login']);
            $usuario->cadastrarSenha($usuarioBody['senha']);
            $data = new \DateTimeImmutable($usuarioBody['dataNascimento']);
            $usuario->setDataNascimento($data);

            $this->entityManager->persist($usuario);
            $this->entityManager->flush();

            return new Response(200, ['location' => '/login']);
        }
        catch(\Error|\Exception $e){
            $_SESSION['flashMessage'] = $e->getMessage();
            $_SESSION['flashMessageClass'] =  'alert alert-danger text-center';

            return new Response(500, ['location' => '/inscricao']);
        }
    }
}