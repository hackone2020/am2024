function CheckKey() {
    if (event.keyCode == 13) return true;
    if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode > 95 || event.keyCode < 106)) {
        alert("下注金额仅能输入数字!!");
        return false
    }
}

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
                }
                if (rtype == 'SP' && (eval(goldvalue) > Number(lm_xxx))) {
                    gold.focus();
                    alert("对不起,此项下注金额最高限制:" + lm_xxx + "!!");
                    return false
                }
                if (rtype == 'SP' && (eval(goldvalue) > Number(lm_xx))) {
                    gold.focus();
                    alert("对不起,下注金额已超过单注限额:" + lm_xx + "!!");
                    return false
                }
                $("total_gold").value = Number($('allgold').value);
                if ($("total_gold").value > Number(ts)) {
                    gold.focus();
                    alert("下注金额不可大於可用信用额度!!");
                    $('allgold').value = $("total_gold").value - gold.value;
                    gold.value = '';
                    return false
                }
            }
            break;
        case "keyup":
            goldvalue = Number(gold.value);
            if (goldvalue == '') {
                goldvalue = 0
            }
            $('allgold').value = eval($("total_gold").value + "\+" + eval(goldvalue));
            $("total_gold").value = Number($('allgold').value);
            break
    }
}

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
                if (blid >= 1 && blid <= 49 && num4 != 0) {
                    num2 = round(Number(num2) + Number(lm_blc), 3) + "/" + round(Number(num4) + Number(lm_blc), 3);
                    num3 = round(Number(num3) + Number(lm_blc), 3) + "/" + round(Number(num4) + Number(lm_blc), 3)
                } else {
                    num2 = round(Number(num2) + Number(lm_blc), 3);
                    num3 = round(Number(num3) + Number(lm_blc), 3)
                } if (num6 == 1) {
                    $(bl).innerHTML = "<a>停</a>";
                    $("num" + blid).setAttribute('disabled', 'disabled');
                    $("num" + blid).checked = false;
                    $("zy1_num" + blid).setAttribute('disabled', 'disabled');
                    $("zy1_num" + blid).checked = false;
                    $("zy2_num" + blid).setAttribute('disabled', 'disabled');
                    $("zy2_num" + blid).checked = false
                } else {
                    $("num" + blid).removeAttribute('disabled');
                    $("zy1_num" + blid).removeAttribute('disabled');
                    $("zy2_num" + blid).removeAttribute('disabled');
                    if (num2 != num3) {
                        $(bl).innerHTML = "<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><a>" + num2 + "</a></SPAN>"
                    } else {
                        $(bl).innerHTML = "<a>" + num2 + "</a>"
                    }
                }
            }
            $("loadingimg").style.display = 'none';
            $("loadingnumber").innerHTML = Number(autotime / 1000);
            $("loadingnumber").style.display = 'block'
        }
    }
}
var type_max = 10;
var type_min = 4;
var dan_num = 0;
var zy_type_max = 4;
var zy_type_min = 4;
var lm_xx = lm3qz_xx;
var lm_xxx = lm3qz_xxx;
var lm_blc = lm3qz_blc;
var class2 = "四全中";

function ChkSubmit() {
    var checkCount = 0;
    var lmlx_obj = document.getElementsByName("lmlx");
    for (i = 0; i < lmlx_obj.length; i++) {
        if (lmlx_obj[i].checked) {
            break
        }
    };
    var str1 = lmlx_obj[i].value;
    $("btnSubmit").disabled = true;
    if (!Number($('allgold').value) > 0 || eval($('total_gold').value) <= 0) {
        alert("请输入每组下注金额!!");
        $("btnSubmit").disabled = false;
        return false
    }
    if (str1 == "") {
        alert('请选择类别!!');
        return false
    }
    for (i = 1; i <= 49; i++) {
        if ($("num" + i).checked) {
            checkCount++
        }
    }
    if (str1 == "1") {
        if (checkCount < (type_min)) {
            alert("最少选择" + type_min + "个号码!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
        if (checkCount > (type_max)) {
            alert("最多只能选择" + type_max + "个号码!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
    }
    if (str1 == "2") {
        var str2 = $("dan1");
        var str3 = $("dan2");
        if (dan_num == 1 && str2.value == "") {
            alert("请选择一个号码做胆!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
        if (dan_num == 2) {
            if (str2.value == "" || str3.value == "") {
                alert("请选择两个号码做胆!");
                $('total_gold').value = Number($('allgold').value);
                $("btnSubmit").disabled = false;
                return false
            }
        }
        if ((checkCount - dan_num) < 2) {
            alert("请选择两个或以上胆拖号码!号码较少可以直接单注/复式下注!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
    }
    if (str1 == "3") {
        var n2_1_obj = document.getElementsByName("n2_1");
        var n2_2_obj = document.getElementsByName("n2_2");
        var str4 = "";
        var str5 = "";
        for (i = 0; i < n2_1_obj.length; i++) {
            if (n2_1_obj[i].checked) {
                str4 = n2_1_obj[i].value
            }
        };
        for (i = 0; i < n2_2_obj.length; i++) {
            if (n2_2_obj[i].checked) {
                str5 = n2_2_obj[i].value
            }
        };
        if (str4 == "" || str5 == "") {
            alert("请选择两个不同的对碰生肖!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
    }
    if (str1 == "4") {
        var n3_1_obj = document.getElementsByName("n3_1");
        var n3_2_obj = document.getElementsByName("n3_2");
        var str6 = "";
        var str7 = "";
        for (i = 0; i < n3_1_obj.length; i++) {
            if (n3_1_obj[i].checked) {
                str6 = n3_1_obj[i].value
            }
        };
        for (i = 0; i < n3_2_obj.length; i++) {
            if (n3_2_obj[i].checked) {
                str7 = n3_2_obj[i].value
            }
        };
        if (str6 == "" || str7 == "") {
            alert("请选择两个不同的对碰尾数!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
    }
    if (str1 == "5") {
        var n4_1_obj = document.getElementsByName("n4_1");
        var n4_2_obj = document.getElementsByName("n4_2");
        var str8 = "";
        var str9 = "";
        for (i = 0; i < n4_1_obj.length; i++) {
            if (n4_1_obj[i].checked) {
                str8 = n4_1_obj[i].value
            }
        };
        for (i = 0; i < n4_2_obj.length; i++) {
            if (n4_2_obj[i].checked) {
                str9 = n4_2_obj[i].value
            }
        };
        if (str8 == "" || str9 == "") {
            alert("请选择一个对碰生肖与对碰尾数!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
    }
    if (str1 == "6") {
        var zy1_checkCount = 0;
        var zy2_checkCount = 0;
        for (i = 1; i <= 49; i++) {
            if ($("zy1_num" + i).checked) {
                zy1_checkCount++
            }
        }
        for (i = 1; i <= 49; i++) {
            if ($("zy2_num" + i).checked) {
                zy2_checkCount++
            }
        }
        if (zy1_checkCount > (zy_type_max)) {
            alert("自由对碰(左边)最多选择" + zy_type_max + "个号码!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
        if (zy1_checkCount < (zy_type_min)) {
            alert("自由对碰(左边)最少选择" + zy_type_min + "个号码!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
        if (zy2_checkCount > (zy_type_max)) {
            alert("自由对碰(右边)最多选择" + zy_type_max + "个号码!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
        if (zy2_checkCount < (zy_type_min)) {
            alert("自由对碰(右边)最少选择" + zy_type_min + "个号码!");
            $('total_gold').value = Number($('allgold').value);
            $("btnSubmit").disabled = false;
            return false
        }
    }
    $('total_gold').value = Number($('allgold').value);
    $("btnSubmit").disabled = false;
    return true
}

function select_types(type) {
    if (type == 0) {
        var lmlx_obj = document.getElementsByName("lmlx");
        for (i = 0; i < lmlx_obj.length; i++) {
            if (lmlx_obj[i].value > 1) {
                lmlx_obj[i].setAttribute('disabled', 'disabled');
                lmlx_obj[i].checked = false
            }
        }
        type_max = 10;
        type_min = 4;
        dan_num = 0;
        $("dan1").removeAttribute('disabled');
        $("dan2").removeAttribute('disabled');
        lmlx_obj[0].checked = true;
        select_lmlx(1)
    }
    if (type == 1 || type == 2) {
        var lmlx_obj = document.getElementsByName("lmlx");
        for (i = 0; i < lmlx_obj.length; i++) {
            if (lmlx_obj[i].value > 2) {
                lmlx_obj[i].setAttribute('disabled', 'disabled');
                lmlx_obj[i].checked = false
            }
        }
        type_max = 10;
        type_min = 3;
        dan_num = 2;
        $("dan1").removeAttribute('disabled');
        $("dan2").removeAttribute('disabled');
        lmlx_obj[0].checked = true;
        select_lmlx(1)
    }
    if (type == 3 || type == 4 || type == 5) {
        var lmlx_obj = document.getElementsByName("lmlx");
        for (i = 0; i < lmlx_obj.length; i++) {
            lmlx_obj[i].removeAttribute('disabled');
            lmlx_obj[i].checked = false
        }
        type_max = 10;
        type_min = 2;
        dan_num = 1;
        $("dan1").removeAttribute('disabled');
        $("dan2").setAttribute('disabled', 'disabled');
        lmlx_obj[0].checked = true;
        select_lmlx(1)
    }
    switch (type) {
        case 0:
            {
                lm_xx = lm4qz_xx;
                lm_xxx = lm4qz_xxx;
                lm_blc = lm4qz_blc;
                class2 = "四全中";
                break
            }
        case 1:
            {
                lm_xx = lm3qz_xx;
                lm_xxx = lm3qz_xxx;
                lm_blc = lm3qz_blc;
                class2 = "三全中";
                break
            }
        case 2:
            {
                lm_xx = lm3z2_xx;
                lm_xxx = lm3z2_xxx;
                lm_blc = lm3z2_blc;
                class2 = "三中二";
                break
            }
        case 3:
            {
                lm_xx = lm2qz_xx;
                lm_xxx = lm2qz_xxx;
                lm_blc = lm2qz_blc;
                class2 = "二全中";
                break
            }
        case 4:
            {
                lm_xx = lm2zt_xx;
                lm_xxx = lm2zt_xxx;
                lm_blc = lm2zt_blc;
                class2 = "二中特";
                break
            }
        case 5:
            {
                lm_xx = lmtc_xx;
                lm_xxx = lmtc_xxx;
                lm_blc = lmtc_blc;
                class2 = "特串";
                break
            }
        default:
            {
                lm_xx = lm3qz_xx;
                lm_xxx = lm3qz_xxx;
                lm_blc = lm3qz_blc;
                break
            }
    }
    read()
}

function select_lmlx(type) {
    if (type == 1) {
        $("n1").style.display = 'block';
        $("n2").style.display = 'none';
        $("n3").style.display = 'none';
        $("n4").style.display = 'none';
        $("n5").style.display = 'none';
        sotpall(1)
    }
    if (type == 2) {
        $("n1").style.display = 'block';
        $("n2").style.display = 'none';
        $("n3").style.display = 'none';
        $("n4").style.display = 'none';
        $("n5").style.display = 'none';
        sotpall(1)
    }
    if (type == 3) {
        $("n1").style.display = 'none';
        $("n2").style.display = 'block';
        $("n3").style.display = 'none';
        $("n4").style.display = 'none';
        $("n5").style.display = 'none';
        sotpall(2)
    }
    if (type == 4) {
        $("n1").style.display = 'none';
        $("n2").style.display = 'none';
        $("n3").style.display = 'block';
        $("n4").style.display = 'none';
        $("n5").style.display = 'none';
        sotpall(3)
    }
    if (type == 5) {
        $("n1").style.display = 'none';
        $("n2").style.display = 'none';
        $("n3").style.display = 'none';
        $("n4").style.display = 'block';
        $("n5").style.display = 'none';
        sotpall(4)
    }
    if (type == 6) {
        $("n1").style.display = 'none';
        $("n2").style.display = 'none';
        $("n3").style.display = 'none';
        $("n4").style.display = 'none';
        $("n5").style.display = 'block';
        sotpall(5)
    }
}

function n2_1_sx(ii) {
    var obj = document.getElementsByName("n2_2");
    for (i = 0; i < obj.length; i++) {
        if (obj[i].checked) {
            break
        }
    };
    if (i != obj.length) {
        if (obj[i].value == ii) {
            obj[i].checked = false
        }
    }
}

function n2_2_sx(ii) {
    var obj = document.getElementsByName("n2_1");
    for (i = 0; i < obj.length; i++) {
        if (obj[i].checked) {
            break
        }
    };
    if (i != obj.length) {
        if (obj[i].value == ii) {
            obj[i].checked = false
        }
    }
}

function n3_1_ws(ii) {
    var obj = document.getElementsByName("n3_2");
    for (i = 0; i < obj.length; i++) {
        if (obj[i].checked) {
            break
        }
    };
    if (i != obj.length) {
        if (obj[i].value == ii) {
            obj[i].checked = false
        }
    }
}

function n3_2_ws(ii) {
    var obj = document.getElementsByName("n3_1");
    for (i = 0; i < obj.length; i++) {
        if (obj[i].checked) {
            break
        }
    };
    if (i != obj.length) {
        if (obj[i].value == ii) {
            obj[i].checked = false
        }
    }
}

function SubChkBox(y) {
    var checkCount = 0;
    var obj = $("num" + y);
    for (i = 1; i <= 49; i++) {
        if ($("num" + i).checked) {
            checkCount++
        }
    }
    if (obj.checked == true) {
        if (checkCount > (type_max)) {
            alert("最多只能选择" + type_max + "个号码!");
            obj.checked = false;
            return false
        }
    }
    var lmlx_obj = document.getElementsByName("lmlx");
    for (i = 0; i < lmlx_obj.length; i++) {
        if (lmlx_obj[i].checked) {
            break
        }
    };
    var str1 = lmlx_obj[i].value;
    var str2 = $("dan1");
    var str3 = $("dan2");
    if (str1 == 2 && obj.checked == true) {
        if (dan_num == 1 && str2.value == "") {
            str2.value = y;
            obj.setAttribute('disabled', 'disabled');
            return
        }
        if (dan_num == 2) {
            if (str2.value == "") {
                str2.value = y;
                obj.setAttribute('disabled', 'disabled');
                return
            }
            if (str3.value == "") {
                str3.value = y;
                obj.setAttribute('disabled', 'disabled');
                return
            }
        }
    }
}

function SubChkBox_zy1(t) {
    var checkCount = 0;
    var obj = $("zy1_num" + t);
    if (obj.checked == true) {
        for (i = 1; i <= 49; i++) {
            if ($("zy1_num" + i).checked) {
                checkCount++
            }
        }
        if (checkCount > (zy_type_max)) {
            alert("自由对碰最多选择" + zy_type_max + "个号码!");
            obj.checked = false;
            return false
        }
    }
    $("zy2_num" + t).checked = false
}

function SubChkBox_zy2(t) {
    var checkCount = 0;
    var obj = $("zy2_num" + t);
    if (obj.checked == true) {
        for (i = 1; i <= 49; i++) {
            if ($("zy2_num" + i).checked) {
                checkCount++
            }
        }
        if (checkCount > (zy_type_max)) {
            alert("自由对碰最多选择" + zy_type_max + "个号码!");
            obj.checked = false;
            return false
        }
    }
    $("zy1_num" + t).checked = false
}

function sotpall(t) {
    $("dan1").value = "";
    $("dan2").value = "";
    var cts;
    for (i = 1; i <= 49; i++) {
        var cts = $("bl" + i).innerHTML;
        if (t != 1) {
            $("num" + i).setAttribute('disabled', 'disabled')
        } else {
            if (cts.indexOf("停") <= 0) {
                $("num" + i).removeAttribute('disabled')
            }
        } if (t != 5) {
            $("zy1_num" + i).setAttribute('disabled', 'disabled');
            $("zy2_num" + i).setAttribute('disabled', 'disabled')
        } else {
            $("zy1_num" + i).removeAttribute('disabled');
            $("zy2_num" + i).removeAttribute('disabled')
        }
        $("num" + i).checked = false;
        $("zy1_num" + i).checked = false;
        $("zy2_num" + i).checked = false
    }
    var n2_1_obj = document.getElementsByName("n2_1");
    var n2_2_obj = document.getElementsByName("n2_2");
    if (t != 2) {
        for (i = 0; i < n2_1_obj.length; i++) {
            n2_1_obj[i].setAttribute('disabled', 'disabled')
        }
        for (i = 0; i < n2_2_obj.length; i++) {
            n2_2_obj[i].setAttribute('disabled', 'disabled')
        }
    } else {
        for (i = 0; i < n2_1_obj.length; i++) {
            n2_1_obj[i].removeAttribute('disabled')
        }
        for (i = 0; i < n2_2_obj.length; i++) {
            n2_2_obj[i].removeAttribute('disabled')
        }
    }
    var n3_1_obj = document.getElementsByName("n3_1");
    var n3_2_obj = document.getElementsByName("n3_2");
    if (t != 3) {
        for (i = 0; i < n3_1_obj.length; i++) {
            n3_1_obj[i].setAttribute('disabled', 'disabled')
        }
        for (i = 0; i < n3_2_obj.length; i++) {
            n3_2_obj[i].setAttribute('disabled', 'disabled')
        }
    } else {
        for (i = 0; i < n3_1_obj.length; i++) {
            n3_1_obj[i].removeAttribute('disabled')
        }
        for (i = 0; i < n3_2_obj.length; i++) {
            n3_2_obj[i].removeAttribute('disabled')
        }
    }
    var n4_1_obj = document.getElementsByName("n4_1");
    var n4_2_obj = document.getElementsByName("n4_2");
    if (t != 4) {
        for (i = 0; i < n4_1_obj.length; i++) {
            n4_1_obj[i].setAttribute('disabled', 'disabled')
        }
        for (i = 0; i < n4_2_obj.length; i++) {
            n4_2_obj[i].setAttribute('disabled', 'disabled')
        }
    } else {
        for (i = 0; i < n4_1_obj.length; i++) {
            n4_1_obj[i].removeAttribute('disabled')
        }
        for (i = 0; i < n4_2_obj.length; i++) {
            n4_2_obj[i].removeAttribute('disabled')
        }
    }
}

function qingling() {
    $("form1").reset();
    var lmlx_obj = document.getElementsByName("lmlx");
    for (i = 0; i < lmlx_obj.length; i++) {
        if (lmlx_obj[i].checked) {
            break
        }
    };
    var str1 = lmlx_obj[i].value;
    select_lmlx(str1);
    $("Num_1").value = "";
    $('allgold').value = 0;
    $("total_gold").value = 0
}