<?php

require_once  "../vendor/autoload.php";


use swentel\nostr\Key\Key;

$key = new Key();

$private_key = $key->generatePrivateKey();
$public_key  = $key->getPublicKey($private_key);



$bech32_publicKey = $key->convertPublicKeyToBech32($public_key);

$bech32_privateKey = $key->convertPrivateKeyToBech32($private_key);


echo "public key : " . $bech32_publicKey . PHP_EOL;
echo "private key:" . $bech32_privateKey;

echo "public_key to hex: ". $key->convertToHex($bech32_publicKey);


?>

<hr>