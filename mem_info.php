<?php
function get_tbnum($c)
{
    if ($c % 2) {
        return 2;
    } else {
        return 1;
    }
}
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($_GET['act'] == "edit") {
    $ypass = $_POST['ypass'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if ($ypass == $pass1) {
        echo "<script>alert('�����벻����ԭ����һ��!!!');window.history.go(-1);</script>";
        exit;
    }
    if ($pass1 != $pass2) {
        echo  "<script>alert('ȷ�������������벻һ��!!!'); window.history.go(-1);</script>";
        exit;
    }
    chk_pwd($pass1);
    $ypass = md5($ypass);
    $sql = "select count(*) from web_member where uid='{$uid}' and kapassword='{$ypass}' order by id desc";
    $result = $db1->query($sql);
    $num = $result->fetch_array()[0];
    if ($num == 0) {
        echo  "<script>alert('�Բ�������ԭ�������!!!'); window.history.go(-1);</script>";
        exit;
    }
    $pass1 = md5($pass1);
    $sql = "update web_member set kapassword='" . $pass1 . "' where uid='{$uid}' order by id desc";
    if (!$db1->query($sql)) {
        exit("�޸ĳ���!");
    }
    echo "<script>alert('�޸ĳɹ�!'); window.location.href = 'main.php?action=mem_info&uid=" . $uid . "';</script>";
    exit;
}
require_once "include/member.php";
$user_ds_temp = get_member_ds($uid, $username);
switch ($abcd) {
    case "A":
        $yg_lx = "yg";
        break;
    case "B":
        $yg_lx = "ygb";
        break;
    case "C":
        $yg_lx = "ygc";
        break;
    case "D":
        $yg_lx = "ygd";
        break;
    case "E":
        $yg_lx = "yge";
        break;
    case "F":
        $yg_lx = "ygf";
        break;
    case "G":
        $yg_lx = "ygg";
        break;
    case "H":
        $yg_lx = "ygh";
        break;
    default:
        $yg_lx = "yg";
        break;
} ?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/mem_info.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1683715146" type="text/css">

<body marginwidth="0" marginheight="0">
    <table width="700" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>
                    <table width="345" border="0" cellpadding="0" cellspacing="1" class="t_list">
                        <tbody>
                            <tr>
                                <td colspan="2" class="t_list_caption">��������</td>
                            </tr>

                            <tr>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_caption">��Ա�˺�</td>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_td">
                                    <?= $username ?>( <?= $xm ?>) <?= $abcd ?>��
                                </td>
                            </tr>
                            <tr>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_caption">���ö��</td>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_td">
                                    <?= $cs ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_caption">���ý��</td>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_td">
                                    <?= $ts ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_caption">���ý��</td>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_td">
                                    <font class="font_r">
                                        <?
                                        $c = $cs - $ts;
                                        echo $c;
                                        ?>
                                    </font>
                                </td>
                            </tr>
                            <!--<tr>-->
                            <!--    <td height="28" bgcolor="#FFFFFF" class="t_edit_caption">���Ͷע</td>-->
                            <!--    <td height="28" bgcolor="#FFFFFF" class="t_edit_td">-->
                            <!--        <?= $xy ?>-->
                            <!--    </td>-->
                            <!--</tr>-->
                        </tbody>
                    </table>
                </td>
                <td>
                    <table width="345" border="0" cellpadding="0" cellspacing="1" class="t_list">
                        <form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=mem_info&act=edit&uid=<?= $uid ?>"> </form>
                        <tbody>
                            <tr>
                                <td colspan="2" class="t_list_caption">�����޸�</td>
                            </tr>
                            <tr>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_caption">ԭ����</td>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_td">
                                    <input name="ypass" type="password" id="ypass" class="upuserinput" />
                                </td>
                            </tr>

                            <tr>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_caption">������</td>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_td">
                                    <input name="pass1" type="password" id="pass1" class="upuserinput" />
                                </td>
                            </tr>

                            <tr>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_caption">ȷ������</td>
                                <td height="28" bgcolor="#FFFFFF" class="t_edit_td">
                                    <input name="pass2" type="password" id="pass2" class="upuserinput" />
                                </td>

                            </tr>
                            <tr>
                                <td height="28" colspan="2" align="center" bgcolor="#FFFFFF">
                                    <input type="submit" name="btn" value="�޸�����" id="btn" class="btn1" />&nbsp;
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table>
    <br>


    <table width="700" border="0" cellpadding="0" cellspacing="1" class="t_list">
        <tbody>
            <tr>
                <td class="t_list_caption">��ע����</td>
                <td class="t_list_caption">��ˮ%</td>
                <td class="t_list_caption">��ע�޶�</td>
                <td class="t_list_caption">�����޶�</td>
            </tr>
            <?
            $i = 0;
            $color = 1;

            foreach ($user_ds_temp as $k => $v) {
                ++$i;

            ?>
                <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#FFFFFF'" onmouseover="this.style.backgroundColor='#FFFFA2'" style="background-color: rgb(255, 255, 255);">
                    <td height="30" align="center">
                        <?= $v['ds'] ?> </td>
                    <td height="22" align="center">
                        <?= $v[$yg_lx] ?>
                    </td>
                    <td align="center">
                        <?= $v['xx'] ?>
                    </td>
                    <td height="22" align="center">
                        <?= $v['xxx'] ?>
                    </td>
                </tr>
            <? } ?>
        </tbody>
    </table>
</body>