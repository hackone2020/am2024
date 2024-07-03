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

function go_page(u, p) {
    if (u != null && p != null) {
        u = u + "&page=" + p;
        window.open(u, 'main')
    }
};

function rounds(num) {
    if (num < 0) {
        return 0
    } else {
        return (Math.floor((num) * 100) / 100)
    }
};

function round(v, e) {
    var t = 1;
    for (; e > 0; t *= 10, e--);
    for (; e < 0; t /= 10, e++);
    return Math.round(v * t) / t
};
var timeoutProcess = "";
var mkurl = "";

function makeRequest(url) {
    $("loadingimg").style.display = 'block';
    $("loadingnumber").innerHTML = '0';
    $("loadingnumber").style.display = 'none';
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
    http_request.onreadystatechange = init;
    http_request.open('GET', url, true);
    http_request.setRequestHeader("If-Modified-Since", "0");
    http_request.send(null);
    try {
        var Requesttime = autotime
    } catch (err) {
        var Requesttime = 45000
    };
    timeoutProcess = setTimeout("makeRequest('" + url + "')", Requesttime)
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
document.oncontextmenu = new Function('event.returnValue=false;');
document.onselectstart = new Function('event.returnValue=false;');