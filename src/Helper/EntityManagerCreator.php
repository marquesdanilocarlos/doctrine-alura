<?php

namespace App\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function create()
    {
        // Create a simple "default" Doctrine ORM configuration for Attributes
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__ . "/../Entities"),
            isDevMode: true,
        );

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