function $(id) {
    if (document.getElementById(id)) {
        return document.getElementById(id)
    } else {
        return document.getElementsByName(id).item(0)
    }
};

function CheckForm() {
    if ($("user").value == "") {
        $("user").focus();
        alert("�������˺�!");
        return false
    };
    if ($("pass").value == "") {
        $("pass").focus();
        alert("����������!");
        return false
    };
    return true
};

function fsubmit(obj){
    if ( CheckForm() == true){
        $('user').value = $('user').value.replace(/\s/g, "");
        obj.submit();
    }
}

//�ж��Ƿ��˻س�
function CheckKey(e){
    if(window.event) {
        //IE
        keynum = e.keyCode
    }else{
        if(e.which) {
            // Netscape/Firefox/Opera
            keynum = e.which
        }else{
            return false;
        }
    }
    if(keynum == 13){
        fsubmit(document.form_login);
    }else{
        return false;
    }
}
var defaultEncoding = 0;
var translateDelay = 0;
var cookieDomain = "http://localhost/kk/";
var msgToTraditionalChinese = "��������";
var msgToSimplifiedChinese = "��������";
var translateButtonId = "translateLink";