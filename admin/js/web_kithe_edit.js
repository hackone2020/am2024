function SubChk() {

    if ($("nn").value == '') {
        $("nn").focus();
        alert("期数请务必输入!!");
        return false;
    }

    if ($("nd").value == '') {
        $("nd").focus();
        alert("开奖时间请务必输入!!");
        return false;
    }

    if ($("zfbdate").value == '') {
        $("zfbdate").focus();
        alert("总封盘时间请务必输入!!");
        return false;
    }

    if (!confirm("是否确定修改盘口?")) {
        return false;
    }
}

function CountGold(gold, type, rtype) {
    goldvalue = gold.value;
    if (goldvalue == '') goldvalue = 0;
    if (rtype == 'SP' && (eval(goldvalue) > 49)) {
        gold.focus();
        alert("对不起,请输入49以内的球号!");
        return false;
    }
}