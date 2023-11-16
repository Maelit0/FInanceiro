<?php

namespace App\Core;

class NullException extends \Exception
{

  public function __construct()
  {
    $message = "Esta requisição está com valores necessarios faltando!";
    parent::__construct($message);
  }
}
