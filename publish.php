<?php
require_once 'vendor/autoload.php';

use swentel\nostr\Event\Event;
use swentel\nostr\Message\EventMessage;
use swentel\nostr\Relay\Relay;
use swentel\nostr\Sign\Sign;
use swentel\nostr\Key\Key;

require 'sql.php';

if (isset($_POST['sbtn'])) {

    $key = new Key();
    $note = new Event();
    $note->setContent(trim($_POST['note_value']));
    $note->setKind(1);

    $signer = new Sign();
    $tohex = $key->convertToHex(trim($_POST['private_key']));
    $signer->signEvent($note, $tohex);
    $eventMessage = new EventMessage($note);

    $db = new SQLite3('nostr_php.db');
    $sql = "SELECT * FROM relays";

    $query = $db->query($sql);
    $relays = [];
    while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
        $relays[] = $row['relay_url'];
    }

    for ($i = 0; $i < count($relays); $i++) {
        $relay = new Relay($relays[$i], $eventMessage);
        $relay->send();
        // var_dump($eventMessage->generate());
        // echo PHP_EOL;
    }
    header('Location: publish.php?success');

}
?>
