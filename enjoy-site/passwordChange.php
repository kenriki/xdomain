<?php
    if($_SESSION["loginname"] != "user1234" || $_SESSION["pass"] != "p@ssW0rd"){
        header('location:./error.php');
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
    <title>Welcom</title>
    <link rel="stylesheet" type="text/css" href="./css/style-css.css">
    <script src="./common.js"></script>
</head>
<body>
    <h1>初回パスワード変更を実施してください。</h1>
    <form action="" method="post">
        <label>パスワード</label>:<input id="ID_TXT03" value="" type="password" name="password">
        <label>確認用パスワード</label>:<input id="ID_TXT04" value="" type="password" name="password">
        <input type="submit" value="変更">
    </form>
    <script>
        if(document.getElementById("ID_TXT03").value === "") {
            if(document.getElementById("ID_TXT04").value === ""){
                app.checkDocument(1);
            }
        }
    </script>
</body>
</html>