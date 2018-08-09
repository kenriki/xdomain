var fileName=0;
var extension;

function onButtonClick() {
	alert("作成したファイルをエクスポートします");
	var target = document.getElementById("output");
	var input = target.innerText = document.forms.id_form1.id_textBox1.value;
	var blob = new Blob([input]);
	fileName = document.forms.id_form1.id_textBox0.value;
	extension = document.forms.id_form1.id_textBox0A.value;
	
	//改行を改行タグに置き換える
	input = input.split("\n").join("<br />"); //HTMLファイル
	input = input.split("<br />").join("\n"); 
	
	//拡張子がhtml以外の改行コードの指定
	if(extension!="html"){
		input = input.split("\n").join("\r\n");
	}
	
	// 「FileSystemObject」オブジェクト生成
	var fs = new ActiveXObject("Scripting.FileSystemObject");
	
	if(fileName==0){
		var file = fs.OpenTextFile("NotName.html", 2, true);
	}	
	
	//ファイル作成
	var file = fs.OpenTextFile(""+fileName+"."+extension+"", 2, true);
	
	if (window.navigator.msSaveBlob) {
        window.navigator.msSaveBlob(blob,""+fileName+"."+extension+"");
        } else {
        var url = window.URL.createObjectURL(blob);
        document.getElementById("download").href = url;
    }
    
	file.WriteLine(input);
	file.Close();
}


function htmlTemplateInput(){
	var a = document.getElementById ('id_textBox1');
	
	a.value = '<!DOCTYPE html>\n'
			  +'<html lang="ja">\n'
			  +'<head>\n'
			  +'<meta charset="Shift_JIS">\n'
			  +'<title></title>\n'
			  +'</head>\n'
			  +'<body>\n'
			  +'<!-- ここに本文を入れてください -->\n'
			  +'</body>\n'
			  +'</html>\n';
	
}

function hTagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<h1>見出しタイトル(1)</h1>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}

function h2TagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<h2>見出しタイトル(2)</h2>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}

function h3TagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<h3>見出しタイトル(3)</h3>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}


function aTagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<a href='url'>リンク</a>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}

function liTagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<li>リスト</li>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}

function emTagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<em>強調</em>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}

function iTagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<i>斜体</i>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}

function pTagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<p>文章</p>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}

function imgTagTemplateInput(){
	if (!document.createElement) return;

	var ele = document.createElement("p");		// 新規に要素（タグ）を生成
	var str = document.createTextNode("<img src='xxx.jpg'/>");	// 生成する要素の値（文字列）
	ele.appendChild(str);					// 生成する要素の作成（要素に値を追加）

	document.forms.id_form1.id_textBox1.appendChild(ele);				// このページ (document.body) の最後に生成した要素を追加	
}


function handleErr(msg,url,l)
{
txt="このページにエラーがありました。\n\n";
txt+="エラー: " + msg + "\n";
txt+="URL: " + url + "\n";
txt+="行: " + l + "\n\n";
txt+="継続するため OK をクリックしてください。\n\n";
alert(txt);
return true;
}
// end of error handler.

$(function() {
    var click_count = 0;    // ボタンカウント用変数

    if (typeof Blob !== "undefined") {
        // alert('このブラウザに対応しています');
    } else {
        alert('このブラウザには対応していません');
    }

    $("#count").click(function(){
        click_count++; // ボタンを押した数をカウント
        // text_boxクラスのテキストの値を変更
        $("#contents_sample_wrap .text_box").text("ボタンが" + click_count + "回クリックされました");
    });

    $("#export").click(function(){  // 出力ボタンを押した場合は、setBlobUrl関数に値を渡して実行
        setBlobUrl("download", click_count);
    });
});

function setBlobUrl(id, content) {

 // 指定されたデータを保持するBlobを作成する。
    var blob = new Blob([ content ], { "type" : "application/x-msdownload" });  // IE ではエラーになる
 
 // Aタグのhref属性にBlobオブジェクトを設定し、リンクを生成
    window.URL = window.URL || window.webkitURL;
    $("#" + id).attr("href", window.URL.createObjectURL(blob));
    $("#" + id).attr("download", ""+fileName+"."+extension+"");
}

