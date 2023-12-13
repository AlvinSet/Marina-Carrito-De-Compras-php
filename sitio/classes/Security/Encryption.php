<?php
namespace App\Security;


class Encryption {

    public static function verify(string $value, string $hash): bool
    {
        return password_verify($value, $hash);
    }

}