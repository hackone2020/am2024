show_count = 1;

function show_table1() {
    if (show_count == 0) {
        $("showtable1").style.display = 'none';
        $("showtable2").style.display = '';
        $("show1").src = "../images/down.gif";
        show_count = 1
    } else {
        var url1 = "ajax.php?uid=" + uid + "&action=mem_left_list";
        var str1 = xmlFile(url1);
        if (str1 != "") {
            $("showtable1").innerHTML = str1
        };
        $("showtable1").style.display = '';
        $("showtable2").style.display = 'none';
        $("show1").src = "../images/up.gif";
        show_count = 0
    }
};

function daojishi() {
    window.setTimeout("daojishi()", 1000);
    var s = $("daojishi");
    if (s.innerHTML <= 0) {
        window.location.href = 'main.php?action=mem_left&uid=' + uid;
        return false
    };
    s.innerHTML = s.innerHTML * 1 - 1
};

function DiffMoney() {
    var s = $("Num_" + rate_id);
    var ky = $("keying");
    s.value = 0;
    s.focus();
    ky.innerHTML = 0
};

function AddMoney(m) {
    var s = $("Num_" + rate_id);
    var ky = $("keying");
    var r = Number($("rate_" + rate_id).value);
    var x = eval(Number(s.value) + m);
    s.value = x;
    s.focus();
    ky.innerHTML = round(x * r, 3)
};

function SubChk() {
    var s = Number($("Num_" + rate_id).value);
    if (!s > 0) {
        alert("��������ע���!!!");
        return false
    };
    if (s < xy) {
        alert("��ע���ܵ�������޶�" + xy + "!!!");
        return false
    };
    if (s > bl_xx) {
        alert("��ע���ܴ��ڵ�ע�޶�" + bl_xx + "!!!");
        return false
    };
    if (s > bl_xxx) {
        alert("��ע���ܴ��ڵ����޶�" + bl_xxx + "!!!");
        return false
    };
    if (bl_xr > 0 && s > bl_xr) {
        alert("��ע��������޶�!!!");
        return false
    };
    $("btnsave").disabled = true;
    $("queren").style.display = 'none';
    $("dengtai").style.display = 'block'
};

function LMSubChk() {
    var s = Number($("Num_dan").value);
    if (!s > 0) {
        alert("��������ע���!!!");
        return false
    };
    if (s < xy) {
        alert("��ע���ܵ�������޶�" + xy + "!!!");
        return false
    };
    if (s > bl_xx) {
        alert("��ע���ܴ��ڵ�ע�޶�" + bl_xx + "!!!");
        return false
    };
    if (s > bl_xxx) {
        alert("��ע���ܴ��ڵ����޶�" + bl_xxx + "!!!");
        return false
    };
    if (bl_xr > 0 && s > bl_xr) {
        alert("��ע��������޶�!!!");
        return false
    };
    $("btnsave").disabled = true;
    $("queren").style.display = 'none';
    $("dengtai").style.display = 'block'
};

function GGSubChk() {
    var s = Number($("Num_1").value);
    var r = Number($("rate_1").value);
    if (!s > 0) {
        alert("��������ע���!!!");
        return false
    };
    if (round(s * r, 3) > ggwinsum) {
        alert('�����ֻ������:' + round(ggwinsum / r, 3) + '!');
        return false
    };
    if (s < xy) {
        alert("��ע���ܵ�������޶�" + xy + "!!!");
        return false
    };
    if (s > bl_xx) {
        alert("��ע���ܴ��ڵ�ע�޶�" + bl_xx + "!!!");
        return false
    };
    if (s > bl_xxx) {
        alert("��ע���ܴ��ڵ����޶�" + bl_xxx + "!!!");
        return false
    };
    if ((bl_gold + s) > bl_xxx) {
        alert("�����ۼ���ע��: " + bl_gold + "\n��ע����ѳ������ڵ����޶�!!");
        return false
    };
    if (s > ts) {
        alert("��ע���ɴ�춿������ö��:" + ts + "!!");
        return false
    };
    $("btnsave").disabled = true;
    $("queren").style.display = 'none';
    $("dengtai").style.display = 'block'
}
function SelectPk(val){
  var url1 = "setabcd.php?uid=" + uid + "&abcd="+$("option"+val).value;
  var str1 = xmlFile(url1);
  window.parent.frames.main.location.reload();
}