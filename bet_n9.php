<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
} 
if ($_GET['class2'] == "") {<script> alert('�Ƿ�����!');
    parent . main . location . href = 'main.php?action=bet_tm&uid=" . $uid . "';
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($ty != 0) {<script> alert('�Բ���,����ʱ������ע!');
    window.location.href = 'main.php?action=mem_left&uid=" . $uid . "';</script>
    exit;
} 
$result = mysql_query("select count(*) from web_agent  where ( kauser='" . $dai . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and ty=1  order by id desc");
$num = mysql_result($result, "0");
if ($num != 0) {< script > alert('�Բ���,����ʱ������ע!');
    window.location.href = 'main.php?action=mem_left&uid=" . $uid . "';</script>
    exit;
} 
$class2 = $_GET['class2'];
$sum_sum = $_POST['Num_1'];
$rate_temp = 888;
$class1_temp = $class2_temp = $class3_temp1 = $class3_temp2 = $text1 = "";
$sum_count = 0;
if ($sum_sum < 0 || $sum_sum == "" || !is_numeric($sum_sum)) {<script> alert('�Բ���,ϵͳ�쳣!');
    window . open('index.php', '_top') </script> </HTML>
    exit;
} 
$XF = 15;
$urlurl = "main.php?action=bet_yt&uid=" . $uid . "";
$class2 = "Ӳ��";
$class1_temp = "Ӳ��";
$class2_temp = "Ӳ��";
$bl_dslb = "YT";
$tm_type_max = 4;
$tm_type_min = 1;
$zm_type_max = 6;
$zm_type_min = 1;
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {< script > alert('�Բ���,����Ŀ�Ѿ�����!');
    parent.main.location.href = 'main.php?action=stop&uid=" . $uid . "&lx=2';
    window.location.href = 'main.php?action=mem_left&uid=" . $uid . "';</script>
    exit;
} 
$n1 = 0;
$n2 = 0;
$t = 1;
for (; $t <= 49; $t += 1) {
    if ($_POST["num" . $t] != "") {
        $number1 .= $t . ",";
        $n1 += 1;
    } else {
        if ($_POST["numzm" . $t] != "") {
            $number2 .= $t . ",";
            $n2 += 1;
        } 
    } 
} 
if ($n1 < $tm_type_min) {< script Language = Javascript > alert('����ѡ��" . $tm_type_min . "�����룡');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($tm_type_max < $n1) {< script Language = Javascript > alert('���ѡ��" . $tm_type_max . "�����룡');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($n2 < $zm_type_min) {< script Language = Javascript > alert('����ѡ��" . $zm_type_min . "�����룡');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($zm_type_max < $n2) {< script Language = Javascript > alert('���ѡ��" . $zm_type_max . "�����룡');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
$class3_temp1 = $number1;
$class3_temp2 = $number2;
$zs = $n1 * $n2;
$number = $number1 . $number2;
if ($zs == 0) {< script Language = Javascript > alert('�����쳣��������ѡ�����!');
    parent.main.location.href = '" . $urlurl . "';
    window.location.href = 'main.php?action=mem_left&uid=" . $uid . "';</script>
    exit;
} 
$number_array = explode(",", $number);
$number_count = count($number_array);
$number_count_temp = 0;
require_once "include/member.php";
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
$bl_temp = get_bl($class2);
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
$bl_class1 = $class1_temp;
$bl_class2 = $class2_temp;
$bl_class3 = "����:" . $class3_temp1 . "<br>����:" . $class3_temp2;
$sum_count = $zs;
$sum_m = $sum_sum * $zs;
$r = 1;
for (; $r <= $number_count; ++$r) {
    $temename = $number_array[$r - 1];
    if ($temename != "") {
        $bl_locked = $bl_temp[$temename]['locked'];
        $number_count_temp += 1;
        if ($bl_locked == 1) {< script Language = Javascript > alert('�Բ���," . $class2 . "[" . $bl_temp[$temename]['class3'] . "]��ͣѺ��');
            parent . main . location . href = '" . $urlurl . "';
            window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
            exit;
        } else {
            if ($bl_temp[$temename]['rate'] < $rate_temp) {
                $rate_temp = $bl_temp[$temename]['rate'];
            } 
        } 
    } 
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
$rate_temp = round($rate_temp + $blc, 3);
$bl_rate = $rate_temp;
$rate0 = $rate_temp;
$text1 = $rate_temp;
if ($sum_sum < $xy) {< script Language = Javascript > alert('�Բ���,����޶�Ϊ" . $xy . "Ԫ��');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($bl_xx < $sum_sum) {< script Language = Javascript > alert('�Բ���,��ע������ע" . $bl_xx . "Ԫ��');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
$result2 = mysql_query("select SUM(sum_m) As sum_umax from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class2='" . $class2 . "' and username='" . $username . "'");
$rs5 = mysql_fetch_assoc($result2);
if ($rs5['sum_umax'] == "") {
    $sum_umax = 0;
} else {
    $sum_umax = $rs5['sum_umax'];
} 
if ($bl_xxx < $sum_m + $sum_umax) {< script Language = Javascript > alert('�Բ���,����" . $bl_class1 . "�ۼ���ע���:" . $sum_umax . "Ԫ\\n�����ύ����:\\n" . "����:" . $class3_temp1 . "\\n����:" . $class3_temp2 . "\\n��" . $sum_count . "ע ÿע:" . $sum_sum . "�ϼ�:" . $sum_m . "\\n����������޶�" . $bl_xxx . "Ԫ��');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
}?>
<script src="js/function.js" type="text/javascript"> </script>
<script src="js/left.js" type="text/javascript"> </script>
<SCRIPT language=javascript>
    var uid = "<?=$uid?>";
    var xy = "<?=$xy?>";
    var bl_xr = "<?=isset($bl_xr) ? intval($bl_xr) : 0?>";
    var bl_xx = "<?=$bl_xx?>";
    var bl_xxx = "<?=$bl_xxx?>";
</SCRIPT>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1545056559" type="text/css">
<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="dengtai">
    <tbody bgcolor="#ffffff">
        <tr>
            <td align="center" style="font-size: 12px; font-weight: bold;" >������ע,���Ժ�...</td>
        </tr>
    </tbody>
</table> 
<form action="main.php?action=bet_save_n9&uid=" <?=$uid?>"&class2=" <?=$class2?>" method="post" name="form1" id="form1" onSubmit="return LMSubChk()">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
                <tbody bgcolor="#ffffff">
                <tr>
                    <td width="50%">��Ա�˺ţ�</td>
                    <td width="50%" align="left" id="userLoginID">"<?=$username?>"</td>
                </tr>
                <tr>
                    <td width="50%">���ö�ȣ�</td>
                    <td width="50%" id="userMoney" align="left" style="font-weight: bold;">��"<?=$cs?>"</td>
                </tr>
                <tr>
                    <td colspan="2" class="tdpadding" align="center">
                        <span id="qishu" class="qishu">����"<?=$Current_Kithe_Num?>"</span>
                    </td>
                </tr>    
                <tr>
                    <td colspan="2" class="tdpadding" align="center"><?=$bl_class1?></td>
                </tr>
                <tr>
                    <td id="peilv" colspan="2" class="tdxianxi1">
                        ���ʣ�<font color='red'>"<?=$text1?></font>
                        <input name="rate_1" type="hidden" value="<?=$rate0?>" />
                    </td>
                </tr>
                <tr>
                    <td id="number" colspan="2" class="tdxianxi1" style="word-break: break-all;">"
                        <?=$bl_class3?>"
                    </td>
                </tr>
                <tr>
                    <td id="numbersum" colspan="2" class="tdxianxi1">�� "
                        <?=$sum_count?>��
                    </td>
                </tr>
                <tr>
                    <td id="sum" colspan="2" class="tdxianxi1">��ע�� <br> ÿ��"
                        <?=$sum_sum?>/�ܹ�"
                        <?=$sum_m?>
                        <input name="Num_1" type="hidden" value="<?=$$sum_m?>" />
                        <input name="Num_dan" type="hidden" value="<?=$$sum_sum?>" />
                        <input name="ioradio" type="hidden" value="<?=$$sum_count?>" />
                        <input type="hidden" value='"<?=$$number1?>"' name="number1" />
                        <input type="hidden" value='"<?=$$number2?>"' name="number2" />
                    </td>
                </tr>
                <tr>
                    <td id="oddsmess" colspan="2" style="color: Red; display: none;white-space:nowrap;" class="tdxianxi1"></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top:4px; padding-bottom: 4px; border-top: 1px #808080 solid;border-bottom: 1px #808080 solid;">
                        <input type="button" name="btnClear" value="����" id="btnClear"
                            onClick="javascript:location.href='main.php?action=mem_left&uid=" <?=$uid?>" class="btn2"
                        />&nbsp;&nbsp;
                        <input type="submit" name="btnsave" value="��ע" id="btnsave" class="btn1 submit1" />
                    </td>
                </tr>
                <tr>
                <td width="50%" align="right">��Ӯ��</td>
                <td width="50%" id="keying" style="color: Red;" align="center">"<?=$sum_m * $rate0?>"</td>
                </tr>
                <tr>
                <td width="50%" align="right"> ����޶</td>
                <td width="50%" id="zuidi" align="center">"<?=$xy?>"</td>
                </tr>
                <tr>
                <td width="50%" align="right">��ע�޶</td>
                <td width="50%" id="danzhu" align="center">"<?=$bl_xx?>"</td>
                </tr>
                <tr>
                <td width="50%" align="right">�����޶</td>
                <td width="50%" id="danxiang" align="center">"<?$bl_xxx?>"</td>
                </tr>
                <tr>
                <td width="50%" align="right">�������ã�</td>
                <td width="50%" id="yiyong" align="center">��"<?=$ts?>"</td>
                </tr>
        </tbody>    
    </table>
</form>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" style="margin-top: 6px;">
<tbody bgcolor="#ffffff">
    <tr align="center">
        <td colspan="2" align="center">
            <span id="daojishi" style="width: 20px; line-height:20px; height:20px;">60</span>
            <span style="line-height:20px; height:20px;">����Զ�����</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><?=$bl_class1?>"��עȷ��</td>
    </tr>
</tbody>
</table>
<script>daojishi();</script>
</body>