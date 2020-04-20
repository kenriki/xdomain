<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135078110-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-135078110-2');
    </script>
    <title>役立つまとめ情報サイト トップ</title>
    <meta charset="utf-8">
	<meta name="keywords" content="役立つIT,エンジニアメモ,役立つ情報" data-reactroot="">
	<meta name="description" content="役立つまとめ情報サイトは、エンジニア・ITで働く人向けとして、配信記事のほか、ツール、メモなど多種多様な内容を掲載しています。" data-reactroot="">
	<link rel="apple-touch-icon" href="./images/apple-touch-icon.png" sizes="180x180">
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
    <!-- カレンダー -->
    <style>
    /* 日曜日 */
    .fc-sun {
        color: red;
        background-color: #fff0f0;
    }
      
    /* 土曜日 */
    .fc-sat {
        color: blue;
        background-color: #f0f0ff;
    }
    </style>
    <link rel='stylesheet' href='./lib/fullcalendar/fullcalendar.css' />
    <script src='./lib/fullcalendar/lib/jquery.min.js'></script>
    <script src='./lib/fullcalendar/lib/moment.min.js'></script>
    <script src='./lib/fullcalendar/fullcalendar.js'></script>
    <script src='./lib/fullcalendar/locale/ja.js'></script>
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
    <h2 class="font-1">MENU</h2>
    
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
    <!-- タブボタン部分 -->
    <ul class="nav nav-tabs">
        <li class="nav-item active">
            <a href="#tab1" class="nav-link" data-toggle="tab">カレンダー</a>
        </li>
        <li class="nav-item">
            <a href="#tab2" class="nav-link" data-toggle="tab">各ツール等</a>
        </li>
        <li class="nav-item">
            <a href="#tab3" class="nav-link" data-toggle="tab">リンク等</a>
        </li>
        <li class="nav-item">
            <a href="#tab4" class="nav-link" data-toggle="tab">github</a>
        </li>
    </ul>
    
    
    <div class="tab-content">
        <div id="tab1" class="tab-pane active">
            <div class="container-fluid css-scro">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab2" class="tab-pane">
            <div class="container-fluid css-scro">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        
                        <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='./imagSrc/'">ピクチャー</button>
                        </h2>
                         <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='../kaup/'">カウプ指数計算機</button>
                        </h2>
                        <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='./taskCounter/'">タスクタイマーカウンター</button>
                        </h2>
                        <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='https://jsbin.com/hozoxaloba/'">タスクタイマー</button>
                        </h2>
                        <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='./loto/'">仮想ロト</button>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab3" class="tab-pane">
            <div class="container-fluid css-scro">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='./doc/'">My Engineer Exhibition Wiki</button>
                        </h2>
                        <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='//kenriki.wp.xdomain.jp'">メモ用</button>
                        </h2>
                        <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='//developer.mozilla.org/ja/docs/Web/JavaScript/Introduction_to_Object-Oriented_JavaScript'">Developer.mozilla.org</button>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab4" class="tab-pane">
            <div class="container-fluid css-scro">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="col-sm-4"></div>
                        <h2>
                            <button type="button" class=" btn btn-info btn-lg btn-block" onclick="location.href='https://github.com/kenriki/'">github.com/kenriki</button>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <!-- SNS ボタン START-->
    <div style="text-align:left;">
        <!-- Twitter -->
        <div class="css-style-top">
            <a href="https://twitter.com/ricchan_fight?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @ricchan_fight</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <!-- facebook利用の準備 -->
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- FB -->
        <div class="block-left" style="float:left;margin-right:5px;">
            <div class="fb-like" data-layout="box_count"></div>
        </div>
        <!-- LINE -->
        <div style="float:left;margin-right:5px;">
            <div class="line-it-button" data-lang="ja" data-type="like" data-url="http://kenriki.php.xdomain.jp/" style="display: none;"></div>
            <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
        </div>
        <!-- mixi -->
        <div data-plugins-type="mixi-favorite" data-service-key="ed840b4edbe74007102de938bd35bb49e15b7507" data-size="medium" data-href="" data-show-faces="false" data-show-count="true" data-show-comment="false" data-width="" style="float:left;margin-right:5px;"></div>
        <script type="text/javascript">(function(d) {var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//static.mixi.jp/js/plugins.js#lang=ja';d.getElementsByTagName('head')[0].appendChild(s);})(document);</script>
    </div>
    <!-- SNS ボタン END-->
</div>
<div style="clear:both;"></div>
               
<script>
$(function () {
    $('#calendar').fullCalendar();
});
</script>




</body>

</html>