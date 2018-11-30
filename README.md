
# エンジニアメモ日記

## 2018/11/22/Fri
1.今日タスク  
    git更新  
    &nbsp;&nbsp;&nbsp;&nbsp;Markdownファイル  
    &nbsp;&nbsp;&nbsp;&nbsp;/topのindex.html  
    &nbsp;&nbsp;&nbsp;&nbsp;/login/index.php
    <hr>
## 2018/11/23/Sat  
1. H2 Database Engine (以降H2DBと記載します)  
    [H2DBサイト](http://www.h2database.com/html/main.html)  
2. ライブラリ系はlibディレクトリへ移動  
    <hr>
## 2018/11/25/Sun  
1. ピクチャーページ修正
2. ディレクトリ整理

    <hr>
## 2018/11/29/Thu  
1. VSCodeにPlantUMLプラグイン設定
2. 自動生成されたUMLとUMLコードをGitへPush
    <hr>
## 2018/11/30/Fri  
1. UML(サンプル用)追加、修正
2. 自動生成されたUML画像をGitへ更新

<hr>
<br>

# Javaエラーについて
## 1. tomcat 絡み
## 発生条件 / 原因  
・ eclipseの「サーバー」タブのtomcatにプロジェクトを紐づけようとした際に発生する。
原因はプロジェクトがtomcatのプロジェクトとして認識されていないこと。
## 対処法  
・ プロジェクト名で右クリック → 「プロパティ」を選択する。ウィンドウが表示されるので、「プロジェクト・ファセット」を選択して「Java」と「動的Webモジュール」にチェックを入れ、更に「より詳しい構成が使用可能...」を選択する。ウィンドウが出現するので、「web.xmlデプロイメント記述子の生成」にチェックを入れて終了する。  

※Java、動的Webモジュール、Tomcatのバージョンは正しく設定しないといけません。

<例>  
Java1.7, 動的Webモジュール3.0, Tomcat7の組み合わせならOKですが、Java1.8, 動的Webモジュール4.0, Tomcat7の組み合わせだと認識してくれません。



