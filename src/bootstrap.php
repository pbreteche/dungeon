<?php

/**
 * Définir où se trouve la configuration de Doctrine
 * On choisit d'utiliser la syntaxe des annotations sur nos classes d'entité
 */
$isDevMode = true;
$paths = array(__DIR__."/entity");

$reader = new \Doctrine\Common\Annotations\AnnotationReader();
$driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($reader, $paths);

$cache = new \Doctrine\Common\Cache\ArrayCache();

$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$config->setMetadataCacheImpl( $cache );
$config->setQueryCacheImpl( $cache );
$config->setMetadataDriverImpl( $driver );


/**
 * paramètres de connexion à la base de données
 */
$connectionConfig = [
    'driver' => 'pdo_mysql',
    'user' => 'pierre',
    'password' => 'secret',
    'dbname' => 'dungeon',

];
/**
 * création du manager avec les paramètres de connexion et la config Doctrine
 */
$entityManager = \Doctrine\ORM\EntityManager::create($connectionConfig, $config);
