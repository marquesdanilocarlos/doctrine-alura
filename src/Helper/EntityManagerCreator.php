<?php

namespace App\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
    public static function create()
    {
        // Create a simple "default" Doctrine ORM configuration for Attributes
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__ . "/../Entities"),
            isDevMode: true,
        );

        $consoleOutput = new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG);
        $consoleLogger = new ConsoleLogger($consoleOutput);
        $middleware = new Middleware($consoleLogger);
        $config->setMiddlewares([$middleware]);

        $connection = DriverManager::getConnection([
            'dbname' => 'doctrine',
            'user' => 'root',
            'password' => 'a654321',
            'host' => '172.17.0.1',
            'driver' => 'pdo_mysql'
        ], $config);


        return new EntityManager($connection, $config);
    }
}