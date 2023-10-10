<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;

class Patient extends Model
{
  public $id;
  public $name;
  public $sex;
  public $religion;
  public $phone;
  public $address;
  public $nik;

  public function initialize()
  {
    $this->setSource("Patient");
  }

}