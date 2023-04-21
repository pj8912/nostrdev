<?php include 'includes/header.php'; ?>
<div class="container mt-5">


    <h2> <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg> Keys</h2> Generate keys and Convert keys

    <hr>

    <div style="border: 1px solid #eee; padding:10px">
        <h3> Generate Keys </h3>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <button type="submit" name="genkeys" class="btn btn-success"> Generate Keys </button>
        </form>
    </div>
    <br>
    <div style="border: 1px solid #eee; padding:10px">

        <p><span class="h3">Converting keys</span> <span class="text-secondary">[bech32->hex, hex->bech32]</span></p>

        <div style="border: 1px solid #eee; padding:10px">

            <h4>Convert bech32 encoded keys (npub, nsec) to hex</h4>
            <input type="text" name="hex_public_key" id="npublic_key" class="form-control" placeholder="Public key(npub/nsec)"><br>
            <button onclick="converKeys()" class="btn btn-primary"> Convert to hex </button>
        </div>

        <div style="border: 1px solid #eee; padding:10px;margin-top:10px">
            <h4>Convert hex keys to bech32 (npub, nsec)</h4>
            <input type="text" name="hex_public_key" id="hexpublic_key" class="form-control" placeholder="Public Key(hex)">
            <br>
            <input type="text" name="hex_private_key" id="hexprivate_key" class="form-control" placeholder="Private Key(hex)">
            <br>
            <button onclick="convert_to_bech32()" class="btn btn-primary"> Convert to bech32 </button>
        </div>

    </div>
</div>

<script src="app.js"></script>
<?php include 'includes/footer.php'; ?>