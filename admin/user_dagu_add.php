<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "04")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$maxcs = 888888888;
$istar = 0;
$iend = 100;
if ($_GET['act'] == "add") {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    chk_user($username);
    chk_pwd($pass);
    $pass = md5($pass);
    $xm = isset($_POST['xm']) ? safe_convert($_POST['xm']) : $username;
    $cs = isset($_POST['cs']) ? intval($_POST['cs']) : 0;
    $sj = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
    $sf = isset($_POST['sf']) ? intval($_POST['sf']) : 0;
    $kabcd = $_POST['kabcd'];
    $abcd = implode(",",$kabcd);
    $stat = 0;
    if ($_POST['rpz'] == 1) {
        $pz = 1;
    } else {
        $pz = 0;
    }
    if ($_POST['rzc'] == "1") {
        $zc = 1;
    } else {
        $zc = 0;
    }
    if ($_POST['rty'] == 1) {
        $ty = 1;
    } else {
        $ty = 0;
    }
    if ($_POST['ronline'] == 1) {
        $online = 1;
    } else {
        $online = 0;
    }
    if ($_POST['rreport'] == 1) {
        $report = 1;
    } else {
        $report = 0;
    }
    if ($_POST['rzcauto'] == 1) {
        $zc_auto = 1;
    } else {
        $zc_auto = 0;
    }
    if ($_POST['rzcall'] == 1) {
        $zc_all = 1;
    } else {
        $zc_all = 0;
    }
    $rpzall = $_POST['rpzall'];
    switch ($rpzall) {
        case "0":
            $pzall = 0;
            break;
        case "1":
            $pzall = 1;
            break;
        case "2":
            $pzall = 2;
            break;
        case "3":
            $pzall = 3;
            break;
        default:
            $pzall = 0;
            break;
    }
    $rds = $_POST['rds'];
    switch ($rds) {
        case "0":
            $dsc = 0;
            break;
        case "1":
            $dsc = 0.1;
            break;
        case "2":
            $dsc = 0.5;
            break;
        case "3":
            $dsc = 1;
            break;
        case "4":
            $dsc = 1.5;
            break;
        case "5":
            $dsc = 2;
            break;
        case "6":
            $dsc = 2.5;
            break;
        case "7":
            $dsc = -1;
            break;
        default:
            $dsc = 0;
            break;
    }
    if (empty($username)) {
        echo "<script>alert('帐号不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    if (empty($pass)) {
        echo "<script>alert('密码不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    if ($maxcs < $cs) {
        echo "<script>alert('总信用额超过最高信用额!');window.history.go(-1);</script>";
        exit;
    }
    if ($iend < $sj) {
        echo "<script>alert('对不起,请正确设置占成!');window.history.go(-1);</script>";
        exit;
    }
    if ($iend < $sf) {
        echo "<script>alert('对不起,请正确设置占成!');window.history.go(-1);</script>";
        exit;
    }
    if ($sj + $sf != $iend) {
        echo "<script>alert('对不起,请正确设置占成!'); window.history.go(-1);</script>";
        exit;
    }
    if ($iend < $sj + $sf) {
        echo "<script>alert('公司成数加分公司成数不能超过" . $iend . "%！!');window.history.go(-1);</script>";
        exit;
    }
    $sql = "INSERT INTO  web_agent set uid='',kauser='{$username}',kapassword='{$pass}',xm='{$xm}',slogin='{$utime}',sip='{$userip}',zlogin='{$utime}',zip='{$userip}',adduser='{$jxadmin}',look='0',lx='4',dagu='',guan='',zong='',cs='{$cs}',ts='{$cs}',adddate='{$utime}',stat='{$stat}',ty='{$ty}',pz='{$pz}',pzall='{$pzall}',abcd='{$abcd}',zc='{$zc}',zc_all='{$zc_all}',zc_auto='{$zc_auto}',online='{$online}',report='{$report}',gs_zc='{$sj}',dagu_zc='{$sf}',guan_zc='0',zong_zc='0',dai_zc='0'";
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $result = $db1->query("select * from web_agent where  kauser='" . $username . "'  order by id desc LIMIT 1");
    $row = $result->fetch_array();
    $userid = $row['id'];
    if ($userid != "") {
        $result = $db1->query("select id,class,ds_lb,ds,yg,ygb,ygc,ygd,yge,ygf,ygg,ygh,xx,xxx from  web_config_ds where lx=0 order by id");
        while ($image = $result->fetch_array()) {
            if (0 <= $dsc) {
                $yg = round($image['yg'] - $dsc, 2);
                $ygb = round($image['ygb'] - $dsc, 2);
                $ygc = round($image['ygc'] - $dsc, 2);
                $ygd = round($image['ygd'] - $dsc, 2);
                $yge = round($image['yge'] - $dsc, 2);
                $ygf = round($image['ygf'] - $dsc, 2);
                $ygg = round($image['ygg'] - $dsc, 2);
                $ygh = round($image['ygh'] - $dsc, 2);
            } else {
                $yg = $ygb = $ygc = $ygd = $yge = $ygf = $ygg = $ygh = 0;
            }
            $db1->query("INSERT INTO web_user_ds set username='{$username}',userid='{$userid}',class='" . $image['class'] . "',ds_lb='" . $image['ds_lb'] . "',ds_id='" . $image['id'] . "',ds='" . $image['ds'] . "',yg='" . $yg . "',ygb='" . $ygb . "',ygc='" . $ygc . "',ygd='" . $ygd . "',yge='" . $yge . "',ygf='" . $ygf . "',ygg='" . $ygg . "',ygh='" . $ygh . "',xx='" . $image['xx'] . "',xxx='" . $image['xxx'] . "',ds_lock='0',lx='4',pz='0',pz_sum='0',zf_sum='500000',dagu='',guan='',zong='',dai=''");
        }
    }
    echo "<script>alert('添加成功!');window.location.href='main.php?action=user_dagu_list&uid=" . $uid . "';</script>";
    exit;
} ?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script>
    function check_user() {
        username_value = $("username").value;
        if (username_value == '') {
            $("username").focus();
            alert("请输入账号!!!");
            return false;
        } else {
            $("check_frame").src = 'main.php?action=check&uid=<?= $uid ?>&username=' + username_value;
        }
    }
</script>
<script>
    function SubChk() {
        if ($("username").value == '') {
            $("username").focus();
            alert("请输入账号!!!");
            return false;
        }
        if ($("pass").value == '') {
            $("pass").focus();
            alert("请输入密码!!!");
            return false;
        }
        if ($("pass2").value == '') {
            $("pass2").focus();
            alert("请输入确认密码!!!");
            return false;
        }
        if ($("pass").value != $("pass2").value) {
            $("pass2").focus();
            alert("确认密码与密码不一致!!!");
            return false;
        }
        if ($("xm").value == '') {
            $("xm").focus();
            alert("请输入名称!!!");
            return false;
        }
        if ($("cs").value == '') {
            $("cs").focus();
            alert("请输入总信用额度!!!");
            return false;
        }
        if (isNaN($("cs").value)) {
            alert('总信用额度只能输入数字');
            $("cs").focus();
            return false;
        }
        if ($("cs").value > eval($("maxcs").value)) {
            $("cs").focus();
            alert("信用额度不能大于最大信用额度!!!");
            return false;
        }
        if (!confirm("是否确定添加分公司?")) {
            return false;
        }
    }
</script>
<script>
    function ChangeSelectorSJ() {

        $("sf").value = "<?= $iend ?>" - $("sj").value;
    }

    function ChangeSelectorSF() {
        $("sj").value = "<?= $iend ?>" - $("sf").value;
    }
</script>

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">分公司管理－</span><span class="font_b">添加分公司</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright">
            <!--<div align="right"><a href="main.php?action=user_dagu_list&uid=<?= $uid ?>">回上一页</a></div>-->

            <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="回上一页">
        </div>
    </div>
    <form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_dagu_add&uid=<?= $uid ?>&act=add">

        <table width="900" align="center" border="0" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">基本资料设定</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed"><input name="username" type="text" class="za_text" id="username">&nbsp;
                    <input type="button" onClick="check_user();" value="检查账号" class="za_button" />&nbsp;帐号必须至少1个字元长，最多12个字元长，并只能有数字(0-9)，及英文小写字母
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed"><input name="pass" type="password" class="za_text" id="pass" />&nbsp;密码必须至少6个字元长，最多12个字元长，并只能有数字(0-9)，及英文大小写字母 </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">确认密码:</td>
                <td bgcolor="#FFFFFF" class="m_bc_ed"><input name="pass2" type="password" class="za_text" id="pass2" />
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">名称:</td>
                <td bgcolor="#FFFFFF" class="m_bc_ed"><input name="xm" type="text" class="za_text" id="xm" /></td>
            </tr>
            <tr>
                <td height="17" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption">下注资料设定</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总信用额:</td>
                <td bgcolor="#FFFFFF" class="m_bc_ed">
                    <input name="cs" type="text" class="za_text" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="0" />最高信用额度:
                    <?= $maxcs ?>
                    <input name="maxcs" type="hidden" id="maxcs" value="<?= $maxcs ?>" />
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">盘口:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <? if ($pannums >= 1) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="A" checked="checked" />A<? } ?>
                        <? if ($pannums >= 2) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="B" checked="checked" />B<? } ?>
                            <? if ($pannums >= 3) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="C" checked="checked" />C<? } ?>
                                <? if ($pannums >= 4) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="D" checked="checked" />D<? } ?>
                                    <? if ($pannums >= 5) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="E" checked="checked" />E<? } ?>
                                        <? if ($pannums >= 6) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="F" checked="checked" />F<? } ?>
                                            <? if ($pannums >= 7) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="G" checked="checked" />G<? } ?>
                                                <? if ($pannums >= 8) { ?><input type="checkbox" name="kabcd[]" id="kabcd[]" value="H" checked="checked" />H<? } ?>

                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">走飞:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rpz" id="rpz" value="0" checked="checked" onClick="CkZC(0)" />允许
                    <input type="radio" name="rpz" id="rpz" value="1" onClick="StopPZ();CkZC(1);" />禁止
                </td>
            </tr>
            <tr id='zctr'>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">分公司走飞单独控制:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rzc" id="rzc" value="0" checked="checked" />允许
                    <input type="radio" name="rzc" id="rzc" value="1" />禁止&nbsp;&nbsp;<font color="gray">
                        当该分公司全线开启走飞时,公司可以单独控制分公司走飞功能</font>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">投注:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="m_bc_ed"> <input type="radio" name="rty" id="rty" value="0" checked="checked" />开放投注
                    <input type="radio" name="rty" id="rty" value="1" onClick="StopTY()" />暂停投注
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">公司占成数:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="m_bc_ed">

                    <select name="sj" id="sj" onchange="ChangeSelectorSJ();">
                        <? $bb = $istar;
                        for (; $bb <= $iend; $bb += 5) { ?>
                            <option value="<?= $bb ?>" <? if ($bb == 100) { ?> selected="selected" <? } ?>>
                                <? switch ($bb) {
                                    case 0:
                                        print "不占成";
                                        break;
                                    default:
                                        print $bb . "%";
                                        break;
                                } ?>
                            </option>
                        <? } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">分公司占成数:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="m_bc_ed">
                    <select name="sf" id="sf" onchange="ChangeSelectorSF();">
                        <? $bb = $istar;
                        for (; $bb <= $iend; $bb += 5) { ?>
                            <option value="<?= $bb ?>">
                                <? switch ($bb) {
                                    case 0:
                                        print "不占成";
                                        break;
                                    default:
                                        print $bb . "%";
                                        break;
                                } ?>
                            </option>
                        <? } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">退水设定:</td>
                <td height="30" bordercolor="#CCCCCC" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rds" id="rds" value="0" checked="checked" />全退
                    <input type="radio" name="rds" id="rds" value="1" />赚0.1
                    <input type="radio" name="rds" id="rds" value="2" />赚0.5
                    <input type="radio" name="rds" id="rds" value="3" />赚1
                    <input type="radio" name="rds" id="rds" value="4" />赚1.5
                    <input type="radio" name="rds" id="rds" value="5" />赚2
                    <input type="radio" name="rds" id="rds" value="6" />赚2.5
                    <input type="radio" name="rds" id="rds" value="7" />全不退
                </td>
            </tr>
            <tr>
                <td height="17" colspan="2" bgcolor="#FFFFFF" class="t_list_caption">用户参数</td>
            </tr>

            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">在线统计:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="ronline" id="ronline" value="0" checked="checked" />不允许查看
                    <input type="radio" name="ronline" id="ronline" value="1" />允许查看
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">报表显示:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rreport" id="rreport" value="0" checked="checked" />显示分公司个人 <input type="radio" name="rreport" id="rreport" value="1" />显示总公司
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">下级走飞归属:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rpzall" id="rpzall" value="0" onClick="Ckpzall(0)" checked="checked" />全归公司
                    <input type="radio" name="rpzall" id="rpzall" value="1" onClick="Ckpzall(0)" />全归分公司
                    <input type="radio" name="rpzall" id="rpzall" value="2" onClick="Ckpzall(1)" />按各级成数分配
                    <input type="radio" name="rpzall" id="rpzall" value="3" onClick="Ckpzall(1)" />由下级自由选择
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">允许剩余成数:</td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rzcauto" id="rzcauto" value="0" checked="checked" />允许
                    <input type="radio" name="rzcauto" id="rzcauto" value="1" />
                    禁止&nbsp;&nbsp;<font color="gray">此项一经设定不得修改!</font>
                </td>
            </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FFFFFF" class="t_edit_caption">剩余成数归属
                    <span id="gsmsg"></span>:
                </td>
                <td height="30" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="radio" name="rzcall" id="rzcall" value="0" checked="checked" />归公司
                    <input type="radio" name="rzcall" id="rzcall" value="1" />归分公司 &nbsp;&nbsp;<font color="gray">
                        此项一经设定不得修改!</font>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input class="btn1" type="submit" name="button" id="button" value="确定" />
                </td>
            </tr>
        </table>
    </form>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none"></iframe>
</body>