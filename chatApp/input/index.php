<!DOCTYPE html>
<html lang="ja">
<head>
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

#preview img{
  width: 150px;
}

</style>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css"/>
</head>
<body class="css-wrap">
    <h1 class="blockquote dfn"> Will can send up Info Content for Everyone</h1>
    <hr>
    <div class="container">
        <div class="form-group">
            <form action="action.php" method="post" enctype="multipart/form-data">
             題名: <input type="text" class="form-control" size="50" name="chatTitle" /><br>
             URL: ( ※URLを入れることでリンク付きの題名となります。)<input type="url" class="form-control" size="50" name="ulrPage" /><br>
             名前: <input type="text" class="form-control" name="name" /><br>
             本文: <textarea name="text1" class="form-control" cols=50 rows=5 wrap="hard"></textarea>
             <div class="ui-block-a">
              <label class="ui-btn ui-corner-all" >
                <img class="ic" src="sp/img/camera.png" alt="" ><br>↑画像アップロード
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                <input type="file" id="file" name="up_img" accept="image/*;capture=camera">
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

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="./js/bootstrap.js"></script>
        <script>
        $('#file').change(function() {
          var fr = new FileReader();
          fr.onload = function() {
            var img = $('<img>').attr('src', fr.result);
            $('#preview').append(img);
          };
          fr.readAsDataURL(this.files[0]);
        });
        </script>
    </div>
</body>
</html>