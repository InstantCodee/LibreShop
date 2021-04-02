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
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="favicon.ico" sizes="64x64" type="image/x-icon" />
    <link rel="icon" href="favicon-128.ico" sizes="128x128" type="image/x-icon" />
    <link rel="icon" href="favicon-180.ico" sizes="180x180" type="image/x-icon" />
    <link rel="icon" href="favicon-196.ico" sizes="196x196" type="image/x-icon" />
	<noscript>
		<link rel="stylesheet" href="assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<!-- Shopping bag -->
	<div id="bag">
		<p><b><span id="bagCounter">0</span> products (<span id='bagValue'>0,00 €</span>)</b> in cart<a href="/checkout.php">Checkout >></a></p>
	</div>
	<!-- Header -->
	<section id="header">
		<div class="inner">
			<span class="icon solid major fa-shopping-bag"></span>
			<h1>Hi, ready for some <strong>LibrePay</strong> merch?<br />
				Then check this out 👇🏻</a></h1>
			<p>This is a dummy shop to demonstrate LibrePay in action. We're actually <b>not selling<br /> any of the following products</b>, sorry.</p>
			<ul class="actions special">
				<li><a href="#one" class="button scrolly">Buy merch</a></li>
			</ul>
		</div>
	</section>

	<!-- One -->
	<section id="one" class="main style1">
		<div class="container">
			<div class="row gtr-150">
				<div class="col-6 col-12-medium">
					<header class="major">
						<h2 class="title">LibrePay Hoodie<br />
							for hackers</h2>
					</header>
					<p>You want to look like a badass hacker and to show everyone that you use LibrePay? Then, don't wait much longer! We have what you want.</p>
					<a class="button" onclick="addProduct('Hacker Hoodie', 34.95)">Add hoodie - 34,95 €</a>
				</div>
				<div class="col-6 col-12-medium imp-medium">
					<span class="image fit"><img src="assets/img/Hacker%20Hoodie.jpg" alt="" /></span>
				</div>
			</div>
		</div>
	</section>

	<!-- Two -->
	<section id="two" class="main style2">
		<div class="container">
			<div class="row gtr-150">
				<div class="col-6 col-12-medium">
					<span class="image fit"><img src="assets/img/The Mug.jpg" alt="" /></span>
				</div>
				<div class="col-6 col-12-medium">
					<header class="major">
						<h2 class="title">Introducing: The Mug</h2>
					</header>
					<p>Addicted to coffein? We're too. That's why we offer this awesome LibrePay mug.</p>
					<p>We're honest, it's a regular mug that you would get anywhere else but this mug, damn... Just look at it! It's so beautiful. I bet you have never seen something more beautiful then that!</p>
					<a class="button" onclick="addProduct('The Mug', 14.99)">Add The Mug - 14,99 €</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Three -->
	<section id="three" class="main style1 special">
		<div class="container">
			<header class="major">
				<h2>Other products you don't want to miss</h2>
			</header>
			<p>Want more or you haven't found something that you like? Maybe wan't to give these products a try?</p>
			<div class="row gtr-150">
				<div class="col-4 col-12-medium">
					<span class="image fit"><img src="assets/img/Back%20to%20the%20roots.jpg" alt="" /></span>
					<h3 class="title">Back to the roots</h3>
					<p>You would have wished to wear this bag back in school time.</p>
					<ul class="actions special">
						<li><a class="button" onclick="addProduct('Back to the roots', 34.99)">Add to bag - 34,99 €</a></li>
					</ul>
				</div>
				<div class="col-4 col-12-medium">
					<span class="image fit"><img src="assets/img/regular%20Shirt.jpg" alt="" /></span>
					<h3 class="title">regular T-Shirt</h3>
					<p>For all simple people, we have a regular Shirt for you. Nice to have in a hot summer.</p>
					<ul class="actions special">
						<li><a class="button" onclick="addProduct('regular Shirt', 10.69)">Add to bag - 10,69 €</a></li>
					</ul>
				</div>
				<div class="col-4 col-12-medium">
					<span class="image fit"><img src="assets/img/The Bag.jpg" alt="" /></span>
					<h3 class="title">The Bag</h3>
					<p>Why? When going to shop in a old-fashion real-life store, you need to spread the truth.</p>
					<ul class="actions special">
						<li><a class="button" onclick="addProduct('The Bag', 3.89)">Add to bag - 3,89 €</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Four -->
	<section id="four" class="main style2 special">
		<div class="container">
			<header class="major">
				<h2 id="satisfied">Not satisfied yet?</h2>
			</header>
			<p id="statisfied_sub">Sad but gives us room for improvement.<br />Feel free to write us an email. <i>We don't bite.</i></p>
			<ul class="actions special">
				<li><a href="mailto:contact@librepay.me" target="_blank" class="button wide primary" id="rick" onclick="rickroll()">Write us</a></li>
			</ul>
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
	<script>
		function rickroll(event) {
		    window.open("https://www.youtube.com/watch?v=dQw4w9WgXcQ", "about:blank");
			setTimeout(() => {
			    let title = document.getElementById('satisfied');
			    let subtitle = document.getElementById('statisfied_sub');

			    title.innerText = "Now you're satisfied."
                subtitle.innerText = "Their is no room for improvement anymore. It's all perfect now.";
			    let video = document.getElementById('four');
                video.style = 'background-image: url(assets/img/rickastley.gif); background-size: 500px;';
				document.getElementById('rick').innerHTML = "HA! You got rickrolled!";
			}, 100);
		}
	</script>
</body>

</html>
