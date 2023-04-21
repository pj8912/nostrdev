
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




                divElement1.innerHTML = `Public Key: <span id="pwd_spn1" class="password-span">  ${response.public_key} </span> <button style="background:white;border:none;" id="cp_btn1" onclick="copy_password1()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
  <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z"/>
</svg></button>`;
                keysBox.appendChild(divElement1);

                const divElement2 = document.createElement('div');
                divElement2.style.border = '2px solid red';
                divElement2.style.padding = '10px';
                divElement2.style.wordBreak = 'break-all';
                divElement2.style.margin = '2px';
                divElement2.innerHTML = `Private Key: <span id="pwd_spn2" class="password-span"> ${response.private_key} </span> <button style="background:white;border:none;" id="cp_btn2" onclick="copy_password2()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
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


function copy_password1() {
    var copyText = document.getElementById("pwd_spn1");
    var textArea = document.createElement("textarea");
    textArea.value = copyText.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    textArea.remove();
}


function copy_password2() {
    var copyText = document.getElementById("pwd_spn2");
    var textArea = document.createElement("textarea");
    textArea.value = copyText.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    textArea.remove();
}

function convertKeys() {

    const converted_key_div = document.querySelector('#converted_key');
    const con_errmsg = document.querySelector('#con_errmsg');

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


    // document.getElementById('key_').value = '';
    // converted_key_div.innerHTML = '';
}