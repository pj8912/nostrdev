
<?php

require_once '../vendor/autoload.php';
use NostrDev\Template\Template;

$temp = new Template;
// header test
$temp->main_header();

// footer
$temp->main_footer();



?>