<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($_GET['act'] == "edit") {
    $pass = md5($_POST['pass']);
    if ($_POST['pass'] != "") {
        $sql = "update  web_admin set password='" . $pass . "' where uid='" . $uid . "'";
        if (!($exe = $db1->query($sql))) {
            exit("���ݿ��޸ĳ���");
        }
    }
    echo "<script>alert('�û��޸ĳɹ�!');window.location.href='main.php?action=passwd&uid={$uid}';</script>";
    exit;
}
$result = $db1->query("select * from web_admin where uid='" . $uid . "' order by id desc LIMIT 1");
$row = $result->fetch_array();
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
<div class="tit" id="tit">
    <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt="" /></div>
    <div class="tit_center floatleft font_bold"><span class="font_g">����Ա��</span> <span class="font_b">�޸�����</span></div>
    <div class="tit_right floatleft"><img src="/images/tit_03.png" width="4" height="31" alt="" /></div>
    <div class="biaoti_right floatright"></div>
</div>    
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" >
    <form name="form1" method="post" action="main.php?action=passwd&uid=<?=$uid?>&act=edit">
            <tbody>    
        
                        <tr>
                            <td height="26" colspan="2" align="center" class="t_list_caption">
                                �޸Ĺ���Ա����</td>
                        </tr>
                        <tr>
                            <td width="28%"  align="center"  class="t_edit_caption">�û�����</td>
                            <td width="72%" class="t_edit_td">
                                <?=$row['username']?>
                            </td>
                        </tr>

                        <tr>
                             <td align="center" bgcolor="#FFFFFF" class="t_edit_caption">���룺</td>
                            <td bgcolor="#C2E1E7" class="t_edit_td">
                                <input name="pass" class="za_text" type="password" id="pass" />
                            </td>
                        </tr>
                        <tr>
                            <td height="28" colspan="2" align="center" bgcolor="#FFFFFF"><button
                                   class="btn1" onClick="submit();">�޸�</button>
                            </td>
                        </tr>
                 </tbody>
                </form>
        </table>
</body>