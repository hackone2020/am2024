<?php

function get_tbnum( $c )
{
    if ( $c % 2 )
    {
        return 2;
    }
    else
    {
        return 1;
    }
}

function get_html( $cnum, $c1, $c2, $c3, $c4, $c5 )
{
    global $uid;
    $html = "";
    switch ( $c1 )
    {
        case "过关" :
            $number_array = explode( ",", $c2 );
            $c3_array = explode( ",", $c3 );
            $number_count = count( $number_array ) - 1;
            $html = "过关:".$number_count."串1"."<br>";
            $t = 0;
            for ( ; $t < $number_count; $t += 1 )
            {
                $y = $t * 2;
                $html .= "<font color='red' class='fontsize'>".$number_array[$t]."</font>-<font color='green' class='fontsize'>".$c3_array[$y]."</font>@<font color='blue' class='fontsize'>".$c3_array[$y + 1]."</font><br>";
            }
            break;
        case "连码" :
            $url = "main.php?action=men_wagers_more&uid=".$uid."&num=".$cnum;
            $html = "<a  href='#' onclick=\"OpenDiv(500,300,'".$url."');\" >".$c2."：<font color='red' class='fontsize'>".$c3."</font>";
            $html .= "<br>共 ".$c4." 组 每组: <font color='green' class='fontsize'>".$c5 / $c4."</font></a>";
            break;
        case "自选不中" :
            $url = "main.php?action=men_wagers_more&uid=".$uid."&num=".$cnum;
            $html = "<a  href='#' onclick=\"OpenDiv(500,300,'".$url."');\" >".$c2."：<font color='red' class='fontsize'>".$c3."</font>";
            $html .= "<br>共 ".$c4." 组 每组: <font color='green' class='fontsize'>".$c5 / $c4."</font></a>";
            break;
        default :
            $html = $c2."：<font color='red' class='fontsize'>".$c3."</font>";
            break;
    }
    return $html;
}

if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
require_once( "include/page.php" );
$pagesize = 25;
$page = isset( $_GET['page'] ) ? intval( $_GET['page'] ) : 1;
$result = $db1->query( "select count(*) as num,sum(sz) as sz,sum(sum_m) as sum_m,sum(sum_m*user_ds/100) as ds from web_tan where  username='".$username."' and kithe='".$Current_Kithe_Num."' order by id desc" );
$rs = $result->fetch_array();
$num = $rs['num'];
$total = $num;
$pagecount = ceil( $total / $pagesize );
if ( $pagecount < $page )
{
    $page = $pagecount;
}
if ( $page <= 0 )
{
    $page = 1;
}
$offset = ( $page - 1 ) * $pagesize;
$pre = $page - 1;
$next = $page + 1;
$first = 1;
$last = $pagecount;
$all_sz = $rs['sz'];
$all_sum_m = $rs['sum_m'];
$result = $db1->query("select * from web_tan  where  kithe='".$Current_Kithe_Num."' and username='".$username."'  order by id desc limit ".$offset.",".$pagesize );
?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/form.js" type="text/javascript"></script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1683715146" type="text/css">
<script>
var url="main.php?action=mem_wagers&uid=<?=$uid?>";
</script>
<style>
#D_lay{position:fixed;top:0;left:0;width:100%;height:100%;background:#fff;opacity:0.5;filter:alpha(opacity=0);display:none;}
#D_win{position:fixed;top:50%;left:50%;width:400px;height:200px;background:#fff;border:1px solid #ccd6e2;margin:-102px 0 0 -202px;display:none;}
</style>
<body marginwidth="0" marginheight="0">
<table width="800" cellpadding="0" cellspacing="0">
  <tbody>
      <tr>
        <td height="22">本期下注明细【总下注共&nbsp;<?=$all_sz?>&nbsp;笔 总额<?=$all_sum_m?>】
        </td>
		 <td width="250" align="right"><?=get_page_html($pagecount,$page )?></td>
		</tr>
	</tbody>	 	
 </table>
<table width="800" border="0" cellpadding="0" cellspacing="1" class="t_list">
		 <tbody>
		     <tr>
		 		<td width="30" nowrap="" class="t_list_caption">序号</td>
		 		<td width="160" nowrap="" class="t_list_caption">单号/时间</td>
		 		<td width="60" nowrap="" class="t_list_caption">退水</td>
                 <td class="t_list_caption">下注内容</td>
                <td width="90" nowrap="" class="t_list_caption">赔率</td>
                <td width="60" nowrap="" class="t_list_caption">下注金额</td>
                <td width="60" nowrap="" class="t_list_caption">退水</td>
                <td width="90" nowrap="" class="t_list_caption">可贏金额</td>
             </tr>
<?
$ii = 0;
$z_sum = 0;
$z_zs = 0;
$z_user = 0;
$z_userds = 0;
if ( $result->num_rows == 0 )
{
    echo "<tr'><td height=\"28\" align=\"center\" bgcolor=\"#FFFFFF\" colspan=8>暂无下注记录！</td></tr>";
    exit();
}
else
{
    while ( $rs = $result->fetch_array())
    {
        ++$ii;
        $z_sum += $rs['sum_m'];
        $z_zs += $rs['sz'];
        $z_userds += $rs['sum_m'] * $rs['user_ds'] / 100;
        $z_user += $rs['sum_m'] * $rs['rate'] + $rs['sum_m'] * $rs['user_ds'] / 100 - $rs['sum_m'];
?>
<tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='#FFFFA2'" onmouseout="javascript:this.bgColor='#ffffff'" class='<?=get_tbnum($ii)?><?  if ( $rs['qx'] == 1 ) { echo " delete"; }
?>'>           
  <td align="center"><?=$ii?></td>
  <td align="center"><?=$rs['num']?><br /><font color="green" style="line-height: 14px;"><?=$rs['adddate']?></font></td>
  <td align="center"><font class="font_g"><?=$rs['user_ds']?><br /><?=$rs['abcd']?>盘</td>
  <td align="center" class="bet"><?=get_html( $rs['num'], $rs['class1'], $rs['class2'], $rs['class3'], $rs['sz'], $rs['sum_m'] )?></td>
  <td align="center">
  <?
        if ( $rs['class1'] == "连码" || $rs['class1'] == "自选不中" )
        {
            if ( $rs['class1'] == "自选不中" )
            {
                echo $rs['ratelm1'];
            }
            else
            {
                if ( $rs['class2'] == "三中二" || $rs['class2'] == "二中特" )
                {
                    echo $rs['ratelm1']."/".$rs['ratelm2'];
                }
                else
                {
                    echo $rs['ratelm1'];
                }
            }
        }
        else
        {
            echo $rs['rate'];
        }
   ?></td>
	<td align="center"><?=$rs['sum_m']?></td>
	<td align="center"><?=$rs['sum_m'] * $rs['user_ds'] / 100?></td>
	<td align="center"> <?=$rs['sum_m'] * $rs['rate'] + $rs['sum_m'] * $rs['user_ds'] / 100 - $rs['sum_m']?></td>
</tr>
   <? }
}?>
<tr>
	<td height="22" colspan="3" align="center" bgcolor="#FFFFFF" class="t_list_tr_2">本页总计:&nbsp;<span id="bishu" class="formtongji1"></span>共:<?=$all_sz?>笔&nbsp;</td>
	<td height="22" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_tr_2"></td>
	<td height="22" align="center" bgcolor="#FFFFFF" class="t_list_tr_2"><span id="jine" class="formtongji1"><?=$z_sum?></span></td>
	<td height="22" align="center" bgcolor="#FFFFFF" class="t_list_tr_2"><span id="tuishui" class="formtongji1"><?=$z_userds?></span></td>
	<td height="22" align="center" bgcolor="#FFFFFF" class="t_list_tr_2"><span id="keying" class="formtongji1"><?=$z_user?></span></td>
</tr>

<tr>
	<td height="28" colspan="9" align="center" bgcolor="#FFFFFF">
	   <?=get_page_html($pagecount,$page)?></td>
</tr>
			</table>
		</td>
	</tr>
</table>
</div>
</body>

