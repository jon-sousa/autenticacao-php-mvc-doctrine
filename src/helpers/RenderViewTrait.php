<?php

namespace jon\autenticacao\helpers;

trait RenderViewTrait
{
    public function renderView(string $path, array $inputs){
        extract($inputs);
        
        ob_start();
        require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $path . '.php';
        $html = ob_get_clean();
        return $html;
    }
}