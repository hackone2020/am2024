<?php

function get_html($cnum, $c1, $c2, $c3, $c4, $c5)
{
    global $uid;
    $html = "";
    switch ($c1) {
        case "过关":
            $number_array = explode(",", $c2);
            $c3_array = explode(",", $c3);
            $number_count = count($number_array) - 1;
            $html = "过关:" . $number_count . "串1" . "<br>";
            $t = 0;
            for (; $t < $number_count; $t += 1) {
                $y = $t * 2;
                $html .= "<font color='red' class='fontsize'>" . $number_array[$t] . "</font>-<font color='green' class='fontsize'>" . $c3_array[$y] . "</font>@<font color='blue' class='fontsize'>" . $c3_array[$y + 1] . "</font><br>";
                break;
            }
        case "连码":
            $html = $c2 . "：<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>共 " . $c4 . " 组 每组: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font>";
            break;
        case "自选不中":
            $html = $c2 . "：<font color='red' class='fontsize'>" . $c3 . "</font>";
            $html .= "<br>共 " . $c4 . " 组 每组: <font color='green' class='fontsize'>" . $c5 / $c4 . "</font>";
            break;
        default:
            $html = $c2 . "：<font color='red' class='fontsize'>" . $c3 . "</font>";
            break;
    }
    return $html;
}
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 && !strpos($flag, "1")) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
include "check_zf.php";
if ($lx == 4) {
    $select_sql = " username!='" . $kauser . "' and dagu='" . $kauser . "' ";
}
if ($lx == 3) {
    $select_sql = " username!='" . $kauser . "' and guan='" . $kauser . "' ";
}
if ($lx == 2) {
    $select_sql = " username!='" . $kauser . "' and zong='" . $kauser . "' ";
}
if ($lx == 1) {
    $select_sql = " username!='" . $kauser . "' and dai='" . $kauser . "' ";
}
$sort = $_GET['sort'];
$orderby = $_GET['orderby'];
$username = $_GET['username'];
switch ($sort) {
    case "adddate":
        $vvv = "adddate";
        break;
    case "sum_m":
        $vvv = "sum_m";
        break;
    default:
        $vvv = "adddate";
        $sort = "adddate";
        break;
}
switch ($orderby) {
    case "desc":
        $vvv2 = "desc";
        break;
    case "asc":
        $vvv2 = "asc";
        break;
    default:
        $vvv2 = "desc";
        $orderby = "desc";
        break;
}
if ($username != "") {
    $term = "and username='" . $username . "' ";
} else {
    $term = "";
}
$pagesize = 25;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_tan  where  " . $select_sql . "  and kithe='" . $Current_Kithe_Num . "' " . $term . "  order by id desc");
$num1=$result->fetch_array();
$num = $num1[0];
$total = $num;
$pagecount = ceil($total / $pagesize);
if ($pagecount < $page) {
    $page = $pagecount;
}
if ($page <= 0) {
    $page = 1;
}
$offset = ($page - 1) * $pagesize;
$pre = $page - 1;
$next = $page + 1;
$first = 1;
$last = $pagecount;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/report_func.js" type="text/javascript"></script>
<script language=javascript>
function onLoad() {
    var obj_orderby = $("orderby"); 
    obj_orderby.value = "<?=$orderby?>";
    var obj_page = $("page");  
    obj_page.value = "<?=$page?>";
    var obj_sort=$("sort");  
    obj_sort.value="<?= $sort?>";
    var obj_username=$("username"); 
    obj_username.value="<?=$username?>";
 }
 </script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;本期</span><span class="font_b">流水注单&nbsp;</span></div>  
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
    <form action="main.php" method="get" name="myFORM" id="myFORM">
    <table border="0" align="right" cellpadding="0" cellspacing="0">
            <tbody><tr>
                <td height="28" style="color:#fff;"> 排序:
                    <select id="sort" name="sort" onChange="document.myFORM.submit();" class="za_select">
                        <option value="adddate">下注时间</option>
                        <option value="sum_m">下注金额</option>
                    </select>
                <select id="orderby" name="orderby" onChange="document.myFORM.submit()"
                        class="za_select">
                        <option value="desc">降幂(由大到小)</option>
                        <option value="asc">升幂(由小到大)</option>
                    </select>
                <span>下注用户:</span>
                    <input name="username" id="username" type=text class="za_text" value="" size="12" maxlength="12">
                <span>总页数:</span>
                    <select id="page" name="page" onChange="document.myFORM.submit()" class="za_select">
                       <? if ($pagecount == 0) {  echo "<option value='0'>0</option>";} else {
    $i = 0;
    for (; $i < $pagecount; ++$i) {
        echo "<option value='" . ($i + 1) . "'>" . ($i + 1) . "</option>";
    }
}?>
                    </select>
                /<?=$pagecount?>&nbsp;页
                    <input name="button2" type="submit" class="za_button" id="button" value="查询">
                    <input name="action" type="hidden" id="action" value="real_list" />
                    <input name="uid" type="hidden" id="uid" value="<?=$uid?>" />
                    <input name="vip" type="hidden" id="vip" value="<?=$vip?>" />
                </td>
            </tr>
        </form>
    </table>
    
 </div></div>   

   <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td class="t_list_caption">单号/时间</td>
            <td class="t_list_caption">期数/盘口</td>
            <td class="t_list_caption">用户</td>
            <td class="t_list_caption">下注内容</td>
            <td class="t_list_caption">赔率</td>
            <td class="t_list_caption">下注金额</td>
            <td class="t_list_caption">退水金额</td>
            <td class="t_list_caption">代理(占成)退水%</td>
            <?
if (1 < $lx) {
    ?>
         <td class="t_list_caption">总代理(占成)退水%</td>
<?}
   
if (2 < $lx) {?>
          <td class="t_list_caption">股东(占成)退水%</td>
<?}
if (3 < $lx) {?>
          <td class="t_list_caption">大股东(占成)退水%</td>
<?}?>
   <td class="t_list_caption">下注类型</td>
<?if ($auto_edit != 1) {?>
       <td class="t_list_caption">下注IP</td>
<?}?>
 </tr>
 <?
$result = $db1->query("select * from web_tan  where  " . $select_sql . "  and kithe='" . $Current_Kithe_Num . "' " . $term . " order by " . $vvv . " " . $vvv2 . " limit " . $offset . "," . $pagesize);
if ($result->num_rows == 0) {
?>
<tr class="">
    <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF"  height="25" colspan="100%" class="t_list_tr_2">暂无下注记录！</td></tr>
<?
} else {
    while ($image = $result->fetch_array()) {
?> <tr <?if ($image['qx'] == 1) {
?> class="delete" <?   }?> onMouseOver="setPointer(this, 0, 'over', '#FFFFFF', '#FFCC66', '#FFCC99');" onMouseOut="setPointer(this, 0, 'out', '#FFFFFF', '#FFCC66', '#FFCC99');">        <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['num']?><br/><font color="green" style="line-height: 14px;"><?=$image['adddate']?></font></td>       
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['kithe']?><br/><font color="red"><?=$image['abcd']?>盘<?=$image['user_ds']?></font></td> 
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['username']?></td>
        <td height="35" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=get_html($image['num'], $image['class1'], $image['class2'], $image['class3'], $image['sz'], $image['sum_m'])?></td>      
        <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">        
        <?
        if ($image['class1'] == "连码" || $image['class1'] == "自选不中") {
            if ($image['class1'] == "自选不中") {
                echo $image['ratelm1'];
            } else {
                if ($image['class2'] == "三中二" || $image['class2'] == "二中特") {
                    echo $image['ratelm1'] . "/" . $image['ratelm2'];
                } else {
                    echo $image['ratelm1'];
                }
            }
        } else {
            echo $image['rate'];
        }
     ?>  </td> 
     <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><font color="#cc0000"><?=round($image['sum_m'], 2)?></font></td>
     <td width="53" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=round($image['sum_m'] * $image['user_ds'] / 100, 2)?></td>
     <td width="63" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['dai']?><br>(<?=round($image['daizc'], 2)?>)<br><?=$image['dai_ds']?></td> 
     <?
        if (1 < $lx) {
?><td width="71" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
<?=$image['zong']?><br>(<?=round($image['zongzc'], 2)?>)<br><?=$image['zong_ds']?></td><?    }
    
        if (2 < $lx) {
?><td width="59" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['guan']?><br>(<?=round($image['guanzc'], 2)?>)<br><?=$image['guan_ds']?></td><? }
      
        if (3 < $lx) {
?><td width="76" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['dagu']?><br>(<?=round($image['daguzc'], 2)?>)<br><?=$image['dagu_ds']?></td><?
        }
?><td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><? if ($image['lx'] == 0) {
            echo "会员下注";
        } else {
            echo get_agent_lx_name($image['lx']) . "走飞";
        }
       ?></td>       
       <?
        if ($auto_edit != 1) {
?><td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><b><font color=blue><?=$image['ip']?></font></b></td><?   }?> </tr>
  <?  }
}?>
        <tr>
            <td height="25" colspan="13" bordercolor="cccccc" bgcolor="#FFFFFF">
                <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" bordercolordark="#FFFFFF"
                    bordercolor="888888">
                    <tr>
                        <td height="26" align="center">
                            <span class="STYLE9">
                                当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录</span>&nbsp;
                            <a href="main.php?action=real_list&uid=<?=$uid?>&vip=<?=vip?>&sort=<?=sort?>&orderby=<?=orderby?>&username=<?=username?>&page=1">首页</a>
                            <a href="main.php?action=real_list&uid=<?=$uid?>&vip=<?=$vip?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page=<?=$pre?>">上一页</a>
                            <a href="main.php?action=real_list&uid=<?=$uid?>&vip=<?=$vip?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page=<?=$next?>">下一页</a>
                            <a href="main.php?action=real_list&uid=<?=$uid?>&vip=<?=$vip?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page=<?=$last?>"></a>末页 </a>
                            <select name="page2" onChange="location.href='main.php?action=real_list&uid=<?=$uid?>&vip=<?=$vip?>&sort=<?=$sort?>&orderby=<?=$orderby?>&username=<?=$username?>&page='+this.options[selectedIndex].value">

                           <?     $i = 1;
                                for (; $i <= $pagecount; ++$i) { 
                                ?>
                                <option value="<?=$i?>" <? if ($page==$i) { echo "selected" ; }?>>第<?$i?>页</option><?} ?></select>&nbsp;
                        </td>
                </tr>
                </tbody>
            </table><!--table3 外层--        !-->  
            </td>
            
        </tr>
    </form>
</table><!--table2 外层--        !-->  



    </td>
    </tr>
    </tbody>
    </table><!--table1 end-->      
    






                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>