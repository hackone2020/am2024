<?php
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($_GET['class2'] == "") {
    echo "<script>alert('非法进入!');parent.main.location.href='main.php?action=bet_tm&uid=" . $uid . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
if ($ty != 0) {
    echo "<script>alert('非法进入!');parent.main.location.href='main.php?action=bet_tm&uid=" . $uid . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$result = $db1->query("select count(*) from web_agent  where ( kauser='" . $dai . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and ty=1  order by id desc");
$num = $result->fetch_array();
$num = $num[0];
if ($num != 0) {
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
    exit();
}
$class2 = $_GET['class2'];
switch ($class2) {
    case "特A":
        $XF = 11;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=特A";
        $numm = 62;
        break;
    case "特B":
        $XF = 11;
        $numm = 62;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=特B";
        break;
    case "正A":
        $XF = 15;
        $urlurl = "main.php?action=bet_zm&uid=" . $uid . "&ids=正A";
        $numm = 53;
        break;
    case "正B":
        $XF = 15;
        $numm = 53;
        $urlurl = "main.php?action=bet_zm&uid=" . $uid . "&ids=正B";
        break;
    case "正1特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正1特";
        $numm = 49;
        break;
    case "正2特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正2特";
        $numm = 49;
        break;
    case "正3特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正3特";
        $numm = 49;
        break;
    case "正4特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正4特";
        $numm = 49;
        break;
    case "正5特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正5特";
        $numm = 49;
        break;
    case "正6特":
        $XF = 15;
        $urlurl = "main.php?action=bet_zt&uid=" . $uid . "&ids=正6特";
        $numm = 49;
        break;
    case "正码1-6":
        $XF = 15;
        $urlurl = "main.php?action=bet_zm6&uid=" . $uid . "&ids=正码1-6";
        $numm = 66;
        break;
    case "半波":
        $XF = 15;
        $urlurl = "main.php?action=bet_bb&uid=" . $uid . "&ids=半波";
        $numm = 18;
        break;
    case "尾数":
        $XF = 15;
        $urlurl = "main.php?action=bet_ws&uid=" . $uid . "&ids=尾数";
        $numm = 10;
        break;
    case "尾数不中":
        $XF = 15;
        $urlurl = "main.php?action=bet_wsbz&uid=" . $uid . "&ids=尾数不中";
        $numm = 10;
        break;
    case "尾数量":
        $XF = 15;
        $urlurl = "main.php?action=bet_wszl&uid=" . $uid . "&ids=尾数量";
        $numm = 10;
        break;
    case "特肖":
        $XF = 15;
        $urlurl = "main.php?action=bet_tmsx&uid=" . $uid . "&ids=特肖";
        $numm = 12;
        break;
    case "一肖":
        $XF = 15;
        $urlurl = "main.php?action=bet_sx&uid=" . $uid . "&ids=一肖";
        $numm = 12;
        break;
    case "一肖不中":
        $XF = 15;
        $urlurl = "main.php?action=bet_sxbz&uid=" . $uid . "&ids=一肖不中";
        $numm = 12;
        break;
    case "一肖量":
    case "二肖量":
    case "三肖量":
    case "四肖量":
    case "五肖量":
        $XF = 15;
        $urlurl = "main.php?action=bet_sxzl&uid=" . $uid . "&lx=" . $class2;
        $numm = 12;
        break;
    default:
        $numm = 0;
        $urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=特A";
        $XF = 11;
        break;
}
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
    echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=" . $uid . "&lx=2';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
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
                <td align="center" colspan="4">下注确认</td>
            </tr>
        </tbody>
</talbe>
    <table width="90%"  border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="showtable1">
         <tbody bgcolor="#ffffff">
            <tr align="center">
                <td bgcolor="#FFFFFF">类型</td>
                <td bgcolor="#FFFFFF">内容</td>
                <td bgcolor="#FFFFFF">赔率</td>
                <td bgcolor="#FFFFFF">金额</td>
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
                        echo "<script Language=Javascript>alert('对不起,最低限额为" . $xy . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
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
                        echo "<script Language=Javascript>alert('对不起," . $bl_class2 . ":" . $bl_class3 . "号已停押！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                        exit();
                    }
                    if (($bl_class2 == "特A" || $bl_class2 == "特B") && $bl_xr < $bl_gold + $_POST["Num_" . $r]) {
                        echo "<script Language=Javascript>alert('对不起," . $bl_class2 . ":" . $bl_class3 . "号已停押！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
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
                        echo "<script Language=Javascript>alert('对不起," . $bl_class2 . ":" . $bl_class3 . "号总下注超过单项" . $user_ds_temp[$bl_dslb]['xxx'] . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                        exit();
                    }
                    if ($user_ds_temp[$bl_dslb]['xx'] < $_POST["Num_" . $r]) {
                        echo "<script Language=Javascript>alert('对不起," . $bl_class2 . ":" . $bl_class3 . "号总下注超过单注" . $user_ds_temp[$bl_dslb]['xx'] . "元！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
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
                                strnumbers += "<?= $bl_class2 ?>" + " " + "<?= $bl_class3 ?>" + " @ " + "<?= $rate0 ?>" + "×￥" + "<?= $_POST["Num_" . $r] ?>\r\n";
                                var indexindex = "<?= $sum_count ?>";
                                strnumbers += ((indexindex + 1) % 2 != 0) ? '' : '';
                            </script>
                        </td>
                    </tr>
                    <?
                }
            }
            if ($ts < $sum_sum) {
                echo "<script Language=Javascript>alert('对不起,下注总额大于可用信用额：" . $ts . "!!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
                exit();
            }
            ?>
            <tr align="center" bgcolor="#ffffff">
                <td style="padding-top: 8px; padding-bottom: 4px; display:none;" colspan="4">
                    <input type="button" name="btnClear" value="返回" id="btnClear"
                        onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />&nbsp;&nbsp;
                    <input type="submit" name="btnsave" value="确定下注" id="btnsave" class="btn1 submit queding" />
                </td>
            </tr>
            <tr align="center">
                <td colspan="4" align="center" bgcolor="#FFFFFF">共 <b id="sum"><?= $sum_count ?></b>注 合计:<b
                        id="summoney"><?= $sum_sum ?></b> &nbsp;&nbsp;</td>
            </tr>
            <script type="text/javascript">
                var tempstrstr = '共' + '<?= $sum_count ?>' + '注 合计:' + '<?= $sum_sum ?>' + '，确定下注吗？\r\n';
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
        //设定『确定下注』按钮为禁止 
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