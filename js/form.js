document.writeln("<style>");
document.writeln("#Loading{position:absolute;z-index:10;left:10px;top:10px;border:1px #867575 solid;background:#eeeeee;width:558px;height:246px}");
document.writeln("#Loading_top{background-image: url(\'images\/zebg.gif\');text-align:center;height:24px;line-height:24px;width: 100%;color: #FFFFFF;font-size: 14px;cursor: pointer;}");
document.writeln("<\/style>")
document.writeln("<div id=\"Loading\" style=\"display:none\" ondblclick=\"this.style.display=\'none\'\"><\/div>")
var OverH, OverW, ChangeDesc, ChangeH = 50,
    ChangeW = 50;

function OpenDiv(_Dw, _Dh, _Desc) {
    $("Loading").innerHTML = "";
    OverH = _Dh;
    OverW = _Dw;
    ChangeDesc = "<div id=\"Loading_top\"  onclick=\"Loading.style=\'width:26px;height:26px;line-height:26px;float:right;text-align:center;\'\" >¹Ø±Õ´°¿Ú<\/div>";
    ChangeDesc = ChangeDesc + "<iframe id=\"frmRight\" style=\"Z-INDEX: 1; VISIBILITY: inherit; WIDTH: 100%; HEIGHT: 100%\" name=\"frmRight\" src=\"";
    ChangeDesc = ChangeDesc + _Desc + "\" scrolling=\"auto\" frameborder=\"0\"><\/iframe>";
    $("Loading").style.display = '';
    if (_Dw > _Dh) {
        ChangeH = Math.ceil((_Dh - 10) / ((_Dw - 10) / 50))
    } else if (_Dw < _Dh) {
        ChangeW = Math.ceil((_Dw - 10) / ((_Dh - 10) / 50))
    };
    $("Loading").style.top = (document.documentElement.clientHeight - 10) / 2 + "px";
    $("Loading").style.left = (document.documentElement.clientWidth - 10) / 2 + "px";
    OpenNow()
};
var Nw = 10,
    Nh = 10;

function OpenNow() {
    if (Nw > OverW - ChangeW) ChangeW = 2;
    if (Nh > OverH - ChangeH) ChangeH = 2;
    Nw = Nw + ChangeW;
    Nh = Nh + ChangeH;
    if (OverW > Nw || OverH > Nh) {
        if (OverW > Nw) {
            $("Loading").style.width = Nw + "px";
            $("Loading").style.left = (document.documentElement.clientWidth - Nw) / 2 + "px"
        };
        if (OverH > Nh) {
            $("Loading").style.height = Nh + "px";
            $("Loading").style.top = (document.documentElement.clientHeight - Nh) / 2 + "px"
        };
        window.setTimeout("OpenNow()", 10)
    } else {
        Nw = 10;
        Nh = 10;
        ChangeH = 50;
        ChangeW = 50;
        $("Loading").innerHTML = ChangeDesc
    }
}