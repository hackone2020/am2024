<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "05")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$result = $db1->query("select * from web_agent where id=" . $_GET['id'] . " and lx=3 order by id LIMIT 1");
$row = $result->fetch_assoc();
if ($row == "") {
    exit;
}
$userid = $row['id'];
$username = $row['kauser'];
$xm = $row['xm'];
$cs = $row['cs'];
$dagu = $row['dagu'];
$dagu_zc = $row['dagu_zc'];
$guan_zc = $row['guan_zc'];
$stat = $row['stat'];
$pz = $row['pz'];
$ty = $row['ty'];
$zc = $row['zc'];
$minzc_user = "";
$minzc = 0;
$istar = 0;
$mincs = 0;
if ($dagu != "") {
    $result1 = $db1->query("select * from web_agent where kauser='" . $dagu . "' and lx=4 order by id LIMIT 1");
    $rows = $result1->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $report = $rows['report'];
    $zc_auto = $rows['zc_auto'];
    $zc_all = $rows['zc_all'];
    $pzall = $rows['pzall'];
    $maxcs = $rows['cs'];
    $dagumaxcs = $rows['cs'];
    $dagumaxzc = $rows['dagu_zc'];
    $gs_zc = $rows['gs_zc'];
    $iend = $rows['dagu_zc'];
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=3 and   dagu='" . $dagu . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu = $rsw[0];
    }
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=4 and   dagu='" . $dagu . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $mumudagu = $mumu;
    $maxcs = $maxcs - $mumu + $cs;
}
$result = $db1->query("SELECT kauser,zong_zc FROM web_agent WHERE guan = '" . $username . "' AND lx=2 ORDER BY zong_zc DESC LIMIT 1");
$numzc1 = $result->fetch_array();
if ($numzc1 != "" && $minzc < $numzc1['zong_zc']) {
    $minzc = $numzc1['zong_zc'];
    $minzc_user = "下属总代理账号:" . $numzc1['kauser'] . "占成" . $minzc . "%";
}
if ($zc_auto == 0) {
    $result = $db1->query("SELECT kauser,guan_zc FROM web_member WHERE guan = '" . $username . "' AND zs=3 ORDER BY guan_zc DESC LIMIT 1");
    $numzc2 = $result->fetch_array();
    if ($numzc2 != "" && $minzc < $numzc2['guan_zc']) {
        $minzc = $numzc2['guan_zc'];
        $minzc_user = "直属会员账号:" . $numzc2['kauser'] . "股东占成" . $minzc . "%";
    }
}
$mumu = 0;
$result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=2 and   guan='" . $username . "' order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $mumu = $rsw[0];
}
$result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=3 and   guan='" . $username . "' order by id desc");
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
    if ($_POST['rty'] == 1) {
        $ty = 1;
    } else {
        $ty = 0;
    }
    if ($pzall == 3 && $zc_all == 0) {
        if ($_POST['zc'] == "1") {
            $zc = 1;
        } else {
            $zc = 0;
        }
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
        echo "<script>alert('股东最低占成不能低于" . $minzc_user . "');window.history.go(-1);</script>";
        exit;
    }
    if ($zc_auto == 0) {
        if ($zc_all == 0) {
            $gs_zc = 100 - $sj - $sf;
        } else {
            if ($sj + $sf != $iend) {
                echo "<script>alert('对不起,请正确设置占成!'); window.history.go(-1);</script>";
                exit;
            }
        }
    } else {
        if ($sj + $sf != $iend) {
            echo "<script>alert('对不起,请正确设置占成!'); window.history.go(-1);</script>";
            exit;
        }
    }
    if ($iend < $sj + $sf) {
        echo "<script>alert('大股东成数加股东成数不能超过" . $iend . "%！!');window.history.go(-1);</script>";
        exit;
    }
    $sql = "update  web_agent set uid='',xm='" . $xm . "',cs='" . $cs . "',ts='" . $ts . "',adddate='" . $utime . "',guan_zc='" . $sf . "',dagu_zc='" . $sj . "',gs_zc='" . $gs_zc . "',pz='" . $pz . "',stat='" . $stat . "',ty='" . $ty . "',zc='" . $zc . "' where id='" . $userid . "'  order by id desc";
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    if ($_POST['sj'] != $dagu_zc || $_POST['sf'] != $guan_zc) {
        $str1 = "股东占成修改<br>修改前大股东占成:" . $dagu_zc . "%,股东占成:" . $guan_zc . "%";
        $str2 = "股东占成修改<br>修改后大股东占成:" . $_POST['sj'] . "%,股东占成:" . $_POST['sf'] . "%";
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
        $db1->query($sql);
        if ($zc_all == 0) {
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',guan_zc=" . $sf . ",dagu_zc=" . $sj . ",gs_zc=" . $gs_zc . "  where zs=3 and guan='" . $username . "'");
                $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",dagu_zc=" . $sj . ",guan_zc=" . $sf . "-zong_zc-dai_zc  where guan='" . $username . "'");
                $db1->query("update web_member set uid='',gs_zc=" . $gs_zc . ",dagu_zc=" . $sj . ",guan_zc=" . $sf . "-zong_zc-dai_zc  where zs!=3 and guan='" . $username . "'");
            } else {
                $db1->query("update web_member set uid='',dagu_zc=" . $sj . ",gs_zc=100-dagu_zc-guan_zc  where zs=3 and guan='" . $username . "'");
                $result = $db1->query("select * from web_agent where lx=2 and guan='" . $username . "' and (dagu_zc!=" . $sj . " or guan_zc+zong_zc>" . $sf . ")");
                $cou = $result->num_rows;
                while ($cou != 0 && ($image = $result->fetch_array())) {
                    $guan_zc_temp = $image['guan_zc'];
                    $zong_zc_temp = $image['zong_zc'];
                    $zong_name_temp = $image['kauser'];
                    if ($sf < $guan_zc_temp + $zong_zc_temp) {
                        $db1->query("update web_agent set uid='',dagu_zc=" . $sj . ",guan_zc=" . $sf . "-zong_zc,gs_zc=100-dagu_zc-guan_zc-zong_zc  where lx=2 and kauser='" . $zong_name_temp . "'");
                        $db1->query("update web_agent set uid='',dagu_zc=" . $sj . ",guan_zc=" . $sf . "-" . $zong_zc_temp . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where lx<2 and zong='" . $zong_name_temp . "' and guan='" . $username . "'");
                        $db1->query("update web_member set uid='',dagu_zc=" . $sj . ",guan_zc=" . $sf . "-" . $zong_zc_temp . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where zs!=3 and zong='" . $zong_name_temp . "' and guan='" . $username . "'");
                    } else {
                        $db1->query("update web_agent set uid='',dagu_zc=" . $sj . ",gs_zc=100-dagu_zc-guan_zc-zong_zc  where lx=2 and kauser='" . $zong_name_temp . "'");
                        $db1->query("update web_agent set uid='',dagu_zc=" . $sj . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where lx<2 and zong='" . $zong_name_temp . "' and guan='" . $username . "'");
                        $db1->query("update web_member set uid='',dagu_zc=" . $sj . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where zs!=3 and zong='" . $zong_name_temp . "' and guan='" . $username . "'");
                    }
                }
            }
        } else {
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',guan_zc=" . $sf . ",dagu_zc=" . $sj . ",gs_zc=" . $gs_zc . ",  where zs=3 and guan='" . $username . "'");
                $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",dagu_zc=" . $sj . ",guan_zc=" . $sf . "-zong_zc-dai_zc  where guan='" . $username . "'");
                $db1->query("update web_member set uid='',gs_zc=" . $gs_zc . ",dagu_zc=" . $sj . ",guan_zc=" . $sf . "-zong_zc-dai_zc  where zs!=3 and guan='" . $username . "'");
            } else {
                $db1->query("update web_member set uid='',gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc  where zs=3 and guan='" . $username . "'");
                $result = $db1->query("select * from web_agent where lx=2 and guan='" . $username . "' and (dagu_zc!=" . $sj . " or guan_zc+zong_zc>" . $sf . ")");
                $cou = $result->num_rows();
                while ($cou != 0 && ($image = $result->fetch_array())) {
                    $guan_zc_temp = $image['guan_zc'];
                    $zong_zc_temp = $image['zong_zc'];
                    $zong_name_temp = $image['kauser'];
                    if ($sf < $guan_zc_temp + $zong_zc_temp) {
                        $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",guan_zc=" . $sf . "-zong_zc,dagu_zc=100-gs_zc-guan_zc-zong_zc  where lx=2 and kauser='" . $zong_name_temp . "'");
                        $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",guan_zc=" . $sf . "-" . $zong_zc_temp . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where lx<2 and zong='" . $zong_name_temp . "' and guan='" . $username . "'");
                        $db1->query("update web_member set uid='',gs_zc=" . $gs_zc . ",guan_zc=" . $sf . "-" . $zong_zc_temp . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where zs!=3 and zong='" . $zong_name_temp . "' and guan='" . $username . "'");
                    } else {
                        $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc  where lx=2 and kauser='" . $zong_name_temp . "'");
                        $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where lx<2 and zong='" . $zong_name_temp . "' and guan='" . $username . "'");
                        $db1->query("update web_member set uid='',gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where zs!=3 and zong='" . $zong_name_temp . "' and guan='" . $username . "'");
                    }
                }
            }
        }
    }
    del_online($username, 1);
    echo "<script>alert('修改成功!');window.location.href='main.php?action=user_guan_edit&uid=" . $uid . "&id=" . $userid . "';</script>";
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
        if (isNaN($("cs").value)) { alert('总信用额度只能输入数字'); $("cs").focus(); return false; }
        if ($("cs").value > eval($("maxcs").value)) { $("cs").focus(); alert("信用额度不能大于最高信用额度!!!"); return false; }
        if ($("cs").value < eval($("mincs").value)) { $("cs").focus(); alert("信用额度不能小于已用信用额度!!!"); return false; }
        if (!confirm("是否确定修改股东?")) { return false; }
    }
</script>

<script>
<?    if ($zc_auto == 0 && $zc_all == 0) { ?>
        function ChangeSelectorSJ() {
            var zzc = eval($("sf").value) + eval($("sj").value);
            if (zzc > "<?=$iend?>") {
                $("sf").value = $("sj").focus();alert("大股东占成数 + 股东占成数不能大于可用占成数<?=$iend?>%！");return false;}} 
                function ChangeSelectorSF() {
                    var zzc = eval($("sf").value) + eval($("sj").value);
                    if (zzc > "<?=$iend?>") {
                        $("sj").value = "<?=$iend?>" - $("sf").value; 
                        $("sf").focus();
                        alert("大股东占成数+股东占成数不能大于可用占成数<?=$iend?>%");
                        return false;
                    }
                }
                <?
            } else {?>
                function ChangeSelectorSJ()
                {
                    $("sf").value = "<?=$iend?>"-$("sj").value;
                    
                } 
                function ChangeSelectorSF() {
                    $("sj").value="<?=$iend?>"-$("sf").value;
                    
                }
               
                
                <?}?>
                
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;股东管理－</span><span class="font_b">修改股东&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">   
      <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="回上一页">
</div></div>
    <?if ($dagu != "") {?>
     <table width="800"border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td height="20" colspan="2" class="t_list_caption">大股东(<?=$dagu?>)资料简述
            </td>
        </tr>
        <tr>
            <td width="16%" height="20" align="right" class="t_edit_caption">下注:</td>
            <td class="t_edit_td">可用占成数:<?=$dagumaxzc?>%&nbsp;&nbsp;&nbsp;总信用额:<?=$dagumaxcs?>&nbsp;&nbsp;&nbsp;已用信用额:<?=$mumudagu?>&nbsp;&nbsp;&nbsp;剩余信用额:<?=$dagumaxcs-$mumudagu?>
            </td>
        </tr>
        <tr>
            <td height="20" align="right" class="t_edit_caption">参数:</td>
            <td class="t_edit_td">下级走飞归属:
                <? switch ($pzall) {
        case "0":
            echo "全归公司";
            break;
        case "1":
            echo "全归大股东";
            break;
        case "2":
            echo "按各级成数分配";
            break;
        case "3":
            echo "由下级自由选择";
            break;
        default:
            echo "全归公司";
            break;
    }?>
                &nbsp;&nbsp;&nbsp;允许剩余成数:
                <?if ($zc_auto == 0) {
       echo  "允许";
    } else {
     echo    "禁止";
    }?>
                &nbsp;&nbsp;&nbsp;剩余成数归属"
                <span id="gsmsg">
                    <?if ($pzall == 2 || $pzall == 3) {?>
                    /各级走飞剩余金额
                    <?}?>
                </span>:
                <? if ($zc_all == 0) {
     echo   "归公司";
    } else {
    echo     "归大股东";
    }?>
            </td>
        </tr>
    </table>
    <?}?>
    <form action="main.php?action=user_guan_edit&uid=<?=$uid?>&act=edit&id=<?=$_GET['id']?>" method="post" name="form1" id="form1" onSubmit="return SubChk()">
        <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="4" align="center" bgcolor="#FFFFFF" class="t_list_caption">基本资料设定</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><?=$username?></td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass" type="password" class="inp1" id="pass" />(密码不修改请留空)
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">确认密码:</td>
                <td colspan="3" nowrap="nowrap" bgcolor="#FFFFFF" class="t_edit_td"> <input name="pass2" type="password" class="inp1" id="pass2" /> </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">名称:</td>
                <td colspan="3" nowrap="nowrap" bgcolor"; echo "=" #FFFFFF" class="t_edit_td">
                    <input name="xm" type="text" class="inp1" id="xm" value="<?=$xm?>" /></td>
            </tr>
            <tr>
                <td height="17" colspan="4" align="center" bgcolor="#FFFFFF" class="t_list_caption">下注资料设定</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总信用额:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="cs" type="text" class="inp1" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="<?=$cs?>" />最高信用额度:<?=$maxcs?>
                    <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />&nbsp;&nbsp;(已用信用额度:<?=$mincs?><input name="mincs" type="hidden" id="mincs" value="<?=$mincs?>" />&nbsp;&nbsp;剩余信用额度:<?=$cs - $mincs?>)</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号状况:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rstat" id="rstat" value="0" <? if ($stat==0) {?>
                    checked="checked"
                    <?} ?>
                    />启用<input type="radio" name="rstat" id="rstat" value="1" <? if ($stat==1) {?>
                    checked="checked"
                    <?} ?>
                    />停用
                </td>
            </tr>
            <? if ($pzall == 3 && $zc_all == 0) {?>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">接收下级走飞:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="zc" id="zc">
                        <option value="0" <? if ($zc==0) {?>
                            selected="selected"
                            <?}?>
                            >是
                        </option>
                        <option value="1" <? if ($zc==1) {?>
                            selected="selected"
                            <?}?>
                            >否
                        </option>
                    </select>
                    <SPAN STYLE="color: rgb(255,0,0);"> 大股东是否接受该下级的走飞注单</SPAN>
                </td>
            </tr>
            <? }?>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">走飞:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rpz" id="rpz" value="0" <? if ($pz==0) {?>
                    checked="checked"
                    <? }?>
                    />允许<input type="radio" name="rpz" id="rpz" value="1" <? if ($pz==1) {?>
                    checked="checked"
                    <? }?>
                    onClick="StopPZ()"/>禁止
                </td>
            </tr>

            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">投注:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rty" id="rty" value="0" <? if ($ty==0) {?>
                    checked="checked"
                    <? } ?>
                    />开放投注<input type="radio" name="rty" id="rty" value="1" <? if ($ty==1) {?>
                    checked="checked"
                    <?}?>
                    onClick="StopTY()"/>暂停投注
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">大股东占成数:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sj" id="sj" onchange="ChangeSelectorSJ()">
                        <? $bb = $istar;
for (; $bb <= $iend - $minzc; $bb += 5) {?>
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
                        <? }?>
                    </select>
                </td>
            </tr>

            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">股东占成数:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="sf" id="sf" onchange=ChangeSelectorSF()>
                        <?$bb = $minzc;
	for (; $bb <= $iend; $bb += 5) {?>
                        <option value="<?=$bb?>" <?if ($guan_zc==$bb) {?>
                            selected="selected"
                            <?}?>
                            >
                            <?switch ($bb) {
        case 0:
            print "不占成";
            break;
        default:
            print $bb . "%";
            break;
    }?>
                        </option>
                        <? }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">最后登录时间:</td>
                <td width="32%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zlogin']?>
                </td>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">最后登录IP:</td>
                <td width="36%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zip']?>
                </td>
            </tr>
            <tr>
                <td height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">基本资料更新时间:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['adddate']?>
                </td>
                <td height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">登录次数:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['look']?>次
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">新增时间:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['slogin']?>
                </td>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号添加人:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['adduser']?>
                </td>
            </tr>
            <tr>
                <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" class="m_bc_ed">
                    <input type="submit" class="btn1" name="button" id="button" value="确定" />
                </td>
            </tr>
        </table>
    </form>
</body>