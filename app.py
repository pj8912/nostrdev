from flask import Flask, render_template
from nostr.key import PrivateKey
import json
import ssl
import time
from nostr.relay_manager import RelayManager



app = Flask(__name__)


@app.route('/')
def home():
    return render_template("index.html")


@app.route('/keys')
def keys():
    return render_template("keys.html")


@app.route('/getkeys', methods=['POST'])
def getKeys():
    private_key = PrivateKey()
    public_key = private_key.public_key
    pr_k= private_key.bech32()
    pub_k =  public_key.bech32()   
    return render_template("keys.html", public_key=pub_k, private_key=pr_k)


@app.route('/relays')
def relays():
    return render_template('relays.html')

@app.route('/add_relay', methods=['POST'])
def add_relay():
    pass

@app.route('/publishpage')
def publish_page():
    return render_template('publish.html')


if __name__ == "__main__":
    app.run(debug=True,port=7000)


