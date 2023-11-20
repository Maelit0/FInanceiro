<?php

namespace App\Token;

class TokenValidator
{
   public function base64UrlEncode($data)
   {
      return str_replace(['+', '/', '='], ['-', "_", ''], base64_encode($data));
   }
   public function verify()
   {
      $token = "eyJhbGciOiAiSFMyNTYiLCJ0eXAiOiJKV1QifQ==.eyJzdWIiOiAiNzdkMGNjMTA3MTg5NTRjMjU4Y2U5ZmU5YzAyN2UwOTQiLiJuYW1lIjoiSXNtYWVsIiwiaWF0IjogMTcwMDIyNzAxOH0=.cRPaXvkC/aFEXHzHyGhppA21FlaiNOrnK5p21QIMeXU=";
      $parts = explode('.', $token);

      $signature = $this->base64UrlEncode(
         hash_hmac('sha256', $parts[0] . '.' . $parts[1], 'segredo', true)
      );
      if($signature == $parts[2]){
         $payload = json_decode(
            base64_decode($parts[1])
         );
         return $payload->name;
      }else{
        return print "Token Inválido";
      }
   }
}
