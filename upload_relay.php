<?php
$postdata = file_get_contents("php://input");
$req = json_decode($postdata);
$ws_url = $req->wsurl;

require_once "sql.php";
$db = new database('nostr_php.db');
$sql = "INSERT INTO relays(relay_url) VALUES('$ws_url')";
if ($db->query($sql)) {
    exit(json_encode([
        'status' => 1,
        'message' => 'Relay added successfully!'

    ]));
} else {
    exit(json_encode([
        'status' => 0,
        'message' => 'Relay upload Failed!',

    ]));
}
