function quick0() {
    var mm = $("money").value;
    $("zfbdate").value = mm;
    $("kitm1").value = mm;
    $("zfbdate1").value = mm;
    $("kizm1").value = mm;
    $("nd").value = mm;
}
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

    if (!confirm("是否确定写入盘口?")) {
        return false;
    }
}