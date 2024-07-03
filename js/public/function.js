window.console = window.console || (function () {  
    var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile  
    = c.clear = c.exception = c.trace = c.assert = function () { };  
    return c;  
})();

if (!Object.keys) {
  Object.keys = function(obj) {
    var keys = [];

    for (var i in obj) {
      if (obj.hasOwnProperty(i)) {
        keys.push(i);
      }
    }
    return keys;
  };
}

if (!String.prototype.repeat) {
    String.prototype.repeat = function (num) {
        return new Array(num + 1).join(this);
    }
}

if (!Array.isArray) {
  Array.isArray = function(arg) {
    return Object.prototype.toString.call(arg) === '[object Array]';
  };
}

if (!Object.create) {
    Object.create = function(proto, props) {
        if (typeof props !== "undefined") {
            throw "The multiple-argument version of Object.create is not provided by this browser and cannot be shimmed.";
        }
        function ctor() { }
        ctor.prototype = proto;
        return new ctor();
    };
}

//处理键盘事件 禁止后退键（Backspace）密码或单行、多行文本框除外
function banBackSpace(e){
    var ev = e || window.event;//获取event对象
    var obj = ev.target || ev.srcElement;//获取事件源
    var t = obj.type || obj.getAttribute('type');//获取事件源类型
    //获取作为判断条件的事件类型
    var vReadOnly = obj.readOnly;
    var vDisabled = obj.disabled;
    //处理undefined值情况
    vReadOnly = (vReadOnly == undefined) ? false : vReadOnly;
    vDisabled = (vDisabled == undefined) ? true : vDisabled;
    //当敲Backspace键时，事件源类型为密码或单行、多行文本的，
    //并且readOnly属性为true或disabled属性为true的，则退格键失效
    var flag1= ev.keyCode == 8 && (t=="password" || t=="text" || t=="textarea")&& (vReadOnly==true || vDisabled==true);
    //当敲Backspace键时，事件源类型非密码或单行、多行文本的，则退格键失效
    var flag2= ev.keyCode == 8 && t != "password" && t != "text" && t != "textarea" ;
    //判断
    if(flag2 || flag1)return false;
}
//禁止退格键 作用于Firefox、Opera
document.onkeypress=banBackSpace;
//禁止退格键 作用于IE、Chrome
document.onkeydown=banBackSpace;
//禁止后退
//window.history.forward(1);
//禁止右键
//document.oncontextmenu=new Function('event.returnValue=false;');
//document.onselectstart=new Function('event.returnValue=false;');


//定义$()元素选择器
//使用方法
//全部元素:$()或$('*')，某种元素(如div):$('*div')，根据id:$(id)或$('id=XXX')，根据name:$(name)或$('name=XXX')，其他属性:$('class=class1')
//返回结果默认为一个元素集数组，如数组只有唯一一项，返回结果为单个元素对象
function $(id) {
    var get_objarr = function(attr,bute){
        if(attr == 'name'){
            return document.getElementsByName(bute);
        }else if(attr == 'id'){
            return document.getElementById(bute);
        }else{
            if(attr == 'class' || attr == 'className' || attr == 'classname'){
                if(!+[1,]){
                    attr = 'classname';
                }else{
                    attr = 'class';
                }
            }
            var eles = document.getElementsByTagName('*');
            var Arr  = [];
            for(var i=0;i<eles.length;i++){
                if(eles[i].getAttribute(attr)==bute){
                    Arr.push(eles[i]);

                }
            }
            return Arr;
        }
    };
    if(id == "" || id == "*") {
        var obj = document.getElementsByTagName('*');
    }else if(id.indexOf('*') == 0) {
        var obj = document.getElementsByTagName(id.split('*')[1]);
    }else if(id.indexOf('=') > 0) {
        var obj = get_objarr(id.split('=')[0],id.split('=')[1]);
    }else if(document.getElementById(id)) {
        var obj = document.getElementById(id);
    }else{
        var obj = document.getElementsByName(id).item(0);
    }
    return obj;
}

/* 封装ajax函数
 * @param {string}opt.type http连接的方式，包括POST和GET两种方式
 * @param {string}opt.url 发送请求的url
 * @param {boolean}opt.async 是否为异步请求，true为异步的，false为同步的
 * @param {object}opt.data 发送的参数，格式为对象类型
 * @param {function}opt.success ajax发送并接收成功调用的回调函数
 */
function ajax(opt) {
    opt = opt || {};
    opt.method = (!opt.method ? "GET" : opt.method.toUpperCase());
    opt.url = opt.url || '';
    opt.async = opt.async || true;
    opt.data = opt.data || null;
    opt.success = opt.success || function () {};
    var xmlHttp = null;
    if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
    else {
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }var params = [];
    for (var key in opt.data){
        params.push(key + '=' + opt.data[key]);
    }
    var postData = params.join('&');
    if (opt.method.toUpperCase() === 'POST') {
        xmlHttp.open(opt.method, opt.url, opt.async);
        xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;charset=utf-8');
        xmlHttp.send(postData);
    }
    else if (opt.method.toUpperCase() === 'GET') {
        xmlHttp.open(opt.method, opt.url + (opt.url.indexOf('?') > 0 ? (postData ? '&' : '') : '?') + postData, opt.async);
        xmlHttp.send(null);
    }
    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            opt.success(xmlHttp.responseText);
        }
    };
}


//封装AJAX函数
function ajax_get(url, callback, extHeaders) {
    http_request = false;
    if(arguments.length == 1 || (typeof arguments[1] !== 'function')) {
        callback = '';
    }
    if (arguments.length == 2) {
        extHeaders = callback;
    }
    if(window.XMLHttpRequest){
        http_request = new XMLHttpRequest();
        if(http_request.overrideMimeType){
            http_request.overrideMimeType('text/xml');
        }
    }else {
        try
        {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
            }
        }
    }
    if(callback != ''){
        http_request.onreadystatechange = function(){
            callback(http_request);
        };
        try {
            http_request.timeout = 10000;
        } catch (e) {}
        http_request.open('GET',url, true);
        http_request.setRequestHeader("If-Modified-Since","0");
        if (extHeaders) {
            for (var i = 0; i < Object.keys(extHeaders).length; i++) {
                var key = Object.keys(extHeaders)[i];
                http_request.setRequestHeader(key, extHeaders[key]);
            }
        }
        http_request.send(null);
        return http_request;
    }else{
        http_request.open("GET",url,false);
        http_request.setRequestHeader("If-Modified-Since","0");
        if (extHeaders) {
            for (var i = 0; i < Object.keys(extHeaders).length; i++) {
                var key = Object.keys(extHeaders)[i];
                http_request.setRequestHeader(key, extHeaders[key]);
            }
        }
        http_request.send(null);
        var strResult = unescape(http_request.responseText);
        return strResult;
    }
}
function ajax_post(url,data,callback) {
    http_request = false;
    if(arguments.length == 2){
        callback = "";
    }
    if(window.XMLHttpRequest){
        http_request = new XMLHttpRequest();
        if(http_request.overrideMimeType){
            http_request.overrideMimeType('text/xml');
        }
    }else if(window.ActiveXObject) {
        try
        {
            http_request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            try
            {
                http_request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e)
            {
            }
        }
    }
    if(callback != ''){
        http_request.onreadystatechange = function(){
            callback(http_request);
        };
        http_request.open('POST',url, true);
        http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        http_request.send(data);
    }else{
        http_request.open("POST",url,false);
        http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        http_request.send(data);
        var strResult = unescape(http_request.responseText);
        return strResult;
    }
}
//跳转
function go_main(url) {
    if(url!= null){
        if (url.indexOf("uid=") < 0){
            url = url + (url.indexOf("?") >= 0 ? "&" : "?") +"uid=" + uid;
        }
        url = url + "&__=" + new Date().getTime();
        window.open(url,'main');
       
    }
}
//分页跳转
function go_page(u,p) {
    if(u!= null && p!= null){
        u = u + (u.indexOf("?") >= 0 ? "&" : "?") +"page=" + p+"&uid=" + uid;
        go_main(u);
    }
}
//限制只能输入数字
function CheckKey(e){
    if(window.event){
        // IE
        keynum = e.keyCode
    }else if(e.which){
        // Netscape/Firefox/Opera
        keynum = e.which
    }
    if(!(keynum>=48 && keynum<=57) && keynum!=8){
        return false;
    }else{
        return true;
    }
}

function fix_int(v) {
    var s = v.search("[^0-9]+");
    if (s != -1) {
        return v.substring(0, s);
    }
    return v;
}

//转正整数
function to_int(v){
    if (!v) {
        return 0;
    }
    var s = v.search("^-?\\d+$");
    if(s != 0 || v == ""){
        return 0;
    }else{
        return Number(v);
    }
}
//转取绝对值
function to_abs(v){
    var s = Math.abs(v)
    if(isNaN(s)) {
        return 0;
    }else{
        return s;
    }
}
//转浮点
function to_float(v){
    var s = parseFloat(v);
    if(isNaN(s)) {
        return false;
    }else{
        return s;
    }
}
//保留小数(四舍五入)
function to_round(v,e){
    for(var t=1;e>0;t*=10){
        e--;
    }
    var s = Math.round(v*t)/t;
    if(isNaN(s)) {
        return 0;
    }else{
        return s;
    }
}
//保留小数(向下舍入)
function to_floor(v,e){
    if(isNaN(v) || v == 0) {
        return 0;
    }else{
        return v.toFixed(e)*1;
    }
}
//保留小数(向上舍入)
function to_ceil(v,e){
    for(var t=1;e>0;t*=10){
        e--;
    }
    var s = Math.ceil(v*t)/t;
    if(isNaN(s)) {
        return 0;
    }else{
        return s;
    }
}
//带逗号金额
function number_format(s, n) {
    n = n > 0 && n <= 20 ? n : 0;
    s = parseFloat((s + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";
    var l = s.split(".")[0].split("").reverse(),
        r = s.split(".")[1];
    t = "";
    for (i = 0; i < l.length; i++) {
        t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "," : "");
    }
    if(n == 0){
        return t.split("").reverse().join("");
    }else{
        return t.split("").reverse().join("") + "." + r;
    }
}
//返回-1表示没找到，返回其他值表示找到的索引
function in_array(a, v) {
    var i;
    for (i=0;i<a.length;i++) {
        if (v == a[i]){
            return i;
        }
    }
    return -1;
}
//弹出窗口
function ops(str1,str2,str3) {
    dWin = showModalDialog(str1,window,'dialogHeight:'+str2+'px;dialogWidth:'+str3+'px;scroll:yes;resizable:no;status:no;help:no');
}
//判断全选反选
function checksel(form){
    if (form.sele.checked == true){
        checkall(form,true);
    }else{
        checkall(form,false);
    }
}
//全选
function checkall(form,str){
    for (var i=0;i<form.elements.length;i++){
        var e = form.elements[i];
        if(e.type == 'checkbox'){
            e.checked = str;
        }
    }
}
//鼠标位置
var X = 0;
var Y = 0;
function mouseMove(ev) {
    //当页面加载状态
    if(document.readyState == "complete") {
        ev = ev || window.event;
        var mousePos = mouseCoords(ev);
        X = mousePos.x;
        Y = mousePos.y;
    }
}
function mouseCoords(ev) {
    if(ev.pageX || ev.pageY){
        return {x:ev.pageX, y:ev.pageY};  }
    return {  x:ev.clientX + document.body.scrollLeft - document.body.clientLeft,  y:ev.clientY + document.body.scrollTop - document.body.clientTop  };
}
document.onmousemove = mouseMove;

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}

function getUrlComponent(ind) {
    var sPageURL = decodeURIComponent(window.location.pathname);
    return sPageURL.split('/').slice(ind)[0];
}

function GetIEVersion() {
    var sAgent = window.navigator.userAgent;
    var Idx = sAgent.indexOf("MSIE");

    // If IE, return version number.
    if (Idx > 0)
        return parseInt(sAgent.substring(Idx+ 5, sAgent.indexOf(".", Idx)));

    // If IE 11 then look for Updated user agent string.
    else if (!!navigator.userAgent.match(/Trident\/7\./))
        return 11;

    else
        return false; //It is not IE
}