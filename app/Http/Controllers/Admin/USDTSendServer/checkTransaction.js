
var args = process.argv.slice(2);

if (args.length<3) {
    console.log(args);
    console.log(0); //status
    console.log('Sender Address, Receiver Address and amount are required.'); // message
    process.exit();
}

const from = args[0];
const to = args[1];
const amount = args[2];
const tx_id = args[3];

const checkTransaction = async (from, to, amount, tx_id) => {
    var Tx     = require('ethereumjs-tx');
    const Web3 = require('web3');
    const web3 = new Web3('https://mainnet.infura.io/v3/5be6fa190df6478c910c7f6431285bed');

    web3.eth.getTransaction(tx_id, function(err, result) {
        if(result.to == "0xdAC17F958D2ee523a2206206994597C13D831ec7"){
            console.log(true);
        }
        process.exit();
    });
}
checkTransaction(from, to, amount, tx_id);