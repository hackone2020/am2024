<?php
if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
$num = $_GET['num'];
$kithe = $_GET['kithe'];
if ( $kithe == "" || $num == "" )
{
    exit( "无效的访问" );
}
$result = $db1->query( "select * from web_tans  where  kithe='".$kithe."' and username='".$username."' and num='".$num."' and visible=1  order by id " );
if ( $result->num_rows == 1 )
{
    $rs = $result->fetch_array();
    $bl_class1 = $rs['class1'];
    $bl_class2 = $rs['class2'];
    $bl_class3 = $rs['class3'];
    $sum_m = $rs['sum_m'];
    $lmlx = $rs['lmlx'];
    $sz = $rs['sz'];
    $bl_class5 = $rs['class5'];
    $bl_win = $rs['win'];
}
else
{
    exit( );
}
$resultbb = $db1->query( "select * from web_kithe where nn=".$kithe." order by id desc LIMIT 1" );
$row = $resultbb->fetch_array();
$na = $row['na'];
$n1 = $row['n1'];
$n2 = $row['n2'];
$n3 = $row['n3'];
$n4 = $row['n4'];
$n5 = $row['n5'];
$n6 = $row['n6'];
if ( $bl_class2 == "三中二" || $bl_class2 == "二中特" )
{
    $rate1 = array( );
    $rate2 = array( );
    $bl_array = explode( "@", $bl_class5 );
    $bl_array = $bl_array[1];
    $bl_array = explode( "#", $bl_array );
    $bl_count = count( $bl_array ) - 1;
    $bl_array_temp = array( );
    $bl_temp = "";
    if ( $bl_class2 == "三中二" )
    {
        $bl_win = "中二(".str_replace( "+", "),中三(", $bl_win ).")";
    }
    else
    {
        $bl_win = "中特(".str_replace( "+", "),中二(", $bl_win ).")";
    }
    $r = 0;
    for ( ; $r < $bl_count; $r++ )
    {
        if ( $bl_array[$r] != "" )
        {
            $bl_temp = $bl_array[$r];
            $bl_temp = str_replace( "/", "|", $bl_temp );
            $bl_array_temp = explode( "|", $bl_temp );
            $rate1[$bl_array_temp[1]] = $bl_array_temp[2];
            $rate2[$bl_array_temp[1]] = $bl_array_temp[3];
        }
    }
}
else
{
    $rate1 = array( );
    $bl_array = explode( "@", $bl_class5 );
    $bl_array = $bl_array[1];
    $bl_array = explode( "#", $bl_array );
    $bl_count = count( $bl_array ) - 1;
    $bl_array_temp = array( );
    $bl_temp = "";
    $r = 0;
    for ( ; $r < $bl_count; $r++ )
    {
        if ( $bl_array[$r] != "" )
        {
            $bl_temp = $bl_array[$r];
            $bl_temp = str_replace( "/", "|", $bl_temp );
            $bl_array_temp = explode( "|", $bl_temp );
            $rate1[$bl_array_temp[1]] = $bl_array_temp[2];
            $rate2[$bl_array_temp[1]] = 0;
        }
    }
}
if ( $lmlx == 0 )
{
    $number1 = $bl_class3;
    $number2 = "";
}
if ( $lmlx == 1 )
{
    $number_array = explode( "碰", $bl_class3 );
    $number2 = $number_array[0];
    $number1 = $number_array[1];
}
if ( $lmlx == 2 )
{
    $number_array = explode( "拖", $bl_class3 );
    $number2 = $number_array[0];
    $number1 = $number_array[1];
}
?>
<script src="js/function.js" type="text/javascript"></script>
<script>
var lmlx = "<?=$lmlx?>";
var class2 = "<?=$bl_class2?>";
var sum_m  = "<?=$sum_m?>";
var number1 = "<?=$number1?>";
var number2 = "<?=$number2?>";
var n1 = "<?=$n1?>";
var n2 = "<?=$n2?>";
var n3 = "<?=$n3?>";
var n4 = "<?=$n4?>";
var n5 = "<?=$n5?>";
var n6 = "<?=$n6?>";
var na = "<?=$na?>";
<?
if ( $rate1 != "" )
{
 ?>
 var rate1 =    new Array();
 <?   foreach ( $rate1 as $key => $val )
    {
 ?>
  rate1["<?=$key?>"]=new Array("<?=$val?>");
<? 
   }
}
if ( $rate2 != "" )
{?>
    var rate2 =    new Array();
 <?
    foreach ( $rate2 as $key => $val )
    {
  ?>  
  rate2["<?=$key?>"]=new Array("<?=$val?>");
<? 
   }
}?>
</script>
<link rel="stylesheet" href="/member/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/men_wagers_more.js" type="text/javascript"></script>
<style>
#D_lay{position:fixed;top:0;left:0;width:100%;height:100%;background:#000;opacity:0.5;filter:alpha(opacity=50);display:none;}
#D_win{position:absolute;top:50%;left:50%;width:400px;height:200px;background:#fff;border:1px solid #ccd6e2;margin:-102px 0 0 -202px;display:none;}
</style>
<body marginwidth="0" marginheight="0">
    <div id="D_lay" style="display: block;"></div>
    <div id="d_win" style="width: 350px; height: 240px; margin-left: -175px; margin-top: -120px; display: block;">
        <div id="caption" style="background-image: url(/images/t_caption_bg.jpg);height:26px;line-height:26px;color:#333;border-bottom-style:solid;border-bottom-color:#ccd6e2;border-bottom-width:1px;">
            
            <div id="title" style="padding-left:4px;width:272px;height:26px;line-height:26px;float:left;"><?=$bl_class1.":".$bl_class2?></div>
            <div id="close" style="width:26px;height:26px;line-height:26px;float:right;text-align:center;"><?=$bl_class3?>
            <img src="/images/close.png" style="cursor:pointer;margin-top:4px;" onclick="CloseDiv();" width="18" height="18" title="关闭"></div>
        </div>

    </div>
    
    
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_son" id="bet_tb">
     <tbody>
         <tr>
		 <td height="27" align="center" class="t_list_tr_2"></td>
		 </tr>

		<tr>
			<td height="20" align="center"><?=$kithe?>期开奖结果:<?=$n1."+".$n2."+".$n3."+".$n4."+".$n5."+".$n6."&nbsp;T:".$na?></td>    
		</tr>
		<tr>
			<td height="20" align="center">本注中奖组数:<?=$bl_win?></td>
		</tr>
		<tr>
			<td align="center"><font color='blue' class='fontsize'><script>show();</script></font></td>
		</tr>
		</tbody>
	</table>
		
</body>
