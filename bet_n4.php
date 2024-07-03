<?php
if ( !defined( "KK_VER" ) )
{
    exit( "无效的访问" );
}
if ( $_GET['class2'] == "" )
{
    echo "<script>alert('非法进入!');parent.main.location.href='main.php?action=bet_tm&uid=".$uid."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $ty != 0 )
{
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$result = $db1->query( "select count(*) from web_agent  where ( kauser='".$dai."' or kauser='".$zong."' or kauser='".$guan."' or kauser='".$dagu."') and ty=1  order by id desc" );
$num1 = $result->fetch_array();
$num=$num1[0];
if ( $num != 0 )
{
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$class2 = $_GET['class2'];
$rtype = $_POST['rtype'];
$lmlx = $_POST['lmlx'];
$sum_sum = $_POST['Num_1'];
$rate_temp1 = 8888;
$rate_temp2 = 8888;
$class1_temp = $class2_temp = $class3_temp = $text1 = "";
$sum_count = 0;
if ( $sum_sum < 0 || $sum_sum == "" || !is_numeric( $sum_sum ) || $lmlx == "" || $rtype == "" )
{
    echo "<script>alert('对不起,系统异常!');window.open('index.php','_top')</script>";
    echo "</HTML>";
    exit( );
}
switch ( $rtype )
{
    case "0" :
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=".$uid."&lx=0";
        $class2 = "四全中";
        $class1_temp = "连码";
        $class2_temp = "四全中";
        $bl_dslb = "LM4QZ";
        $type_max = 10;
        $type_min = 4;
        break;
    case "1" :
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=".$uid."&lx=1";
        $class2 = "三全中";
        $class1_temp = "连码";
        $class2_temp = "三全中";
        $bl_dslb = "LM3QZ";
        $type_max = 10;
        $type_min = 3;
        break;
    case "2" :
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=".$uid."&lx=2";
        $class2 = "三中二";
        $class1_temp = "连码";
        $class2_temp = "三中二";
        $bl_dslb = "LM3Z2";
        $type_max = 10;
        $type_min = 3;
        break;
    case "3" :
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=".$uid."&lx=3";
        $class2 = "二全中";
        $class1_temp = "连码";
        $class2_temp = "二全中";
        $bl_dslb = "LM2QZ";
        $type_max = 10;
        $type_min = 2;
        break;
    case "4" :
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=".$uid."&lx=4";
        $class2 = "二中特";
        $class1_temp = "连码";
        $class2_temp = "二中特";
        $bl_dslb = "LM2ZT";
        $type_max = 10;
        $type_min = 2;
        break;
    case "5" :
        $XF = 15;
        $urlurl = "main.php?action=bet_lm&uid=".$uid."&lx=5";
        $class2 = "特串";
        $class1_temp = "连码";
        $class2_temp = "特串";
        $bl_dslb = "LMTC";
        $type_max = 10;
        $type_min = 2;
        break;
    default :
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特A";
        $XF = 11;
        //echo "<script>window.open('index.php','_top')</script>";
        //echo "</HTML>";
        //exit( );
        break;
}
if ( $Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0 )
{
    echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=".$uid."&lx=2';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $lmlx == 1 || $lmlx == 2 )
{
    $n = 0;
    $t = 1;
    for ( ; $t <= 49; $t += 1 )
    {
        if ( $_POST["num".$t] != "" )
        {
            $number1 .= $t.",";
            $n += 1;
        }
    }
    $class3_temp = $number1;
    $bl_lmlx = 0;
}
$result = $db1->query( "SELECT ID,m_number FROM web_sxnumber WHERE ID>=1 && ID<=12 Order By ID" );
$sxtable_temp = array( );
$x = 0;
while ( $Image = $result->fetch_array() )
{
    $sxtable_temp[$Image['ID']] = $Image['m_number'];
    ++$x;
}

if ( $lmlx == 3 )
{
    $n2_1 = $_POST['n2_1'];
    $n2_2 = $_POST['n2_2'];
    if ( $n2_1 != "" && 1 <= $n2_1 && $n2_1 <= 12 )
    {
        $number1 = $sxtable_temp[$n2_1];
        $number1_array = explode( ",", $number1 );
        $number1_count = count( $number1_array );
        $number1 = "";
        $j = 0;
        for ( ; $j < $number1_count; $j += 1 )
        {
            $number1_array[$j] = $number1_array[$j] < 10 ? $number1_array[$j] % 10 : $number1_array[$j] ;
            if ( $number1_count - $j == 1 )
            {
                $number1 .= $number1_array[$j];
            }
            else
            {
                $number1 .= $number1_array[$j].",";
            }
        }
        $n1 = $number1_count;
    }
    if ( $n2_2 != "" && 1 <= $n2_2 && $n2_2 <= 12 )
    {
        $number2 = $sxtable_temp[$n2_2];
        $number2_array = explode( ",", $number2 );
        $number2_count = count( $number2_array );
        $number2 = "";
        $j = 0;
        for ( ; $j < $number2_count; $j += 1 )
        {
            $number2_array[$j] = $number2_array[$j] < 10 ? $number2_array[$j] % 10 : $number2_array[$j] ;
            if ( $number2_count - $j == 1 )
            {
                $number2 .= $number2_array[$j];
            }
            else
            {
                $number2 .= $number2_array[$j].",";
            }
        }
        $m1 = $number2_count;
    }
    $n = $n1 + $m1;
    $class3_temp = $number2."碰".$number1;
    $bl_lmlx = 1;
}
if ( $lmlx == 4 )
{
    $n3_1 = $_POST['n3_1'];
    $n3_2 = $_POST['n3_2'];
    switch ( $n3_1 )
    {
        case "10" :
            $n1 = 5;
            $number1 = "9,19,29,39,49";
            break;
        case "9" :
            $n1 = 5;
            $number1 = "8,18,28,38,48";
            break;
        case "8" :
            $n1 = 5;
            $number1 = "7,17,27,37,47";
            break;
        case "7" :
            $n1 = 5;
            $number1 = "6,16,26,36,46";
            break;
        case "6" :
            $n1 = 5;
            $number1 = "5,15,25,35,45";
            break;
        case "5" :
            $n1 = 5;
            $number1 = "4,14,24,34,44";
            break;
        case "4" :
            $n1 = 5;
            $number1 = "3,13,23,33,43";
            break;
        case "3" :
            $n1 = 5;
            $number1 = "2,12,22,32,42";
            break;
        case "2" :
            $number1 = "1,11,21,31,41";
            $n1 = 5;
            break;
        case "1" :
            $number1 = "10,20,30,40";
            $n1 = 4;
            break;
        default :
            break;
    }
    switch ( $n3_2 )
    {
        case "10" :
            $m1 = 5;
            $number2 = "9,19,29,39,49";
            break;
        case "9" :
            $m1 = 5;
            $number2 = "8,18,28,38,48";
            break;
        case "8" :
            $m1 = 5;
            $number2 = "7,17,27,37,47";
            break;
        case "7" :
            $m1 = 5;
            $number2 = "6,16,26,36,46";
            break;
        case "6" :
            $m1 = 5;
            $number2 = "5,15,25,35,45";
            break;
        case "5" :
            $m1 = 5;
            $number2 = "4,14,24,34,44";
            break;
        case "4" :
            $m1 = 5;
            $number2 = "3,13,23,33,43";
            break;
        case "3" :
            $m1 = 5;
            $number2 = "2,12,22,32,42";
            break;
        case "2" :
            $number2 = "1,11,21,31,41";
            $m1 = 5;
            break;
        case "1" :
            $number2 = "10,20,30,40";
            $m1 = 4;
            break;
        default :
            break;
    }
    $n = $n1 + $m1;
    $class3_temp = $number2."碰".$number1;
    $bl_lmlx = 1;
}
if ( $lmlx == 5 )
{
    $n4_1 = $_POST['n4_1'];
    $n4_2 = $_POST['n4_2'];
    switch ( $n4_2 )
    {
        case "10" :
            $m1 = 5;
            $number2 = "9,19,29,39,49";
            break;
        case "9" :
            $m1 = 5;
            $number2 = "8,18,28,38,48";
            break;
        case "8" :
            $m1 = 5;
            $number2 = "7,17,27,37,47";
            break;
        case "7" :
            $m1 = 5;
            $number2 = "6,16,26,36,46";
            break;
        case "6" :
            $m1 = 5;
            $number2 = "5,15,25,35,45";
            break;
        case "5" :
            $m1 = 5;
            $number2 = "4,14,24,34,44";
            break;
        case "4" :
            $m1 = 5;
            $number2 = "3,13,23,33,43";
            break;
        case "3" :
            $m1 = 5;
            $number2 = "2,12,22,32,42";
            break;
        case "2" :
            $number2 = "1,11,21,31,41";
            $m1 = 5;
            break;
        case "1" :
            $number2 = "10,20,30,40";
            $m1 = 4;
            break;
        default :
            break;
    }
    $number2_array = explode( ",", $number2 );
    if ( $n4_1 != "" && 1 <= $n4_1 && $n4_1 <= 12 )
    {
        $number1 = $sxtable_temp[$n4_1];
        $number1_array = explode( ",", $number1 );
        $number1_count = count( $number1_array );
        $number1 = "";
        $n1 = 0;
        $j = 0;
        for ( ; $j < $number1_count; $j++ )
        {
            $number1_array[$j] = $number1_array[$j] < 10 ? $number1_array[$j] % 10 : $number1_array[$j] ;
            if ( $number1 == "" )
            {
                $number1 .= $number1_array[$j];
            }
            else
            {
                $number1 .= ",".$number1_array[$j];
            }
            $n1 += 1;
        }
    }
    $n = $n1 + $m1;
    $class3_temp = $number2."碰".$number1;
    $bl_lmlx = 1;
}
if ( $lmlx == 6 )
{
    $n1 = 0;
    $m1 = 0;
    $number1 = "";
    $t = 1;
    for ( ; $t <= 49; $t += 1 )
    {
        if ( $_POST["zy1_num".$t] != "" )
        {
            if ( $number1 == "" )
            {
                $number1 .= $t;
            }
            else
            {
                $number1 .= ",".$t;
            }
            $n1 += 1;
        }
    }
    $number2 = "";
    $t = 1;
    for ( ; $t <= 49; $t += 1 )
    {
        if ( $_POST["zy2_num".$t] != "" )
        {
            if ( $number2 == "" )
            {
                $number2 .= $t;
            }
            else
            {
                $number2 .= ",".$t;
            }
            $m1 += 1;
        }
    }
    $n = $n1 + $m1;
    $class3_temp = $number2."碰".$number1;
    $bl_lmlx = 1;
}
if ( $rtype == "0" )
{
    $zs = $n * ( $n - 1 ) * ( $n - 2 ) * ( $n - 3 ) / 24;
}
if ( $rtype == "1" )
{
    if ( $lmlx == 2 )
    {
        $mama = "1,1,1";
        $number2 = $_POST['dan1'].",".$_POST['dan2'];
        $mu = explode( ",", $number1 );
        $class3_temp = $number2."拖".$number1;
        $bl_lmlx = 2;
        $t = 0;
        for ( ; $t < count( $mu ) - 1; $t += 1 )
        {
            $mama .= "/".$mu[$t].",".$number2;
        }
        $ff = explode( "/", $mama );
        $zzz = "/1,1,1";
        $p = 1;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            $k = 0;
            for ( ; $k <= 2; $k += 1 )
            {
                $t = 0;
                for ( ; $t <= 1; $t += 1 )
                {
                    if ( intval( $un[$t + 1] ) < intval( $un[$t] ) )
                    {
                        $tmp = $un[$t + 1];
                        $un[$t + 1] = $un[$t];
                        $un[$t] = $tmp;
                    }
                }
            }
            $x = $un[0].",".$un[1].",".$un[2];
            $zzz = $zzz."/".$x;
        }
        $zs = $n;
    }
    else
    {
        $mu = explode( ",", $number1 );
        $mamama = "1,1,1";
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            $t = 0;
            for ( ; $t < count( $mu ) - 1; $t += 1 )
            {
                if ( $f != $t && $f < $t )
                {
                    $mama = $mama."/".$mu[$f].",".$mu[$t];
                }
            }
        }
        $ma = explode( "/", $mama );
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            for ( ; $t < count( $ma ) - 1; $t += 1 )
            {
                $ma11 = explode( ",", $ma[$t] );
                if ( !( $ma11[0] != $mu[$f] && $ma11[1] != $mu[$f] ) || !( $f != $t && $f < $t ) )
                {
                    $mamama = $mamama."#".$ma[$t].",".$mu[$f];
                }
            }
        }
        $ff = explode( "#", $mamama );
        $p = 0;
        for ( ; $p < count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            $k = 0;
            for ( ; $k <= 2; $k += 1 )
            {
                $f = 0;
                for ( ; $f <= 1; $f += 1 )
                {
                    if ( $un[$f + 1] < $un[$f] )
                    {
                        $tmp = $un[$f + 1];
                        $un[$f + 1] = $un[$f];
                        $un[$f] = $tmp;
                    }
                }
            }
            $ff[$p] = $un[0].",".$un[1].",".$un[2];
        }
        $f = 0;
        for ( ; $f <= count( $ff ); $f += 1 )
        {
            $zzz = $zzz."/".$ff[$f];
        }
        $zs = $n * ( $n - 1 ) * ( $n - 2 ) / 6;
    }
}
if ( $rtype == "2" )
{
    if ( $lmlx == 2 )
    {
        $mama = "1,1,1";
        $number2 = $_POST['dan1'].",".$_POST['dan2'];
        $class3_temp = $number2."拖".$number1;
        $bl_lmlx = 2;
        $mu = explode( ",", $number1 );
        $t = 0;
        for ( ; $t < count( $mu ) - 1; $t += 1 )
        {
            $mama .= "/".$mu[$t].",".$number2;
        }
        $ff = explode( "/", $mama );
        $zzz = "/1,1,1";
        $p = 1;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            $k = 0;
            for ( ; $k <= 2; $k += 1 )
            {
                $t = 0;
                for ( ; $t <= 1; $t += 1 )
                {
                    if ( intval( $un[$t + 1] ) < intval( $un[$t] ) )
                    {
                        $tmp = $un[$t + 1];
                        $un[$t + 1] = $un[$t];
                        $un[$t] = $tmp;
                    }
                }
            }
            $x = $un[0].",".$un[1].",".$un[2];
            $zzz = $zzz."/".$x;
        }
        $zs = $n;
    }
    else
    {
        $mu = explode( ",", $number1 );
        $mamama = "1,1,1";
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            $t = 0;
            for ( ; $t < count( $mu ) - 1; $t += 1 )
            {
                if ( $f != $t && $f < $t )
                {
                    $mama = $mama."/".$mu[$f].",".$mu[$t];
                }
            }
        }
        $ma = explode( "/", $mama );
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            for ( ; $t < count( $ma ) - 1; $t += 1 )
            {
                $ma11 = explode( ",", $ma[$t] );
                if ( !( $ma11[0] != $mu[$f] && $ma11[1] != $mu[$f] ) || !( $f != $t && $f < $t ) )
                {
                    $mamama = $mamama."#".$ma[$t].",".$mu[$f];
                }
            }
        }
        $ff = explode( "#", $mamama );
        $p = 0;
        for ( ; $p < count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            $k = 0;
            for ( ; $k <= 2; $k += 1 )
            {
                $f = 0;
                for ( ; $f <= 1; $f += 1 )
                {
                    if ( $un[$f + 1] < $un[$f] )
                    {
                        $tmp = $un[$f + 1];
                        $un[$f + 1] = $un[$f];
                        $un[$f] = $tmp;
                    }
                }
            }
            $ff[$p] = $un[0].",".$un[1].",".$un[2];
        }
        $f = 0;
        for ( ; $f <= count( $ff ); $f += 1 )
        {
            $zzz = $zzz."/".$ff[$f];
        }
        $zs = $n * ( $n - 1 ) * ( $n - 2 ) / 6;
    }
}
if ( $rtype == "3" )
{
    if ( $lmlx == 1 )
    {
        $mama = "1,1";
        $mu = explode( ",", $number1 );
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            for ( ; $t < count( $mu ) - 1; $t += 1 )
            {
                if ( $f != $t && $f < $t )
                {
                    $mama = $mama."/".$mu[$f].",".$mu[$t];
                }
            }
        }
        $ff = explode( "/", $mama );
        $p = 0;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( intval( $un[$f + 1] ) < intval( $un[$f] ) )
            {
                $tmp = $un[$f + 1];
                $un[$f + 1] = $un[$f];
                $un[$f] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $zs = $n * ( $n - 1 ) / 2;
    }
    if ( $lmlx == 2 )
    {
        $mama = "1,1";
        $mu = explode( ",", $number1 );
        $number2 = $_POST['dan1'];
        $class3_temp = $number2."拖".$number1;
        $bl_lmlx = 2;
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $mama = $mama."/".$mu[$f].",".$_POST['dm1'];
        }
        $ff = explode( "/", $mama );
        $zzz = "/1,1,1";
        $p = 1;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( $un[1] < $un[0] )
            {
                $tmp = $un[1];
                $un[1] = $un[0];
                $un[0] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $zs = $n;
    }
    if ( $lmlx == 3 || $lmlx == 4 || $lmlx == 5 || $lmlx == 6 )
    {
        $mu = explode( ",", $number1 );
        $mu1 = explode( ",", $number2 );
        $mama = "1,1";
        $f = 0;
        for ( ; $f <= count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            for ( ; $t <= count( $mu1 ) - 1; $t += 1 )
            {
                if ( $mu[$f] != $mu1[$t] )
                {
                    $mama = $mama."/".$mu[$f].",".$mu1[$t];
                }
            }
        }
        $ff = explode( "/", $mama );
        $zzz = "/1,1,1";
        $p = 1;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( $un[1] < $un[0] )
            {
                $tmp = $un[1];
                $un[1] = $un[0];
                $un[0] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $myu = explode( "/", $zzz );
        $zs = count( $myu ) - 3;
    }
}
if ( $rtype == "4" )
{
    if ( $lmlx == 1 )
    {
        $mama = "1,1";
        $mu = explode( ",", $number1 );
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            for ( ; $t < count( $mu ) - 1; $t += 1 )
            {
                if ( $f != $t && $f < $t )
                {
                    $mama = $mama."/".$mu[$f].",".$mu[$t];
                }
            }
        }
        $ff = explode( "/", $mama );
        $p = 0;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( intval( $un[$f + 1] ) < intval( $un[$f] ) )
            {
                $tmp = $un[$f + 1];
                $un[$f + 1] = $un[$f];
                $un[$f] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $zs = $n * ( $n - 1 ) / 2;
    }
    if ( $lmlx == 2 )
    {
        $mama = "1,1";
        $mu = explode( ",", $number1 );
        $number2 = $_POST['dan1'];
        $class3_temp = $number2."拖".$number1;
        $bl_lmlx = 2;
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $mama = $mama."/".$mu[$f].",".$_POST['dm1'];
        }
        $ff = explode( "/", $mama );
        $zzz = "/1,1,1";
        $p = 1;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( $un[1] < $un[0] )
            {
                $tmp = $un[1];
                $un[1] = $un[0];
                $un[0] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $zs = $n;
    }
    if ( $lmlx == 3 || $lmlx == 4 || $lmlx == 5 || $lmlx == 6 )
    {
        $mu = explode( ",", $number1 );
        $mu1 = explode( ",", $number2 );
        $mama = "1,1";
        $f = 0;
        for ( ; $f <= count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            for ( ; $t <= count( $mu1 ) - 1; $t += 1 )
            {
                if ( $mu[$f] != $mu1[$t] )
                {
                    $mama = $mama."/".$mu[$f].",".$mu1[$t];
                }
            }
        }
        $ff = explode( "/", $mama );
        $zzz = "/1,1,1";
        $p = 1;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( $un[1] < $un[0] )
            {
                $tmp = $un[1];
                $un[1] = $un[0];
                $un[0] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $myu = explode( "/", $zzz );
        $zs = count( $myu ) - 3;
    }
}
if ( $rtype == "5" )
{
    if ( $lmlx == 1 )
    {
        $mama = "1,1";
        $mu = explode( ",", $number1 );
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            for ( ; $t < count( $mu ) - 1; $t += 1 )
            {
                if ( $f != $t && $f < $t )
                {
                    $mama = $mama."/".$mu[$f].",".$mu[$t];
                }
            }
        }
        $ff = explode( "/", $mama );
        $p = 0;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( intval( $un[$f + 1] ) < intval( $un[$f] ) )
            {
                $tmp = $un[$f + 1];
                $un[$f + 1] = $un[$f];
                $un[$f] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $zs = $n * ( $n - 1 ) / 2;
    }
    if ( $lmlx == 2 )
    {
        $mama = "1,1";
        $mu = explode( ",", $number1 );
        $number2 = $_POST['dan1'];
        $class3_temp = $number2."拖".$number1;
        $bl_lmlx = 2;
        $f = 0;
        for ( ; $f < count( $mu ) - 1; $f += 1 )
        {
            $mama = $mama."/".$mu[$f].",".$_POST['dm1'];
        }
        $ff = explode( "/", $mama );
        $zzz = "/1,1,1";
        $p = 1;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( $un[1] < $un[0] )
            {
                $tmp = $un[1];
                $un[1] = $un[0];
                $un[0] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $zs = $n;
    }
    if ( $lmlx == 3 || $lmlx == 4 || $lmlx == 5 || $lmlx == 6 )
    {
        $mu = explode( ",", $number1 );
        $mu1 = explode( ",", $number2 );
        $mama = "1,1";
        $f = 0;
        for ( ; $f <= count( $mu ) - 1; $f += 1 )
        {
            $t = 0;
            for ( ; $t <= count( $mu1 ) - 1; $t += 1 )
            {
                if ( $mu[$f] != $mu1[$t] )
                {
                    $mama = $mama."/".$mu[$f].",".$mu1[$t];
                }
            }
        }
        $ff = explode( "/", $mama );
        $zzz = "/1,1,1";
        $p = 1;
        for ( ; $p <= count( $ff ); $p += 1 )
        {
            $un = explode( ",", $ff[$p] );
            if ( $un[1] < $un[0] )
            {
                $tmp = $un[1];
                $un[1] = $un[0];
                $un[0] = $tmp;
            }
            $x = $un[0].",".$un[1];
            $zzz = $zzz."/".$x;
        }
        $myu = explode( "/", $zzz );
        $zs = count( $myu ) - 3;
    }
}
$number = $number1;
if ( $lmlx == 2 )
{
    if ( $_POST['dan1'] != "" )
    {
        $number = $number.",".$_POST['dan1'];
    }
    if ( $_POST['dan2'] != "" )
    {
        $number = $number.",".$_POST['dan2'];
    }
}
if ( $lmlx == 3 || $lmlx == 4 || $lmlx == 5 || $lmlx == 6 )
{
    $number = $number1.",".$number2;
}
if ( $zs == 0 )
{
    echo "<script Language=Javascript>alert('号码异常，请重新选择号码!');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$number_array = explode( ",", $number );
$number_count = count( $number_array );
$number_count_temp = 0;
require_once( "include/member.php" );
$config_ds_temp = get_config_ds( );
$user_ds_temp = get_member_ds( $uid, $username );
$bl_temp = get_bl( $class2 );
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
$bl_class1 = $class1_temp;
$bl_class2 = $class2_temp;
$bl_class3 = $class3_temp;
$sum_count = $zs;
$sum_m = $sum_sum * $zs;
$r = 1;
for ( ; $r <= $number_count; ++$r )
{
    $temename = $number_array[$r - 1];
    if ( $temename != "" )
    {
        $bl_locked = $bl_temp[$temename]['locked'];
        $number_count_temp += 1;
        if ( $bl_locked == 1 )
        {
            echo "<script Language=Javascript>alert('对不起,".$class2."[".$bl_temp[$temename]['class3']."]已停押！');parent.main.location.href='".$urlurl."';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
            exit( );
        }
        else
        {
            if ( $bl_temp[$temename]['rate'] < $rate_temp1 )
            {
                $rate_temp1 = $bl_temp[$temename]['rate'];
            }
            if ( ( $rtype == "2" || $rtype == "4" ) && ( $bl_temp[$temename + 49]['rate'] < $rate_temp2 ) )
            {
                $rate_temp2 = $bl_temp[$temename + 49]['rate'];
            }
        }
    }
}
if ( $number_count_temp < $type_min )
{
    echo "<script Language=Javascript>alert('最少选择".$type_min."个号码！');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $type_max < $number_count_temp )
{
    echo "<script Language=Javascript>alert('最多选择".$type_max."个号码！');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
switch ( $abcd )
{
    case "A" :
        $blc = 0;
        break;
    case "B" :
        $blc = $config_ds_temp[$bl_dslb]['blcb'];
        break;
    case "C" :
        $blc = $config_ds_temp[$bl_dslb]['blcc'];
        break;
    case "D" :
        $blc = $config_ds_temp[$bl_dslb]['blcd'];
        break;
    default :
        $blc = 0;
        break;
}
if ( $rtype == "2" || $rtype == "4" )
{
    $rate_temp1 = round( $rate_temp1 + $blc, 3 );
    $rate_temp2 = round( $rate_temp2 + $blc, 3 );
    $bl_rate = $rate_temp2;
    $rate0 = $rate_temp2;
    $text1 = $rate_temp1."/".$rate_temp2;
}
else
{
    $rate_temp1 = round( $rate_temp1 + $blc, 3 );
    $bl_rate = $rate_temp1;
    $rate0 = $rate_temp1;
    $text1 = $rate_temp1;
}
if ( $sum_sum < $xy )
{
    echo "<script Language=Javascript>alert('对不起,最低限额为".$xy."元！');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
if ( $bl_xx < $sum_sum )
{
    echo "<script Language=Javascript>alert('对不起,下注金额超过单注".$bl_xx."元！');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$result2 = $db1->query( "select SUM(sum_m) As sum_umax from web_tan where Kithe='".$Current_Kithe_Num."' and  class2='".$class2."' and username='".$username."'" );
$rs5 = $result2->fetch_assoc();
if ( $rs5['sum_umax'] == "" )
{
    $sum_umax = 0;
}
else
{
    $sum_umax = $rs5['sum_umax'];
}
if ( $bl_xxx < $sum_m + $sum_umax )
{
    echo "<script Language=Javascript>alert('对不起,本期".$bl_class1.":".$bl_class2."累计下注金额:".$sum_umax."元\\n本次提交内容:".$bl_class3." 共".$sum_count."注 每注:".$sum_sum."合计:".$sum_m."\\n超过单项单期限额".$bl_xxx."元！');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/left.js" type="text/javascript"></script>
<SCRIPT language=javascript> 
var uid = "<?=$uid?>";
var xy  = "<?=$xy?>";
var bl_xr     = "<?=isset( $bl_xr ) ? intval( $bl_xr ) : 0?>";
var bl_xx     = "<?=$bl_xx?>";
var bl_xxx    ="<?=$bl_xxx?>";
</script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">
<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="dengtai">
        <tbody bgcolor="#ffffff">
        <tr>
            <td align="center" style="font-size: 12px; font-weight: bold;" >正在下注,请稍候...</td>
        </tr>
        </tbody>
    </table> 
    <form action="main.php?action=bet_save_n4&uid=<?= $uid ?>&class2=<?= $class2 ?>" method="post" name="form1" id="form1"
        onSubmit="return LMSubChk()">
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tbody bgcolor="#ffffff" align="center">
            <Tr>
            <td colspan="2" align="center" class="t_list_caption">会员信息：</td>
            </Tr>
            <tr>
                <td width="50%">会员账号：</td>
                <td width="50%" align="center" id="userLoginID"><?= $username ?></td>
            </tr>
            <tr>
                <td width="50%">信用额度：</td>
                <td width="50%" id="userMoney" align="center" style="font-weight: bold;">￥<?= $cs ?></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <span id="qishu" class="qishu">期数<?= $Current_Kithe_Num ?></span>
                </td>
            </tr>
            <tr>
                <td id="leixing" colspan="2" >
                    <?= $bl_class1 ?>-<?= $bl_class2 ?>
                </td>
            </tr>
            <tr>
                <td id="peilv" colspan="2" >赔率：<font color='red'>
                        <?= $text1 ?>
                    </font><input name="rate_1" type="hidden" value="<?= $rate0 ?>" /></td>
            </tr>
            <tr>
                <td id="number" colspan="2"><?= $bl_class3 ?></td>
            </tr>
            <tr>
                <td id="numbersum" colspan="2" >共<?= $sum_count ?>组</td>
            </tr>
            <tr>
                <td id="sum" colspan="2" >下注金额：
                    <br>
                    每组<?= $sum_sum ?>/总共<?= $sum_m ?><input name="Num_1" type="hidden" value="<?= $sum_m ?>" />
                    <input name="Num_dan" type="hidden" value="<?= $sum_sum ?>" />
                    <input name="ioradio" type="hidden" value="<?= $sum_count ?>" />
                    <input type="hidden" value="<?= $number1 ?>" name="number1" />
                    <input type="hidden" value="<?= $number2 ?>" name="number2" />
                    <input type="hidden" value="<?= $rtype ?>" name="rtype" />
                    <input type="hidden" value="<?= $bl_lmlx ?>" name="lmlx" />
                </td>
            </tr>
            <tr>
                <td id="oddsmess" colspan="2" style="color: Red; display: none;white-space:nowrap;" class="tdxianxi1">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top:4px; padding-bottom: 4px; border-top: 1px #808080 solid;border-bottom: 1px #808080 solid;">
                    <input type="button" name="btnClear" value="返回" id="btnClear"
                        onClick="javascript:location.href='main.php?action=mem_left&uid=<?= $uid ?>'" class="btn2" />
                    &nbsp;&nbsp;
                    <input type="submit" name="btnsave" value="下注" id="btnsave" class="btn1 submit1" />
                </td>
            </tr>
            <Tr>
                <td colspan="2" align="center" class="t_list_caption">可赢金额</td>
            </Tr>
            <tr>
                <td width="50%" align="right">可赢金额：</td>
                <td width="50%" id="keying" style="color: Red;" align="center"><?= $sum_m * $rate0 ?></td>
            </tr>
            <tr>
                <td width="50%" align="right">最低限额：</td>
                <td width="50%" id="zuidi" align="center"><?= $xy ?></td>
            </tr>
            <tr>
                <td width="50%" align="right">单注限额：</td>
                <td width="50%" id="danzhu" align="center"><?= $bl_xx ?></td>
            </tr>
            <tr>
                <td width="50%" align="right">单项限额：</td>
                <td width="50%" id="danxiang" align="center"><?= $bl_xxx ?></td>
            </tr>
            <tr>
                <td width="50%" align="right">可用信用：</td>
                <td width="50%" id="yiyong" aalign="center">￥<?= $ts ?></td>
            </tr>
        </tbody>
        </table>
    </form>
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" style="margin-top: 6px;">
        <tbody bgcolor="#ffffff">
                <tr align="center">
                 <td colspan="2" align="center">
                    <SPAN  id="daojishi" style="width: 20px; line-height:20px; height:20px;">60</SPAN>
                    <SPAN style="line-height:20px; height:20px;">秒后自动返回</SPAN>
                 </td>   
                </tr>
                <Tr>
                <td align="center" colspan="2"><b><?= $bl_class1 ?>下注确认</b></td>
            </tr>
        </tbody>
        </table>
<script>daojishi();</script></body>

