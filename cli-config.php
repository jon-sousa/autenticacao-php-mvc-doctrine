<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use jon\autenticacao\helpers\EntityManagerFactory;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

// replace with mechanism to retrieve EntityManager in your app
$entityManager = (new EntityManagerFactory())->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);