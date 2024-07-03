<?php
if (!defined("KK_VER")) {
	exit("无效的访问");
}
if ($_GET['class2'] == "") {
	echo "<script>alert('非法进入!');parent.main.location.href='main.php?action=bet_tm&uid=" . $uid . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
if ($ty != 0) {
	echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
$result = $db1->query("select count(*) from web_agent  where ( kauser='" . $dai . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and ty=1  order by id desc");
$num1 = $result->fetch_array();
$num = $num1[0];
if ($num != 0) {
	echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
$class2 = $_GET['class2'];
$rtype = $_POST['rtype'];
$sum_sum = $_POST['Num_1'];
$rate_temp = 888;
$class1_temp = $class2_temp = $class3_temp = $text1 = "";
$sum_count = 0;
if ($sum_sum < 0 || $sum_sum == "" || !is_numeric($sum_sum) || $rtype == "") {
	echo "<script>alert('对不起,系统异常!');window.open('index.php','_top')</script>";
	echo "</HTML>";
	exit();
}
switch ($rtype) {
	case "1":
		$XF = 15;
		$urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=1";
		$class2 = "四中一";
		$class1_temp = "多中一";
		$class2_temp = "四中一";
		$bl_dslb = "DZY";
		$type_max = 8;
		$type_min = 4;
		break;
	case "2":
		$XF = 15;
		$urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=2";
		$class2 = "五中一";
		$class1_temp = "多中一";
		$class2_temp = "五中一";
		$bl_dslb = "DZY";
		$type_max = 8;
		$type_min = 5;
		break;
	case "3":
		$XF = 15;
		$urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=3";
		$class2 = "六中一";
		$class1_temp = "多中一";
		$class2_temp = "六中一";
		$bl_dslb = "DZY";
		$type_max = 10;
		$type_min = 6;
		break;
	case "4":
		$XF = 15;
		$urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=4";
		$class2 = "七中一";
		$class1_temp = "多中一";
		$class2_temp = "七中一";
		$bl_dslb = "DZY";
		$type_max = 10;
		$type_min = 7;
		break;
	case "5":
		$XF = 15;
		$urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=5";
		$class2 = "八中一";
		$class1_temp = "多中一";
		$class2_temp = "八中一";
		$bl_dslb = "DZY";
		$type_max = 10;
		$type_min = 8;
		break;
	case "6":
		$XF = 15;
		$urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=6";
		$class2 = "九中一";
		$class1_temp = "多中一";
		$class2_temp = "九中一";
		$bl_dslb = "DZY";
		$type_max = 10;
		$type_min = 9;
		break;
	case "7":
		$XF = 15;
		$urlurl = "main.php?action=bet_dzy&uid=" . $uid . "&lx=7";
		$class2 = "十中一";
		$class1_temp = "多中一";
		$class2_temp = "十中一";
		$bl_dslb = "DZY";
		$type_max = 10;
		$type_min = 10;
		break;
	default:
		$urlurl = "main.php?action=bet_tm&uid=" . $uid . "&ids=特A";
		$XF = 11;
		echo "<script>window.open('index.php','_top')</script>";
		echo "</HTML>";
		exit();
		break;
}
if ($Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0) {
	echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=" . $uid . "&lx=2';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
$n = 0;
$t = 1;
for (; $t <= 49; $t += 1) {
	if ($_POST["num" . $t] != "") {
		$number1 .= $t . ",";
		$n += 1;
	}
}
$class3_temp = $number1;
$bl_lmlx = 0;
if ($rtype == "1") {
	$zs = $n * ($n - 1) * ($n - 2) * ($n - 3) / 24;
}
if ($rtype == "2") {
	$zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) / 120;
}
if ($rtype == "3") {
    $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) / 720;
}
if ($rtype == "4") {
    $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) * ($n - 6) / 5040;
}
if ($rtype == "5") {
    $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) * ($n - 6) * ($n - 7) / 40320;
}
if ($rtype == "6") {
    $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) * ($n - 6) * ($n - 7) * ($n - 8) / 362880;
}
if ($rtype == "7") {
    $zs = $n * ($n - 1) * ($n - 2) * ($n - 3) * ($n - 4) * ($n - 5) * ($n - 6) * ($n - 7) * ($n - 8) * ($n - 9) / 3628800;
}
$number = $number1;
if ($zs == 0) {
	echo "<script Language=Javascript>alert('号码异常，请重新选择号码!');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
$number_array = explode(",", $number);
$number_count = count($number_array);
$number_count_temp = 0;
require_once("include/member.php");
$config_ds_temp = get_config_ds();
$user_ds_temp = get_member_ds($uid, $username);
$bl_temp = get_bl($class2);
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
$bl_class1 = $class1_temp;
$bl_class2 = $class2_temp;
$bl_class3 = $class3_temp;
$sum_count = $zs;
$sum_m = $sum_sum * $zs;
$r = 1;
for (; $r <= $number_count; ++$r) {
	$temename = $number_array[$r - 1];
	if ($temename != "") {
		$bl_locked = $bl_temp[$temename]['locked'];
		$number_count_temp += 1;
		if ($bl_locked == 1) {
			echo "<script Language=Javascript>alert('对不起," . $class2 . "[" . $bl_temp[$temename]['class3'] . "]已停押！');parent.main.location.href='" . $urlurl . "';window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
			exit();
		} else if ($bl_temp[$temename]['rate'] < $rate_temp) {
			$rate_temp = $bl_temp[$temename]['rate'];
		}
	}
}
if ($number_count_temp < $type_min) {
	echo "<script Language=Javascript>alert('最少选择" . $type_min . "个号码！');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
if ($type_max < $number_count_temp) {
	echo "<script Language=Javascript>alert('最多选择" . $type_max . "个号码！');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
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
	case "E":
		$blc = $config_ds_temp[$bl_dslb]['blce'];
		break;
	case "F":
		$blc = $config_ds_temp[$bl_dslb]['blcf'];
		break;
	case "G":
		$blc = $config_ds_temp[$bl_dslb]['blcg'];
		break;
	case "H":
		$blc = $config_ds_temp[$bl_dslb]['blch'];
		break;
	default:
		$blc = 0;
		break;
}
$rate_temp = round($rate_temp + $blc, 3);
$bl_rate = $rate_temp;
$rate0 = $rate_temp;
$text1 = $rate_temp;
if ($sum_sum < $xy) {
	echo "<script Language=Javascript>alert('对不起,最低限额为" . $xy . "元！');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
if ($bl_xx < $sum_sum) {
	echo "<script Language=Javascript>alert('对不起,下注金额超过单注" . $bl_xx . "元！');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
$result2 = $db1->query("select SUM(sum_m) As sum_umax from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class2='" . $class2 . "' and username='" . $username . "'");
$rs5 = $result2->fetch_assoc();
if ($rs5['sum_umax'] == "") {
	$sum_umax = 0;
} else {
	$sum_umax = $rs5['sum_umax'];
}
if ($bl_xxx < $sum_m + $sum_umax) {
	echo "<script Language=Javascript>alert('对不起,本期" . $bl_class1 . ":" . $bl_class2 . "累计下注金额:" . $sum_umax . "元\\n本次提交内容:" . $bl_class3 . " 共" . $sum_count . "注 每注:" . $sum_sum . "合计:" . $sum_m . "\\n超过单项单期限额" . $bl_xxx . "元！');window.location.href='main.php?action=mem_left&uid=" . $uid . "';</script>";
	exit();
}
?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/left.js" type="text/javascript"></script>
<script language=javascript>
	var uid = "<?= $uid ?>";
	var xy = "<?= $xy ?>";
	var bl_xr = "<?= isset($bl_xr) ? intval($bl_xr) : 0 ?>";
	var bl_xx = "<?= $bl_xx ?>";
	var bl_xxx = "<?= $bl_xxx ?>";
</script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css"
<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="dengtai">
        <tbody bgcolor="#ffffff">
        <tr>
            <td align="center" style="font-size: 12px; font-weight: bold;" >正在下注,请稍候...</td>
        </tr>
        </tbody>
</table> 
<form action="main.php?action=bet_save_n8&uid=<?= $uid ?>&class2=<?= $class2 ?>" method="post" name="form1" id="form1"
	onSubmit="return LMSubChk()">
	<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
		<tbody bgcolor="#ffffff" align="center">
			<tr>
			<td colspan="2" align="center" class="t_list_caption">会员信息</td>

			</td>
			</tr>
			<tr>
				<td width="50%">会员账号：</td>
				<td width="50%" align="center" id="userLoginID"><?= $username ?></td>
			</tr>
			<tr>
				<td width="50%">信用额度：</td>
				<td width="50%" align="center" id="userMoney" style="font-weight: bold;">￥<?= $cs ?>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="tdpadding" align="center">
					<span id="qishu" class="qishu">期数<? $Current_Kithe_Num ?></span>
				</td>
			</tr>
			<tr>
				<td id="leixing" colspan="2" class="tdxianxi1"><?= $bl_class1 . "-" . $bl_class2 ?></td>
			</tr>
			<tr>
				<td id="peilv" colspan="2" class="tdxianxi1">赔率：<font color='red'><?= $text1 ?></font>
					<input name="rate_1" type="hidden" value="<?= $rate0 ?>" />
				</td>
			</tr>
			<tr>
				<td id="number" colspan="2" class="tdxianxi1" style="word-break: break-all;">
					<?= $bl_class3 ?>
				</td>
			</tr>
			<tr>
				<td id="numbersum" colspan="2" class="tdxianxi1">共<?= $sum_count ?>组</td>
			</tr>
			<tr>
				<td id="sum" colspan="2" class="tdxianxi1">下注金额： <br> 每组<?= $sum_sum ?>/总共<?= $sum_m ?>
					<input name="Num_1" type="hidden" value="<?= $sum_m ?>" />
					<input name="Num_dan" type="hidden" value="<?= $sum_sum ?>" />
					<input name="ioradio" type="hidden" value="<?= $sum_count ?>" />
					<input type="hidden" value="<?= $number1 ?>" name="number1" />
					<input type="hidden" value="<?= $rtype ?>" name="rtype" />
				</td>
			</tr>
			<tr>
				<td id="oddsmess" colspan="2" style="color: Red; display: none;white-space:nowrap;" class="tdxianxi1">
				</td>
			</tr>
			<tr>
				<td colspan="2"
					style="padding-top:4px; padding-bottom: 4px; border-top: 1px #808080 solid;border-bottom: 1px #808080 solid;">
					<input type="button" name="btnClear" value="返回" id="btnClear"
						onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />
					&nbsp;&nbsp;
					<input type="submit" name="btnsave" value="下注" id="btnsave" class="btn1 submit1" />
				</td>
			</tr>
			<tr>
				<td width="50%" align="right">可赢金额：</td>
				<td width="50%" id="keying" style="color: Red;" align="center"><?= $sum_m * $rate0 ?>
				</td>
			</tr>
			<tr>
				<td width="50%" align="right">最低限额：</td>
				<td width="50%" id="zuidi" align="center"><?= $xy ?></td>
			</tr>
			<tr>
				<td width="50%" align="right">单注限额：</td>
				<td width="50%" id="danzhu" align="center"><?= $bl_xx ?></td>
			</tr>
			<tr>
				<td width="50%" align="right">单项限额：</td>
				<td width="50%" id="danxiang" align="center"><?= $bl_xxx ?></td>
			</tr>
			<tr>
				<td width="50%" align="right">可用信用：</td>
				<td width="50%" id="yiyong" align="center">￥<?= $ts ?></td>
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
		<tr align="center">
			<td colspan="2" align="center"><?= $bl_class1 ?>下注确认</td>
		</tr>
	</tbody>
</table>
<script language="javascript">
	daojishi();
</script>
</body>