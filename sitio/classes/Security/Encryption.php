<?php
namespace App\Security;


class Encryption {

    public function verify(string $value, string $hash): bool
    {
        return password_verify($value, $hash);
    }

}