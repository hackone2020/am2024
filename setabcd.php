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

$abcd = $_GET["abcd"];

if ($uid) {
	$sql = "update web_member set abcd='{$abcd}' where uid='{$uid}'";
	$db1->query($sql);

} else {
	exit();
}
