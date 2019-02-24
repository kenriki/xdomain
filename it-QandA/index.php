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

<title>Q&A情報共有サイト</title>
<meta charset="utf-8">
<style>
.css-btn {
  width: 400px;
  height: 90px;
  font-size: 25px;
}
input[type="file"] {
  top:0;
  left:0;
  width: 100%;
  height:100px;
  opacity: 0;
  /*position:absolute;*/
}

.css-list-memo {
  margin-top: -380px;
  margin-left: 500px;
  position:absolute;
}

.usrBtn {
  height: 70px;
}

#id-txtBox {
  display: none;
}

#id-click {
  width: 250px;
  height: 25px;
  color: #ccc;
}

#preview img{
  width: 150px;
}

/*検索用*/
.search-area input[type="text"] {
  padding: 5px 5px 3px;
  font-size: 16px;
  border: 1px solid #D6D6D6;
}

.search-area input[type="text"]:focus {
  background: #F9F9F9;
}

.search-result {
  margin-top: 20px;
}
.hit-num__text span {
  font-weight: bold;
}
#search-result__list {
  margin-top: 15px;
}
#search-result__list span {
  display: inline-block;
  margin-right: 15px;
  padding: 5px;
  background: #F2F2F2;
}
.target-area {
  margin-top: 50px;
}
.target-area .hidden {
  display: none
}

</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<!-- Bootstrapを組み込むのに必要なファイル -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>

var app = {
   setVal: 0
};

function screen_disp(){
  if(app.setVal == 0){
    document.getElementById("id-txtBox").style.display = "block";
    app.setVal = 1;
  }
  else{
    document.getElementById("id-txtBox").style.display = "none";
    app.setVal = 0;
  }
}
</script>
</head>
<body class="css-wrap">
    <!-- 上部MENUバー -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- navbar-inverse で黒系ナビゲーションの指定をしています。-->
        <!-- navbar-fixed-top でヘッダー固定の指定をしています。-->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <!--button~はウインドウのサイズが780px以下になった時に表示されます。-->
                <a class="navbar-brand" href="#">Q&A情報共有サイト</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../">ホーム</a></li>
                    <li><a href="#" id="id-click" onclick="screen_disp();" title="入力フォームが開閉します">★ 入力フォーム開閉用</a></li>
                    <li><a href="http://www.google.com/" target="_blank">Google</a></li>
                    <li><a href="http://www.yahoo.com/" target="_blank">Yahoo</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <div class="search-area">
                  <br>
                  <form>
                    <input type="text" style="width:450px;" id="search-text" placeholder="検索ワードを入力">
                  </form>
                  <div class="search-result">
                    <div class="search-result__hit-num"></div>
                    <div id="search-result__list"></div>
                  </div>
                </div>
              </div><!-- /.wrapper -->
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <b>※ 入力フォームは、上部の黒メニューより、選択してください</b>
              <div class="container">
                  <div id="id-txtBox" class="form-group">
                      <form action="action.php" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">
                      <span class="label label-danger">必須項目</span> 題名: 
                      <div class="form-group has-feedback">
                        <input type="text" class="control-label form-control" size="50" name="chatTitle" /><br>
                      </div>
                        URL: ( ※URLを入れることでリンク付きの題名となります。)
                      <div class="form-group has-feedback">
                        <input type="url" class="control-label form-control" size="50" name="ulrPage" /><br>
                      </div>
                      <span class="label label-danger">必須項目</span> 名前: 
                      <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="name" /><br>
                      </div>
                      <span class="label label-danger">必須項目</span> 本文:
                      <div class="form-group has-feedback">
                         <textarea name="text1" class="control-label form-control" cols=50 rows=5 wrap="hard"></textarea>
                     </div>
                      <div class="ui-block-a">
                        <label class="ui-btn ui-corner-all" >
                          <img class="ic" src="sp/img/camera.png" alt="" ><br>↑画像アップロード
                          <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                          <!-- <input type="file" id="file" name="up_img" accept="image/*;capture=camera"> -->
                          <input type="file" id="file" name="up_img" accept="image/*">
                          <div id="preview">
                          
                          </div>
                        </label>
                      </div>
                      <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">
                              <span>&times;</span>
                          </button>
                          <div>(1) 注意事項</div>
                          <div>
                            <div>■ いたずら防止のため、投稿結果では、IPアドレスを記録しております。</div>
                            <div>■ 画像アップロードについて</div>
                            <div>※ jpegファイルで500×500以上の画像を用意してください。JPEG以外はエラーになります。※ファイルサイズは3MB以内でないとアップできない恐れがあります</div>
                            <div>※ android端末は、画像アップに失敗する可能性があります。その際は、アップ画像を気持ち少しだけ、トリミングしてください。</div>
                          </div>
                          <div>(2) 変更履歴</div>
                            <div>
                            <div>※ スマホ投稿では、画像選択の他に、カメラ起動後撮影して直ぐにアップできる機能を追加しました。</div>
                          </div>
                      </div>
                      
                      <div>
                          <input type="submit" value="投稿する" class="btn btn-primary form-control usrBtn" name="add" class="css-btn" />
                      </div>
                      </form>
                  </div>
                  <hr>

                  <?php
                      $fileData = file_get_contents('data.html');
                      $fileData = explode( "<hr>", $fileData );
                      $array = array_map('trim', $fileData); // 各行にtrim()をかける
                      $array = array_filter($array, 'strlen'); // 文字数が0の行を取り除く
                      $fileData = array_values($array); // これはキーを連番に振りなおしてるだけ

                      $cnt = count( $fileData );
                      //for( $i=0;$i<$cnt;$i++ ){
                      for($i = $cnt-1; $i>=0; $i--) {
                        echo("<div>".$fileData[$i]."</div><hr>");
                      }

                      echo ini_get('upload_max_filesize').'<br>';
                      echo ini_get('post_max_size').'<br>';
                      echo ini_get('memory_limit').'<br>';
                  ?>


              </div>
            </div>
          </div>
        </div>
        <script>
          // 画像プレビュー
          $('#file').change(function() {
            var fr = new FileReader();
            fr.onload = function() {
              var img = $('<img>').attr('src', fr.result);
              $('#preview').append(img);
            };
            fr.readAsDataURL(this.files[0]);
          });
        </script>
        <script>
              searchWord = function(){
                var searchText = $(this).val(), // 検索ボックスに入力された値
                    targetText;

                $('.container-fluid').each(function() {
                  targetText = $(this).text();

                  // 検索対象となるリストに入力された文字列が存在するかどうかを判断
                  if (targetText.indexOf(searchText) != -1) {
                    $(this).removeClass('hidden');
                  } else {
                    $(this).addClass('hidden');
                  }
                });
              };

              // searchWordの実行
              $('#search-text').on('input', searchWord);

        </script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
</body>
</html>