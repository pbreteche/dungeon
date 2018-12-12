<?php

require __DIR__ . '/../vendor/autoload.php';

$logger = new \Monolog\Logger('main');
$handlers = [new \Monolog\Handler\StreamHandler(__DIR__ . '/../test.log')];
$logger->setHandlers($handlers);

$logger->info('démarrage de l\'application');

require __DIR__ . '/../src/bootstrap.php';

$dungeon = new POE\Dungeon($entityManager);

/**
 * on décide de définir dans un tableau associatif la liste des
 * pages gérées par l'application
 * La clé représente le chemin d'URL et la valeur est le nom de la méthode à exécuter
 */
$pages = [
    '/api/situation' => 'getCharacter',
    '/jeu/situation' => 'reportSituation',
    '/jeu/bagarre' => 'brawl',
    '/creation-personnage' => 'createCharacter',
];

/**
 * Si l'url demandée par le client n'est pas dans la liste, on lui affiche
 * une page 404
 */
if (!key_exists($_SERVER['REQUEST_URI'], $pages)) {
    http_response_code(404);
    echo '<h1>404: page non trouvée!</h1>';
    die;
}

/**
 * Si l'url existe bien, on peut appeler la méthode correspondante.
 * Comme le nom de la méthode est stockée dans une variable, on passe par
 * call_user_func pour l'appeler
 */
$document = call_user_func([$dungeon, $pages[$_SERVER['REQUEST_URI']]]);



/**
 * l'envoi du document se fait à la toute fin
 * il n'y a plus aucun traitement à faire, donc plus d'erreur possible
 */
echo $document;
