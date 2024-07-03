<?
if (!defined('KK_VER')) {
    exit('无效的访问');
}
?>
<link rel="stylesheet" href="/stylesheets/header.css?t=1683715146" type="text/css">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<script src="/js/public/function.js" type="text/javascript"></script>
<script src="/js/admin/function.js" type="text/javascript"></script>
<script src="/js/admin/header.js?t=1683715146" type="text/javascript"></script>
<script src="/js/admin/device.min.js?t=1683715146" type="text/javascript"></script>
<script type="text/javascript">
    // 	var uid = "<?= $uid ?>";
    // 	var autotime = 40000;
    // 	op_count = 0;
    // 	ad_count = 0;
    // 	mo_count = 0;
    // 	rl_count = 0;
    // 	ot_count = 0;
    // 	function show_webs(sw) {
    // 		op_list.style.display = 'none';
    // 		ad_list.style.display = 'none';
    // 		mo_list.style.display = 'none';
    // 		rl_list.style.display = 'none';
    // 		ot_list.style.display = 'none';
    // 		switch (sw) {
    // 			case 'ad':
    // 				if (ad_count == 0) {
    // 					ad_list.style.display = 'block';
    // 					ad_count = 1;
    // 					op_count = 0;
    // 					mo_count = 0;
    // 					rl_count = 0;
    // 					ot_count = 0;
    // 				} else {
    // 					ad_list.style.display = 'none';
    // 					ad_count = 0;
    // 				}
    // 				break;
    // 			case 'mo':
    // 				if (mo_count == 0) {
    // 					mo_list.style.display = 'block';
    // 					mo_count = 1;
    // 					op_count = 0;
    // 					ad_count = 0;
    // 					rl_count = 0;
    // 					ot_count = 0;
    // 				} else {
    // 					mo_list.style.display = 'none';
    // 					mo_count = 0;
    // 				}
    // 				break;
    // 			case 'op':
    // 				if (op_count == 0) {
    // 					op_list.style.display = 'block';
    // 					op_count = 1;
    // 					ad_count = 0;
    // 					mo_count = 0;
    // 					rl_count = 0;
    // 					ot_count = 0;
    // 				} else {
    // 					op_list.style.display = 'none';
    // 					op_count = 0;
    // 				}
    // 				break;
    // 			case 'ot':
    // 				if (ot_count == 0) {
    // 					ot_list.style.display = 'block';
    // 					ot_count = 1;
    // 					op_count = 0;
    // 					ad_count = 0;
    // 					mo_count = 0;
    // 					rl_count = 0;
    // 				} else {
    // 					ot_list.style.display = 'none';
    // 					ot_count = 0;
    // 				}
    // 				break;
    // 			case 'rl':
    // 				if (rl_count == 0) {
    // 					rl_list.style.display = 'block';
    // 					rl_count = 1;
    // 					op_count = 0;
    // 					ad_count = 0;
    // 					mo_count = 0;
    // 					ot_count = 0;
    // 				} else {
    // 					rl_list.style.display = 'none';
    // 					rl_count = 0;
    // 				}
    // 				break;

    // 		}
    // 	}
    // 	function go_web(sw3) {
    // 		if (sw3 != null) {
    // 			window.open(sw3, 'main');
    // 		}
    // 	}
    // 
</script>
<style>
    .logo {
        font-size: 25px;
        color: yellow;
        margin-left: 20px;
    }
</style>
<script language="JavaScript">
    var uid = "<?= $uid ?>";
    var autotime = 40000;
    var web_name = "兴盛";
    var now = new Date(1685436553930);
    var cookie = "dlOO26_QbpAQRVHlYK1zObJwEcYiy3Ob";
    gapTime = now.getTime() - new Date().getTime();

    function SelectLine(index) {
        if (index == 0) {
            return;
        }
        --index;
        if (index >= urlsToTest.length) {
            return window.location.replace(window.location.href);
        }
        parent.parent.location.replace("http://" + urlsToTest[index].replace(/\/$/, "") + "/setcookie/set/" + encodeURI(cookie) + "?uid=" + uid);
    }

    function CurentTime() {
        var mm = now.getMinutes();
        var ss = now.getTime() % 60000;
        ss = (ss - (ss % 1000)) / 1000;
        var clock = now.getHours() + ':';
        if (now.getHours() < 10) clock = '0' + clock;
        if (mm < 10) clock += '0';
        clock += mm + ':';
        if (ss < 10) clock += '0';
        return (clock + ss);
    }

    function refresh() {
        if (Math.abs(now.getTime() - new Date().getTime() - gapTime) > 5000 && !isReadingFile) {
            isReadingFile = true;
            readfile("ajax?uid=ZUFft2n90i9n5i659ccOrmtn", false);
        }
        now.setSeconds(now.getSeconds() + 1);
        $("time_clock").innerHTML = CurentTime();
    }

    function load() {

        //getElementById("logo").focus();
    }


    mBut_1[0] = new Array('盘口设置', 'main.php?action=web_kithe&uid=<?= $uid ?>');

    mBut_1[1] = new Array('开盘计划管理', 'main.php?action=plan&uid=<?= $uid ?>');

    mBut_1[2] = new Array('历史盘口管理', 'main.php?action=web_kithe_list&uid=<?= $uid ?>');

    mBut_2[0] = new Array('注单统计', 'main.php?action=list_all&uid=<?= $uid ?>');

    mBut_2[1] = new Array('流水注单', 'main.php?action=real_list&uid=<?= $uid ?>');

    mBut_2[2] = new Array('补货注单', 'main.php?action=real_list_wai&uid=<?= $uid ?>');

    mBut_2[3] = new Array('注单查询', 'main.php?action=real_list_manage&uid=<?= $uid ?>');

    mBut_2[4] = new Array('补货设置', 'main.php?action=list_set&uid=<?= $uid ?>');

    mBut_2[5] = new Array('补货用户', 'main.php?action=web_class&uid=<?= $uid ?>');

    mBut_2[6] = new Array('数据备份', 'main.php?action=web_bak&uid=<?= $uid ?>');

    // mBut_2[2] = new Array('赔率设置', 'main.php?action=rake_tm&uid=<?= $uid ?>');

    // mBut_2[4] = new Array('还原信用额', 'main.php?action=user_hy&uid=<?= $uid ?>');

    mBut_3[0] = new Array('分公司', 'main.php?action=user_dagu_list&uid=<?= $uid ?>');

    mBut_3[1] = new Array('股东', 'main.php?action=user_guan_list&uid=<?= $uid ?>');

    mBut_3[2] = new Array('总代理', 'main.php?action=user_zong_list&uid=<?= $uid ?>');

    mBut_3[3] = new Array('代理', 'main.php?action=user_dai_list&uid=<?= $uid ?>');

    mBut_3[4] = new Array('会员', 'main.php?action=user_mem_list&uid=<?= $uid ?>');

    mBut_3[5] = new Array('管理员', 'main.php?action=user_gs_list&uid=<?= $uid ?>');

    mBut_3[6] = new Array('还原会员信用额度', 'main.php?action=user_hy&uid=<?= $uid ?>');

    // mBut_3[6] = new Array('直属会员', 'main.php?action=user_mem_zs_list&uid=<?= $uid ?>');

    // mBut_3[7] = new Array('在线用户', 'main.php?action=web_online&uid=<?= $uid ?>');

    // mBut_3[8] = new Array('用户日志', 'main.php?action=web_log&uid=<?= $uid ?>');

    // mBut_3[9] = new Array('变更密码', 'main.php?action=passwd&uid=<?= $uid ?>');

    // mBut_4[0] = new Array('本期流水注单', 'main.php?action=real_list&uid=<?= $uid ?>');

    // mBut_4[1] = new Array('本期补货注单', 'main.php?action=real_list_wai&uid=<?= $uid ?>');

    // mBut_4[2] = new Array('注单查询', 'main.php?action=real_list_manage&uid=<?= $uid ?>');

    mBut_4[0] = new Array('修改密码', 'main.php?action=passwd&uid=<?= $uid ?>');

    mBut_5[0] = new Array('系统设置', 'main.php?action=web_config&uid=<?= $uid ?>');

    mBut_5[1] = new Array('默认退水、限额、赔率差 ', 'main.php?action=web_ds&uid=<?= $uid ?>');

    mBut_5[2] = new Array('数据备份', 'main.php?action=web_bak&uid=<?= $uid ?>');

    mBut_5[3] = new Array('数据管理', 'main.php?action=web_del&uid=<?= $uid ?>');

    mBut_5[4] = new Array('运维管理', 'main.php?action=web_yw&uid=<?= $uid ?>');

    mBut_5[5] = new Array('系统公告', 'main.php?action=web_log&uid=<?= $uid ?>');

    mBut_5[6] = new Array('系统日志', 'main.php?action=web_log&uid=<?= $uid ?>');

    // mBut_5[3] = new Array('ABCD盘', 'main.php?action=web_abcd&uid=<?= $uid ?>');

    mBut_5[7] = new Array('单期限额', 'main.php?action=web_nn&uid=<?= $uid ?>');

    mBut_5[8] = new Array('结算检测', 'main.php?action=web_jc&uid=<?= $uid ?>');

    <? $result = $db1->query("select * from web_kithe order by nn desc  LIMIT 2");
    $row = $result->fetch_assoc();
    $row1 = $result->fetch_assoc();
    $time = strtotime(date("Y-m-d"));
    $getWeekDay = date("w", $time);
    if ($getWeekDay == 0) {
        $getWeekDay = 7;
    }
    $firstday = date("Y-m-01", strtotime(date("Y", $time) . "-" . (date("m", $time) - 1) . "-01"));
    $lastday = date("Y-m-d", strtotime("{$firstday} +1 month -1 day"));
    ?>

    mBut_6[0] = new Array('报表', 'main.php?action=report&uid=<?= $uid ?>');

    mBut_6[1] = new Array('本期', 'main.php?action=report_m1&uid=<?= $uid ?>&date_start=+<?= date("Y-m-d") ?>&date_end=+<?= date("Y-m-d") ?>&kithe=<?= $row['nn'] ?>&radio=all&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[2] = new Array('上期', 'main.php?action=report_m1&uid=<?= $uid ?>&date_start=+<?= date("Y-m-d") ?>&date_end=+<?= date("Y-m-d") ?>&kithe=<?= $row1['nn'] ?>&radio=all&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[3] = new Array('本周', 'main.php?action=report_m1&uid=<?= $uid ?>&date_start=<?= date("Y-m-d", time() - 86400 * date("w") + (0 < date("w") ? 86400 : -518400)) ?>&date_end=<?= date("Y-m-d") ?>&kithe=&radio=all&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[4] = new Array('上周', 'main.php?action=report_m1&uid=<?= $uid ?>&date_start=<?= date("Y-m-d", mktime(0, 0, 0, date("m", $time), date("d", $time) - $getWeekDay + 1 - 7, date("Y", $time))) ?>&date_end=<?= date("Y-m-d", mktime(0, 0, 0, date("m", $time), date("d", $time) - $getWeekDay + 7 - 7, date("Y", $time))) ?>&kithe=&radio=all&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[5] = new Array('本月', 'main.php?action=report_m1&uid=<?= $uid ?>&date_start=<?= date("Y-m-d", mktime(0, 0, 0, date("n"), 1, date("Y"))) ?>&date_end=<?= date("Y-m-d") ?>&kithe=&radio=all&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[6] = new Array('上月', 'main.php?action=report_m1&uid=<?= $uid ?>&date_start=<?= $firstday ?>&date_end=<?= $lastday ?>&kithe=&radio=all&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[7] = new Array('本期分类', 'main.php?action=report_class&uid=<?= $uid ?>&date_start=+<?= date("Y-m-d") ?>&date_end=+<?= date("Y-m-d") ?>&kithe=<?= $row['nn'] ?>&radio=class&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[8] = new Array('上期分类', 'main.php?action=report_class&uid=<?= $uid ?>&date_start=+<?= date("Y-m-d") ?>&date_end=+<?= date("Y-m-d") ?>&kithe=<?= $row1['nn'] ?>&radio=class&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[9] = new Array('本周分类', 'main.php?action=report_class&uid=<?= $uid ?>&date_start=<?= date("Y-m-d", time() - 86400 * date("w") + (0 < date("w") ? 86400 : -518400)) ?>&date_end=<?= date("Y-m-d") ?>&kithe=&radio=class&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[10] = new Array('上周分类', 'main.php?action=report_class&uid=<?= $uid ?>&date_start=<?= date("Y-m-d", mktime(0, 0, 0, date("m", $time), date("d", $time) - $getWeekDay + 1 - 7, date("Y", $time))) ?>&date_end=<?= date("Y-m-d", mktime(0, 0, 0, date("m", $time), date("d", $time) - $getWeekDay + 7 - 7, date("Y", $time))) ?>&kithe=&radio=class&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[11] = new Array('本月分类', 'main.php?action=report_class&uid=<?= $uid ?>&date_start=<?= date("Y-m-d", mktime(0, 0, 0, date("n"), 1, date("Y"))) ?>&date_end=<?= date("Y-m-d") ?>&kithe=&radio=class&gtype=&submit=%B2%E9%D1%AF');

    mBut_6[12] = new Array('上月分类', 'main.php?action=report_class&uid=<?= $uid ?>&date_start=<?= $firstday ?>&date_end=<?= $lastday ?>&kithe=&radio=class&gtype=&submit=%B2%E9%D1%AF');

    mBut_10[0] = new Array('当前赔率', 'main.php?action=rake_tm&uid=<?= $uid ?>');

    mBut_10[1] = new Array('升降值', 'main.php?action=rake_sj&uid=<?= $uid ?>');

    mBut_10[2] = new Array('自动降水', 'main.php?action=rake_drop&uid=<?= $uid ?>');

    mBut_10[3] = new Array('默认赔率', 'main.php?action=rake_mr_tm&uid=<?= $uid ?>');

    mBut_10[5] = new Array('还原默认赔率', 'main.php?action=rake_hy&uid=<?= $uid ?>');

    var url7 = 'main.php?action=web_online&uid=<?= $uid ?>';

    var url6 = 'main.php?action=report&uid=<?= $uid ?>';

    //var url7 = 'main.php?action=web_bak&uid=<?= $uid ?>';

    var url8 = 'main.php?action=logout&uid=<?= $uid ?>';

    var url10 = 'main.php?action=rake_tm&uid=<?= $uid ?>';
</script>

<body>
    <div id="main_id" class="main1">
        <div id="main_top_id" class="main_top1">
            <!--logo-->
            <div id="main_top_left_id" class="main_top_left1 floatleft">
                <img id="logo" src="/images/logo.png" width="480" height="82" alt="">
                <font style="position:absolute; z-index:1; left:6px; top:0px; height:82px;text-align:center;line-height:82px;" class="text-gradient"><b id="logo">&nbsp;<?= $webname ?></b></font>
            </div>
            <!--logo end-->
            <!--nav top-->
            <div id="main_top_nav_id" class="main_top_nav1 floatright">
                <a href="javascript:void(0);" onclick="go_menu(1);go_main(mBut_1[0][1]);">
                    <span class="s1"><img src="/images/6.png" width="36" height="36" alt=""></span>
                    <span class="s2">盘口管理</span>
                </a>
                <a href="javascript:void(0);" onclick="go_menu(2);go_main(mBut_2[0][1]);">
                    <span class="s1"><img src="/images/9.png" width="36" height="36" alt=""></span>
                    <span class="s2">即使注单</span>
                </a>
                <a href="javascript:void(0);" onclick="go_menu(10);go_main(mBut_10[0][1]);">
                    <span class="s1"><img src="/images/5.png" width="36" height="36" alt=""></span>
                    <span class="s2">赔率设置</span>
                </a>
                <a href="javascript:void(0);" onclick="go_menu(3);go_main(mBut_3[0][1]);">
                    <span class="s1"><img src="/images/2.png" width="36" height="36" alt=""></span>
                    <span class="s2">用户管理</span>
                </a>
                <a href="javascript:void(0);" onclick="go_menu(4);go_main(mBut_4[0][1]);">
                    <span class="s1"><img src="/images/3.png" width="36" height="36" alt=""></span>
                    <span class="s2">个人设置</span>
                </a>
                <a href="javascript:void(0);" onclick="go_menu(5);;go_main(mBut_5[0][1]);">
                    <span class="s1"><img src="/images/4.png" width="36" height="36" alt=""></span>
                    <span class="s2">系统设置</span>
                </a>
                <a href="javascript:void(0);" onclick="go_menu(6);;go_main(mBut_6[0][1]);">
                    <span class="s1"><img src="/images/1.png" width="36" height="36" alt=""></span>
                    <span class="s2">报表查询</span>
                </a>
                <!--<a href="javascript:void(0);" onclick="go_menu(7);">-->
                <!--    <span class="s1"><img src="/images/10.png" width="36" height="36" alt=""></span>-->
                <!--    <span class="s2">数据备份</span>-->
                <!--</a>-->
                <a href="javascript:void(0);" onclick="go_menu(7);">
                    <span class="s1"><img src="/images/0.png" width="36" height="36" alt=""></span>
                    <span class="s2">在线统计</span>
                </a>
                <a href="javascript:void(0);" onclick="go_menu(9);">
                    <span class="s1"><img src="/images/10.png" width="36" height="36" alt=""></span>
                    <span class="s2">发现</span>
                </a>
                <a href="javascript:void(0);" onclick="go_menu(8);">
                    <span class="s1"><img src="/images/8.png" width="36" height="36" alt=""></span>
                    <span class="s2">退出</span>
                </a>
                <div class="clearfloat"></div>
            </div>
        </div>

        <div class="sub_nav1 floatleft" id="menu_lb"> &nbsp;&nbsp;&nbsp;</div>

        <div id="sub_nav_right_id" class="sub_nav_right1 floatright">
            <select onchange="SelectLine(this.selectedIndex)">
                <option>请选择线路:</option>
                <option>重新测速</option>
            </select>
            当前时间:<span id="time_clock">14:38:21</span>
            股东账号:
            <span><?= $jxadmin ?></span>
            当前在线人数:<span id="num_1">0</span>人&nbsp;&nbsp;
            <span id="num_2">0</span></font>
        </div>

    </div>
    <script language="JavaScript">
        // readfile("ajax?uid=ZUFft2n90i9n5i659ccOrmtn",true);
        // refresh();
        // setInterval('refresh()',1000);
    </script>
    <script type="text/javascript">
        (function browserRedirect() {
            if (device.mobile()) {
                document.getElementById("main_top_id").className = "main_top";
                document.getElementById("main_top_left_id").className = "main_top_left floatleft";
                document.getElementById("main_top_nav_id").className = "main_top_nav floatright";
                document.getElementById("sub_nav_right_id").className = "sub_nav_right floatright";
                document.getElementById("menu_lb").className = "sub_nav floatleft";
                document.getElementById("main_id").className = "main";
            }
        })()
    </script>
    <script>
        var urlsToTest = [];
        var currentIndex = -1;
    </script>
    <script type="text/javascript" src="/js/admin/testspeed.js?t=1683715146"></script>
    <!--<SCRIPT language=javascript>makeRequest('main.php?action=online&uid=<?= $uid ?>')</script>-->
    <!--[if lte IE 6]>
<script type="text/javascript" src="/js/iepng.js?t=1683715146"></script>
<script language="javascript" type="text/javascript">
    correctPNG();
</script>
<![endif]-->
</body>

</html>