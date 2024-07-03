<?php

if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
$vvv = "";
$tb_name = "";
$blbl = "";
$kithe = $Current_Kithe_Num;
$tb_name = "web_tan";
$vvv .= " and kithe='".$kithe."'";
$abcd = $_GET['abcd'];
switch ( $abcd )
{
    case "A" :
        $vvv .= " and abcd='A' ";
        break;
    case "B" :
        $vvv .= " and abcd='B' ";
        break;
    case "C" :
        $vvv .= " and abcd='C' ";
        break;
    case "D" :
        $vvv .= " and abcd='D' ";
        break;
    default :
        break;
}
switch ( $lx )
{
    case "4" :
        $select_sql = " dagu='".$kauser."' ";
        $tb_zd = "daguzc";
        break;
    case "3" :
        $select_sql = " guan='".$kauser."' ";
        $tb_zd = "guanzc";
        break;
    case "2" :
        $select_sql = " zong='".$kauser."' ";
        $tb_zd = "zongzc";
        break;
    case "1" :
        $select_sql = " dai='".$kauser."' ";
        $tb_zd = "daizc";
        break;
    default :
        echo "<center>你没有该权限功能!</center>";
        exit( );
        break;
}
$result = $db1->query( "select ds_lb,ds from  web_config_ds where lx=0 order by id" );
$dstable = array( );
$y = 0;
while ( $row = $result->fetch_assoc() )
{
    $dstable[$y] = $row;
    ++$y;
}
$ds_count = count( $dstable ) - 1;
$result8 = $db1->query( "SELECT ds_lb,sum(if(username<>'".$kauser."',sum_m,-sum_m)) as sum_m,sum(if(username<>'".$kauser."',".$tb_zd.",-sum_m)) as zc_sum,sum(sz) as zs FROM ".$tb_name." WHERE  ".$select_sql." and qx=0 ".$vvv." group by ds_lb order by ds_lb DESC" );
$rs1_table = array( );
while ( $row = $result8->fetch_assoc() )
{
    $rs1_table[$row['ds_lb']] = $row;
}
$rs1_count = count( $rs1_table ) - 1;
$ii = 0;
$z_zs = $z_sum = $z_zcsum = 0;
$i = 0;
for ( ; $i <= $ds_count; $i += 1 )
{
    $sum_m = isset( $rs1_table[$dstable[$i]['ds_lb']]['sum_m'] ) ? round( $rs1_table[$dstable[$i]['ds_lb']]['sum_m'], 2 ) : 0;
    $zc_sum = isset( $rs1_table[$dstable[$i]['ds_lb']]['zc_sum'] ) ? round( $rs1_table[$dstable[$i]['ds_lb']]['zc_sum'], 2 ) : 0;
    $zs = isset( $rs1_table[$dstable[$i]['ds_lb']]['zs'] ) ? $rs1_table[$dstable[$i]['ds_lb']]['zs'] : 0;
    if ( $sum_m != 0 )
    {
        ++$ii;
        $z_zs += $zs;
        $z_sum += $sum_m;
        $z_zcsum += $zc_sum;
        $num_color = "#CC0000";
        $blbl .= "<font size=\"3px\" color=\"".$num_color."\">".$dstable[$i]['ds']."</font>"."@@@".$zs."注@@@".$sum_m."@@@".$zc_sum."###";
    }
}
$blbl .= "0@@@<font color=ff0000>".$z_zs."注</font>@@@<font color=ff0000>".$z_sum."</font>@@@<font color=ff0000>".$z_zcsum."</font>###";
echo $blbl;
?>
