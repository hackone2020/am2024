<?php
if (!defined("KK_VER")) {
	exit("��Ч�ķ���");
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
//�����ܶ�
$tmzs = $rs1_table[$dstable[0]['ds_lb']]['sum_m'] + $rs1_table[$dstable[1]['ds_lb']]['sum_m'] + $rs1_table[$dstable[2]['ds_lb']]['sum_m'] + $rs1_table[$dstable[3]['ds_lb']]['sum_m'] + $rs1_table[$dstable[4]['ds_lb']]['sum_m'] + $rs1_table[$dstable[5]['ds_lb']]['sum_m'] + $rs1_table[$dstable[6]['ds_lb']]['sum_m'] + $rs1_table[$dstable[7]['ds_lb']]['sum_m'];

//����ռ��
$tmzszc = $rs1_table[$dstable[0]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[1]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[2]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[3]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[4]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[5]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[6]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[7]['ds_lb']]['zc_sum'];

//�����ܶ�
$zmzs = $rs1_table[$dstable[9]['ds_lb']]['sum_m'] + $rs1_table[$dstable[10]['ds_lb']]['sum_m'] + $rs1_table[$dstable[11]['ds_lb']]['sum_m'] + $rs1_table[$dstable[12]['ds_lb']]['sum_m'];

//����ռ��
$zmzszc = $rs1_table[$dstable[9]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[10]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[11]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[12]['ds_lb']]['zc_sum'];

//�����ܶ�
$lmzs = $rs1_table[$dstable[20]['ds_lb']]['sum_m'] + $rs1_table[$dstable[21]['ds_lb']]['sum_m'] + $rs1_table[$dstable[22]['ds_lb']]['sum_m'] + $rs1_table[$dstable[23]['ds_lb']]['sum_m'] + $rs1_table[$dstable[24]['ds_lb']]['sum_m'] + $rs1_table[$dstable[25]['ds_lb']]['sum_m'];

//����ռ��
$lmzszc = $rs1_table[$dstable[20]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[21]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[22]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[23]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[24]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[25]['ds_lb']]['zc_sum'];

//һФ�ܶ�
$yxzs = $rs1_table[$dstable[26]['ds_lb']]['sum_m'];

//һФռ��
$yxzszc = $rs1_table[$dstable[26]['ds_lb']]['zc_sum'];

//β���ܶ�
$wszs = $rs1_table[$dstable[29]['ds_lb']]['sum_m'];

//β��ռ��
$wszszc = $rs1_table[$dstable[29]['ds_lb']]['zc_sum'];

//��Ф�ܶ�
$txzs = $rs1_table[$dstable[27]['ds_lb']]['sum_m'];

//��Фռ��
$txzszc = $rs1_table[$dstable[27]['ds_lb']]['zc_sum'];

//��Ф�ܶ�
$liuxzs = $rs1_table[$dstable[28]['ds_lb']]['sum_m'];

//��Фռ��
$liuxzszc = $rs1_table[$dstable[28]['ds_lb']]['zc_sum'];

//�벨�ܶ�
$bbzs = $rs1_table[$dstable[8]['ds_lb']]['sum_m'];

//�벨ռ��
$bbzszc = $rs1_table[$dstable[8]['ds_lb']]['zc_sum'];

//�벨�ܶ�
$ztzs = $rs1_table[$dstable[13]['ds_lb']]['sum_m'];

//�벨ռ��
$ztzszc = $rs1_table[$dstable[13]['ds_lb']]['zc_sum'];

//�����ܶ�
$ggzs = $rs1_table[$dstable[19]['ds_lb']]['sum_m'];

//����ռ��
$ggzszc = $rs1_table[$dstable[19]['ds_lb']]['zc_sum'];

//��ѡ�����ܶ�
$bzzs = $rs1_table[$dstable[36]['ds_lb']]['sum_m'];

//��ѡ����ռ��
$bzzszc = $rs1_table[$dstable[36]['ds_lb']]['zc_sum'];

//����һ�ܶ�
$zyzs = $rs1_table[$dstable[37]['ds_lb']]['sum_m'];

//����һռ��
$zyzszc = $rs1_table[$dstable[37]['ds_lb']]['zc_sum'];

//����1-6�ܶ�
$z6zs = $rs1_table[$dstable[14]['ds_lb']]['sum_m'] + $rs1_table[$dstable[15]['ds_lb']]['sum_m'] + $rs1_table[$dstable[16]['ds_lb']]['sum_m'] + $rs1_table[$dstable[17]['ds_lb']]['sum_m'] + $rs1_table[$dstable[18]['ds_lb']]['sum_m'];

//����1-6ռ��
$z6zszc = $rs1_table[$dstable[14]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[15]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[16]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[17]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[18]['ds_lb']]['zc_sum'];
//��Ф���ܶ�
$slzs = $rs1_table[$dstable[30]['ds_lb']]['sum_m'] + $rs1_table[$dstable[31]['ds_lb']]['sum_m'] + $rs1_table[$dstable[32]['ds_lb']]['sum_m'];
//��Ф��ռ��
$slzszc = $rs1_table[$dstable[30]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[31]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[32]['ds_lb']]['zc_sum'];
//β���ܶ�
$wlzs = $rs1_table[$dstable[33]['ds_lb']]['sum_m'] + $rs1_table[$dstable[34]['ds_lb']]['sum_m'] + $rs1_table[$dstable[35]['ds_lb']]['sum_m'];
//β��ռ��
$wlzszc = $rs1_table[$dstable[33]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[34]['ds_lb']]['zc_sum'] + $rs1_table[$dstable[35]['ds_lb']]['zc_sum'];

//һ�������ܶ�
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
				<a href="main.php?action=list_all&uid=<?= $uid ?>&ids=ȫ��" <? if ($action == "list_all") { ?> style="color:ff0000" <? } ?>>
					<b>���������</b>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_tm&uid=<?= $uid ?>&ids=����" <? if ($action == "list_tm") { ?> style="color:ff0000" <? } ?>>���������</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_tm&uid=<?= $uid ?>&ids=����" <? if ($action == "list_tm") { ?> style="color:ff0000" <? } ?>>
					���룺
					<font class="font_g">
						<?= round($tmzs, 2) ?>
					</font>

				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zm&uid=<?= $uid ?>&ids=����" <? if ($action == "list_zm") { ?> style="color:ff0000" <? } ?>>���룺<font class="font_g">
						<?= round($zmzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=��1��" <? if ($ids == "��1��") { ?> style="color:ff0000" <? } ?>>��1�أ�<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=��2��" <? if ($ids == "��2��") { ?> style="color:ff0000" <? } ?>>��2�أ�<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=��3��" <? if ($ids == "��3��") { ?> style="color:ff0000" <? } ?>>��3�أ�<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=��4��" <? if ($ids == "��4��") { ?> style="color:ff0000" <? } ?>>��4�أ�<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=��5��" <? if ($ids == "��5��") { ?> style="color:ff0000" <? } ?>>��5�أ�<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zt&uid=<?= $uid ?>&ids=��6��" <? if ($ids == "��6��") { ?> style="color:ff0000" <? } ?>>��6�أ�<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>


		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_zm6&uid=<?= $uid ?>&ids=����1-6" <? if ($action == "list_zm6") { ?> style="color:ff0000" <? } ?>>����1-6��<font class="font_g">
						<?= round($z6zs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_gg&uid=<?= $uid ?>&ids=����" <? if ($action == "list_gg") { ?> style="color:ff0000" <? } ?>>���أ�<font class="font_g">
						<?= round($ggzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>

		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bb&uid=<?= $uid ?>&ids=�벨" <? if ($action == "list_bb") { ?> style="color:ff0000" <? } ?>>�벨��<font class="font_g">
						<?= round($bbzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=��ȫ��" <? if ($ids == "��ȫ��") { ?> style="color:ff0000" <? } ?>>��ȫ�У�<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=��ȫ��" <? if ($ids == "��ȫ��") { ?> style="color:ff0000" <? } ?>>��ȫ�У�<font class="font_g">
						<?= round($bbzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=���ж�" <? if ($ids == "���ж�") { ?> style="color:ff0000" <? } ?>>���ж���<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=��ȫ��" <? if ($ids == "��ȫ��") { ?> style="color:ff0000" <? } ?>>��ȫ�У�<font class="font_g">
						<?= round($bbzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=������" <? if ($ids == "������") { ?> style="color:ff0000" <? } ?>>�����أ�<font class="font_g">
						<?= round($ztzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lm&uid=<?= $uid ?>&ids=�ش�" <? if ($ids == "�ش�") { ?> style="color:ff0000" <? } ?>>�ش���<font class="font_g">
						<?= round($bbzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_yt&uid=<?= $uid ?>&ids=Ӳ��" <? if ($ids == "Ӳ��") { ?> style="color:ff0000" <? } ?>>Ӳ�أ�<font class="font_g">
						<?= round($ytzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sx&uid=<?= $uid ?>&ids=һФ" <? if ($ids == "һФ") { ?> style="color:ff0000" <? } ?>>һФ��<font class="font_g">
						<?= round($yxzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sx&uid=<?= $uid ?>&ids=һФ����" <? if ($ids == "һФ����") { ?> style="color:ff0000" <? } ?>>һФ���У�<font class="font_g">
						<?= round($yxzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_ws&uid=<?= $uid ?>&ids=β��" <? if ($ids == "β��") { ?> style="color:ff0000" <? } ?>>β����<font class="font_g">
						<?= round($wszs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_ws&uid=<?= $uid ?>&ids=β������" <? if ($ids == "β������") { ?> style="color:ff0000" <? } ?>>β�����У�<font class="font_g">
						<?= round($wszs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_tmsx&uid=<?= $uid ?>&ids=��Ф" <? if ($action == "list_tmsx") { ?> style="color:ff0000" <? } ?>>��Ф��<font class="font_g">
						<?= round($txzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sx6&uid=<?= $uid ?>&ids=��Ф" <? if ($action == "list_sx6") { ?> style="color:ff0000" <? } ?>>��Ф��<font class="font_g">
						<?= round($liuxzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=��Ф����" <? if ($ids == "��Ф����") { ?> style="color:ff0000" <? } ?>>��Ф���У�<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=��Ф������" <? if ($ids == "��Ф������") { ?> style="color:ff0000" <? } ?>>��Ф�����У�<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=��Ф����" <? if ($ids == "��Ф����") { ?> style="color:ff0000" <? } ?>>��Ф���У�<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=��Ф������" <? if ($ids == "��Ф������") { ?> style="color:ff0000" <? } ?>>��Ф�����У�<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=��Ф����" <? if ($ids == "��Ф����") { ?> style="color:ff0000" <? } ?>>��Ф���У�<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=��Ф������" <? if ($ids == "��Ф������") { ?> style="color:ff0000" <? } ?>>��Ф�����У�<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=��Ф����" <? if ($ids == "��Ф����") { ?> style="color:ff0000" <? } ?>>��Ф���У�<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_sxl&uid=<?= $uid ?>&ids=��Ф������" <? if ($ids == "��Ф������") { ?> style="color:ff0000" <? } ?>>��Ф�����У�<font class="font_g">
						<?= round($slzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=��β����" <? if ($ids == "��β����") { ?> style="color:ff0000" <? } ?>>��β���У�<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=��β������" <? if ($ids == "��β������") { ?> style="color:ff0000" <? } ?>>��β�����У�<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=��β����" <? if ($ids == "��β����") { ?> style="color:ff0000" <? } ?>>��β���У�<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=��β������" <? if ($ids == "��β������") { ?> style="color:ff0000" <? } ?>>��β�����У�<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=��β����" <? if ($ids == "��β����") { ?> style="color:ff0000" <? } ?>>��β���У�<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_wsl&uid=<?= $uid ?>&ids=��β������" <? if ($ids == "��β������") { ?> style="color:ff0000" <? } ?>>��β�����У�<font class="font_g">
						<?= round($wlzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=�岻��" <? if ($ids == "�岻��") { ?> style="color:ff0000" <? } ?>>�岻�У�<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=������" <? if ($ids == "������") { ?> style="color:ff0000" <? } ?>>�����У�<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>

		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=�߲���" <? if ($ids == "�߲���") { ?> style="color:ff0000" <? } ?>>�߲��У�<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=�˲���" <? if ($ids == "�˲���") { ?> style="color:ff0000" <? } ?>>�˲��У�<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=�Ų���" <? if ($ids == "�Ų���") { ?> style="color:ff0000" <? } ?>>�Ų��У�<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=ʮ����" <? if ($ids == "ʮ����") { ?> style="color:ff0000" <? } ?>>ʮ���У�<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=ʮһ����" <? if ($ids == "ʮһ����") { ?> style="color:ff0000" <? } ?>>ʮһ���У�<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_bz&uid=<?= $uid ?>&ids=ʮ������" <? if ($ids == "ʮ������") { ?> style="color:ff0000" <? } ?>>ʮ�����У�<font class="font_g">
						<?= round($bzzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=����һ" <? if ($ids == "����һ") { ?> style="color:ff0000" <? } ?>>����һ��<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=����һ" <? if ($ids == "����һ") { ?> style="color:ff0000" <? } ?>>����һ��<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=����һ" <? if ($ids == "����һ") { ?> style="color:ff0000" <? } ?>>����һ��<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=����һ" <? if ($ids == "����һ") { ?> style="color:ff0000" <? } ?>>����һ��<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=����һ" <? if ($ids == "����һ") { ?> style="color:ff0000" <? } ?>>����һ��<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=����һ" <? if ($ids == "����һ") { ?> style="color:ff0000" <? } ?>>����һ��<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_dzy&uid=<?= $uid ?>&ids=ʮ��һ" <? if ($ids == "ʮ��һ") { ?> style="color:ff0000" <? } ?>>ʮ��һ��<font class="font_g">
						<?= round($zyzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=һ������" <? if ($ids == "һ������") { ?> style="color:ff0000" <? } ?>>һ�����У�<font class="font_g">
						<?= round($lrz1, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=��������" <? if ($ids == "��������") { ?> style="color:ff0000" <? } ?>>�������У�<font class="font_g">
						<?= round($lrz2, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=��������" <? if ($ids == "��������") { ?> style="color:ff0000" <? } ?>>�������У�<font class="font_g">
						<?= round($lrz3, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=��������" <? if ($ids == "��������") { ?> style="color:ff0000" <? } ?>>�������У�<font class="font_g">
						<?= round($lrz4, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=��������" <? if ($ids == "��������") { ?> style="color:ff0000" <? } ?>>�������У�<font class="font_g">
						<?= round($lrz5, 2) ?>
					</font>
				</a>
			</td>
		</tr>
		<tr>
			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=��Ф��" <? if ($ids == "��Ф��") { ?> style="color:ff0000" <? } ?>>��Ф����<font class="font_g">
						<?= round($sxlzs, 2) ?>
					</font>
				</a>
			</td>

			<td height="25" width="50%" align="left" class="t_list_tr_3" style="padding-left:3px;">
				<a href="main.php?action=list_lrz&uid=<?= $uid ?>&ids=β����" <? if ($ids == "β����") { ?> style="color:ff0000" <? } ?>>β������<font class="font_g">
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
setTimeout('myrefresh()',10000); //ָ��1��ˢ��һ��
</script>
-->