<?php 
// 获取网站配置,查找$i字段
function get_config($i) {
	global $db1;
	$result = $db1->query("select " . $i . " from web_config order by id desc LIMIT 1");
	$web_config_row = $result->fetch_array();
	return $web_config_row[$i];
} 
// 设置网站配置$i字段为$j
function set_config($i,$j) {
	global $db1;
	$db1->query("update web_config set ".$i."='".$j."'  order by id desc LIMIT 1");
} 
// 根据获取代理等级名称
function get_agent_lx_name($i) {
	$lx_name = '';
	if ($i == 1){
	    $lx_name = '代理';
	}
	if ($i == 2){
	    $lx_name = '总代理';
	}
	if ($i == 3){
	    $lx_name = '股东';
	}
	if ($i == 4){
	    $lx_name = '分公司';
	}
	return $lx_name;
} 
// 生成订单
function randStr($len = 12) {
	$password = "";
    for ($t = 1;$t < $len;$t = $t + 1) {
	   $password .= rand(0,9);
	}
	$password .= rand(0,9);
	return $password;
} 

// 根据生肖id求号码
function get_sx_m_number($i) {
	global $db1;
	$result4 = $db1->query("Select id,m_number From web_sxnumber where id=" . $i . " Order By id LIMIT 1");
	$m_number4 = $result4->fetch_array();
	return $m_number4['m_number'];
} 

// 根据号码求生肖
function get_sx_name($r) {
	global $db1;
	if ($r == 0){
		return;
	}else{
		if ($r < 10){
			$r = "0".$r;
		}
	    $result = $db1->query("select id,m_number,sx from web_sxnumber where  m_number LIKE '%$r%'  and id<=12  Order By ID LIMIT 1");
	    $web_sx_row = $result->fetch_array();
	    return $web_sx_row['sx'];
	}
} 
// 根据数字求波色,返回rgb形参是字母型
function get_bs_color($in_num) {
	if ($in_num <= 9) {
		$tmp_num_str = '0' . $in_num;
	} else {
		$tmp_num_str = '' . $in_num;
	} 
	$tmp_r = "01,02,07,08,12,13,18,19,23,24,29,30,34,35,40,45,46";
	$tmp_g = "05,06,11,16,17,21,22,27,28,32,33,38,39,43,44,49";
	$tmp_b = "03,04,09,10,14,15,20,25,26,31,36,37,41,42,47,48";
	if (strpos($tmp_r, $tmp_num_str) !== false) {
		return 'r';
	} elseif (strpos($tmp_g, $tmp_num_str) !== false) {
		return 'g';
	} elseif (strpos($tmp_b, $tmp_num_str) !== false) {
		return 'b';
	} 
} 
// 根据数字求波色名称,直接返回中文名称
function get_bs_name($i) {
	if (get_bs_color($i) == "r") {
		$bsname = "红波";
	} 
	if (get_bs_color($i) == "b") {
		$bsname = "蓝波";
	} 
	if (get_bs_color($i) == "g") {
		$bsname = "绿波";
	} 
	return $bsname;
} 

// 根据波色名称求样式,直接返回CSS颜色
function get_bs_css($i) {
	if ($i == "红波") {
		$bscss = "ff0000";
	} 
	if ($i == "蓝波") {
		$bscss = "0000ff";
	} 
	if ($i == "绿波") {
		$bscss = "green";
	} 
	return $bscss;
} 
//获取交收结果html
function get_sf($s) {
	$html = '';
	if ($s < 0){
	$html = "<font color='green'>付".abs($s)."</font> ";
	}
	if ($s > 0){
	$html = "<font color='red'>收".abs($s)."</font> ";
	}
	if ($s == 0){
	$html = $s;
	}
	return $html;	
}
//获取用户在线html
function get_online($i){   
	global $db1;
   $result = $db1->query("select * from web_online where  username ='".$i."' order by id desc LIMIT 1"); 
   $online = $result->fetch_assoc(); 
   if ($online!=null || $online!=""){
       return '<img src="images/pc1.gif" width="18" height="18" border="0" title="在线">';
   }else{
       return '<img src="images/pc2.gif" width="18" height="18" border="0" title="离线">';
   }
}
//踢出用户在线$i为用户名，$k为权限1为代理，0为会员
function del_online($i,$k){  
	global $db1;
   if ($k == 0){
       $db1->query("update web_member  set uid='' where kauser='" . $i . "' ");
   }else{
       $db1->query("update web_agent  set uid='' where kauser='" . $i . "' or dagu='" . $i . "' or guan='" . $i . "' or zong='" . $i . "' ");
       $db1->query("update web_agent_zi  set uid='' where kauser='" . $i . "' or guan='" .$i. "'");
	   $db1->query("update web_member  set uid='' where dagu='" . $i . "' or guan='" . $i . "' or zong='" . $i . "' or dai='" . $i . "' ");
   }
}
// 字符过滤函数
function safe_convert($string, $html=0) { //Words Filter 
    if ($html==0) { 
        $string=htmlspecialchars($string, ENT_QUOTES,'GB2312'); 
        $string=str_replace("<","&lt;",$string); 
        $string=str_replace(">","&gt;",$string); 
        $string=str_replace("\\", '&#92;', $string); 
    } else { 
        $string=addslashes($string); 
        $string=str_replace("\\\\", '&#92;', $string); 
    } 
    $string=str_replace("\r","<br/>",$string); 
    $string=str_replace("\n","",$string); 
    $string=str_replace("\t","&nbsp;&nbsp;",$string); 
    $string=str_replace("  "," &nbsp;",$string); 
    $string=str_replace('|', '&#124;', $string); 
    $string=str_replace("&amp;#96;","&#96;",$string); 
    $string=str_replace("&amp;#92;","&#92;",$string); 
    return $string; 
} 
// 删除文件夹，主要做清除缓存
function deldir($dir) {
	$dh = opendir($dir);
	while ($file = readdir($dh)) {
		if ($file != "." && $file != "..") {
			$fullpath = $dir . "/" . $file;
			if (!is_dir($fullpath)) {
				unlink($fullpath);
			} else {
				deldir($fullpath);
			} 
		} 
	} 
	closedir($dh);
	if (rmdir($dir)) {
		return true;
	} else {
		return false;
	} 
} 

//密码函数
function chk_pwd($str=''){
	$r=0;
	$len=strlen($str);
	if($len<6 || $len>12){
		$r=1;
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script>alert(\'◎密码必须至少6个字符，最多12个字符，并只能有数字(0-9)，及英文大小写字母\')</script><script>history.go(-1);</script>';
		exit;
	}
}

//账号函数
function chk_user($str=''){
	global $db1;
	$r=0;
	$len=strlen($str);
	if($len<1 || $len>12){
		$r=1;
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script>alert(\'◎账号必须至少1个字符，最多12个字符，并只能有数字(0-9)，及英文小写字母\')</script><script>history.go(-1);</script>';
		echo "</HTML>";
		exit;
	}
    if(!preg_match("/^[0-9a-z]{1,12}$/",$str)){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script>alert(\'◎账号必须至少1个字符，最多12个字符，并只能有数字(0-9)，及英文小写字母\')</script><script>history.go(-1);</script>';
		echo "</HTML>";
		exit;
    }
	//判断是否是保留字符
    if($str=="all"){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script>alert(\'此账号已经有人使用!\')</script><script>history.go(-1);</script>';
		echo "</HTML>";
		exit;
    }
	//判断管理员
    $result = $db1->query("select count(*) from web_admin  where username='".$str."'  order by id desc");   
    $num_array= $result->fetch_array();
    $num    =  $num_array[0];
    
	if($num!=0){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script>alert(\'此账号已经有人使用!\')</script><script>history.go(-1);</script>';
		echo "</HTML>";
		exit;
    }
	//判断代理
    $result = $db1->query("select count(*) from web_agent  where kauser='".$str."'  order by id desc");   
     $num_array= $result->fetch_array();
    $num    =  $num_array[0];
	if($num!=0){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script>alert(\'此账号已经有人使用!\')</script><script>history.go(-1);</script>';
		echo "</HTML>";
		exit;
    }
	//判断代理子账号
    $result = $db1->query("select count(*) from web_agent_zi  where kauser='".$str."'  order by id desc");   
    $num_array= $result->fetch_array();
    $num    =  $num_array[0];
	if($num!=0){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script>alert(\'此账号已经有人使用!\')</script><script>history.go(-1);</script>';
		echo "</HTML>";
		exit;
    }
	//判断会员
    $result = $db1->query("select count(*) from web_member  where kauser='".$str."'  order by id desc");   
     $num_array= $result->fetch_array();
    $num    =  $num_array[0];
	if($num!=0){
		echo '<meta http-equiv="Content-Type" content="text/html; charset=gb2312"><script>alert(\'此账号已经有人使用!\')</script><script>history.go(-1);</script>';
		echo "</HTML>";
		exit;
    }

}
?>