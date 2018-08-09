<?php
header("Content-Type: text/html; charset=UTF-8");
session_start();
$_SESSION["loginname"] = $_POST["text01_name"];
$_SESSION["pass"] = $_POST["text02_pass"];
// 管理用アカウント
if($_SESSION["loginname"] !== "admin" || $_SESSION["pass"] !== "test1"){
    if($_SESSION["loginname"] === "user1234" || $_SESSION["pass"] === "p@ssW0rd"){
        header('location:./passwordChange.php');
        exit;
    }
    if($_SESSION["loginname"] === "management" || $_SESSION["pass"] === "passworD$"){
        header('location:./management.php');
        exit;
    }
    // 空欄チェック
    else if($_SESSION["loginname"] === "" || $_SESSION["pass"] === ""){
        header('location:./index.html');
        exit;
    }
    else{
        header('location:./index.html');
        exit;
    }
}
// else if($_SESSION["user"] && $_SESSION["password"]){
//     if($_SESSION["loginname"] === $_SESSION["user"] || $_SESSION["pass"] === $_SESSION["password"]){
//         header('location:./test_mgt.php');
//         exit;
//     }
// }
else{
    if(isset($_POST["loginname"])) setcookie("username", $_POST["loginname"], time()+120);
    header('Location:./page.php');
    exit;
}


?>



