<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>手書きパッド</title>
  
</head>
<body onload="mam_draw_init();">
<div style="border:solid 1px #000000;" id="candiv">
  <div id="target">
    <canvas id="can"></canvas>
    
  </div>
  </div>
  <form name="form1">
    <select name="colorValStyle" style="width:200px;height:20px;">
      <option value="#000000">黒</option>
      <option value="#FF0000">赤</option>
      <option value="#0000FC">青</option>
      <option value="#FFFF00">黄</option>
      <option value="#228B22">緑</option>
      <option value="#FF1493">桃</option>
      <option value="#FFFFFF">白</option>
    </select>
    <input type="button" onClick="clearCan();" value="クリア" style="width:100;height:30;" data-inline="true" />
<input type="button" onClick="app.init();" value="色確定" style="width:100;height:30;" data-inline="true" />
    
  </form>


  
  <script>

    var app = app || {
        ox : "",
        oy : "",
        x : "",
        y : "",
        mf : false,
        can : "",
        ct : "",
        setColor : "",
        init : function() {
            var self = this;
            var color1 = document.form1.colorValStyle;
            var num = color1.selectedIndex;
            self.setColor = color1.options[num].value;
            mam_draw_init(false);
        }
    };
    
    window.onload = function() {
        alert("パレットから色を指定してください");
        
        if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') == -1) 
            || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
        }else{
        	// PC用
            document.getElementById("candiv").style.width = (window.outerWidth - 50)+"px";
            document.getElementById("candiv").style.height = (window.innerHeight - 50)+"px";
            document.getElementById("can").style.width = (window.outerWidth - 50)+"px";
            document.getElementById("can").style.height = (window.innerHeight - 50)+"px";
        }
    
    };
    
      function mam_draw_init(hoji){
        //初期設定
        app.can=document.getElementById("can");
        // タッチ
        app.can.addEventListener("touchstart",onDown,false);
        app.can.addEventListener("touchmove",onMove,false);
        app.can.addEventListener("touchend",onUp,false);
        
        // マウス
        app.can.addEventListener("mousedown",onMouseDown,false);
        app.can.addEventListener("mousemove",onMouseMove,false);
        app.can.addEventListener("mouseup",onMouseUp,false);
        
        // canvas設定
        app.ct=can.getContext("2d");
        app.ct.strokeStyle=app.setColor;
        app.ct.lineWidth=1.5;
        app.ct.lineJoin="round";
        app.ct.lineCap="round";
        
        if(hoji !== false){
            clearCan();
        }
        
      }
      function onDown(event){
        app.mf=true;
        app.ox=0.5 + (event.touches[0].pageX-event.target.getBoundingClientRect().left);
        app.oy=0.5 + (event.touches[0].pageY-event.target.getBoundingClientRect().top);
        event.stopPropagation();
      }
      function onMove(event){
        if(app.mf){
          app.x=0.5 + (event.touches[0].pageX-event.target.getBoundingClientRect().left);
          app.y=0.5 + (event.touches[0].pageY-event.target.getBoundingClientRect().top);
          drawLine();
          app.ox=app.x;
          app.oy=app.y;
          event.preventDefault();
          event.stopPropagation();
        }
      }
      function onUp(event){
        app.mf=false;
        event.stopPropagation();
      }
      
      function onMouseDown(event){
        app.ox=(0.5 + event.clientX-event.target.getBoundingClientRect().left);
        app.oy=(0.5 + event.clientY-event.target.getBoundingClientRect().top);
        app.mf=true;
      }
      function onMouseMove(event){
        if(app.mf){
          app.x=(0.5 + event.clientX-event.target.getBoundingClientRect().left);
          app.y=(0.5 + event.clientY-event.target.getBoundingClientRect().top);
          drawLine();
          app.ox=app.x+0.05;
          app.oy=app.y+0.05;
        }
      }
      function onMouseUp(event){
        app.mf=false;
      }
      function drawLine(){
        app.ct.beginPath();
        app.ct.moveTo(app.ox,app.oy);
        app.ct.lineTo(app.x,app.y);
        app.ct.stroke();
      }
      function clearCan(){
        app.ct.fillStyle="rgb(255,255,255)";
        app.ct.fillRect(0,0,can.getBoundingClientRect().width,can.getBoundingClientRect().height);
      }

        var conf = conf || {
          imgData: ""
        };
        function download() {

          //ボタンを押下した際にダウンロードする画像を作る
          html2canvas(document.getElementById("target"), {
            onrendered: function (canvas) {

              //aタグのhrefにキャプチャ画像のURLを設定
              //app.imgData = canvas.toDataURL();
              imagesLook();
              

            }
          });

        };

        function okEvent() {
          imagesLook();
        }

        function imagesLook() {
          //HTML内に画像を表示
          html2canvas(document.getElementById("target"), {
            onrendered: function (canvas) {
              //imgタグのsrcの中に、html2canvasがレンダリングした画像を指定する。
              app.imgData = canvas.toDataURL();
              document.getElementById("result").src = conf.imgData;
              document.getElementById("ss").href = conf.imgData;
            }
          });

        }
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
</body>
</html>