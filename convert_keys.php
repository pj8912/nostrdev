<?php

require_once 'vendor/autoload.php';

use swentel\nostr\Key\Key;

$postdata = file_get_contents("php://input");
$req = json_decode($postdata);

// BECH32 TO HEX
if ($req->msg == 'convert_to_hex') {

    $key = new Key();
    $okey = $req->keyx;
    $tohex = $key->convertToHex($okey);

    $message = [
        'status' => 1,
        'hex_key' => $tohex
    ];
    exit(json_encode($message));
}
// HEX TO BECH32
else if ($req->msg == 'convert_to_bech32') {

    $key = new Key();
    $public_key = $req->pubkey;
    $private_key = $req->privkey;

    $bech32_public = $key->convertPublicKeyToBech32($public_key);
    $bech32_private = $key->convertPrivateKeyToBech32($private_key);

    $message = [
        'status' => 1,
        'public_key' => $bech32_public,
        'private_key' => $bech32_private,

    ];
    exit(json_encode($message));
} else {
    $message = [
        'status' => 0,
        'message' => 'Key Conversion failed!'
    ];

    exit(json_encode($message));
}
