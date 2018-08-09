<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>認証ページ</title>

    <style type="text/css">
        span.password { font-size: 150%; font-family: monospace; font-weight: bold; margin: 0px 0.3em; }
        input[type=button] { font-size: 125%; margin: 2em; }
        div.guide { background-color: #e0e0e0; padding: 3px 1em; }
    </style>
    <?php $pass = "kemRiki08"; ?>
    <script type="text/javascript">
        var app = app || {};

        app.gate = function(){
            // ユーザの入力を求める
            var userInput = prompt("パスワードを入力して下さい:","");
            // 入力内容をチェック
            if( /\W+/g.test(userInput) ) {
                // 半角英数字以外の文字が存在したらエラー
                alert("半角英数字のみを入力して下さい。");
            }
            else if( userInput != null ) {
                  if(userInput == <?php echo json_encode($pass); ?>){
                    location.href = "./input/index.php";
                    //header('location: ./input/index.php');
                  }
            }
        }
    </script>
</head>
<body>

    <h1>認証ページ</h1>

    <p>
        下記のボタンをクリックすると、パスワード入力ダイアログが表示されます。<br>
    </p>

    <!-- ================================================ -->
    <!-- ▼JavaScriptを使った簡単パスワード認証用のソース -->
    <!-- ================================================ -->
    

    <p>
        <input type="button" value="GO" onclick="app.gate();">
    </p>

    <!-- ========== -->
    <!-- ▲ここまで -->
    <!-- ========== -->

    <div class="guide">
        <p>
            ユーザの操作によって、以下のように動作します。
        </p>
        <ul>
            <li>パスワードを間違えた場合は、正しいページに移動できず、「Not Found」エラーページが表示されます。</li>
            <li>半角英数字（a～z、A～Z、0～9、アンダーバー）以外の文字を入力した場合は、「半角英数字のみを入力して下さい」とエラーを表示して、どこにも移動しません。</li>
            <li>パスワードの入力欄で「キャンセル」ボタンをクリックした場合は、どこにも移動しません。</li>
        </ul>
    </div>

    <p>
        <a href="https://allabout.co.jp/gm/gc/23839/">記事に戻る</a>
    </p>


</body>
</html>
