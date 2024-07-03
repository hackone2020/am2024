<?
if (!defined('KK_VER')) {
	exit('无效的访问');
}

if (strpos($flag, '03')) {
} else {
	echo "<center>你没有该权限功能!</center>";
	exit;
}

$result = $db1->query("select id,ds_lb,ds,zf_sum from web_config_ds where 1=1 order by ID");
$drop_table = array();
$y = 0;
while ($image = $result->fetch_array()) {
	$y++;
	array_push($drop_table, $image);
}

$drop_count = $y - 1;
if ($_GET['save'] == "save") {
	$rid = $_POST['drop_id'];
	$drop_name = $_POST['drop_name'];
	$zf_sum = $_POST['zf_sum'];
	for ($I = 0; $I <= count($rid) - 1; $I = $I + 1) {
		if (!is_numeric($zf_sum[$I]) || $zf_sum[$I] < 0) {
			echo "<script>alert('" . $drop_name[$I] . "的手动补货预计盈利/占成金额填写有误，请输入数字！');window.history.go(-1);</script>";
			exit;
		}
	}
	for ($I = 0; $I < count($rid); $I = $I + 1) {
		$db1->query("Update web_config_ds Set zf_sum=" . $zf_sum[$I] . " where id=" . $rid[$I]);
	}
	echo "<script>alert('设置成功!');window.location.href='main.php?action=list_set&uid=$uid';</script>";
	exit;
}
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>

<body>
	<div id="tit" class="tit">
		<div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
		<div class="tit_center floatleft font_bold"><span class="font_g">补货管理&nbsp;</span><span class="font_b">补货设置</span></div>
		<div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
		<div class="biaoti_right floatright"></div>
	</div>
	<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
		<form name="form1" action="main.php?action=list_set&uid=<?= $uid ?>&save=save" method="post">
			<tbody>
				<tr>
					<td align="center" nowrap="" class="t_list_caption"></td>
					<td align="center" nowrap="" class="t_list_caption"> 补货预计盈利/占成金额</td>
				</tr>
				<?
				for ($I = 0; $I <= $drop_count; $I = $I + 1) {
					if ($drop_table[$I][2] != "特B" &&  $drop_table[$I][2] != "正B") {
						if ($drop_table[$I][2] == "特A") {
							$temp_name = "特码";
						} elseif ($drop_table[$I][2] == "正A") {
							$temp_name = "正码";
						} else {
							$temp_name = $drop_table[$I][2];
						}
				?>
						<tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#eef5fc'" onMouseOut="javascript:this.bgColor='#ffffff'">
							<td height="30" align="right"> <? echo $temp_name; ?>：
								<input type="hidden" name="drop_name[]" value='<? echo $temp_name; ?>' />
								<input type="hidden" name="drop_id[]" value='<? echo $drop_table[$I][0]; ?>' />

							</td>
							<td align="center">
								<?
								if (in_array($drop_table[$I][2], array('特A','正特'))) {
									echo "<span class=\"font_r\">预计盈利=</span>";
								}elseif($drop_table[$I][0]>=20) {
									echo "<span class=\"font_g\">单号占成=</span>";
								}
								else {
									echo "<span class=\"font_b\">单号占成=</span>";
								}
								?>
								<input name="zf_sum[]" class="za_text" value='<? echo $drop_table[$I][3]; ?>' size="10" />
							</td>
						</tr>

				<?
					}
				}
				?>
				<tr>
					<td colspan="2" align="center" bgcolor="#FFFFFF"><button class="btn1" type="button" onClick="submit()" ;>保存</button></td>
				</tr>
			</tbody>
	</table>
	</form>
</body>