# ViacoinWHMCS
A WHMCS Payment Gateway for accepting Viacoin

## Dependancies
This plugin is rather simple but there are a few things that need to be set up before hand.

* A web server! Ideally with the most recent versions of PHP and mysql

* The Viacoin wallet-cli and Viacoin wallet-rpc tools found [here](https://getmonero.org/downloads/)

* [WHMCS](https://www.whmcs.com/)
This Viacoin plugin is a payment gateway for WHMCS

## Step 1: Activating the plugin
* Downloading: First of all, you will need to download the plugin.  If you wish, you can also download the latest source code from GitHub. This can be done with the command `git clone https://github.com/onurrr/viacoinwhmcs.git` or can be downloaded as a zip file from the GitHub web page.


* Put the plugin in the correct directory: You will need to copy `viacoin.php` and the folder named `viacoin` from this repo/unzipped release into the WHMCS Payment Gateways directory. This can be found at `whmcspath/modules/gateways/`

* Activate the plugin from the WHMCS admin panel: Once you login to the admin panel in WHMCS, click on "Setup -> Payments -> Payment Gateways". Click on "All Payment Gateways". Then click on the "Viacoin" gateway to activate it.

* Enter a Module Secret Key.  This can be andy random text and is used to verify payments.  

* Enter the values for Wallet RPC Host, Wallet RPC Port, Username, and Password (these are from viacoin-wallet-rpc below).  Optionally enter a percentage discount for all invoices paid via Viacoin.

* Optionally install the addon module to disable WHMCS fraud checking when using Viacoin. You will need to copy the folder `addons/viacoinenable/` from this repo/unzipped release into the WHMCS Addons directory. This can be found at `whmcspath/addons/`.  

* Activate the Viacoin Enabler addon from the WHMCS admin panel: Click on "Setup -> Addon Modules". Find "Viacoin Enabler" and click on "Activate". Click "Configure" and choose the Viacoin Payment Gateway in the drop down list. Check the box for "Enable checking for payment method by module" and click "Save Changes".

## Step 2: Get a viacoin daemon to connect to

To do this: start the viacoin daemon on your server and leave it running in the background. This can be accomplished by running `./viacoind` inside your viacoin downloads folder. The first time that you start your node, the viacoin daemon will download and sync the entire viacoin blockchain. This can take several hours and is best done on a machine with at least 4GB of ram, an SSD hard drive (with at least 15GB of free space), and a high speed internet connection.

## Step 3: Setup your  viacoin wallet-rpc

* Setup a viacoin wallet using the viacoin-wallet-cli tool. If you do not know how to do this you can learn about it at [getmonero.org](https://getmonero.org/resources/user-guides/monero-wallet-cli.html)

* Start the Wallet RPC and leave it running in the background. This can be accomplished by running `./viacoin-wallet-rpc --rpc-bind-port 18082 --rpc-login username:password --log-level 2 --wallet-file /path/walletfile` where "username:password" is the username and password that you want to use, seperated by a colon and  "/path/walletfile" is your actual wallet file.



## Info on server authentication
It is reccommended that you specify a username/password with your wallet rpc. This can be done by starting your wallet rpc with `viacoin-wallet-rpc --rpc-bind-port 18082 --rpc-login username:password --wallet-file /path/walletfile` where "username:password" is the username and password that you want to use, seperated by a colon. Alternatively, you can use the `--restricted-rpc` flag with the wallet rpc like so `./viacoin-wallet-rpc --testnet --rpc-bind-port 18082 --restricted-rpc --wallet-file wallet/path`.
