<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>サンプル</title>
</head>
<body>


<h1>検証用</h1>
<?php

$fileData = file_get_contents('data.html');


$html = file_get_contents('data.html');


$html = mb_convert_encoding($html, 'HTML-ENTITIES', 'ASCII, JIS, UTF-8, EUC-JP, SJIS');

$domDocument = new DOMDocument();
$domDocument->loadHTML($html);
$xmlString = $domDocument->saveXML();
$xmlObject = simplexml_load_string($xmlString);
//var_dump($xmlObject);


$array = json_decode(json_encode($xmlObject), true);
//var_dump($array['body']['table']['tr']['td']['h2']['a']);

//foreach ($array as $data) { 
//    echo $data['body'] .PHP_EOL; 
//}

echo $array['body']['hr']['div'][0]['table']['tr'][0]['td']['h2'];

echo('<pre>');
var_dump($array);
echo('</pre>');

get_index();

//functions.phpに定義する関数
function get_index() {
    global $post; 

    //マッチングで<h>タグを取得する
    preg_match_all('/<h2.*?>.+?<\/h2>/u', $post->post_content,  $fileData);

    //取得した<h>タグの個数をカウント
    $matches_count = count( $fileData[0]);
    if(empty($fileData)){
        //<h>タグがない場合の出力
        echo '<span>Sorry no index</span>';
    }else{
        //<h>タグが存在する場合に<h>タグを出力
        for ($i = 0; $i < $matches_count; $i++){ echo  $i . ":" .  $fileData[0][$i]. "\n"; }
    }     
} 
?>
<hr>

<h2>テストページ</h2>

 <?php
                  
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

</body>
</html>