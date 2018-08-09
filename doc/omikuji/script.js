"use strict";

function init(){

    "use strict";
    
    alert("おみくじ結果は、、");
    
    var ran = Math.floor(Math.random() * 6) + 1;
    
    var str = "結果は、、";
    
    switch(ran){
        case 1:
            str += "「大吉」";
            break;
        case 2:
            str += "「中吉」";
            break;
        case 3:
            str += "「吉」";
            break;
        case 4:
            str += "「小吉」";
            break;
        case 5:
            str += "「末吉」";
            break;
        case 6:
            str += "「凶」";
            break;
    }
    
    var ele = document.getElementById("id_result");
    document.getElementById("ID_IMG_GIF").src = "omikuji_res.gif";
    ele.innerHTML = "<h2>" + str + "</h2>";
    
    alert(str);
    
    if(!window.confirm("前のページに戻ります。よろしいでしょうか？")){
        return;
    }
    history.back();
}

setTimeout(init, 3000);
