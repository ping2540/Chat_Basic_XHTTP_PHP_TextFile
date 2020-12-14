<?php require "ReadWrite.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Chat/styles.css">
</head>

<body onload="start()">
    <header class="top-header";>
        <a class="menu-item band" href="#">Chat</a>
        <a class="menu-item" href="https://web.facebook.com/teeratorn.moonpanyo/">Contact</a>
        <a class="menu-item" href="https://github.com/ping2540">Github</a>
    </header>
    <div id="div_k" class=ex3>
    </div>
    <form class=main-content>
        <input type="text" id="username" placeholder="Sender">
        <input type="text" id="message" placeholder="Type message...">
        <input type="submit" id="btn" value="Send">
        <script src="chat.js"></script>
    </form>
    <footer class="bottom-footer">
        <p>About This Website</p>
        <p>CopyRight 2025</p>
    </footer>
</body>

</html>