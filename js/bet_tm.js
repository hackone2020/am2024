function CheckKey() {
    if (event.keyCode == 13) return true;
    if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode > 95 || event.keyCode < 106)) {
        alert("下注金额仅能输入数字!");
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
                if (rtype == 'SP') {
                    var str1 = "xr_" + ffb;
                    var t_big1 = new Number($(str1).value);
                    if (rtype == 'SP' && eval(goldvalue) > eval(t_big1)) {
                        gold.focus();
                        alert("超出最高限额!!");
                        return false
                    }
                };
                if ((eval(goldvalue) < Number(xy)) && (goldvalue != '')) {
                    gold.focus();
                    alert("下注金额不能低于最低限额:" + xy + "!!");
                    return false
                };
                if (rtype == 'SP' && (eval(goldvalue) > Number(tm_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + tm_xxx + "!!");
                    return false
                };
                if (rtype == 'SP' && (eval(goldvalue) > Number(tm_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + tm_xx + "!!");
                    return false
                };
                if (rtype == 'ds' && (eval(goldvalue) > Number(tmds_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + tmds_xxx + "!!");
                    return false
                };
                if (rtype == 'ds' && (eval(goldvalue) > Number(tmds_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + tmds_xx + "!!");
                    return false
                };
                if (rtype == 'dx' && (eval(goldvalue) > Number(tmdx_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + tmdx_xxx + "!!");
                    return false
                };
                if (rtype == 'dx' && (eval(goldvalue) > Number(tmdx_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + tmdx_xx + "!!");
                    return false
                };
                if (rtype == 'hsds' && (eval(goldvalue) > Number(tmhsds_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + tmhsds_xxx + "!!");
                    return false
                };
                if (rtype == 'hsds' && (eval(goldvalue) > Number(tmhsds_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + tmhsds_xx + "!!");
                    return false
                };
                if (rtype == 'hsdx' && (eval(goldvalue) > Number(tmhsdx_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + tmhsdx_xxx + "!!");
                    return false
                };
                if (rtype == 'hsdx' && (eval(goldvalue) > Number(tmhsdx_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + tmhsdx_xx + "!!");
                    return false
                };
                if (rtype == 'wdwx' && (eval(goldvalue) > Number(tmwdwx_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + tmwdwx_xxx + "!!");
                    return false
                };
                if (rtype == 'wdwx' && (eval(goldvalue) > Number(tmwdwx_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + tmwdwx_xx + "!!");
                    return false
                };
                if (rtype == 'sb' && (eval(goldvalue) > Number(tmsb_xxx))) {
                    gold.focus();
                    alert("对不起,此号下注金额最高限制:" + tmsb_xxx + "!!");
                    return false
                };
                if (rtype == 'sb' && (eval(goldvalue) > Number(tmsb_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + tmsb_xx + "!!");
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

function init() {
    if (http_request.readyState == 4) {
        if (http_request.status == 0 || http_request.status == 200) {
            severtime = new Date(http_request.getResponseHeader("Date"));
            dq_time = severtime;
            lj_time = 1;
            var result = http_request.responseText;
            var arrResult = result.split("###");
            for (var i = 0; i < 62; i++) {
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
                if (blid >= 1 && blid <= 49) {
                    num2 = round(Number(num2) + Number(tm_blc), 3);
                    num3 = round(Number(num3) + Number(tm_blc), 3)
                };
                if (blid >= 50 && blid <= 51) {
                    num2 = round(Number(num2) + Number(tmds_blc), 3);
                    num3 = round(Number(num3) + Number(tmds_blc), 3)
                };
                if (blid >= 52 && blid <= 53) {
                    num2 = round(Number(num2) + Number(tmdx_blc), 3);
                    num3 = round(Number(num3) + Number(tmdx_blc), 3)
                };
                if (blid >= 54 && blid <= 55) {
                    num2 = round(Number(num2) + Number(tmhsds_blc), 3);
                    num3 = round(Number(num3) + Number(tmhsds_blc), 3)
                };
                if (blid >= 56 && blid <= 57) {
                    num2 = round(Number(num2) + Number(tmhsdx_blc), 3);
                    num3 = round(Number(num3) + Number(tmhsdx_blc), 3)
                };
                if (blid >= 58 && blid <= 59) {
                    num2 = round(Number(num2) + Number(tmwdwx_blc), 3);
                    num3 = round(Number(num3) + Number(tmwdwx_blc), 3)
                };
                if (blid >= 60 && blid <= 62) {
                    num2 = round(Number(num2) + Number(tmsb_blc), 3);
                    num3 = round(Number(num3) + Number(tmsb_blc), 3)
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
    for (i = 0; i < 62; i++) {
        var blid = i + 1;
        var bl;
        bl = "Num_" + blid;
        $(bl).value = ""
    };
    $('allgold').innerHTML = "0";
    $("total_gold").value = 0
}