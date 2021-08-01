<?php 

namespace jon\autenticacao\router;

use jon\autenticacao\controllers\CriarUsuarioController;
use jon\autenticacao\controllers\FormularioInscricaoController;

return [
    '/inscricao' => FormularioInscricaoController::class,
    '/criar-usuario' => CriarUsuarioController::class
];