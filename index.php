<?php

use jon\autenticacao\controllers\FormularioInscricaoController;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$path = $_SERVER['REQUEST_URI'];
$router = require_once __DIR__ . DIRECTORY_SEPARATOR . 'src'. DIRECTORY_SEPARATOR . 'router' . DIRECTORY_SEPARATOR . 'router.php';

if(!array_key_exists($path, $router)){
    http_response_code(404);
    return;
}

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$controllerClass = $router[$path];
$controller = new $controllerClass();
// $controller = new FormularioInscricaoController();

$response = $controller->handle($request);

foreach ($response->getHeaders() as $name => $values) {
         foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
         }
}

echo $response->getBody();