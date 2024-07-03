function CheckKey() {
    if (event.keyCode == 13) return true;
    if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode > 95 || event.keyCode < 106)) {
        alert("下注金额仅能输入数字!!");
        return false
    }
};

function ChkSubmit() {
    $("btnSubmit").disabled = true;
    if (!Number($('allgold').innerHTML) > 0) {
        alert("请输入下注金额!!");
        $("btnSubmit").disabled = false;
        return false
    };
    $('gold_all').value = Number($('allgold').innerHTML);
    $("btnSubmit").disabled = false
};

function CountGold(gold, type, rtype, bb, ffb) {
    switch (type) {
        case "focus":
            goldvalue = Number(gold.value);
            if (goldvalue == '') goldvalue = 0;
            $('allgold').innerHTML = eval(Number($('allgold').innerHTML) + "-" + goldvalue);
            $("total_gold").value = Number($('allgold').innerHTML);
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
                if (rtype == 'ds' && (eval(goldvalue) > Number(zm6ds_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + zm6ds_xxx + "!!");
                    return false
                };
                if (rtype == 'ds' && (eval(goldvalue) > Number(zm6ds_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + zm6ds_xx + "!!");
                    return false
                };
                if (rtype == 'dx' && (eval(goldvalue) > Number(zm6dx_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + zm6dx_xxx + "!!");
                    return false
                };
                if (rtype == 'dx' && (eval(goldvalue) > Number(zm6dx_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + zm6dx_xx + "!!");
                    return false
                };
                if (rtype == 'hsds' && (eval(goldvalue) > Number(zm6hsds_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + zm6hsds_xxx + "!!");
                    return false
                };
                if (rtype == 'hsds' && (eval(goldvalue) > Number(zm6hsds_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + zm6hsds_xx + "!!");
                    return false
                };
                if (rtype == 'hsdx' && (eval(goldvalue) > Number(zm6hsdx_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + zm6hsdx_xxx + "!!");
                    return false
                };
                if (rtype == 'hsdx' && (eval(goldvalue) > Number(zm6hsdx_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + zm6hsdx_xx + "!!");
                    return false
                };
                if (rtype == 'sb' && (eval(goldvalue) > Number(zm6sb_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + zm6sb_xxx + "!!");
                    return false
                };
                if (rtype == 'sb' && (eval(goldvalue) > Number(zm6sb_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + zm6sb_xx + "!!");
                    return false
                };
                $("total_gold").value = Number($('allgold').innerHTML);
                if ($("total_gold").value > Number(ts)) {
                    gold.focus();
                    alert("下注金额不可大於可用信用额度!!");
                    $('allgold').innerHTML = $("total_gold").value - gold.value;
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
            $('allgold').innerHTML = eval($("total_gold").value + "\+" + eval(goldvalue));
            break
    }
};

function in_array(a, v) {
    var i;
    for (i = 0; i < a.length; i++) {
        if (v === a[i]) {
            return i
        }
    };
    return -1
};
var arr1 = [1, 2, 12, 13, 23, 24, 34, 35, 45, 46, 56, 57];
var arr2 = [3, 4, 14, 15, 25, 26, 36, 37, 47, 48, 58, 59];
var arr3 = [5, 6, 16, 17, 27, 28, 38, 39, 49, 50, 60, 61];
var arr4 = [7, 8, 18, 19, , 30, 40, 41, 51, 52, 62, 63];
var arr5 = [9, 10, 11, 20, 21, 22, 31, 32, 33, 42, 43, 44, 53, 54, 55, 64, 65, 66];

function init() {
    if (http_request.readyState == 4) {
        if (http_request.status == 0 || http_request.status == 200) {
            severtime = new Date(http_request.getResponseHeader("Date"));
            dq_time = severtime;
            lj_time = 1;
            var result = http_request.responseText;
            var arrResult = result.split("###");
            for (var i = 0; i < 66; i++) {
                arrTmp = arrResult[i].split("@@@");
                num1 = arrTmp[0];
                num2 = arrTmp[1];
                num3 = arrTmp[2];
                num4 = arrTmp[3];
                num5 = arrTmp[4];
                num6 = arrTmp[5];
                var blid = i + 1;
                $("xr_" + blid).value = num5;
                var bl;
                bl = "bl" + blid;
                if (in_array(arr1, blid) != -1) {
                    num2 = round(Number(num2) + Number(zm6ds_blc), 3);
                    num3 = round(Number(num3) + Number(zm6ds_blc), 3)
                };
                if (in_array(arr2, blid) != -1) {
                    num2 = round(Number(num2) + Number(zm6dx_blc), 3);
                    num3 = round(Number(num3) + Number(zm6dx_blc), 3)
                };
                if (in_array(arr3, blid) != -1) {
                    num2 = round(Number(num2) + Number(zm6hsds_blc), 3);
                    num3 = round(Number(num3) + Number(zm6hsds_blc), 3)
                };
                if (in_array(arr4, blid) != -1) {
                    num2 = round(Number(num2) + Number(zm6hsdx_blc), 3);
                    num3 = round(Number(num3) + Number(zm6hsdx_blc), 3)
                };
                if (in_array(arr5, blid) != -1) {
                    num2 = round(Number(num2) + Number(zm6sb_blc), 3);
                    num3 = round(Number(num3) + Number(zm6sb_blc), 3)
                };
                if (num6 == 1) {
                    $(bl).innerHTML = "<a>停</a>";
                    $("Num_" + blid).readOnly = true
                } else {
                    $("Num_" + blid).readOnly = false;
                    if (num2 != num3) {
                        $(bl).innerHTML = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><a href='main.php?action=bet_kuaijie&uid=" + uid + "&class2=" + ids + "&rate_id=" + blid + "'  target='leftFrame' >" + num2 + "</a></SPAN>"
                    } else {
                        $(bl).innerHTML = "<a href='main.php?action=bet_kuaijie&uid=" + uid + "&class2=" + ids + "&rate_id=" + blid + "'  target='leftFrame' >" + num2 + "</a>"
                    }
                }
            };
            $("loadingimg").style.display = 'none';
            $("loadingnumber").innerHTML = Number(autotime / 1000);
            $("loadingnumber").style.display = 'block'
        }
    }
};

function qingling() {
    for (i = 0; i < 66; i++) {
        var blid = i + 1;
        var bl;
        bl = "Num_" + blid;
        $(bl).value = ""
    };
    $('allgold').innerHTML = "0";
    $("total_gold").value = 0
}