<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hacking Demo</title>
    <script src="js/hack.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<ul>
    <li><a href="index.php">Home Page</a></li>
    <li><a href="sqli.php">SQL Injection Demo</a></li>
</ul>
<h1>Hacking Demo</h1>
<h2>POSTed Information here</h2>
<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 05/04/2017
 * Time: 21:53:36
 */
foreach($_POST as $key => $value) {
    echo "<p>$key: $value</p>\n";
}
?>
</body>
</html>