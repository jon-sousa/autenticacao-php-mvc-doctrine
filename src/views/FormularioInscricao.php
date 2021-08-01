<?php

namespace jon\autenticacao\views;

?>

<form action="/criar-usuario" method="post">
    <label for="">Nome Completo</label>
    <input type="text" name="nomeCompleto" id="">
    <label for="">Data de Nascimento</label>
    <input type="date" name="dataNascimento" id="">
    <label for="">E-mail</label>
    <input type="email" name="email" id="">
    <label for="">Login</label>
    <input type="text" name="login" id="">
    <label for="">Senha</label><input type="password" name="senha" id="">
    <input type="submit" value="Inscrever">
</form>
