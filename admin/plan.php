<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "01")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['act'] == "edit") {
    if (empty($_POST['nn'])) {
        echo "<script>alert('期数不能为空!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    }
    if (empty($_POST['nd'])) {
        echo "<script>alert('开奖时间不能为了空!');window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['zfbdate'])) {
        echo "<script>alert('总封盘时间不能为空!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    }
    if (empty($_POST['zfbdate1'])) {
        echo "<script>alert('开盘时间不能为空!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    }
    $sql = "update web_kithe set nn='" . $_POST['nn'] . "',nd='" . $_POST['nd'] . "',kitm='" . $_POST['kitm'] . "',kizt='" . $_POST['kizm'] . "',kizm='" . $_POST['kizm'] . "',kilm='" . $_POST['kizm'] . "',kisx='" . $_POST['kizm'] . "',kibb='" . $_POST['kizm'] . "',kiws='" . $_POST['kizm'] . "',zfbdate='" . $_POST['zfbdate'] . "',kitm1='" . $_POST['kitm1'] . "',kizt1='" . $_POST['kizm1'] . "',kizm1='" . $_POST['kizm1'] . "',kilm1='" . $_POST['kizm1'] . "',kisx1='" . $_POST['kizm1'] . "',kibb1='" . $_POST['kizm1'] . "',kiws1='" . $_POST['kizm1'] . "',zfbdate1='" . $_POST['zfbdate1'] . "' where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错2");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='盘口管理',text2='修改盘口信息',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('盘口修改成功!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
    exit;
}
if ($_GET['t0'] == "y") {
    $sql = "update web_kithe set best=1 where id=" . $_GET['newsid'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='盘口管理',text2='设置允许自动开盘',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('允许自动开盘!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
    exit;
}
if ($_GET['t0'] == "n") {
    $sql = "update web_kithe set best=0 where id=" . $_GET['newsid'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='盘口管理',text2='设置不允许自动开盘',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('不允许自动开盘!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
    exit;
}
if ($_GET['t1'] == "y") {
    $sql = "update web_kithe set zfb='" . $_GET['zfb'] . "' where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错1");
    }
    if ($_GET['zfb'] == 1) {
        $sql = "update web_kithe set kitm=1,kizt=1,kizm=1,kizm6=1,kigg=1,kilm=1,kisx=1,kibb=1,kiws=1,zfb=1 where id=" . $_GET['id'];
        if (!$db1->query($sql)) {
            exit("数据库修改出错1");
        }
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='盘口管理',text2='手动开盘',ip='" . $userip . "'";
        $db1->query($sql);
        echo "<script>alert('开盘成功!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    } else {
        $sql = "update web_kithe set kitm=0,kizt=0,kizm=0,kizm6=0,kigg=0,kilm=0,kisx=0,kibb=0,kiws=0,zfb=0 where id=" . $_GET['id'];
        if (!$db1->query($sql)) {
            exit("数据库修改出错1");
        }
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='盘口管理',text2='手动封盘',ip='" . $userip . "'";
        $db1->query($sql);
        echo "<script>alert('封盘成功!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    }
}
if ($_GET['svave'] == "svave") {
    if (!empty($_POST['na']) && $_POST['na'] != 0) {
        $fa = $_POST['na'];
        $fb = (int) $fa;
        $sx = get_sx_name($fb);
        $sql = "update web_kithe set na='" . $_POST['na'] . "',sx='" . $sx . "' where id=" . $_GET['id'];
        if (!$db1->query($sql)) {
            exit("数据库修改出错1");
        }
    }
    if (!empty($_POST['n1']) && $_POST['n1'] != 0) {
        $fa1 = $_POST['n1'];
        $fb1 = (int) $fa1;
        $sx1 = get_sx_name($fb1);
        $sql1 = "update web_kithe set n1='" . $_POST['n1'] . "',sx1='" . $sx1 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("数据库修改出错1");
        }
    }
    if (!empty($_POST['n2']) && $_POST['n2'] != 0) {
        $fa2 = $_POST['n2'];
        $fb2 = (int) $fa2;
        $sx2 = get_sx_name($fb2);
        $sql1 = "update web_kithe set n2='" . $_POST['n2'] . "',sx2='" . $sx2 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("数据库修改出错1");
        }
    }
    if (!empty($_POST['n3']) && $_POST['n3'] != 0) {
        $fa3 = $_POST['n3'];
        $fb3 = (int) $fa3;
        $sx3 = get_sx_name($fb3);
        $sql1 = "update web_kithe set n3='" . $_POST['n3'] . "',sx3='" . $sx3 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("数据库修改出错1");
        }
    }
    if (!empty($_POST['n4']) && $_POST['n4'] != 0) {
        $fa4 = $_POST['n4'];
        $fb4 = (int) $fa4;
        $sx4 = get_sx_name($fb4);
        $sql1 = "update web_kithe set n4='" . $_POST['n4'] . "',sx4='" . $sx4 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("数据库修改出错1");
        }
    }
    if (!empty($_POST['n5']) && $_POST['n5'] != 0) {
        $fa5 = $_POST['n5'];
        $fb5 = (int) $fa5;
        $sx5 = get_sx_name($fb5);
        $sql1 = "update web_kithe set n5='" . $_POST['n5'] . "',sx5='" . $sx5 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("数据库修改出错1");
        }
    }
    if (!empty($_POST['n6']) && $_POST['n6'] != 0) {
        $fa6 = $_POST['n6'];
        $fb6 = (int) $fa6;
        $sx6 = get_sx_name($fb6);
        $sql1 = "update web_kithe set n6='" . $_POST['n6'] . "',sx6='" . $sx6 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("数据库修改出错1");
        }
    }
    if (!empty($_POST['na']) && $_POST['na'] != 0) {
        $sql = "SELECT * FROM web_kithe WHERE id=" . $_GET['id'] . " order by nn desc LIMIT 1";
        $result = $db1->query($sql);
        $row = $result->fetch_array();
        $kithe = $row['nn'];
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='盘口管理',text2='录入开奖号码',ip='" . $userip . "'";
        $db1->query($sql);
        echo "<script>alert('开奖成功,请验证没有开错后再结算！!');window.location.href='main.php?action=web_kithe_list&uid={$uid}';</script>";
        exit;
    }
}
$nana = 1;
$result = $db1->query("select * from web_kithe  order by nn desc LIMIT 1");
$row = $result->fetch_array();
$id = $row['id'];
$nn = $row['nn'];
$nd = $row['nd'];
$zfbdate = $row['zfbdate'];
$zfbdate1 = $row['zfbdate1'];
$kitm1 = $row['kitm1'];
$kizt1 = $row['kizt1'];
$kizm1 = $row['kizm1'];
$kizm61 = $row['kizm61'];
$kigg1 = $row['kigg1'];
$kilm1 = $row['kilm1'];
$kisx1 = $row['kisx1'];
$kibb1 = $row['kibb1'];
$kiws1 = $row['kiws1'];
$nana = $row['na'];
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<link rel="stylesheet" href="/stylesheets/calendar.css?t=1706381780" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/web_kithe.js" type="text/javascript"></script>
<script src="js/mycalendar.js?t=1706381780.js" type="text/javascript"></script>

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;盘口管理－</span><span class="font_b">当前期盘口设置&nbsp;</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"></div>
    </div>
    <table width="680px" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tbody>
            <tr>
                <td class="t_list_caption" colspan="2">开奖日期</td>
            </tr>
            </tr>

            <tr style="background-color: white">
                <td id="calendar" valign="top">
                    <?php
                    function days_in_month($month, $year)
                    {
                        // calculate number of days in a month
                        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
                    }
                    $month = date('n'); // 当前月份
                    $year = date('Y'); // 当前年份
                    $day = date('d'); // 当前年份

                    $daysOfMonth = days_in_month($month, $year);

                    $allDaysArray = range(1, $daysOfMonth);

                    // 获取本月第一天的日期字符串
                    $firstDayOfMonth = date('Y-m-01');

                    // 获取本月第一天是周几的数字表示（0代表周日，6代表周六）
                    $weekday = date('N', strtotime($firstDayOfMonth));

                    // 获取当前时间
                    $now = time();

                    // 获取下个月的第一天时间戳
                    $nextMonthFirstDayTimestamp = strtotime("first day of next month", $now);

                    // 获取下个月第一天是周几
                    $nextweekday = date("N", $nextMonthFirstDayTimestamp);

                    // 如果是12月，年份需要增加，月份变为1月
                    if ($month == 12) {
                        $nextYear = $year + 1;
                        $nextMonth = 1;
                    } else {
                        $nextYear = $year;
                        $nextMonth = $month + 1;
                    }
                    
                    // 获取下个月的天数
                    $daysInNextMonth = days_in_month($nextMonth, $nextYear);

                    $nextDaysArray = range(1, $daysInNextMonth);
                    

                    ?>
                    <h4><?=$year?>年<?=$month?>月</h4>
                    <ul class="week">
                        <li>日</li>
                        <li>一</li>
                        <li>二</li>
                        <li>三</li>
                        <li>四</li>
                        <li>五</li>
                        <li>六</li>
                    </ul>
                    <ul class="dateList">
                        <?
                        for ($i = 0; $i < $weekday; $i++) {
                        ?>
                            <li></li>
                        <?
                        }
                        ?>
                        <?
                        foreach ($allDaysArray as $val) {
                        ?>
                            <? if ($val < $day) { ?> <li class="pastLottery"><?= $val ?></li><?
                               } elseif ($val == $day) { ?> <li class="todayLottery"><?= $val ?></li><?
                               } else { ?> <li class="lottery"><?= $val ?></li><? } ?>
                        <?
                        }
                        ?>
                    </ul>
                </td>
                <td id="calendar2" valign="top">
                    <h4><?=$nextYear?>年<?=$nextMonth?>月</h4>
                    <ul class="week">
                        <li>日</li>
                        <li>一</li>
                        <li>二</li>
                        <li>三</li>
                        <li>四</li>
                        <li>五</li>
                        <li>六</li>
                    </ul>
                    <ul class="dateList2">
                    <?
                        for ($i = 0; $i < $nextweekday; $i++) {
                        ?>
                            <li></li>
                        <?
                        }
                        ?>
 <?
                        foreach ($nextDaysArray as $val) {
                        ?>
                               <li class="lottery"><?= $val ?></li>
                        <?
                        }
                        ?>
                    </ul>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="background-color: white; height:30px;" align="center">
                    <span>说明： </span>
                    <span style="padding:5px;" class="todayLottery">今日有开奖</span>
                    <span style="padding:5px;" class="today">今日无开奖</span>
                    <span style="padding:5px;" class="lottery">计划开奖日</span>
                    <span style="padding:5px;" class="pastLottery">历史开奖日</span>
                </td>
            </tr>
            <!--table1 end-->
            <table width="680px" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" bordercolordark="#FFFFFF" style="xmargin-bottom:48px;">

                <form action="main.php?action=web_kithe&uid=<?= $uid ?>&act=edit&id=<?= $id ?>" method="post" name="testFrm" id="testFrm" onSubmit="return SubChk()">
                    <tr>
                        <td height="25" colspan="2" align="center" class="t_list_caption">开盘默认设置</td>
                    </tr>
                    <tr>
                        <td height="30" class="t_edit_caption">开盘时间:</td>
                        <td class="t_edit_td">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><input name="zfbdate1" type="text" class="za_text" id="zfbdate1" value="<?= $zfbdate1 ?>" size="30" /></td>
                                    <td width="25"><a href="main.php?action=web_kithe&uid=<?= $uid ?>&newsid=<?= $id ?>&t0=<? if ($row['best'] == 1) { ?>n<? } else { ?>y<? } ?>"><img src="images/<? if ($row['best'] == 1) { ?>i<? } else { ?>j<? } ?>.jpg" name="test_b" <? $row['id'] ?> width="18" height="18" border="0" id="test_b<?= $row['id'] ?>" value=<? if ($row['best'] == 1) { ?>True<? } else { ?>False<? } ?> /></a></td>
                                    <td>&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="30" class="t_edit_caption">开奖时间:</td>
                        <td class="t_edit_td">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td><input name="nd" class="za_text" id="nd" value="<?= $nd ?>" size="24" /></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="30" class="t_edit_caption">总封盘时间:</td>
                        <td class="t_edit_td"><input name="zfbdate" type="text" class="za_text" id="zfbdate" value="<?= $zfbdate ?>" size="30" /></td>
                    </tr>
                    <tr>
                        <td height="30" class="t_edit_caption">特码封盘时间:</td>
                        <td class="t_edit_td"><input name="kitm1" type="text" class="za_text" id="kitm1" value="<?= $kitm1 ?>" size="30" /></td>
                    </tr>
                    <tr>
                        <td height="30" class="t_edit_caption">正码封盘时间:</td>
                        <td class="t_edit_td"><input name="kizm1" type="text" class="za_text" id="kizm1" value="<?= $kizm1 ?>" size="30" /></td>
                    </tr>
                    <tr>
                        <td height="30" class="t_edit_caption">自动开盘:</td>
                        <td class="t_edit_td"><input name="opauto" type="checkbox" id="opauto" checked="">
                            <input name="kizm1" type="text" class="za_text" id="kizm1" value="<?= $kizm1 ?>" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td height="30" class="t_edit_caption">自动还原默认赔率:</td>
                        <td class="t_edit_td"><input name="opauto" type="checkbox" id="opauto" checked="">
                            <input name="kizm1" type="text" class="za_text" id="kizm1" value="<?= $kizm1 ?>" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td height="30" class="t_edit_caption">自动还原会员信用额度:</td>
                        <td class="t_edit_td"><input name="opauto" type="checkbox" id="opauto" checked="">
                            <input name="kizm1" type="text" class="za_text" id="kizm1" value="<?= $kizm1 ?>" size="30" />
                        </td>
                    </tr>
                    <tr>
                        <td height="30" colspan="2" class="m_cen" align="center" bgcolor="#FFFFFF">
                            <input type="submit" class="btn2" name="Submit" value="修改" />
                            <input type="reset" class="btn1" name="reset" value="重置" /><br />
                        </td>
                    </tr>
                </form>
            </table>
            </td>
            </tr>
    </table>
</body>