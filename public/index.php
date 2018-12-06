<?php

require __DIR__ . '/../src/autoload.php';

$dungeon = new POE\Dungeon();

$document = $dungeon->reportSituation();

/**
 * l'envoi du document se fait à la toute fin
 * il n'y a plus aucun traitement à faire, donc plus d'erreur possible
 */
echo $document;
