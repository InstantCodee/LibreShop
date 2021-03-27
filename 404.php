<!DOCTYPE html>
<!--
Thanks to Jerome for this minimalistic 404 page.
https://codepen.io/Aska/pen/bDrlp
-->
<html lang="en">
<head>
    <title>404 Not Found</title>

    <style>
        body, html {
            height: 100%;
            overflow: hidden;
        }

        body {
            background: url() no-repeat center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: source-sans-pro, sans-serif;
            background-color: #1f1f1f;
            color: #f5f5f5;
        }

        h2 {
            display: inline;
            font-size: 200px;
            margin: 0;
            padding: 0;
            line-height: 0.75;
            margin-top: 50px;
        }


        .quote {
            display: inline;
            margin-left: 5px;
            margin-right: 5px;
        }

        .quote:before {
            content: '{';

        }

        .quote:after {
            content: '}';

        }

        .error {
            text-align: center;
            position: relative;
            margin-top: 70px;

        }

        .text {
            position: absolute;
            right: 13px;
        }

        .container {
            width: 334px;
            padding: 5px;
        }

        .info-label {
            display: inline;
        }

        .info-text {
            text-align: center;
        }

        a {
            color: #3B81BE;
            line-height: inherit;
            text-decoration: none;

        }

        a:after {
            vertical-align: top;
            width: 13px;
            height: 13px;
            background: url(http://image.noelshack.com/fichiers/2014/32/1407602076-hyperlink.png);
            background-size: 100%;
            background-repeat: no-repeat;
            content: '';
            display: inline-block;

        }

        p {
            text-align: justify;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="info-label">
        <div class="error">
            <h2>404</h2>
            <div class="text">
                <b>Error</b>
            </div>
        </div>
    </div>

    <div class="info-text">
        <h1>Page not found</h1>
        <a href="/">Visit the demo shop</a>
        <p>Looks like you try to access a resource that doesn't exist anymore or never existed in the first place.</p>
    </div>
</div>

</body>
</html>