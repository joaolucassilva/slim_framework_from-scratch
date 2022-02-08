<?php

use DI\Container;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Create Container using PHP-DI
$container = new DI\Container();

/**
 * Diretório de Entidades e Metadata do Doctrine
 */
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . "/../src/Models/Entity"], true);

/**
 * Array de configurações da nossa conexao com o banco
 */

$conn = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/../db.sqlite'
];

/**
 * Instancia do Entity Manager
 */
$entityManager = EntityManager::create($conn, $config);

/**
 * Coloca o Entity manager dentro do container com o nome de em  (Entity Manager)
 */
$container['em'] = $entityManager;

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

$app = AppFactory::create();
