<?php

require_once 'vendor/autoload.php';

use swentel\nostr\Key\Key;

$postdata = file_get_contents("php://input");
$req = json_decode($postdata);


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

else {
    $message = [
        'status' => 0,
        'message' => 'Key Conversion failed!'
    ];

    exit(json_encode($message));
}
