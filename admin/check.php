<?php
function chk($str = "")
{
	global $db1;
	$r = 0;
	$string = "yes";
	$len = strlen($str);
	if ($len < 1 || 12 < $len) {
		$r = 1;
		echo "<script>alert('���˺ű�������1���ַ������12���ַ�����ֻ��������(0-9)����Ӣ��Сд��ĸ');window.location.href='about:blank';</script>";
		echo "</HTML>";
		exit();
	}
	if (!preg_match("/^[0-9a-z]{1,12}$/", $str)) {
		echo "<script>alert('���˺ű�������1���ַ������12���ַ�����ֻ��������(0-9)����Ӣ��Сд��ĸ');window.location.href='about:blank';</script>";
		echo "</HTML>";
		exit();
	}
	if ($str == "all") {
		echo "<script>alert('���˺��Ѿ�����ʹ��!');window.location.href='about:blank';</script>";
		echo "</HTML>";
		exit();
	}
	$result = $db1->query("select count(*) from web_admin  where username='" . $str . "'  order by id desc");
	$num1 = $result->fetch_array();
	$num = $num1[0];
	if ($num != 0) {
		echo "<script>alert('���˺��Ѿ�����ʹ��!');window.location.href='about:blank';</script>";
		echo "</HTML>";
		exit();
	}
	$result = $db1->query("select count(*) from web_agent  where kauser='" . $str . "'  order by id desc");
	$num1 = $result->fetch_array();
	$num = $num1[0];
	if ($num != 0) {
		echo "<script>alert('���˺��Ѿ�����ʹ��!');window.location.href='about:blank';</script>";
		echo "</HTML>";
		exit();
	}
	$result = $db1->query("select count(*) from web_agent_zi  where kauser='" . $str . "'  order by id desc");
	$num1 = $result->fetch_array();
	$num = $num1[0];
	if ($num != 0) {
		echo "<script>alert('���˺��Ѿ�����ʹ��!');window.location.href='about:blank';</script>";
		echo "</HTML>";
		exit();
	}
	$result = $db1->query("select count(*) from web_member  where kauser='" . $str . "'  order by id desc");
	$num1 = $result->fetch_array();
	$num = $num1[0];
	if ($num != 0) {
		echo "<script>alert('���˺��Ѿ�����ʹ��!');window.location.href='about:blank';</script>";
		echo "</HTML>";
		exit();
	}
	return $string;
}

$s_username = $_GET['username'];
$msg = chk($s_username);
if ($msg == "yes") {
	echo "<script>alert('���˺ſ���ʹ��!');window.location.href='about:blank';</script>";
	echo "</HTML>";
	exit();
}
