<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
$_SESSION["loginname"] = $_POST["username"];
$_SESSION["pass"] = $_POST["pass"];

$db['host'] = "sv1.php.xdomain.ne.jp";  // DBサーバのURL
$db['user'] = $_SESSION["loginname"];  // ユーザー名
$db['pass'] = $_SESSION["pass"];  // ユーザー名のパスワード
$db['dbname'] = "kenriki_sample";  // データベース名


// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["username"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["pass"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["username"]) && !empty($_POST["pass"])) {
        // 入力したユーザIDを格納
        $userid = $_POST["username"];

        // 2. ユーザIDとパスワードが入力されていたら認証する
        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        // 3. エラー処理
        try {
            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            $stmt = $pdo->prepare('SELECT * FROM userData WHERE name = ?');
            $stmt->execute(array($userid));

            $password = $_POST["password"];

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if (password_verify($password, $row['password'])) {
                    session_regenerate_id(true);

                    // 入力したIDのユーザー名を取得
                    $id = $row['name'];
                    $sql = "SELECT * FROM login_info WHERE name = `$id`";  //入力したIDからユーザー名を取得
                    $stmt = $pdo->query($sql);
                    foreach ($stmt as $row) {
                        $name = $row['name'];  // ユーザー名
                        $pass = $row['password']; 
                    }
                    $_SESSION["NAME"] = $row['name'];
                    header("Location: index.php");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗
                    $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
                }
            } else {
                // 4. 認証成功なら、セッションIDを新規に発行する
                // 該当データなし
                $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
            }
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            //$errorMessage = $sql;
            // $e->getMessage() でエラー内容を参照可能（デバッグ時のみ表示）
            // echo $e->getMessage();
        }
    }
}


if($_SESSION["loginname"] != $name || $_SESSION["pass"] != $pass){
    ?>
    ログインに失敗しました。<br />
    <a href="index.php">前のぺーじへ</a>
    <?php
    exit;
}
if(isset($_POST["username"])) setcookie("username", $_POST["username"], time()+120);
?>
会員専用画面です。<br />
ログイン認証に成功しました。現在ログインしている状態です。<br />
<a href="cookie.php">マイページへ</a>
会員専用画面です。<br />
ログイン認証に成功しました。現在ログインしている状態です。<br />
<a href="cookie.php">マイページへ</a>