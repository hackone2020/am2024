<?php
/*********************/
/*                   */
/*  Dezend for PHP5  */
/*         NWS       */
/*      Nulled.WS    */
/*                   */
/*********************/

if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
include( "class/text_cache.php" );
$cache = new cache( 2 );
$temp = $cache->cacheCheck( "cache/".$dblabel."/member/".$uid."/mem_left_list.html" );
if ( $temp != true )
{
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n\t<tr>\r\n\t\t<td class=\"toptablebodyx\">\r\n\t\t\t<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"toptable1\">\r\n\t\t\t\t<tr class=\"background\">\r\n\t\t\t\t\t<td nowrap>\r\n\t\t\t\t\t\t时间\r\n\t\t\t\t\t</td>\r\n\t\t\t\t\t<td>\r\n\t\t\t\t\t\t内容\r\n\t\t\t\t\t</td>\r\n\t\t\t\t\t<td nowrap style=\"width: 40px;\">\r\n\t\t\t\t\t\t赔率\r\n\t\t\t\t\t</td>\r\n\t\t\t\t\t<td nowrap style=\"white-space:nowrap;\">\r\n\t\t\t\t\t\t金额\r\n\t\t\t\t\t</td";
    echo ">\r\n\t\t\t\t</tr>\r\n\t\t\t";
    $result = $db1->query( "select *  from   web_tan  where  kithe='".$Current_Kithe_Num."' and username='".$username."'  order by id desc  limit 10" );
    if($result->num_rows == 0 )
    {
        echo "<td colspan=\"4\" align=\"center\">暂无交易记录!</td>";
    }
    while ( $rs = $result->fetch_array() )
    {
        echo "\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td nowrap>\r\n\t\t\t\t\t\t\t";
        echo substr( $rs['adddate'], 10, 6 );
        echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t<td class=\"wrap1\">\r\n\t\t\t\t\t\t\t";
        if ( $rs['class1'] == "过关" )
        {
            $number_array = explode( ",", $rs['class2'] );
            $number_count = count( $number_array ) - 1;
            echo "过关".$number_count."串1";
        }
        else
        {
            echo $rs['class2'].":".$rs['class3'];
        }
        echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t<td nowrap>\r\n\t\t\t\t\t\t\t";
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
                    echo $rs['ratelm1'].",".$rs['ratelm2'];
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
        echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t<td align=\"right\" nowrap>\r\n\t\t\t\t\t\t\t";
        echo $rs['sum_m'];
        echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t";
    }
    echo "\t\t\t</table>\r\n\t\t</td>\r\n\t</tr>\r\n</table>\r\n";
    $cache->caching( );
}
?>
