<?php
// /*
// PUBLISH TO RELAY TEST
// */

// require_once  "../vendor/autoload.php";

// use swentel\nostr\Event\Event;
// use swentel\nostr\Message\EventMessage;
// use swentel\nostr\Relay\Relay;
// use swentel\nostr\Sign\Sign;
// // use swentel\nostr\Key\Key;

// // $key = new Key();

// // $private_key = $key->generatePrivateKey();
// // $public_key  = $key->getPublicKey($private_key);

// // echo 'privatekey: '.$key->convertPrivateKeyToBech32($private_key).PHP_EOL;


// $note = new Event();
// $note->setContent('test note upload from PHP library to relays');
// $note->setKind(1);

// $signer = new Sign();
// $signer->signEvent($note, "nsec19pthlxcdjmjngj4ctc86ptuu5egdczvftszp0znyp0yxcls8cjqs70gz9c");

// $eventMessage = new EventMessage($note);


// // $websocket = 'ws://127.0.0.1:6969';
// // $relay = new Relay($websocket, $eventMessage);

// // $result = $relay->send();
// // var_dump($eventMessage->generate());

// /*
// *   TEST SUCCESS
// *
// */


// if(!class_exists('database')){
//     class database extends SQLite3{
//         public function __construct($path){
//             $this->open($path);
//         }
//     }
// }
// $db = new database('../nostr_php.db');
// $sql = "SELECT * FROM relays";

// $query = $db->query($sql);
// $relays = [];
// while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
//     $relays[] = $row['relay_url'];
// }


// for ($i = 0; $i < count($relays); $i++) {
//     $relay = new Relay($relays[$i], $eventMessage);
//     var_dump($eventMessage->generate());
//     echo PHP_EOL;
// }
// $result = $relay->send();

// /*
// * NEW TEST SUCCESS
// *
// */

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
$note->setContent('test upload 2');
$note->setKind(1);

$signer = new Sign();
$tohex = $key->convertToHex("nsec19pthlxcdjmjngj4ctc86ptuu5egdczvftszp0znyp0yxcls8cjqs70gz9c");
$signer->signEvent($note, $tohex);

$eventMessage = new EventMessage($note);


$websocket = 'ws://127.0.0.1:6969';
$relay = new Relay($websocket, $eventMessage);

$result = $relay->send();
var_dump($eventMessage->generate());

/*
*   TEST SUCCESS
*
*/