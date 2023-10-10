<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

$loader = new Loader();
$loader->setNamespaces(
  [
    'MyApp\Models' => __DIR__ . '/models/',
    'MyApp\Controllers' => __DIR__ . '/controllers/',
  ]
);
$loader->register();

$di = new FactoryDefault();

$databaseConfig = require_once(__DIR__ . '/config/config.php');

$di->setShared(
  'db',
  function () use ($databaseConfig) {
    return new PdoMysql($databaseConfig['database']);
  }
);

include __DIR__ . '/middleware/corsMiddleware.php';

$app = new Micro($di);

setupCors($app);

$patientsRoutes = include __DIR__ . '/routes/patientRouter.php';
$app->mount($patientsRoutes());

$app->notFound(
  function () {
    echo "404 - Not Found";
  }
);

$app->handle($_SERVER["REQUEST_URI"]);