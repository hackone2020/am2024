<?php
if (!defined("KK_VER")) {
	exit("无效的访问");
} ?>
<?
$vvv = "";
$tb_name = "";
$blbl = "";
if ($_GET['kithe'] != "") {
	$kithe = $_GET['kithe'];
	if ($kithe == $Current_Kithe_Num) {
		$tb_name = "web_tan";
	} else {
		$tb_name = "web_tans";
	}
} else {
	$kithe = $Current_Kithe_Num;
	$tb_name = "web_tan";
}
$vvv .= " and kithe='" . $kithe . "'";
$abcd = $_GET['abcd'];
switch ($abcd) {
	case "A":
		$vvv .= " and abcd='A' ";
		break;
	case "B":
		$vvv .= " and abcd='B' ";
		break;
	case "C":
		$vvv .= " and abcd='C' ";
		break;
	case "D":
		$vvv .= " and abcd='D' ";
		break;
	case "E":
		$vvv .= " and abcd='E' ";
		break;
	case "F":
		$vvv .= " and abcd='F' ";
		break;
	case "G":
		$vvv .= " and abcd='G' ";
		break;
	case "H":
		$vvv .= " and abcd='H' ";
		break;
	default:
		break;
}
$result = $db1->query("select ds_lb,ds from  web_config_ds where lx=0 order by id");
$dstable = array();
$y = 0;
while ($row = $result->fetch_assoc()) {
	$dstable[$y] = $row;
	++$y;
}
$ds_count = count($dstable) - 1;
$result8 = $db1->query("SELECT class2,ds_lb,sum(sum_m) as sum_m,sum(gszc) as zc_sum,sum(sz) as zs FROM " . $tb_name . " WHERE  qx=0 " . $vvv . " group by ds_lb order by ds_lb DESC");
$rs1_table = array();
while ($row = $result8->fetch_assoc()) {
	$rs1_table[$row['ds_lb']] = $row;
}
$rs1_count = count($rs1_table) - 1;
$ii = 0;
$z_zs = $z_sum = $z_zcsum = 0;
$i = 0;
for (; $i <= $ds_count; $i += 1) {
	$sum_m = isset($rs1_table[$dstable[$i]['ds_lb']]['sum_m']) ? round($rs1_table[$dstable[$i]['ds_lb']]['sum_m'], 2) : 0;
	$zc_sum = isset($rs1_table[$dstable[$i]['ds_lb']]['zc_sum']) ? round($rs1_table[$dstable[$i]['ds_lb']]['zc_sum'], 2) : 0;
	$zs = isset($rs1_table[$dstable[$i]['ds_lb']]['zs']) ? $rs1_table[$dstable[$i]['ds_lb']]['zs'] : 0;
	if ($sum_m != 0) {
		++$ii;
		$z_zs += $zs;
		$z_sum += $sum_m;
		$z_zcsum += $zc_sum;
	}
}
//特码总额
$tmzs = $rs1_table[$dstable[0]['ds_lb']]['sum_m'] + $rs1_table[$dstable[1]['ds_lb']]['sum_m'] + $rs1_table[$dstable[2]['ds_lb']]['sum_m'] + $rs1_table[$dstable[3]['ds_lb']]['sum_m'] + $rs1_table[$dstable[4]['ds_lb']]['sum_m'] + $rs1_table[$dstable[5]['ds_lb']]['sum_m'] + $rs1_table[$dstable[6]['ds_lb']]['sum_m'] + $rs1_table[$dstable[7]['ds_lb']]['sum_m'];

//特码占成
$tmzszc = $rs1_table[$dstable[0]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[1]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[2]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[3]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[4]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[5]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[6]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[7]['ds_lb']]['zc_sum'];

//正码总额
$zmzs = $rs1_table[$dstable[9]['ds_lb']]['sum_m'] + $rs1_table[$dstable[10]['ds_lb']]['sum_m'] + $rs1_table[$dstable[11]['ds_lb']]['sum_m'] + $rs1_table[$dstable[12]['ds_lb']]['sum_m'];

//正码占成
$zmzszc = $rs1_table[$dstable[9]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[10]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[11]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[12]['ds_lb']]['zc_sum'];

//连码总额
$lmzs = $rs1_table[$dstable[20]['ds_lb']]['sum_m'] + $rs1_table[$dstable[21]['ds_lb']]['sum_m'] + $rs1_table[$dstable[22]['ds_lb']]['sum_m'] + $rs1_table[$dstable[23]['ds_lb']]['sum_m'] + $rs1_table[$dstable[24]['ds_lb']]['sum_m'] + $rs1_table[$dstable[25]['ds_lb']]['sum_m'];

//连码占成
$lmzszc = $rs1_table[$dstable[20]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[21]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[22]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[23]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[24]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[25]['ds_lb']]['zc_sum'];

//一肖总额
$yxzs = $rs1_table[$dstable[26]['ds_lb']]['sum_m'];

//一肖占成
$yxzszc = $rs1_table[$dstable[26]['ds_lb']]['zc_sum'];

//尾数总额
$wszs = $rs1_table[$dstable[29]['ds_lb']]['sum_m'];

//尾数占成
$wszszc = $rs1_table[$dstable[29]['ds_lb']]['zc_sum'];

//特肖总额
$txzs = $rs1_table[$dstable[27]['ds_lb']]['sum_m'];

//特肖占成
$txzszc = $rs1_table[$dstable[27]['ds_lb']]['zc_sum'];

//六肖总额
$liuxzs = $rs1_table[$dstable[28]['ds_lb']]['sum_m'];

//六肖占成
$liuxzszc = $rs1_table[$dstable[28]['ds_lb']]['zc_sum'];

//半波总额
$bbzs = $rs1_table[$dstable[8]['ds_lb']]['sum_m'];

//半波占成
$bbzszc = $rs1_table[$dstable[8]['ds_lb']]['zc_sum'];

//半波总额
$ztzs = $rs1_table[$dstable[13]['ds_lb']]['sum_m'];

//半波占成
$ztzszc = $rs1_table[$dstable[13]['ds_lb']]['zc_sum'];

//过关总额
$ggzs = $rs1_table[$dstable[19]['ds_lb']]['sum_m'];

//过关占成
$ggzszc = $rs1_table[$dstable[19]['ds_lb']]['zc_sum'];

//自选不中总额
$bzzs = $rs1_table[$dstable[36]['ds_lb']]['sum_m'];

//自选不中占成
$bzzszc = $rs1_table[$dstable[36]['ds_lb']]['zc_sum'];

//多中一总额
$zyzs = $rs1_table[$dstable[37]['ds_lb']]['sum_m'];

//多中一占成
$zyzszc = $rs1_table[$dstable[37]['ds_lb']]['zc_sum'];

//正码1-6总额
$z6zs = $rs1_table[$dstable[14]['ds_lb']]['sum_m'] + $rs1_table[$dstable[15]['ds_lb']]['sum_m'] + $rs1_table[$dstable[16]['ds_lb']]['sum_m'] + $rs1_table[$dstable[17]['ds_lb']]['sum_m'] + $rs1_table[$dstable[18]['ds_lb']]['sum_m'];

//正码1-6占成
$z6zszc = $rs1_table[$dstable[14]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[15]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[16]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[17]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[18]['ds_lb']]['zc_sum'];
//生肖连总额
$slzs = $rs1_table[$dstable[30]['ds_lb']]['sum_m'] + $rs1_table[$dstable[31]['ds_lb']]['sum_m'] + $rs1_table[$dstable[32]['ds_lb']]['sum_m'];
//生肖连占成
$slzszc = $rs1_table[$dstable[30]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[31]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[32]['ds_lb']]['zc_sum'];
//尾连总额
$wlzs = $rs1_table[$dstable[33]['ds_lb']]['sum_m'] + $rs1_table[$dstable[34]['ds_lb']]['sum_m'] + $rs1_table[$dstable[35]['ds_lb']]['sum_m'];
//尾连占成
$wlzszc = $rs1_table[$dstable[33]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[34]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[35]['ds_lb']]['zc_sum'];

//一粒任中总额
$lrz1 = $rs1_table[$dstable[45]['ds_lb']]['sum_m'];
$lrz2 = $rs1_table[$dstable[46]['ds_lb']]['sum_m'];
$lrz3 = $rs1_table[$dstable[47]['ds_lb']]['sum_m'];
$lrz4 = $rs1_table[$dstable[48]['ds_lb']]['sum_m'];
$lrz5 = $rs1_table[$dstable[49]['ds_lb']]['sum_m'];

//var_dump($dstable);
?>

<table width="255" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
	<tbody>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_all&uid=<?= $uid ?>&ids=全部" <? if ($action == "list_all") { ?> style="color:ff0000" <? } ?>>
					<b>特码总项①</b>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_tm&uid=<?= $uid ?>&ids=特码" <? if ($action == "list_tm") { ?> style="color:ff0000" <? } ?>>特码总项②</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_tm&uid=<?= $uid ?>&ids=特码" <? if ($action == "list_tm") { ?> style="color:ff0000" <? } ?>>
					特码：
					<font class="font_g">
						<?= round($tmzs, 2) ?>
					</font>

				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zm&uid=<?= $uid ?>&ids=正码" <? if ($action == "list_zm") { ?> style="color:ff0000" <? } ?>>正码：<font class="font_g">
						<?= round($zmzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=正1特" <? if ($ids == "正1特") { ?> style="color:ff0000" <? } ?>>正1特：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=正2特" <? if ($ids == "正2特") { ?> style="color:ff0000" <? } ?>>正2特：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=正3特" <? if ($ids == "正3特") { ?> style="color:ff0000" <? } ?>>正3特：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=正4特" <? if ($ids == "正4特") { ?> style="color:ff0000" <? } ?>>正4特：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=正5特" <? if ($ids == "正5特") { ?> style="color:ff0000" <? } ?>>正5特：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=正6特" <? if ($ids == "正6特") { ?> style="color:ff0000" <? } ?>>正6特：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>


		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zm6&uid=<?= $uid ?>&ids=正码1-6" <? if ($action == "list_zm6") { ?> style="color:ff0000" <? } ?>>正码1-6：<font class="font_g">
						<?= round($z6zs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_gg&uid=<?= $uid ?>&ids=过关" <? if ($action == "list_gg") { ?> style="color:ff0000" <? } ?>>过关：<font class="font_g">
						<?= round($ggzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>

		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bb&uid=<?= $uid ?>&ids=半波" <? if ($action == "list_bb") { ?> style="color:ff0000" <? } ?>>半波：<font class="font_g">
						<?= round($bbzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=四全中" <? if ($ids == "四全中") { ?> style="color:ff0000" <? } ?>>四全中：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=三全中" <? if ($ids == "三全中") { ?> style="color:ff0000" <? } ?>>三全中：<font class="font_g">
						<?= round($bbzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=三中二" <? if ($ids == "三中二") { ?> style="color:ff0000" <? } ?>>三中二：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=二全中" <? if ($ids == "二全中") { ?> style="color:ff0000" <? } ?>>二全中：<font class="font_g">
						<?= round($bbzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=二中特" <? if ($ids == "二中特") { ?> style="color:ff0000" <? } ?>>二中特：<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=特串" <? if ($ids == "特串") { ?> style="color:ff0000" <? } ?>>特串：<font class="font_g">
						<?= round($bbzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_yt&uid=<?= $uid ?>&ids=硬特" <? if ($ids == "硬特") { ?> style="color:ff0000" <? } ?>>硬特：<font class="font_g">
						<?= round($ytzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sx&uid=<?= $uid ?>&ids=一肖" <? if ($ids == "一肖") { ?> style="color:ff0000" <? } ?>>一肖：<font class="font_g">
						<?= round($yxzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sx&uid=<?= $uid ?>&ids=一肖不中" <? if ($ids == "一肖不中") { ?> style="color:ff0000" <? } ?>>一肖不中：<font class="font_g">
						<?= round($yxzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_ws&uid=<?= $uid ?>&ids=尾数" <? if ($ids == "尾数") { ?> style="color:ff0000" <? } ?>>尾数：<font class="font_g">
						<?= round($wszs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_ws&uid=<?= $uid ?>&ids=尾数不中" <? if ($ids == "尾数不中") { ?> style="color:ff0000" <? } ?>>尾数不中：<font class="font_g">
						<?= round($wszs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_tmsx&uid=<?= $uid ?>&ids=特肖" <? if ($action == "list_tmsx") { ?> style="color:ff0000" <? } ?>>特肖：<font class="font_g">
						<?= round($txzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sx6&uid=<?= $uid ?>&ids=六肖" <? if ($action == "list_sx6") { ?> style="color:ff0000" <? } ?>>六肖：<font class="font_g">
						<?= round($liuxzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=二肖连中" <? if ($ids == "二肖连中") { ?> style="color:ff0000" <? } ?>>二肖连中：<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=二肖连不中" <? if ($ids == "二肖连不中") { ?> style="color:ff0000" <? } ?>>二肖连不中：<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=三肖连中" <? if ($ids == "三肖连中") { ?> style="color:ff0000" <? } ?>>三肖连中：<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=三肖连不中" <? if ($ids == "三肖连不中") { ?> style="color:ff0000" <? } ?>>三肖连不中：<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=四肖连中" <? if ($ids == "四肖连中") { ?> style="color:ff0000" <? } ?>>四肖连中：<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=四肖连不中" <? if ($ids == "四肖连不中") { ?> style="color:ff0000" <? } ?>>四肖连不中：<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=五肖连中" <? if ($ids == "五肖连中") { ?> style="color:ff0000" <? } ?>>五肖连中：<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=五肖连不中" <? if ($ids == "五肖连不中") { ?> style="color:ff0000" <? } ?>>五肖连不中：<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=二尾连中" <? if ($ids == "二尾连中") { ?> style="color:ff0000" <? } ?>>二尾连中：<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=二尾连不中" <? if ($ids == "二尾连不中") { ?> style="color:ff0000" <? } ?>>二尾连不中：<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=三尾连中" <? if ($ids == "三尾连中") { ?> style="color:ff0000" <? } ?>>三尾连中：<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=三尾连不中" <? if ($ids == "三尾连不中") { ?> style="color:ff0000" <? } ?>>三尾连不中：<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=四尾连中" <? if ($ids == "四尾连中") { ?> style="color:ff0000" <? } ?>>四尾连中：<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=四尾连不中" <? if ($ids == "四尾连不中") { ?> style="color:ff0000" <? } ?>>四尾连不中：<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=五不中" <? if ($ids == "五不中") { ?> style="color:ff0000" <? } ?>>五不中：<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=六不中" <? if ($ids == "六不中") { ?> style="color:ff0000" <? } ?>>六不中：<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>

		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=七不中" <? if ($ids == "七不中") { ?> style="color:ff0000" <? } ?>>七不中：<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=八不中" <? if ($ids == "八不中") { ?> style="color:ff0000" <? } ?>>八不中：<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=九不中" <? if ($ids == "九不中") { ?> style="color:ff0000" <? } ?>>九不中：<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=十不中" <? if ($ids == "十不中") { ?> style="color:ff0000" <? } ?>>十不中：<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=十一不中" <? if ($ids == "十一不中") { ?> style="color:ff0000" <? } ?>>十一不中：<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=十二不中" <? if ($ids == "十二不中") { ?> style="color:ff0000" <? } ?>>十二不中：<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=四中一" <? if ($ids == "四中一") { ?> style="color:ff0000" <? } ?>>四中一：<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=五中一" <? if ($ids == "五中一") { ?> style="color:ff0000" <? } ?>>五中一：<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=六中一" <? if ($ids == "六中一") { ?> style="color:ff0000" <? } ?>>六中一：<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=七中一" <? if ($ids == "七中一") { ?> style="color:ff0000" <? } ?>>七中一：<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=八中一" <? if ($ids == "八中一") { ?> style="color:ff0000" <? } ?>>八中一：<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=九中一" <? if ($ids == "九中一") { ?> style="color:ff0000" <? } ?>>九中一：<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=十中一" <? if ($ids == "十中一") { ?> style="color:ff0000" <? } ?>>十中一：<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=一粒任中" <? if ($ids == "一粒任中") { ?> style="color:ff0000" <? } ?>>一粒任中：<font class="font_g">
						<?= round($lrz1, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=二粒任中" <? if ($ids == "二粒任中") { ?> style="color:ff0000" <? } ?>>二粒任中：<font class="font_g">
						<?= round($lrz2, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=三粒任中" <? if ($ids == "三粒任中") { ?> style="color:ff0000" <? } ?>>三粒任中：<font class="font_g">
						<?= round($lrz3, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=四粒任中" <? if ($ids == "四粒任中") { ?> style="color:ff0000" <? } ?>>四粒任中：<font class="font_g">
						<?= round($lrz4, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=五粒任中" <? if ($ids == "五粒任中") { ?> style="color:ff0000" <? } ?>>五粒任中：<font class="font_g">
						<?= round($lrz5, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=生肖量" <? if ($ids == "生肖量") { ?> style="color:ff0000" <? } ?>>生肖量：<font class="font_g">
						<?= round($sxlzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=尾数量" <? if ($ids == "尾数量") { ?> style="color:ff0000" <? } ?>>尾数量：<font class="font_g">
						<?= round($wslzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>

	</tbody>
</table>
<!--
<script language="JavaScript">
function myrefresh(){
window.location.reload();
}
setTimeout('myrefresh()',10000); //指定1秒刷新一次
</script>
-->