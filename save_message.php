<?php
$message = $_POST['message'];
$username = $_POST['username'];
$timestamp = date('Y-m-d H:i:s');

$new_message = "$username : $message<br>\n";
file_put_contents('chat.txt', $new_message, FILE_APPEND | LOCK_EX);
