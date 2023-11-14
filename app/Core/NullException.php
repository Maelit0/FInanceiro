<?php

namespace App\Core;

class NullException extends \Exception
{

  public function __construct($resquestMethod)
  {
    $message = "Não é possivel retornar valores nulos!";
    parent::__construct($message);
  }
}
