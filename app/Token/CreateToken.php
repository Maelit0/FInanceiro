<?php

namespace App\Token;


class CreateToken
{
    public function  base64UrlEncode($data)
    {
       return str_replace(['+','/','='], ['-',"_",''],base64_encode($data));

    }
    public function createToken()
    {
        $header = base64_encode('{"alg": "HS256","typ":"JWT"}');
        $payload = base64_encode('{"sub": "' . md5(time()) . '"."name":"Ismael","iat": ' . time() . '}');
        $signature = base64_encode(hash_hmac('sha256', $header . '.' . $payload, 'segredo', true));
        return $header . '.' . $payload . '.' . $signature;
    }
}
