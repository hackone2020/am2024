<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
} 
if ($_GET['class2'] == "") {<script> alert('非法进入!');
    parent . main . location . href = 'main.php?action=bet_tm&uid=" . $uid . "';
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($ty != 0) {<script> alert('对不起,您暂时不能下注!');
    window.location.href = 'main.php?action=mem_left&uid=" . $uid . "';</script>
    exit;
} 
$result = mysql_query("select count(*) from web_agent  where ( kauser='" . $dai . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and ty=1  order by id desc");
$num = mysql_result($result, "0");
if ($num != 0) {< script > alert('对不起,您暂时不能下注!');
    window.location.href = 'main.php?action=mem_left&uid=" . $uid . "';</script>
    exit;
} 
$class2 = $_GET['class2'];
$sum_sum = $_POST['Num_1'];
$rate_temp = 888;
$class1_temp = $class2_temp = $class3_temp1 = $class3_temp2 = $text1 = "";
$sum_count = 0;
if ($sum_sum < 0 || $sum_sum == "" || !is_numeric($sum_sum)) {<script> alert('对不起,系统异常!');
    window . open('index.php', '_top') </script> </HTML>
    exit;
} 
$XF = 15;
$urlurl = "main.php?action=bet_yt&uid=" . $uid . "";
$class2 = "硬特";
$class1_temp = "硬特";
$class2_temp = "硬特";
$bl_dslb = "YT";
$tm_type_max = 4;
$tm_type_min = 1;
$zm_type_max = 6;
$zm_type_min = 1;
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {< script > alert('对不起,该项目已经封盘!');
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
if ($n1 < $tm_type_min) {< script Language = Javascript > alert('最少选择" . $tm_type_min . "个特码！');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($tm_type_max < $n1) {< script Language = Javascript > alert('最多选择" . $tm_type_max . "个特码！');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($n2 < $zm_type_min) {< script Language = Javascript > alert('最少选择" . $zm_type_min . "个正码！');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($zm_type_max < $n2) {< script Language = Javascript > alert('最多选择" . $zm_type_max . "个正码！');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
$class3_temp1 = $number1;
$class3_temp2 = $number2;
$zs = $n1 * $n2;
$number = $number1 . $number2;
if ($zs == 0) {< script Language = Javascript > alert('号码异常，请重新选择号码!');
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
$bl_class3 = "特码:" . $class3_temp1 . "<br>正码:" . $class3_temp2;
$sum_count = $zs;
$sum_m = $sum_sum * $zs;
$r = 1;
for (; $r <= $number_count; ++$r) {
    $temename = $number_array[$r - 1];
    if ($temename != "") {
        $bl_locked = $bl_temp[$temename]['locked'];
        $number_count_temp += 1;
        if ($bl_locked == 1) {< script Language = Javascript > alert('对不起," . $class2 . "[" . $bl_temp[$temename]['class3'] . "]已停押！');
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
if ($sum_sum < $xy) {< script Language = Javascript > alert('对不起,最低限额为" . $xy . "元！');
    window . location . href = 'main.php?action=mem_left&uid=" . $uid . "'; </script>
    exit;
} 
if ($bl_xx < $sum_sum) {< script Language = Javascript > alert('对不起,下注金额超过单注" . $bl_xx . "元！');
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
if ($bl_xxx < $sum_m + $sum_umax) {< script Language = Javascript > alert('对不起,本期" . $bl_class1 . "累计下注金额:" . $sum_umax . "元\\n本次提交内容:\\n" . "特码:" . $class3_temp1 . "\\n正码:" . $class3_temp2 . "\\n共" . $sum_count . "注 每注:" . $sum_sum . "合计:" . $sum_m . "\\n超过单项单期限额" . $bl_xxx . "元！');
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
            <td align="center" style="font-size: 12px; font-weight: bold;" >正在下注,请稍候...</td>
        </tr>
    </tbody>
</table> 
<form action="main.php?action=bet_save_n9&uid=" <?=$uid?>"&class2=" <?=$class2?>" method="post" name="form1" id="form1" onSubmit="return LMSubChk()">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
                <tbody bgcolor="#ffffff">
                <tr>
                    <td width="50%">会员账号：</td>
                    <td width="50%" align="left" id="userLoginID">"<?=$username?>"</td>
                </tr>
                <tr>
                    <td width="50%">信用额度：</td>
                    <td width="50%" id="userMoney" align="left" style="font-weight: bold;">￥"<?=$cs?>"</td>
                </tr>
                <tr>
                    <td colspan="2" class="tdpadding" align="center">
                        <span id="qishu" class="qishu">期数"<?=$Current_Kithe_Num?>"</span>
                    </td>
                </tr>    
                <tr>
                    <td colspan="2" class="tdpadding" align="center"><?=$bl_class1?></td>
                </tr>
                <tr>
                    <td id="peilv" colspan="2" class="tdxianxi1">
                        赔率：<font color='red'>"<?=$text1?></font>
                        <input name="rate_1" type="hidden" value="<?=$rate0?>" />
                    </td>
                </tr>
                <tr>
                    <td id="number" colspan="2" class="tdxianxi1" style="word-break: break-all;">"
                        <?=$bl_class3?>"
                    </td>
                </tr>
                <tr>
                    <td id="numbersum" colspan="2" class="tdxianxi1">共 "
                        <?=$sum_count?>组
                    </td>
                </tr>
                <tr>
                    <td id="sum" colspan="2" class="tdxianxi1">下注金额： <br> 每组"
                        <?=$sum_sum?>/总共"
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
                        <input type="button" name="btnClear" value="返回" id="btnClear"
                            onClick="javascript:location.href='main.php?action=mem_left&uid=" <?=$uid?>" class="btn2"
                        />&nbsp;&nbsp;
                        <input type="submit" name="btnsave" value="下注" id="btnsave" class="btn1 submit1" />
                    </td>
                </tr>
                <tr>
                <td width="50%" align="right">可赢金额：</td>
                <td width="50%" id="keying" style="color: Red;" align="center">"<?=$sum_m * $rate0?>"</td>
                </tr>
                <tr>
                <td width="50%" align="right"> 最低限额：</td>
                <td width="50%" id="zuidi" align="center">"<?=$xy?>"</td>
                </tr>
                <tr>
                <td width="50%" align="right">单注限额：</td>
                <td width="50%" id="danzhu" align="center">"<?=$bl_xx?>"</td>
                </tr>
                <tr>
                <td width="50%" align="right">单项限额：</td>
                <td width="50%" id="danxiang" align="center">"<?$bl_xxx?>"</td>
                </tr>
                <tr>
                <td width="50%" align="right">可用信用：</td>
                <td width="50%" id="yiyong" align="center">￥"<?=$ts?>"</td>
                </tr>
        </tbody>    
    </table>
</form>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" style="margin-top: 6px;">
<tbody bgcolor="#ffffff">
    <tr align="center">
        <td colspan="2" align="center">
            <span id="daojishi" style="width: 20px; line-height:20px; height:20px;">60</span>
            <span style="line-height:20px; height:20px;">秒后自动返回</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><?=$bl_class1?>"下注确认</td>
    </tr>
</tbody>
</table>
<script>daojishi();</script>
</body>