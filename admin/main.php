<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
unset($_SESSION['code']);
require_once("../include/global.php");
require_once("../include/function.php");
ignore_user_abort(TRUE);

// if ($_GET['action'] != "list_look" && $_GET['action'] != "user_log" && $_GET['action'] != "user_tab") {
// 	echo "<script>if(self == top) location='/'</script>";
// }
$uid = $_GET['uid'];
$action = $_GET['action'];
if (!preg_match("/^[0-9a-zA-Z_]*$/", $uid)) {
	echo "UID error!!";
	exit();
}
if ($uid) {

	$sql = "select id,uid,username,flag from web_admin where uid='{$uid}' LIMIT 1";
	$result = $db1->query($sql);
	$row = $result->fetch_array();
	$cou = $result->num_rows;
	if ($cou == 0) {
		echo "<script>window.open('index.php','_top')</script>";
		// echo "</HTML>";
		exit();
	}
	$jxadmin = $row['username'];
	$flag = $row['flag'];
} else {
	echo "<script>window.open('index.php','_top')</script>";
	// echo "</HTML>";
	exit();
}
if ($jxadmin && in_array($action, array("header", "logout", "online", "web_kithe", "web_kithe_add", "web_kithe_list", "web_kithe_edit", "web_win", "web_config", "web_class", "web_del", "web_abcd", "web_nn", "web_ds", "web_bak", "passwd", "web_online", "web_log", "user_gs_list", "user_gs_edit", "user_gs_add", "user_hy", "rake_hy", "rake_drop", "rake_sj", "rake_mr_tm", "rake_mr_zt", "rake_mr_zm", "rake_mr_zm6", "rake_mr_gg", "rake_mr_bb", "rake_mr_lm", "rake_mr_sx", "rake_mr_ws", "rake_mr_bz", "rake_mr_dzy", "rake_mr_yt", "rake_mr_lrz", "rake_mr_sxzl", "rake_mr_wszl", "server", "rake_update", "rake_tm", "rake_bb", "rake_zm", "rake_zm6", "rake_gg", "rake_zt", "rake_bz", "rake_lm", "rake_sx", "rake_ws", "rake_dzy", "rake_lrz", "rake_sxzl", "rake_wszl", "rake_yt", "user_tab", "user_log", "check", "user_dagu_list", "user_dagu_add", "user_dagu_edit", "user_dagu_set", "user_guan_list", "user_guan_add", "user_guan_edit", "user_guan_set", "user_zong_list", "user_zong_add", "user_zong_edit", "user_zong_set", "user_dai_list", "user_dai_add", "user_dai_edit", "user_dai_set", "user_mem_list", "user_mem_add", "user_mem_edit", "user_mem_set", "user_mem_zs_list", "user_mem_zs_add", "user_mem_zs_edit", "user_mem_zs_set", "info", "real_list", "real_list_wai", "real_list_manage", "real_list_m1", "real_list_m2", "real_list_m3", "real_list_m4", "real_list_m5", "real_list_m6", "report", "report_class", "report_m1", "report_m2", "report_m3", "report_m4", "report_m5", "report_m6", "list_all", "server_all", "list_look", "list_set", "list_tm", "server_tm", "list_bb", "server_bb", "list_zm", "server_zm", "list_sx", "server_sx", "list_ws", "server_ws", "list_tmsx", "server_tmsx", "list_zt", "server_zt", "list_zm6", "server_zm6", "list_sx6", "server_sx6", "list_gg", "server_gg", "list_lm", "server_lm", "list_lm_show", "list_bz", "server_bz", "list_bz_show", "list_sxl", "server_sxl", "list_sxl_show", "list_wsl", "server_wsl", "list_wsl_show", "list_dzy", "server_dzy", "list_dzy_show", "list_yt", "server_yt", "plan", "web_yw", "web_jc","list_lrz","list_lrz_show"))) {
	require_once($action . ".php");
	// echo "</HTML>";
	exit();
}
?>