<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hacking Demo</title>
    <script src="js/hack.js"></script>
    <link type="text/css" rel="stylesheet" href="css/style.css">
</head>
<body>
<?
print_r($_POST);
?>
<ul>
    <li><a href="index.php">Home Page</a></li>
    <li class="active"><a href="sqli.php">SQL Injection Demo</a></li>
</ul>
<h1>Hacking Demo</h1>
<p>Hello people of CSIII! This is my demo of hacking.</p>
<br/>
<p>This one is SQL Injections, here is the code to copy: ') UNION SELECT name, type FROM "sqlite_master"--')</p>
<br/>
<p>That code executes as displayed under the search!</p>
<br/>
<p>Hmm, let's get a nice script going! < script src="js/xss.js">< /script><button onclick="boom()">xss time</button></p>
<form id="add" method="post">
    <label>Add Person: <input type="text" name="addperson"></label>
    <button type="submit">Add</button>
</form>
<form id="search" method="post">
    <label>Secure Search: <input name="query"></label>
    <button type="submit">Search</button>
</form>
<div class="formhere"></div>
<table>
    <tr>
        <th>Name</th>
        <th>Money</th>
    </tr>
<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 05/04/2017
 * Time: 21:53:36
 */

$dsn = 'sqlite:sql/people.sqlite3';
$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$pdo->exec('CREATE TABLE IF NOT EXISTS "bank" ("name" TEXT NOT NULL, "amount" INT NOT NULL DEFAULT 500)');
if(isset($_POST['addperson'])) {
    echo 'added';
    $pdo->exec('INSERT INTO "bank" ("name") VALUES (\'' . $_POST['addperson'] . '\')');
}

if(isset($_POST['query'])) {
    echo 'SELECT * FROM "bank" WHERE "name" LIKE(\'' . $_POST['query'] . '\')';
    $result = $pdo->query('SELECT * FROM "bank" WHERE "name" LIKE(\'' . $_POST['query'] . '\')');
}
else
    $result = $pdo->query('SELECT * FROM "bank"');
foreach($result->fetchAll() as $val) {
    echo '<tr><td>' . $val['name'] . '</td><td>' . $val['amount'] . '</td>';
}
?>
</table>
</body>
</html>