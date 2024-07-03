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
                if (rtype == 'SP' && (eval(goldvalue) > Number(bz_xxx))) {
                    gold.focus();
                    alert("对不起,此项下注金额最高限制:" + bz_xxx + "!!");
                    return false
                };
                if (rtype == 'SP' && (eval(goldvalue) > Number(bz_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + bz_xx + "!!");
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
            for (var i = 0; i < 49; i++) {
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
                if (blid >= 1 && blid <= 49) {
                    num2 = round(Number(num2) + Number(bz_blc), 3);
                    num3 = round(Number(num3) + Number(bz_blc), 3)
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
var type_max;
var type_min;
var class2;

function ChkSubmit() {
    var checkCount = 0;
    $("btnSubmit").disabled = true;
    if (!Number($('allgold').value) > 0 || eval($('total_gold').value) <= 0) {
        alert("请输入每组下注金额!!");
        $("btnSubmit").disabled = false;
        return false
    };
    for (i = 1; i <= 49; i++) {
        if ($("num" + i).checked) {
            checkCount++
        }
    };
    if (checkCount < (type_min)) {
        alert("最少选择" + type_min + "#个号码!");
        $('total_gold').value = Number($('allgold').value);
        $("btnSubmit").disabled = false;
        return false
    };
    if (checkCount > (type_max)) {
        alert("最多只能选择" + type_max + "!个号码!");
        $('total_gold').value = Number($('allgold').value);
        $("btnSubmit").disabled = false;
        return false
    };
    $('total_gold').value = Number($('allgold').value);
    $("btnSubmit").disabled = false;
    return true
};

function select_types(type) {
    switch (type) {
        case 1:
            {
                class2 = "五不中";
                type_max = 8;
                type_min = 5;
                break
            };
        case 2:
            {
                class2 = "六不中";
                type_max = 9;
                type_min = 6;
                break
            };
        case 3:
            {
                class2 = "七不中";
                type_max = 10;
                type_min = 7;
                break
            };
        case 4:
            {
                class2 = "八不中";
                type_max = 11;
                type_min = 8;
                break
            };
        case 5:
            {
                class2 = "九不中";
                type_max = 12;
                type_min = 9;
                break
            };
        case 6:
            {
                class2 = "十不中";
                type_max = 13;
                type_min = 10;
                break
            };
        case 7:
            {
                class2 = "十一不中";
                type_max = 14;
                type_min = 11;
                break
            };
        case 8:
            {
                class2 = "十二不中";
                type_max = 15;
                type_min = 12;
                break
            };
        default:
            {
                class2 = "五不中";
                type_max = 8;
                type_min = 5;
                break
            }
    };
    sotpall();
    read()
};

function SubChkBox(y) {
    var checkCount = 0;
    var obj = $("num" + y);
    for (i = 1; i <= 49; i++) {
        if ($("num" + i).checked) {
            checkCount++
        }
    };
    if (obj.checked == true) {
        if (checkCount > (type_max)) {
            alert("最多只能选择" + type_max + "个号码!");
            obj.checked = false;
            return false
        }
    }
};

function sotpall() {
    var cts;
    for (i = 1; i <= 49; i++) {
        var cts = $("bl" + i).innerHTML;
        $("num" + i).removeAttribute('disabled');
        $("num" + i).checked = false
    }
};

function qingling() {
    for (i = 0; i < 49; i++) {
        var blid = i + 1;
        $("num" + blid).checked = false
    };
    $("Num_1").value = "";
    $('allgold').value = 0;
    $("total_gold").value = 0
}