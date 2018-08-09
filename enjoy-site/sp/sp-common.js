"use strict";

var app = {

    alert_msg_01: "入力が正しくありません"
};

window.onload = function () {

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


