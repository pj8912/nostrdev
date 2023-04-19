<h2>Keys</h2> Generate keys and Convert keys

<hr>

<div style="border: 1px solid #eee; padding:10px">
    <h3> Generate Keys </h3>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <button type="submit" name="genkeys"> Generate Keys </button>
    </form>
</div>
<br>
<div style="border: 1px solid #eee; padding:10px">

    <h3>Converting keys (bech32->h, hex->bech32)</h3>

    <div style="border: 1px solid #eee; padding:10px">

        <h4>Convert bech32 encoded keys (npub, nsec) to hex</h4>
        <input type="text" name="hex_public_key" id="npublic_key" placeholder="Public key(npub/nsec)">
        <button onclick="converKeys()"> Convert to hex </button>
    </div>

    <div style="border: 1px solid #eee; padding:10px">
        <h4>Convert hex keys to bech32 (npub, nsec)</h4>
        <input type="text" name="hex_public_key" id="hexpublic_key" placeholder="Public Key(hex)">
        <br>
        <input type="text" name="hex_private_key" id="hexprivate_key" placeholder="Private Key(hex)">
        <br>
        <button onclick="convert_to_bech32()"> Convert to bech32 </button>
    </div>

</div>

<script src="app.js"></script>