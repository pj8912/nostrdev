<?php

require_once  "../vendor/autoload.php";

echo "TEST<br/>";
use swentel\nostr\Key\Key;

$key = new Key();

$private_key = $key->generatePrivateKey();
$public_key  = $key->getPublicKey($private_key);
echo "public key : ".$public_key;

?>

<hr>