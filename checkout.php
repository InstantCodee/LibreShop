<?php
$config = include('config.php');

// Usually you would have a database with all articles, but in this case it's enough.
$products = array(
    'Hacker Hoodie' => 34.95,
    'The Mug' => 14.99,
    'Back to the roots' => 34.99,
    'regular Shirt' => 10.69,
    'The Bag' => 3.89
);

$order_not_found = false;
$order_status = 0;
$show_cart = true;

function post($url, $data)
{
    $body = str_replace('\\', '', json_encode($data));
    $crl = curl_init($url);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($crl, CURLINFO_HEADER_OUT, true);
    curl_setopt($crl, CURLOPT_POST, true);
    curl_setopt($crl, CURLOPT_POSTFIELDS, $body);

    // Set HTTP Header for POST request
    curl_setopt($crl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($body))
    );

    // Submit the POST request
    $result = curl_exec($crl);
    curl_close($crl);

    return $result;
}

function getRandomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$db = new mysqli($config['mysql']['host'], $config['mysql']['username'], $config['mysql']['password'], $config['mysql']['database']);
if ($db->connect_error) {
    die('Connection to MySQL failed');
}

// Create invoice
if (isset($_POST['bag'])) {
    $bag = json_decode($_POST['bag'], true);
    $bagClone = array();

    foreach ($bag as $item) {
        if (!in_array($item['product'], array_keys($products))) {
            continue;
        }

        $price = $products[$item['product']];

        array_push($bagClone, array(
            'price' => $price,
            'name' => $item['product'],
            'image' => $config['base_url'] . '/assets/img/' . $item['product'] . '.jpg',
            'quantity' => $item['quantity']
        ));
    }

    if (count($bagClone) == 0) {
        return;
    }

    $callback_secret = getRandomString(16);
    $order_id = getRandomString(16);
    $order_status = 0;

    $stmt = $db->prepare('INSERT INTO orders (id, secret, bag, completed) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('sssi', $order_id, $callback_secret, json_encode($bagClone), $order_status);
    $result = $stmt->execute();

    post($config['backend_url'] . '/invoice?secret=' . $config['invoice_secret'], array(
        'selector' => $order_id,
        'successUrl' => $config['base_url'] . '/checkout.php?s=' . $callback_secret . '&status=1',
        'failUrl' => $config['base_url'] . '/checkout.php?s=' . $callback_secret . '&status=2',
        'cancelUrl' => $config['base_url'] . '/checkout.php?s=' . $callback_secret . '&status=3',
        'redirectTo' => $config['base_url'] . '/checkout.php?order=' . $order_id,
        'currency' => 'eur',
        'cart' => $bagClone
    ));

    header('Location: ' . $config['frontend_url'] . '/pay/' . $order_id);
}

// Callback
if (isset($_GET['s'])) {
    $stmt = $db->prepare('SELECT * FROM `orders` WHERE secret = ?');
    $stmt->bind_param('s', $_GET['s']);
    $result = $stmt->execute();

    $fetch = $stmt->get_result();
    if (!$fetch) {
        die('Order not found');
    } else {
        if (!isset($_GET['status'])) {
            die('Status not set');
        }
        $status = (int) $_GET['status'];

        $stmt = $db->prepare('UPDATE orders SET completed = ? WHERE secret = ?');
        $stmt->bind_param('is', $status, $_GET['s']);
        $result = $stmt->execute();
        die('OK');  // Because only the api calls this page, we don't need to show any content.
    }
}

// Show status
if (isset($_GET['order'])) {
    $show_cart = false;
    $order_id = $_GET['order'];

    $stmt = $db->prepare('SELECT * FROM `orders` WHERE id = ?');
    $stmt->bind_param('s', $order_id);
    $result = $stmt->execute();

    $fetch = $stmt->get_result();
    if ($fetch->num_rows == 0) {
        $order_not_found = true;
    } else {
        $order_status = $fetch->fetch_array()['completed'];
    }
}
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
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="assets/css/custom.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core@0.4.0/dist/animxyz.min.css">
    <link rel="shortcut icon" href="favicon.ico"/>
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css"/>
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
            <form method="post" action="checkout.php" id="cart">
                <ul id="bagList" xyz="fade-100% down-3 stagger-2"></ul>

                <!-- This is kind of a messy way but this element holds the bag content in JSON. -->
                <!-- It will later be validated by PHP. -->
                <input id="bagContent" name="bag" style="display: none" value="">

                <h3>Total of <span id="bagValue"></span></h3>
                <button class="lbButton" type="submit">Buy with LibrePay</button>
            </form>
            <div id="cart_empty" style="display: none">
                <h3>Your cart is empty</h3>
                <a href="' . $config['base_url'] . '">Let\'s go shopping</a>
            </div>
            
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
                        echo '<small><a href="' . $config['frontend_url'] . '/pay/' . $order_id . '">Click here to return to LibrePay</a></small>';
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
