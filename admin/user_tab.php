<?php

if (!defined("KK_VER")) {
	exit("无效的访问");
}
$username = $_GET['username'];
$userlx = $_GET['userlx'];
if ($username != "" && $userlx != "") {
	if ($userlx == 1) {
		$sql = "select id,uid from web_member where kauser='{$username}' LIMIT 1";
		$result = $db1->query($sql);
		$row = $result->fetch_array();
		$count = $result->num_rows;
		if ($count == 0) {
			echo "<script>alert('您切入的账号不存在，请重新操作!');</script>";
			exit();
		}
		$user_id = $row['id'];
		if ($row['uid'] != "") {
			$user_uid = $row['uid'];
		} else {
			$str = time("s") . $username;
			$user_uid = substr(md5($str), 0, rand(14, 17)) . "a" . rand(0, 1);
		}
		$sql = "update web_member set uid='{$user_uid}' where id={$user_id}";
		$db1->query($sql);
	} else {
		$sql = "select id,uid from web_agent where kauser='{$username}' LIMIT 1";
		$result = $db1->query($sql);
		$row = $result->fetch_array();
		$count = $result->num_rows;
		if ($count == 0) {
			echo "<script>alert('您登入的账号不存在，请重新操作!');</script>";
			exit();
		}
		$user_id = $row['id'];
		if ($row['uid'] != "") {
			$user_uid = $row['uid'];
		} else {
			$str = time("s") . $username;
			$user_uid = substr(md5($str), 0, rand(14, 17)) . "z" . rand(0, 1);
		}
		$sql = "update web_agent set uid='{$user_uid}' where id={$user_id}";
		$db1->query($sql);
	}
} else {
	exit();
}
if ($userlx == 1) {
?>
	<script language=JavaScript>
		document.title = '会员:<?= $username ?>';
	</script>
	<frameset rows="132,*" frameborder="NO" border="0" framespacing="0" noresize="noresize">
		<frame src="../main.php?action=header&uid=<?= $user_uid ?>" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" noresize="noresize" />
		<frameset rows="100%" noresize="noresize">
			<frameset cols=234,*" noresize="noresize">
				<frame src="../main.php?action=mem_left&uid=<?= $user_uid ?>" name="leftFrame" marginwidth="0" marginheight="0" frameborder="0" noresize="noresize" scrolling="auto" />
				<frame src="../main.php?action=history&uid=<?= $user_uid ?>" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" noresize="noresize" />
			</frameset>
		</frameset>
	</frameset>
	<noframes>

		<body bgcolor="#FFFFFF" text="#000000">
		</body>
	</noframes>

	</html>
<?

} else {
?>
	<script language=JavaScript>
		document.title = '代理:<?= $username ?>';
	</script>
	<frameset rows="132,*" frameborder="NO" border="0" framespacing="0">
		<frame name="topFrame" scrolling="NO" noresize src="../agent/main.php?action=header&uid=<?= $user_uid ?>&vip=0">
			<frame name="main" src="../agent/main.php?action=history&uid=<?= $user_uid ?>&vip=0">
	</frameset>
	<noframes>

		<body bgcolor="#FFFFFF" text="#000000">

		</body>
	</noframes>

	</html>
<? }
?>