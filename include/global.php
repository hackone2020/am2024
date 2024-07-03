<?php
set_time_limit(0);
header("content-Type: text/html; charset=gbk");
//set_magic_quotes_runtime(0);
define('KK_VER', 'v1.1');
define('KK', __FILE__ ? getdirname(__FILE__) . '/' : './');
include_once('config.php');
// 设置时区
if (function_exists("date_default_timezone_set")) {
	date_default_timezone_set("Asia/Shanghai");
} 
$arr_type=array("tm"=>"特码","lm"=>"连码","4lm"=>"四全中","3lm"=>"三全中","3z2"=>"三中二","2lm"=>"二全中","2zt"=>"二中特","tc"=>"特串");
// 防注入
unset($_ENV, $HTTP_ENV_VARS, $_REQUEST, $HTTP_POST_VARS, $HTTP_GET_VARS, $HTTP_POST_FILES, $HTTP_COOKIE_VARS);
if (!get_magic_quotes_gpc()) {
	Add_S($_POST);Add_S($_GET);Add_S($_COOKIE);
} 
Add_S($_FILES);
Add_T($_POST);
Add_T($_GET);
Add_T($_COOKIE);
// 允许程序在 register_globals = off 的环境下工作
if (!ini_get("register_globals")) {
	extract($_GET, EXTR_SKIP);
	extract($_POST, EXTR_SKIP);
} 
// rewrite支持检查
$rewrite_enable = $_FCACHE['settings']['ifrewrite'];
if ($rewrite_enable) {
	if (function_exists('apache_get_modules')) {
		$apache_mod = apache_get_modules();
		if (!in_array('mod_rewrite', $apache_mod)) {
			$rewrite_enable = 0;
		} 
	} 
} 
// 获取系统目录
function getdirname($path) {
	if (strpos($path, '\\') !== false) {
		return substr($path, 0, strrpos($path, '\\'));
	} elseif (strpos($path, '/') !== false) {
		return substr($path, 0, strrpos($path, '/'));
	} else {
		return '/';
	} 
} 
// 字符转意
function Add_S(&$array) {
	foreach($array as $key => $value) {
		if (!is_array($value)) {
		 $array[$key] = addslashes($value);
		} else {
			Add_S($array[$key]);
		} 
	} 
} 
// 字符过滤
function Add_T(&$array) {
	foreach($array as $key => $value) {
		if (!is_array($value)) {

			$array[$key] = htmlspecialchars($value,ENT_COMPAT,'gb2312');
		} else {
			Add_T($array[$key]);
		} 
	} 
} 
// 提交确认
function SubmitCheck($var = "") {
	if (empty($_POST)) {
		return false;
	} 
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && (empty($_SERVER['HTTP_REFERER']) ||
				preg_replace("/https?:\/\/([^\:\/]+).*/i", "\\1", $_SERVER['HTTP_REFERER']) == preg_replace("/([^\:]+).*/", "\\1", $_SERVER['HTTP_HOST']))) {
		return true;
	} else {
		return false;
	} 
} 

function unescape($str) {
  return json_decode('"'.str_replace('%', '\\', $str).'"');
}
// 获取真实IP
function get_real_ip() {
    if(!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $realip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $realip = $_SERVER['REMOTE_ADDR'];
    }
	if(preg_match("/,/",$realip))
	{
		$realip_array = explode(",",$realip);
		$realip  = $realip_array[0];
	}
    return $realip;
} 
//参数检验
if ($dbhost == "" || $dbuser == "" || $dbname == "" || $dblabel == ""){
    echo "config error!";
	exit;
}
//系统最大会员数,0无限制
if ($maxmem == ""){
    $maxmem = 0;
}else{
    $maxmem = (int)$maxmem;
}
//代理显示会员IP,0显示，1为不显示
$auto_edit = 1;

//---常用全局变量开始
$userip = get_real_ip();
$utime = date("Y-m-d H:i:s");

// 自动更新时间
$autotime = 45000;
//自动清除在线时间(秒)
$autodeltime = 300;
$result = $db1->query("select webname,weburl,opwww,fmzt,sx49,mrab,kplist,report_of,dssum,online_time,report_time from web_config order by id LIMIT 1");
$row = $result->fetch_array();
$webname = $row['webname'];
$weburl = $row['weburl'];
$opwww = $row['opwww'];
$fmzt = $row['fmzt'];
//六肖49打和
$sx49 = $row['sx49'];
//默认显示AB盘
$mrab = $row['mrab'];
//开盘可否查看历史
$kplist    = $row['kplist'];
//报表0开,1关
$report_of = $row['report_of'];
//最后清除在线时间
$online_time = $row['online_time'];
//报表最后更新
$report_time = $row['report_time'];
//自动跌水方式0按总额，1按公司占成
$dssum = $row['dssum'];
if ($dssum == "" || $dssum > 1 || $dssum <0){
    $dssum = 0;
}


$ywresult = $db1->query("select * from web_yw order by id LIMIT 1");
$ywrow = $ywresult->fetch_array();
//盘口数量  1-8个
$pannums = $ywrow['pannums'];

//会员盘口数量  0多个   1单个
$mpannums = $ywrow['mpannums'];


//---常用全局变量结束
//期数
$Current_Kithe_Num = 1;
$result = $db1->query("select ID,NN,ND,na,n1,n2,n3,n4,n5,n6,lx,kitm,kitm1,kizt,kizt1,kizm,kizm1,kizm6,kizm61,kigg,kigg1,kilm,kilm1,kisx,kisx1,kibb,kibb1,kiws,kiws1,zfb,zfbdate,zfbdate1,best from web_kithe  order by id desc LIMIT 1");
$Current_KitheTable = $result->fetch_array();
//期数
$Current_Kithe_Num = $Current_KitheTable[1];
// 系统状态，0正常，1开码中，2结算中
$web_status = 0;
if ($Current_KitheTable['n1'] != 0 && $Current_KitheTable['lx'] == 0) {
	$web_status = 1;
	if ($Current_KitheTable['na'] != 0 && $Current_KitheTable['lx'] == 0) {
		$web_status = 2;
	} 
} else {
	$web_status = 0;
} 
// 总盘口自动封盘
If ((strtotime($Current_KitheTable[30]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
	$sql = "update web_kithe set kitm=0,kizt=0,kizm=0,kizm6=0,kigg=0,kiws=0,kilm=0,kisx=0,kibb=0,zfb=0 where id=$Current_KitheTable[0]";
	$db1->query($sql) or die ($sql);
} 
// 自动开盘
If ((strtotime($Current_KitheTable[31]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
	if ($Current_KitheTable[32] == 1) {
		$sql = "update web_kithe set kitm=1,kizt=1,kizm=1,kizm6=1,kigg=1,kiws=1,kilm=1,kisx=1,kibb=1,zfb=1,best=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
		$db1->query("update web_member set uid='' ");
		$db1->query("update web_agent set uid='' ");
		$db1->query("update web_agent_zi set uid=''");
		$ccf = date("Y-m-d H:i:s", time()-60*60*12);
		$db1->query("update web_admin set uid='' where LastLogin<='".$ccf."'");
		$db1->query("TRUNCATE TABLE web_online");
	} 
} 
// 项目自动封盘
if ($Current_KitheTable[29] == 1) {
	If ((strtotime($Current_KitheTable[12]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kitm=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 

	If ((strtotime($Current_KitheTable[14]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kizt=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 

	If ((strtotime($Current_KitheTable[16]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kizm=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 

	If ((strtotime($Current_KitheTable[18]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kizm6=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 

	If ((strtotime($Current_KitheTable[20]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kigg=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 

	If ((strtotime($Current_KitheTable[22]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kilm=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 
	If ((strtotime($Current_KitheTable[24]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kisx=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 
	If ((strtotime($Current_KitheTable[26]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kibb=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 

	If ((strtotime($Current_KitheTable[28]) - strtotime(date("Y-m-d H:i:s"))) <= 0) {
		$sql = "update web_kithe set kiws=0 where id=$Current_KitheTable[0]";
		$db1->query($sql) or die ($sql);
	} 
} 
if ($Current_KitheTable[4] != "0") {
	$sql = "update web_kithe set kizt=0,kizm=0,kizm6=0,kigg=0,kilm=0,kisx=0,kibb=0,kiws=0 where id=" . $Current_KitheTable[0];
	$db1->query($sql) or die ($sql);
} 
/////
?>