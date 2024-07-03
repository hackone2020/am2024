var temparray = new Array();
allarray[0] = [1, 2, 12, 13, 23, 24, 34, 35, 45, 46, 7, 8, 18, 19, 29, 30, 40];
allarray[1] = [5, 6, 16, 17, 27, 28, 38, 39, 49, 11, 21, 22, 32, 33, 43, 44];
allarray[2] = [3, 4, 14, 15, 25, 26, 36, 37, 47, 48, 9, 10, 20, 31, 41, 42];
allarray[3] = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39, 41, 43, 45, 47, 49];
allarray[4] = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48];
allarray[5] = [25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49];
allarray[6] = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
allarray[7] = [1, 3, 5, 7, 9, 10, 12, 14, 16, 18, 21, 23, 25, 27, 29, 30, 32, 34, 36, 38, 41, 43, 45, 47, 49];
allarray[8] = [2, 4, 6, 8, 11, 13, 15, 17, 19, 20, 22, 24, 26, 28, 31, 33, 35, 37, 39, 40, 42, 44, 46, 48];
allarray[11] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
allarray[12] = [10, 11, 12, 13, 14, 15, 16, 17, 18, 19];
allarray[13] = [20, 21, 22, 23, 24, 25, 26, 27, 28, 29];
allarray[14] = [30, 31, 32, 33, 34, 35, 36, 37, 38, 39];
allarray[15] = [40, 41, 42, 43, 44, 45, 46, 47, 48, 49];
allarray[16] = [10, 20, 30, 40];
allarray[17] = [1, 11, 21, 31, 41];
allarray[18] = [2, 12, 22, 32, 42];
allarray[19] = [3, 13, 23, 33, 43];
allarray[20] = [4, 14, 24, 34, 44];
allarray[21] = [5, 15, 25, 35, 45];
allarray[22] = [6, 16, 26, 36, 46];
allarray[23] = [7, 17, 27, 37, 47];
allarray[24] = [8, 18, 28, 38, 48];
allarray[25] = [9, 19, 29, 39, 49];
allarray[38] = [5, 6, 7, 8, 9, 15, 16, 17, 18, 19, 25, 26, 27, 28, 29, 35, 36, 37, 38, 39, 45, 46, 47, 48, 49];
allarray[39] = [1, 2, 3, 4, 10, 11, 12, 13, 14, 20, 21, 22, 23, 24, 30, 31, 32, 33, 34, 40, 41, 42, 43, 44];
allarray[40] = [25, 27, 29, 31, 33, 35, 37, 39, 41, 43, 45, 47, 49];
allarray[41] = [26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48];
allarray[42] = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23];
allarray[43] = [2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24];
allarray[46] = [1, 7, 13, 19, 23, 29, 35, 45];
allarray[47] = [2, 8, 12, 18, 24, 30, 34, 40, 46];
allarray[44] = [29, 30, 34, 35, 40, 45, 46];
allarray[45] = [1, 2, 7, 8, 12, 13, 18, 19, 23, 24];
allarray[50] = [3, 9, 15, 25, 31, 37, 41, 47];
allarray[51] = [4, 10, 14, 20, 26, 36, 42, 48];
allarray[48] = [25, 26, 31, 36, 37, 41, 42, 47, 48];
allarray[49] = [3, 4, 9, 10, 14, 15, 20];
allarray[54] = [5, 11, 17, 21, 27, 33, 39, 43, 49];
allarray[55] = [6, 16, 22, 28, 32, 38, 44];
allarray[52] = [27, 28, 32, 33, 38, 39, 43, 44, 49];
allarray[53] = [5, 6, 11, 16, 17, 21, 22];
allarray[1314] = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49];
var sumbishu = 0;
var summoney = 0;

function DiffMoneys() {
    var s = $("Num_1");
    s.value = 0;
    s.focus()
};

function AddMoneys(m) {
    var s = $("Num_1");
    var x = eval(Number(s.value) + m);
    s.value = x;
    s.focus()
};

function SubChk() {
    if (sumbishu <= 0) {
        alert("请选择号码!");
        return false
    };
    if (summoney > ts) {
        alert("对不起,您的可用金额不够 " + summoney + " !");
        return false
    };
    $("btnsave").disabled = true;
    $("queren").style.display = 'none';
    $("dengtai").style.display = 'block'
};

function sel(id) {
    var texts = $("numbers");
    var i = id.replace("bnumber", "");
    var str1 = $(id).style.background;
    var str2 = "#" + i + ",";
    if (str1 != "yellow") {
        $(id).style.background = "yellow";
        texts.value = texts.value + "#" + i + ","
    } else {
        $(id).style.background = "";
        texts.value = texts.value.replace(str2, "")
    }
};

function sx_sel(obj, rid) {
    var temp = allarray[rid];
    var texts = $("numbers");
    var str3 = obj.style.background;
    if (str3 != "yellow") {
        for (var i = 0; i < temp.length; i++) {
            if (temp[i] != "") {
                var t = $("bnumber" + temp[i]);
                var str1 = t.style.background;
                str2 = "#" + temp[i] + ",";
                if (str1 != "yellow") {
                    t.style.background = "yellow";
                    texts.value = texts.value + "#" + temp[i] + ","
                }
            }
        };
        obj.style.background = "yellow"
    } else {
        for (var i = 0; i < temp.length; i++) {
            if (temp[i] != "") {
                var t = $("bnumber" + temp[i]);
                var str1 = t.style.background;
                str2 = "#" + temp[i] + ",";
                if (str1 == "yellow") {
                    t.style.background = "";
                    texts.value = texts.value.replace(str2, "")
                }
            }
        };
        obj.style.background = ""
    }
};

function addform() {
    var s = Number($("Num_1").value);
    if (!s > 0) {
        alert("请输入下注金额!!!");
        return false
    };
    if (s < xy) {
        alert("下注金额不能低于最低限额" + xy + "!!!");
        return false
    };
    if (s > bl_xx) {
        alert("下注金额不能大于单注限额" + bl_xx + "!!!");
        return false
    };
    if (s > bl_xxx) {
        alert("下注金额不能大于单项限额" + bl_xxx + "!!!");
        return false
    };
    var numberstr = $("numbers").value;
    if (!numberstr) {
        alert("请选择号码!");
        return false
    };
    numberstr = numberstr.replace(/#/g, "");
    var stringArray = numberstr.split(",");
    for (var i = 0; i < stringArray.length; i++) {
        if (stringArray[i]) {
            sumbishu += 1;
            summoney += parseInt(s);
            var row1 = $("tm1").insertRow(-1);
            var len = row1.rowIndex + 1;
            row1.id = "row" + len;
            var cell1 = row1.insertCell(-1);
            cell1.innerHTML = class2;
            var cell2 = row1.insertCell(-1);
            cell2.innerHTML = stringArray[i] + '<input type="hidden" value="' + stringArray[i] + '_' + sumbishu + '" name="numbersAll[]" />';
            var cell3 = row1.insertCell(-1);
            cell3.innerHTML = s + '<input type="hidden"  class="formmoney"  value="' + s + '" name="moneyna' + stringArray[i] + '_' + sumbishu + '" />';
            var cell4 = row1.insertCell(-1);
            cell4.innerHTML = "<a href='javascript:deleteRow(" + len + ");'>" + '<img src="images/cuo.png"  border="0" style="cursor: pointer;" class="clearform" /></a>'
        }
    };
    rkcolor(0);
    $("zxze").innerHTML = summoney + " / " + sumbishu + " 笔";
    $("Num_1").value = ""
};

function deleteRow(r) {
    var row = $("row" + r);
    var index = row.rowIndex;
    $("tm1").deleteRow(index)
};

function clearforms() {
    sumbishu = 0;
    summoney = 0;
    $("zxze").innerHTML = summoney + " / " + sumbishu + " 笔";
    $("Num_1").value = "";
    var iRows = $("tm1").rows.length;
    for (var i = 0; i < iRows - 1; i++) {
        $("tm1").deleteRow(1)
    }
};

function rkcolor(bool) {
    var texts = $("numbers");
    if (bool == 1) {
        texts.value = "";
        for (var i = 1; i <= 49; i++) {
            if ($("bnumber" + i).style.background != "yellow") {
                $("bnumber" + i).style.background = "yellow";
                texts.value = texts.value + "#" + i + ","
            }
        }
    };
    if (bool == 2) {
        texts.value = "";
        for (var i = 1; i <= 49; i++) {
            if ($("bnumber" + i).style.background != "yellow") {
                $("bnumber" + i).style.background = "yellow";
                texts.value = texts.value + "#" + i + ","
            } else {
                $("bnumber" + i).style.background = ""
            }
        }
    };
    if (bool == 0) {
        texts.value = "";
        for (var i = 1; i <= 49; i++) {
            $("bnumber" + i).style.background = ""
        };
        for (var t = 0; t <= 55; t++) {
            $("quan" + t).style.background = ""
        }
    }
};

function gengduo() {
    var gengduo = $("gengduosel");
    if (gengduo.style.display == "block") {
        gengduo.style.display = "none"
    } else {
        gengduo.style.display = "block"
    }
}