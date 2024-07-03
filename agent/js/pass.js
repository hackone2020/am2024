function SubChk() {
        if ($("ypass").value == '') {
                $("ypass").focus();
                alert("请输入原密码!!!");
                return false;
        }
        if ($("pass1").value == $("ypass").value) {
                $("pass1").focus();
                alert("新密码不能与原密码一致!!!");
                return false;
        }
        if ($("pass1").value == '') {
                $("pass1").focus();
                alert("请输入新密码!!!");
                return false;
        }
        if ($("pass2").value == '') {
                $("pass2").focus();
                alert("请输入确认密码!!!");
                return false;
        }
        if ($("pass1").value != $("pass2").value) {
                $("pass2").focus();
                alert("确认密码与新密码不一致!!!");
                return false;
        }
        if (!confirm("是否确定修改?")) {
                return false;
        }
}