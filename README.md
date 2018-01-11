# MyntWP
A WooCommerce extension for accepting Mynt

## Dependancies
This plugin is rather simple but there are a few things that need to be set up before hand.

* A web server! Ideally with the most recent versions of PHP and mysql

* The Mynt wallet-cli and Mynt wallet-rpc tools found [here](https://getmynt.org/downloads/)

* [WordPress](https://wordpress.org)
Wordpress is the backend tool that is needed to use WooCommerce and this Mynt plugin

* [WooCommerce](https://woocommerce.com)
This Mynt plugin is an extension of WooCommerce, which works with WordPress

## Step 1: Activating the plugin
* Downloading: First of all, you will need to download the plugin. You can download the latest release as a .zip file from https://github.com/mynt-project/myntwp/releases If you wish, you can also download the latest source code from GitHub. This can be done with the command `git clone https://github.com/mynt-integrations/myntwp.git` or can be downloaded as a zip file from the GitHub web page.

* Unzip the file myntwp_release.zip if you downloaded the zip from the releases page [here](https://github.com/mynt-project/myntwp/releases).

* Put the plugin in the correct directory: You will need to put the folder named `mynt` from this repo/unzipped release into the wordpress plugins directory. This can be found at `path/to/wordpress/folder/wp-content/plugins`

* Activate the plugin from the WordPress admin panel: Once you login to the admin panel in WordPress, click on "Installed Plugins" under "Plugins". Then simply click "Activate" where it says "Mynt - WooCommerce Gateway"

## Step 2: Get a mynt daemon to connect to

### Option 1: Running a full node yourself

To do this: start the mynt daemon on your server and leave it running in the background. This can be accomplished by running `./myntd` inside your mynt downloads folder. The first time that you start your node, the mynt daemon will download and sync the entire mynt blockchain. This can take several hours and is best done on a machine with at least 4GB of ram, an SSD hard drive (with at least 40GB of free space), and a high speed internet connection.

### Option 2: Connecting to a remote node
The easiest way to find a remote node to connect to is to visit [myntworld.com](https://myntworld.com/#nodes) and use one of the nodes offered. It is probably easiest to use node.myntworld.com:18089 which will automatically connect you to a random node.

## Step 3: Setup your  mynt wallet-rpc

* Setup a mynt wallet using the mynt-wallet-cli tool. If you do not know how to do this you can learn about it at [myntnote.org](https://myntnote.org/)

* [Create a view-only wallet from that wallet for security.](https://monero.stackexchange.com/questions/3178/how-to-create-a-view-only-wallet-for-the-gui/4582#4582)

* Start the Wallet RPC and leave it running in the background. This can be accomplished by running `./mynt-wallet-rpc --rpc-bind-port 18082 --disable-rpc-login --log-level 2 --wallet-file /path/viewOnlyWalletFile` where "/path/viewOnlyWalletFile" is the wallet file for your view-only wallet. If you wish to use a remote node you can add the `--daemon-address` flag followed by the address of the node. `--daemon-address node.myntworld.com:18089` for example.

## Step 4: Setup Mynt Gateway in WooCommerce

* Navigate to the "settings" panel in the WooCommerce widget in the WordPress admin panel.

* Click on "Checkout"

* Select "Mynt GateWay"

* Check the box labeled "Enable this payment gateway"

* Enter your mynt wallet address in the box labled "Mynt Address". If you do not know your address, you can run the `address` commmand in your mynt wallet

* Enter the IP address of your server in the box labeled "Mynt wallet rpc Host/IP"

* Enter the port number of the Wallet RPC in the box labeled "Mynt wallet rpc port" (will be `22092` if you used the above example).

* Enter the username and password that you want to use in their respective feilds

* Click on "Save changes"

## Donating to the Devs :)
XMR Address : `XSwVkm6aNxF5561yAeAssYZijk5op57G342vdniS7zYBB5tMtJci9pCAfw6wsGNwopHHoDRLfZNA5BbAw8xjHYfW2jaA2VBPs`
