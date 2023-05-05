<?php
include 'includes/header.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL & ~E_NOTICE);

?>
<div class="container">

    <div class="card card-body col-md-4 mt-5">
        <h3>Publish Note</h3>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-2">
                <textarea type="text" name="note_value" cols="30" class="form-control" placeholder="Write Something...." rows="10"></textarea>
            </div>
            <div class="mb-2">
                <input type="text" name="private_key" class="form-control" placeholder="Private Key(nsec....)">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit" name="sbtn">Publish</button>
            </div>

        </form>
    </div>
</div>

<?php
include 'includes/footer.php';
?>

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