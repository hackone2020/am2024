<?php
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
            continue;
            break;
        case "连码" :
            $html = $c2."：<font color='red' class='fontsize'>".$c3."</font>";
            $html .= "<br>共 ".$c4." 组 每组: <font color='green' class='fontsize'>".$c5 / $c4."</font>";
            break;
        case "自选不中" :
            $html = $c2."：<font color='red' class='fontsize'>".$c3."</font>";
            $html .= "<br>共 ".$c4." 组 每组: <font color='green' class='fontsize'>".$c5 / $c4."</font>";
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
if ( strpos( $flag, "03" ) )
{
}
else
{
    echo "<center>你没有该权限功能!</center>";
    exit( );
}
$vvv = "";
if ( $_GET['kithe'] != "" )
{
    $kithe = $_GET['kithe'];
    if ( $kithe == $Current_Kithe_Num )
    {
        $tb_name = "web_tan";
    }
    else
    {
        $tb_name = "web_tans";
    }
}
else
{
    $kithe = $Current_Kithe_Num;
    $tb_name = "web_tan";
}
$vvv .= " and kithe='".$kithe."' ";
$class1 = $class2 = $class3 = "";
if ( $_GET['class1'] != "" )
{
    $class1 = $arr_type[$_GET['class1']];
    $vvv .= " and class1='".$class1."' ";
}
if ( $_GET['class2'] != "" )
{
    $class2 = $arr_type[$_GET['class2']];
    $vvv .= " and class2='".$class2."' ";
}
if ( $_GET['class3'] != "" )
{
    $class3 = $_GET['class3'];
    $vvv .= " and class3='".$class3."' ";
}
if ( $_GET['lx'] != "" )
{
    $lx = $_GET['lx'];
    $vvv .= " and lx='".$lx."' ";
}
$pagesize = 25;
$page = isset( $_GET['page'] ) ? intval( $_GET['page'] ) : 1;
$result = $db1->query( "select count(*) from ".$tb_name." where 1=1 ".$vvv." order by adddate desc" );
$num1 =  $result->fetch_array();
$num=$num1[0];
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
?>
<link rel="stylesheet" href="css/control_main.css" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">
<table width="710" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="616" class="m_tline">&nbsp;<?if ( $class1 != "过关" ){echo $class1."&nbsp;".$class2."&nbsp;".$class3;}else{echo $class1;}?>－<input name="button" type="button" class="za_button" onClick="javascript:location.reload();" value="更新" />
    </td>
    <td width="110"><img src="images/top_04.gif" width="30" height="24" /></td>
    </tr>
</table>
<table width="710" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
        <td>
            <table width="710" border="0" cellpadding="0" cellspacing="1" bgcolor="006255">
                <tr>
                    <td width="106" height="20" align="center" class="m_title_ft">单号/时间</td>
                    <td width="59" class="m_title_ft">期数/盘口</td>
                    <td width="75" align="center" class="m_title_ft">用户</td>
                    <td width="136" align="center" nowrap="nowrap" class="m_title_ft">下注内容</td>
                    <td width="40" align="center" nowrap="nowrap" class="m_title_ft">赔率</td>
                    <td width="62" align="center" nowrap="nowrap" class="m_title_ft">下注金额</td>
                    <td width="54" align="center" class="m_title_ft">退水金额</td>
                    <td width="61" align="center" nowrap="nowrap" class="m_title_ft">公司(占成)</td>
                    <td width="59" align="center" nowrap="nowrap" class="m_title_ft">下注类型</td>
                    <td width="57" align="center" nowrap="nowrap" class="m_title_ft">下注IP</td>
                </tr>
   <?
    $result = $db1->query( "select * from ".$tb_name." where 1=1 ".$vvv." order by adddate desc limit ".$offset.",".$pagesize );
    if ( $result->num_rows == 0 )
    {
?><tr><td align="center" bordercolor="cccccc" bgcolor="#FFFFFF" colspan="13">暂无下注记录！</td></tr>
    <?
    }else
    {
     while ( $image = $result->fetch_array(  ) )
        {
   ?> <tr <? if ( $image['qx'] == 1 ){?> class="delete"<? }?>>
        <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['num']?><br/><font color="green" style="line-height: 14px;"><?=$image['adddate']?></font></td>
        <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['kithe']?><br/><font color="red"><?=$image['abcd']?>盘<?=$image['user_ds']?> </font></td>
        <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['username']?></td>
        <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=get_html( $image['num'], $image['class1'], $image['class2'], $image['class3'], $image['sz'], $image['sum_m'] )?></td>
        <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
        <?
        if ( $image['class1'] == "连码" || $image['class1'] == "自选不中" )
        {
            if ( $image['class1'] == "自选不中" )
            {
                echo $image['ratelm1'];
            }
            else
            {
                if ( $image['class2'] == "三中二" || $image['class2'] == "二中特" )
                {
                    echo $image['ratelm1']."/".$image['ratelm2'];
                }
                else
                {
                    echo $image['ratelm1'];
                }
            }
        }
        else
        {
            echo $image['rate'];
        }
?> </td>
    <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><font color="#cc0000"><?=$image['sum_m']?></font></td>
    <td width="54" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['sum_m'] * $image['user_ds'] / 100?></td>
    <td align="center" nowrap="nowrap" bordercolor="ccccc" bgcolor="#FFFFFF">(<?=$image['gszc']?>)</td>
    <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><?
        if ( $image['lx'] == 0 )
        {
            echo "会员下注";
        }
        else
        {
            echo get_agent_lx_name( $image['lx'] )."走飞";
        }
?></td>
<td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><b><font color=blue><?=$image['ip']?></font></b></td></tr><? }}?> 
<tr>
<td height="25" colspan="10" bordercolor="cccccc" bgcolor="#FFFFFF"><table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" bordercolordark="#FFFFFF" bordercolor="888888">
<tr>
<td height="26" align="center"><span class="STYLE9">当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录</span>&nbsp;
<select name="page" onChange="location.href='main.php?action=list_look&uid=<?=$uid?>&kithe=<?=$kithe?>&class1=<?=$class1?>&class2=<?=$class2?>&class3=<?=$class3?>&lx=<?=$lx?>&page='+this.options[selectedIndex].value">    <?
$i = 1;
for ( ; $i <= $pagecount; ++$i )
{
?><option value="<?=$i?>" <?   if ( $page == $i ) { echo "selected";}?>>第<?=$i?>页</option>
<?}?>
</select>&nbsp; </td></tr>
</table></td>
</tr>
</table></td>
</tr>
</table>
</body>