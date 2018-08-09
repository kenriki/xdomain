<?php
    if($_SESSION["loginname"] != "admin" || $_SESSION["pass"] != "test1"){
        header('HTTP', true, 403);
        exit;
    }
    if(isset($_POST["loginname"])) setcookie("username", $_POST["loginname"], time()+120);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./css/style-css.css">
    <title>Document</title>
</head>

<body>
    <div id="base">
        <img src="https://cdn-ak.f.st-hatena.com/images/fotolife/m/myprogramming/20170626/20170626200255.png?1498475053" class="clock">
        <!--文字盤-->
        <img src="https://cdn-ak.f.st-hatena.com/images/fotolife/m/myprogramming/20170626/20170626200250.png?1498475101" id="hour"
            class="clock">
        <!--短針-->
        <img src="https://cdn-ak.f.st-hatena.com/images/fotolife/m/myprogramming/20170626/20170626200245.png?1498475118" id="minute"
            class="clock">
        <!--長針-->
        <img src="https://cdn-ak.f.st-hatena.com/images/fotolife/m/myprogramming/20170626/20170626200239.png?1498475134" id="second"
            class="clock">
        <!--秒針-->
    </div>



    <br />
    <hr>
    <form method="post" name="logout" action="logout.php">
    <input type="hidden" name="logout" value="true">
    <input type="submit" value="Logout">
    </form>
    <script>
        var time = new Date();
        var hour = document.getElementById("hour");
        var minute = document.getElementById("minute");
        var second = document.getElementById("second");

        function main() {
            time = new Date();

            hour.style.transform = "rotate(" + (time.getHours() * 30 + time.getMinutes() * 0.5) + "deg)";
            minute.style.transform = "rotate(" + (time.getMinutes() * 6) + "deg)";
            second.style.transform = "rotate(" + (time.getSeconds() * 6) + "deg)";

            setTimeout(main, 1000 - time.getMilliseconds());
        }

        main();
    </script>


</body>

</html>