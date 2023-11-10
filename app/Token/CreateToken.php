<?php

namespace App\Core;

use DateTimeImmutable;
use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Token\Builder;

class CreateToken
{
    public function create()
    {

        $tokenBuilder = new Builder(new JoseEncoder(), ChainedFormatter::default());
        $algorithm = new Sha256();
        $signingKey = InMemory::plainText('segredo');
        $now   = new DateTimeImmutable();
        $token = $tokenBuilder
            ->issuedBy('localhost:8000/')
            ->permittedFor('localhost:8000/')
            ->identifiedBy('4f1g23a12aa')
            ->issuedAt($now)
            ->canOnlyBeUsedAfter($now->modify('+1 minute'))
            ->expiresAt($now->modify('+1 hour'))
            ->getToken($algorithm, $signingKey);
        return $token->toString();
    }
}