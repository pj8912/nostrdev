<?php

require_once "sql.php";
$db = new database('nostr_php.db');
$sql = "SELECT * FROM relays";
$query = $db->query($sql);
$relay_list = [];

if ($res) {
    while($row = $res->fetchArray(SQLITE3_ASSOC)){
        $relay_list[] = $row['relay_url'];
    }
    exit(json_encode(
        [
            'status' => 1,
            'data' => $relay_list
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
