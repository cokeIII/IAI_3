<?php
$servername = "localhost";
$username = "root";
$password = "chontech2021";
$database = "iai";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);
$conn->set_charset("utf8");