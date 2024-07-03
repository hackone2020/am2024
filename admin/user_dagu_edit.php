<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "04")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$result = $db1->query("select * from web_agent where id=" . $_GET['id'] . " and lx=4 order by id LIMIT 1");
$row = $result->fetch_assoc();
if ($row == "") {
    exit;
}
$userid = $row['id'];
$username = $row['kauser'];
$xm = $row['xm'];
$cs = $row['cs'];
$gs_zc = $row['gs_zc'];
$dagu_zc = $row['dagu_zc'];
$stat = $row['stat'];
$pz = $row['pz'];
$ty = $row['ty'];
$report = $row['report'];
$zc_auto = $row['zc_auto'];
$zc_all = $row['zc_all'];
$pzall = $row['pzall'];
$online = $row['online'];
$zc = $row['zc'];
$maxcs = 888888888;
$mincs = 0;
$minzc = 0;
$minzc_user = "";
$istar = 0;
$iend = 100;
$result = $db1->query("SELECT kauser,guan_zc FROM web_agent WHERE dagu = '" . $username . "' AND lx=3 ORDER BY guan_zc DESC LIMIT 1");
$numzc1 = $result->fetch_array();
if ($numzc1 != "" && $minzc < $numzc1['guan_zc']) {
    $minzc = $numzc1['guan_zc'];
    $minzc_user = "下属股东账号:" . $numzc1['kauser'] . "占成" . $minzc . "%";
}
if ($zc_auto == 0) {
    $result = $db1->query("SELECT kauser,dagu_zc FROM web_member WHERE dagu = '" . $username . "' AND zs=4 ORDER BY dagu_zc DESC LIMIT 1");
    $numzc2 = $result->fetch_array();
    if ($numzc2 != "" && $minzc < $numzc2['dagu_zc']) {
        $minzc = $numzc2['dagu_zc'];
        $minzc_user = "直属会员账号:" . $numzc2['kauser'] . "分公司占成" . $minzc . "%";
    }
}
$mumu = 0;
$result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=3 and   dagu='" . $username . "' order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $mumu = $rsw[0];
}
$result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=4 and   dagu='" . $username . "' order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $mumu += $rsw[0];
}
$mincs += $mumu;
if ($_GET['act'] == "edit") {
    $pass = $_POST['pass'];
    if ($pass != "") {
        chk_pwd($pass);
        $pass = md5($pass);
        $sql = "update  web_agent set uid='',adddate='" . $utime . "',kapassword='" . $pass . "' where id='" . $userid . "' order by id desc";
        if (!$db1->query($sql)) {
            exit("数据库修改出错");
        }
    }
    $xm = isset($_POST['xm']) ? safe_convert($_POST['xm']) : $username;
    $cs = isset($_POST['cs']) ? intval($_POST['cs']) : 0;
    $ts = $cs - $mincs;
    $sj = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
    $sf = isset($_POST['sf']) ? intval($_POST['sf']) : 0;
    if ($_POST['rstat'] == 1) {
        $stat = 1;
    } else {
        $stat = 0;
    }
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
    if ($maxcs < $cs) {
        echo "<script>alert('总信用额超过最高信用额!');window.history.go(-1);</script>";
        exit;
    }
    if ($cs < $mincs) {
        echo "<script>alert('总信用额不能低于已用信用额:" . $mincs . "!');window.history.go(-1);</script>";
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
    if ($sf < $minzc) {
        echo "<script>alert('分公司最低占成不能低于" . $minzc_user . "');window.history.go(-1);</script>";
        exit;
    }
    if ($iend < $sj + $sf) {
        echo "<script>alert('公司成数加分公司成数不能超过" . $iend . "%！!');window.history.go(-1);</script>";
        exit;
    }
    $sql = "update  web_agent set uid='',xm='" . $xm . "',cs='" . $cs . "',ts='" . $ts . "',adddate='" . $utime . "',dagu_zc='" . $sf . "',gs_zc='" . $sj . "',pz='" . $pz . "',zc='" . $zc . "',stat='" . $stat . "',ty='" . $ty . "',pzall='" . $pzall . "',online='" . $online . "',report='" . $report . "' where id='" . $userid . "'  order by id desc";
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    if ($_POST['sj'] != $gs_zc || $_POST['sf'] != $dagu_zc) {
        $str1 = "分公司占成修改<br>修改前公司占成:" . $gs_zc . "%,分公司占成:" . $dagu_zc . "%";
        $str2 = "分公司占成修改<br>修改后公司占成:" . $_POST['sj'] . "%,分公司占成:" . $_POST['sf'] . "%";
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
        $db1->query($sql);
        if ($zc_all == 0) {
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',dagu_zc=" . $sf . ",gs_zc=" . $sj . "  where zs=4 and dagu='" . $username . "'");
                $db1->query("update web_agent set uid='',gs_zc=" . $sj . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where dagu='" . $username . "'");
                $db1->query("update web_member set uid='',dagu_zc=" . $sf . "-guan_zc-zong_zc-dai_zc,gs_zc=" . $sj . "  where zs!=4 and dagu='" . $username . "'");
            } else {
                $result = $db1->query("select * from web_agent where lx=3 and dagu='" . $username . "' and dagu_zc+guan_zc>" . $sf);
                $cou = mysql_num_rows($result);
                while ($cou != 0 && ($image = mysql_fetch_array($result))) {
                    $guan_zc_temp = $image['guan_zc'];
                    $guan_name_temp = $image['kauser'];
                    $db1->query("update web_agent set uid='',dagu_zc=" . $sf . "-guan_zc,gs_zc=100-dagu_zc-guan_zc  where lx=3 and kauser='" . $guan_name_temp . "'");
                    $db1->query("update web_agent set uid='',dagu_zc=" . $sf . "-" . $guan_zc_temp . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where lx<3 and guan='" . $guan_name_temp . "' and dagu='" . $username . "'");
                    $db1->query("update web_member set uid='',dagu_zc=" . $sf . "-" . $guan_zc_temp . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where zs!=4 and guan='" . $guan_name_temp . "' and dagu='" . $username . "'");
                }
            }
        } else {
            $db1->query("update web_agent set uid='',gs_zc=" . $sj . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where dagu='" . $username . "'");
            $db1->query("update web_member set uid='',gs_zc=" . $sj . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where zs!=4 and dagu='" . $username . "'");
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',dagu_zc=" . $sf . ",gs_zc=" . $sj . "  where zs=4 and dagu='" . $username . "'");
            }
        }
    }
    del_online($username, 0);
    echo "<script>alert('修改成功!');window.location.href='main.php?action=user_dagu_edit&uid=" . $uid . "&id=" . $userid . "';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script>
function SubChk() {
    if ($("pass").value != '' && $("pass2").value == '') { $("pass2").focus(); alert("请输入确认密码!!!"); return false; }
    if ($("pass").value != $("pass2").value) { $("pass2").focus(); alert("确认密码与密码不一致!!!"); return false; }
    if ($("xm").value == '') { $("xm").focus(); alert("请输入名称!!!"); return false; }
    if ($("cs").value == '') { $("cs").focus(); alert("请输入总信用额度!!!"); return false; }
    if (isNaN($("cs").value)) { alert('总信用额度只能输入数字'); $("cs").focus(""); return false;}
    if ($("cs").value > eval($("maxcs").value)) { $("cs").focus(); alert("信用额度不能大于最高信用额度!!!"); return false; }
    if ($("cs").value < eval($("mincs").value)) { $("cs").focus(); alert("信用额度不能小于已用信用额度!!!"); return false; }
    if (!confirm("是否确定修改分公司?")) { return false; }}
</script>

<script>
function ChangeSelectorSJ() { $("sf").value = "<?=$iend?>" - $("sj").value; }
    function ChangeSelectorSF() {
        $("sj").value = "<?=$iend?>"-$("sf").value;}
        function StopPZ() { alert("该账号及其下属代理商将关闭走飞服务!!!"); } function StopTY() { alert("该账号及其下属会员将暂停投注服务!!!"); }
        function CkZC(ckid) { if (ckid == 1) { $("zctr").style.display = 'none'; } else { $("zctr").style.display = ''; } }
        function Ckpzall(ckid) {
            if (ckid == 1) {
                $("gsmsg").innerHTML = "/各级走飞剩余金额";
            } else {
                $("gsmsg").innerHTML = "";
            }
        }
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;分公司管理－</span><span class="font_b">修改分公司&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">   
      <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="回上一页">
</div></div> 
    <form action="main.php?action=user_dagu_edit&uid=<?=$uid?>&act=edit&id=<?=$_GET['id']?>" method="post" name="form1" id="form1" onSubmit="return SubChk()">
        <table width="800"border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
            <tr>
                <td height="20" colspan="4" align="center" bgcolor="#FFFFFF" class="t_list_caption">基本资料设定</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <?=$username?>
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass" type="password"
                        class="inp1" id="pass" />(密码不修改请留空)
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">确认密码:</td>
                <td colspan="3" nowrap="nowrap" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass2" type="password" class="inp1" id="pass2" />
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">名称:</td>
                <td colspan="3" nowrap="nowrap" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="xm" type="text" class="inp1" id="xm" value="<?=$xm?>" />
                </td>
            </tr>

            <tr>
                <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">下注资料设定</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总信用额:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="cs" type="text"
                        class="inp1" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')"
                        value="<?=$row['cs']?>" />最高信用额度:
                    <?=$maxcs?>

                    <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />&nbsp;&nbsp;(已用信用额度:<?=$mincs?> />&nbsp;&nbsp;剩余信用额度:<?=$row['cs']-$mincs?>)
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号状况:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rstat" id="rstat" value="0" <? if ($stat==0) {?>
                    checked="checked"
                  <?  }?>
                    />启用<input type="radio" name="rstat" id="rstat" value="1" <?if ($stat==1) {?>
                    checked="checked"
                    <?}?>
                    />停用
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">走飞:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rpz" id="rpz" value="0" <?if ($pz==0) {?>
                    checked="checked"
                    <?}?>
                    onClick="CkZC(0)"/>允许<input type="radio" name="rpz" id="rpz" value="1" <?if ($pz==1) {?>
                    checked="checked"
                    <?}?>
                    onClick="StopPZ();CkZC(1);"/>禁止
                </td>
            </tr>
            <tr id='zctr' <?if ($pz==1) {?>
                style="display:none"
                <?}?>
                >
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">分公司走飞单独控制:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rzc" id="rzc" value="0" <?if ($zc==0) {?>
                    checked="checked"
                    <?}?>
                    />允许<input type="radio" name="rzc" id="rzc" value="1" <?if ($zc==1) {?>
                    checked="checked"
                    <?}?>
                    />禁止&nbsp;&nbsp;

                    <font color="gray">当该分公司全线开启走飞时,公司可以单独控制分公司走飞功能</font>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">投注:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rty" id="rty" value="0" <? if ($ty==0) {?>
                    checked="checked"
                    <?}?>
                    />开放投注<input type="radio" name="rty" id="rty" value="1" <?if ($ty==1) {?>
                    checked="checked"
                    <?}?>
                    onClick="StopTY()" />暂停投注
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">
                    <span class="STYLE4">公司占成数:</span>
                </td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sj" id="sj" onchange=ChangeSelectorSJ()>
                        <? $bb = $istar;
for (; $bb <= $iend - $minzc; $bb += 5) {?>
                        <option value="<?=$bb?>" <? if ($gs_zc==$bb) {?>
                            selected="selected"
                            <?}?>
                            >
                            <? switch ($bb) {
        case 0:
            print "不占成";
            break;
        default:
            print $bb . "%";
            break;
    }?>
                        </option>
                        <?}?>
                    </select>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">
                    <span class="STYLE4">分公司占</span>成数
                </td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sf" id="sf" onchange=ChangeSelectorSF()>
                        <? $bb = $minzc;
for (; $bb <= $iend; $bb += 5) {?>
                        <option value="<?=$bb?>" <? if ($dagu_zc==$bb) {?>
                            selected="selected"
                            <?}?>
                            >
                            <? switch ($bb) {
        case 0:
            print "不占成";
            break;
        default:
            print $bb . "%";
            break;
    }?>
                        </option>
                        <?}?>
                    </select>
                </td>
            </tr>


            <tr>
                <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">用户参数</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">在线统计:</td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="ronline" id="ronline" value="0" <? if($online==0) {?>
                    checked="checked"
                  <?  }?>/>不允许查看<input type="radio" name="ronline" id="ronline" value="1" <? if ($online==1) {?>
                    checked="checked"
                    <?}?>
                    />允许查看
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">报表显示:</td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rreport" id="rreport" value="0" <?if ($report==0) {?>
                    checked="checked"
                    <?}?>
                    />显示分公司个人<input type="radio" name="rreport" id="rreport" value="1" <?if ($report==1) {?>
                    checked="checked"
                    <?}?>
                    />显示总公司
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">下级走飞归属:</td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rpzall" id="rpzall" value="0" onClick="Ckpzall(0)"
<?if ($pzall == 0) {?>
    checked="checked" <?}?>/>全归公司<input type="radio" name="rpzall" id="rpzall" value="1" onClick="Ckpzall(0)" 
<?if ($pzall == 1) {?>
    checked="checked" <?}?>
                    />全归分公司<input type="radio" name="rpzall" id="rpzall" value="2" onClick="Ckpzall(1)" 
<?if ($pzall == 2) {?>
    checked="checked" <?}?>
                    />按各级成数分配<input type="radio" name="rpzall" id="rpzall" value="3" onClick="Ckpzall(1)" 
<?if ($pzall == 3) {?>
    checked="checked" <?}?>
                    />由下级自由选择
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">允许剩余成数:</td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <? if ($zc_auto == 0) {?>
                    允许
                    <?} else {?>
                    禁止
                    <?}?>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">剩余成数归属
                    <span id="gsmsg">
                        <? if ($pzall == 2 || $pzall == 3) {?>
                        /各级走飞剩余金额
                        <?}?>
                    </span>:
                </td>
                <td colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <? if ($zc_all == 0) {?>
                    归公司
                    <?} else {?>
                    归分公司
                    <?}?>
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">最后登录时间:</td>
                <td width="32%" height="30" bgcolor="#FFFFFF">
                    <?=$row['zlogin']?>
                </td>

                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption" >最后登录IP:</td>
                <td width="36%" height="30" bgcolor="#FFFFFF"><?=$row['zip']?>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">基本资料更新时间:</td>
                <td height="30" bgcolor="#FFFFFF"><?=$row['adddate']?>
                </td>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">登录次数:</td>

                <td height="30" bgcolor="#FFFFFF"><?=$row['look']?>次
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">新增时间:</td>
                <td height="30" bgcolor="#FFFFFF"><?=$row['slogin']?>
                </td>

                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号添加人:</td>
                <td height="30" bgcolor="#FFFFFF"><?=$row['adduser']?>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" >
                    <input type="submit" class="btn1" name="button" id="button" value="确定" />
                </td>
            </tr>
        </table>
    </form>
</body>