<!DOCTYPE html>
<html>
<head>
    <title>签售会抢票主页</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function countdown() {
            const deadline = new Date("2025-04-02T21:00:00").getTime();
            const x = setInterval(function() {
                const now = new Date().getTime();
                const distance = deadline - now;
                if (distance <= 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "正在跳转到抢票页面...";
                    window.location.href = 'ticket.php';
                } else {
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById("countdown").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
                }
            }, 1000);
        }
    </script>
</head>
<body onload="countdown()">
    <div class="container">
        <h1>欢迎来到我的签售会！</h1>
        <div>
            <?php if (!isset($_SESSION['username'])): ?>
                <a href="index.php">登录</a> | <a href="signup.php">注册</a>
            <?php else: ?>
                <p>你好，<?php echo $_SESSION['username']; ?>!</p>
            <?php endif; ?>
        </div>
        <h2>距离抢票开始还有：</h2>
        <div id="countdown"></div>
        <h3>票务信息：</h3>
        <ul>
            <li>VIP（限2张）</li>
            <li>Early Entry（限2张）</li>
            <li>General（限4张）</li>
        </ul>
    </div>
</body>
</html>
