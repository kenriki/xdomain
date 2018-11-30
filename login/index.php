<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
        <style>
            .css-main-one{
                padding: 130px 130px 130px 130px;
                background: rgb(40,130,155);
            }
            .css-btn-01{
                width: 250px;
                height: 45px;
            }
            .css-fieldset-01{
                width: 350px;
            }
            legend {
                color: #fff;
            }
            .css-form-class01 {
                margin-bottom : 20px;
            }
            h1 {
                font-size: 24px;
                background: rgba(200,190,190,0.5);
                border: 1px solid #000;
                width: 500px;
            }
        </style>
    </head>
    <body>
        <div class="css-main-one">
            <h1>ログインぺーじ</h1>
            <form action="session1.php" class="css-form-class01" method = "post">
                <table class="css-form-class01">
                    <tr>
                        <td>USER  ID : </td>
                        <td><input type ="text" name="username" value = ""></td>
                    </tr>
                    <tr>
                        <td>PASSWORD : </td>
                        <td><input type = "password" name="pass" value = ""></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td><input type="submit" class="css-btn-01" id="login" name="login" value="ログイン"></td>
                    </tr>
                </table>
            </form>
            <form action="SignUp.php">
                <fieldset class="css-fieldset-01">          
                    <legend>新規登録フォーム</legend>
                    <input type="submit" class="css-btn-01"  value="新規登録">
                </fieldset>
            </form>
        </div>
    </body>
</html>