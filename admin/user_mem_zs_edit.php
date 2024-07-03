<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "08")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$result = $db1->query("select * from web_member where id=" . $_GET['id'] . " and zs>1 order by id LIMIT 1");
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
$lx = $row['zs'];
$dagu = $row['dagu'];
$guan = $row['guan'];
$zong = $row['zong'];
$dai = $row['dai'];
$maxcs = 0;
$istar = 0;
$iend = 100;
if ($dai != "") {
    $result = $db1->query("select * from web_agent where kauser='" . $dai . "' and lx=" . $lx . " order by id LIMIT 1");
    $rows = $result->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $maxcs = $rows['cs'];
    $daimaxcs = $rows['cs'];
    switch ($lx) {
        case "4":
            $zslx = "dagu";
            $zslabel = "大股东直属";
            $daimaxzc = $rows['dagu_zc'];
            $iend = $rows['dagu_zc'];
            $dai_zc = $row['dagu_zc'];
            $zc_auto = $rows['zc_auto'];
            $zc_all = $rows['zc_all'];
            break;
        case "3":
            $zslx = "guan";
            $zslabel = "股东直属";
            $daimaxzc = $rows['guan_zc'];
            $iend = $rows['guan_zc'];
            $dai_zc = $row['guan_zc'];
            break;
        case "2":
            $zslx = "zong";
            $zslabel = "总代理直属";
            $daimaxzc = $rows['zong_zc'];
            $iend = $rows['zong_zc'];
            $dai_zc = $row['zong_zc'];
            break;
        default:
            break;
    }
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_agent Where lx=" . ($lx - 1) . " and   " . $zslx . "='" . $dai . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu = $rsw[0];
    }
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=" . $lx . " and   dai='" . $dai . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $maxcs = $maxcs - $mumu + $cs;
}
if ($lx == 3 || $lx == 2) {
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
    if ($zc_auto == 0 && $dai_zc != $_POST['sj']) {
        $str1 = "直属会员占成修改<br>修改前上级占成:" . $dai_zc . "%";
        $str2 = "直属会员占成修改<br>修改后上级占成:" . $_POST['sj'] . "%";
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $username . "',lx=2,text1='" . $str1 . "',text2='" . $str2 . "',ip='" . $userip . "'";
        $db1->query($sql);
    }
    if ($zc_auto == 0) {
        $dai_zc = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
        if ($zc_all == 0) {
            switch ($lx) {
                case "4":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',dagu_zc='" . $dai_zc . "',gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                case "3":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',guan_zc='" . $dai_zc . "',gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                case "2":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',zong_zc='" . $dai_zc . "',gs_zc=100-dagu_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                default:
                    break;
            }
        } else {
            switch ($lx) {
                case "4":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                case "3":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',guan_zc='" . $dai_zc . "',dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                case "2":
                    $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "',zong_zc='" . $dai_zc . "',dagu_zc=100-gs_zc-guan_zc-zong_zc-dai_zc  where kauser='" . $username . "'";
                    break;
                default:
                    break;
            }
        }
    } else {
        $sql = "update web_member  set uid='',xm='" . $xm . "',cs='" . $cs . "',ts=" . ($cs - $mincs) . ",adddate='" . $utime . "',stat='" . $stat . "',ty='" . $ty . "',xy='" . $xy . "',abcd='" . $abcd . "' where kauser='" . $username . "'";
    }
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    echo "<script>alert('修改成功!'); window.location.href = 'main.php?action=user_mem_zs_list&uid=" . $uid . "';</script>";
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
        if ($("cs").value > eval($("maxcs").value)) { $("cs").focus(); alert("信用额度不能大于最大信用额度!!!"); return false; }
        if ($("cs").value < eval($("mincs").value)) { $("cs").focus(); alert("信用额度不能小于已用信用额度!!!"); return false; }
        if ($("xy").value == '') { $("xy").focus(); alert("请输入单注最低投注额!!!"); return false; }
        if (isNaN($("xy").value)) { alert('单注最低投注额只能输入数字'); $("xy").focus(); return false; }
        if (!confirm("是否确定修改直属会员?")) { return false; }
    }
    function StopTY() { alert("该直属会员将暂停投注服务!!!"); }
</script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;直属会员管理－</span><span class="font_b">修改直属会员&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">   
      <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="回上一页">
</div></div>
    <? if ($dai != "") {?>
    <br>
     <table width="800"border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <tr>
            <td height="20" colspan="2" class="t_list_caption">上级(
                <?=$dai?>)资料简述
            </td>
        </tr>
        <tr>
            <td width="16%" height="20" align="right" class="t_edit_caption">下注:</td>
            <td class="t_edit_td">可用占成数:<?=$daimaxzc?>%&nbsp;&nbsp;&nbsp;总信用额:<?=$daimaxcs?>&nbsp;&nbsp;&nbsp;已用信用额:<?=$mumu?>&nbsp;&nbsp;&nbsp;剩余信用额:
                <?=$daimaxcs -$mumu?>
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
                <? if ($zc_auto == 0) {?>
                允许
                <?} else {?>
                禁止
                <?}?>
                &nbsp;&nbsp;&nbsp;剩余成数归属";
                <span id="gsmsg">
                    <? if ($pzall == 2 || $pzall == 3) {?>
                    /各级走飞剩余金额";
                    <?}?>
                </span>:
                <? if ($zc_all == 0) {?>
                归公司
                <?} else {?>
                归大股东
                <?}?>
    </td></tr></table>
<?}?>
                <form name="form1" onSubmit="return SubChk()" method="post"
                    action="main.php?action=user_mem_zs_edit&uid=<?=$uid?>&act=edit&id=<?=$userid?>">

                    <table width="800"border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
                        <tr>
                            <td height="20" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">基本资料设定</td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">上级:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                                <?=$dai?>&nbsp;&nbsp;&nbsp;&nbsp;直属类型:<?=$zslabel?>
                            </td>
                        </tr>

                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><?=$username?></td>
                        </tr>

                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass" type="password" class="inp1" id="pass" />
                                (密码不修改请留空)&nbsp;&nbsp;密码必须至少6个字元长，最多12个字元长，并只能有数字(0-9)，及英文大小写字母 </td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">确认密码:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="pass2" type="password" class="inp1" id="pass2" /></td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">名称:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="xm" type="text" class="inp1" id="xm" value="<?=$xm?>" /></td>
                        </tr>
                        <tr>
                            <td height="17" colspan="4" align="right" bgcolor="#FFFFFF" class="t_list_caption">下注资料设定</td>
                        </tr>
                        <tr>
                            <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总信用额:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="cs" type="text"
                                    class="inp1" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="<?=$cs?>" />最高信用额度:
                                <?=$maxcs?>
                                <input name="maxcs" type="hidden" id="maxcs" value="<?=$maxcs?>" />&nbsp;(已用信用额度:<?=$mincs?>
                                <input name="mincs" type="hidden" id="mincs" value="<?=$mincs?>" />&nbsp;&nbsp;(剩余信用额度: <?=$cs -$mincs?> )
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">盘口:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                                <select name="abcd" id="abcd">
                                    <option value="A" <?if ($abcd=="A" ) {?>selected="selected"<?}?>>A盘</option>
                                    <option value="B" <?if ($abcd=="B" ) {?>selected="selected"<?}?>>B盘</option>
                                    <option value="C" <?if ($abcd=="C" ) {?>selected="selected"<?}?>>C盘</option>
                                    <option value="D" <?if ($abcd=="D" ) {?>selected="selected"<?}?>>D盘</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号状况:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input type="radio"
                                    name="rstat" id="rstat" value="0" <? if ($stat==0) {?>checked="checked"
                                <?}?>
                                />启用<input type="radio" name="rstat" id="rstat" value="1" <?if ($stat==1) {?>
                                checked="checked"
                                <?}?>
                                />停用
                            </td>
                        </tr>

                        <tr>
                            <td width="16%" align="right" bgcolor="#FFFFFF" class="t_edit_caption">投注:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                                <input type="radio" name="rty" id="rty" value="0" <? if ($ty==0) {?>
                                checked="checked"
                                <?}?>
                                />开放投注<input type="radio" name="rty" id="rty" value="1" <? if ($ty==1) {?>
                                checked="checked"
                                <?}?>
                                onClick="StopTY()"/>暂停投注
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">单注最低投注额:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td"><input name="xy" type="text"
                                    class="inp1" id="xy" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="<?=$xy?>" size="10" /></td>
                        </tr>
                        <tr>
                            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">上级占成:</td>
                            <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_edit_td">
                                <? if ($zc_auto == 0) {?>
                                <select class="za_select_02" name="sj" id="zc">
                                    <? $bb = $istar;
    for (; $bb <= $iend; $bb += 5) {?>
                                    <option value="<?=$bb?>" <? if ($bb==$dai_zc) {?>
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
                                <?} else {?>
                                <?=$dai_zc?> . "%"
                                <?}?>
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">最后登录时间:</td>
                            <td width="33%" height="17" bgcolor="#FFFFFF">
                                <?=$row['zlogin']?>
                            </td>
                            <td width="17%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">最后登录IP:</td>
                            <td width="34%" height="17" bgcolor="#FFFFFF">
                                <?=$row['zip']?>
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">基本资料更新时间:</td>
                            <td width="33%" height="17" bgcolor="#FFFFFF">
                                <?=$row['adddate']?>
                            </td>
                            <td width="17%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">登录次数:</td>
                            <td width="34%" height="17" bgcolor="#FFFFFF">
                                <?=$row['look']?>次
                            </td>
                        </tr>
                        <tr>
                            <td width="16%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">新增时间:</td>
                            <td width="33%" height="17" bgcolor="#FFFFFF">
                                <?=$row['slogin']?>
                            </td>
                            <td width="17%" height="17" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号添加人:</td>
                            <td width="34%" height="17" bgcolor="#FFFFFF">
                                <?=$row['adduser']?>
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="4" align="center" bgcolor="#FFFFFF" class="m_bc_ed">
                                <input type="submit" class="btn1" name="Submit" value="确定" />
                            </td>
                        </tr>
                    </table>
                </form>
</body>