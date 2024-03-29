<?php
require_once 'vendor/autoload.php';
use NostrDev\Template\Template;
$template = new Template();
$template->main_header();
?>
<div class="container mt-5">
    <div class="main-title">
        <img src="includes/nostr-logo.png" alt="nostr-logo" width="80" height="50">
        <span class="h2">
            NostrDev
        </span>
    </div>
    <br>
    <div class="links"><a href="/allkeys"><i class="fas fa-key"></i> Keys</a>
        <a href="/publishpage"><i class="fas fa-rss-square"></i> Publish</a>
        <a href="/relayspage"><i class="fas fa-server"></i> Relays</a>
        <a href="https://github.com/pj8912/nostrdev"><i class="fa fa-github"></i> Github</a>
    </div>
    <hr>
    <div class="mt-3">
        <h4>Features</h4>
        <ul style="list-style: none;">
            <li>&#8594; Generate Keys</li>
            <li>&#8594; Convert Keys</li>
            <li>&#8594; Publish a Note</li>
            <li>&#8594; Add Relays</li>
        </ul>
    </div>
</div>
<?php
$template->main_footer();
?>

