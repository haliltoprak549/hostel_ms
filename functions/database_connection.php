<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "yurt";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) die(alert_bootstrap('Could not connect to the database!', 'danger'));
