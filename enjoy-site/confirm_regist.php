<html>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>confirm_rigist.php</title>
<body>
以下の内容で登録が完了しました．<br><br>

<?php
	session_start();

	require_once "definition.php";

	echo "名前 ： ".$_SESSION[NAME]."<br><br>";
/*
	echo "名前(カナ) ： ".$_SESSION[NAME_kana]."<br><br>";
	echo "年齢 : ".$_SESSION[AGE]."<br><br>";
	echo "性別 ： ".$_SESSION[SEX]."<br><br>";
	echo "電話番号 ： ".$_SESSION[TEL]."<br><br>";
*/
	echo "メールアドレス : ".$_SESSION[MAIL]."<br><br>";
	echo "希望番号 : ".$_SESSION[USN]."<br><br>";
	echo "パスワード ： セキュリティ対策のため表示しません<br><br>";

	echo "<br>ご登録ありがとうございました．<br><br>";
	echo "<a href=\"./form.php\">入力フォームに戻る</a><br><br>";

	$name = addslashes($_SESSION[NAME]);
/*
	$kana = addslashes($_SESSION[NAME_kana]);	
	$age = addslashes($_SESSION[AGE]);
	$sex = addslashes($_SESSION[SEX]);
	$number = addslashes($_SESSION[TEL]);
*/
	$mail = addslashes($_SESSION[MAIL]);
	$user_number = addslashes($_SESSION[USN]);
	$password = addslashes($_SESSION[PASSWORD]);
	
	$no = addslashes($_SESSION[NUM]);

	//DBへの操作
	/*本番サーバーへ接続*/
	$con = mysql_connect('mysql1.php.xdomain.ne.jp', 'kenriki_database@sv1.php.xdomain.ne.jp', 'cqdhc89z');

	/*ローカル環境
  	$con = mysql_connect('127.0.0.1','root','');
	*******************************************/
	
	if(!$con){
		exit('データベースに接続できませんでした。');
	}
	$result = mysql_select_db('kenriki_sample',$con);

	if (!$result) {
		exit('データベースを選択できませんでした。');
	}
	$result = mysql_query('SET NAMES utf8', $con);

	if (!$result) {
	  exit('文字コードを指定できませんでした。');
	}
	
	//$tel = str_replace("-", "", $number);

	$result = mysql_query("INSERT IGNORE INTO login_info(no,name,user_number,password,email) VALUES('$no','$name','$user_number','$password','$mail')", $con);
	if (!$result) {
	  exit('データを登録できませんでした。');
	}

	$con = mysql_close($con);
	if (!$con) {
	  exit('データベースとの接続を閉じられませんでした。');
	}
  	session_destroy();
  	
  ?>
</body>
</html>