<?php

require_once 'router.php';

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index

// homepage
get('/', 'views/index.php');

// publish page
get('/publishpage', 'views/publish.php');
// publish
post('/publish','publish.php');

// keys page
get('/allkeys','views/keys.php');

// relayspage
get('/relayspage', 'views/relays.php');





// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');
