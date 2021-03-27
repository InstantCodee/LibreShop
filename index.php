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
					<a class="button" onclick="addProduct('Hacker Hoodie', 34.95)">Add hoodie - 34,95€</a>
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
					<a class="button" onclick="addProduct('The Mug', 14.99)">Add The Mug - 14,99€</a>
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
						<li><a class="button" onclick="addProduct('Back to the roots', 44.99)">Add to bag - 44,99€</a></li>
					</ul>
				</div>
				<div class="col-4 col-12-medium">
					<span class="image fit"><img src="assets/img/regular%20Shirt.jpg" alt="" /></span>
					<h3 class="title">regular T-Shirt</h3>
					<p>For all simple people, we have a regular Shirt for you. Nice to have in a hot summer.</p>
					<ul class="actions special">
						<li><a class="button" onclick="addProduct('regular Shirt', 10.69)">Add to bag - 10,69€</a></li>
					</ul>
				</div>
				<div class="col-4 col-12-medium">
					<span class="image fit"><img src="assets/img/The Bag.jpg" alt="" /></span>
					<h3 class="title">The Bag</h3>
					<p>Why? When going to shop in a old-fashion real-life store, you need to spread the truth.</p>
					<ul class="actions special">
						<li><a class="button" onclick="addProduct('The Bag', 13.37)">Add to bag - 13,37€</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Four -->
	<section id="four" class="main style2 special">
		<div class="container">
			<header class="major">
				<h2>Not satisfied yet?</h2>
			</header>
			<p>Sad but gives us room for improvement.<br />Feel free to write us an email. <i>We don't bite.</i></p>
			<ul class="actions special">
				<li><a href="mailto:contact@librepay.me" target="_blank" class="button wide primary" id="rick" onclick="rickroll()">Write us</a></li>
			</ul>
		</div>
	</section>

	<!-- Five -->
	<!--
			<section id="five" class="main style1">
				<div class="container">
					<header class="major special">
						<h2>Elements</h2>
					</header>

					<section>
						<h4>Text</h4>
						<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
						This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
						This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
						<hr />
						<header>
							<h4>Heading with a Subtitle</h4>
							<p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
						</header>
						<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
						<header>
							<h5>Heading with a Subtitle</h5>
							<p>Lorem ipsum dolor sit amet nullam id egestas urna aliquam</p>
						</header>
						<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
						<hr />
						<h2>Heading Level 2</h2>
						<h3>Heading Level 3</h3>
						<h4>Heading Level 4</h4>
						<h5>Heading Level 5</h5>
						<h6>Heading Level 6</h6>
						<hr />
						<h5>Blockquote</h5>
						<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
						<h5>Preformatted</h5>
						<pre><code>i = 0;

while (!deck.isInOrder()) {
print 'Iteration ' + i;
deck.shuffle();
i++;
}

print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
					</section>

					<section>
						<h4>Lists</h4>
						<div class="row">
							<div class="col-6 col-12-medium">
								<h5>Unordered</h5>
								<ul>
									<li>Dolor pulvinar etiam.</li>
									<li>Sagittis adipiscing.</li>
									<li>Felis enim feugiat.</li>
								</ul>
								<h5>Alternate</h5>
								<ul class="alt">
									<li>Dolor pulvinar etiam.</li>
									<li>Sagittis adipiscing.</li>
									<li>Felis enim feugiat.</li>
								</ul>
							</div>
							<div class="col-6 col-12-medium">
								<h5>Ordered</h5>
								<ol>
									<li>Dolor pulvinar etiam.</li>
									<li>Etiam vel felis viverra.</li>
									<li>Felis enim feugiat.</li>
									<li>Dolor pulvinar etiam.</li>
									<li>Etiam vel felis lorem.</li>
									<li>Felis enim et feugiat.</li>
								</ol>
								<h5>Icons</h5>
								<ul class="icons">
									<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
								</ul>
							</div>
						</div>
						<h5>Actions</h5>
						<div class="row">
							<div class="col-6 col-12-medium">
								<ul class="actions">
									<li><a href="#" class="button primary">Default</a></li>
									<li><a href="#" class="button">Default</a></li>
								</ul>
								<ul class="actions small">
									<li><a href="#" class="button primary small">Small</a></li>
									<li><a href="#" class="button small">Small</a></li>
								</ul>
								<ul class="actions stacked">
									<li><a href="#" class="button primary">Default</a></li>
									<li><a href="#" class="button">Default</a></li>
								</ul>
								<ul class="actions stacked">
									<li><a href="#" class="button primary small">Small</a></li>
									<li><a href="#" class="button small">Small</a></li>
								</ul>
							</div>
							<div class="col-6 col-12-medium">
								<ul class="actions stacked">
									<li><a href="#" class="button primary fit">Default</a></li>
									<li><a href="#" class="button fit">Default</a></li>
								</ul>
								<ul class="actions stacked">
									<li><a href="#" class="button primary small fit">Small</a></li>
									<li><a href="#" class="button small fit">Small</a></li>
								</ul>
							</div>
						</div>
					</section>

					<section>
						<h4>Table</h4>
						<h5>Default</h5>
						<div class="table-wrapper">
							<table>
								<thead>
									<tr>
										<th>Name</th>
										<th>Description</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Item One</td>
										<td>Ante turpis integer aliquet porttitor.</td>
										<td>29.99</td>
									</tr>
									<tr>
										<td>Item Two</td>
										<td>Vis ac commodo adipiscing arcu aliquet.</td>
										<td>19.99</td>
									</tr>
									<tr>
										<td>Item Three</td>
										<td> Morbi faucibus arcu accumsan lorem.</td>
										<td>29.99</td>
									</tr>
									<tr>
										<td>Item Four</td>
										<td>Vitae integer tempus condimentum.</td>
										<td>19.99</td>
									</tr>
									<tr>
										<td>Item Five</td>
										<td>Ante turpis integer aliquet porttitor.</td>
										<td>29.99</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2"></td>
										<td>100.00</td>
									</tr>
								</tfoot>
							</table>
						</div>

						<h5>Alternate</h5>
						<div class="table-wrapper">
							<table class="alt">
								<thead>
									<tr>
										<th>Name</th>
										<th>Description</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Item One</td>
										<td>Ante turpis integer aliquet porttitor.</td>
										<td>29.99</td>
									</tr>
									<tr>
										<td>Item Two</td>
										<td>Vis ac commodo adipiscing arcu aliquet.</td>
										<td>19.99</td>
									</tr>
									<tr>
										<td>Item Three</td>
										<td> Morbi faucibus arcu accumsan lorem.</td>
										<td>29.99</td>
									</tr>
									<tr>
										<td>Item Four</td>
										<td>Vitae integer tempus condimentum.</td>
										<td>19.99</td>
									</tr>
									<tr>
										<td>Item Five</td>
										<td>Ante turpis integer aliquet porttitor.</td>
										<td>29.99</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2"></td>
										<td>100.00</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</section>

					<section>
						<h4>Buttons</h4>
						<ul class="actions">
							<li><a href="#" class="button primary">Primary</a></li>
							<li><a href="#" class="button">Default</a></li>
						</ul>
						<ul class="actions">
							<li><a href="#" class="button large">Large</a></li>
							<li><a href="#" class="button">Default</a></li>
							<li><a href="#" class="button small">Small</a></li>
						</ul>
						<ul class="actions fit">
							<li><a href="#" class="button fit">Fit</a></li>
							<li><a href="#" class="button primary fit">Fit</a></li>
							<li><a href="#" class="button fit">Fit</a></li>
						</ul>
						<ul class="actions fit small">
							<li><a href="#" class="button primary fit small">Fit + Small</a></li>
							<li><a href="#" class="button fit small">Fit + Small</a></li>
							<li><a href="#" class="button primary fit small">Fit + Small</a></li>
						</ul>
						<ul class="actions">
							<li><a href="#" class="button primary icon solid fa-download">Icon</a></li>
							<li><a href="#" class="button icon solid fa-download">Icon</a></li>
						</ul>
						<ul class="actions">
							<li><span class="button primary disabled">Disabled</span></li>
							<li><span class="button disabled">Disabled</span></li>
						</ul>
					</section>

					<section>
						<h4>Form</h4>
						<form method="post" action="#">
							<div class="row gtr-uniform gtr-50">
								<div class="col-6 col-12-xsmall">
									<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
								</div>
								<div class="col-6 col-12-xsmall">
									<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
								</div>
								<div class="col-12">
									<select name="demo-category" id="demo-category">
										<option value="">- Category -</option>
										<option value="1">Manufacturing</option>
										<option value="1">Shipping</option>
										<option value="1">Administration</option>
										<option value="1">Human Resources</option>
									</select>
								</div>
								<div class="col-4 col-12-small">
									<input type="radio" id="demo-priority-low" name="demo-priority" checked>
									<label for="demo-priority-low">Low</label>
								</div>
								<div class="col-4 col-12-small">
									<input type="radio" id="demo-priority-normal" name="demo-priority">
									<label for="demo-priority-normal">Normal</label>
								</div>
								<div class="col-4 col-12-small">
									<input type="radio" id="demo-priority-high" name="demo-priority">
									<label for="demo-priority-high">High</label>
								</div>
								<div class="col-6 col-12-small">
									<input type="checkbox" id="demo-copy" name="demo-copy">
									<label for="demo-copy">Email me a copy</label>
								</div>
								<div class="col-6 col-12-small">
									<input type="checkbox" id="demo-human" name="demo-human" checked>
									<label for="demo-human">Not a robot</label>
								</div>
								<div class="col-12">
									<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
								</div>
								<div class="col-12">
									<ul class="actions">
										<li><input type="submit" value="Send Message" class="primary" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</div>
							</div>
						</form>
					</section>

					<section>
						<h4>Image</h4>
						<h5>Fit</h5>
						<div class="box alt">
							<div class="row gtr-uniform gtr-50">
								<div class="col-12"><span class="image fit"><img src="images/pic06.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic04.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic02.jpg" alt="" /></span></div>
								<div class="col-4"><span class="image fit"><img src="images/pic03.jpg" alt="" /></span></div>
							</div>
						</div>
						<h5>Left &amp; Right</h5>
						<p><span class="image left"><img src="images/pic05.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
						<p><span class="image right"><img src="images/pic05.jpg" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
					</section>

				</div>
			</section>
		-->

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
			    let video = document.getElementById('four');
                video.style = 'background-image: url(assets/img/rickastley.gif); background-size: 500px;';
				document.getElementById('rick').innerHTML = "HA! You got rickrolled!";
			}, 100);
		}
	</script>
</body>

</html>