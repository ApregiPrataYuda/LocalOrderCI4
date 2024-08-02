<?php
namespace App\Services;

use Config\Services;

class EncryptionService
{
    protected $encrypter;

    public function __construct()
    {
        $this->encrypter = Services::encrypter();
    }

    public function encryptId($id)
    {
        return bin2hex($this->encrypter->encrypt($id));
    }

    public function decryptId($encryptedId)
    {
        return $this->encrypter->decrypt(hex2bin($encryptedId));
    }
}