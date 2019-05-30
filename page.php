<?php

$url = $_POST["textgo"];

$link = $url;

header('location: '.$link.'');

?>
<!DOCTYPE html>
<html lang="ja">

<head>
<title>役立つまとめ情報サイト トップ</title>
<meta charset="utf-8">
<style>
    .font-1 {
        font-family: 'Homemade Apple', cursive;
        background: rgb(30,55,100);
        color: #fff;
        padding: 5px;
    }
    .font-2 {
        width:380px;
        font-family: 'Homemade Apple', cursive;
        background: rgb(30,85,80);
        color: #fff;
        padding: 5px;
        margin-top:10px;
        margin-bottom:10px;
        border-radius:12px;
    }
    .font-2 select{
        width:100%;
        height:40px;
    }
    .css-btn {
        width: 200px;
        height: 45px;
    }
    .css-scro {
         overflow: scroll;
         height: auto;
    }
</style>
<!-- Bootstrapを組み込むのに必要なファイル -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./lib/css/bootstrap.min.css">
<script src="./lib/js/jquery.min.js"></script>
<script src="./lib/js/bootstrap.min.js"></script>
</head>
<body class="css-wrap">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- navbar-inverse で黒系ナビゲーションの指定をしています。-->
        <!-- navbar-fixed-top でヘッダー固定の指定をしています。-->
        <div class="container">
            <div style="margin-top:55px"></div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--button~はウインドウのサイズが780px以下になった時に表示されます。-->
                <a class="navbar-brand" href="#">役立つまとめ情報サイト</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../">ホーム</a></li>
                    <li>
                        <a href="http://www.google.com/" target="_blank">Google</a>
                    </li>
                    <li>
                        <a href="http://www.yahoo.com/" target="_blank">Yahoo</a>
                    </li>
                    <li>
                        <a href="https://www.ap-siken.com/apkakomon.php" target="_blank">応用情報技術者試験過去問道場</a>
                    </li>
                    <li>
                        <a href="http://spring.io/projects/spring-framework" target="_blank">spring mvc</a>
                    </li>
                    <li>
                        <a href="https://junit.org/junit5/" target="_blank">junit</a>
                    </li>
                    <li>
                        <a href="https://backlog.com/ja/git-tutorial/" target="_blank">Git基礎</a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <div style="margin-top:135px"></div>

    <div class="font-2" style="margin-left:3px;">
        <div>
            <h2>▽いつものメニュー</h2>
        </div>
        <div>
        	<form action="page.php" method="post" style="color:#000">
        		<select name="textgo" onChange="this.form.submit()">
        		    <option value="" selected>----</option>
        			<option value="it-QandA">技術者向け掲示板</option>
        			<option value="chat-App">ゲストブック</option>
        			<option value="pokemon">ポケモン共有掲示板</option>
        			<option value="food">飲食共有掲示板</option>
        			<option value="file_input">メモ共有</option>
        			<option value="jar">javaツール</option>
        			<option value="draw">お絵かきタップ</option>
        			<option value="memo">メモキャプチャ</option>
        		</select>
        	</form>
        </div>
    </div>
</body>
</html>
   