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
        alert("�������������!!");
        return false;
    }

    if ($("nd").value == '') {
        $("nd").focus();
        alert("����ʱ�����������!!");
        return false;
    }

    if ($("zfbdate").value == '') {
        $("zfbdate").focus();
        alert("�ܷ���ʱ�����������!!");
        return false;
    }

    if (!confirm("�Ƿ�ȷ��д���̿�?")) {
        return false;
    }
}