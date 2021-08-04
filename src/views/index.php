<?php

namespace jon\autenticacao\views;

    require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'beginOfPage.php';
?>

<h1 class="alert alert-info text-center">Bem-vindo, <?= $_SESSION['usuario']?> </h1>

<?php
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'endOfPage.php';
?>