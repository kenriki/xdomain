<?php
header('Content-Type: text/html; charset=UTF-8');

$err = "";
// 作成するファイル名の指定
$file_name = 'data.html';

// 入力チェック
if (isset($_POST['name']) || isset($_POST['chatTitle']) || isset($_POST['text1'])) {
    if ($_POST["name"] == "" || $_POST["chatTitle"] == "" || $_POST["text1"] == "") {
        header('location: index.php');
        exit;
    }
}

$imgFile = "\n";
$file1 = $_FILES["up_img"]["tmp_name"]; // 元画像ファイル
$file2 = "";

// コマンドで全消去
if ($_POST["text1"] == "clear") {
    clearContent();
    exit;
}

// POSTであること
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ファイルが存在すること
    if (is_uploaded_file($file1)) {
        // file形式が画像ファイルであること
        if (file_exists($file1) && $type = exif_imagetype($file1)) {
            switch ($type) {
                //gifの場合
                case IMAGETYPE_GIF:
                    $hantei = "IMAGETYPE_GIF";
                    break;
                //jpgの場合
                case IMAGETYPE_JPEG:
                    $hantei = "IMAGETYPE_JPEG";
                    break;
                //pngの場合
                case IMAGETYPE_PNG:
                    $hantei = "IMAGETYPE_PNG";
                    break;
                //どれにも該当しない場合
                default:
                    $hantei = "gif、jpg、png以外の画像です";
            }
        }
    }
}

$format = '%s_%s.%s';
$time = time();
$sha1 = sha1(uniqid(mt_rand(), true));

$file_path = sprintf($format, $time, $sha1, 'jpg');
$file2 = "img/" . $file_path;

// PNGならJPG変換
if ($hantei == "IMAGETYPE_PNG") {
    png2jpg($file1, $file2);
    outPrint();
    exit;
}
// JPG画像
else if ($hantei == "IMAGETYPE_JPEG") {
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

    if ($file1) {
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
                } elseif ($width > $height) { //横長の場合
                    $new_width = $min_width;
                    $new_height = $height * ($min_width / $width);
                } elseif ($width < $height) { //縦長の場合
                    $new_width = $width * ($min_height / $height);
                    $new_height = $min_height;
                }
                // 画像生成
                $out = ImageCreateTrueColor($new_width, $new_height);
                ImageCopyResampled($out, $in, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                //$file2 = "img/" . $file_path;

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

    // 出力
    outPrint();
    exit;
}

// クオリティは 0 (一番圧縮されています) から 100 (高画質)の間の値です。
function png2jpg($originalFile, $outputFile)
{
    $image = imagecreatefrompng($originalFile);

    $in = ImageCreateFromJPEG($image); // 元画像ファイル読み込み
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
            } elseif ($width > $height) { //横長の場合
                $new_width = $min_width;
                $new_height = $height * ($min_width / $width);
            } elseif ($width < $height) { //縦長の場合
                $new_width = $width * ($min_height / $height);
                $new_height = $min_height;
            }
            // 画像生成
            $out = ImageCreateTrueColor($new_width, $new_height);
            ImageCopyResampled($out, $in, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            //$file2 = "img/" . $file_path;
        }
    }
    imagejpeg($out, $outputFile);
    imagedestroy($image);
    // 出力
    outPrint();
}

// 全消去
function clearContent()
{
    unlink("./data.html");
    touch($file_name);
    header('location: index.php');
    exit(); //←忘れずに！
}

// 出力
function outPrint()
{
    // ファイルの存在確認
    echo  $file_name."\n";
    if (!file_exists($file_name)) {
        // ファイル作成
        touch($file_name);
    }

    // URL付き題名
    if ($_POST['ulrPage'] != "") {
        $chatTitle = "<a href='" . $_POST['ulrPage'] . "' target='_blank'>" . $_POST['chatTitle'] . "</a>";
    } else {
        $chatTitle = $_POST['chatTitle'];
    }

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
        . "<a href=" . $file2 . "><img src=" . $file2 . "></a></td></tr><tr><td>"
        . $_SERVER['REMOTE_ADDR'] . " [" . $_SERVER['HTTP_USER_AGENT'] . " ]</td>"
        . "</tr></table>"
        . "<hr></div></div></div></div>";
    $data = $data . "\n";

    $filename = 'data.html'; // data.htmlというカウント数を書き込むテキストファイル
    //$err_file_log = "error.html";
    //$err_fp = fopen($err_file_log, "w");
    $fp = fopen($filename, "a"); // data.htmlファイルを fopenで開く
    $count = fgets($fp, 32); // fgets関数でdata.htmlに書かれたカウント数を読み込む
    $count++; // data.htmlに書かれたカウント数を加算
    fseek($fp, 0); // fseek関数でdata.htmlの読み書きを行う場所を先頭に戻す
    //fwrite($err_fp, $err);
    fwrite($fp, $data); // fputs関数でカウントされた数をファイルに書き込む
    //flock($err_fp, LOCK_UN); // flock関数でファイルを上書きされないようにロックする
    //fclose($err_fp); // fclose関数でファイルを閉じる
    flock($fp, LOCK_UN); // flock関数でファイルを上書きされないようにロックする
    fclose($fp); // fclose関数でファイルを閉じる
    header('location: index.php');
    exit(); //←忘れずに！
}
