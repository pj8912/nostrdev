<?php


//create database test --WORKING

// if (file_exists('nostr_php.db')) {
//     echo 'Database exists';
//     exit;
// }


// $db = new SQLite3('nostr_php.db');

// //create relays table
// $db->exec("CREATE TABLE IF NOT EXISTS relays(
//     r_id INTEGER PRIMARY KEY AUTOINCREMENT,
//     relay_url TEXT NOT NULL,
//     created_at DATETIME DEFAULT CURRENT_TIMESTAMP
// )");

// database class and the database
require_once "sql.php";
$db = new database('nostr_php.db');

// insert test  -- WORKING


// $ws_url = "ws://127.0.0.1:6969";
// $sql = "INSERT INTO relays(relay_url) VALUES('$ws_url')";
// if($db->query($sql)){
//     echo "DATA UPLOADED!";
// }
// else{
//     echo "DATA UPLOAD FAILED";
// } 




// fetch test --WORKING

$sql = "SELECT * FROM relays";
$res = $db->query($sql);
if($res){
    while($row = $res->fetchArray(SQLITE3_ASSOC)){
        echo $row['relay_url'].PHP_EOL;
    }
}
