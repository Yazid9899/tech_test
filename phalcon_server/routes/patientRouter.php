<?php

use Phalcon\Mvc\Micro\Collection as MicroCollection;
use MyApp\Controllers\PatientsController;

return function () {
  $patients = new MicroCollection();

  $patients
    ->setHandler(new PatientsController())
    ->setPrefix('/patients')
    ->get('/', 'index')
    ->get('/{id}', 'get')
    ->post('/', 'create')
    ->delete('/{id}', 'delete')
    ->patch('/{id}', 'update');

  return $patients;
};