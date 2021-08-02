<?php

namespace jon\autenticacao\controllers;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use jon\autenticacao\helpers\RenderViewTrait;

class HomePageController implements RequestHandlerInterface
{
    use RenderViewTrait;

    public function handle(ServerRequestInterface $request) : ResponseInterface{
        $html = $this->renderView('index', []);
        return new Response(200, [], $html);
    }
}