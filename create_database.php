<?php
if (file_exists('nostr_php.db')) {
    echo 'Database exists';
    exit;
}
$db = new SQLite3('nostr_php.db');
//create relays table
$db->exec("CREATE TABLE IF NOT EXISTS relays(
    r_id INTEGER PRIMARY KEY AUTOINCREMENT,
    relay_url TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");