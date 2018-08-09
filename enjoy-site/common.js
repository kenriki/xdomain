"use strict";

var app = {
    sp_index_url: './sp/index.html',
    alert_msg_01: "入力が正しくありません"
};

window.onload = function () {
    if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') === -1) || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
        location.href = app.sp_index_url;
    }
};

app.checkDocument = function (mode) {
    "use strict";
    switch (mode) {
        case 1:
            alert(this.alert_msg_01);
            break;
        default:
            break;
    }
};


