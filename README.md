# LibreShop [[Demo](https://demo.librepay.me)]
The LibreShop is a small dummy shop where you can use LibrePay to buy items.  It interacts with the LibrePay backend &
frontend.

## Install
Simply **put this repository somewhere on your website** (e.g. in a subdirectory). Next up you'll have to **rename** the
`config.example.php` into `config.php` and replace the values in there to fit your configuration. Also make sure you have
the `mysqli`, `pdo_mysql` and `curl` **extensions enabled** in your `php.ini`.

Now setup a new MySQL server (if you haven't yet) and create this table in some database:
```sql
CREATE TABLE orders (id VARCHAR(16) PRIMARY KEY, secret VARCHAR(16) NOT NULL, bag TEXT NOT NULL, completed INTEGER);
```

Now you should be able to access and view the website.

*This website is live with PHP 7.2 running on a lighttpd server.*

## Disclaimer
Of course none of the listed items can actually be bought and the payment process can only be completed with
testnet coins.

## Credit
This dummy shop uses the [Photon template by HTML5 Up](https://html5up.net/photon). The mockup image for the hoodie was made by [Vectorium](https://www.freepik.com/psd/mockup)
and the others were taken from Adobe's stock page with the appropriate license and [MrMockup](https://mrmockup.com/). Icons are provided by [FontAwesome](https://fontawesome.com/).
