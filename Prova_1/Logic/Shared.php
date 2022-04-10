<?php

function encrypt($data)
{
    return openssl_encrypt($data, "aes256", "prova");
}

function decrypt($data)
{
    return openssl_decrypt($data, "aes256", "prova");
}