function SubChk() {
        if ($("ypass").value == '') {
                $("ypass").focus();
                alert("������ԭ����!!!");
                return false;
        }
        if ($("pass1").value == $("ypass").value) {
                $("pass1").focus();
                alert("�����벻����ԭ����һ��!!!");
                return false;
        }
        if ($("pass1").value == '') {
                $("pass1").focus();
                alert("������������!!!");
                return false;
        }
        if ($("pass2").value == '') {
                $("pass2").focus();
                alert("������ȷ������!!!");
                return false;
        }
        if ($("pass1").value != $("pass2").value) {
                $("pass2").focus();
                alert("ȷ�������������벻һ��!!!");
                return false;
        }
        if (!confirm("�Ƿ�ȷ���޸�?")) {
                return false;
        }
}