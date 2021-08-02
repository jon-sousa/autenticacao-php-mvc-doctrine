<?php 

namespace jon\autenticacao\router;

use jon\autenticacao\controllers\HomePageController;
use jon\autenticacao\controllers\CriarUsuarioController;
use jon\autenticacao\controllers\RealizarLoginController;
use jon\autenticacao\controllers\FormularioLoginController;
use jon\autenticacao\controllers\FormularioInscricaoController;

return [
    '/inscricao' => FormularioInscricaoController::class,
    '/criar-usuario' => CriarUsuarioController::class,
    '/login' => FormularioLoginController::class,
    '/realizar-login' => RealizarLoginController::class,
    '/' => HomePageController::class
];