<?php
$host = "localhost";
$username = "root";
$pw = "";
$db = "music_db";

$conn = @new mysqli($host, $username, $pw, $db);
if(!$conn){
    die("Database Connection Failed. Error: ".$conn->error);
}
