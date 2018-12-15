<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>be勤怠</title>

    <style type="text/css">
        span.password { font-size: 150%; font-family: monospace; font-weight: bold; margin: 0px 0.3em; }
        input[type=button] { font-size: 125%; margin: 2em; }
        div.guide { background-color: #e0e0e0; padding: 3px 1em; }
    </style>
    <?php $pass = "1234"; ?>
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

    <h1>be勤怠</h1>

    <h2>電車遅延や突発な体調不良の全休連絡</h2>
    
　　 <h2>※読めない漢字あるかもしれないので分かりやすく</h2>
    <p>
        <input type="button" value="進む" onclick="app.gate();" style="width:300px;height :150px;">
    </p>

   


</body>
</html>
