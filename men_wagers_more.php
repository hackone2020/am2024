<?php
if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
$num = $_GET['num'];
$result =$db1->query( "select * from web_tan  where  kithe='".$Current_Kithe_Num."' and username='".$username."' and num='".$num."' order by id " );
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
}
else
{
    exit( );
}
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
var class2 =  "<?=$bl_class2?>";
var sum_m  = "<?=$sum_m?>";
var number1 = "<?=$number1?>";
var number2 = "<?=$number2?>";

<?
if ( $rate1 != "" )
{
?>
var rate1 =  new Array();
   <? foreach ( $rate1 as $key => $val ){?>
       rate1["<?=$key?>"]=new Array("<?=$val?>");
    <?}
}
if ( $rate2 != "" )
{
	?>
  var rate2 =    new Array();
   <? foreach ( $rate2 as $key => $val )
    { ?>
      rate2["<?=$key?>"]=new Array("<?=$val?>");
   <? }
}
?>
</script>
<script src="js/men_wagers_more.js" type="text/javascript"></script>
<link href="css/main.css" type="text/css" rel="stylesheet" />
<body  class="bgcoloruserx">
	<table width="100%" border="0" align="center" cellpadding="4" cellspacing="4"><tr style="font-family: Tahoma; font-size: 12px">
	<td height="43" align="left"><table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td height="20" align="center"><b><?=$bl_class1.":".$bl_class2?>&nbsp;内容：<?=$bl_class3?></b>
			</td>
		</tr>
	</table>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="center"><font color='blue' class='fontsize'>
<script>show();</script></font></td>
</tr></table></td></tr></table></body>