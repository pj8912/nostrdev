<?php
require_once "sql.php";
$db = new database('nostr_php.db');
$postdata = file_get_contents("php://input");
$req = json_decode($postdata);
$ws_url = $req->relayurl;

$sql = "INSERT INTO relays(relay_url) VALUES('$ws_url')";
// $res = $db->query($sql);

if ($db->query($sql)) {
    exit(json_encode(
        [
            'status' => 1,
            'message' => "relay added successfully"
        ]
    ));
} else {
    exit(json_encode(
        [
            'status' => 0,
            'data' => 'No relays added'
        ]
    ));
}

