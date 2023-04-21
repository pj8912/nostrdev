<?php

require_once 'vendor/autoload.php';

use swentel\nostr\Key\Key;

$postdata = file_get_contents("php://input");
$req = json_decode($postdata);
if ($req->data == 'getkeys') {

    $key = new Key();

    $private_key = $key->generatePrivateKey();
    $public_key  = $key->getPublicKey($private_key);

    $bech32_publicKey = $key->convertPublicKeyToBech32($public_key);

    $bech32_privateKey = $key->convertPrivateKeyToBech32($private_key);


    // echo "public key : " . $bech32_publicKey . PHP_EOL;
    // echo "private key:" . $bech32_privateKey;

    $message = [
        'status' => 1,
        'public_key' => $bech32_publicKey,
        'private_key' => $bech32_privateKey
    ];
    exit(json_encode($message));
} else {
    $message = [
        'status' => 0,
        'message' => 'Key Generation failed!'
    ];
    exit(json_encode($message));
}
