
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>サンプル</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <!-- <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="text1">
        <button type="submit">SEND</button>
    </form> -->

    <?php
        // if (isset($_POST["text1"])) {
        //     echo $_POST["text1"];
        // }
    ?>

    <form action="./tw.php" method="post" enctype="multipart/form-data">
        <button type="submit">取得</button>
    </form>

</body>
</html>