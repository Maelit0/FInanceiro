<?php

namespace App\Core;

class ImagemErro extends \DomainException
{
    public function __construct($mensagem = '')
    {
        parent::__construct($mensagem);
    }
}
