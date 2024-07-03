function CheckKey() {
    if (event.keyCode == 13) return true;
    if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode > 95 || event.keyCode < 106)) {
        alert("下注金额仅能输入数字!!");
        return false
    }
};

function CountGold(gold, type, rtype, bb, ffb) {
    switch (type) {
        case "focus":
            goldvalue = Number(gold.value);
            if (goldvalue == '') goldvalue = 0;
            $('allgold').value = eval(Number($('allgold').value) + "-" + goldvalue);
            $("total_gold").value = Number($('allgold').value);
            break;
        case "blur":
            if (goldvalue != '') {
                goldvalue = Number(gold.value);
                if (goldvalue == '') goldvalue = 0;
                if ((eval(goldvalue) < Number(xy)) && (goldvalue != '')) {
                    gold.focus();
                    alert("下注金额不能低于最低限额:" + xy + "!!");
                    return false
                };
                if (rtype == 'SP' && (eval(goldvalue) > Number(sxl_xxx))) {
                    gold.focus();
                    alert("对不起,此项下注金额最高限制:" + sxl_xxx + "!!");
                    return false
                };
                if (rtype == 'SP' && (eval(goldvalue) > Number(sxl_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + sxl_xx + "!!");
                    return false
                };
                $("total_gold").value = Number($('allgold').value);
                if ($("total_gold").value > Number(ts)) {
                    gold.focus();
                    alert("下注金额不可大於可用信用额度!!");
                    $('allgold').value = $("total_gold").value - gold.value;
                    gold.value = '';
                    return false
                }
            };
            break;
        case "keyup":
            goldvalue = Number(gold.value);
            if (goldvalue == '') {
                goldvalue = 0
            };
            $('allgold').value = eval($("total_gold").value + "\+" + eval(goldvalue));
            $("total_gold").value = Number($('allgold').value);
            break
    }
};

function init() {
    if (http_request.readyState == 4) {
        if (http_request.status == 0 || http_request.status == 200) {
            severtime = new Date(http_request.getResponseHeader("Date"));
            dq_time = severtime;
            lj_time = 1;
            var result = http_request.responseText;
            var arrResult = result.split("###");
            for (var i = 0; i < 12; i++) {
                arrTmp = arrResult[i].split("@@@");
                num1 = arrTmp[0];
                num2 = arrTmp[1];
                num3 = arrTmp[2];
                num4 = arrTmp[3];
                num5 = arrTmp[4];
                num6 = arrTmp[5];
                var blid = i + 1;
                var bl;
                bl = "bl" + blid;
                if (blid >= 1 && blid <= 12) {
                    num2 = round(Number(num2) + Number(sxl_blc), 3);
                    num3 = round(Number(num3) + Number(sxl_blc), 3)
                };
                if (num6 == 1) {
                    $(bl).innerHTML = "<a>停</a>";
                    $("num" + blid).setAttribute('disabled', 'disabled');
                    $("num" + blid).checked = false
                } else {
                    $("num" + blid).removeAttribute('disabled');
                    if (num2 != num3) {
                        $(bl).innerHTML = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><a>" + num2 + "</a></SPAN>"
                    } else {
                        $(bl).innerHTML = "<a>" + num2 + "</a>"
                    }
                }
            };
            $("loadingimg").style.display = 'none';
            $("loadingnumber").innerHTML = Number(autotime / 1000);
            $("loadingnumber").style.display = 'block'
        }
    }
};
var type_max = 6;
var type_min = 2;
var class2 = "二肖连中";

function ChkSubmit() {
    var checkCount = 0;
    $("btnSubmit").disabled = true;
    for (i = 1; i <= 12; i++) {
        if ($("num" + i).checked) {
            checkCount++
        }
    };
    if (checkCount > (type_max)) {
        alert("最多选择" + type_max + "个生肖!");
        $("btnSubmit").disabled = false;
        return false
    };
    if (checkCount < (type_min)) {
        alert("最少选择" + type_min + "个生肖!");
        $("btnSubmit").disabled = false;
        return false
    } else {
        $('total_gold').value = Number($('allgold').value);
        $("btnSubmit").disabled = false;
        return true
    }
};

function select_types(type) {
    
    switch (type) {
        case "1":
             
            class2 = "二肖连中";
            type_max = 6;
            type_min = 2;
            break;
        case "2":
            class2 = "二肖连不中";
            type_max = 6;
            type_min = 2;
            break;
        case "3":
            class2 = "三肖连中";
            type_max = 6;
            type_min = 3;
            break;
        case "4":
            class2 = "三肖连不中";
            type_max = 6;
            type_min = 3;
            break;
        case "5":
            class2 = "四肖连中";
            type_max = 6;
            type_min = 4;
            break;
        case "6":
            class2 = "四肖连不中";
            type_max = 6;
            type_min = 4;
             break;
        case "7":
            class2 = "五肖连中";
            type_max = 7;
            type_min = 5;
            break;
        case "8":
            class2 = "五肖连不中";
            type_max = 7;
            type_min = 5;
            break;
        default:
            class2 = "二肖连中";
            type_max = 6;
            type_min = 2;
            break;
    }
    sotpall();
    read()
};

function SubChkBox(obj) {
    var checkCount = 0;
    if (obj.checked == true) {
        for (i = 1; i <= 12; i++) {
            if ($("num" + i).checked) {
                checkCount++
            }
        };
        if (checkCount > (type_max)) {
            alert("最多选择" + type_max + "个生肖!");
            obj.checked = false;
            return false
        }
    }
};

function sotpall() {
    var cts;
    for (i = 1; i <= 12; i++) {
        var cts = $("bl" + i).innerHTML;
        $("num" + i).removeAttribute('disabled');
        $("num" + i).checked = false
    }
};

function qingling() {
    for (i = 0; i < 12; i++) {
        var blid = i + 1;
        $("num" + blid).checked = false
    };
    $("Num_1").value = "";
    $('allgold').value = 0;
    $("total_gold").value = 0
}