function init() {
    if (http_request.readyState == 4) {
        if (http_request.status == 0 || http_request.status == 200) {
            severtime = new Date(http_request.getResponseHeader("Date"));
            dq_time = severtime;
            lj_time = 1;
            var result = http_request.responseText;
            var arrResult = result.split("###");
            for (var i = 0; i < 42; i++) {
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
                num2 = round(Number(num2) + Number(gg_blc), 3);
                num3 = round(Number(num3) + Number(gg_blc), 3);
                if (num6 == 1) {
                    $(bl).innerHTML = "<a>ͣ</a>"
                } else {
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
var type_max = 9;
var type_min = 2;
var mess1 = '����ѡ��!';
var mess2 = '��ѡ����������淨����ֻҪ��һ��ע��ǰ������1-6Ͷע!';
var mess3 = '����ѡ��Χ!���ֻ��9��1!';

function ChkSubmit(obj) {
    var checkCount = 0;
    var checknum = obj.elements.length;
    for (i = 0; i < checknum; i++) {
        if (obj.elements[i].checked) {
            checkCount++
        }
    };
    if (checkCount == 0) {
        alert(mess1);
        return false
    };
    if (checkCount == 1) {
        alert(mess2);
        return false
    };
    if (checkCount > type_max) {
        alert(mess3);
        return false
    };
    if (checkCount >= type_min) {
        return true
    }
};

function SubChkBox(obj) {
    var checkCount = 0;
    if (obj.checked == true) {
        for (i = 1; i <= 42; i++) {
            if ($("num" + i).checked) {
                checkCount++
            }
        };
        if (checkCount > (type_max)) {
            alert("���ѡ��" + type_max + "��!");
            obj.checked = false;
            return false
        }
    }
};

function qingling() {
    $("form1").reset()
}