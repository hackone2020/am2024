var timerstart0;
var bTimer = false;
function onTimeout(urls) {
  for (var i = 0; i < urls.length; i++) {
    var obj = $('option' + i);
    if (obj && obj.value == '测速中...') {
      $('option'+i).value = urls[i].replace(/\/$/, "") + "/" + "站点的连接超时";
    }
  }
}

function CountTime(i, timespan, url, isCurrentUrl) {
  var currentText = isCurrentUrl ? ' (当前线路)' : '';
  var obj = $('option' + i);
  if (timespan > 10000) {
    obj.text = url.replace(/\/$/, "") + " / " + "站点的连接超时" + currentText;
  } else {
    if (timespan < 10) {
      obj.text = url.replace(/\/$/, "") + " / " + "反应极快" + currentText;
    } else {
      var timestr = Math.floor(timespan) + "ms";
      obj.text = url.replace(/\/$/, "") + " / " + timestr + currentText;
    }
  }
}

function testspeed(urls, currentIndex) {
  timerstart0 = Date.now();
  for (var i = 0; i < urls.length; i++) {
    var url = urls[i];
    var index = i;
    $('option'+index).value = url + " / " + "测速中...";
    document.write("<img src='http://"+ url +"?t=" + Math.random()+"' width='1' height='1' onerror='CountTime("+index+",(Date.now()-timerstart0)/10,\""+url+"\","+(index==currentIndex)+");'>");
  }
}

setTimeout(function () {
  onTimeout(urlsToTest);
}, 10000);

testspeed(urlsToTest, currentIndex);