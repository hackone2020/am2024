<?php

header("Cache-Control: no-cache, must-revalidate");
require_once("include/global.php");
require_once("include/function.php");

if ($opwww == 1) {
	exit();
}

$uid = $_GET["uid"];

if (!preg_match("/^[0-9a-zA-Z\_]*\$/", $uid)) {
	echo "UID error!!";
	exit();
}

$action = $_GET["action"];

if ($uid) {
	$sql = "select id,kauser,xm,cs,ts,xy,ty,abcd,stat,dai,zong,guan,dagu from web_member where uid='$uid' and stat=0 LIMIT 1";
	$result = $db1->query($sql);
	$row = $result->fetch_assoc();
	//数据数量
	$cou = $result->num_rows;

	if ($cou == 0) {
		exit();
	}

	$userid = $row["id"];
	$username = $row["kauser"];
	$xm = $row["xm"];
	$cs = $row["cs"];
	$ts = round($row["ts"], 2);
	$xy = $row["xy"];
	$ty = $row["ty"];
	$abcd = $row["abcd"];
	$dai = $row["dai"];
	$zong = $row["zong"];
	$guan = $row["guan"];
	$dagu = $row["dagu"];
} else {
	exit();
}

if ($username && in_array($action, array("mem_left_list"))) {
	require_once($action . ".php");
	exit();
}
