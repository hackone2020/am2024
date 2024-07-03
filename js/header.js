function $(id) {
    if (document.getElementById(id)) {
        return document.getElementById(id)
    } else {
        return document.getElementsByName(id).item(0)
    }
};

function go_main(url) {
    if (url != null) {
        url = url + "&uid=" + uid;
        window.open(url, 'main')
    }
};
var timeoutProcess = "";
var mkurl = "";

function makeRequest(url) {
    http_request = false;
    if (window.XMLHttpRequest) {
        http_request = new XMLHttpRequest();
        if (http_request.overrideMimeType) {
            http_request.overrideMimeType('text/xml')
        }
    } else if (window.ActiveXObject) {
        try {
            http_request = new ActiveXObject("Msxml2.XMLHTTP")
        } catch (e) {
            try {
                http_request = new ActiveXObject("Microsoft.XMLHTTP")
            } catch (e) {}
        }
    };
    if (url != "no") {
        mkurl = url
    };
    http_request.onreadystatechange = init;
    http_request.open('GET', mkurl, true);
    http_request.setRequestHeader("If-Modified-Since", "0");
    http_request.send(null);
    try {
        var Requesttime = autotime
    } catch (err) {
        var Requesttime = 45000
    };
    timeoutProcess = setTimeout("makeRequest('" + mkurl + "')", Requesttime)
};

function init() {
    if (http_request.readyState == 4) {
        if (http_request.status == 0 || http_request.status == 200) {
            var result = http_request.responseText;
            if (result == "") {
                result = "Access failure "
            };
            var arrResult = result.split("###");
            if (arrResult[0] != null && arrResult[1] == null) {
                window.open('index.php', '_top');
                return false
            };
            arrTmp = arrResult[1];
            num1 = arrResult[2];
            if (arrTmp != "0") {
                window.open('index.php', '_top');
                return false
            };
            if (num1 != a8 && num1 != "") {
                alert(num1);
                a8 = num1
            }
        } else {
            return false
        }
    }
};
window.onbeforeunload = function() {
    if (((event.clientX > document.body.clientWidth - 43) && (event.clientY < 23)) || event.altKey) {
        xmlFile("main.php?action=logout&uid=" + uid)
    }
};

function xmlFile(pageURL) {
    var xmlDoc;
    if (window.XMLHttpRequest) {
        xmlDoc = new XMLHttpRequest();
        if (xmlDoc.overrideMimeType) {
            xmlDoc.overrideMimeType('text/xml')
        }
    } else if (window.ActiveXObject) {
        try {
            xmlDoc = new ActiveXObject("Msxml2.XMLHTTP")
        } catch (e) {
            try {
                xmlDoc = new ActiveXObject("Microsoft.XMLHTTP")
            } catch (e) {}
        }
    };
    xmlDoc.open("GET", pageURL, false);
    xmlDoc.setRequestHeader("If-Modified-Since", "0");
    xmlDoc.send(null);
    var strResult = unescape(xmlDoc.responseText);
    return strResult
};
//document.oncontextmenu = new Function('event.returnValue=false;');
//document.onselectstart = new Function('event.returnValue=false;');