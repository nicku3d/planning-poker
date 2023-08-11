<?php


namespace App\Service;


class KeyGeneratorService
{
    public function generateKey()
    {
        return uniqid('',true);
    }
}