<?php

namespace jon\autenticacao\views;

    require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'beginOfPage.php';
?>

<form class="w-50 mx-auto mt-5" action="/criar-usuario" method="post">
    <div class="mb-3">
        <label class="form-label" for="">Nome Completo</label>
        <input class="form-control" type="text" name="nomeCompleto" id="">
    </div>
    <div class="mb-3">
        <label class="form-label" for="">Data de Nascimento</label>
        <input class="form-control" type="date" name="dataNascimento" id="">
    </div>
    <div class="mb-3">
        <label class="form-label" for="">E-mail</label>
        <input class="form-control" type="email" name="email" id="">
    </div>
    <div class="mb-3">
        <label class="form-label" for="">Login</label>
        <input class="form-control" type="text" name="login" id="">
    </div>
    <div class="mb-3">
        <label class="form-label" for="">Senha</label>
        <input class="form-control" type="password" name="senha" id="">
    </div>
    <input type="submit" value="Inscrever">
</form>

<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'endOfPage.php';
?>