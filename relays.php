<h2>Relays</h2>

<div style="border: 1px solid #eee; padding:10px">
    <div class="status_message"></div>
    <h3>Add Relays</h3>
    <input type="text" name="relay" id="relay-input" placeholder="Add Relay">
    <button onclick="addRelay()">Add Relay</button>
    <hr>
    <div class="relays">
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