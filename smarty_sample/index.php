<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>サンプル</title>
<style>
html,body {
  background-color: rgb(199,199,199);
}
table {
  border-collapse:collapse;
  border-bottom: 1px #000 soild;
}
h1{
    background-color: rgb(50,80,80);
    padding: 20px 20px 20px 20px;
    color: rgb(230,230,200);
}
</style>
</head>
<body>
<h1>Smarty 練習用</h1>
<hr>
<?php

date_default_timezone_set('Asia/Tokyo');

// エラーが発生した場合にエラー表示をする設定
ini_set('display_errors', 1);

// Smartyインストールディレクトリを定数定義
// ローカル環境ディレクトリ
//define('SMARTY_DIR', 'c:/xampp/htdocs/smarty_sample/libs/');
// 本番環境ディレクトリ
define( 'SMARTY_DIR', './libs/' );
// echo SMARTY_DIR;

// Smartyを使うための準備
require_once SMARTY_DIR . 'Smarty.class.php';

$smarty = new Smarty;

// IPアドレス取得
$ip = $_SERVER["REMOTE_ADDR"];

// ブラウザ情報取得
$browser = $_SERVER['HTTP_USER_AGENT'];

// 日時取得
$date = date("Y-m-d H:i:s");

$data = "<" . $date . ">\r\n< " . $ip . " >\r\n< " . $browser . " >\r\n";

$filename = 'data.log'; // data.logというカウント数を書き込むテキストファイル
$fp = fopen($filename, "a"); // data.logファイルを fopenで開く
fseek($fp, 0); // fseek関数でdata.logの読み書きを行う場所を先頭に戻す
fwrite($fp, $data); // fputs関数でカウントされた数をファイルに書き込む
flock($fp, LOCK_UN); // flock関数でファイルを上書きされないようにロックする
fclose($fp); // fclose関数でファイルを閉じる

$smarty->assign('ipAddres', $ip);
$smarty->assign('name', $browser);

$smarty->assign('data', array('田中', '鈴木', '佐藤', '山田', '伊藤'));
$smarty->assign('tr', array('bgcolor="#eeeeee"', 'bgcolor="#dddddd"'));

$member_th = array(
    "name" => "名前",
    "old" => "年齢",
    "address" => "住所",
);
$smarty->assign('personal_th', $member_th);

$member_data = array(
    "name" => "Yamada",
    "old" => "24",
    "address" => "Tokyo",
);
$smarty->assign('personaldata', $member_data);

// データ取得してHTMLに挿入
$smarty->display('displayMain.tpl');

?>
<hr>
<a href="../index.html">TOP</a>
</body>
</html>