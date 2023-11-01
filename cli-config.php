<?php
require 'vendor/autoload.php';

use App\Helper\EntityManagerCreator;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;

// Migrations config file, see https://www.doctrine-project.org/projects/doctrine-migrations/en/3.6/reference/configuration.html
$config = new PhpFile(__DIR__ . '/migrations.php');


$entityManager = EntityManagerCreator::create();
return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));