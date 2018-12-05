<?php

require __DIR__ . '/../src/autoload.php';

$dungeon = new POE\Dungeon();

$document = $dungeon->reportSituation();

echo $document;
