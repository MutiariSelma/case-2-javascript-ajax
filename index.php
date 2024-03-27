<?php
session_start();

$usernameCounter = 1;
while (true) {
    $tempUsername = "User" . $usernameCounter;
    if (!isset($_SESSION[$tempUsername])) {
        $_SESSION['username'] = $tempUsername;
        $_SESSION[$tempUsername] = true;
        break;
    }
    $usernameCounter++;
}

$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chat</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('pexels-ravish-maqsood-17493766.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            justify-content: center;
        }

        #tombol {
            width: 50px;
            height: auto;
            cursor: pointer;
            position: absolute;
            left: 10px;
            top: 10px;
        }

        .chat-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            /* height: auto; */
            /* Hapus properti height */
            width: 500px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            overflow-y: auto;
            /* Tambah properti overflow-y */
            max-height: 400px;
            /* Contoh batasan maksimal tinggi */
        }


        .chat-box {
            opacity: 100%;
        }

        .user-container {
            display: none;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.5s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chat-header {
            margin-bottom: 20px;
        }

        .chat-input {
            margin-top: 20px;
        }

        .username {
            margin-right: 15px;
        }

        .btn-primary {
            margin-left: 10px;
        }

        .icon-tombol {
            margin-top: 60px;
        }

        .judul {
            text-align: center;
            padding-bottom: 10px;
        }

        .chat-message {
            margin-bottom: 15px;
            padding: 5px;
            border-radius: 5px;
            background-color: #CAE0F7;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <img class="icon-tombol" src="gambar.png" id="tombol" alt="Tampilkan" onclick="toggleP()">
    <div class="user-container">
        <div class="row">
            <div class="col">
                <h2 class="judul">Simple Chat</h2>
                <div class="d-flex justify-content-between align-items-center chat-header">
                    <span class="username" id="username"><?php echo "Pengguna: <b> </b> "; ?></span>
                    <input type="text" id="new-username" placeholder="Ganti Pengguna" class="form-control">
                    <button id="change-username" class="btn btn-primary">Ganti</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="chat-container">
                    <div id="chat-window"></div>
                    <div id="chat-input" class="d-flex">
                        <input type="text" id="message-input" placeholder="Ketikan pesan Anda..." class="form-control flex-grow-1">
                        <button id="send-message" class="btn btn-success">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="chat.js"></script>
    <script>
        function toggleP() {
            let div = document.querySelector(".user-container");
            if (div.style.display === "none") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
        var username = "<?php echo $username; ?>";
        initChat(username);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>

</html>