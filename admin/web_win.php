<?php
ob_start();
if (!defined('KK_VER')) {
	exit('无效的访问');
}

if (strpos($flag, '01')) {
} else {
	echo "<center>你没有该权限功能!</center>";
	exit;
}
class   RunTime
{
	//以下是页面执行开始时间函数
	function   Rstartime()
	{
		$nowtime   =   explode(" ", microtime());
		$starttime   =   $nowtime[1]   +   $nowtime[0];
		return   $starttime;
	}
	//以下是页面执行结束时间函数
	function   Rendtime()
	{
		global   $starttime;
		$nowtime   =   explode(" ",   microtime());
		$endtime   =   $nowtime[1]   +   $nowtime[0];
		$totaltime   =   ($endtime   -   $starttime); //计算执行时间
		return   number_format($totaltime, 6); //格式化执行时间小数点后6位
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
	//不用到特码的
	$str11  = "class5 LIKE '%|" . $n1 . "|%' or class5 LIKE '%|" . $n2 . "|%' or class5 LIKE '%|" . $n3 . "|%' or class5 LIKE '%|" . $n4 . "|%' or class5 LIKE '%|" . $n5 . "|%' or class5 LIKE '%|" . $n6 . "|%'";
	//用到特码的
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
	$sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $kithe . "',kauser='" . $jxadmin . "',lx=3,text1='盘口管理',text2='结算',ip='" . $userip . "'";
	$db1->query($sql);
} else {
	echo "<script>alert('期数不能为空，请返回后重新选择!'); window.location.href = 'main.php?action=web_kithe_list&uid=$uid';</script>";
	exit;
}
?>
<script src="js/function.js" type="text/javascript"></script>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">

<body style="min-width: 1200px;width: 100%">
	<div id="tit" class="tit">
		<div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
		<div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;结算</span></div>
		<div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
		<div class="biaoti_right floatright"></div>
	</div>
	<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
		<tbody>
			<tr>
				<td class="t_list_caption" align="center">
					<font color="#CC0000">结算－第<?= $kithe ?>期开奖结算
					</font>
				</td>
			</tr>
			<tr>
				<td align="center" valign="middle" bgcolor="#FFFFFF"> <img src="images/control/login.gif" width="64" height="64" /><br><br>正在结算<font color="#CC0000">
						<?= $kithe ?>
					</font>期数据,请稍候... </td>

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
									//初始化
									$db1->query("update web_tans set bm=0,win='0' where kithe=" . $kithe . " ");
									// 结算特码
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='特码' and class3='" . $na . "'");
									// 特码单双
									if ($na % 2 == 1) {
										$class3 = "特单";
										$class31 = "特双";
									} else {
										$class31 = "特单";
										$class3 = "特双";
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='特码' and (class3='特单' or class3='特双') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='特码' and class3='" . $class3 . "'");
									}
									// 特码尾大尾小
									$mmms = $na % 10;
									if ($mmms >= 5) {
										$class3 = "尾大";
										$class31 = "尾小";
									} else {
										$class31 = "尾大";
										$class3 = "尾小";
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='特码'  and (class3='尾大' or class3='尾小') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='特码' and class3='" . $class3 . "'");
									}
									// 特码大小
									if ($na >= 25) {
										$class3 = "特大";
										$class31 = "特小";
									} else {
										$class31 = "特大";
										$class3 = "特小";
									}

									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='特码' and (class3='特大' or class3='特小') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='特码' and class3='" . $class3 . "'");
									}
									// 合单合双
									if ((($na % 10) + intval($na / 10)) % 2 == 0) {
										$class3 = "合双";
										$class31 = "合单";
									} else {
										$class31 = "合双";
										$class3 = "合单";
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='特码' and (class3='合单' or class3='合双') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='特码' and class3='" . $class3 . "'");
									}
									// 合单大小
									if (($na % 10 + intval($na) / 10) >= 7) {
										$class3 = "合大";
										$class31 = "合小";
									} else {
										$class31 = "合大";
										$class3 = "合小";
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='特码' and (class3='合大' or class3='合小') ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='特码' and class3='" . $class3 . "'");
									}
									// 结算特码波色
									$class3 = get_bs_name($na);
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='特码' and class3='" . $class3 . "'");

									echo "特码结算成功!!<br>";

									// 结算正特、硬特
									for ($i = 1; $i <= 6; $i++) {
										if ($i == 1) {
											$class2  = "正1特";
											$class22 = "正码1";
											$tmtm = $n1;
										}
										if ($i == 2) {
											$class2  = "正2特";
											$class22 = "正码2";
											$tmtm = $n2;
										}
										if ($i == 3) {
											$class2  = "正3特";
											$class22 = "正码3";
											$tmtm = $n3;
										}
										if ($i == 4) {
											$class2  = "正4特";
											$class22 = "正码4";
											$tmtm = $n4;
										}
										if ($i == 5) {
											$class2  = "正5特";
											$class22 = "正码5";
											$tmtm = $n5;
										}
										if ($i == 6) {
											$class2  = "正6特";
											$class22 = "正码6";
											$tmtm = $n6;
										}
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='正特' and class2='" . $class2 . "' and class3='" . $tmtm . "'");
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='硬特' and class2='硬特' and class3='特:" . $na . ",正:" . $tmtm . ",'");

										// 正特单双
										if ($tmtm % 2 == 1) {
											$class3 = "单";
											$class31 = "双";
										} else {
											$class31 = "单";
											$class3 = "双";
										}
										if ($tmtm == 49) {
											$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and (class3='单' or class3='双') ");
										} else {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
										}
										// 正特大小
										if ($tmtm >= 25) {
											$class3 = "大";
											$class31 = "小";
										} else {
											$class31 = "大";
											$class3 = "小";
										}
										if ($tmtm == 49) {
											$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and (class3='大' or class3='小') ");
										} else {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
										}
										// 正特合单合双
										if ((($tmtm % 10) + intval($tmtm / 10)) % 2 == 0) {
											$class3 = "合双";
											$class31 = "合单";
										} else {
											$class31 = "合双";
											$class3 = "合单";
										}
										if ($tmtm == 49) {
											$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and (class3='合单' or class3='合双') ");
										} else {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
										}
										// 正特合大合小
										if (($tmtm % 10 + intval($tmtm) / 10) >= 7) {
											$class3 = "合大";
											$class31 = "合小";
										} else {
											$class31 = "合大";
											$class3 = "合小";
										}
										if ($tmtm == 49) {
											$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and (class3='合大' or class3='合小') ");
										} else {
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
										}
										// 结算正特波色
										$class3 = get_bs_name($tmtm);
										$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and  (class3='红波' or class3='蓝波' or class3='绿波') ");
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='正码1-6' and class2='" . $class22 . "' and class3='" . $class3 . "'");
									}

									echo "正特、正码1-6结算成功!!<br>";

									// 正码
									$class2 = "正码";
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='正码' and  (class3='" . $n1 . "' or class3='" . $n2 . "'  or class3='" . $n3 . "' or class3='" . $n4 . "'  or class3='" . $n5 . "'  or class3='" . $n6 . "') ");
									$sum_number = $n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $na;
									$class2 = "总分";
									if ($sum_number % 2 == 1) {
										$class3 = "总单";
										$class31 = "总双";
									} else {
										$class31 = "总单";
										$class3 = "总双";
									}
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='总分'  and class3='" . $class3 . "'");
									if ($sum_number <= 174) {
										$class3 = "总小";
										$class31 = "总大";
									} else {
										$class31 = "总小";
										$class3 = "总大";
									}
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='总分'  and class3='" . $class3 . "'");

									echo "正码结算成功!!<br>";
									ob_flush();
									flush();
									// 过关
									$result55 = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='过关' and Kithe='" . $kithe . "'");
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
											if ($class22[$i] == "正码1") {
												$tmtm = $n1;
											}
											if ($class22[$i] == "正码2") {
												$tmtm = $n2;
											}
											if ($class22[$i] == "正码3") {
												$tmtm = $n3;
											}
											if ($class22[$i] == "正码4") {
												$tmtm = $n4;
											}
											if ($class22[$i] == "正码5") {
												$tmtm = $n5;
											}
											if ($class22[$i] == "正码6") {
												$tmtm = $n6;
											}
											$result = 0;
											switch ($class33[$k]) {
												case "大":

													if ($tmtm >= 25) {
														$result = 1;
													}
													break;
												case "小":
													if ($tmtm < 25) {
														$result = 1;
													}
													break;
												case "单":
													if ($tmtm % 2 == 1) {
														$result = 1;
													}
													break;
												case "双":
													if ($tmtm % 2 == 0) {
														$result = 1;
													}
													break;
												case "红波":
													if (get_bs_name($tmtm) == "红波") {
														$result = 1;
													}
													break;
												case "蓝波":
													if (get_bs_name($tmtm) == "蓝波") {
														$result = 1;
													}

													break;
												case "绿波":
													if (get_bs_name($tmtm) == "绿波") {
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='过关' and class2='" . $class2 . "' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='过关' and class2='".$class2."' and class3='" . $class3 . "'");
										}
									}
									echo "过关结算成功!!<br>";

									//半波
									$class2 = "半波";
									$class3 = get_bs_name($na);
									if ($class3 == "红波") {
										if ($na >= 25) {
											$class31 = "红大";
										} else {
											$class31 = "红小";
										}
										if ($na % 2 == 1) {
											$class32 = "红单";
										} else {
											$class32 = "红双";
										}
										if (($na % 10 + intval($na / 10)) % 2 == 1) {
											$class33 = "红合单";
										} else {
											$class33 = "红合双";
										}
									}
									if ($class3 == "绿波") {
										if ($na >= 25) {
											$class31 = "绿大";
										} else {
											$class31 = "绿小";
										}
										if ($na % 2 == 1) {
											$class32 = "绿单";
										} else {
											$class32 = "绿双";
										}
										if (($na % 10 + intval($na / 10)) % 2 == 1) {
											$class33 = "绿合单";
										} else {
											$class33 = "绿合双";
										}
									}
									if ($class3 == "蓝波") {
										if ($na >= 25) {
											$class31 = "蓝大";
										} else {
											$class31 = "蓝小";
										}
										if ($na % 2 == 1) {
											$class32 = "蓝单";
										} else {
											$class32 = "蓝双";
										}
										if (($na % 10 + intval($na / 10)) % 2 == 1) {
											$class33 = "蓝合单";
										} else {
											$class33 = "蓝合双";
										}
									}
									if ($na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='半波' and class2='" . $class2 . "' ");
									} else {
										$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='半波' and class2='" . $class2 . "' and (class3='" . $class33 . "' or class3='" . $class31 . "' or class3='" . $class32 . "') ");
									}

									echo "半波结算成功!!<br>";

									// 结算特肖
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖' and class2='特肖' and class3='" . $sxsx0 . "'");

									echo "特肖结算成功!!<br>";

									// 结算六肖
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖' and class2='六肖' and class3 LIKE '%$sxsx0%' ");
									if ($sx49 == 0 && $na == 49) {
										$db1->query("update web_tans set bm=2 where kithe=" . $kithe . " and class1='生肖' and class2='六肖' ");
									}

									echo "六肖结算成功!!<br>";

									// 结算一肖
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖' and class2='一肖' and (class3='" . $sxsx0 . "' or class3='" . $sxsx1 . "' or class3='" . $sxsx2 . "' or class3='" . $sxsx3 . "' or class3='" . $sxsx4 . "' or class3='" . $sxsx5 . "' or class3='" . $sxsx6 . "'  )");

									echo "一肖结算成功!!<br>";
									// 结算一肖不中
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖' and class2='一肖不中' and (class3<>'" . $sxsx0 . "' and class3<>'" . $sxsx1 . "' and class3<>'" . $sxsx2 . "' and class3<>'" . $sxsx3 . "' and class3<>'" . $sxsx4 . "' and class3<>'" . $sxsx5 . "' and class3<>'" . $sxsx6 . "'  )");

									echo "一肖不中结算成功!!<br>";



									// 结算尾数
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='尾数' and class2='尾数' and (class3='" . $wsws0 . "' or class3='" . $wsws1 . "' or class3='" . $wsws2 . "' or class3='" . $wsws3 . "' or class3='" . $wsws4 . "' or class3='" . $wsws5 . "' or class3='" . $wsws6 . "'  )");
									// 结算尾数不中
									$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='尾数' and class2='尾数不中' and (class3<>'" . $wsws0 . "' and class3<>'" . $wsws1 . "' and class3<>'" . $wsws2 . "' and class3<>'" . $wsws3 . "' and class3<>'" . $wsws4 . "' and class3<>'" . $wsws5 . "' and class3<>'" . $wsws6 . "'  )");

									echo "尾数不中结算成功!!<br>";

									// 结算二肖连中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='生肖连' and class2='二肖连中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖连' and class2='二肖连中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='生肖连' and class2='二肖连中' and class3='" . $class3 . "'");
										}
									}

									echo "二肖连中结算成功!!<br>";

									// 结算二肖连不中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='生肖连' and class2='二肖连不中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖连' and class2='二肖连不中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='生肖连' and class2='二肖连不中' and class3='" . $class3 . "'");
										}
									}

									echo "二肖连不中结算成功!!<br>";

									// 结算三肖连中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='生肖连' and class2='三肖连中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖连' and class2='三肖连中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='生肖连' and class2='三肖连中' and class3='" . $class3 . "'");
										}
									}

									echo "三肖连中结算成功!!<br>";

									// 结算三肖连中不中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='生肖连' and class2='三肖连不中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖连' and class2='三肖连不中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='生肖连' and class2='三肖连不中' and class3='" . $class3 . "'");
										}
									}

									echo "三肖连不中结算成功!!<br>";

									// 结算四肖连中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='生肖连' and class2='四肖连中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖连' and class2='四肖连中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='生肖连' and class2='四肖连中' and class3='" . $class3 . "'");
										}
									}

									echo "四肖连中结算成功!!<br>";

									// 结算四肖连不中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='生肖连' and class2='四肖连不中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖连' and class2='四肖连不中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='生肖连' and class2='四肖连不中' and class3='" . $class3 . "'");
										}
									}

									echo "四肖连不中结算成功!!<br>";
									// 结算五肖连中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='生肖连' and class2='五肖连中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖连' and class2='五肖连中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='生肖连' and class2='四肖连中' and class3='" . $class3 . "'");
										}
									}

									echo "五肖连中结算成功!!<br>";

									// 结算五肖连不中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='生肖连' and class2='五肖连不中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='生肖连' and class2='五肖连不中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='生肖连' and class2='四肖连不中' and class3='" . $class3 . "'");
										}
									}

									echo "五肖连不中结算成功!!<br>";

									// 二尾连中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='尾数连' and class2='二尾连中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='尾数连' and class2='二尾连中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='尾数连' and class2='二尾连中' and class3='" . $class3 . "'");
										}
									}

									echo "二尾连中结算成功!!<br>";

									// 二尾连不中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='尾数连' and class2='二尾连不中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='尾数连' and class2='二尾连不中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='尾数连' and class2='二尾连不中' and class3='" . $class3 . "'");
										}
									}

									echo "二尾连不中结算成功!!<br>";

									// 三尾连中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='尾数连' and class2='三尾连中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='尾数连' and class2='三尾连中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='尾数连' and class2='三尾连中' and class3='" . $class3 . "'");
										}
									}

									echo "三尾连中结算成功!!<br>";

									// 三尾连不中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='尾数连' and class2='三尾连不中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='尾数连' and class2='三尾连不中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='尾数连' and class2='三尾连不中' and class3='" . $class3 . "'");
										}
									}

									echo "三尾连不中结算成功!!<br>";

									// 四尾连中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='尾数连' and class2='四尾连中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='尾数连' and class2='四尾连中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='尾数连' and class2='四尾连中' and class3='" . $class3 . "'");
										}
									}

									echo "四尾连中结算成功!!<br>";

									// 四尾连不中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='尾数连' and class2='四尾连不中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='尾数连' and class2='四尾连不中' and class3='" . $class3 . "'");
										} else {
											//$db1->query("update web_tans set bm=0 where kithe=" . $kithe . " and class1='尾数连' and class2='四尾连不中' and class3='" . $class3 . "'");
										}
									}

									echo "四尾连不中结算成功!!<br>";
									ob_flush();
									flush();
									// 连码
									// 连码四全中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='连码' and class2='四全中' and (" . $str11 . ")");
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
											//单注、复式
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
										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='连码' and class2='四全中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "四全中结算成功!!<br>";
									// 连码三全中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='连码' and class2='三全中' and (" . $str11 . ")");
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
											//单注、复式
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
											//胆拖
											$number_array = explode("拖", $class3);
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
										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='连码' and class2='三全中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "三全中结算成功!!<br>";

									// 连码三中二
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='连码' and class2='三中二' and (" . $str11 . ")");
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
											//单注、复式
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
											//胆拖
											$number_array = explode("拖", $class3);
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
										//中奖
										if ($zs1 + $zs2 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "+" . $zs2 . "' where  kithe=" . $kithe . " and class1='连码' and class2='三中二' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "三中二结算成功!!<br>";

									// 连码二全中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='连码' and class2='二全中' and (" . $str11 . ")");
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
											//单注、复式
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
											//对碰
											$number_array = explode("碰", $class3);
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
											//胆拖
											$sum_count  = 0;
											$number_array = explode("拖", $class3);
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
										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='连码' and class2='二全中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "二全中结算成功!!<br>";

									// 连码二中特
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='连码' and class2='二中特' and (" . $str22 . ")");
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
											//单注、复式
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
											//对碰
											$number_array = explode("碰", $class3);
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
											//胆拖
											$number_array = explode("拖", $class3);
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
										//中奖
										if ($zs1 + $zs2 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "+" . $zs2 . "' where  kithe=" . $kithe . " and class1='连码' and class2='二中特' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "二中特结算成功!!<br>";

									// 连码特串
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='连码' and class2='特串' and (" . $str22 . ")");
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
											//单注、复式
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
											//对碰
											$number_array = explode("碰", $class3);
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
											//胆拖
											$number_array = explode("拖", $class3);
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
										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='连码' and class2='特串' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "特串结算成功!!<br>";

									// 自选不中五不中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='自选不中' and class2='五不中' ");
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
											//单注、复式
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

										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='自选不中' and class2='五不中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									ob_flush();
									flush();
									echo "五不中结算成功!!<br>";

									// 自选不中六不中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='自选不中' and class2='六不中' ");
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
											//单注、复式
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

										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='自选不中' and class2='六不中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "六不中结算成功!!<br>";

									// 自选不中七不中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='自选不中' and class2='七不中' ");
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
											//单注、复式
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

										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='自选不中' and class2='七不中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "七不中结算成功!!<br>";
									// 自选不中八不中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='自选不中' and class2='八不中' ");
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
											//单注、复式
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

										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='自选不中' and class2='八不中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "八不中结算成功!!<br>";
									// 自选不中九不中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='自选不中' and class2='九不中' ");
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
											//单注、复式
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

										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='自选不中' and class2='九不中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "九不中结算成功!!<br>";
									// 自选不中十不中
									$result = $db1->query("select num,class1,class2,class3,sum_m/sz as sum_sum,lmlx,class5 from web_tans where kithe=" . $kithe . " and class1='自选不中' and class2='十不中' ");
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
											//单注、复式
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

										//中奖
										if ($zs1 > 0) {
											$db1->query("update web_tans set bm=1,rate=" . $userwinsum . "/sum_m,win='" . $zs1 . "' where  kithe=" . $kithe . " and class1='自选不中' and class2='十不中' and num='" . $num . "' and class3='" . $class3 . "'");
										}
									}

									echo "十不中结算成功!!<br>";



									// 多中一
									// 四中一
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='多中一' and class2='四中一' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='多中一' and class2='四中一' and class3='" . $class3 . "'");
										}
									}

									echo "四中一结算成功!!<br>";
									// 五中一
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='多中一' and class2='五中一' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='多中一' and class2='五中一' and class3='" . $class3 . "'");
										}
									}

									echo "五中一结算成功!!<br>";
									// 六中一
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='多中一' and class2='六中一' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='多中一' and class2='六中一' and class3='" . $class3 . "'");
										}
									}

									echo "六中一结算成功!!<br>";
									// 七中一
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='多中一' and class2='七中一' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='多中一' and class2='七中一' and class3='" . $class3 . "'");
										}
									}

									echo "七中一结算成功!!<br>";
									// 八中一
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='多中一' and class2='八中一' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='多中一' and class2='八中一' and class3='" . $class3 . "'");
										}
									}

									echo "八中一结算成功!!<br>";
									// 九中一
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='多中一' and class2='九中一' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='多中一' and class2='九中一' and class3='" . $class3 . "'");
										}
									}

									echo "九中一结算成功!!<br>";
									// 十中一
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='多中一' and class2='十中一' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='多中一' and class2='十中一' and class3='" . $class3 . "'");
										}
									}
									echo "十中一结算成功!!<br>";


									// 粒任中
									// 一粒任中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='粒任中' and class2='一粒任中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='粒任中' and class2='一粒任中' and class3='" . $class3 . "'");
										}
									}
									echo "一粒任中结算成功!!<br>";
									// 二粒任中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='粒任中' and class2='二粒任中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='粒任中' and class2='二粒任中' and class3='" . $class3 . "'");
										}
									}
									echo "二粒任中结算成功!!<br>";
									// 三粒任中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='粒任中' and class2='三粒任中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='粒任中' and class2='三粒任中' and class3='" . $class3 . "'");
										}
									}
									echo "三粒任中结算成功!!<br>";
									// 四粒任中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='粒任中' and class2='四粒任中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='粒任中' and class2='四粒任中' and class3='" . $class3 . "'");
										}
									}
									echo "四粒任中结算成功!!<br>";
									// 五粒任中
									$result = $db1->query("select distinct(class3),class1,class2 from web_tans where class1='粒任中' and class2='五粒任中' and kithe='" . $kithe . "'");
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
											$db1->query("update web_tans set bm=1 where kithe=" . $kithe . " and class1='粒任中' and class2='五粒任中' and class3='" . $class3 . "'");
										}
									}
									echo "五粒任中结算成功!!<br>";





									ob_flush();
									flush();

									if ($kf == 1) {
										$vvv = "visible=1,";
									} else {
										$vvv = "";
									}
									//BM=0输的  
									$strSQL = "update web_tans set " . $vvv;
									$strSQL .= "user_sq=sum_m*Abs(user_ds)/100,user_sf=user_sq-sum_m,";
									$strSQL .= "dai_sq=Abs(dai_ds-user_ds)/100*(sum_m-daizc),dai_sf=dai_sq+daizc-daizc*user_ds/100,";
									$strSQL .= "zong_sq=Abs(zong_ds-dai_ds)/100*(sum_m-zongzc-daizc),zong_sf=zong_sq+zongzc-zongzc*dai_ds/100,";
									$strSQL .= "guan_sq=Abs(guan_ds-zong_ds)/100*(gszc+daguzc),guan_sf=guan_sq+guanzc-guanzc*zong_ds/100,";
									$strSQL .= "dagu_sq=Abs(dagu_ds-guan_ds)/100*gszc,dagu_sf=dagu_sq+daguzc-daguzc*guan_ds/100,";
									$strSQL .= "gs_sf=gszc-gszc*dagu_ds/100";
									$strSQL .= " where kithe='" . $kithe . "' and bm=0 and qx=0";
									$db1->query($strSQL);
									//BM=1赢的
									$strSQL = "update web_tans set " . $vvv;
									$strSQL .= "user_sq=sum_m*Abs(user_ds)/100,user_sf=user_sq+sum_m*rate-sum_m,";
									$strSQL .= "dai_sq=Abs(dai_ds-user_ds)/100*(sum_m-daizc),dai_sf=dai_sq+daizc-rate*daizc-user_ds/100*daizc,";
									$strSQL .= "zong_sq=Abs(zong_ds-dai_ds)/100*(sum_m-zongzc-daizc),zong_sf=zong_sq+zongzc-rate*zongzc-dai_ds/100*zongzc,";
									$strSQL .= "guan_sq=Abs(guan_ds-zong_ds)/100*(gszc+daguzc),guan_sf=guan_sq+guanzc-rate*guanzc-zong_ds/100*(guanzc),";
									$strSQL .= "dagu_sq=Abs(dagu_ds-guan_ds)/100*gszc,dagu_sf=dagu_sq+daguzc-rate*daguzc-guan_ds/100*daguzc,";
									$strSQL .= "gs_sf=gszc-rate*gszc-dagu_ds/100*gszc";
									$strSQL .= " where kithe='" . $kithe . "' and bm=1 and qx=0";
									$db1->query($strSQL);
									//BM=2打和跟无效的
									$strSQL = "update web_tans set " . $vvv . "user_sq=0,user_sf=0,dai_sq=0,dai_sf=0,zong_sq=0,zong_sf=0,guan_sq=0,guan_sf=0,dagu_sq=0,dagu_sf=0,gs_sf=0 where kithe='" . $kithe . "' and (bm=2 or qx=1) ";
									$db1->query($strSQL);
									if ($kf == 1) {
										$sql = "update web_kithe set lx=1 where nn='" . $kithe . "'";
										$db1->query($sql) or die("数据库修改出错");
									}
									//更新报表时间
									set_config("report_time", $utime);
								}
								echo "<font color=ff0000>第" . $kithe . "期结算成功</font>&nbsp;&nbsp;";
								$time = $time->Rendtime();
								echo  '页面执行' . "$time" . ' 秒';
								ob_end_flush();
								?>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td height="25" align="center"><a href="main.php?action=web_kithe_list&uid=<?= $uid ?>"><b>返回历史盘口管理</b></a>&nbsp;&nbsp;<a href="main.php?action=report&uid=<?= $uid ?>"><b>进入报表查询</b></a></td>
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