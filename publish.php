<?php include 'includes/header.php'; ?>

<div class="container mt-5">


    <div class="card card-body col-md-4 m-auto">
        <p class="h3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
            </svg>
            Publish Note
        </p>
        <div class="mb-2">
            <textarea name="message" id="note" cols="30" rows="10" class="form-control" placeholder="Write Something"></textarea>
        </div>
        <div class="mb-2"><input type="text" name="public_key" placeholder="Public Key*" class="form-control"></div>
        <div class="mb-2"><input type="text" name="private_key" placeholder="Private Key*" class="form-control"></div>

        <button id="btn" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rss" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                <path d="M5.5 12a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-3-8.5a1 1 0 0 1 1-1c5.523 0 10 4.477 10 10a1 1 0 1 1-2 0 8 8 0 0 0-8-8 1 1 0 0 1-1-1zm0 4a1 1 0 0 1 1-1 6 6 0 0 1 6 6 1 1 0 1 1-2 0 4 4 0 0 0-4-4 1 1 0 0 1-1-1z" />
            </svg>
            Publish
        </button>

    </div>


</div>

<script>
    const btn = document.querySelector('#btn');
    btn.onclick = () => {
        const note_message = document.querySelector('#note');

        let textMessage = '';
        note_message.addEventListener('input', (e) => {
            textMessage = e.value.trim();
        })
        if (textMessage.length > 0) {

        } else {
            displayPopup('Empty Message');
        }
    }
    // just alert message for now
    function displayPopup(message) {
        alert(message)
        // message.style.color = 'white'
    }

    // publish message
    function publishMessage(message) {
        fetch('publish_message.php', {
                method: 'POST',
                body: JSON.stringify({
                    note: message
                })
            })
            .then(response => response.json())
            .catch(err => console.log(err))
    }
</script>


<?php include 'includes/footer.php'; ?>