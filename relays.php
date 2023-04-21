<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-server" viewBox="0 0 16 16">
            <path d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z" />
            <path d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z" />
            <path d="M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z" />
        </svg>Relays</h2>

    <div style="border: 1px solid #eee; padding:10px">
        <div class="status_message"></div>
        <input type="text" name="relay" id="relay-input" placeholder="Add Relay">
        <button onclick="addRelay()">Add Relay</button>
        <hr>
        <div class="relays">
        </div>
    </div>

</div>

<script>
    async function addRelay() {
        const relayURL = document.querySelector('#relay-input').value;
        await fetch('upload_relay.php', {
                method: "POST",
                body: JSON.stringify({
                    wsurl: relayURL
                })
            })
            .then(response => response.json())
            // .then(data => console.log(data.message))
            .then(message => {
                if (message.status === 0) {
                    document.querySelector('#status_message').innerHTML = message.message
                } else if (message.status === 1) {
                    document.querySelector('#status_message').innerHTML = message.message
                }
            })
            .catch(err => console.log(err))
        document.getElementById('relay-input').value = '';
        fetchRelays();
    }

    function fetchRelays() {

        fetch('get_relays.php')
            .then(res => res.json())
            .then((data) => {
                if (data.status == 0) {
                    document.querySelector('#status_message').innerHTML = 'No relays'
                } else if (data.status === 1) {
                    console.log("Relays available")
                }
            })
            .catch((err) => console.log(err))
    }

    window.onload = () => fetchRelays();
</script>

<?php include 'includes/footer.php'; ?>