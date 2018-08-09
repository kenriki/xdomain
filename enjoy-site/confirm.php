<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>confirm.php</title>
</head>
<body>

<?php
	session_start();//defineとの関係

	require_once "definition.php";

	//これにFALSEが入力されたら、アウト
//	$bConfirm = array(NAME=>TRUE,NAME_kana=>TRUE, AGE=>TRUE, SEX=>TRUE, TEL=>TRUE,MAIL=>TRUE, PASSWORD=>TRUE);
	$bConfirm = array(NAME=>TRUE,MAIL=>TRUE, PASSWORD=>TRUE, USN=>TRUE,NUM=>TRUE);
	$nextPage = TRUE;//FALSE
	
	// 下の方に自分で定義した関数 文字がはいっているか return "true" or "false"
	$bConfirm[NUM] = containsChar( $_POST[NUM] );
	$bConfirm[NAME] = containsChar( $_POST[NAME] );
//	$bConfirm[NAME_kana] = containsChar( $_POST[NAME_kana] );
//	$bConfirm[AGE] = containsChar( $_POST[AGE] );
//	$bConfirm[SEX] = containsChar( $_POST[SEX] );
//	$bConfirm[TEL] = containsChar( $_POST[TEL] );
	$bConfirm[MAIL] = containsChar( $_POST[MAIL] );
	$bConfirm[PASSWORD] = containsChar( $_POST[PASSWORD] );
	$bConfirm[USN] = containsChar( $_POST[USN] );
	
	//フォームすべてに文字がはいっているか確認
	foreach($bConfirm as $value){
		if(!$value){  
			$nextPage = FALSE;
		}
	}

	//入っていたら
	if($nextPage){
		echo "以下の内容でよろしいでしょうか?<br><br>";
		echo "登録番号 ： ".htmlspecialchars($_POST[NUM], ENT_QUOTES)."<br><br>";
		echo "名前 ： ".htmlspecialchars($_POST[NAME], ENT_QUOTES)."<br><br>";
//		echo "名前(カナ) ： ".htmlspecialchars($_POST[NAME_kana], ENT_QUOTES)."<br><br>";		
//		echo "年齢 : ".htmlspecialchars($_POST[AGE], ENT_QUOTES)."<br><br>";
//		echo "性別 ： ".htmlspecialchars($_POST[SEX], ENT_QUOTES)."<br><br>";
//		echo "電話番号 ： ".htmlspecialchars($_POST[TEL], ENT_QUOTES)."<br><br>";
		echo "メールアドレス : ".htmlspecialchars($_POST[MAIL], ENT_QUOTES)."<br><br>";
		echo "希望番号 : ".htmlspecialchars($_POST[USN], ENT_QUOTES)."<br><br>";
		echo "パスワード ： ****** (セキュリティ対策のため表示しません)<br><br>";
		echo "<br><b><a href=\"confirm_regist.php\">確認した上で登録をする<a></b>";
	}
	
	//入っていなかったら
	else{
		echo "<br><font color=\"red\">未入力の項目があります。</font><br><br>";
		echo "登録番号 : ";
		if(!$bConfirm[NUM]) echo "<font color=\"red\">Error:登録番号の記入は必須です。</font><br>";
		else {
			echo $_POST[NAME]."<br><br>";			
		}
		echo "名前 : ";
		if(!$bConfirm[NAME]) echo "<font color=\"red\">Error:名前の記入は必須です。</font><br>";
		else {
			echo $_POST[NAME]."<br><br>";			
		}
/*		echo "名前(カナ) : ";
		if(!$bConfirm[NAME_kana]) echo "<font color=\"red\">Error:名前(カナ)の記入は必須です。</font><br>";
		else {
			echo $_POST[NAME_kana]."<br><br>";			
		}		
		
		echo "年齢 : ";
		if(!$bConfirm[AGE]) echo "<font color=\"red\">Error:年齢の記入は必須です。</font><br>";
		else {
			echo $_POST[AGE]."<br><br>";
		}
		
		
		echo "性別 : ";
		if(!$bConfirm[SEX]) echo "<font color=\"red\">Error:性別の記入は必須です。</font><br>";
		else {
			echo $_POST[SEX]."<br><br>";
		}
		//sessoin情報を使う

		echo "電話番号 : ";
		if(!$bConfirm[TEL]) echo "<font color=\"red\">Error:電話番号の記入は必須です。</font><br>";
		else {
			echo $_POST[TEL]."<br><br>";
		}
*/		
		echo "メールアドレス : ";
		if(!$bConfirm[MAIL]) echo "<font color=\"red\">Error:メールアドレスの記入は必須です。</font><br>";
		else {
			echo $_POST[MAIL]."<br><br>";
		}
		echo "希望番号 : ";
		if(!$bConfirm[USN]) echo "<font color=\"red\">Error:希望番号の記入は必須です。</font><br>";
		else {
			echo $_POST[USN]."<br><br>";
		}
		echo "パスワード : ";
		if(!$bConfirm[PASSWORD]) echo "<font color=\"red\">Error:パスワードの記入は必須です。</font><br>";
		else {
			echo "******** (セキュリティ対策のため表示しません)"."<br><br>";
		}
		
		echo "<br><a href=\"form.php\">戻る</a>";
	}

	
	//最後に入っていなくても入っていてもセッションに入れる
	$_SESSION[NUM] = $_POST[NUM];
	$_SESSION[NAME] = $_POST[NAME];
//	$_SESSION[NAME_kana] = $_POST[NAME_kana];	
//	$_SESSION[AGE] = $_POST[AGE];
//	$_SESSION[SEX] = $_POST[SEX];
//	$_SESSION[TEL] = $_POST[TEL];
    $_SESSION[USN] = $_POST[USN];
	$_SESSION[MAIL] = $_POST[MAIL];
	$_SESSION[PASSWORD] = $_POST[PASSWORD];

	//文字が変数に入っているか判定する関数
	function containsChar( $sPost ){
		$bConfirm = TRUE;
		//$choppedChars = chop($sPost);
		if(!(isset($sPost)) || $sPost == "") {
			$bConfirm = FALSE; //スペース等を抜くchop関数
		}
		return $bConfirm;
	}

?>

</body>
</html>

