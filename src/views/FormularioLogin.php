<?php

namespace jon\autenticacao\views;

    require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'beginOfPage.php';
?>

<form class="w-50 mx-auto mt-5" action="/realizar-login" method="post">
    <div class="mb-3">
        <label class="form-label" for="">E-mail</label>
        <input class="form-control" type="text" name="email" id="">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Senha</label>
        <input class="form-control" type="password" name="senha" id="">
    </div>
    <input type="submit" value="Login">
</form>

<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'endOfPage.php';
?>