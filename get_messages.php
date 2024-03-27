<?php
$messages = file_get_contents('chat.txt');
$messagesArray = explode("<br>\n", $messages);

echo '<div class="chat-box">';
foreach ($messagesArray as $message) {
    if (!empty($message)) {
        $messageParts = explode(":", $message);

        echo '<div class="username">' . $messageParts[0] . '</div>';

        echo '<div class="chat-message">' . $messageParts[1] . '</div>';
    }
}
echo '</div>';
