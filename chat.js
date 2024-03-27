function initChat(username) {
    var chatWindow = document.getElementById('chat-window');
    var messageInput = document.getElementById('message-input');
    var sendMessage = document.getElementById('send-message');
    var newUsername = document.getElementById('new-username');
    var changeUsername = document.getElementById('change-username');

    // Load initial chat messages
    loadMessages();

    // Update chat messages every second
    setInterval(loadMessages, 1000);

    // Send message on button click
    sendMessage.addEventListener('click', function() {
        var message = messageInput.value.trim();
        if (message !== '') {
            saveMessage(message, username);
            messageInput.value = '';
        }
    });

    // Send message on Enter key press
    messageInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            sendMessage.click();
        }
    });

    // Change username
    changeUsername.addEventListener('click', function() {
        var newUsernameValue = newUsername.value.trim();
        if (newUsernameValue !== '') {
            username = newUsernameValue;
            document.getElementById('username').textContent = username;
            newUsername.value = '';
        }
    });

    function loadMessages() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_messages.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                chatWindow.innerHTML = xhr.responseText;
                chatWindow.scrollTop = chatWindow.scrollHeight;
            }
        };
        xhr.send();
    }

    function saveMessage(message, username) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_message.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('message=' + encodeURIComponent(message) + '&username=' + encodeURIComponent(username));
    }
}

