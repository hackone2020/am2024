var mBut_1=new Array();
var mBut_2=new Array();
var mBut_3=new Array();
var mBut_4=new Array();
var mBut_5=new Array();
var mBut_6=new Array();
var mBut_7=new Array();
var mBut_8=new Array();
var mBut_9=new Array();
var mBut_10=new Array();

function go_menu(mid){
    menu = mid;
    if ( menu != 0)
    {
        var But_Htm = "";
        var mBut = null;
        try { 
            mBut = eval("mBut_" + mid);
        } catch (e) {
            ;
        }
        if (mBut && mBut.length){
            for (i=0;i<(mBut.length);i++){
                if (mBut[i] instanceof Array) {
                    if (i != 0) {
                        But_Htm += "&nbsp;&nbsp;|&nbsp;&nbsp;";
                    }
                    But_Htm += "<a href='javascript:void(0);' onClick=\"go_main('"+mBut[i][1]+"');\" >"+mBut[i][0]+"</a>";
                }
            }
            document.getElementById("menu_lb").innerHTML = But_Htm;
            But_Htm="";
            mBut=null;
        } else {
            document.getElementById("menu_lb").innerHTML = "";
            try {
                go_main(eval("url"+menu));
            } catch (e) {
                ;
            }
        }
    }
}

var timeoutProcess = "";
var readurl = "";
var gapTime = "";
var isReadingFile = false;
function readfile(url,settimeout){
    url = url.replace(new RegExp("//","g"),"/");
    if(url != readurl){
        clearTimeout(timeoutProcess);
        readurl = url;
    }
    ajax_get(readurl,init);
    try{
        var Requesttime  = artime;
    }catch(err){
        var Requesttime  = 45000;
    }
    if(settimeout){
        timeoutProcess = setTimeout("readfile('"+readurl+"',true)", Requesttime);
    }
}
function init(obj) {
    if (obj.readyState == 4) {
        if (obj.status == 0 || obj.status == 200) {
            var result = obj.responseText;
            now = new Date(obj.getResponseHeader("Date"));
            if(result == ""){
                result = "Access failure ";
            }
            var Resultarr = eval('('+result+')');
            if(typeof(Resultarr['error']) != "undefined" && Resultarr['error'] != ""){
                alert(Resultarr['error']);
                window.open('/','_top');
                return false;
            }
            if( Resultarr['online_num'] == null && Resultarr['affice'] == null){
                window.open('/','_top');
                return false;
            }
            if( Resultarr['web_name'] != web_name){
                window.location.reload();
                return false;
            }
            if ($("online_num")) {
                $("online_num").innerHTML = Resultarr['online_num'];
            }
            gapTime = now.getTime() - new Date().getTime();
            isReadingFile = false;
        }else{
            return false;
            isReadingFile = false;
        }
    }
}
window.onbeforeunload = function(){
    if(((event.clientX > document.body.clientWidth - 43) && (event.clientY < 23)) || event.altKey) {
        ajax_get("logout?uid="+uid);
    }
} 