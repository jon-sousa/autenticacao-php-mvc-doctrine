<?php 
    if(!isset($title)){
        $title = 'Autenticação';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title><?=$title?></title>
    </head>
    <body>
        <?php
            if(!(isset($flashMessage) || isset($flashMessageClass))){
                if(!(isset($_SESSION['flashMessage']) || isset($_SESSION['flashMessageClass']))){
                    $flashMessage = '';
                    $flashMessageClass = '';
                }
                else {
                    $flashMessage = $_SESSION['flashMessage'];
                    $flashMessageClass = $_SESSION['flashMessageClass'];
                }
            } 
        ?>
        <div class= "<?= $flashMessageClass ?>"  > <?= $flashMessage?> </div> 
    
