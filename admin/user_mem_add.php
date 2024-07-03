<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "08")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
$result = $db1->query("select count(*) from web_member");
$numarr = $result->fetch_array();
$numr = $numarr[0];
if ($maxmem != 0 && $maxmem <= $numr) {
    echo "<script>alert('当前系统人数为" . $numr . "人,已达系统上限" . $maxmem . "人!');window.history.go(-1);</script>";
    exit;
}
$maxcs = 0;
$istar = 0;
$iend = 100;
if ($_GET['dai'] != "") {
    $dai = $_GET['dai'];
    $result = $db1->query("select * from web_agent where kauser='" . $dai . "' and lx=1 order by id LIMIT 1");
    $row = $result->fetch_assoc();
    if ($row == "") {
        exit;
    }
    $iend = $row['dai_zc'];
    $maxcs = $row['cs'];
    $daimaxcs = $row['cs'];
    $daimaxzc = $row['dai_zc'];
    $gs_zc = $row['gs_zc'];
    $dagu_zc = $row['dagu_zc'];
    $guan_zc = $row['guan_zc'];
    $zong_zc = $row['zong_zc'];
    $dai_zc = $row['dai_zc'];
    $dagu = $row['dagu'];
    $guan = $row['guan'];
    $zong = $row['zong'];
    $kabcd = $row['abcd'];
    $xabcd = explode(",", $kabcd);
    $result1 = $db1->query("select * from web_agent where kauser='" . $dagu . "' and lx=4 order by id LIMIT 1");
    $rows = $result1->fetch_assoc();
    if ($rows == "") {
        exit;
    }
    $zc_auto = $rows['zc_auto'];
    $zc_all = $rows['zc_all'];
    $mumu = 0;
    $result1 = $db1->query("select SUM(cs) As sum_m  From web_member Where zs=1 and   dai='" . $dai . "' order by id desc");
    $rsw = $result1->fetch_array();
    if ($rsw[0] != "") {
        $mumu += $rsw[0];
    }
    $maxcs -= $mumu;
}
if ($_GET['act'] == "add") {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    chk_user($username);
    chk_pwd($pass);
    $pass = md5($pass);
    $xm = isset($_POST['xm']) ? safe_convert($_POST['xm']) : $username;
    $cs = isset($_POST['cs']) ? intval($_POST['cs']) : 0;
    $stat = 0;

    if ($mpannums == 1) {
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
        $kkabcd = $abcd;
    } else {
        $kabcd = $_POST['kabcd'];
        $abcd = $kabcd[0];
        $kkabcd = implode(",", $kabcd);
    }

    $xy = isset($_POST['xy']) ? intval($_POST['xy']) : 1;
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
    if (empty($_POST['xy'])) {
        echo "<script>alert('单注最低投注额不能为空!'); window.history.go(-1);</script>";
        exit;
    }
    if ($maxcs < $_POST['cs']) {
        echo "<script>alert('总信用额超过最高信用额!');window.history.go(-1);</script>";
        exit;
    }
    if ($zc_auto == 0) {
        $dai_zc = isset($_POST['sj']) ? intval($_POST['sj']) : $iend;
        if ($zc_all == 0) {
            $gs_zc = 100 - $dagu_zc - $guan_zc - $zong_zc - $dai_zc;
        } else {
            $dagu_zc = 100 - $gs_zc - $guan_zc - $zong_zc - $dai_zc;
        }
    }
    $result2 = $db1->query("SELECT count(*)  FROM web_config_ds");
    $num2arr = $result2->fetch_array();
    $num2 = $num2arr[0];
    $result1 = $db1->query("SELECT count(*)  FROM web_user_ds where username='{$dai}' ");
    $num1arr = $result1->fetch_array();
    $num1 = $num1arr[0];
    if ($num1 != $num2) {
        echo "<script>alert('上级代理的退水资料有误,无法新增会员,请联系上级！!'); window.history.go(-1);</script>";
        exit;
    }
    $sql = "INSERT INTO web_member  set uid='',kauser='" . $username . "',kapassword='" . $pass . "',xm='" . $xm . "',cs='" . $cs . "',ts='" . $cs . "',slogin='" . $utime . "',sip='" . $userip . "',zlogin='" . $utime . "',zip='" . $userip . "',adduser='" . $jxadmin . "',adddate='" . $utime . "',look='0',stat='" . $stat . "',ty='0',jin='0',xy='" . $xy . "',abcd='" . $abcd . "',kxabcd='" . $kkabcd . "',zs='1',dagu='" . $dagu . "',guan='" . $guan . "',zong='" . $zong . "',dai='" . $dai . "',dai_zc='" . $dai_zc . "',zong_zc='" . $zong_zc . "',guan_zc='" . $guan_zc . "',dagu_zc='" . $dagu_zc . "',gs_zc='" . $gs_zc . "'";
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $result = $db1->query("select * from web_member where  kauser='" . $username . "'  order by id desc LIMIT 1");
    $row = $result->fetch_array();
    $userid = $row['id'];
    $result = $db1->query("select id,class,ds_lb,ds_id,ds,yg,ygb,ygc,ygd,yge,ygf,ygg,ygh,xx,xxx,ds_lock from  web_user_ds where lx=1 and username='" . $dai . "' order by id");
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
        $db1->query("INSERT INTO web_user_ds set username='{$username}',userid='{$userid}',class='" . $image['class'] . "',ds_lb='" . $image['ds_lb'] . "',ds_id='" . $image['ds_id'] . "',ds='" . $image['ds'] . "',yg='" . $yg . "',ygb='" . $ygb . "',ygc='" . $ygc . "',ygd='" . $ygd . "',yge='" . $yge . "',ygf='" . $ygf . "',ygg='" . $ygg . "',ygh='" . $ygh . "',xx='" . $image['xx'] . "',xxx='" . $image['xxx'] . "',ds_lock='" . $image['ds_lock'] . "',lx='0',pz='0',pz_sum='0',zf_sum='500000',dagu='" . $dagu . "',guan='" . $guan . "',zong='" . $zong . "',dai='" . $dai . "'");
    }
    echo "<script>alert('添加成功!');window.location.href='main.php?action=user_mem_list&uid=" . $uid . "&dai=" . $dai . "';</script>";
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
        if ($("agent").value == '') {
            $("dai").focus();
            alert("请选择上级!!");
            return false;
        }
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
        if ($("xy").value == '') {
            $("xy").focus();
            alert("请输入单注最低投注额!!!");
            return false;
        }
        if (isNaN($("xy").value)) {
            alert('单注最低投注额只能输入数字');
            $("xy").focus();
            return false;
        }
        if (!confirm("是否确定添加会员?")) {
            return false;
        }
    }
</script>

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">直属会员管理－</span><span class="font_b">添加直属会员</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright">

            <div align="right">
                <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="回上一页">
            </div>

        </div>
    </div>

    <? if ($dai != "") { ?>
        <br>
        <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" class="t_list_caption">代理(<?= $dai ?>)资料简述
                </td>
            </tr>

            <tr>
                <td width="16%" height="20" align="right" class="t_edit_caption">下注:</td>
                <td class="t_edit_td">可用占成数:<?= $daimaxzc ?>%&nbsp;&nbsp;&nbsp;总信用额:<?= $daimaxcs ?>&nbsp;&nbsp;&nbsp;已用信用额:<?= $mumu ?>&nbsp;&nbsp;&nbsp;剩余信用额:<?= $maxcs ?>
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
                    } ?>
                    &nbsp;&nbsp;&nbsp;允许剩余成数:
                    <? if ($zc_auto == 0) { ?>
                        允许
                    <? } else { ?>
                        禁止
                    <? } ?>
                    &nbsp;&nbsp;&nbsp;剩余成数归属
                    <span id="gsmsg">
                        <? if ($pzall == 2 || $pzall == 3) { ?>
                            /各级走飞剩余金额
                        <? } ?>
                    </span>:
                    <? if ($zc_all == 0) { ?>
                        归公司
                    <? } else { ?>
                        归大股东
                    <? } ?>
                </td>
            </tr>
        </table>
    <? } ?>
    <form name="form1" onSubmit="return SubChk()" method="post" action="main.php?action=user_mem_add&uid=<?= $uid ?>&act=add&dai=<?= $_GET['dai'] ?>">

        <table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
            <tr>
                <td height="20" colspan="2" align="right" bgcolor="#FFFFFF" class="t_list_caption">基本资料设定</td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">上级代理:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="agent" type="hidden" id="agent" value="<? if ($dai != "") { ?><?= $dai ?><? } ?>" />
                    <select id="dai" name="dai" onChange="var jmpURL='main.php?action=user_mem_add&uid=<?= $uid ?>&dai='+this.options[this.selectedIndex].value ; if(jmpURL!='') {window.location=jmpURL;} else {this.selectedIndex=0 ;}">
                        <option value="">请选择上级账号</option>
                        <? $result = $db1->query("select * from web_agent where lx=1  order by id desc");
                        while ($image = $result->fetch_array()) { ?>
                            <option value="<?= $image['kauser'] ?>" <? if ($dai == $image['kauser']) { ?> selected=selected <? } ?>>
                                <?= $image['kauser'] ?>
                            </option>
                        <? } ?>
                    </select>
                </td>
            </tr>
            <tr>

                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">账号:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="username" type="text" class="inp1" id="username" />&nbsp;
                    <input type="button" onClick="check_user();" value="检查账号" class="za_button" />&nbsp;帐号必须至少1个字元长，最多12个字元长，并只能有数字(0-9)，及英文";
                    echo "小写字母
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">密码:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="pass" type="password" class="inp1" id="pass" />&nbsp;密码必须至少6个字元长，最多12个字元长，并只能有数字(0-9)，及英文大小写字母
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">确认密码:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">

                    <input name="pass2" type="password" class="inp1" id="pass2" />
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">名称:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="xm" type="text" class="inp1" id="xm" />
                </td>
            </tr>
            <tr>
                <td height="17" colspan="2" align="right" bgcolor="#FFFFFF" class="t_list_caption">下注资料设定</td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">总信用额:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="cs" type="text" class="inp1" id="cs" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="0" />最高信用额度:
                    <?= $maxcs ?>
                    <input name="maxcs" type="hidden" id="maxcs" value="<?= $maxcs ?>" />
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">盘口:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">

                    <? if ($dai != "" && $mpannums == 1) {
                    ?>
                        <select name="abcd" id="abcd">

                            <?
                            foreach ($xabcd as $key=>$item) {
                            ?>
                                <option value="<?=$item?>" <? if($key == 0) echo "selected";?> ><?=$item?>盘</option>
                            <?
                            }
                            ?>

                        </select>
                    <?
                    } ?>

                    <? if ($dai != "" && $mpannums == 0) {
                        foreach ($xabcd as $item) {
                    ?>
                            <input type="checkbox" name="kabcd[]" id="kabcd[]" value="<?= $item ?>" checked="checked" /><?= $item ?>
                    <?
                        }
                    } ?>
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">单注最低投注额:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <input name="xy" type="text" class="inp1" id="xy" onkeyup="value=value.replace(/[^\d\.\/]/ig,'')" value="10" size="10" />
                </td>
            </tr>
            <tr>
                <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">代理占成:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
                    <? if ($zc_auto == 0) { ?>

                        <select class="za_select_02" name="sj" id="zc">
                            <? $bb = $istar;
                            for (; $bb <= $iend; $bb += 5) { ?>
                                <option value="<?= $bb ?>" <? if ($bb == $iend) { ?> selected=" selected" <? } ?>>
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
                    <? } else { ?>
                        <?= $dai_zc ?>%
                    <? } ?>
                </td>
            </tr>
            <tr>
                <td height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">退水设定:</td>
                <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
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
                <td height="30" colspan="2" align="center" bgcolor="#FFFFFF" class="">
                    <input type="submit" class="btn1" name="Submit" value="确定" />
                </td>
            </tr>
        </table>
    </form>
    <iframe name="check_frame" src="" width="0" height="0" style="display:none">
    </iframe>
</body>