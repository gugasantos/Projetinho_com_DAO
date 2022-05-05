<?php
$db_ger = "mysql";
$db_name = 'owlkyshi';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("$db_ger:dbname=".$db_name.";host=".$db_host, $db_user,$db_pass);