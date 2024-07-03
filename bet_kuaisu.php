<?php
function get_sx_number($a)
{
    $number_array = explode(",",$a);
    $number_count = count($number_array);
    $number = "";
    $t = 0;
    for ( ; $t < $number_count; $t += 1 )
    {
        $number_array[$t] = $number_array[$t] < 10 ? $number_array[$t] % 10 : $number_array[$t];
        if ( $number == "" )
        {
            $number .= $number_array[$t];
        }
        else
        {
            $number .= ",".$number_array[$t];
        }
    }
    return $number;
}

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
    exit();
}
$result = $db1->query( "select count(*) from web_agent  where ( kauser='".$dai."' or kauser='".$zong."' or kauser='".$guan."' or kauser='".$dagu."') and ty=1  order by id desc" );
$num1 = $result->fetch_array();
$nun =$num1[0];
if ( $num != 0 )
{
    echo "<script>alert('对不起,您暂时不能下注!');window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$class2 = $_GET['class2'];
switch ( $class2 )
{
    case "特A" :
        $XF = 11;
        $bl_dslb = "TMA";
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特A";
        break;
    case "特B" :
        $XF = 11;
        $bl_dslb = "TMB";
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特B";
        break;
    case "正A" :
        $XF = 15;
        $bl_dslb = "ZMA";
        $urlurl = "main.php?action=bet_zm&uid=".$uid."&ids=正A";
        break;
    case "正B" :
        $XF = 15;
        $bl_dslb = "ZMB";
        $urlurl = "main.php?action=bet_zm&uid=".$uid."&ids=正B";
        break;
    case "正1特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正1特";
        break;
    case "正2特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正2特";
        break;
    case "正3特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正3特";
        break;
    case "正4特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正4特";
        break;
    case "正5特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正5特";
        break;
    case "正6特" :
        $XF = 15;
        $bl_dslb = "ZT";
        $urlurl = "main.php?action=bet_zt&uid=".$uid."&ids=正6特";
        break;
    default :
        $urlurl = "main.php?action=bet_tm&uid=".$uid."&ids=特A";
        $XF = 11;
        echo "<script>window.open('index.php','_top')</script>";
        echo "</HTML>";
        exit( );
        break;
}
if ( $Current_KitheTable[29] == 0 || $Current_KitheTable[$XF] == 0 )
{
    echo "<script>alert('对不起,该项目已经封盘!');parent.main.location.href='main.php?action=stop&uid=".$uid."&lx=2';window.location.href='main.php?action=mem_left&uid=".$uid."';</script>";
    exit( );
}
$result = $db1->query( "SELECT sx,m_number FROM web_sxnumber WHERE ID>=1 AND ID<=12 Order By ID" );
$sxtable_temp = array();
$x = 0;
while ($Image = $result->fetch_array())
{
    $sxtable_temp[$Image['sx']] = get_sx_number($Image['m_number']);
    ++$x;
}
$sx_count = $x - 1;
require_once( "include/member.php" );
$user_ds_temp = get_member_ds( $uid, $username );
$bl_xx = $user_ds_temp[$bl_dslb]['xx'];
$bl_xxx = $user_ds_temp[$bl_dslb]['xxx'];
?>
<script language=javascript> 
//号码数组
var allarray = new Array();
</script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/kuaisu.js" type="text/javascript"></script>
<script language=javascript> 
var uid = '<?=$uid?>';
var cs = '<?=$cs?>';
var ts = '<?=$ts?>';
var class2 = '<?=$class2?>';
var xy = '<?=$xy?>';
var bl_xx = '<?=$bl_xx?>';
var bl_xxx = '<?=$bl_xxx?>';
</script>

<body marginwidth="0" marginheight="0">
<? include "template/kuaisu.tpl.php";?>
<script type="text/javascript">
allarray[9]=[<?=$sxtable_temp['牛'].",".$sxtable_temp['马'].",".$sxtable_temp['羊'].",".$sxtable_temp['鸡'].",".$sxtable_temp['狗'].",".$sxtable_temp['猪']?>];
allarray[10]=[<?=$sxtable_temp['鼠'].",".$sxtable_temp['虎'].",".$sxtable_temp['兔'].",".$sxtable_temp['龙'].",".$sxtable_temp['蛇'].",".$sxtable_temp['猴']?>];
allarray[26]=[<?=$sxtable_temp['鼠']?>];    //鼠
allarray[27]=[<?=$sxtable_temp['牛']?>];    //牛
allarray[28]=[<?=$sxtable_temp['虎']?>];    //虎
allarray[29]=[<?=$sxtable_temp['兔']?>];    //兔 
allarray[30]=[<?=$sxtable_temp['龙']?>];    //龙
allarray[31]=[<?=$sxtable_temp['蛇']?>];    //蛇
allarray[32]=[<?=$sxtable_temp['马']?>];    //马
allarray[33]=[<?=$sxtable_temp['羊']?>];    //羊
allarray[34]=[<?=$sxtable_temp['猴']?>];    //猴
allarray[35]=[<?=$sxtable_temp['鸡']?>];    //鸡
allarray[36]=[<?=$sxtable_temp['狗']?>];    //狗
allarray[37]=[<?=$sxtable_temp['猪']?>];    //猪
</script>
<br/>
<br/>
</body>



