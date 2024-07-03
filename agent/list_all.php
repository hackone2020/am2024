<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 && !strpos($flag, "1")) {
   echo "<center>你没有该权限功能!</center>";
    exit;
}
include "check_zf.php";
$ids = "全部";
$abcd = "";
$kithe = $Current_Kithe_Num;
if ($_GET['abcd'] != "") {
    $abcd = $_GET['abcd'];
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="css/ball.css" type="text/css">
<script language="JavaScript">
var uid      = "<?=$uid?>";
var ids      = "<?=$ids?>";
var autotime = "<?=$autotime * 2?>";
var kithe    = "<?=$kithe?>";
var lj_time = 1;
var dq_time = "<?=date("F d,Y H:i:s", strtotime($utime))?>";
var fp_time = "<?=date("F d,Y H:i:s", strtotime($Current_KitheTable[30]))?>";
</script>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/list_all.js" type="text/javascript"></script>
<script language="JavaScript">
function onLoad(){  
var obj_abcd = $("abcd"); 
obj_abcd.value = "<?=$abcd?>";
}
</script>
<body style="min-width: 1200px;width: 100%">
 <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tbody>
    <tr>
    <!--left-->    
    <td width="260" align="center" valign="top"> <?php require_once "list_header.php";?></td>
    <!--right-->
    <td valign="top">
<!--top talbe 外层--        !-->
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="3" class="t_list">
            <form action="main.php" method="get" name="myFORM" id="myFORM">
        <tr>
            <tbody>
                 <!--外层td start-->
                <td colspan="5" align="center" class="t_list_caption">
                         <!--top table 二层-->
                     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="t_list_caption">&nbsp;期数:&nbsp;</td>
                                <td class="t_list_caption"><?=$kithe?></td>
                                <td class="t_list_caption">&nbsp;盘口:&nbsp;</td>
                                <td>
                                <select id="abcd" name="abcd" onChange="document.myFORM.submit();" class="za_select">
                                <option value="">全部</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>     
                                </select>   
                                <input name="action" type="hidden" id="action" value="list_all" />
                                <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                                <input name="vip" type="hidden" id="vip" value="<?=$vip?>" /></td>
                                <td>
                                 <?
                                if ($Current_KitheTable[29] != 0 && $kithe == $Current_Kithe_Num)
                                {?>距离封盘时间:<span style="font-size: 12px; font-weight: bold;" id="daojishi"></span><?}?>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                     <table id="tb1" border="0" cellspacing="1" cellpadding="0"  class="t_list" width="100%">
                            <tr>
                                <td align="center" class="t_list_tr_3">序号</td>
                                <td align="center" class="t_list_tr_3">类型</td>
                                <td align="center" class="t_list_tr_3">注数</td>
                                <td align="center" class="t_list_tr_3">下注总额</td>
                                <td align="center" class="t_list_tr_3">占成</td>
                                </tr>
                                <tr bgcolor="#FFFFFF">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                        
                </td>
            </tbody>
        </tr>
        </form>
        </table>
        </tr>
    </td>
</tr>
</tbody>
</table>
<SCRIPT language=javascript>makeRequest('main.php?action=server_all&uid=<?=$uid?>&vip=<?=$vip?>
&kithe<?=$kithe?>"&abcd="<?=$abcd?>')</script>
<?if ($Current_KitheTable[29] != 0 && $kithe == $Current_Kithe_Num)
{?>
<script src="js/daojishi.js" type="text/javascript">
</script><?}?>
</body>