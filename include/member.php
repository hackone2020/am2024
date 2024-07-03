<?php
//获取会员退水信息函数，根据$ii为UID,$b为用户名
//返回包含退水数组
function get_member_ds($ii, $b)
{
	global $db1;
	if ($ii != "" && $b != "") {
		$result = $db1->query("select * from  web_user_ds where  username='" . $b . "' and lx=0 order by ds_id ");
		$ds_array = array();
		$y = 0;
		while ($us_ds = $result->fetch_assoc()) {
			$y++;
			$ds_array[$us_ds['ds_lb']] = $us_ds;
		}
		$array = $ds_array;
		return $array;
	} else {
		return false;
	}
}
//获取公司退水信息函数
//返回包含退水数组
function get_config_ds($time = 20)
{
	global $db1;
	$result = $db1->query("select * from  web_config_ds order by id");
	$ds_array = array();
	$y = 0;
	while ($config_ds = $result->fetch_assoc()) {
		$y++;
		$ds_array[$config_ds['ds_lb']] = $config_ds;
	}
	$array = $ds_array;
	return $array;
}
//获取会员上级退水信息函数，根据$ii为UID,$b为上级用户名
//返回包含退水数组
function get_agent_ds($ii, $b)
{
	global $dblabel, $db1;
	if ($ii != "" && $b != "") {
		$result = $db1->query("select * from  web_user_ds where  username='" . $b . "' and lx>0 order by ds_id ");
		$ds_array = array();
		$y = 0;
		while ($us_ds = $result->fetch_assoc()) {
			$y++;
			$ds_array[$us_ds['ds_lb']] = $us_ds;
		}
		$array = $ds_array;
		return $array;
	} else {
		return false;
	}
}
//获取会员上级用户信息函数，根据$ii为UID,$b为上级用户名
//返回包含用户信息数组
function get_agent($ii, $b)
{
	global $dblabel, $db1;
	if ($ii != "" && $b != "") {
		$result = $db1->query("select * from  web_agent where  kauser='" . $b . "'  order by id LIMIT 1");
		$user_array = array();
		$us = $result->fetch_assoc();
		$user_array = $us;
		$array = $user_array;
		return $array;
	} else {
		return false;
	}
}
//获取赔率信息函数，根据$c(class2)为判断
//返回包含赔率信息数组
function get_bl($c, $time = 6)
{
	global $db1;
	switch ($c) {
		case "特A":
			$sql = "select * from web_bl where  class1='特码' and (class2='" . $c . "' or class2='特码') order by id";
			break;
		case "特B":
			$sql = "select * from web_bl where  class1='特码' and (class2='" . $c . "' or class2='特码') order by id";
			break;
		case "正A":
			$sql = "select * from web_bl where  (class1='正码' and class2='" . $c . "') or class2='总分' order by id";
			break;
		case "正B":
			$sql = "select * from web_bl where  (class1='正码' and class2='" . $c . "') or class2='总分' order by id";
			break;
		case "半波":
			$sql = "select * from web_bl where  class1='半波' order by id";
			break;
		case "正码1-6":
			$sql = "select * from web_bl where  class1='正码1-6' order by id";
			break;
		case "过关":
			$sql = "select * from web_bl where  class1='过关' order by id";
			break;
		case "正1特":
			$sql = "select * from web_bl where  class1='正特' and class2='" . $c . "' order by id";
			break;
		case "正2特":
			$sql = "select * from web_bl where  class1='正特' and class2='" . $c . "' order by id";
			break;
		case "正3特":
			$sql = "select * from web_bl where  class1='正特' and class2='" . $c . "' order by id";
			break;
		case "正4特":
			$sql = "select * from web_bl where  class1='正特' and class2='" . $c . "' order by id";
			break;
		case "正5特":
			$sql = "select * from web_bl where  class1='正特' and class2='" . $c . "' order by id";
			break;
		case "正6特":
			$sql = "select * from web_bl where  class1='正特' and class2='" . $c . "' order by id";
			break;
		case "四全中":
			$sql = "select * from web_bl where  class1='连码' and class2='" . $c . "' order by id";
			break;
		case "三全中":
			$sql = "select * from web_bl where  class1='连码' and class2='" . $c . "' order by id";
			break;
		case "三中二":
			$sql = "select * from web_bl where  class1='连码' and (class2='三中二中二' or class2='三中二中三') order by id";
			break;
		case "三中二中二":
			$sql = "select * from web_bl where  class1='连码' and class2='三中二中二' order by id";
			break;
		case "三中二中三":
			$sql = "select * from web_bl where  class1='连码' and class2='三中二中三' order by id";
			break;
		case "二全中":
			$sql = "select * from web_bl where  class1='连码' and class2='" . $c . "' order by id";
			break;
		case "二中特":
			$sql = "select * from web_bl where  class1='连码' and (class2='二中特中特' or class2='二中特中二') order by id";
			break;
		case "二中特中特":
			$sql = "select * from web_bl where  class1='连码' and class2='二中特中特' order by id";
			break;
		case "二中特中二":
			$sql = "select * from web_bl where  class1='连码' and class2='二中特中二' order by id";
			break;
		case "特串":
			$sql = "select * from web_bl where  class1='连码' and class2='" . $c . "' order by id";
			break;
		case "一肖":
		case "特肖":
		case "六肖":
		case "一肖不中":
			$sql = "select * from web_bl where  class1='生肖' and class2='" . $c . "' order by id";
			break;
		case "二肖连中":
		case "二肖连不中":
		case "三肖连中":
		case "三肖连不中":
		case "四肖连中":
		case "四肖连不中":
		case "五肖连中":
		case "五肖连不中":
			$sql = "select * from web_bl where  class1='生肖连' and class2='" . $c . "' order by id";
			break;
		case "一肖量":
		case "二肖量":
		case "三肖量":
		case "四肖量":
		case "五肖量":
			$sql = "select * from web_bl where  class1='生肖量' and class2='" . $c . "' order by id";
			break;
		case "尾数":
		case "尾数不中":
			$sql = "select * from web_bl where  class1='尾数' and class2='" . $c . "' order by id";
			break;
		case "尾数量":
			$sql = "select * from web_bl where  class1='尾数量' and class2='" . $c . "' order by id";
			break;
		case "二尾连中":
		case "二尾连不中":
		case "三尾连中":
		case "三尾连不中":
		case "四尾连中":
		case "四尾连不中":
			$sql = "select * from web_bl where  class1='尾数连' and class2='" . $c . "' order by id";
			break;
		case "五不中":
		case "六不中":
		case "七不中":
		case "八不中":
		case "九不中":
		case "十不中":
		case "十一不中":
		case "十二不中":
			$sql = "select * from web_bl where  class1='自选不中' and class2='" . $c . "' order by id";
			break;
		case "五中一":
		case "六中一":
		case "七中一":
		case "八中一":
		case "九中一":
		case "十中一":
		case "四中一":
			$sql = "select * from web_bl where  class1='多中一' and class2='" . $c . "' order by id";
			break;
		default:
			$sql = "select * from web_bl where   class2='" . $c . "' order by id";
			break;
	}
	$result = $db1->query($sql);
	$bl_array = array();
	$y = 0;
	while ($bl = $result->fetch_assoc()) {
		$y++;
		$bl_array[$y] = $bl;
	}
	$array = $bl_array;
	return $array;
}
