<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../src/bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
