<?php
$bgcolor = "#F5F5F5";
$textcolor = "#737373";
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>form.php</title>
<style>
<!--
* {
line-height:1.5em;
}
-->
</style>
</head>
<CENTER>
<body bgcolor="<?php print $bgcolor; ?>" text="<?php print $textcolor; ?>">

<?php
session_start();
require_once "definition.php";
?>
<form method = "post" action = "confirm.php">

<table border="0" bgcolor="" cellspacing="0" cellpadding="0">
<?php

  $name_txt = "";
//  $kana_txt = "";  
//  $age_txt = "";
//  $sex_txt = "";
//  $tel_txt = "";
  $mail_txt = "";
  $password_txt = "";
  $usn_txt = "";
  $num_txt = "";
  
  if(isset($_SESSION[NUM])) $num_txt = $_SESSION[NUM];
  if(isset($_SESSION[NAME])) $name_txt = $_SESSION[NAME];
//  if(isset($_SESSION[NAME_kana])) $kana_txt = $_SESSION[NAME_kana];  
//  if(isset($_SESSION[AGE])) $age_txt = $_SESSION[AGE];
//  if(isset($_SESSION[SEX])) $sex_txt = $_SESSION[SEX];
//  if(isset($_SESSION[TEL])) $tel_txt = $_SESSION[TEL];
  if(isset($_SESSION[MAIL])) $mail_txt = $_SESSION[MAIL];
  if(isset($_SESSION[PASSWORD])) $password_txt = $_SESSION[PASSWORD];
    if(isset($_SESSION[USN])) $usn_txt = $_SESSION[USN]; 


 
echo "<h2 style='font-size:20px;'>新規登録</h2><br>";      
echo "<tr>";
echo "<td>※ 登録番号： <br><input type = \ size=\"30\"  \"tel\" name = \"number\" value=\"$num_txt\"><br></td>";
echo "</tr>";
echo "<tr>";
echo "<td>※ 希望ユーザ番号：<br><input type = \ size=\"30\" \"tel\" name = \"user_number\" value=\"$usn_txt\"><br></td>";
echo "</tr>";
echo "<tr>";
echo "<td>※ パスワード：   <br><input type = \ size=\"30\" \"password\" name = \"password\" value=\"$password_txt\"><br></td>";
echo "</tr>";
echo "<tr>";
echo "<td>※ 名前： <br><input type = \ size=\"30\" \"text\" name = \"name\" value=\"$name_txt\"><br></td>";
echo "</tr>";
echo "<tr>";
echo "<td>※ メールアドレス：<br><input type = \ size=\"30\" \"email\" name = \"mail\" value=\"$mail_txt\"><br></td>";
echo "</tr>";
?>  
  </table>
  <?php
echo "<input type =\"submit\" value=\"登録\"><br>";
  ?>
 </form>

<pre>

<a href="https://phpmyadmin1.php.xdomain.ne.jp/">管理者専用ページ</a>

<a href="./index.html">----- T O Pへ戻る -----</a><br>
</pre>
</CENTER>
</body>

</html>