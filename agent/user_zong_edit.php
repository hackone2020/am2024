<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 || $lx < 3) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($lx == 4) {
    $select_sql = " and dagu='" . $kauser . "' ";
}
if ($lx == 3) {
    $select_sql = " and guan='" . $kauser . "' ";
}
$result = $db1->query("select * from web_agent where id=" . $_GET['id'] . " and lx=2 " . $select_sql . " order by id LIMIT 1");
$row = $result->fetch_assoc();
if ($row == "") {
    exit;
}
$userid = $row['id'];
$username = $row['kauser'];
$xm = $row['xm'];
$cs = $row['cs'];
$dagu = $row['dagu'];
$guan = $row['guan'];
$dagu_zc = $row['dagu_zc'];
$guan_zc = $row['guan_zc'];
$zong_zc = $row['zong_zc'];
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
}
if ($guan != "") {
    $result1 = $db1->query("select * from web_agent where kauser='" . $guan . "' and lx=3 order by id LIMIT 1");
    $rows = $result1->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $maxcs = $rows['cs'];
    $guanmaxcs = $rows['cs'];
    $guanmaxzc = $rows['guan_zc'];
    $gs_zc = $rows['gs_zc'];
    $dagu_zc = $rows['dagu_zc'];
    $iend = $rows['guan_zc'];
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=2 and   guan='" . $guan . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu = $rsw[0];
    }
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=3 and   guan='" . $guan . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $mumuguan = $mumu;
    $maxcs = $maxcs - $mumu + $cs;
}
$pz_of = 0;
$result = $db1->query("select count(*) from web_agent  where (kauser='" . $guan . "' or kauser='" . $dagu . "') and pz=1 order by id LIMIT 1");
$num1=$result->fetch_array();
    $num = $num1[0];
if ($num != 0) {
    $pz_of = 1;
}
$result = $db1->query("SELECT kauser,dai_zc FROM web_agent WHERE zong = '" . $username . "' AND lx=1 ORDER BY dai_zc DESC LIMIT 1");
$numzc1 = $result->fetch_array();
if ($numzc1 != "" && $minzc < $numzc1['dai_zc']) {
    $minzc = $numzc1['dai_zc'];
    $minzc_user = "下属代理账号:" . $numzc1['kauser'] . "占成" . $minzc . "%";
}
if ($zc_auto == 0) {
    $result = $db1->query("SELECT kauser,zong_zc FROM web_member WHERE zong = '" . $username . "' AND zs=2 ORDER BY zong_zc DESC LIMIT 1");
    $numzc2 = $result->fetch_array();
    if ($numzc2 != "" && $minzc < $numzc2['zong_zc']) {
        $minzc = $numzc2['zong_zc'];
        $minzc_user = "直属会员账号:" . $numzc2['kauser'] . "总代理占成" . $minzc . "%";
    }
}
$mumu = 0;
$result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=1 and   zong='" . $username . "' order by id desc");
$rsw = $result1->fetch_array();
if ($rsw[0] != "") {
    $mumu = $rsw[0];
}
$result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=2 and   zong='" . $username . "' order by id desc");
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
    if ($pzall == 3) {
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
        echo "<script>alert('总代理最低占成不能低于" . $minzc_user . "');window.history.go(-1);</script>";
        exit;
    }
    if ($zc_auto == 0) {
        if ($zc_all == 0) {
            $gs_zc = 100 - $dagu_zc - $sj - $sf;
        } else {
            $dagu_zc = 100 - $gs_zc - $sj - $sf;
        }
    } else {
        if ($sj + $sf != $iend) {
            echo "<script>alert('对不起,请正确设置占成!'); window.history.go(-1);</script>";
            exit;
        }
    }
    if ($iend < $sj + $sf) {
        echo "<script>alert('股东成数加总代理成数不能超过" . $iend . "%！!');window.history.go(-1);</script>";
        exit;
    }
    if ($Current_KitheTable[29] != 0) {
        if ($_POST['sj'] != $guan_zc || $_POST['sf'] != $zong_zc) {
            echo "<script>alert('开盘期间不允许修改占成!'); window.history.go(-1);</script>";
            exit;
        }
    } else {
        if ($_POST['sj'] != $guan_zc || $_POST['sf'] != $zong_zc) {
            $str1 = "总代理占成修改<br>修改前股东占成:" . $guan_zc . "%,总代理占成:" . $zong_zc . "%";
            $str2 = "总代理占成修改<br>修改后股东占成:" . $_POST['sj'] . "%,总代理占成:" . $_POST['sf'] . "%";
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $kauser . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
            $db1->query($sql);
        }
    }
    $sql = "update  web_agent set uid='',xm='" . $xm . "',cs='" . $cs . "',ts='" . $ts . "',adddate='" . $utime . "',zong_zc='" . $sf . "',guan_zc='" . $sj . "',dagu_zc='" . $dagu_zc . "',gs_zc='" . $gs_zc . "',pz='" . $pz . "',stat='" . $stat . "',ty='" . $ty . "',zc='" . $zc . "' where id='" . $userid . "'  order by id desc";
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    if ($_POST['sj'] != $guan_zc || $_POST['sf'] != $zong_zc) {
        if ($zc_all == 0) {
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',zong_zc=" . $sf . ",guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zs=2 and zong='" . $username . "'");
                $db1->query("update web_agent set uid='',zong_zc=" . $sf . "-dai_zc,guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zong='" . $username . "'");
                $db1->query("update web_member set uid='',zong_zc=" . $sf . "-dai_zc,guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zs!=2 and zong='" . $username . "'");
            } else {
                $db1->query("update web_member set uid='',guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=100-dagu_zc-guan_zc-zong_zc  where zs=2 and zong='" . $username . "'");
                $result = $db1->query("select * from web_agent where lx=1 and zong='" . $username . "' and (guan_zc!=" . $sj . " or zong_zc+dai_zc>" . $sf . ")");
                $cou = $result->mysql_num_rows;
                while ($cou != 0 && ($image = $result->fetch_array())) {
                    $zong_zc_temp = $image['zong_zc'];
                    $dai_zc_temp = $image['dai_zc'];
                    $dai_name_temp = $image['kauser'];
                    if ($sf < $zong_zc_temp + $dai_zc_temp) {
                        $db1->query("update web_agent set uid='',dagu_zc=" . $dagu_zc . ",guan_zc=" . $sj . ",zong_zc=" . $sf . "-dai_zc,gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where lx=1 and kauser='" . $dai_name_temp . "'");
                        $db1->query("update web_member set uid='',dagu_zc=" . $dagu_zc . ",guan_zc=" . $sj . ",zong_zc=" . $sf . "-" . $dai_zc_temp . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where zs!=2 and dai='" . $dai_name_temp . "' and zong='" . $username . "'");
                    } else {
                        $db1->query("update web_agent set uid='',dagu_zc=" . $dagu_zc . ",guan_zc=" . $sj . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where lx=1 and kauser='" . $dai_name_temp . "'");
                        $db1->query("update web_member set uid='',dagu_zc=" . $dagu_zc . ",guan_zc=" . $sj . ",gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where zs!=2 and dai='" . $dai_name_temp . "' and zong='" . $username . "'");
                    }
                }
            }
        } else {
            if ($zc_auto == 1) {
                $db1->query("update web_member set uid='',zong_zc=" . $sf . ",guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zs=2 and zong='" . $username . "'");
                $db1->query("update web_agent set uid='',zong_zc=" . $sf . "-dai_zc,guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zong='" . $username . "'");
                $db1->query("update web_member set uid='',zong_zc=" . $sf . "-dai_zc,guan_zc=" . $sj . ",dagu_zc=" . $dagu_zc . ",gs_zc=" . $gs_zc . "  where zs!=2 and zong='" . $username . "'");
            } else {
                $db1->query("update web_member set uid='',guan_zc=" . $sj . ",gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc  where zs=2 and zong='" . $username . "'");
                $result = $db1->query("select * from web_agent where lx=1 and zong='" . $username . "' and (guan_zc!=" . $sj . " or zong_zc+dai_zc>" . $sf . ")");
                $cou = $result->num_rows;
                while ($cou != 0 && ($image = $result->fetch_array())) {
                    $zong_zc_temp = $image['zong_zc'];
                    $dai_zc_temp = $image['dai_zc'];
                    $dai_name_temp = $image['kauser'];
                    if ($sf < $zong_zc_temp + $dai_zc_temp) {
                        $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",guan_zc=" . $sj . ",zong_zc=" . $sf . "-dai_zc,dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where lx=1 and kauser='" . $dai_name_temp . "'");
                        $db1->query("update web_member set uid='',guan_zc=" . $sj . ",zong_zc=" . $sf . "-" . $dai_zc_temp . ",gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where zs!=2 and dai='" . $dai_name_temp . "' and zong='" . $username . "'");
                    } else {
                        $db1->query("update web_agent set uid='',gs_zc=" . $gs_zc . ",guan_zc=" . $sj . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where lx=1 and kauser='" . $dai_name_temp . "'");
                        $db1->query("update web_member set uid='',guan_zc=" . $sj . ",gs_zc=" . $gs_zc . ",dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where zs!=2 and dai='" . $dai_name_temp . "' and zong='" . $username . "'");
                    }
                }
            }
        }
    }
    del_online($username, 1);
    echo "<script>alert('修改成功!');window.location.href='main.php?action=user_zong_edit&uid=" . $uid . "&vip=" . $vip . "&id=" . $userid . "';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<style type="text/css">
    <!--
    .m_suag_ed {  background-color: #D3C9CB; text-align: right}
    -->
</style>
<script src="js/function.js" type="text/javascript"></script>
<script>
function SubChk() {
        if ($("pass").value != '' && $("pass2").value == '') { $("pass2").focus(); alert("请输入确认密码!!!"); return false; }
        if ($("pass").value != $("pass2").value) { $("pass2").focus();alert("确认密码与密码不一致!!!"); return false;} 
        if ($("xm").value == '') {$("xm").focus();alert("请输入名称!!!"); return false; }
        if ($("cs").value == '') {$("cs").focus();alert("请输入总信用额度!!!"); return false;}
        if (isNaN($("cs").value)) { alert('总信用额度只能输入数字'); $("cs").focus(); return false; }
        if ($("cs").value > eval($("maxcs").value)) {$("cs").focus();alert("信用额度不能大于最高信用额度!!!");}
        if ($("cs").value < eval($("mincs").value)) {$("cs").focus();alert("信用额度不能小于已用信用额度!!!"); return false;}
        if (!confirm("是否确定修改总代理?")) { return false; }
    }
</script>
<script>
<?if ($zc_auto == 0) {?>
        function ChangeSelectorSJ() {
            var zzc = eval($("sf").value) + eval($("sj").value);
            if (zzc > "<?=$iend?>") {
                $("sf").value = "<?=$iend?>"-$("sj").value;
                $("sj").focus();
                alert("股东占成数+总代理占成数不能大于可用占成数<?=$iend?>%！");
                return false;
            }
        }
        function ChangeSelectorSF() {
            var zzc = eval($("sf").value) + eval($("sj").value);
            if (zzc > "<?=$iend?>") {
                $("sj").value = "<?=$iend?>" - $("sf").value;
                 $("sf").focus();
                alert("股东占成数+总代理占成数不能大于可用占成数<?=$iend?> %！");return false;}}
           <? } else {?>
                function ChangeSelectorSJ() { $("sf").value = "<?=$iend?>" - $("sj").value; }
                function ChangeSelectorSF() { $("sj").value = "<?=$iend?>" - $("sf").value; } 
                <?
            }?>
            function StopPZ() { alert("该账号及其下属代理商将关闭走飞服务!!!"); }
            function StopTY() { alert("该账号及其下属会员将暂停投注服务!!!"); } 
            function Ckpzall(ckid) { 
                if (ckid == 1) { t$("gsmsg").innerHTML = "/各级走飞剩余金额"; t } else { t$("gsmsg").innerHTML = "";  } 
                
            }
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;总代理管理－</span><span class="font_b">修改总代理&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
          <a href="main.php?action=user_zong_list&uid=<?=$uid?>&vip=<?=$vip?>" >回上一页</a>
      </div>
</div>  
    <? if ($guan != "") {?>
    <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody><tr>
            <td height="20" colspan="2" align="center" class="t_list_caption">股东(
                <?=$guan?>)资料简述
            </td>
        </tr>
        <tr>
           <td width="16%" height="20" align="right" class="t_edit_caption">下注:</td>
            <td class="t_edit_td">可用占成数:
                <?=$guanmaxzc?>%&nbsp;&nbsp;&nbsp;总信用额:
                <?=$guanmaxcs?>&nbsp;&nbsp;&nbsp;已用信用额:
                <?=$mumuguan?>&nbsp;&nbsp;&nbsp;剩余信用额:
                <?=$guanmaxcs - $mumuguan?>
            </td>
        </tr>
        </tbody>
    </table>
    <?}?>
    <form action="main.php?action=user_zong_edit&uid=<?=$uid?>&vip=<?=$vip?>&act=edit&id=<?=$_GET['id']?>" method="post" name="form1" id="form1" onSubmit="return SubChk()">
     <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption"><font class="font_r">基本资料设定</font></td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><?=$username?></td>
            </tr>

            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass" type="password" class="inp1" id="pass" />(密码不修改请留空)&nbsp;&nbsp;密码必须至少6个字元长，最多12个字元长，并只能有数字(0-9)，及英文大小写字母
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">确认密码:</td>
                <td colspan="3" nowrap="nowrap" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass2" type="password" class="inp1" id="pass2" />
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">名称:</td>
                <td colspan="3" nowrap="nowrap" bgcolor="#FFFFFF" class="t_edit_td"><input name="xm" type="text" class="inp1" id="xm" value="<?=$xm?>" /></td>
            </tr>
            <tr>
                <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">下注资料设定</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总信用额:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="cs" type="text" class="inp1" id="cs"
                        onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="<?=$cs?>" />最高信用额度:
                    <?=$maxcs?>
                    <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />&nbsp;&nbsp;(已用信用额度:
                    <?=$mincs?><input name="mincs" type="hidden" id="mincs" value="<?=$mincs?>" />&nbsp;&nbsp;剩余信用额度:<?=$cs - $mincs?> )
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号状况:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rstat" id="rstat" value="0" <?if ($stat == 0) {?>checked="checked"<?}?>/>启用
                    <input type="radio" name="rstat" id="rstat" value="1" <?if ($stat == 1) {?>checked="checked"<?}?>/>停用
                </td>
            </tr> 
            <?if ($pz_of == 0) {
            if ($pzall == 3) {?>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">接收下级走飞:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <select name="zc" id="zc">
                        <option value="0" <?if ($zc == 0) {?> selected="selected"<?}?>>是</option>
                        <option value="1" <?if ($zc == 1) {?> selected="selected"<? }?>>否</option>
                    </select>
                    <SPAN STYLE="color: rgb(255,0,0);"> 股东是否接受该下级的走飞注单</SPAN>
                </td>
            </tr>
            <?}?>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">走飞:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rpz" id="rpz" value="0" <? if ($pz == 0) {?>checked="checked"<?}?>/>允许
                    <input type="radio" name="rpz" id="rpz" value="1" <? if ($pz == 1) {?>checked="checked"<?}?> onClick="StopPZ()" />禁止
                </td>
            </tr>
            <?} ?>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">投注:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rty" id="rty" value="0" <?if ($ty == 0) {?>checked="checked"<?}?> />开放投注
                    <input type="radio" name="rty" id="rty" value="1" <?if ($ty == 1) {?>checked="checked"<?}?>onClick="StopTY()" />暂停投注
                </td>
            </tr>
            <tr>
               <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">股东占成数:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"> 

                    <select name="sj" id="sj" onchange=ChangeSelectorSJ()> 
                        <?$bb = $istar;?>
                        <?for (;$bb <= $iend - $minzc; $bb += 5) {?>
                        <option value="<?=$bb?>" <?if ($guan_zc == $bb) {?>selected="selected"<?}?>>
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
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总代理占成数:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">

                    <select name="sf" id="sf" onchange=ChangeSelectorSF()>
                        <?$bb = $minzc;
                        for ( ;$bb <= $iend; $bb += 5) {?>
                        <option value="<?=$bb?>" <?if ($zong_zc == $bb) {?>selected="selected" <? }?>>
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
            <?if ($auto_edit != 1) {?>
            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">最后登录时间:</td>
                <td width="32%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zlogin']?>
                </td>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">最后登录IP:</td>
                <td width="36%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zip']?>
                </td>
            </tr>

            <tr>
                <td height="17" align="right" bgcolor="#FFFFFF">基本资料更新时间:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['adddate']?>
                </td>
                <td height="17" align="right" bgcolor="#FFFFFF">登录次数:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['look']?>次
                </td>
            </tr>
            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">新增时间:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['slogin']?>
                </td>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">账号添加人:</td>
                <td height="17" bgcolor="#FFFFFF">
                    <?=$row['adduser']?>
                </td>
            </tr>
            <?} ?>
            <tr>
                <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" class="">
                    <input type="submit" name="button" class="btn1" id="button" value="确定" />
                </td>
            </tr>
        </table>
    </form>
</body>