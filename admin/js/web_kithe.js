function quick0() {
    var mm = $("money").value;
    $("nd").value = mm;
    $("zfbdate").value = mm;
    $("zfbdate1").value = mm;
    $("kizm1").value = mm;
    $("kitm1").value = mm;
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

    if (!confirm("�Ƿ�ȷ���޸��̿�?")) {
        return false;
    }
}

function CountGold(gold, type, rtype) {
    goldvalue = gold.value;
    if (goldvalue == '') goldvalue = 0;
    if (rtype == 'SP' && (eval(goldvalue) > 49)) {
        gold.value = 0;
        gold.focus();
        alert("�Բ���,������49���ڵĺ���!!");
        return false;
    }
}