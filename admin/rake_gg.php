<?php

function get_rake_sj($i)
{
    global $rake_sj_temp;
    $rake_sj = 0.01;
    $rake_sj = $rake_sj_temp['过关'];
    return $rake_sj;
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "02")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$ids = "过关";
if ($_GET['act'] == "edit") {
    $tt = 1;
    for (; $tt <= 42; ++$tt) {
        if (empty($_POST["Num_" . $tt])) {
            echo "<script>alert('赔率不能为空:" . $_POST["Num_" . $tt] . "/" . $tt . "!');window.location.href='main.php?action=rake_gg&uid={$uid}&ids=" . $ids . "';</script>";
            exit;
        }
    }
    $tt = 1;
    for (; $tt <= 42; ++$tt) {
        $num = $_POST["Num_" . $tt];
        $class3 = $_POST["class3_" . $tt];
        $class2 = $_POST["class2_" . $tt];
        $db1->query("update web_bl  set adddate='" . $utime . "',rate=" . $num . " where class1='过关' and class2='" . $class2 . "' and  class3='" . $class3 . "'");
        $db1->query("update web_bl  set adddate='" . $utime . "',rate=" . $num . " where class1='正码1-6' and class2='" . $class2 . "' and  class3='" . $class3 . "'");
    }
    echo "<script>alert('修改成功!');window.location.href='main.php?action=rake_gg&uid={$uid}&ids=" . $ids . "';</script>";
    exit;
}
$result = $db1->query("Select rate,class3,class2,locked from web_bl where class1='过关'   Order By ID");
$showtable = array();
$y = 0;
while ($Image = $result->fetch_array()) {
    ++$y;
    array_push($showtable, $Image);
}
$drop_count = $y - 1;
$result = $db1->query("SELECT ds,rake_sj FROM web_config_ds WHERE class='正码1-6' Order By ID");
$rake_sj_temp = array();
$x = 0;
while ($Image = $result->fetch_array()) {
    $rake_sj_temp[$Image['ds']] = $Image['rake_sj'];
    ++$x;
}
$rake_sj_count = $x - 1;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script language="JavaScript">
    var uid = "<?=$uid?>";
    var ids = "<?=$ids?>";
    var autotime = "<?=$autotime?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/rake_gg.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;赔率设置－</span><span class="font_b"><?=$ids?>&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div> 

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" bgcolor="#ffffff">
<tbody>
<tr><!--left-->
<td width="260" align="center" valign="top"><? require_once "rake_header.php";?></td>
<!--right-->
<td valign="top">
    <table width="100%" border="0" cellpadding="0" cellspacing="1" >
    <form name="form1" method="post" action="main.php?action=rake_gg&uid=<?=$uid?>&act=edit&ids=<?=$ids?>">
        <tbody>
            <tr>
                <td colspan="16" align="center" class="t_list_caption">
                   <table width="100%" border="0" align="center"  cellpadding="0" cellspacing="1">
                        <tbody>
                            <?$B = 1;
                                for (; $B <= 2; $B += 1) {
                            if ($B == 1) {?>
                        <tr>
                            <td height="20" colspan="5" align="center" bgcolor="#FFFFFF" class="t_list_caption">正码1
                            </td>
                            <td height="20" colspan="5" align="center" bgcolor="#FFFFFF" class="t_list_caption">正码2
                            </td>
                            <td height="20" colspan="5" align="center" bgcolor="#FFFFFF" class="t_list_caption">正码3
                        </td>
                    </tr>
                        <tr>
                        <td height="20" class="t_list_tr_3" align="center">号码</td>
                        <td colspan="3" class="t_list_tr_3" align="center">赔率</td>
                        <td class="t_list_tr_3" align="center">当前赔率</td>
                        <td height="20"  class="t_list_tr_3" align="center">号码</td>
                        <td colspan="3" class="t_list_tr_3" align="center">赔率</td>
                        <td class="t_list_tr_3" align="center">当前赔率</td>
                        <td height="20" class="t_list_tr_3" align="center">号码</td>
                        <td colspan="3" class="t_list_tr_3" align="center">赔率</td>
                        <td class="t_list_tr_3" align="center">当前赔率</td>
                    </tr>
                        <? $I = 1;
                         for (; $I <= 7; $I += 1) {?>
                      <tr>
                        <td height="38" align="center" bgcolor="#FFFFFF"><font color="<?=get_bs_css($showtable[$I - 1][1])?>"><?=$showtable[$I - 1][1]?></font>
        
                            <input name="class2_<?=$I?>" value="<?=$showtable[$I - 1][2]?>" type="hidden">
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I?>','bl<?=$I - 1?>','uid=<?=$uid?>&class1=过关&ids=正码1&sqq=sqq&lxlx=1&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I - 1][1]?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF"> <input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?=$showtable[$I - 1][0]?>" name="Num_<?=$I?>" />
        
                            <input name="class3_<?=$I?>" value="<?=$showtable[$I - 1][1]?>" type="hidden">
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF">
                            
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I?>','bl<?=$I - 1?>','uid=<?=$uid?>&class1=过关&ids=正码1&sqq=sqq&lxlx=0&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I - 1][1]?>');"><img src="images/sub.png" width="19" height="17" border="0">
                            </a>
                        </td>
                        <td height="38" align="center" bgcolor="#FFFFFF"><span id="bl<?=$I - 1?>"><?=$showtable[$I - 1][0]?></span></td>
                        <td width="68" height="38" align="center" bgcolor="#FFFFFF"><font color="<?=get_bs_css($showtable[$I + 7 - 1][1])?>"><?=$showtable[$I + 7 - 1][1]?></font>
                            <input name="class2_<?=$I + 7?>" value="<?=$showtable[$I + 7 - 1][2]?>" type="hidden">
                        </td>
        
                        <td width="80" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 7?>','bl<?=$I + 7 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码2&sqq=sqq&lxlx=1&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 7 - 1][1]?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?=$showtable[$I + 7 - 1][0]?>" name="Num_<?=$I + 7?>" />
                            <input name="class3_<?=$I + 7?>" value="<?=$showtable[$I + 7 - 1][1]?>" type="hidden">
                        </td>
        
                        <td width="80" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 7?>','bl<?=$I + 7 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码2&sqq=sqq&lxlx=0&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 7 - 1][1]?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                        </td>
                        <td height="38" align="center" bgcolor="#FFFFFF"><span id="bl<?=$I + 7 - 1?>"><?=$showtable[$I + 7 - 1][0]?></span></td>
        
                        <td width="68" height="38" align="center" bgcolor="#FFFFFF">
                            <font color="<?=get_bs_css($showtable[$I + 14 - 1][1])?>"><?=$showtable[$I + 14 - 1][1]?></font>
        
                            <input name="class2_<?=$I + 14?>" value="<?=$showtable[$I + 14 - 1][2]?>" type="hidden">
                        </td>
                        <td width="80" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 14?>','bl<?=$I + 14 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码3&sqq=sqq&lxlx=1&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 14 - 1][1]?>');"><img src="images/add.png" width="19" height="17" border="0"></a>
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                                maxlength="6" size="4" value="<?=$showtable[$I + 14 - 1][0]?>" name="Num_<?=$I + 14?>" />
        
                            <input name="class3_<?=$I + 14?>" value="<?=$showtable[$I + 14 - 1][1]?>" type="hidden">
                        </td>
        
                        <td width="80" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 14?>','bl<?=$I + 14 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码3&sqq=sqq&lxlx=0&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 14 - 1][1]?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                        </td>
        
                        <td height="38" align="center" bgcolor="#FFFFFF"><span id="bl<?=$I + 14 - 1?>"><?= $showtable[$I + 14 - 1][0]?></span></td>
                    </tr>
                    <? }
                    } else {?>
                    <tr>
                        <td height="18" colspan="5" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码4
                        </td>
                        <td height="18" colspan="5" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码5
                        </td>
                        <td height="18" colspan="5" align="center" nowrap="nowrap" bgcolor="#FFFFFF" class="t_list_caption">正码6
                        </td>
                    </tr>
                    <tr>
                        <td height="20" class="t_list_tr_3" align="center">号码</td>
                        <td colspan="3" align="center" class="t_list_tr_3">赔率</td>
                        <td class="t_list_tr_3" align="center">当前赔率</td>
                        <td height="20" class="t_list_tr_3" align="center">号码</td>
                        <td colspan="3" align="center" class="t_list_tr_3">赔率</td>
                        <td class="t_list_tr_3" align="center">当前赔率</td>
                        <td height="20" class="t_list_tr_3" align="center">号码</td>
                        <td colspan="3" align="center" class="t_list_tr_3">赔率</td>
                        <td class="t_list_tr_3" align="center">当前赔率</td>
                    </tr>
                    <? $I = 1;
                for (; $I <= 7; $I += 1) {?>
                    <tr>
                        <td height="38" align="center" bgcolor="#FFFFFF">
                            <font color="<?=get_bs_css($showtable[$I + 21 - 1][1])?>"><?=$showtable[$I + 21 - 1][1]?>
                            </font>
                            <input name="class2_<?=$I + 21?>" value="<?=$showtable[$I + 21 - 1][2]?>" type="hidden">
                        </td>
                        <td width="80" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 21?>','bl<?=$I + 21 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码4&sqq=sqq&lxlx=1&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 21 - 1][1]?>');">
                                <img src="images/add.png" width="19" height="17" border="0"></a>
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text" maxlength="6" size="4" value="<?=$showtable[$I + 21 - 1][0]?>" name="Num_<?=$I + 21?>" />
                            <input name="class3_<?=$I + 21?>" value="<?=$showtable[$I + 21 - 1][1]?>" type="hidden">
                        </td>
                        <td width="80" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 21?>','bl<?=$I + 21 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码4&sqq=sqq&lxlx=0&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 21 - 1][1]?>');">
                                <img src="images/sub.png" width="19" height="17" border="0"></a>
                        </td>
                        <td height="38" align="center" bgcolor="#FFFFFF">
                            <span id="bl<?=$I + 21 - 1?>"><?=$showtable[$I + 21 - 1][0]?></span>
                        </td>
                        <td width="68" height="38" align="center" bgcolor="#FFFFFF">
                            <font color="<?=get_bs_css($showtable[$I + 28 - 1][1])?>"><?=$showtable[$I + 28 - 1][1]?></font>
                            <input name="class2_<?=$I + 28?>" value="<?=$showtable[$I + 28 - 1][2]?>" type="hidden">
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF"><a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 28?>','bl<?=$I + 28 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码5&sqq=sqq&lxlx=1&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 28 - 1][1]?>');">
                            <img src="images/add.png" width="19" height="17" border="0">
                            </a>
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                                maxlength="6" size="4" value="<?=$showtable[$I + 28 - 1][0]?>" name="Num_<?=$I + 28?>" />
                            <input name="class3_ <?=$I + 28?>" value="<?=$showtable[$I + 28 - 1][1]?>" type="hidden">
                        </td>
        
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 28?>','bl<?=$I + 28 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码5&sqq=sqq&lxlx=0&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 28 - 1][1]?>');"><img src="images/sub.png" width="19" height="17" border="0"></a>
                        </td>
                        <td height="38" align="center" bgcolor="#FFFFFF">
                            <span id="bl<?=$I + 28 - 1?>"><?=$showtable[$I + 28 - 1][0]?>
                            </span>
                        </td>
        
                        <td width="68" height="38" align="center" bgcolor="#FFFFFF">
                            <font color="<?=get_bs_css($showtable[$I + 35 - 1][1])?>"></font> 
                            <input name="class2_<?=$I + 35?>" value="<?=$showtable[$I + 35 - 1][2]?>" type="hidden">
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF">
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 35?>','bl<?=$I + 35 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码6&sqq=sqq&lxlx=1&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 35 - 1][1]?>');">
                            <img src="images/add.png" width="19" height="17" border="0"></a>
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF"><input style="HEIGHT: 18px" class="za_text"
                                maxlength="6" size="4" value="<?=$showtable[$I + 35 - 1][0]?>" name="Num_<?=$I + 35?>" />
                            <input name="class3_<?=$I + 35?>" value="<?=$showtable[$I + 35 - 1][1]?>" type="hidden">
                        </td>
                        <td width="80" height="38" align="center" bgcolor="#FFFFFF">
                           
                            <a style="cursor:hand" onClick="UpdateRate('MODIFYRATE','Num_<?=$I + 35?>','bl<?=$I + 35 - 1?>','uid=<?=$uid?>&class1=过关&ids=正码6&sqq=sqq&lxlx=0&qtqt=<?=get_rake_sj($ids)?>&class3=<?=$showtable[$I + 35 - 1][1]?>');">
                                <img src="images/sub.png" width="19" height="17" border="0"></a>
                        </td>
                        <td height="38" align="center" bgcolor="#FFFFFF">
                            <span id="bl<?=$I + 35 - 1?>"><?=$showtable[$I + 35 - 1][0]?>
                            </span>
                        </td>
                    </tr>
                    <?}
            }
}?>
                 <tr>
                <td height="25" colspan="12" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">&nbsp;&nbsp;
                    <input type="submit" class="btn1" name="Submit2" value="提交" />&nbsp;
                    <input type="reset"class="btn2"  name="Submit3" value="重置" />
                </td>
            </tr>
               </tbody>
                   </table>
               </td>
           </tr>
           </tbody>
    </form>
</table>
</td>
</tr>
</tbody>
</table>
    <SCRIPT language=javascript>makeRequest('main.php?action=server&uid=<?=$uid?>&class1=过关&class2=<?=$ids?>')</script>
</body>