<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once "./bootstrap/bootstrap.php";

return ConsoleRunner::createHelperSet($entityManager);