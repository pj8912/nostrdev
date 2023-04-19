<?php
/*
PUBLISH TO RELAY TEST
*/

require_once  "../vendor/autoload.php";

use swentel\nostr\Event\Event;
use swentel\nostr\Message\EventMessage;
use swentel\nostr\Relay\Relay;
use swentel\nostr\Sign\Sign;
use swentel\nostr\Key\Key;

$key = new Key();

$private_key = $key->generatePrivateKey();
$public_key  = $key->getPublicKey($private_key);


$note = new Event();
$note->setContent('This is working');
$note->setKind(1);

$signer = new Sign();
$signer->signEvent($note, $private_key);

$eventMessage = new EventMessage($note);


$websocket = 'ws://127.0.0.1:6969';
$relay = new Relay($websocket, $eventMessage);

$result = $relay->send();
var_dump($eventMessage->generate());

/*
*   TEST SUCCESS
*
*/