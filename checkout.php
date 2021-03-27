<?php
$config = include('config.php');

// Usually you would have a database with all articles, but in this case it's enough.
$products = array(
        'Hacker Hoodie'     => 34.95,
        'The Mug'           => 14.99,
        'Back to the roots' => 9.99,
        'regular Shirt'     => 16.45,
        'The Bag'           => 13.89
);

$order_not_found = false;
$order_status = 0;
$show_cart = true;

function post($url, $data) {
    $crl = curl_init($url);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($crl, CURLINFO_HEADER_OUT, true);
    curl_setopt($crl, CURLOPT_POST, true);
    curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode($data));

    // Set HTTP Header for POST request
    curl_setopt($crl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($data)))
    );

    // Submit the POST request
    $result = curl_exec($crl);
    curl_close($crl);

    echo '<pre>' . var_dump($result) . '</pre>';

    return $result;
}

function getRandomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$db = new SQLite3('../db/orders.sqlite');

// Create invoice
if (isset($_POST['bag'])) {
    $bag = json_decode($_POST['bag'], true);
    $bagClone = array();

    foreach ($bag as $item) {
        if (!in_array($item['product'], array_keys($products))) {
            continue;
        }

        $price = $products[$item['product']] * (int) $item['quantity'];

        array_push($bagClone, array(
                'price' => $price,
                'name'  => $item['product'],
                'image' => $config['base_url'] . '/assets/img/' . $item['product'] . '.jpg',
                'quantity'  => $item['quantity']
        ));
    }

    $callback_secret = getRandomString(16);
    $order_id = getRandomString(16);

    $stmt = $db->prepare('INSERT INTO `orders` (id, secret, bag, completed) VALUES (:id, :secret, :bag, :completed)');
    $stmt->bindValue(':id', $order_id);
    $stmt->bindValue(':secret', $callback_secret);
    $stmt->bindValue(':bag', json_encode($bagClone));
    $stmt->bindValue(':completed', 0);
    $result = $stmt->execute();

    $id = $db->lastInsertRowID();

    post($config['backend_url'] . '/invoice?secret=' . $config['invoice_secret'], array(
        'selector'      => $order_id,
        'successUrl'    => 'http://localhost/checkout.php?s=' . $callback_secret . '&status=1',
        'failUrl'    => 'http://localhost/checkout.php?s=' . $callback_secret . '&status=2',
        'cancelUrl'     => 'http://localhost/checkout.php?s=' . $callback_secret . '&status=3',
        'redirectTo'    => 'http://localhost/checkout.php?order=' . $order_id,
        'currency'      => 'eur',
        'cart'          => $bagClone
    ));

    header('Location: ' . $config['frontend_url'] . '/pay/' . $order_id);
}

// Callback
if (isset($_GET['s'])) {
    $stmt = $db->prepare('SELECT * FROM `orders` WHERE secret = :secret');
    $stmt->bindValue(':secret', $_GET['s']);
    $result = $stmt->execute();

    $fetch = $result->fetchArray();
    if (!$fetch) {
        die();
    } else {
        if (!isset($_GET['status'])) {
            die();
        }

        $stmt = $db->prepare('UPDATE orders SET completed = :status WHERE secret = :secret');
        $stmt->bindValue(':secret', $_GET['s']);
        $stmt->bindValue(':status', (int) $_GET['status']);
        $result = $stmt->execute();
    }

    die();  // Because only the api calls this page, we don't need to show any content.
}

// Show status
if (isset($_GET['order'])) {
    $show_cart = false;
    $order_id = $_GET['order'];

    $stmt = $db->prepare('SELECT * FROM `orders` WHERE id = :id');
    $stmt->bindValue(':id', $order_id);
    $result = $stmt->execute();

    $fetch = $result->fetchArray();
    if (!$fetch) {
        $order_not_found = true;
    } else {
        $order_status = $fetch['completed'];
    }
}
$db->close();
?>
<!DOCTYPE HTML>
<!--
	Photon by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>LibreShop</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core@0.4.0/dist/animxyz.min.css">
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">
    <section id="header">
        <div class="inner">
            <!--<span class="icon solid major <?php echo $order_not_found ? 'fa-question' : 'fa-shopping-cart' ?>"></span>
            <h1><?php echo $order_not_found ? 'Order not found' : 'Checkout' ?></h1>
            <p><?php echo $order_not_found ? 'This order may never existed or got wiped out of existence.' : 'Once you\'re satisfied with your chosen articles you\'ll<br />be ready to experience the power of LibrePay.' ?>
                </p><br />-->

            <?php if ($show_cart) echo '
            <span class="icon solid major fa-shopping-cart"></span>
            <h1>Checkout</h1>
            <p>Once you\'re satisfied with your chosen articles you\'ll<br />be ready to experience the power of LibrePay.</p><br />

            <!-- List will be filled by JavaScript -->
            <form method="post" action="checkout.php">
                <ul id="bagList" xyz="fade-100% down-3 stagger-2"></ul>

                <!-- This is kind of a messy way but this element holds the bag content in JSON. -->
                <!-- It will later be validated by PHP. -->
                <input id="bagContent" name="bag" style="display: none" value="">
                
                <h3>Total of <span id="bagValue"></span></h3>
                <button class="lbButton" type="submit">Buy with LibrePay</button>
            </form>
            '; else {
                if (!$order_not_found) {
                    echo '
                    <span class="icon solid major fa-eye"></span>
                    <h1>Your order</h1>
                    <p>Thank you for purchase. You\'ll find your order details down below.</p><br />
                    ';

                    switch ($order_status) {
                        case 0:
                            echo '<p>Your purchase is <b>still pending</b>!</p>';
                            echo '<small><a href="http://localhost:4200/pay/' . $order_id . '">Click here to return to LibrePay</a></small>';
                            break;
                        case 1:
                            echo '<p>Your purchase was <b>confirmed</b>!</p>';
                            echo '<small>Your ordered items are on there way to undefined.</small>';
                            break;
                        case 2:
                            echo '<p>Your pruchase has <b>failed</b>!</p>';
                            echo '<small>Maybe you paid too little or it\'s our fault.<br />If the problem does not go away, please contact us.</small>';
                            break;
                        case 3:
                            echo '<p>You\'ve <b>cancelled</b> your order!</p>';
                            echo '<small>Don\'t want your items? That\'s okay :c</small>';
                            break;
                    }
                } else {
                    echo '
                    <span class="icon solid major fa-question"></span>
                    <h1>Order not found</h1>
                    <p>This order may never existed or got wiped out of existence.</p>
                    ';
                }
            } ?>
        </div>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="copyright">
            <li>&copy; LibrePay</li>
            <li>Shoutout to <a href="http://html5up.net">HTML5 UP</a></li>
            <li>Download dummy shop <a href="https://github.com/InstantCodee/LibreShop" target="_blank">here</a></li>
        </ul>
    </section>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/shop.js"></script>
</body>

</html>