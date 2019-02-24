<?php
header('Content-Type: text/html; charset=UTF-8');

$err = "";
// 作成するファイル名の指定
$file_name = 'data.html';
if (isset($_POST['name']) || isset($_POST['chatTitle']) || isset($_POST['text1'])) {
    if ($_POST["name"] == "" || $_POST["chatTitle"] == "" || $_POST["text1"] == "") {
        header('location: index.php');
        exit;
    }
}

$imgFile = "\n";
$file1 = $_FILES["up_img"]["tmp_name"]; // 元画像ファイル
$file2 = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (is_uploaded_file($file1)) {
        if (mb_strpos($_FILES['UpFile']['type'], 'jpeg')) {

            // JPEG画像を読み込む
            $im_inp = ImageCreateFromJPEG($_FILES['UpFile']['tmp_name']);
            $ix = ImageSX($im_inp); // 読み込んだ画像の横サイズを取得
            $iy = ImageSY($im_inp); // 読み込んだ画像の縦サイズを取得
            $ox = ResizeX; // サイズ変更後の横サイズ
            $oy = ($ox * $iy) / $ix; // サイズ変更後の縦サイズ

            // サイズ変更後の画像データを生成
            $im_out = ImageCreateTrueColor($ox, $oy);
            ImageCopyResized($im_out, $im_inp, 0, 0, 0, 0, $ox, $oy, $ix, $iy);

            // 画像の表示
            header("Content-type: image/jpeg");
            header("Cache-control: no-cache");
            ImageJPEG($im_out);

            // メモリーの解放
            ImageDestroy($im_inp);
            ImageDestroy($im_out);
            exit;
        }
    }
}

if ($file1) {

    $format = '%s_%s.%s';
    $time = time();
    $sha1 = sha1(uniqid(mt_rand(), true));
    $file_path = sprintf($format, $time, $sha1, 'jpg');

    $in = ImageCreateFromJPEG($file1); // 元画像ファイル読み込み
    $width = ImageSx($in); // 画像の幅を取得
    $height = ImageSy($in); // 画像の高さを取得
    $min_width = 300; // 幅の最低サイズ
    $min_height = 300; // 高さの最低サイズ
    $image_type = exif_imagetype($file1); // 画像タイプ判定用

    if ($image_type == IMAGETYPE_JPEG) { // JPGかどうか判定
        if ($width >= $min_width | $height >= $min_height) {
            if ($width == $height) {
                $new_width = $min_width;
                $new_height = $min_height;
            } else if ($width > $height) { //横長の場合
                $new_width = $min_width;
                $new_height = $height * ($min_width / $width);
            } else if ($width < $height) { //縦長の場合
                $new_width = $width * ($min_height / $height);
                $new_height = $min_height;
            }
            // 画像生成
            $out = ImageCreateTrueColor($new_width, $new_height);
            ImageCopyResampled($out, $in, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            $file2 = "img/" . $file_path;

            ImageJPEG($out, $file2);
        } else {
            $err = "サイズが幅" . $min_width . "×高さ" . $min_height . "以上の画像をご用意ください" . "\n";
            exit;
        }
    } else {
        $err = "JPG画像をご用意ください" . "\n";
        exit;
    }
}

if ($_POST["text1"] == "clear") {
    unlink("./data.html");
    touch($file_name);
    header('location: index.php');
    exit(); //←忘れずに！
} else {
    // ファイルの存在確認
    if (!file_exists($file_name)) {
        // ファイル作成
        touch($file_name);
    }
    $name = htmlspecialchars($_POST['name']);
    // URL付き題名
    if ($_POST['ulrPage'] != "") {
        $chatTitle = "<a href='" . $_POST['ulrPage'] . "' target='_blank'>" . $_POST['chatTitle'] . "</a>";
    } else {
        $chatTitle = $_POST['chatTitle'];
    }
    $text1 = htmlspecialchars($_POST['text1']);
    // TODO 本文リンク対応
    //if(strpos($text1,'https://') !== false){
    //'text1'のなかに'https://'が含まれている場合
    // str_replace("検索を行う文字列","置き換えを行う文字列","対象の文字列");
    //str_replace('https://',
    //}
    $data = "<div class='container-fluid'><div class='row'>"
    . "<div class='col-md-4 col-sm-6 col-xs-12'>"
    . "<div class='alert alert-info alert-dismissible'>"
    . "<button type='button' class='close' data-dismiss='alert'>"
    . "<span>&times;</span></button>"
    . "<table class='css-wrap-text'>"
    . "<tr><td class='css-date'>DATE: " . date("Y/m/d H:i:s")
    . "</td></tr><tr><td class='css-chatTitle'> "
    . "<h2>" . $chatTitle . "</h2> </td></tr><tr><td class='css-name'>NAME: "
    . $name . "</td></tr><tr><td class='css-content'>" . nl2br($text1) . "<br>"
        . "<a href=" . $file2 . "><img src=" . $file2 . "></a></td></tr>"
        . "</table>"
        . "<hr></div></div></div></div>";
    $data = $data . "\n";
    $filename = 'data.html'; // data.htmlというカウント数を書き込むテキストファイル
    $err_file_log = "error.html";
    $err_fp = fopen($err_file_log, "w");
    $fp = fopen($filename, "a"); // data.htmlファイルを fopenで開く
    $count = fgets($fp, 32); // fgets関数でdata.htmlに書かれたカウント数を読み込む
    $count++; // data.htmlに書かれたカウント数を加算
    fseek($fp, 0); // fseek関数でdata.htmlの読み書きを行う場所を先頭に戻す
    fwrite($err_fp, $err);
    fwrite($fp, $data); // fputs関数でカウントされた数をファイルに書き込む
    flock($err_fp, LOCK_UN); // flock関数でファイルを上書きされないようにロックする
    fclose($err_fp); // fclose関数でファイルを閉じる
    flock($fp, LOCK_UN); // flock関数でファイルを上書きされないようにロックする
    fclose($fp); // fclose関数でファイルを閉じる
    
    $data2 = $_SERVER['REMOTE_ADDR'] . " [" . $_SERVER['HTTP_USER_AGENT'] . " ]<br>"
    $fp2 = fopen("log.txt", "a"); // data.htmlファイルを fopenで開く
    $count = fgets($fp2, 32); // fgets関数でdata.htmlに書かれたカウント数を読み込む
    $count++; // data.htmlに書かれたカウント数を加算
    fseek($fp2, 0); // fseek関数でdata.htmlの読み書きを行う場所を先頭に戻す
    fwrite($err_fp, $err);
    fwrite($fp2, $data2); // fputs関数でカウントされた数をファイルに書き込む
    flock($err_fp, LOCK_UN); // flock関数でファイルを上書きされないようにロックする
    fclose($err_fp); // fclose関数でファイルを閉じる
    flock($fp2, LOCK_UN); // flock関数でファイルを上書きされないようにロックする
    fclose($fp2); // fclose関数でファイルを閉じる
    header('location: index.php');
    exit(); //←忘れずに！
}
