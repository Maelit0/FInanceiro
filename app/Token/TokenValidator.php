<?php

namespace App\Token;
require '../vendor/autoload.php';

use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Validation\Constraint\SignedWith;


class TokenValidator
{
    public function verify()
    {
        $tokenString = $this->getBearerToken(); 
        $token = getallheaders()['Authorization'];
        $token = str_replace([' ', 'Bearer'], '', $token);
        $secretKey = InMemory::plainText('segredo');
       
        $configuration = Configuration::forSymmetricSigner(
            new Sha256(),
            $secretKey
        );

        $parser = $configuration->parser();
        $token = $parser->parse($tokenString);

       
        $constraints = [
            new SignedWith($configuration->signer(), $configuration->signingKey())
        ];

       
        $validator = $configuration->validator();

        try {
            $validator->assert($token, ...$constraints);
            return true;
          
        } catch (\Exception $e) {
             $e->getMessage('Esse Token não Existe!');
            return false;
        }
    }

    public function getAuthorizationHeader()
    {
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
          
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }

    public function getBearerToken()
    {
        $headers = $this->getAuthorizationHeader();
      
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }
}
