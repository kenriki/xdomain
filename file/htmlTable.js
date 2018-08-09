<!-- ▼▼/index.htmlの内容▼▼ -->
function htmlTable(){
    var html = "";

    html += '<table>';
	html += '<tr>';
	html += '<td>';
	html += '<input type="button" value="HTMLテンプレート読み込み" class="btn02" onclick="htmlTemplateInput();" />';
	html += '<input type="button" value="見出しタイトル(1)" class="btn01" onclick="hTagTemplateInput();" />';
	html += '<input type="button" value="見出しタイトル(2)" class="btn01" onclick="h2TagTemplateInput();" />';
	html += '<input type="button" value="見出しタイトル(3)" class="btn01" onclick="h3TagTemplateInput();" />';
	html += '<input type="button" value="文章タグ" class="btn01" onclick="pTagTemplateInput();" />';
	html += '<input type="button" value="画像タグ" class="btn01" onclick="imgTagTemplateInput();" />';
	html += '<input type="button" value="リンクタグ" class="btn01" onclick="aTagTemplateInput();" />';
	html += '<input type="button" value="リストタグ" class="btn01" onclick="liTagTemplateInput();" />';
	html += '<input type="button" value="強調タグ" class="btn01" onclick="emTagTemplateInput();" />';
	html += '<input type="button" value="斜体タグ" class="btn01" onclick="iTagTemplateInput();" />';
	html += '</td>';
	html += '</tr>';
	html += '</table>';

    document.write(html);
}


 <!-- ▲▲/index.htmlの内容▲▲ -->