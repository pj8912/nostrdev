<?php

$db = new SQLite3('nostr_php.db');
$sql = "CREATE TABLE IF NOT EXISTS events(event_string TEXT, created_at DATETIME DEFAULT CURRENT_TIMESTAMP)";
$db->exec($sql);
echo "table created successfully!";