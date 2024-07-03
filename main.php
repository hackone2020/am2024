<?php
header("Cache-Control: no-cache£¬ must-revalidate");
require_once("include/global.php");
require_once("include/function.php");
if ($opwww == 1) {
	echo "<script>window.open('close.php','_top')</script>";
	exit();
}
if ($fmzt==1){
    echo "<script>window.open('fm.php','_top')</script>";
    exit;
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="content-Type" content="text/html; charset=utf-8">
<title><?= $webname ?></title>
</head>
<script>
	if (self == top) location = '/';
</script>
<?
$uid = $_GET['uid'];
$action = $_GET['action'];
if (!preg_match("/^[0-9a-zA-Z_]*$/", $uid)) {
	echo "UID error!!";
	exit();
}
if ($uid) {
	$sql = "select id,kauser,xm,cs,ts,xy,ty,abcd,kxabcd,stat,dai,zong,guan,dagu from web_member where uid='{$uid}' and stat=0 LIMIT 1";
	$result = $db1->query($sql);
	$row = $result->fetch_assoc();
	$cou = $result->num_rows;
	if ($cou == 0) {
		echo "<script>window.open('index.php','_top')</script>";
		echo "</HTML>";
		exit();
	}
	$userid = $row['id'];
	$username = $row['kauser'];
	$xm = $row['xm'];
	$cs = $row['cs'];
	$ts = $row['ts'];
	$xy = $row['xy'];
	$ty = $row['ty'];
	$abcd = $row['abcd'];
	$kxabcd = $row['kxabcd'];
	$dai = $row['dai'];
	$zong = $row['zong'];
	$guan = $row['guan'];
	$dagu = $row['dagu'];
} else {
	echo "<script>window.open('index.php','_top')</script>";
	echo "</HTML>";
	exit();
}
if ($username && in_array($action, array("header", "logout", "history", "roul", "logout", "mem_left", "mem_info", "mem_kithe", "mem_wagers", "men_wagers_more", "mem_wagers_history", "mem_wagers_list", "men_wagers_list_more", "stop", "server", "server_lm", "bet_kuaisu", "bet_kuaijie", "bet_tm", "bet_zm", "bet_lm", "bet_zt", "bet_sxzl", "bet_wszl", "bet_zm6", "bet_gg", "bet_bb", "bet_sx6", "bet_tmsx", "bet_sx", "bet_ws","bet_sxbz", "bet_wsbz", "bet_sxl", "bet_wsl", "bet_bz", "bet_1rz", "bet_dzy", "bet_yt", "bet_nn", "bet_n1", "bet_save", "bet_n2", "bet_save_n2", "bet_n3", "bet_save_n3", "bet_n4", "bet_save_n4", "bet_n5", "bet_save_n5", "bet_n6", "bet_save_n6", "bet_n7", "bet_save_n7", "online", "bet_n8", "bet_save_n8", "bet_n9", "bet_save_n9", "bet_nrz", "bet_save_nrz"))) {
	if (!in_array($action, array("header", "history", "online", "logout", "mem_left", "mem_info", "mem_kithe")) && (0 < $web_status || $report_of == 1)) {
		require_once("busy.php");
		exit();
	}
	require_once($action . ".php");
	echo "</HTML>";
	exit();
}
?>