
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


//echo('<pre>');
//var_dump($array['body']['div']['1']['table']['tr']['0']['td']['h2']);
//var_dump($array['body']['div']['1']['table']['tr']['1']['td']['h2']);
//var_dump($array['body']['div']['1']['table']['tr']['2']['td']['h2']);

//$keyIndex = array_search('h2', $array);
//$result = $array[$keyIndex];
//var_dump($result);

//var_dump($array);
//echo('</pre>');

//配列をJSON形式に変換
$jsonstr =  json_encode($array, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

echo json_encode(array("name"=>"John","time"=>"2pm"));
//echo $jsonstr;

?>
