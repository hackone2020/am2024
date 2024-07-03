<?php
header("Content-Type: text/html;charset=gb2312");
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    $sxnum1 = "01,13,25,37,49";
    $sxnum2 = "02,14,26,38";
    $sxnum3 = "03,15,27,39";
    $sxnum4 = "04,16,28,40";
    $sxnum5 = "05,17,29,41";
    $sxnum6 = "06,18,30,42";
    $sxnum7 = "07,19,31,43";
    $sxnum8 = "08,20,32,44";
    $sxnum9 = "09,21,33,45";
    $sxnum10 = "10,22,34,46";
    $sxnum11 = "11,23,35,47";
    $sxnum12 = "12,24,36,48";
    switch ($_POST['sanimal']) {
        case 0:
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=12");
            break;
        case 1:
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=12");
            break;
        case 2:
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=12");
            break;
        case 3:
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=12");
            break;
        case 4:
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=12");
            break;
        case 5:
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=12");
            break;
        case 6:
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=12");
            break;
        case 7:
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=12");
            break;
        case 8:
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=12");
            break;
        case 9:
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=12");
            break;
        case 10:
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=12");
            break;
        case 11:
            $db1->query("update web_sxnumber set m_number='{$sxnum12}' where id=1");
            $db1->query("update web_sxnumber set m_number='{$sxnum11}' where id=2");
            $db1->query("update web_sxnumber set m_number='{$sxnum10}' where id=3");
            $db1->query("update web_sxnumber set m_number='{$sxnum9}' where id=4");
            $db1->query("update web_sxnumber set m_number='{$sxnum8}' where id=5");
            $db1->query("update web_sxnumber set m_number='{$sxnum7}' where id=6");
            $db1->query("update web_sxnumber set m_number='{$sxnum6}' where id=7");
            $db1->query("update web_sxnumber set m_number='{$sxnum5}' where id=8");
            $db1->query("update web_sxnumber set m_number='{$sxnum4}' where id=9");
            $db1->query("update web_sxnumber set m_number='{$sxnum3}' where id=10");
            $db1->query("update web_sxnumber set m_number='{$sxnum2}' where id=11");
            $db1->query("update web_sxnumber set m_number='{$sxnum1}' where id=12");
            break;
    }
    $I = 1;
    for (; $I <= 49; $I += 1) {
        $result = $db1->query("select * from web_bl where  class2='特A' and class3='" . $I . "'   order by id desc");
        $row = $result->fetch_array();
        if ($row != "") {
            $zu = $row['rate'];
            $zu += $_POST['tmzz'];
            $db1->query("update web_bl set rate='" . $zu . "',blrate='" . $zu . "',mrate='" . $zu . "' where class2='特B' and class3='" . $I . "'");
        }
        $result = $db1->query("select * from web_bl where  class2='正A' and class3='" . $I . "'   order by id desc");
        $row = $result->fetch_array();
        if ($row != "") {
            $zu1 = $row['rate'];
            $zu1 += $_POST['zmzz'];
            $db1->query("update web_bl set rate='" . $zu1 . "',blrate='" . $zu1 . "',mrate='" . $zu1 . "' where class2='正B' and class3='" . $I . "'");
        }
    }

    $db1->query("update web_config set a10='" . $_POST['a10'] . "',report_of='" . $_POST['report_of'] . "',dssum='" . (int)$_POST['dssum'] . "',ggwinsum='" . (int)$_POST['ggwinsum'] . "',mrab='" . $_POST['mrab'] . "',sx49='" . $_POST['sx49'] . "',kplist='" . $_POST['kplist'] . "',opwww='" . $_POST['opwww'] . "',affice='" . $_POST['affice'] . "',a8='" . $_POST['a8'] . "',webname='" . $_POST['webname'] . "',sanimal='" . $_POST['sanimal'] . "',a7='" . $_POST['a7'] . "',a6='" . $_POST['a6'] . "',a5='" . $_POST['a5'] . "',a4='" . $_POST['a4'] . "',weburl='" . $_POST['weburl'] . "',tm='" . $_POST['tmzz'] . "',zm='" . $_POST['zmzz'] . "',fmzt='" . $_POST['fmzt'] . "',passday='" . $_POST['passday'] . "',dailibak='" . $_POST['dailibak'] . "',autoqs='" . $_POST['autoqs'] . "',autokj='" . $_POST['autokj'] . "',autojs='" . $_POST['autojs'] . "',ycbb='" . $_POST['ycbb'] . "',autobh='" . $_POST['autobh'] . "',userplbd='" . $_POST['userplbd'] . "',xzpl='" . $_POST['xzpl'] . "',sqzwinsum='" . $_POST['sqzwinsum'] . "',sqzcc='" . $_POST['sqzcc'] . "',tmdl='" . $_POST['tmdl'] . "',lmxe='" . $_POST['lmxe'] . "',lxxe='" . $_POST['lxxe'] . "',sxxe='" . $_POST['sxxe'] . "',zxbzxe='" . $_POST['zxbzxe'] . "',wsxe='" . $_POST['wsxe'] . "',userlist='" . $_POST['userlist'] . "',dlcx='" . $_POST['dlcx'] . "',userls='" . $_POST['userls'] . "',tjxsd='" . $_POST['tjxsd'] . "',ylxsd='" . $_POST['ylxsd'] . "',fmzt='" . $_POST['bbxsd'] . "' where id=1");



    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='参数设置',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script language='javascript'>alert('设置成功!');window.location.href='main.php?action=web_config&uid=" . $uid . "';</script>";
    exit;
}

$result = $db1->query("select * from web_config order by id LIMIT 1");
$row = $result->fetch_array();
?>

<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">系统管理</span><span class="font_b">参数设置</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"></div>
    </div>
    <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="listTable">
        <tbody>
            <tr>
                <form name='form1' action='main.php?action=web_config&uid=<?= $uid ?>&save=save' method=post>
            <tr>
                <td height="25" colspan="2" align="center" nowrap="" class="t_list_caption">参数设置</td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">网站名称:&nbsp;</td>
                <td class="t_edit_td">
                    <input name="webname" type="text" class="za_text" id="webname" value="<?= $row['webname'] ?>" />最多五个字符
                    <!--网址:http://<input name="weburl" type="text" class="za_text"-->
                    <!--id="weburl" value="<?= $row['weburl'] ?>" />-->
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">系统维护:&nbsp;</span>
                </td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="opwww" class="za_select" id="opwww">
                        <option value="0" <? if (get_config("opwww") == 0) { ?> selected="selected" <? } ?>>开启
                        </option>
                        <option value="1" <? if (get_config("opwww") == 1) { ?> selected="selected" <? } ?>>关闭
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">繁忙状态:&nbsp;</span>
                </td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="fmzt" class="za_select" id="fmzt">
                        <option value="0" <? if (get_config("fmzt") == 0) { ?> selected="selected" <? } ?>>开启
                        </option>
                        <option value="1" <? if (get_config("fmzt") == 1) { ?> selected="selected" <? } ?>>关闭
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">用户密码有效期:&nbsp;</span>
                </td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="passday" class="za_select" id="passday">
                        <option value="0" <? if (get_config("passday") == 0) { ?> selected="selected" <? } ?>>无限
                        </option>
                        <option value="1" <? if (get_config("passday") == 1) { ?> selected="selected" <? } ?>>一个月
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">开盘中查历史帐:&nbsp;</td>

                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="kplist" class="za_select" id="kplist">
                        <option value="0" <? if ($row['kplist'] == 0) {
                                                echo "selected=selected";
                                            } ?>>允许</option>
                        <option value="1" <? if ($row['kplist'] == 1) {
                                                echo "selected=selected";
                                            } ?>>不允许</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">代理平台备份功能:&nbsp;</span>
                </td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="dailibak" class="za_select" id="dailibak">
                        <option value="0" <? if (get_config("dailibak") == 0) { ?> selected="selected" <? } ?>>允许
                        </option>
                        <option value="1" <? if (get_config("dailibak") == 1) { ?> selected="selected" <? } ?>>不允许
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">自动新增期数:&nbsp;</span>
                </td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="autoqs" class="za_select" id="autoqs">
                        <option value="0" <? if (get_config("autoqs") == 0) { ?> selected="selected" <? } ?>>开启
                        </option>
                        <option value="1" <? if (get_config("autoqs") == 1) { ?> selected="selected" <? } ?>>关闭
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">自动开奖:&nbsp;</span>
                </td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="autokj" class="za_select" id="autokj">
                        <option value="0" <? if (get_config("autokj") == 0) { ?> selected="selected" <? } ?>>开启
                        </option>
                        <option value="1" <? if (get_config("autokj") == 1) { ?> selected="selected" <? } ?>>关闭
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">自动结算:&nbsp;</span>
                </td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="autojs" class="za_select" id="autojs">
                        <option value="0" <? if (get_config("autojs") == 0) { ?> selected="selected" <? } ?>>开启
                        </option>
                        <option value="1" <? if (get_config("autojs") == 1) { ?> selected="selected" <? } ?>>关闭
                        </option>
                    </select>
                    注意:此项需开启自动开奖才能生效
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">封盘后隐藏报表:&nbsp;</span>
                </td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="ycbb" class="za_select" id="ycbb">
                        <option value="0" <? if (get_config("ycbb") == 0) { ?> selected="selected" <? } ?>>隐藏
                        </option>
                        <option value="1" <? if (get_config("ycbb") == 1) { ?> selected="selected" <? } ?>>开放
                        </option>
                    </select>
                </td>
            </tr>

            <tr>
                <td height="25" colspan="2" align="center" nowrap="" class="t_list_caption">规则设置</td>
            </tr>

            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">农历生肖:&nbsp;
                </td>
                <td class="t_edit_td">
                    <select name="sanimal" class="za_select" id="sanimal">
                        <option value="0" <? if ($row['sanimal'] == 0) {
                                                echo " selected";
                                            } ?>>鼠</option>
                        <option value="1" <? if ($row['sanimal'] == 1) {
                                                echo " selected";
                                            } ?>>牛</option>
                        <option value="2" <? if ($row['sanimal'] == 2) {
                                                echo " selected";
                                            } ?>>虎</option>
                        <option value="3" <? if ($row['sanimal'] == 3) {
                                                echo " selected";
                                            } ?>>兔</option>
                        <option value="4" <? if ($row['sanimal'] == 4) {
                                                echo " selected";
                                            } ?>>龙</option>
                        <option value="5" <? if ($row['sanimal'] == 5) {
                                                echo " selected";
                                            } ?>>蛇</option>
                        <option value="6" <? if ($row['sanimal'] == 6) {
                                                echo " selected";
                                            } ?>>马</option>
                        <option value="7" <? if ($row['sanimal'] == 7) {
                                                echo " selected";
                                            } ?>>羊</option>
                        <option value="8" <? if ($row['sanimal'] == 8) {
                                                echo " selected";
                                            } ?>>猴</option>
                        <option value="9" <? if ($row['sanimal'] == 9) {
                                                echo " selected";
                                            } ?>>鸡</option>
                        <option value="10" <? if ($row['sanimal'] == 10) {
                                                echo " selected";
                                            } ?>>狗</option>
                        <option value="11" <? if ($row['sanimal'] == 11) {
                                                echo " selected";
                                            } ?>>猪</option>
                    </select>
                </td>
            </tr>

            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">B盘设置:&nbsp;</td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <div>特码B升:<input name="tmzz" class="za_text_ed" id="tmzz" value="<?= $row['tm'] ?>" size="3" /></div>
                    <div>正码B升:<input name="zmzz" class="za_text_ed" id="zmzz" value="<?= $row['zm'] ?>" size="3" /></div>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">自动降赔率规则:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="dssum" class="za_select" id="dssum">
                        <option value="0" <? if ($row['dssum'] == 0) {
                                                echo "selected=selected";
                                            } ?>>按下注总额</option>
                        <option value="1" <? if ($row['dssum'] == 1) {
                                                echo "selected=selected";
                                            } ?>>按公司占成</option>
                    </select>&nbsp;&nbsp;注意:此项请在开盘前设置
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">开盘中修改自动补货:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="autobh" class="za_select" id="autobh">
                        <option value="0" <? if ($row['autobh'] == 0) {
                                                echo "selected=selected";
                                            } ?>>允许(自由修改)</option>
                        <option value="1" <? if ($row['autobh'] == 1) {
                                                echo "selected=selected";
                                            } ?>>不允许(限制修改)</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">会员提交下注赔率变动时:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="userplbd" class="za_select" id="userplbd">
                        <option value="0" <? if ($row['userplbd'] == 0) {
                                                echo "selected=selected";
                                            } ?>>自动以最新赔率保存</option>
                        <option value="1" <? if ($row['userplbd'] == 1) {
                                                echo "selected=selected";
                                            } ?>>自动以最新赔率保存</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">限制赔率不能高于默认赔率:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="xzpl" class="za_select" id="xzpl">
                        <option value="0" <? if ($row['xzpl'] == 0) {
                                                echo "selected=selected";
                                            } ?>>是</option>
                        <option value="1" <? if ($row['xzpl'] == 1) {
                                                echo "selected=selected";
                                            } ?>>否</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">过关-限制单注最高彩金:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td"><input name="ggwinsum" class="za_text_ed" id="ggwinsum" value="<?= $row['ggwinsum'] ?>" /></td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">四全中-限制单组最高彩金:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td"><input name="sqzwinsum" class="za_text_ed" id="sqzwinsum" value="<?= $row['sqzwinsum'] ?>" />注：限制所有会员的派彩总和</td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">四全中-复式/托胆中有某组<br />超过最高彩金时:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="sqzcc" class="za_select" id="sqzcc">
                        <option value="0" <? if ($row['sqzcc'] == 0) {
                                                echo "selected=selected";
                                            } ?>>整组都下注失败</option>
                        <option value="1" <? if ($row['sqzcc'] == 1) {
                                                echo "selected=selected";
                                            } ?>>整组都下注成功</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">

                <td height="30" align="right" class="t_edit_caption">特码开49六肖:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="sx49" class="za_select" id="sx49">
                        <option value="0" <? if ($row['sx49'] == 0) {
                                                echo "selected=selected";
                                            } ?>>打和</option>
                        <option value="1" <? if ($row['sx49'] == 1) {
                                                echo "selected=selected";
                                            } ?>>不打和</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">

                <td height="30" align="right" class="t_edit_caption">特码AB、正码AB限额独立:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">
                    <select name="tmdl" class="za_select" id="tmdl">
                        <option value="0" <? if ($row['tmdl'] == 0) {
                                                echo "selected=selected";
                                            } ?>>独立</option>
                        <option value="1" <? if ($row['tmdl'] == 1) {
                                                echo "selected=selected";
                                            } ?>>不独立</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">连码下注限额方式:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="lmxe" class="za_select" id="lmxe">
                        <option value="0" <? if ($row['lmxe'] == 0) {
                                                echo " selected=selected";
                                            } ?>>限整项总额</option>
                        <option value="1" <? if ($row['lmxe'] == 1) {
                                                echo " selected=selected";
                                            } ?>>限单项总额</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">六肖下注限额方式:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="lxxe" class="za_select" id="lxxe">
                        <option value="0" <? if ($row['lxxe'] == 0) {
                                                echo " selected=selected";
                                            } ?>>限整项总额</option>
                        <option value="1" <? if ($row['lxxe'] == 1) {
                                                echo " selected=selected";
                                            } ?>>限单项总额</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">生肖连下注限额方式:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="sxxe" class="za_select" id="sxxe">
                        <option value="0" <? if ($row['sxxe'] == 0) {
                                                echo " selected=selected";
                                            } ?>>限整项总额</option>
                        <option value="1" <? if ($row['sxxe'] == 1) {
                                                echo " selected=selected";
                                            } ?>>限单项总额</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">尾数连下注限额方式:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="wsxe" class="za_select" id="wsxe">
                        <option value="0" <? if ($row['wsxe'] == 0) {
                                                echo " selected=selected";
                                            } ?>>限整项总额</option>
                        <option value="1" <? if ($row['wsxe'] == 1) {
                                                echo " selected=selected";
                                            } ?>>限单项总额</option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">自选不中下注限额方式:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="zxbzxe" class="za_select" id="zxbzxe">
                        <option value="0" <? if ($row['zxbzxe'] == 0) {
                                                echo " selected=selected";
                                            } ?>>限整项总额</option>
                        <option value="1" <? if ($row['zxbzxe'] == 1) {
                                                echo " selected=selected";
                                            } ?>>限单项总额</option>
                    </select>
                </td>
            </tr>

            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">特码 正码默认显示A盘或B盘:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="mrab" class="za_select" id="mrab">
                        <option value="0" <? if ($row['mrab'] == 0) {
                                                echo " selected=selected";
                                            } ?>>A盘</option>
                        <option value="1" <? if ($row['mrab'] == 1) {
                                                echo " selected=selected";
                                            } ?>>B盘</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="25" colspan="2" align="center" nowrap="" class="t_list_caption">显示设置</td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">导航:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">
                    <input name="webname1" type="text" class="za_text" id="webname1" value="" />
                    <input name="webname2" type="text" class="za_text" id="webname2" value="" />
                    <input name="webname3" type="text" class="za_text" id="webname3" value="" />
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">验证码:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">
                    <input name="webname4" type="text" class="za_text" id="webname4" value="" />
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">投注+即时注单+报表:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="report_of" class="za_select" id="report_of">
                        <option value="0" <? if ($row['report_of'] == 0) { ?> selected="selected" <? } ?>>开放
                        </option>
                        <option value="1" <? if ($row['report_of'] == 1) { ?> selected="selected" <? } ?>>关闭
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">用户列表默认只显示"启用":&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="userlist" class="za_select" id="userlist">
                        <option value="0" <? if ($row['userlist'] == 0) { ?> selected="selected" <? } ?>>是
                        </option>
                        <option value="1" <? if ($row['userlist'] == 1) { ?> selected="selected" <? } ?>>否
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">代理报表查询限制:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">
                    <input name="dlcx" style="width:50px" type="text" class="za_text" id="dlcx" value="<?=$row['dlcx']?>" />
                    <select name="dlcxlx" class="za_select" id="dlcx">
                        <option value="0" <? if ($row['dlcxlx'] == 0) { ?> selected="selected" <? } ?>>月
                        </option>
                        <option value="1" <? if ($row['dlcxlx'] == 1) { ?> selected="selected" <? } ?>>天
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">会员账户历史显示:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="userls" class="za_select" id="userls">
                        <option value="0" <? if ($row['userls'] == 0) { ?> selected="selected" <? } ?>>两周
                        </option>
                        <option value="1" <? if ($row['userls'] == 1) { ?> selected="selected" <? } ?>>关闭
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">统计金额小数点:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="tjxsd" class="za_select" id="tjxsd">
                        <option value="0" <? if ($row['tjxsd'] == 0) { ?> selected="selected" <? } ?>>不留小数点
                        </option>
                        <option value="1" <? if ($row['tjxsd'] == 1) { ?> selected="selected" <? } ?>>两位小数点
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">预计盈利小数点:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="ylxsd" class="za_select" id="ylxsd">
                        <option value="0" <? if ($row['ylxsd'] == 0) { ?> selected="selected" <? } ?>>不留小数点
                        </option>
                        <option value="1" <? if ($row['ylxsd'] == 1) { ?> selected="selected" <? } ?>>两位小数点
                        </option>
                    </select>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">报表结果小数点:&nbsp;</td>
                <td bordercolor="cccccc" class="t_edit_td">

                    <select name="bbxsd" class="za_select" id="bbxsd">
                        <option value="0" <? if ($row['bbxsd'] == 0) { ?> selected="selected" <? } ?>>不留小数点
                        </option>
                        <option value="1" <? if ($row['bbxsd'] == 1) { ?> selected="selected" <? } ?>>两位小数点
                        </option>
                    </select>
                </td>
            </tr>

            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">系统跑马灯公告:&nbsp;</td>

                <td bordercolor="cccccc" class="t_edit_td">
                    <textarea id="Content" name="affice" rows="6" cols="50"><?= $row['affice'] ?>
</textarea><br>@webname@ 自动设为网站名称,@webnn@ 自动设为本期期数<br> @web_date_start@ 自动设为开盘时间, @web_date_end@ 自动设为开奖时间<br>
                </td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="30" align="right" class="t_edit_caption">系统维护公告:&nbsp;
                </td>

                <td bordercolor="cccccc" class="t_edit_td"><textarea id="a10" name="a10" rows="6" cols="50"><?= get_config("a10") ?></textarea></td>
            </tr>
            <tr bgcolor="#ffffff">
                <td height="25" colspan="2" align="center" bgcolor="#FFFFFF"><button class="btn1" onClick="submit()">修改</button></td>
            </tr>
            </form>
        </tbody>
    </table>
</body>