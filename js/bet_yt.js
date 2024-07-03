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
                if (rtype == 'SP' && (eval(goldvalue) > Number(yt_xxx))) {
                    gold.focus();
                    alert("对不起,此项下注金额最高限制:" + yt_xxx + "!!");
                    return false
                };
                if (rtype == 'SP' && (eval(goldvalue) > Number(yt_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + yt_xx + "!!");
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
                var blzm;
                bl = "bl" + blid;
                blzm = "blzm" + blid;
                if (blid >= 1 && blid <= 49) {
                    num2 = round(Number(num2) + Number(yt_blc), 3);
                    num3 = round(Number(num3) + Number(yt_blc), 3)
                };
                if (num6 == 1) {
                    $(bl).innerHTML = "<a>停</a>";
                    $("num" + blid).setAttribute('disabled', 'disabled');
                    $("num" + blid).checked = false;
                    $(blzm).innerHTML = "<a>停</a>";
                    $("numzm" + blid).setAttribute('disabled', 'disabled');
                    $("numzm" + blid).checked = false
                } else {
                    $("num" + blid).removeAttribute('disabled');
                    $("numzm" + blid).removeAttribute('disabled');
                    if (num2 != num3) {
                        $(bl).innerHTML = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><a>" + num2 + "</a></SPAN>";
                        $(blzm).innerHTML = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><a>" + num2 + "</a></SPAN>"
                    } else {
                        $(bl).innerHTML = "<a>" + num2 + "</a>";
                        $(blzm).innerHTML = "<a>" + num2 + "</a>"
                    }
                }
            };
            $("loadingimg").style.display = 'none';
            $("loadingnumber").innerHTML = Number(autotime / 1000);
            $("loadingnumber").style.display = 'block'
        }
    }
};
var tm_type_max = 4;
var tm_type_min = 1;
var zm_type_max = 6;
var zm_type_min = 1;

function ChkSubmit() {
    var checkCounttm = 0;
    var checkCountzm = 0;
    $("btnSubmit").disabled = true;
    if (!Number($('allgold').value) > 0 || eval($('total_gold').value) <= 0) {
        alert("请输入每组下注金额!!");
        $("btnSubmit").disabled = false;
        return false
    };
    for (i = 1; i <= 49; i++) {
        if ($("num" + i).checked) {
            checkCounttm++
        };
        if ($("numzm" + i).checked) {
            checkCountzm++
        }
    };
    if (checkCounttm < (tm_type_min)) {
        alert("最少选择" + tm_type_min + "个特码!");
        $('total_gold').value = Number($('allgold').value);
        $("btnSubmit").disabled = false;
        return false
    };
    if (checkCounttm > (tm_type_max)) {
        alert("最多只能选择" + tm_type_max + "个特码!");
        $('total_gold').value = Number($('allgold').value);
        $("btnSubmit").disabled = false;
        return false
    };
    if (checkCountzm < (zm_type_min)) {
        alert("最少选择" + zm_type_min + "个正码!");
        $('total_gold').value = Number($('allgold').value);
        $("btnSubmit").disabled = false;
        return false
    };
    if (checkCountzm > (zm_type_max)) {
        alert("最多只能选择" + zm_type_max + "个正码!");
        $('total_gold').value = Number($('allgold').value);
        $("btnSubmit").disabled = false;
        return false
    };
    $('total_gold').value = Number($('allgold').value);
    $("btnSubmit").disabled = false;
    return true
};

function SubChkBox(y) {
    var checkCount = 0;
    var obj = $("num" + y);
    for (i = 1; i <= 49; i++) {
        if ($("num" + i).checked) {
            checkCount++;
            $("numzm" + y).checked = false
        }
    };
    if (obj.checked == true) {
        if (checkCount > (tm_type_max)) {
            alert("最多只能选择" + tm_type_max + "个特码!");
            obj.checked = false;
            return false
        }
    }
};

function SubChkBoxzm(y) {
    var checkCount = 0;
    var obj = $("numzm" + y);
    for (i = 1; i <= 49; i++) {
        if ($("numzm" + i).checked) {
            checkCount++;
            $("num" + y).checked = false
        }
    };
    if (obj.checked == true) {
        if (checkCount > (zm_type_max)) {
            alert("最多只能选择" + zm_type_max + "个正码!");
            obj.checked = false;
            return false
        }
    }
};

function qingling() {
    for (i = 0; i < 49; i++) {
        var blid = i + 1;
        $("num" + blid).checked = false;
        $("numzm" + blid).checked = false
    };
    $("Num_1").value = "";
    $('allgold').value = 0;
    $("total_gold").value = 0
}