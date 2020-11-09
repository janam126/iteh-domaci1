<?php

$host = "localhost";
$db = "teniseri";
$username = "Jana";
$password = "jana";

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_errno) {
    exit("Konekcija nije uspela: " . $conn->connect_errno);
}

?>