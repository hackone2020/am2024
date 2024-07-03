<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if ($vip == 1 || $lx < 1) {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($lx == 4) {
    $select_sql = " and dagu='" . $kauser . "' ";
    $dai = $_GET['dai'];
}
if ($lx == 3) {
    $select_sql = " and guan='" . $kauser . "' ";
    $dai = $_GET['dai'];
}
if ($lx == 2) {
    $select_sql = " and zong='" . $kauser . "' ";
    $dai = $_GET['dai'];
}
if ($lx == 1) {
    $select_sql = " and dai='" . $kauser . "' ";
    $dai = $kauser;
}
$result = $db1->query("select * from web_member where id=" . $_GET['id'] . " and zs=1 " . $select_sql . " order by id LIMIT 1");
$row = $result->fetch_assoc();
if ($row == "") {
    exit;
}
$userid = $row['id'];
$username = $row['kauser'];
$xm = $row['xm'];
$xy = $row['xy'];
$abcd = $row['abcd'];
$cs = $row['cs'];
$ts = $row['ts'];
$mincs = $cs - $ts;
$stat = $row['stat'];
$ty = $row['ty'];
$dai_zc = $row['dai_zc'];
$dagu = $row['dagu'];
$dai = $row['dai'];
$maxcs = 0;
$istar = 0;
$iend = 100;
if ($dai != "") {
    $result = $db1->query("select * from web_agent where kauser='" . $dai . "' and lx=1 order by id LIMIT 1");
    $rows = $result->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $iend = $rows['dai_zc'];
    $maxcs = $rows['cs'];
    $daimaxcs = $rows['cs'];
    $daimaxzc = $rows['dai_zc'];
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=1 and   dai='" . $dai . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $maxcs = $maxcs - $mumu + $cs;
}
if ($dagu != "") {
    $result1 = $db1->query("select * from web_agent where kauser='" . $dagu . "' and lx=4 order by id");
    $rows = $result1->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $zc_auto = $rows['zc_auto'];
    $zc_all = $rows['zc_all'];
}
if ($_GET['act'] == "edit") {
    $pass = $_POST['pass'];
    if ($pass != "") {
        chk_pwd($pass);
        $pass = md5($pass);
        $sql = "update  web_member set uid='',adddate='" . $utime . "',kapassword='" . $pass . "' where id='" . $userid . "' order by id desc";
        if (!$db1->query($sql)) {
            exit("数据库修改出错");
        }
    }
    $xm = isset($_POST['xm']) ? safe_convert($_POST['xm']) : $username;
    $cs = isset($_POST['cs']) ? intval($_POST['cs']) : 0;
    if ($cs < $mincs) {
        echo "<script>alert('总信用额不能低于该会员已用金额!');window.history.go(-1);</script>";
        exit;
    } else {
        $sql = "update  web_member set uid='',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "' where id='" . $userid . "' order by id desc";
        if (!$db1->query($sql)) {
            exit("数据库修改出错");
        }
    }
    if ($_POST['rstat'] == 1) {
        $stat = 1;
    } else {
        $stat = 0;
    }
    if ($_POST['rty'] == 1) {
        $ty = 1;
    } else {
        $ty = 0;
    }
    $xy = isset($_POST['xy']) ? intval($_POST['xy']) : 1;
    $abcd = $_POST['abcd'];
    switch ($abcd) {
        case "A":
            $abcd = "A";
            break;
        case "B":
            $abcd = "B";
            break;
        case "C":
            $abcd = "C";
            break;
        case "D":
            $abcd = "D";
            break;
        default:
            $abcd = "A";
            break;
    }
    if (empty($_POST['xy'])) {
        echo "<script>alert('单注最低投注额不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    if ($maxcs < $_POST['cs']) {
        echo "<script>alert('总信用额超过最高信用额!');window.history.go(-1);</script>";
        exit;
    }
    if ($Current_KitheTable[29] != 0) {
        if ($zc_auto == 0 && $dai_zc != $_POST['sj']) {
            echo "<script>alert('开盘期间不允许修改占成!'); window.history.go(-1);</script>";
            exit;
        }
    } else {
        if ($zc_auto == 0 && $dai_zc != $_POST['sj']) {
            $str1 = "会员代理占成修改<br>修改前代理占成:" . $dai_zc . "%";
            $str2 = "会员代理占成修改<br>修改后代理占成:" . $_POST['sj'] . "%";
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $kauser . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
            $db1->query($sql);
        }
    }
    if ($zc_auto == 0) {
        $dai_zc = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
        if ($zc_all == 0) {
            $sql = "update web_member  set uid='',xm='" . $xm . "',adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',dai_zc='" . $dai_zc . "',gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
        } else {
            $sql = "update web_member  set uid='',xm='" . $xm . "',adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',dai_zc='" . $dai_zc . "',dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
        }
    } else {
        $sql = "update web_member  set uid='',xm='" . $xm . "',adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "' where kauser='" . $username . "'";
    }
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('修改成功!'); window.location.href = 'main.php?action=user_mem_list&uid=" . $uid . "&vip=" . $vip . "';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<style type="text/css">
    <!--
    .m_suag_ed {  background-color: #D3C9CB; text-align: right}
    -->
</style>
<script src="js/function.js" type="text/javascript"></script>
<script>function SubChk() {
        if ($("pass").value != '' && $("pass2").value == '') { $("pass2").focus(); alert("请输入确认密码!!!"); return false }
        if ($("pass").value != $("pass2").value) { $("pass2").focus(); alert("确认密码与密码不一致!!!"); return false; }
        if ($("xm").value == '') { $("xm").focus(); alert("请输入名称!!!"); return false; }
        if ($("cs").value == '') { $("cs").focus(); alert("请输入总信用额度!!!"); return false; }
        if (isNaN($("cs").value)) {alert('总信用额度只能输入数字');$("cs").focus(); return false; }
        if ($("cs").value > eval($("maxcs").value)) { $("cs").focus(); alert("信用额度不能大于最大信用额度!!!"); return false; }
        if ($("cs").value < eval($("mincs").value)) {$("cs").focus(); alert("对不起,该会员已用额度为" + $("mincs").value + ",信用额度不能小于已用额度!!!");return false;}
        if ($("xy").value == '') { $("xy").focus(); alert("请输入单注最低投注额!!!"); return false; }
        if (isNaN($("xy").value)) {alert('单注最低投注额只能输入数字');$("xy").focus(); return false;}
        if (!confirm("是否确定修改会员?")) { return false; }} 
        function StopTY() { alert("该会员将暂停投注服务!!!"); }
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;会员管理－</span><span class="font_b">修改会员&nbsp; </span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
          <a  href="main.php?action=user_mem_list&uid=<?=$uid?>&vip=<?=$vip?>">回上一页</a>
      </div>
</div>  
    <? if ($dai != "") {?>
     <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <tbody><tr>
            <td height="20" colspan="2" align="center" class="t_list_caption">代理(<?=$dai?>)资料简述
            </td>
        </tr>
        <tr>
            <td width="16%" height="20" align="right" class="t_edit_caption">下注:</td>
            <td class="t_edit_td">可用占成数:
                <?=$daimaxzc?>%&nbsp;&nbsp;&nbsp;总信用额:
                <?=$daimaxcs?>&nbsp;&nbsp;&nbsp;已用信用额:
                <?=$mumu?>&nbsp;&nbsp;&nbsp;剩余信用额:
                <?=$daimaxcs -$mumu?>
            </td>
        </tr>
    </table>
    <?} ?>
    <form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_mem_edit&uid=<?=$uid?>&vip=<?=$vip?>&act=edit&id=<?=$userid?>">
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="center" bgcolor="#FFFFFF" class="t_list_caption"><font class="font_r">基本资料设定</font></td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">上级代理:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><?=$dai?></td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><?=$username?></td>

            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass" type="password"
                        class="inp1" id="pass" />(密码不修改请留空)&nbsp;&nbsp;密码必须至少8个字元长，最多12个字元长，并只能有数字(0-9)，及英文大小写字母
                </td>

            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">确认密码:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass2" type="password" class="inp1" id="pass2" />
                </td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">名称:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="xm" type="text"
                        class="inp1" id="xm" value="<?=$xm?>" /></td>
            </tr>

            <tr>
                <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">下注资料设定</td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总信用额:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="cs" type="text" class="inp1" id="cs"
                        onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value=<?=$cs?> />最高信用额度:<?=$maxcs?>
                    <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />

                    <input name="mincs" type="hidden" id="mincs" value=<?=$mincs?> &nbsp;&nbsp;(已用:<?=$mincs?>&nbsp;分配余额:<?=$cs - $mincs?>);
                </td>
            </tr>
            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">盘口:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">

                    <select name="abcd" id="abcd">
                        <option value="A" <? if ($abcd=="A" ) {?>selected="selected"<?}?>>A盘
                        </option>
                        <option value="B" <? if ($abcd=="B" ) {?>selected="selected"<?}?>>B盘
                        </option>
                        <option value="C" <? if ($abcd=="C" ) {?>selected="selected"<?}?>>C盘
                        </option>
                        <option value="D" <? if ($abcd=="D" ) {?>selected="selected"<?}?>>D盘
                        </option>

                    </select>
                </td>
            </tr>

            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号状况:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rstat" id="rstat" value="0" <? if ($stat==0) {?>checked="checked" <?}?> />启用
                    <input type="radio" name="rstat" id="rstat" value="1" <? if ($stat==1) {?>checked="checked"<?}?> />停用
                </td>
            </tr>

            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">投注:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <input type="radio" name="rty" id="rty" value="0" <? if ($ty==0) {?> checked="checked"<? }?> />开放投注
                    <input type="radio" name="rty" id="rty" value="1" <? if ($ty==1) { ?>checked="checked" <?}?> onClick="StopTY()" />暂停投注</td>
            </tr>

            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">单注最低投注额:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">

                    <input name="xy" type="text" class="inp1" id="xy" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value=<?=$xy?> size="10" />
                </td>
            </tr>


            <tr>
                 <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">代理占成:</td>
                <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                    <? if ($zc_auto == 0) {?>
                    <select class="za_select_02" name="sj" id="zc">
                    <? $bb = $istar;
                        for (; $bb <= $iend; $bb +=5) { ?> <option value="<?=$bb?>" <?if ($bb == $dai_zc) {?> selected="selected"<? }?>> 
                            <? 
                            switch ($bb) {
                            case 0:
                            print "不占成";
                            break;
                            default:
                            print $bb . "%";
                            break;
                         }?>
                            </option>
                         <?   }?>
                         
                    </select>
                    <? } else { ?><?=$dai_zc . "%"?><?}?>
                   
                </td>
            </tr>
            <?if ($auto_edit != 1) {?>

            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">最后登录时间:</td>
                <td width="33%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zlogin']?>
                </td>
                <td width="17%" height="17" align="right" bgcolor="#FFFFFF">最后登录IP:</td>
                <td width="34%" height="17" bgcolor="#FFFFFF">
                    <?=$row['zip']?>
                </td>
            </tr>
            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">基本资料更新时间:</td>
                <td width="33%" height="17" bgcolor="#FFFFFF">
                    <?=$row['adddate']?>
                </td>
                <td width="17%" height="17" align="right" bgcolor="#FFFFFF">登录次数:</td>
                <td width="34%" height="17" bgcolor="#FFFFFF">
                    <?=$row['look']?>次
                </td>
            </tr>
            <tr>
                <td width="16%" height="17" align="right" bgcolor="#FFFFFF">新增时间:</td>
                <td width="33%" height="17" bgcolor="#FFFFFF">
                    <?$row['slogin']?>
                </td>
                <td width="17%" height="17" align="right" bgcolor="#FFFFFF">账号添加人:</td>
                <td width="34%" height="17" bgcolor="#FFFFFF">
                    <?=$row['adduser']?>
                </td>
            </tr>
            <?}?>
            <tr>
                <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" class="">
                    <input type="submit" class="btn1" name="Submit" value="确定" />
                </td>
            </tr>
        </table>
    </form>
</body>