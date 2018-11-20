<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
    </head>
    <body>
        <form action="session1.php" method = "post">
            USER  ID : <input type ="text" name="username" value = ""><br />
            PASSWORD : <input type = "text" name="pass" value = ""><br />
            <input type="submit" id="login" name="login" value="ログイン">

        </form>
        
        <form action="SignUp.php">
            <fieldset>          
                <legend>新規登録フォーム</legend>
                <input type="submit" value="新規登録">
            </fieldset>
        </form>

    </body>
</html>