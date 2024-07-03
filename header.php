<?php
require_once("include/global.php");
require_once("include/function.php");
// 文本过滤函数
function text_convert($string)
{
    $string = htmlspecialchars($string, ENT_QUOTES, 'GB2312');
    $string = str_replace("<", "&lt;", $string);
    $string = str_replace(">", "&gt;", $string);
    $string = str_replace('"', '\\"', $string);
    $string = preg_replace("/\r?\n/", "", $string);
    return $string;
}
$message = get_config("affice");
$message = str_replace("@webname@", $webname, $message);
$message = str_replace("@webnn@", $Current_Kithe_Num, $message);
$message = str_replace("@webname@", $webname, $message);
$web_date_start = substr($Current_KitheTable['zfbdate1'], 0, 16);
$web_date_end = substr($Current_KitheTable['zfbdate'], 0, 16);
$message = str_replace("@web_date_start@", $web_date_start, $message);
$message = str_replace("@web_date_end@", $web_date_end, $message);
$message = text_convert($message);
$a8 = text_convert(get_config("a8"));
?>
<script type='text/javascript'>
    var autotime = 45000;
    var a8 = "<?= $a8 ?>";
    var uid = "<?= $uid ?>";
</script>
<script src="js/header.js" type="text/javascript"></script>
<!--<link href="css/main.css" type="text/css" rel="stylesheet" />-->
<link rel="stylesheet" href="/member/stylesheets/header.css?t=1683715146" type="text/css">

<body marginwidth="0" marginheight="0">
    <div class="main_top">
        <div class="logo floatleft" style="position:relative;">
            <img src="/images/logo1.png" width="235" height="85" alt="">
            <font class="text-gradient-3">
                <b>&nbsp;新澳门</b>
            </font>
        </div>
        <div class="gonggao floatleft">
            <select style="width:200px;" onchange="SelectLine(this.selectedIndex)">
                <option>请选择线路:</option>
                <option>重新测速</option>
            </select>
            <a class="bold color-lv" href="javascript:void(0);" onclick="go_main('mainframe');" title="点击查看更多消息" style="font-family:'雅黑'; color:#d2ff00;">系统消息：</a>
            <marquee style="width:500px;height:45px;line-height:44px;vertical-align:middle;" align="left" behavior="scroll" scrollamount="3" direction="left" loop="-1" onmouseout="this.start()" onmouseover="this.stop()">
                <a id="gonggao" href="javascript:void(0);" onclick="go_main('mainframe');" title="点击查看更多消息"><?= $message ?></a>
            </marquee>
        </div>
        <div class="nav floatleft">
            <div class="nav_1 floatleft"><img src="/member/images/header_04.png" width="35" height="40" alt=""></div>
            <a href="javascript:void(0);" onClick="go_main('main.php?action=roul');">规 则</a>
            <a href="javascript:void(0);" onClick="go_main('main.php?action=mem_info');">会员资料</a>
            <a href="javascript:void(0);" onClick="go_main('main.php?action=mem_kithe');">开奖结果</a>
            <a href="javascript:void(0);" onClick="go_main('main.php?action=mem_wagers');">下注明细</a>
            <a href="javascript:void(0);" onClick="go_main('main.php?action=mem_wagers_history');">账户历史</a>
            <a href="javascript:void(0);" onClick="go_main('main.php?action=logout');">退 出</a>
            <div class="clearfloat"></div>
        </div>


        <!--[if lte IE 6]>
    <div class="sub_nav_ie6 floatleft" id="link">
    <![endif]-->
        <!--[if gt IE 6]>
    <div class="sub_nav floatleft" id="link">
    <![endif]-->
        <!--[if !IE]-->
        <div class="sub_nav floatleft">
            <!--[endif]-->
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_tm');" id="tema">特码</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_zm');" id="zhengma">正码</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_lm');" id="lianma">连码</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_zt');" id="zhengte">正特</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_zm6');" id="zhengma16">正码1-6</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_gg');" id="guoguan">过关</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_bb');" id="banbo">半波</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_sx6');" id="texiao">六肖</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_tmsx');" id="texiao">特肖</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_sx');" id="yixiao">一肖</a>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_sxbz');" id="yixiaobz">一肖不中</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_ws');" id="weishu">尾数</a>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_wsbz');" id="weishubz">尾数不中</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_sxl');" id="shengxiaolian">生肖连</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_wsl');" id="weishulian">尾数连</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_bz');" id="buzhong">自选不中</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_dzy');" id="duozhongyi">自选中一</a>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_1rz');" id="ptz">特平中</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_sxzl');" id="sxzl">生肖量</a>

            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="javascript:void(0);" onclick="go_main('main.php?action=bet_wszl');" id="wszl">尾数量</a>

        </div>

    </div>
    <!--main_top   -->

    <div class="con_left_con floatleft"></div>
    <div style="display:none">
        <form target="leftFrame" name="form1" method="post" action=""></form>
    </div>
    <script type="text/javascript" src="/js/testspeed.js?t=1683715146"></script>
    <script type="text/javascript">
        makeRequest('main.php?action=online&uid=<?= $uid ?>')
    </script>
</body>
<?
$delcachename = "cache/" . $dblabel . "/cache.php";
if (!file_exists($delcachename)) {
    @deldir('cache/' . $dblabel . '/member/');
    @deldir('cache/' . $dblabel . '/agent/');
    @deldir('cache/' . $dblabel . '/admin/');
    @deldir('cache/' . $dblabel . '/web_bl/');
    @deldir('cache/' . $dblabel . '/web_config/');
    $str  =    "<?php\r\n";
    $str .=    "unset(\$cache_del_time);\r\n";
    $str .=    "\$cache_del_time	=	'" . $utime . "';\r\n?>";
    if ($fp = fopen($delcachename, "w")) {
        if (@fwrite($fp, $str)) {
            fclose($fp);
            return true;
        } else {
            fclose($fp);
            return false;
        }
    }
} else {
    include($delcachename);
    $del_time_temp1 = date("Y-m-d") . " 00:00:00";
    $del_time_temp2 = date("Y-m-d") . " 16:00:00";
    if ($utime > $del_time_temp1 && $utime < $del_time_temp2) {
        if ($cache_del_time == "" || $cache_del_time < $del_time_temp1) {
            @deldir('cache/' . $dblabel . '/member/');
            @deldir('cache/' . $dblabel . '/agent/');
            @deldir('cache/' . $dblabel . '/admin/');
            @deldir('cache/' . $dblabel . '/web_bl/');
            @deldir('cache/' . $dblabel . '/web_config/');
            $str  =    "<?php\r\n";
            $str .=    "unset(\$cache_del_time);\r\n";
            $str .=    "\$cache_del_time	=	'" . $utime . "';\r\n?>";
            if ($fp = fopen($delcachename, "w")) {
                if (@fwrite($fp, $str)) {
                    fclose($fp);
                } else {
                    fclose($fp);
                }
            }
        }
    }
}
?>