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
    exit( "��Ч�ķ���" );
}
include( "class/text_cache.php" );
$cache = new cache( 2 );
$temp = $cache->cacheCheck( "cache/".$dblabel."/member/".$uid."/mem_left_list.html" );
if ( $temp != true )
{
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n\t<tr>\r\n\t\t<td class=\"toptablebodyx\">\r\n\t\t\t<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"toptable1\">\r\n\t\t\t\t<tr class=\"background\">\r\n\t\t\t\t\t<td nowrap>\r\n\t\t\t\t\t\tʱ��\r\n\t\t\t\t\t</td>\r\n\t\t\t\t\t<td>\r\n\t\t\t\t\t\t����\r\n\t\t\t\t\t</td>\r\n\t\t\t\t\t<td nowrap style=\"width: 40px;\">\r\n\t\t\t\t\t\t����\r\n\t\t\t\t\t</td>\r\n\t\t\t\t\t<td nowrap style=\"white-space:nowrap;\">\r\n\t\t\t\t\t\t���\r\n\t\t\t\t\t</td";
    echo ">\r\n\t\t\t\t</tr>\r\n\t\t\t";
    $result = $db1->query( "select *  from   web_tan  where  kithe='".$Current_Kithe_Num."' and username='".$username."'  order by id desc  limit 10" );
    if($result->num_rows == 0 )
    {
        echo "<td colspan=\"4\" align=\"center\">���޽��׼�¼!</td>";
    }
    while ( $rs = $result->fetch_array() )
    {
        echo "\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td nowrap>\r\n\t\t\t\t\t\t\t";
        echo substr( $rs['adddate'], 10, 6 );
        echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t<td class=\"wrap1\">\r\n\t\t\t\t\t\t\t";
        if ( $rs['class1'] == "����" )
        {
            $number_array = explode( ",", $rs['class2'] );
            $number_count = count( $number_array ) - 1;
            echo "����".$number_count."��1";
        }
        else
        {
            echo $rs['class2'].":".$rs['class3'];
        }
        echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t<td nowrap>\r\n\t\t\t\t\t\t\t";
        if ( $rs['class1'] == "����" || $rs['class1'] == "��ѡ����" )
        {
            if ( $rs['class1'] == "��ѡ����" )
            {
                echo $rs['ratelm1'];
            }
            else
            {
                if ( $rs['class2'] == "���ж�" || $rs['class2'] == "������" )
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
