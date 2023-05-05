<?php
require_once "sql.php";
$db = new database('nostr_php.db');
$sql = "SELECT * FROM relays";
$query = $db->query($sql);
$relay_list = [];
if ($query) {
    while ($row = $query->fetchArray(SQLITE3_ASSOC)) {
        $relay_list[] = $row['relay_url'];
    }
    exit(json_encode(
        [
            'status' => 1,
            'relays' => $relay_list
        ]
    ));
}
else {
    exit(json_encode(
        [
            'status' => 0,
            'message' => 'No relays added'
        ]
    ));
}