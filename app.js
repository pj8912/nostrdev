
function generateKeys() {
    const keysBox = document.querySelector('#allkeys');
    const errmsg = document.querySelector('#errmsg');
    fetch('genkeys.php', {
        method: "POST",
        body: JSON.stringify({
            data: "getkeys"
        })
    })
        .then(response => response.json())
        .then((response) => {
            if (response.status == 1) {

                const divElement1 = document.createElement('div');
                divElement1.style.border = '2px solid green';
                divElement1.style.padding = '10px';
                divElement1.style.wordBreak = 'break-all';
                divElement1.style.margin = '2px';
                divElement1.innerHTML = `Public Key: <span id="pwd_spn1" class="password-span">  ${response.public_key} </span> <button onclick="copy_keys('pwd_spn1')" style="background:white;border:none;" id="cp_btn1" onclick="copy_password1()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
  <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z"/>
</svg></button>`;
                keysBox.appendChild(divElement1);

                const divElement2 = document.createElement('div');
                divElement2.style.border = '2px solid red';
                divElement2.style.padding = '10px';
                divElement2.style.wordBreak = 'break-all';
                divElement2.style.margin = '2px';
                divElement2.innerHTML = `Private Key: <span id="pwd_spn2" class="password-span"> ${response.private_key} </span> <button onclick="copy_keys('pwd_spn1')" style="background:white;border:none;" id="cp_btn2" onclick="copy_password2()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
  <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z"/>
</svg></button>`;
                keysBox.appendChild(divElement2);

            }
            else if (response.status == 0) {
                errmsg.innerHTML = 'KeyPair Generation Failed!!'
            }
        })
        .catch(err => console.log(err))
    keysBox.innerHTML = '';
}


//copy generated keys
function copy_keys(id){
    var copyText = document.getElementById(id)
    var textArea = document.createElement("textarea")
    textArea.value = copyText.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    textArea.remove();
}


function convertKeys() {

    const converted_key_div = document.querySelector('#converted_key');
    const con_errmsg = document.querySelector('#con_errmsg');
    let val = document.getElementById('key_').value.trim();

    if (val.length > 0)
        fetch('convert_keys.php', {
            method: "POST",
            body: JSON.stringify({
                msg: "convert_to_hex",
                keyx: document.getElementById('key_').value.trim()
            })
        })
            .then(response => response.json())
            .then((response) => {
                if (response.status == 1) {
                    console.log(response.hex_key);
                    const divElement1 = document.createElement('p');
                    divElement1.innerHTML = `Key in hex format:<br> Original Key : ${document.getElementById('key_').value}<br>
                 in hex : ${response.hex_key}`;
                    converted_key_div.appendChild(divElement1)
                }
                else if (response.status == 0) {
                    con_errmsg.innerHTML = response.message;
                }
            })
            .catch(err => console.log(err))

    else return;
}

function convertHexToBech32() {
    let key1 = document.getElementById('key1').value.trim();
    let key2 = document.getElementById('key2').value.trim();
    if (key1.length > 0 && key2.length > 0) {
        fetch('convert_keys.php', {
            method: "POST",
            body: JSON.stringify({
                msg: "convert_to_bech32",
                pubkey: key1,
                privkey: key2
            })
        })
            .then(response => response.json())
            .then((response) => {
                if (response.status == 1) {

                    var publicKey = document.createElement('li');
                    publicKey.innerHTML = `Public Key in bech32 : ${response.public_key}`;
                    document.querySelector('#keylist').appendChild(publicKey);
                    var privateKey = document.createElement('li');
                    privateKey.innerHTML = `Private Key in bech32 : ${response.private_key}`;
                    document.querySelector('#keylist').appendChild(privateKey);
                    var hrline = document.createElement('hr');
                    document.querySelector('#hrline').append = hrline;
                }
                else if (response.status == 0) {
                    document.getElementById("alertmsg").innerHTML = response.message;
                    setTimeout(function () {
                        document.getElementById("alertmsg").innerHTML = '';
                    }, 3000);
                }
                else {
                    console.log('Err: No response')
                }
            })
            .catch(err => console.log(err))
        document.querySelector('#keylist').innerHTML = '';
    }
    else {
        return;
    }
}


function addRelay() {
    var relay_value = document.querySelector('#relay-input').value.trim();
    if (relay_value.length > 0) {
        fetch('add_relay.php', {
            method: "POST",
            body: JSON.stringify({
                relayurl: document.querySelector('#relay-input').value.trim()
            })
        })
            .then((response) => response.json())

            .then(response => {
                if (response.status == 1) {
                    document.getElementById('status_message').innerHTML = response.message;
                    setTimeout(function () {
                        document.getElementById("status_message").innerHTML = '';
                    }, 3000);
                }
                else if (response.status == 0) {
                    document.getElementById('status_message').innerHTML = response.message;
                    setTimeout(function () {
                        document.getElementById("status_message").innerHTML = '';
                    }, 3000);
                }
                else {
                    console.log('err: No response')
                }
            })
            .catch(err => console.log(err))

    }
    else {
        return;
    }
    document.querySelector('#relay-input').value = '';
    fetchRelays();
}


function fetchRelays() {
    fetch('get_relays.php')
        .then(res => res.json())
        .then(response => {
            let op = '';
            if (response.status == 1) {


                const relay_li = document.createElement('li')

                for (let i in response.relays) {

                    console.log(response.relays[i])

                    op += `<li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-server" viewBox="0 0 16 16">
                    <path d="M1.333 2.667C1.333 1.194 4.318 0 8 0s6.667 1.194 6.667 2.667V4c0 1.473-2.985 2.667-6.667 2.667S1.333 5.473 1.333 4V2.667z"/>
                    <path d="M1.333 6.334v3C1.333 10.805 4.318 12 8 12s6.667-1.194 6.667-2.667V6.334a6.51 6.51 0 0 1-1.458.79C11.81 7.684 9.967 8 8 8c-1.966 0-3.809-.317-5.208-.876a6.508 6.508 0 0 1-1.458-.79z"/>
                    <path d="M14.667 11.668a6.51 6.51 0 0 1-1.458.789c-1.4.56-3.242.876-5.21.876-1.966 0-3.809-.316-5.208-.876a6.51 6.51 0 0 1-1.458-.79v1.666C1.333 14.806 4.318 16 8 16s6.667-1.194 6.667-2.667v-1.665z"/>
                  </svg> ${response.relays[i]}</li>`;


                }
                document.querySelector('#relays').innerHTML = op;
            }

            else if (response.status == 0) {

                console.log('err')
            }
        })
        .catch(err => console.log(err))
}
