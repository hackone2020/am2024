<?php
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($_GET['class2'] == "") {
    echo "<script>alert('�Ƿ�����!');parent.main.location.href='main.php?action=bet_tm&uid=" . $uid . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if ($ty != 0) {
    echo "<script>alert('�Ƿ�����!');parent.main.location.href='main.php?action=bet_tm&uid=" . $uid . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$result = $db1->query("select count(*) from web_agent  where ( kauser='" . $dai . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and ty=1  order by id desc");
$num = $result->fetch_array();
$num = $num[0];
if ($num != 0) {
    echo "<script>alert('�Բ���,����ʱ������ע!');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$class2 = $_GET['class2'];
switch ($class2) {
    case "��A":
        $XF = 11;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=��A";
        $numm = 62;
        break;
    case "��B":
        $XF = 11;
        $numm = 62;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=��B";
        break;
    case "��A":
        $XF = 15;
        $urlurl = "main.php?action=bet_zm&uid=" . $uid . "&ids=��A";
        $numm = 53;
        break;
    case "��B":
        $XF = 15;
        $numm = 53;
        $urlurl = "main.php?action=bet_zm&uid=" . $uid . "&ids=��B";
        break;
    case "��1��":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=��1��";
        $numm = 49;
        break;
    case "��2��":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=��2��";
        $numm = 49;
        break;
    case "��3��":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=��3��";
        $numm = 49;
        break;
    case "��4��":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=��4��";
        $numm = 49;
        break;
    case "��5��":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=��5��";
        $numm = 49;
        break;
    case "��6��":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=��6��";
        $numm = 49;
        break;
    case "����1-6":
        $XF = 15;
        $urlurl = "main.php?action=bet_zm6&uid=" . $uid . "&ids=����1-6";
        $numm = 66;
        break;
    case "�벨":
        $XF = 15;
        $urlurl = "main.php?action=bet_bb&uid=" . $uid . "&ids=�벨";
        $numm = 18;
        break;
    case "β��":
        $XF = 15;
        $urlurl = "main.php?action=bet_ws&uid=" . $uid . "&ids=β��";
        $numm = 10;
        break;
    case "β������":
        $XF = 15;
        $urlurl = "main.php?action=bet_wsbz&uid=" . $uid . "&ids=β������";
        $numm = 10;
        break;
    case "β����":
        $XF = 15;
        $urlurl = "main.php?action=bet_wszl&uid=" . $uid . "&ids=β����";
        $numm = 10;
        break;
    case "��Ф":
        $XF = 15;
        $urlurl = "main.php?action=bet_tmsx&uid=" . $uid . "&ids=��Ф";
        $numm = 12;
        break;
    case "һФ":
        $XF = 15;
        $urlurl = "main.php?action=bet_sx&uid=" . $uid . "&ids=һФ";
        $numm = 12;
        break;
    case "һФ����":
        $XF = 15;
        $urlurl = "main.php?action=bet_sxbz&uid=" . $uid . "&ids=һФ����";
        $numm = 12;
        break;
    case "һФ��":
    case "��Ф��":
    case "��Ф��":
    case "��Ф��":
    case "��Ф��":
        $XF = 15;
        $urlurl = "main.php?action=bet_sxzl&uid=" . $uid . "&lx=" . $class2;
        $numm = 12;
        break;
    default:
        $numm = 0;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=��A";
        $XF = 11;
        break;
}
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo "<script>alert('�Բ���,����Ŀ�Ѿ�����!');parent.main.location.href='main.php?action=stop&uid=" . $uid . "&lx=2';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
require_once("include/member.php");
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
$bl_temp = get_bl($class2);


?>
<script language="javascript" type="text/javascript">
    strnumbers = '';
</script>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">
<body>
<form action="main.php?action=bet_save&uid=<?= $uid ?>&class2=<?= $class2 ?>" method="post" name="form1" id="form1">
<talbe width="90%"  border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="queren">
    <tbody bgcolor="#ffffff">
            <tr align="center">
                <td align="center" colspan="4">��עȷ��</td>
            </tr>
        </tbody>
</talbe>
    <table width="90%"  border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="showtable1">
         <tbody bgcolor="#ffffff">
            <tr align="center">
                <td bgcolor="#FFFFFF">����</td>
                <td bgcolor="#FFFFFF">����</td>
                <td bgcolor="#FFFFFF">����</td>
                <td bgcolor="#FFFFFF">���</td>
            </tr>
            <?
            $sum_sum = 0;
            $sum_count = 0;
            $r = 1;
            for (; $r <= $numm; ++$r) { ?>
                <input name="Num_<?= $r ?>" type="hidden" value="<?= $_POST["Num_" . $r] ?>" />
                <?
                if ($_POST["Num_" . $r] != "" && 0 < $_POST["Num_" . $r]) {
                    if ($_POST["Num_" . $r] < $xy) {
                        echo "<script Language=Javascript>alert('�Բ���,����޶�Ϊ" . $xy . "Ԫ��');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                        exit();
                    }
                    $sum_count += 1;
                    $sum_sum += $_POST["Num_" . $r];
                    $bl_class1 = $bl_temp[$r]['class1'];
                    $bl_class2 = $bl_temp[$r]['class2'];
                    $bl_class3 = $bl_temp[$r]['class3'];
                    $bl_dslb = $bl_temp[$r]['ds_lb'];
                    $bl_gold = $bl_temp[$r]['gold'];
                    $bl_xr = $bl_temp[$r]['xr'];
                    $bl_rate = $bl_temp[$r]['rate'];
                    $bl_locked = $bl_temp[$r]['locked'];
                    if ($bl_locked == 1) {
                        echo "<script Language=Javascript>alert('�Բ���," . $bl_class2 . ":" . $bl_class3 . "����ͣѺ��');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                        exit();
                    }
                    if (($bl_class2 == "��A" || $bl_class2 == "��B") && $bl_xr < $bl_gold + $_POST["Num_" . $r]) {
                        echo "<script Language=Javascript>alert('�Բ���," . $bl_class2 . ":" . $bl_class3 . "����ͣѺ��');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                        exit();
                    }
                    $result2 = $db1->query("select SUM(sum_m) As sum_umax from web_tan where Kithe='" . $Current_Kithe_Num . "' and class1='" . $bl_class1 . "' and  class2='" . $bl_class2 . "' and class3='" . $bl_class3 . "' and username='" . $username . "'");
                    $rs5 = $result2->fetch_assoc();
                    if ($rs5['sum_umax'] == "") {
                        $sum_umax = 0;
                    } else {
                        $sum_umax = $rs5['sum_umax'];
                    }
                    if ($user_ds_temp[$bl_dslb]['xxx'] < $sum_umax + $_POST["Num_" . $r]) {
                        echo "<script Language=Javascript>alert('�Բ���," . $bl_class2 . ":" . $bl_class3 . "������ע��������" . $user_ds_temp[$bl_dslb]['xxx'] . "Ԫ��');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                        exit();
                    }
                    if ($user_ds_temp[$bl_dslb]['xx'] < $_POST["Num_" . $r]) {
                        echo "<script Language=Javascript>alert('�Բ���," . $bl_class2 . ":" . $bl_class3 . "������ע������ע" . $user_ds_temp[$bl_dslb]['xx'] . "Ԫ��');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                        exit();
                    }
                    switch ($abcd) {
                        case "A":
                            $blc = 0;
                            break;
                        case "B":
                            $blc = $config_ds_temp[$bl_dslb]['blcb'];
                            break;
                        case "C":
                            $blc = $config_ds_temp[$bl_dslb]['blcc'];
                            break;
                        case "D":
                            $blc = $config_ds_temp[$bl_dslb]['blcd'];
                            break;
                        default:
                            $blc = 0;
                            break;
                    }
                    $rate0 = round($bl_rate + $blc, 3);
                    ?>
                    <tr align="center">
                        <td bgcolor="#FFFFFF"><?= $bl_class2 ?> </td>
                        <td bgcolor="#FFFFFF"><?= $bl_class3 ?></td>
                        <td bgcolor="#FFFFFF"><?= $rate0 ?><input name="rate_<?= $r ?>" type="hidden" value="<?= $rate0 ?>" />
                        </td>
                        <td bgcolor="#FFFFFF"><?= $_POST["Num_" . $r] ?>
                            <script type="text/javascript">
                                strnumbers += "<?= $bl_class2 ?>" + " " + "<?= $bl_class3 ?>" + " @ " + "<?= $rate0 ?>" + "����" + "<?= $_POST["Num_" . $r] ?>\r\n";
                                var indexindex = "<?= $sum_count ?>";
                                strnumbers += ((indexindex + 1) % 2 != 0) ? '' : '';
                            </script>
                        </td>
                    </tr>
                    <?
                }
            }
            if ($ts < $sum_sum) {
                echo "<script Language=Javascript>alert('�Բ���,��ע�ܶ���ڿ������ö" . $ts . "!!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                exit();
            }
            ?>
            <tr align="center" bgcolor="#ffffff">
                <td style="padding-top: 8px; padding-bottom: 4px; display:none;" colspan="4">
                    <input type="button" name="btnClear" value="����" id="btnClear"
                        onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />&nbsp;&nbsp;
                    <input type="submit" name="btnsave" value="ȷ����ע" id="btnsave" class="btn1 submit queding" />
                </td>
            </tr>
            <tr align="center">
                <td colspan="4" align="center" bgcolor="#FFFFFF">�� <b id="sum"><?= $sum_count ?></b>ע �ϼ�:<b
                        id="summoney"><?= $sum_sum ?></b> &nbsp;&nbsp;</td>
            </tr>
            <script type="text/javascript">
                var tempstrstr = '��' + '<?= $sum_count ?>' + 'ע �ϼ�:' + '<?= $sum_sum ?>' + '��ȷ����ע��\r\n';
                strnumbers = tempstrstr + '' + strnumbers;
            </script>
            </td>
            </tr>
        </tbody>
    </table>
</form>    

<script language="JavaScript" type="text/javascript">
    Chk2Submit(strnumbers)
    function Chk2Submit(cfstr) {
        //�趨��ȷ����ע����ťΪ��ֹ 
        if (!window.confirm(cfstr)) {
            $("btnsave").disabled = false;
            window.location.href = 'main.php?action=mem_left&uid=<?= $uid ?>';
            return false;
        }
        $("btnsave").disabled = true;
        $("queren").style.display = 'none';
        $("dengtai").style.display = 'block';
        document.form1.submit();
    } 
</script>
</div>
</body>