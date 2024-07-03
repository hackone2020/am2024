<?php
if (!defined('KK_VER')) {
	exit('无效的访问');
} 
if ( $vip==1 || $lx<4){
	echo "<center>你没有该权限功能!</center>";
	exit;
}
if ( $lx==4){
    $select_sql = " and dagu='".$kauser."' ";
}

$result = $db1->query("select * from web_agent where id=" . $_GET['id'] . " and lx=3 " . $select_sql . " order by id");
$row = $result->fetch_assoc();
if($row == ''){
  exit;
}
$userid = $row['id'];
$username = $row['kauser'];
$xm = $row['xm'];
$dagu  = $row['dagu'];
$result = $db1->query("select ds_id,yg,ygb,ygc,ygd,xx,xxx from  web_user_ds where lx=4 and ds_lock=0 and username='".$dagu."' order by id");   
$num1=$result->num_rows;
$dstable = array();
$y = 0;
while ($row = $result->fetch_assoc()) {
    $y++;
	$dstable[$y]=$row;
} 
$ds_count = $y-1;

//修改信息
if ($_GET['act'] == "edit") {

	$yg = $_POST['yg'];
	$ygb = $_POST['ygb'];
	$ygc = $_POST['ygc'];
	$ygd = $_POST['ygd'];
	$ds = $_POST['ds'];
	$dsid = $_POST['dsid'];
	$dsidcount=count($dsid);
	//验证
	for ($I = 0; $I < $dsidcount; $I = $I + 1) {
	    $dsid_temp=$dsid[$I];
		$yg1 = $yg[$I];
		if ( $yg1 > $dstable[$dsid_temp]['yg']){
		   echo "<script>alert('A盘".$ds[$I]."最高不能超过上级限额:".$dstable[$dsid_temp]['yg']."!!');window.history.go(-1);</script>";
		   exit;
		}
		$yg2 = $ygb[$I];
		if ( $yg2 > $dstable[$dsid_temp]['ygb']){
		   echo "<script>alert('B盘".$ds[$I]."最高不能超过上级限额:".$dstable[$dsid_temp]['ygb']."!!');window.history.go(-1);</script>";
		   exit;
		}
		$yg3 = $ygc[$I];
		if ( $yg3 > $dstable[$dsid_temp]['ygc']){
		   echo "<script>alert('C盘".$ds[$I]."最高不能超过上级限额:".$dstable[$dsid_temp]['ygc']."!!');window.history.go(-1);</script>";
		   exit;
		}
		$yg4 = $ygd[$I];
		if ( $yg4 > $dstable[$dsid_temp]['ygd']){
		   echo "<script>alert('D盘".$ds[$I]."最高不能超过上级限额:".$dstable[$dsid_temp]['ygd']."!!');window.history.go(-1);</script>";
		   exit;
		}
		$xx1 = $_POST['mm' . $I];
		if ( $xx1 > $dstable[$dsid_temp]['xx']){
		   echo "<script>alert('".$ds[$I]."单注限额不能超过上级限额:".$dstable[$dsid_temp]['xx']."!!');window.history.go(-1);</script>";
		   exit;
		}
		$xxx1 = $_POST['mmm' . $I];
		if ( $xxx1 > $dstable[$dsid_temp]['xxx']){
		   echo "<script>alert('".$ds[$I]."单项限额不能超过上级限额:".$dstable[$dsid_temp]['xxx']."!!');window.history.go(-1);</script>";
		   exit;
		}
		if ( $xx1 > $xxx1){
		   echo "<script>alert('".$ds[$I]."单注限额不能大于单项限额:".$xxx1."!!');window.history.go(-1);</script>";
		   exit;
		}
		
	}
	//保存
    for ($I = 0; $I < $dsidcount; $I = $I + 1) {
	    $dsid_temp=$dsid[$I];
		$yg1 = round($yg[$I],2);
		$yg2 = round($ygb[$I],2);
		$yg3 = round($ygc[$I],2);
		$yg4 = round($ygd[$I],2);
		$xx1 = round($_POST['mm' . $I],2);
		$xxx1 = round($_POST['mmm' . $I],2);
		$db1->query("update web_user_ds set yg='".$yg1."',ygb='".$yg2."',ygc='".$yg3."',ygd='".$yg4."',xx='".$xx1."',xxx='".$xxx1."' where ds_id='".$dsid_temp."' and userid='".$userid."' and username='".$username."'");
		//下级
		$db1->query("update web_user_ds set yg='".$yg1."' where yg>".$yg1." and ds_id='".$dsid_temp."' and  guan='".$username."'" );
		$db1->query("update web_user_ds set ygb='".$yg2."' where ygb>".$yg2." and ds_id='".$dsid_temp."' and  guan='".$username."'" );
		$db1->query("update web_user_ds set ygc='".$yg3."' where ygc>".$yg3." and ds_id='".$dsid_temp."' and  guan='".$username."'" );
		$db1->query("update web_user_ds set ygd='".$yg4."' where ygd>".$yg4." and ds_id='".$dsid_temp."' and  guan='".$username."'" );
		//单注单项
		$db1->query("update web_user_ds set xx='".$xx1."'  where xx>".$xx1." and ds_id='".$dsid_temp."' and  guan='".$username."'" );
		$db1->query("update web_user_ds set xxx='".$xxx1."'  where xxx>".$xxx1." and ds_id='".$dsid_temp."' and  guan='".$username."'" );
	}
	del_online($username,1);
	echo "<script>alert('设定成功!');window.location.href='main.php?action=user_guan_set&uid=" . $uid . "&vip=" . $vip . "&id=".$userid."';</script>";
	exit;
} 
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script>
var mrds =    new Array();
<?
foreach($dstable as $key=>$val) {
     echo "mrds[".($key-1)."]=new Array(";
     if (is_array($val)) {     //判断$val的值是否是一个数组，如果是，则进入下层遍历
        foreach($val as $key=>$val) {
             echo "'".$val."',";
         }
     }
	 echo "'');";
}
?>
function SubChk()
{
	if(!confirm("是否确定写入股东吗?")){
	   
  		return false;
 	}
}
function rounds(num) {
     if (num < 0){
	    return 0;
	 }else{
	   return(Math.floor((num)*10)/10);
	 }
}

function ks(kid,ksz)
{
  for(i=0; i<<?=$num1?> ;i++){
   if (kid == 7){
     document.getElementsByName("yg[]")[i].value = 0;
	 document.getElementsByName("ygb[]")[i].value = 0;
	 document.getElementsByName("ygc[]")[i].value = 0;
	 document.getElementsByName("ygd[]")[i].value = 0;
   }
   if (kid == 8){
     document.getElementsByName("yg[]")[i].value = mrds[i][1];
	 document.getElementsByName("ygb[]")[i].value = mrds[i][2];
	 document.getElementsByName("ygc[]")[i].value = mrds[i][3];
	 document.getElementsByName("ygd[]")[i].value = mrds[i][4];
	 document.getElementById("mm"+i).value = mrds[i][5];
	 document.getElementById("mmm"+i).value = mrds[i][6];
   }
   if (kid>0 && kid < 7){
     document.getElementsByName("yg[]")[i].value = rounds(document.getElementsByName("yg[]")[i].value-ksz);
	 document.getElementsByName("ygb[]")[i].value = rounds(document.getElementsByName("ygb[]")[i].value-ksz);
	 document.getElementsByName("ygc[]")[i].value = rounds(document.getElementsByName("ygc[]")[i].value-ksz);
	 document.getElementsByName("ygd[]")[i].value = rounds(document.getElementsByName("ygd[]")[i].value-ksz);
   
   }
  }
}

function CountGold(gold,type,rtype,bb,nmnm){
    goldvalue = gold.value;
	var e = document.getElementsByName("ds[]")[nmnm].value;
	if(isNaN(goldvalue))
	{
		alert('只能输入数字');
		gold.value='';
		gold.focus();
		return false;
	}
    if (goldvalue=='' ) goldvalue=0;
	if (rtype == 'SP' && (eval(goldvalue) > eval(bb))) {
			gold.focus();
			gold.value = eval(bb);
			alert(type+"盘"+e+"最高不能超过上级限额: " + eval(bb) + "!!");
			return false;
	}
	
	if (rtype == 'XP' && (eval(goldvalue) > eval(bb))) {
			gold.focus();
			gold.value = eval(bb);
			alert(e+"单项限额不能超过上级限额: " + eval(bb) + "!!");
			return false;
	}
	
	if (rtype == 'MP' && (eval(goldvalue) > eval(bb))) {
			gold.focus();
			gold.value = eval(bb);
			alert(e+"单注限额不能超过上级限额: " + eval(bb) + "!!");
			return false;
	}

	if (rtype=='SP' && (eval(goldvalue) <0)) {
			gold.focus(); 
			gold.value=eval(bb);
			alert("警告：对不起,退水数值不能小于0!!!"); 
			return false;
	}
	
	if (rtype=='XP' && (eval(goldvalue) <0)) {
			gold.focus();
			gold.value=eval(bb); 
			alert("警告：对不起,单项限额数值不能小于0!!!"); 
			return false;
	}
	
	if (rtype=='MP' && (eval(goldvalue) <0)) {
			gold.focus(); 
			gold.value=eval(bb);
			alert("警告：对不起,单注限额数值不能小于0!!!"); 
			return false;
	}

	for(i=0; i< "<?=$num1?>" ;i++){
		if ( nmnm == i ){
			var str1="mm"+i;
			var str2="mmm"+i;
			var t_big2 = new Number(document.all[str2].value);
	
			if (rtype=='MP' && (eval(goldvalue) > eval(t_big2))) {
				 gold.focus(); 
				 gold.value = eval(t_big2);
				 alert(e+"单注限额不能大于单项限额: "+eval(t_big2)+"!!"); 
				 return false;
			}
			var t_big = new Number(document.all[str1].value);
			if (rtype=='XP' && (eval(goldvalue) < eval(t_big))) {
				 gold.focus(); 
				 gold.value = eval(t_big);
				 alert(e+"单项限额不能低于单注限额: "+eval(t_big)+"!!"); 
				 return false;
			}
		}
	}
}
</script>
<body style="min-width: 1200px;width: 100%">
     <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;会员详细设定&nbsp;</div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
        <table border="0" align="right" cellpadding="0" cellspacing="0">
		<tbody><tr>
            <td height="28" style="color:#fff;">
            &nbsp;账号:<?=$username?> -- 名称:<?=$xm?> -- <a href="main.php?action=user_guan_list&uid=<?=$uid?>&vip=<?=$vip?>" >回上一页</a>
            </td>
      </tr>
      </tbody>
    </table>
    </div></div>
<form action="main.php?action=user_guan_set&uid=<?=$uid?>&vip=<?=$vip?>&act=edit&id=<?=$userid?>" method="post" name="form1" id="form1" onSubmit="return SubChk()">
 <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody> 
        <tr>
      <td width="100" class="t_list_tr_3">快速选单</td>
      <td width="646"><input type="button" name="j1" id="j1" value="降0.1"  onClick="ks(1,0.1)"/>
          <input type="button" name="j2" id="j2" value="降0.5"  onClick="ks(2,0.5)"/>
          <input type="button" name="j3" id="j3" value="降1"  onClick="ks(3,1)"/>
          <input type="button" name="j4" id="j4" value="降1.5"  onClick="ks(4,1.5)"/>
          <input type="button" name="j5" id="j5" value="降2"   onClick="ks(5,2)"/>
          <input type="button" name="j6" id="j6" value="降2.5"  onClick="ks(6,2.5)"/>
          <input type="button" name="all" id="all" value="全不退"  onClick="ks(7,0)"/>
          <input type="button" name="hy" id="hy" value="还原默认"  onClick="ks(8,0)"/>
          <input type="reset" name="button" id="button" value="重置" />
          <SPAN STYLE="color: rgb(255,0,0);">操作完成需按"确定"保存!</SPAN>
         </td>
    </tr>
    </tbody>
    </tbody>
  </table>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" >
      <tbody>
        <tr>
            <td width="100" height="20" align="center" class="t_list_caption">类型</td>
            <td height="20" align="center" class="t_list_caption">A盘退水%</td>
            <td height="20" align="center" class="t_list_caption">B盘退水%</td>
            <td height="20" align="center" class="t_list_caption">C盘退水%</td>
            <td height="20" align="center" class="t_list_caption">D盘退水%</td>
            <td height="20" align="center" class="t_list_caption">单注限额</td>
            <td height="20" align="center" class="t_list_caption">单项(号)限额</td>
    </tr>
<?
$result = $db1->query("select * from  web_user_ds where lx=3 and userid=" . $userid . " and username='".$username."' order by id ");
$num2   = $result->num_rows;

$t = 0;
if ($num1 == $num2){
  while ($image = $result->fetch_array()) {
?>          <tr bgcolor="#edf2f7">
            <td width="100" height="26" align="right"><?=$image['ds']?>:
            <input name="ds[]" type="hidden" id="ds[]" value="<?=$image['ds']?>" />
            <input name="dsid[]" type="hidden" id="dsid[]" value="<?=$image['ds_id']?>" />            </td>
           <td align="center"><input name="yg[]" class="za_text" id="yg[]"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" onBlur="return CountGold(this,'A','SP','mrds[<?=$t?>][1]','<?=$t?>');"  value='<?=$image['yg']?>' size="10" /></td>
           <td align="center"><input name="ygb[]" class="za_text" id="ygb[]"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" onBlur="return CountGold(this,'B','SP','mrds[<?=$t?>][2]','<?=$t?>');"  value='<?=$image['ygb']?>' size="10" /></td>
           <td align="center"><input name="ygc[]" class="za_text" id="ygc[]"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" onBlur="return CountGold(this,'C','SP','mrds[<?=$t?>][3]','<?=$t?>');"  value='<?=$image['ygc']?>' size="10" /></td>
           <td align="center"><input name="ygd[]" class="za_text" id="ygd[]"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" onBlur="return CountGold(this,'D','SP','mrds[<?=$t?>][4]','<?=$t?>');"  value='<?=$image['ygd']?>' size="10" /></td>
           <td align="center">
            <input name="mm<?=$t?>" class="za_text" id="mm<?=$t?>"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')"  onBlur="return CountGold(this,'blur','MP','mrds[<?=$t?>][5]','<?=$t?>');"  value='<?=$image['xx']?>' size="10" />            </td>
           <td align="center">
            <input name="mmm<?=$t?>" class="za_text" id="mmm<?=$t?>"  onkeyup="value=value.replace(/[^\d\.\/]/ig,'')"  onBlur="return CountGold(this,'blur','XP','mrds[<?=$t?>][6]','<?=$t?>');"  value='<?=$image['xxx']?>' size="10" />            </td>
          </tr>
<? 
  $t++; 
  } 
}
?>
          <tr>
            <td height="30" colspan="7" align="center" bgcolor="#FFFFFF">
              <input type="submit" name="Submit" class="btn1" value="确定" />            </td>
          </tr>
      </tbody>
  </table>
</form>
</body>