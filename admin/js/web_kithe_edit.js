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
        gold.focus();
        alert("�Բ���,������49���ڵ����!");
        return false;
    }
}