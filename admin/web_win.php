<?php
ob_start();
if (!defined('KK_VER')) {
	exit('��Ч�ķ���');
}

if (strpos($flag, '01')) {
} else {
	echo "<center>��û�и�Ȩ�޹���!</center>";
	exit;
}
class   RunTime
{
	//������ҳ��ִ�п�ʼʱ�亯��
	function   Rstartime()
	{
		$nowtime   =   explode(" ", microtime());
		$starttime   =   $nowtime[1]   +   $nowtime[0];
		return   $starttime;
	}
	//������ҳ��ִ�н���ʱ�亯��
	function   Rendtime()
	{
		global   $starttime;
		$nowtime   =   explode(" ",   microtime());
		$endtime   =   $nowtime[1]   +   $nowtime[0];
		$totaltime   =   ($endtime   -   $starttime); //����ִ��ʱ��
		return   number_format($totaltime, 6); //��ʽ��ִ��ʱ��С�����6λ
	}
}
$time   =   new   RunTime;
$starttime   =   $time->Rstartime();
if ($_GET['kf'] == 1) {
	$kf = 1;
} else {
	$kf = 0;
}
if ($_GET['kithe'] != "") {
	$resultbb = $db1->query("select * from web_kithe where nn=" . $_GET['kithe'] . " order by id desc LIMIT 1");
	$row = $resultbb->fetch_array();
	$kithe = $row['nn'];
	$na = $row['na'];
	$n1 = $row['n1'];
	$n2 = $row['n2'];
	$n3 = $row['n3'];
	$n4 = $row['n4'];
	$n5 = $row['n5'];
	$n6 = $row['n6'];
	//���õ������
	$str11  = "class5 LIKE '%|" . $n1 . "|%' or class5 LIKE '%|" . $n2 . "|%' or class5 LIKE '%|" . $n3 . "|%' or class5 LIKE '%|" . $n4 . "|%' or class5 LIKE '%|" . $n5 . "|%' or class5 LIKE '%|" . $n6 . "|%'";
	//�õ������
	$str22  = "class5 LIKE '%|" . $n1 . "|%' or class5 LIKE '%|" . $n2 . "|%' or class5 LIKE '%|" . $n3 . "|%' or class5 LIKE '%|" . $n4 . "|%' or class5 LIKE '%|" . $n5 . "|%' or class5 LIKE '%|" . $n6 . "|%' or class5 LIKE '%|" . $na . "|%'";
	$sxsx0 = get_sx_name($na);
	$sxsx1 = get_sx_name($n1);
	$sxsx2 = get_sx_name($n2);
	$sxsx3 = get_sx_name($n3);
	$sxsx4 = get_sx_name($n4);
	$sxsx5 = get_sx_name($n5);
	$sxsx6 = get_sx_name($n6);
	$wsws0 = $na % 10;
	$wsws1 = $n1 % 10;
	$wsws2 = $n2 % 10;
	$wsws3 = $n3 % 10;
	$wsws4 = $n4 % 10;
	$wsws5 = $n5 % 10;
	$wsws6 = $n6 % 10;
	$sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $kithe . "',kauser='" . $jxadmin . "',lx=3,text1='�̿ڹ���',text2='����',ip='" . $userip . "'";
	$db1->query($sql);
} else {
	echo "<script>alert('��������Ϊ�գ��뷵�غ�����ѡ��!'); window.location.href = 'main.php?action=web_kithe_list&uid=$uid';</script>";
	exit;
}
?>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">

<body style="min-width: 1200px;width: 100%">
	<div id="tit" class="tit">
		<div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
		<div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;����</span></div>
		<div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
		<div class="biaoti_right floatright"></div>
	</div>
	<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
		<tbody>
			<tr>
				<td class="t_list_caption" align="center">
					<font color="#CC0000">���㣭��<?= $kithe ?>�ڿ�������
					</font>
				</td>
			</tr>
			<tr>
				<td align="center" valign="middle" bgcolor="#FFFFFF"> <img src="images/control/login.gif" width="64" height="64" /><br><br>���ڽ���<font color="#CC0000">
						<?= $kithe ?>
					</font>������,���Ժ�... </td>

			</tr>
			<?
			echo str_repeat(" ", 4096);
			ob_flush();
			flush();
			?>

			<tr>
				<Td align="center" bgcolor="#FFFFFF">
					<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
						<tr>
							<td align="center" colspan="2" bgcolor="#FFFFFF">
								<?
								if ($_GET['kithe'] != "") {
									//��ʼ��
									$db1->query("update web_tans set bm=0,win='0' where kithe=" . $kithe . " ");
									// ��������
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class3='" . $na . "'");
									// ���뵥˫
									if ($na % 2 == 1) {
										$class3 = "�ص�";
										$class31 = "��˫";
									} else {
										$class31 = "�ص�";
										$class3 = "��˫";
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����' and (class3='�ص�' or class3='��˫') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class3='" . $class3 . "'");
									}
									// ����β��βС
									$mmms = $na % 10;
									if ($mmms >= 5) {
										$class3 = "β��";
										$class31 = "βС";
									} else {
										$class31 = "β��";
										$class3 = "βС";
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����'  and (class3='β��' or class3='βС') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class3='" . $class3 . "'");
									}
									// �����С
									if ($na >= 25) {
										$class3 = "�ش�";
										$class31 = "��С";
									} else {
										$class31 = "�ش�";
										$class3 = "��С";
									}

									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����' and (class3='�ش�' or class3='��С') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class3='" . $class3 . "'");
									}
									// �ϵ���˫
									if ((($na % 10) + intval($na / 10)) % 2 == 0) {
										$class3 = "��˫";
										$class31 = "�ϵ�";
									} else {
										$class31 = "��˫";
										$class3 = "�ϵ�";
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����' and (class3='�ϵ�' or class3='��˫') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class3='" . $class3 . "'");
									}
									// �ϵ���С
									if (($na % 10 + intval($na) / 10) >= 7) {
										$class3 = "�ϴ�";
										$class31 = "��С";
									} else {
										$class31 = "�ϴ�";
										$class3 = "��С";
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����' and (class3='�ϴ�' or class3='��С') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class3='" . $class3 . "'");
									}
									// �������벨ɫ
									$class3 = get_bs_name($na);
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class3='" . $class3 . "'");

									echo "�������ɹ�!!<br>";

									// �������ء�Ӳ��
									for ($i = 1; $i <= 6; $i++) {
										if ($i == 1) {
											$class2  = "��1��";
											$class22 = "����1";
											$tmtm = $n1;
										}
										if ($i == 2) {
											$class2  = "��2��";
											$class22 = "����2";
											$tmtm = $n2;
										}
										if ($i == 3) {
											$class2  = "��3��";
											$class22 = "����3";
											$tmtm = $n3;
										}
										if ($i == 4) {
											$class2  = "��4��";
											$class22 = "����4";
											$tmtm = $n4;
										}
										if ($i == 5) {
											$class2  = "��5��";
											$class22 = "����5";
											$tmtm = $n5;
										}
										if ($i == 6) {
											$class2  = "��6��";
											$class22 = "����6";
											$tmtm = $n6;
										}
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class2='" . $class2 . "' and class3='" . $tmtm . "'");
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='Ӳ��' and class2='Ӳ��' and class3='��:" . $na . ",��:" . $tmtm . ",'");

										// ���ص�˫
										if ($tmtm % 2 == 1) {
											$class3 = "��";
											$class31 = "˫";
										} else {
											$class31 = "��";
											$class3 = "˫";
										}
										if ($tmtm == 49) {
											$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and (class3='��' or class3='˫') ");
										} else {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
										}
										// ���ش�С
										if ($tmtm >= 25) {
											$class3 = "��";
											$class31 = "С";
										} else {
											$class31 = "��";
											$class3 = "С";
										}
										if ($tmtm == 49) {
											$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and (class3='��' or class3='С') ");
										} else {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
										}
										// ���غϵ���˫
										if ((($tmtm % 10) + intval($tmtm / 10)) % 2 == 0) {
											$class3 = "��˫";
											$class31 = "�ϵ�";
										} else {
											$class31 = "��˫";
											$class3 = "�ϵ�";
										}
										if ($tmtm == 49) {
											$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and (class3='�ϵ�' or class3='��˫') ");
										} else {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
										}
										// ���غϴ��С
										if (($tmtm % 10 + intval($tmtm) / 10) >= 7) {
											$class3 = "�ϴ�";
											$class31 = "��С";
										} else {
											$class31 = "�ϴ�";
											$class3 = "��С";
										}
										if ($tmtm == 49) {
											$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and (class3='�ϴ�' or class3='��С') ");
										} else {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
										}
										// �������ز�ɫ
										$class3 = get_bs_name($tmtm);
										$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and  (class3='�첨' or class3='����' or class3='�̲�') ");
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
									}

									echo "���ء�����1-6����ɹ�!!<br>";

									// ����
									$class2 = "����";
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and  (class3='" . $n1 . "' or class3='" . $n2 . "'  or class3='" . $n3 . "' or class3='" . $n4 . "'  or class3='" . $n5 . "'  or class3='" . $n6 . "') ");
									$sum_number = $n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $na;
									$class2 = "�ܷ�";
									if ($sum_number % 2 == 1) {
										$class3 = "�ܵ�";
										$class31 = "��˫";
									} else {
										$class31 = "�ܵ�";
										$class3 = "��˫";
									}
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='�ܷ�'  and class3='" . $class3 . "'");
									if ($sum_number <= 174) {
										$class3 = "��С";
										$class31 = "�ܴ�";
									} else {
										$class31 = "��С";
										$class3 = "�ܴ�";
									}
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='�ܷ�'  and class3='" . $class3 . "'");

									echo "�������ɹ�!!<br>";
									ob_flush();
									flush();
									// ����
									$result55 = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='����' and Kithe='" . $kithe . "'");
									while ($image = $result55->fetch_array()) {
										$number5 = 0;
										$number4 = 0;
										$class3 = $image['class3'];
										$class2 = $image['class2'];
										$class33 = explode(",", $class3);
										$class22 = explode(",", $class2);
										$ss1 = count($class33);
										$ss2 = count($class22);
										$k = 0;
										$result = 0;
										$result2 = 1;
										for ($i = 0; $i < $ss2 - 1; $i++) {
											if ($class22[$i] == "����1") {
												$tmtm = $n1;
											}
											if ($class22[$i] == "����2") {
												$tmtm = $n2;
											}
											if ($class22[$i] == "����3") {
												$tmtm = $n3;
											}
											if ($class22[$i] == "����4") {
												$tmtm = $n4;
											}
											if ($class22[$i] == "����5") {
												$tmtm = $n5;
											}
											if ($class22[$i] == "����6") {
												$tmtm = $n6;
											}
											$result = 0;
											switch ($class33[$k]) {
												case "��":

													if ($tmtm >= 25) {
														$result = 1;
													}
													break;
												case "С":
													if ($tmtm < 25) {
														$result = 1;
													}
													break;
												case "��":
													if ($tmtm % 2 == 1) {
														$result = 1;
													}
													break;
												case "˫":
													if ($tmtm % 2 == 0) {
														$result = 1;
													}
													break;
												case "�첨":
													if (get_bs_name($tmtm) == "�첨") {
														$result = 1;
													}
													break;
												case "����":
													if (get_bs_name($tmtm) == "����") {
														$result = 1;
													}

													break;
												case "�̲�":
													if (get_bs_name($tmtm) == "�̲�") {
														$result = 1;
													}
													break;
												default:
													$result = 0;
													break;
											}
											if ($result == 0) {
												$result2 = 0;
											}
											$k += 2;
										}
										if ($result2 == 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����' and class2='" . $class2 . "' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='����' and class2='".$class2."' and class3='" . $class3 . "'");
										}
									}
									echo "���ؽ���ɹ�!!<br>";

									//�벨
									$class2 = "�벨";
									$class3 = get_bs_name($na);
									if ($class3 == "�첨") {
										if ($na >= 25) {
											$class31 = "���";
										} else {
											$class31 = "��С";
										}
										if ($na % 2 == 1) {
											$class32 = "�쵥";
										} else {
											$class32 = "��˫";
										}
										if (($na % 10 + intval($na / 10)) % 2 == 1) {
											$class33 = "��ϵ�";
										} else {
											$class33 = "���˫";
										}
									}
									if ($class3 == "�̲�") {
										if ($na >= 25) {
											$class31 = "�̴�";
										} else {
											$class31 = "��С";
										}
										if ($na % 2 == 1) {
											$class32 = "�̵�";
										} else {
											$class32 = "��˫";
										}
										if (($na % 10 + intval($na / 10)) % 2 == 1) {
											$class33 = "�̺ϵ�";
										} else {
											$class33 = "�̺�˫";
										}
									}
									if ($class3 == "����") {
										if ($na >= 25) {
											$class31 = "����";
										} else {
											$class31 = "��С";
										}
										if ($na % 2 == 1) {
											$class32 = "����";
										} else {
											$class32 = "��˫";
										}
										if (($na % 10 + intval($na / 10)) % 2 == 1) {
											$class33 = "���ϵ�";
										} else {
											$class33 = "����˫";
										}
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='�벨' and class2='" . $class2 . "' ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='�벨' and class2='" . $class2 . "' and (class3='" . $class33 . "' or class3='" . $class31 . "' or class3='" . $class32 . "') ");
									}

									echo "�벨����ɹ�!!<br>";

									// ������Ф
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф' and class2='��Ф' and class3='" . $sxsx0 . "'");

									echo "��Ф����ɹ�!!<br>";

									// ������Ф
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф' and class2='��Ф' and class3 LIKE '%$sxsx0%' ");
									if ($sx49 == 0 && $na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='��Ф' and class2='��Ф' ");
									}

									echo "��Ф����ɹ�!!<br>";

									// ����һФ
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф' and class2='һФ' and (class3='" . $sxsx0 . "' or class3='" . $sxsx1 . "' or class3='" . $sxsx2 . "' or class3='" . $sxsx3 . "' or class3='" . $sxsx4 . "' or class3='" . $sxsx5 . "' or class3='" . $sxsx6 . "'  )");

									echo "һФ����ɹ�!!<br>";
									// ����һФ����
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф' and class2='һФ����' and (class3<>'" . $sxsx0 . "' and class3<>'" . $sxsx1 . "' and class3<>'" . $sxsx2 . "' and class3<>'" . $sxsx3 . "' and class3<>'" . $sxsx4 . "' and class3<>'" . $sxsx5 . "' and class3<>'" . $sxsx6 . "'  )");

									echo "һФ���н���ɹ�!!<br>";



									// ����β��
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='β��' and class2='β��' and (class3='" . $wsws0 . "' or class3='" . $wsws1 . "' or class3='" . $wsws2 . "' or class3='" . $wsws3 . "' or class3='" . $wsws4 . "' or class3='" . $wsws5 . "' or class3='" . $wsws6 . "'  )");
									// ����β������
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='β��' and class2='β������' and (class3<>'" . $wsws0 . "' and class3<>'" . $wsws1 . "' and class3<>'" . $wsws2 . "' and class3<>'" . $wsws3 . "' and class3<>'" . $wsws4 . "' and class3<>'" . $wsws5 . "' and class3<>'" . $wsws6 . "'  )");

									echo "β�����н���ɹ�!!<br>";

									// �����Ф����
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='��Ф��' and class2='��Ф����' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $sxsx0) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx1) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx2) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx3) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx4) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx5) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx6) {
												$number5++;
											}
										}
										if ($number5 > 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф����' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф����' and class3='" . $class3 . "'");
										}
									}

									echo "��Ф���н���ɹ�!!<br>";

									// �����Ф������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='��Ф��' and class2='��Ф������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $sxsx0) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx1) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx2) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx3) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx4) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx5) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx6) {
												$number5++;
											}
										}
										if ($number5 == 0) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф������' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф������' and class3='" . $class3 . "'");
										}
									}

									echo "��Ф�����н���ɹ�!!<br>";

									// ������Ф����
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='��Ф��' and class2='��Ф����' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $sxsx0) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx1) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx2) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx3) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx4) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx5) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx6) {
												$number5++;
											}
										}
										if ($number5 > 2) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф����' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф����' and class3='" . $class3 . "'");
										}
									}

									echo "��Ф���н���ɹ�!!<br>";

									// ������Ф���в���
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='��Ф��' and class2='��Ф������' and kithe='" . $kithe . "'");
									$t = 0;
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $sxsx0) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx1) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx2) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx3) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx4) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx5) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx6) {
												$number5++;
											}
										}
										if ($number5 == 0) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф������' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф������' and class3='" . $class3 . "'");
										}
									}

									echo "��Ф�����н���ɹ�!!<br>";

									// ������Ф����
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='��Ф��' and class2='��Ф����' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $sxsx0) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx1) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx2) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx3) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx4) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx5) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx6) {
												$number5++;
											}
										}
										if ($number5 > 3) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф����' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф����' and class3='" . $class3 . "'");
										}
									}

									echo "��Ф���н���ɹ�!!<br>";

									// ������Ф������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='��Ф��' and class2='��Ф������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $sxsx0) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx1) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx2) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx3) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx4) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx5) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx6) {
												$number5++;
											}
										}
										if ($number5 == 0) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф������' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф������' and class3='" . $class3 . "'");
										}
									}

									echo "��Ф�����н���ɹ�!!<br>";
									// ������Ф����
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='��Ф��' and class2='��Ф����' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $sxsx0) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx1) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx2) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx3) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx4) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx5) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx6) {
												$number5++;
											}
										}
										if ($number5 > 4) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф����' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф����' and class3='" . $class3 . "'");
										}
									}

									echo "��Ф���н���ɹ�!!<br>";

									// ������Ф������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='��Ф��' and class2='��Ф������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $sxsx0) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx1) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx2) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx3) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx4) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx5) {
												$number5++;
											} elseif ($numberxz[$i] == $sxsx6) {
												$number5++;
											}
										}
										if ($number5 == 0) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф������' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='��Ф��' and class2='��Ф������' and class3='" . $class3 . "'");
										}
									}

									echo "��Ф�����н���ɹ�!!<br>";

									// ��β����
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='β����' and class2='��β����' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $wsws0) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws1) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws2) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws3) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws4) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws5) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws6) {
												$number5++;
											}
										}
										if ($number5 > 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='β����' and class2='��β����' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='β����' and class2='��β����' and class3='" . $class3 . "'");
										}
									}

									echo "��β���н���ɹ�!!<br>";

									// ��β������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='β����' and class2='��β������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $wsws0) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws1) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws2) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws3) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws4) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws5) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws6) {
												$number5++;
											}
										}
										if ($number5 == 0) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='β����' and class2='��β������' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='β����' and class2='��β������' and class3='" . $class3 . "'");
										}
									}

									echo "��β�����н���ɹ�!!<br>";

									// ��β����
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='β����' and class2='��β����' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $wsws0) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws1) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws2) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws3) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws4) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws5) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws6) {
												$number5++;
											}
										}
										if ($number5 > 2) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='β����' and class2='��β����' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='β����' and class2='��β����' and class3='" . $class3 . "'");
										}
									}

									echo "��β���н���ɹ�!!<br>";

									// ��β������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='β����' and class2='��β������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $wsws0) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws1) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws2) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws3) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws4) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws5) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws6) {
												$number5++;
											}
										}
										if ($number5 == 0) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='β����' and class2='��β������' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='β����' and class2='��β������' and class3='" . $class3 . "'");
										}
									}

									echo "��β�����н���ɹ�!!<br>";

									// ��β����
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='β����' and class2='��β����' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $wsws0) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws1) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws2) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws3) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws4) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws5) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws6) {
												$number5++;
											}
										}
										if ($number5 > 3) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='β����' and class2='��β����' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='β����' and class2='��β����' and class3='" . $class3 . "'");
										}
									}

									echo "��β���н���ɹ�!!<br>";

									// ��β������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='β����' and class2='��β������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $wsws0) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws1) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws2) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws3) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws4) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws5) {
												$number5++;
											} elseif ($numberxz[$i] == $wsws6) {
												$number5++;
											}
										}
										if ($number5 == 0) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='β����' and class2='��β������' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='β����' and class2='��β������' and class3='" . $class3 . "'");
										}
									}

									echo "��β�����н���ɹ�!!<br>";
									ob_flush();
									flush();
									// ����
									// ������ȫ��
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='����' and class2='��ȫ��' and (" . $str11 . ")");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 3; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 2; $j++) {
													for ($k = $j + 1; $k < $number_count1 - 1; $k++) {
														for ($l = $k + 1; $l < $number_count1; $l++) {
															$sum_count  = 0;
															$lmnum1 = $number1[$i];
															$lmnum2 = $number1[$j];
															$lmnum3 = $number1[$k];
															$lmnum4 = $number1[$l];
															if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
																$sum_count = $sum_count + 1;
															}
															if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
																$sum_count = $sum_count + 1;
															}
															if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6) {
																$sum_count = $sum_count + 1;
															}
															if ($lmnum4 == $n1 || $lmnum4 == $n2 || $lmnum4 == $n3 || $lmnum4 == $n4 || $lmnum4 == $n5 || $lmnum4 == $n6) {
																$sum_count = $sum_count + 1;
															}
															if ($sum_count > 3) {
																$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3], $rate1[$lmnum4]));
																$zs1 = $zs1 + 1;
															}
														}
													}
												}
											}
										}
										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='����' and class2='��ȫ��' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "��ȫ�н���ɹ�!!<br>";
									// ������ȫ��
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='����' and class2='��ȫ��' and (" . $str11 . ")");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 2; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 1; $j++) {
													for ($k = $j + 1; $k < $number_count1; $k++) {
														$sum_count  = 0;
														$lmnum1 = $number1[$i];
														$lmnum2 = $number1[$j];
														$lmnum3 = $number1[$k];
														if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($sum_count > 2) {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3]));
															$zs1 = $zs1 + 1;
														}
													}
												}
											}
										} else {
											//����
											$number_array = explode("��", $class3);
											$number2 = explode(",", $number_array[0]);
											$number1 = explode(",", $number_array[1]);
											$number_count1 = count($number1) - 1;
											$lmnum1  = $number2[0];
											$lmnum2  = $number2[1];
											$sum_count = 0;
											if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
												$sum_count = $sum_count + 1;
											}
											if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
												$sum_count = $sum_count + 1;
											}
											if ($sum_count > 1) {
												for ($k = 0; $k < $number_count1; $k++) {
													$lmnum3 = $number1[$k];
													if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6) {
														$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3]));
														$zs1 = $zs1 + 1;
													}
												}
											}
										}
										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='����' and class2='��ȫ��' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "��ȫ�н���ɹ�!!<br>";

									// �������ж�
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='����' and class2='���ж�' and (" . $str11 . ")");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$zs2 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$class5     = str_replace("/", "|", $class5);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$rate2      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
												$rate2[$bl_temp[1]] = $bl_temp[3];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 2; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 1; $j++) {
													for ($k = $j + 1; $k < $number_count1; $k++) {
														$sum_count  = 0;
														$lmnum1 = $number1[$i];
														$lmnum2 = $number1[$j];
														$lmnum3 = $number1[$k];
														if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($sum_count == 2) {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3]));
															$zs1 = $zs1 + 1; //echo $zs1."<br>";
														}
														if ($sum_count == 3) {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate2[$lmnum1], $rate2[$lmnum2], $rate2[$lmnum3]));
															$zs2 = $zs2 + 1;
														}
													}
												}
											}
										} else {
											//����
											$number_array = explode("��", $class3);
											$number2 = explode(",", $number_array[0]);
											$number1 = explode(",", $number_array[1]);
											$number_count1 = count($number1) - 1;
											$lmnum1     = $number2[0];
											$lmnum2     = $number2[1];
											$sum_count  = 0;
											if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
												$sum_count = $sum_count + 1;
											}
											if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
												$sum_count = $sum_count + 1;
											}
											if ($sum_count > 0) {
												for ($k = 0; $k < $number_count1; $k++) {
													$lmnum3 = $number1[$k];
													if ($sum_count == 1) {
														if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6) {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3]));
															$zs1 = $zs1 + 1;
														}
													} else {
														if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6) {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate2[$lmnum1], $rate2[$lmnum2], $rate2[$lmnum3]));
															$zs2 = $zs2 + 1;
														} else {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3]));
															$zs1 = $zs1 + 1;
														}
													}
												}
											}
										}
										//�н�
										if ($zs1 + $zs2 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "+" . $zs2 . "' where  kithe=" . $kithe . " and class1='����' and class2='���ж�' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "���ж�����ɹ�!!<br>";

									// �����ȫ��
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='����' and class2='��ȫ��' and (" . $str11 . ")");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 1; $i++) {
												for ($j = $i + 1; $j < $number_count1; $j++) {
													$sum_count  = 0;
													$lmnum1 = $number1[$i];
													$lmnum2 = $number1[$j];
													if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
														$sum_count = $sum_count + 1;
													}
													if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
														$sum_count = $sum_count + 1;
													}
													if ($sum_count > 1) {
														$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
														$zs1 = $zs1 + 1;
													}
												}
											}
										}
										if ($image['lmlx'] == 1) {
											//����
											$number_array = explode("��", $class3);
											$number1 = explode(",", $number_array[0]);
											$number_count1 = count($number1);
											$number2 = explode(",", $number_array[1]);
											$number_count2 = count($number2);
											for ($i = 0; $i < $number_count2; $i++) {
												for ($j = 0; $j < $number_count1; $j++) {
													$sum_count  = 0;
													$lmnum1 = $number2[$i];
													$lmnum2 = $number1[$j];
													if ($lmnum1 != $lmnum2) {
														if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($sum_count > 1) {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
															$zs1 = $zs1 + 1;
														}
													}
												}
											}
										}
										if ($image['lmlx'] == 2) {
											//����
											$sum_count  = 0;
											$number_array = explode("��", $class3);
											$number2 = explode(",", $number_array[0]);
											$number1 = explode(",", $number_array[1]);
											$number_count1 = count($number1) - 1;
											$lmnum1  = $number2[0];
											if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
												$sum_count = $sum_count + 1;
											}
											if ($sum_count > 0) {
												for ($k = 0; $k < $number_count1; $k++) {
													$lmnum2 = $number1[$k];
													if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
														$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
														$zs1 = $zs1 + 1;
													}
												}
											}
										}
										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='����' and class2='��ȫ��' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "��ȫ�н���ɹ�!!<br>";

									// ���������
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='����' and class2='������' and (" . $str22 . ")");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$zs2 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$class5     = str_replace("/", "|", $class5);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$rate2      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
												$rate2[$bl_temp[1]] = $bl_temp[3];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 1; $i++) {
												for ($j = $i + 1; $j < $number_count1; $j++) {
													$sum_count  = 0;
													$lmnum1 = $number1[$i];
													$lmnum2 = $number1[$j];
													if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
														$sum_count = $sum_count + 1;
													}
													if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
														$sum_count = $sum_count + 1;
													}
													if ($sum_count > 1) {
														$userwinsum   = $userwinsum + ($sum_sum * min($rate2[$lmnum1], $rate2[$lmnum2]));
														$zs2 = $zs2 + 1;
													} else {
														if ($sum_count > 0) {
															if ($lmnum1 == $na || $lmnum2 == $na) {
																$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
																$zs1 = $zs1 + 1;
															}
														}
													}
												}
											}
										}
										if ($image['lmlx'] == 1) {
											//����
											$number_array = explode("��", $class3);
											$number1 = explode(",", $number_array[0]);
											$number_count1 = count($number1);
											$number2 = explode(",", $number_array[1]);
											$number_count2 = count($number2);
											for ($i = 0; $i < $number_count2; $i++) {
												for ($j = 0; $j < $number_count1; $j++) {
													$sum_count  = 0;
													$lmnum1 = $number2[$i];
													$lmnum2 = $number1[$j];
													if ($lmnum1 != $lmnum2) {
														if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($sum_count > 1) {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate2[$lmnum1], $rate2[$lmnum2]));
															$zs2 = $zs2 + 1;
														} else {
															if ($sum_count > 0) {
																if ($lmnum1 == $na || $lmnum2 == $na) {
																	$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
																	$zs1 = $zs1 + 1;
																}
															}
														}
													}
												}
											}
										}
										if ($image['lmlx'] == 2) {
											//����
											$number_array = explode("��", $class3);
											$number2 = explode(",", $number_array[0]);
											$number1 = explode(",", $number_array[1]);
											$number_count1 = count($number1) - 1;
											$lmnum1  = $number2[0];
											for ($k = 0; $k < $number_count1; $k++) {
												$sum_count  = 0;
												$lmnum2 = $number1[$k];
												if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
													$sum_count = $sum_count + 1;
												}
												if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
													$sum_count = $sum_count + 1;
												}
												if ($sum_count > 1) {
													$userwinsum   = $userwinsum + ($sum_sum * min($rate2[$lmnum1], $rate2[$lmnum2]));
													$zs2 = $zs2 + 1;
												} else {
													if ($sum_count > 0) {
														if ($lmnum1 == $na || $lmnum2 == $na) {
															$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
															$zs1 = $zs1 + 1;
														}
													}
												}
											}
										}
										//�н�
										if ($zs1 + $zs2 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "+" . $zs2 . "' where  kithe=" . $kithe . " and class1='����' and class2='������' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "�����ؽ���ɹ�!!<br>";

									// �����ش�
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='����' and class2='�ش�' and (" . $str22 . ")");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 1; $i++) {
												for ($j = $i + 1; $j < $number_count1; $j++) {
													$sum_count  = 0;
													$lmnum1 = $number1[$i];
													$lmnum2 = $number1[$j];
													if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
														$sum_count = $sum_count + 1;
													}
													if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
														$sum_count = $sum_count + 1;
													}
													if ($sum_count > 0) {
														if ($lmnum1 == $na || $lmnum2 == $na) {
															$sum_count = $sum_count + 1;
															$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
															$zs1 = $zs1 + 1;
														}
													}
												}
											}
										}
										if ($image['lmlx'] == 1) {
											//����
											$number_array = explode("��", $class3);
											$number1 = explode(",", $number_array[0]);
											$number_count1 = count($number1);
											$number2 = explode(",", $number_array[1]);
											$number_count2 = count($number2);
											for ($i = 0; $i < $number_count2; $i++) {
												for ($j = 0; $j < $number_count1; $j++) {
													$sum_count  = 0;
													$lmnum1 = $number2[$i];
													$lmnum2 = $number1[$j];
													if ($lmnum1 != $lmnum2) {
														if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
															$sum_count = $sum_count + 1;
														}
														if ($sum_count > 0) {
															if ($lmnum1 == $na || $lmnum2 == $na) {
																$sum_count = $sum_count + 1;
																$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
																$zs1 = $zs1 + 1;
															}
														}
													}
												}
											}
										}
										if ($image['lmlx'] == 2) {
											//����
											$number_array = explode("��", $class3);
											$number2 = explode(",", $number_array[0]);
											$number1 = explode(",", $number_array[1]);
											$number_count1 = count($number1) - 1;
											$lmnum1  = $number2[0];
											for ($k = 0; $k < $number_count1; $k++) {
												$sum_count  = 0;
												$lmnum2 = $number1[$k];
												if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6) {
													$sum_count = $sum_count + 1;
												}
												if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6) {
													$sum_count = $sum_count + 1;
												}
												if ($sum_count > 0) {
													if ($lmnum1 == $na || $lmnum2 == $na) {
														$sum_count = $sum_count + 1;
														$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2]));
														$zs1 = $zs1 + 1;
													}
												}
											}
										}
										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='����' and class2='�ش�' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "�ش�����ɹ�!!<br>";

									// ��ѡ�����岻��
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='��ѡ����' and class2='�岻��' ");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 4; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 3; $j++) {
													for ($k = $j + 1; $k < $number_count1 - 2; $k++) {
														for ($l = $k + 1; $l < $number_count1 - 1; $l++) {
															for ($m = $l + 1; $m < $number_count1; $m++) {
																$sum_count  = 0;
																$lmnum1 = $number1[$i];
																$lmnum2 = $number1[$j];
																$lmnum3 = $number1[$k];
																$lmnum4 = $number1[$l];
																$lmnum5 = $number1[$m];
																if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6 || $lmnum1 == $na) {
																	$sum_count = $sum_count + 1;
																}
																if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6 || $lmnum2 == $na) {
																	$sum_count = $sum_count + 1;
																}
																if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6 || $lmnum3 == $na) {
																	$sum_count = $sum_count + 1;
																}
																if ($lmnum4 == $n1 || $lmnum4 == $n2 || $lmnum4 == $n3 || $lmnum4 == $n4 || $lmnum4 == $n5 || $lmnum4 == $n6 || $lmnum4 == $na) {
																	$sum_count = $sum_count + 1;
																}
																if ($lmnum5 == $n1 || $lmnum5 == $n2 || $lmnum5 == $n3 || $lmnum5 == $n4 || $lmnum5 == $n5 || $lmnum5 == $n6 || $lmnum5 == $na) {
																	$sum_count = $sum_count + 1;
																}
																if ($sum_count == 0) {
																	$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3], $rate1[$lmnum4], $rate1[$lmnum5]));
																	$zs1 = $zs1 + 1;
																}
															}
														}
													}
												}
											}
										}

										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='��ѡ����' and class2='�岻��' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									ob_flush();
									flush();
									echo "�岻�н���ɹ�!!<br>";

									// ��ѡ����������
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='��ѡ����' and class2='������' ");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 5; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 4; $j++) {
													for ($k = $j + 1; $k < $number_count1 - 3; $k++) {
														for ($l = $k + 1; $l < $number_count1 - 2; $l++) {
															for ($m = $l + 1; $m < $number_count1 - 1; $m++) {
																for ($n = $m + 1; $n < $number_count1; $n++) {
																	$sum_count  = 0;
																	$lmnum1 = $number1[$i];
																	$lmnum2 = $number1[$j];
																	$lmnum3 = $number1[$k];
																	$lmnum4 = $number1[$l];
																	$lmnum5 = $number1[$m];
																	$lmnum6 = $number1[$n];
																	if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6 || $lmnum1 == $na) {
																		$sum_count = $sum_count + 1;
																	}
																	if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6 || $lmnum2 == $na) {
																		$sum_count = $sum_count + 1;
																	}
																	if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6 || $lmnum3 == $na) {
																		$sum_count = $sum_count + 1;
																	}
																	if ($lmnum4 == $n1 || $lmnum4 == $n2 || $lmnum4 == $n3 || $lmnum4 == $n4 || $lmnum4 == $n5 || $lmnum4 == $n6 || $lmnum4 == $na) {
																		$sum_count = $sum_count + 1;
																	}
																	if ($lmnum5 == $n1 || $lmnum5 == $n2 || $lmnum5 == $n3 || $lmnum5 == $n4 || $lmnum5 == $n5 || $lmnum5 == $n6 || $lmnum5 == $na) {
																		$sum_count = $sum_count + 1;
																	}
																	if ($lmnum6 == $n1 || $lmnum6 == $n2 || $lmnum6 == $n3 || $lmnum6 == $n4 || $lmnum6 == $n5 || $lmnum6 == $n6 || $lmnum6 == $na) {
																		$sum_count = $sum_count + 1;
																	}
																	if ($sum_count == 0) {
																		$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3], $rate1[$lmnum4], $rate1[$lmnum5], $rate1[$lmnum6]));
																		$zs1 = $zs1 + 1;
																	}
																}
															}
														}
													}
												}
											}
										}

										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='��ѡ����' and class2='������' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "�����н���ɹ�!!<br>";

									// ��ѡ�����߲���
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='��ѡ����' and class2='�߲���' ");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 6; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 5; $j++) {
													for ($k = $j + 1; $k < $number_count1 - 4; $k++) {
														for ($l = $k + 1; $l < $number_count1 - 3; $l++) {
															for ($m = $l + 1; $m < $number_count1 - 2; $m++) {
																for ($n = $m + 1; $n < $number_count1 - 1; $n++) {
																	for ($o = $n + 1; $o < $number_count1; $o++) {
																		$sum_count  = 0;
																		$lmnum1 = $number1[$i];
																		$lmnum2 = $number1[$j];
																		$lmnum3 = $number1[$k];
																		$lmnum4 = $number1[$l];
																		$lmnum5 = $number1[$m];
																		$lmnum6 = $number1[$n];
																		$lmnum7 = $number1[$o];
																		if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6 || $lmnum1 == $na) {
																			$sum_count = $sum_count + 1;
																		}
																		if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6 || $lmnum2 == $na) {
																			$sum_count = $sum_count + 1;
																		}
																		if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6 || $lmnum3 == $na) {
																			$sum_count = $sum_count + 1;
																		}
																		if ($lmnum4 == $n1 || $lmnum4 == $n2 || $lmnum4 == $n3 || $lmnum4 == $n4 || $lmnum4 == $n5 || $lmnum4 == $n6 || $lmnum4 == $na) {
																			$sum_count = $sum_count + 1;
																		}
																		if ($lmnum5 == $n1 || $lmnum5 == $n2 || $lmnum5 == $n3 || $lmnum5 == $n4 || $lmnum5 == $n5 || $lmnum5 == $n6 || $lmnum5 == $na) {
																			$sum_count = $sum_count + 1;
																		}
																		if ($lmnum6 == $n1 || $lmnum6 == $n2 || $lmnum6 == $n3 || $lmnum6 == $n4 || $lmnum6 == $n5 || $lmnum6 == $n6 || $lmnum6 == $na) {
																			$sum_count = $sum_count + 1;
																		}
																		if ($lmnum7 == $n1 || $lmnum7 == $n2 || $lmnum7 == $n3 || $lmnum7 == $n4 || $lmnum7 == $n5 || $lmnum7 == $n6 || $lmnum7 == $na) {
																			$sum_count = $sum_count + 1;
																		}
																		if ($sum_count == 0) {
																			$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3], $rate1[$lmnum4], $rate1[$lmnum5], $rate1[$lmnum6], $rate1[$lmnum7]));
																			$zs1 = $zs1 + 1;
																		}
																	}
																}
															}
														}
													}
												}
											}
										}

										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='��ѡ����' and class2='�߲���' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "�߲��н���ɹ�!!<br>";
									// ��ѡ���а˲���
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='��ѡ����' and class2='�˲���' ");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 7; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 6; $j++) {
													for ($k = $j + 1; $k < $number_count1 - 5; $k++) {
														for ($l = $k + 1; $l < $number_count1 - 4; $l++) {
															for ($m = $l + 1; $m < $number_count1 - 3; $m++) {
																for ($n = $m + 1; $n < $number_count1 - 2; $n++) {
																	for ($o = $n + 1; $o < $number_count1 - 1; $o++) {
																		for ($p = $o + 1; $p < $number_count1; $p++) {
																			$sum_count  = 0;
																			$lmnum1 = $number1[$i];
																			$lmnum2 = $number1[$j];
																			$lmnum3 = $number1[$k];
																			$lmnum4 = $number1[$l];
																			$lmnum5 = $number1[$m];
																			$lmnum6 = $number1[$n];
																			$lmnum7 = $number1[$o];
																			$lmnum8 = $number1[$p];
																			if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6 || $lmnum1 == $na) {
																				$sum_count = $sum_count + 1;
																			}
																			if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6 || $lmnum2 == $na) {
																				$sum_count = $sum_count + 1;
																			}
																			if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6 || $lmnum3 == $na) {
																				$sum_count = $sum_count + 1;
																			}
																			if ($lmnum4 == $n1 || $lmnum4 == $n2 || $lmnum4 == $n3 || $lmnum4 == $n4 || $lmnum4 == $n5 || $lmnum4 == $n6 || $lmnum4 == $na) {
																				$sum_count = $sum_count + 1;
																			}
																			if ($lmnum5 == $n1 || $lmnum5 == $n2 || $lmnum5 == $n3 || $lmnum5 == $n4 || $lmnum5 == $n5 || $lmnum5 == $n6 || $lmnum5 == $na) {
																				$sum_count = $sum_count + 1;
																			}
																			if ($lmnum6 == $n1 || $lmnum6 == $n2 || $lmnum6 == $n3 || $lmnum6 == $n4 || $lmnum6 == $n5 || $lmnum6 == $n6 || $lmnum6 == $na) {
																				$sum_count = $sum_count + 1;
																			}
																			if ($lmnum7 == $n1 || $lmnum7 == $n2 || $lmnum7 == $n3 || $lmnum7 == $n4 || $lmnum7 == $n5 || $lmnum7 == $n6 || $lmnum7 == $na) {
																				$sum_count = $sum_count + 1;
																			}
																			if ($lmnum8 == $n1 || $lmnum8 == $n2 || $lmnum8 == $n3 || $lmnum8 == $n4 || $lmnum8 == $n5 || $lmnum8 == $n6 || $lmnum8 == $na) {
																				$sum_count = $sum_count + 1;
																			}
																			if ($sum_count == 0) {
																				$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3], $rate1[$lmnum4], $rate1[$lmnum5], $rate1[$lmnum6], $rate1[$lmnum7], $rate1[$lmnum8]));
																				$zs1 = $zs1 + 1;
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}

										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='��ѡ����' and class2='�˲���' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "�˲��н���ɹ�!!<br>";
									// ��ѡ���оŲ���
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='��ѡ����' and class2='�Ų���' ");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 8; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 7; $j++) {
													for ($k = $j + 1; $k < $number_count1 - 6; $k++) {
														for ($l = $k + 1; $l < $number_count1 - 5; $l++) {
															for ($m = $l + 1; $m < $number_count1 - 4; $m++) {
																for ($n = $m + 1; $n < $number_count1 - 3; $n++) {
																	for ($o = $n + 1; $o < $number_count1 - 2; $o++) {
																		for ($p = $o + 1; $p < $number_count1 - 1; $p++) {
																			for ($q = $p + 1; $q < $number_count1; $q++) {
																				$sum_count  = 0;
																				$lmnum1 = $number1[$i];
																				$lmnum2 = $number1[$j];
																				$lmnum3 = $number1[$k];
																				$lmnum4 = $number1[$l];
																				$lmnum5 = $number1[$m];
																				$lmnum6 = $number1[$n];
																				$lmnum7 = $number1[$o];
																				$lmnum8 = $number1[$p];
																				$lmnum9 = $number1[$q];
																				if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6 || $lmnum1 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6 || $lmnum2 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6 || $lmnum3 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($lmnum4 == $n1 || $lmnum4 == $n2 || $lmnum4 == $n3 || $lmnum4 == $n4 || $lmnum4 == $n5 || $lmnum4 == $n6 || $lmnum4 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($lmnum5 == $n1 || $lmnum5 == $n2 || $lmnum5 == $n3 || $lmnum5 == $n4 || $lmnum5 == $n5 || $lmnum5 == $n6 || $lmnum5 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($lmnum6 == $n1 || $lmnum6 == $n2 || $lmnum6 == $n3 || $lmnum6 == $n4 || $lmnum6 == $n5 || $lmnum6 == $n6 || $lmnum6 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($lmnum7 == $n1 || $lmnum7 == $n2 || $lmnum7 == $n3 || $lmnum7 == $n4 || $lmnum7 == $n5 || $lmnum7 == $n6 || $lmnum7 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($lmnum8 == $n1 || $lmnum8 == $n2 || $lmnum8 == $n3 || $lmnum8 == $n4 || $lmnum8 == $n5 || $lmnum8 == $n6 || $lmnum8 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($lmnum9 == $n1 || $lmnum9 == $n2 || $lmnum9 == $n3 || $lmnum9 == $n4 || $lmnum9 == $n5 || $lmnum9 == $n6 || $lmnum9 == $na) {
																					$sum_count = $sum_count + 1;
																				}
																				if ($sum_count == 0) {
																					$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3], $rate1[$lmnum4], $rate1[$lmnum5], $rate1[$lmnum6], $rate1[$lmnum7], $rate1[$lmnum8], $rate1[$lmnum9]));
																					$zs1 = $zs1 + 1;
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}

										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='��ѡ����' and class2='�Ų���' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "�Ų��н���ɹ�!!<br>";
									// ��ѡ����ʮ����
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='��ѡ����' and class2='ʮ����' ");
									while ($image = $result->fetch_array()) {
										$userwinsum = 0;
										$zs1 = 0;
										$sum_sum    = $image['sum_sum'];
										$num        = $image['num'];
										$class3     = $image['class3'];
										$class5     = str_replace("@", "", $image['class5']);
										$bl_array   = explode("#", $class5);
										$bl_count   = count($bl_array) - 1;
										$rate1      = array();
										$bl_temp    = array();
										for ($r = 0; $r < $bl_count; $r++) {
											if ($bl_array[$r] != "") {
												$bl_temp = explode("|", $bl_array[$r]);
												$rate1[$bl_temp[1]] = $bl_temp[2];
											}
										}
										if ($image['lmlx'] == 0) {
											//��ע����ʽ
											$number1 = explode(",", $class3);
											$number_count1 = count($number1) - 1;
											for ($i = 0; $i < $number_count1 - 9; $i++) {
												for ($j = $i + 1; $j < $number_count1 - 8; $j++) {
													for ($k = $j + 1; $k < $number_count1 - 7; $k++) {
														for ($l = $k + 1; $l < $number_count1 - 6; $l++) {
															for ($m = $l + 1; $m < $number_count1 - 5; $m++) {
																for ($n = $m + 1; $n < $number_count1 - 4; $n++) {
																	for ($o = $n + 1; $o < $number_count1 - 3; $o++) {
																		for ($p = $o + 1; $p < $number_count1 - 2; $p++) {
																			for ($q = $p + 1; $q < $number_count1 - 1; $q++) {
																				for ($r = $q + 1; $r < $number_count1; $r++) {
																					$sum_count  = 0;
																					$lmnum1 = $number1[$i];
																					$lmnum2 = $number1[$j];
																					$lmnum3 = $number1[$k];
																					$lmnum4 = $number1[$l];
																					$lmnum5 = $number1[$m];
																					$lmnum6 = $number1[$n];
																					$lmnum7 = $number1[$o];
																					$lmnum8 = $number1[$p];
																					$lmnum9 = $number1[$q];
																					$lmnum10 = $number1[$r];
																					if ($lmnum1 == $n1 || $lmnum1 == $n2 || $lmnum1 == $n3 || $lmnum1 == $n4 || $lmnum1 == $n5 || $lmnum1 == $n6 || $lmnum1 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum2 == $n1 || $lmnum2 == $n2 || $lmnum2 == $n3 || $lmnum2 == $n4 || $lmnum2 == $n5 || $lmnum2 == $n6 || $lmnum2 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum3 == $n1 || $lmnum3 == $n2 || $lmnum3 == $n3 || $lmnum3 == $n4 || $lmnum3 == $n5 || $lmnum3 == $n6 || $lmnum3 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum4 == $n1 || $lmnum4 == $n2 || $lmnum4 == $n3 || $lmnum4 == $n4 || $lmnum4 == $n5 || $lmnum4 == $n6 || $lmnum4 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum5 == $n1 || $lmnum5 == $n2 || $lmnum5 == $n3 || $lmnum5 == $n4 || $lmnum5 == $n5 || $lmnum5 == $n6 || $lmnum5 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum6 == $n1 || $lmnum6 == $n2 || $lmnum6 == $n3 || $lmnum6 == $n4 || $lmnum6 == $n5 || $lmnum6 == $n6 || $lmnum6 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum7 == $n1 || $lmnum7 == $n2 || $lmnum7 == $n3 || $lmnum7 == $n4 || $lmnum7 == $n5 || $lmnum7 == $n6 || $lmnum7 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum8 == $n1 || $lmnum8 == $n2 || $lmnum8 == $n3 || $lmnum8 == $n4 || $lmnum8 == $n5 || $lmnum8 == $n6 || $lmnum8 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum9 == $n1 || $lmnum9 == $n2 || $lmnum9 == $n3 || $lmnum9 == $n4 || $lmnum9 == $n5 || $lmnum9 == $n6 || $lmnum9 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($lmnum10 == $n1 || $lmnum10 == $n2 || $lmnum10 == $n3 || $lmnum10 == $n4 || $lmnum10 == $n5 || $lmnum10 == $n6 || $lmnum10 == $na) {
																						$sum_count = $sum_count + 1;
																					}
																					if ($sum_count == 0) {
																						$userwinsum   = $userwinsum + ($sum_sum * min($rate1[$lmnum1], $rate1[$lmnum2], $rate1[$lmnum3], $rate1[$lmnum4], $rate1[$lmnum5], $rate1[$lmnum6], $rate1[$lmnum7], $rate1[$lmnum8], $rate1[$lmnum9], $rate1[$lmnum10]));
																						$zs1 = $zs1 + 1;
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}

										//�н�
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='��ѡ����' and class2='ʮ����' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "ʮ���н���ɹ�!!<br>";



									// ����һ
									// ����һ
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='����һ' and class2='����һ' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1) {
												$number5++;
											} elseif ($numberxz[$i] == $n2) {
												$number5++;
											} elseif ($numberxz[$i] == $n3) {
												$number5++;
											} elseif ($numberxz[$i] == $n4) {
												$number5++;
											} elseif ($numberxz[$i] == $n5) {
												$number5++;
											} elseif ($numberxz[$i] == $n6) {
												$number5++;
											} elseif ($numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����һ' and class2='����һ' and class3='" . $class3 . "'");
										}
									}

									echo "����һ����ɹ�!!<br>";
									// ����һ
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='����һ' and class2='����һ' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1) {
												$number5++;
											} elseif ($numberxz[$i] == $n2) {
												$number5++;
											} elseif ($numberxz[$i] == $n3) {
												$number5++;
											} elseif ($numberxz[$i] == $n4) {
												$number5++;
											} elseif ($numberxz[$i] == $n5) {
												$number5++;
											} elseif ($numberxz[$i] == $n6) {
												$number5++;
											} elseif ($numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����һ' and class2='����һ' and class3='" . $class3 . "'");
										}
									}

									echo "����һ����ɹ�!!<br>";
									// ����һ
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='����һ' and class2='����һ' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1) {
												$number5++;
											} elseif ($numberxz[$i] == $n2) {
												$number5++;
											} elseif ($numberxz[$i] == $n3) {
												$number5++;
											} elseif ($numberxz[$i] == $n4) {
												$number5++;
											} elseif ($numberxz[$i] == $n5) {
												$number5++;
											} elseif ($numberxz[$i] == $n6) {
												$number5++;
											} elseif ($numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����һ' and class2='����һ' and class3='" . $class3 . "'");
										}
									}

									echo "����һ����ɹ�!!<br>";
									// ����һ
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='����һ' and class2='����һ' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1) {
												$number5++;
											} elseif ($numberxz[$i] == $n2) {
												$number5++;
											} elseif ($numberxz[$i] == $n3) {
												$number5++;
											} elseif ($numberxz[$i] == $n4) {
												$number5++;
											} elseif ($numberxz[$i] == $n5) {
												$number5++;
											} elseif ($numberxz[$i] == $n6) {
												$number5++;
											} elseif ($numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����һ' and class2='����һ' and class3='" . $class3 . "'");
										}
									}

									echo "����һ����ɹ�!!<br>";
									// ����һ
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='����һ' and class2='����һ' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1) {
												$number5++;
											} elseif ($numberxz[$i] == $n2) {
												$number5++;
											} elseif ($numberxz[$i] == $n3) {
												$number5++;
											} elseif ($numberxz[$i] == $n4) {
												$number5++;
											} elseif ($numberxz[$i] == $n5) {
												$number5++;
											} elseif ($numberxz[$i] == $n6) {
												$number5++;
											} elseif ($numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����һ' and class2='����һ' and class3='" . $class3 . "'");
										}
									}

									echo "����һ����ɹ�!!<br>";
									// ����һ
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='����һ' and class2='����һ' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1) {
												$number5++;
											} elseif ($numberxz[$i] == $n2) {
												$number5++;
											} elseif ($numberxz[$i] == $n3) {
												$number5++;
											} elseif ($numberxz[$i] == $n4) {
												$number5++;
											} elseif ($numberxz[$i] == $n5) {
												$number5++;
											} elseif ($numberxz[$i] == $n6) {
												$number5++;
											} elseif ($numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����һ' and class2='����һ' and class3='" . $class3 . "'");
										}
									}

									echo "����һ����ɹ�!!<br>";
									// ʮ��һ
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='����һ' and class2='ʮ��һ' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1) {
												$number5++;
											} elseif ($numberxz[$i] == $n2) {
												$number5++;
											} elseif ($numberxz[$i] == $n3) {
												$number5++;
											} elseif ($numberxz[$i] == $n4) {
												$number5++;
											} elseif ($numberxz[$i] == $n5) {
												$number5++;
											} elseif ($numberxz[$i] == $n6) {
												$number5++;
											} elseif ($numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='����һ' and class2='ʮ��һ' and class3='" . $class3 . "'");
										}
									}
									echo "ʮ��һ����ɹ�!!<br>";


									// ������
									// һ������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='������' and class2='һ������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1 || $numberxz[$i] == $n2 || $numberxz[$i] == $n3 || $numberxz[$i] == $n4 || $numberxz[$i] == $n5 || $numberxz[$i] == $n6 || $numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='������' and class2='һ������' and class3='" . $class3 . "'");
										}
									}
									echo "һ�����н���ɹ�!!<br>";
									// ��������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='������' and class2='��������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1 || $numberxz[$i] == $n2 || $numberxz[$i] == $n3 || $numberxz[$i] == $n4 || $numberxz[$i] == $n5 || $numberxz[$i] == $n6 || $numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='������' and class2='��������' and class3='" . $class3 . "'");
										}
									}
									echo "�������н���ɹ�!!<br>";
									// ��������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='������' and class2='��������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1 || $numberxz[$i] == $n2 || $numberxz[$i] == $n3 || $numberxz[$i] == $n4 || $numberxz[$i] == $n5 || $numberxz[$i] == $n6 || $numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='������' and class2='��������' and class3='" . $class3 . "'");
										}
									}
									echo "�������н���ɹ�!!<br>";
									// ��������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='������' and class2='��������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1 || $numberxz[$i] == $n2 || $numberxz[$i] == $n3 || $numberxz[$i] == $n4 || $numberxz[$i] == $n5 || $numberxz[$i] == $n6 || $numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='������' and class2='��������' and class3='" . $class3 . "'");
										}
									}
									echo "�������н���ɹ�!!<br>";
									// ��������
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='������' and class2='��������' and kithe='" . $kithe . "'");
									while ($image = $result->fetch_array()) {
										$number5 = 0;
										$class3 = $image['class3'];
										$numberxz = explode(",", $class3);
										$ss1 = count($numberxz) - 2;
										for ($i = 0; $i <= $ss1; $i++) {
											if ($numberxz[$i] == $n1 || $numberxz[$i] == $n2 || $numberxz[$i] == $n3 || $numberxz[$i] == $n4 || $numberxz[$i] == $n5 || $numberxz[$i] == $n6 || $numberxz[$i] == $na) {
												$number5++;
											}
										}
										if ($number5 >= 1) {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='������' and class2='��������' and class3='" . $class3 . "'");
										}
									}
									echo "�������н���ɹ�!!<br>";





									ob_flush();
									flush();

									if ($kf == 1) {
										$vvv = "visible=1,";
									} else {
										$vvv = "";
									}
									//BM=0���  
									$strSQL = "update web_tans set " . $vvv;
									$strSQL .= "user_sq=sum_m*Abs(user_ds)/100,user_sf=user_sq-sum_m,";
									$strSQL .= "dai_sq=Abs(dai_ds-user_ds)/100*(sum_m-daizc),dai_sf=dai_sq+daizc-daizc*user_ds/100,";
									$strSQL .= "zong_sq=Abs(zong_ds-dai_ds)/100*(sum_m-zongzc-daizc),zong_sf=zong_sq+zongzc-zongzc*dai_ds/100,";
									$strSQL .= "guan_sq=Abs(guan_ds-zong_ds)/100*(gszc+daguzc),guan_sf=guan_sq+guanzc-guanzc*zong_ds/100,";
									$strSQL .= "dagu_sq=Abs(dagu_ds-guan_ds)/100*gszc,dagu_sf=dagu_sq+daguzc-daguzc*guan_ds/100,";
									$strSQL .= "gs_sf=gszc-gszc*dagu_ds/100";
									$strSQL .= " where kithe='" . $kithe . "' and bm=0 and qx=0";
									$db1->query($strSQL);
									//BM=1Ӯ��
									$strSQL = "update web_tans set " . $vvv;
									$strSQL .= "user_sq=sum_m*Abs(user_ds)/100,user_sf=user_sq+sum_m*rate-sum_m,";
									$strSQL .= "dai_sq=Abs(dai_ds-user_ds)/100*(sum_m-daizc),dai_sf=dai_sq+daizc-rate*daizc-user_ds/100*daizc,";
									$strSQL .= "zong_sq=Abs(zong_ds-dai_ds)/100*(sum_m-zongzc-daizc),zong_sf=zong_sq+zongzc-rate*zongzc-dai_ds/100*zongzc,";
									$strSQL .= "guan_sq=Abs(guan_ds-zong_ds)/100*(gszc+daguzc),guan_sf=guan_sq+guanzc-rate*guanzc-zong_ds/100*(guanzc),";
									$strSQL .= "dagu_sq=Abs(dagu_ds-guan_ds)/100*gszc,dagu_sf=dagu_sq+daguzc-rate*daguzc-guan_ds/100*daguzc,";
									$strSQL .= "gs_sf=gszc-rate*gszc-dagu_ds/100*gszc";
									$strSQL .= " where kithe='" . $kithe . "' and bm=1 and qx=0";
									$db1->query($strSQL);
									//BM=2��͸���Ч��
									$strSQL = "update web_tans set " . $vvv . "user_sq=0,user_sf=0,dai_sq=0,dai_sf=0,zong_sq=0,zong_sf=0,guan_sq=0,guan_sf=0,dagu_sq=0,dagu_sf=0,gs_sf=0 where kithe='" . $kithe . "' and (bm=2 or qx=1) ";
									$db1->query($strSQL);
									if ($kf == 1) {
										$sql = "update web_kithe set lx=1 where nn='" . $kithe . "'";
										$db1->query($sql) or die("���ݿ��޸ĳ���");
									}
									//���±���ʱ��
									set_config("report_time", $utime);
								}
								echo "<font color=ff0000>��" . $kithe . "�ڽ���ɹ�</font>&nbsp;&nbsp;";
								$time = $time->Rendtime();
								echo  'ҳ��ִ��' . "$time" . ' ��';
								ob_end_flush();
								?>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td height="25" align="center"><a href="main.php?action=web_kithe_list&uid=<?= $uid ?>"><b>������ʷ�̿ڹ���</b></a>&nbsp;&nbsp;<a href="main.php?action=report&uid=<?= $uid ?>"><b>���뱨���ѯ</b></a></td>
						</tr>
					</table>
				</Td>
			</tr>

		</tbody>
	</table>

	<script language="javascript">
		$("LoadProcess").style.visibility = "hidden";
	</script>
</body>