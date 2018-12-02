@echo off

@REM HTML5テンプレート
set A="<!DOCTYPE html>"
set B="<html lang='ja'>"
set C="<head>"
set D="<meta charset='utf-8'>"
set E="<title>サンプル</title>"
set F="<link rel='stylesheet' type='text/css' href='./css/style.css'>"
set G="<script src='./js/script.js'></script>"
set H="</script>"
set I="</head>"
set J="<body onload='app.init();'>"
set J1="<div><h1>サンプル</h1></div>"
set K="</body>"
set L="</html>"
set MSG_1="HTMLテンプレート バージョン1.0.0"
set MSG_2="※ index.htmlをクリックで画面が見れます"

mkdir %USERPROFILE%\Desktop\develop
mkdir %USERPROFILE%\Desktop\develop\js
mkdir %USERPROFILE%\Desktop\develop\css
mkdir %USERPROFILE%\Desktop\develop\img
	
set DOC_PATH=%USERPROFILE%\Desktop\develop\index.html
set CSS_PATH=%USERPROFILE%\Desktop\develop\css\style.css
set JS_PATH=%USERPROFILE%\Desktop\develop\js\script.js
set README_PATH=%USERPROFILE%\Desktop\develop\readme.txt

@REM UTF-8
chcp 65001

echo %A% > %DOC_PATH%
echo %B% >> %DOC_PATH%
echo %C% >> %DOC_PATH%
echo %D% >> %DOC_PATH%
echo %E% >> %DOC_PATH%
echo %F% >> %DOC_PATH%
echo %G% >> %DOC_PATH%
echo %H% >> %DOC_PATH%
echo %I% >> %DOC_PATH%
echo %J% >> %DOC_PATH%
echo %J1% >> %DOC_PATH%
echo %K% >> %DOC_PATH%
echo %L% >> %DOC_PATH%
echo html,body {color: rgb(200,200,200); background-color: rgb(29,29,29); } > %CSS_PATH%
echo var app={}; app.init = function(){alert("test");} > %JS_PATH%
echo %MSG_1%  > %README_PATH%
echo %MSG_2%  >> %README_PATH%