<div align="center">
    <textarea name="message" id="note" cols="30" rows="10" placeholder="Write Something"></textarea>
    <br>
    <button id="btn">Submit</button>

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
            
        } 
        else {
            displayPopup('Empty Message');
        }
    }
    // just alert message for now
    function displayPopup(message) {
        alert(message)
        // message.style.color = 'white'
    }

    // publish message
    function publishMessage(message){
        fetch('publish_message.php',{
            method: 'POST',
            body: JSON.stringify({
                note : message
            })
        })
        .then(response => response.json())
        .catch(err => console.log(err))
}
</script>