<?php
if (!defined('KK_VER')) {
  exit('无效的访问');
}

if (strpos($flag, '10')) {
} else {
  echo "<center>你没有该权限功能!</center>";
  exit;
}
if ($_GET['act'] == "del") {
  if (!empty($_POST['password'])) {
    $pass = md5($_POST['password']);
    $sql = "select * from web_yw where pass='$pass' LIMIT 1";
    $result = $db1->query($sql) or die(mysql_error());
    $count = $result->num_rows;
    if ($count == 0) {
      echo "<script>alert('您输入的操作密码错误，请重新输入!');window.location.href = 'main.php?action=web_del&uid={$uid}';</script>";
      exit;
    } else {
      if ($_POST['key'] == "") {
        echo ("<script type='text/javascript'>alert('请正确输入删除日期！'); history.back();</script>");
        exit;
      }
      if ($_POST['key'] == date("Y-m-d")) {
        echo ("<script type='text/javascript'>alert('不能删除当天数据，请正确输入删除日期！'); history.back();</script>");
        exit;
      }
      if ($_POST['user'] != "") {

        //删除已停用用户
        if ($_POST['user'] == "hy" || $_POST['user'] == "alluser") {
          $resulthy = $db1->query("select kauser from web_member where stat=1");
          while ($image = $resulthy->fetch_array()) {
            $kauser = $image['kauser'];
            $db1->query("Delete from web_member where kauser='{$kauser}'");
            $db1->query("Delete from web_user_ds where lx=0  and username='{$kauser}'");
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='数据管理',text2='删除会员:" . $kauser . "',ip='" . $userip . "'";
            $db1->query($sql);
          }
        }
        //删除已停用代理
        elseif ($_POST['user'] == "dl" || $_POST['user'] == "alluser") {
          $resultdl = $db1->query("select kauser from web_agent where stat=1 and lx=1");
          while ($image = $resultdl->fetch_array()) {
            $kauser = $image['kauser'];
            $db1->query("Delete from web_agent where kauser='{$kauser}'");
            $db1->query("Delete from web_agent_zi where guan='{$kauser}'");
            $db1->query("Delete from web_member where dai='{$kauser}'");
            $db1->query("Delete from web_user_ds where lx=1  and username='{$kauser}'");
            $db1->query("Delete from web_user_ds where dai='{$kauser}'");
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='数据管理',text2='删除代理:" . $kauser . "',ip='" . $userip . "'";
            $db1->query($sql);
          }
        }
      }
      if ($_POST['baobiao'] != "") {
        if ($_POST['baobiao'] == "baobiao" || $_POST['baobiao'] == "baobiaokj") {
          $bakdata = "web_tans_bak_" . date("YmdHis");
          $time2   = $_POST['key'] . " 23:59:59";
          $db1->query("CREATE TABLE " . $bakdata . " SELECT * FROM web_tans");
          $db1->query("delete from web_tans where adddate<='" . $time2 . "'");
          $str1 = "删除" . $_POST['key'] . "日前数据!!";
          $db1->query("INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='" . $str1 . "',ip='" . $userip . "'");
        }elseif ($_POST['baobiao'] == "baobiaokj") {
          
        }
      }
      if ($_POST['log'] != "") {
        if ($_POST['log'] == "loginlog") {
          $db1->query("Delete from web_user_log where lx=0");
          $db1->query("INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='数据管理',text2='清空登陆日志',ip='" . $userip . "'");
        } elseif ($_POST['log'] == "editlog") {
        } elseif ($_POST['log'] == "bllog") {
        } elseif ($_POST['log'] == "gllog") {
          $db1->query("Delete from web_user_log where lx=3");
          $db1->query("INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='数据管理',text2='清空管理日志',ip='" . $userip . "'");
        } elseif ($_POST['log'] == "alllog") {
          $db1->query("Delete from web_user_log");
          $db1->query("INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='数据管理',text2='清空全部日志',ip='" . $userip . "'");
        }
      }

      echo "<script>alert(" . $_POST['key'] . "之前的数据已被删除！!'); window.location.href = 'main.php?action=web_del&uid={$uid}';</script>";
      exit;
    }
  } else {
    echo "<script>alert('请输入操作密码!'); window.location.href = 'main.php?action=web_del&uid={$uid}';</script>";
    exit;
  }
}






$sql1 = "select COUNT(*) from web_member";
$result1 = $db1->query($sql1) or die(mysql_error());
$row1 = $result1->fetch_array();
$hycount = $row1[0];
$sql2 = "select COUNT(*) from web_member where stat=1";
$result2 = $db1->query($sql2) or die(mysql_error());
$row2 = $result2->fetch_array();
$hytcount = $row2[0];


$sql3 = "select COUNT(*) from web_agent where lx=1";
$result3 = $db1->query($sql3) or die(mysql_error());
$row3 = $result3->fetch_array();
$dlcount = $row3[0];
$sql4 = "select COUNT(*) from web_agent where stat=1 and lx=1";
$result4 = $db1->query($sql4) or die(mysql_error());
$row4 = $result4->fetch_array();
$dltcount = $row4[0];

$sql5 = "select COUNT(*) from web_agent_zi where lx=1";
$result5 = $db1->query($sql5) or die(mysql_error());
$row5 = $result5->fetch_array();
$dlzcount = $row5[0];
?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/calendar.js" type="text/javascript"></script>
<SCRIPT language=JAVASCRIPT>
  function SubChk() {
    if ($("key").value == '') {
      $("key").focus();
      alert("请务必选择开始日期!!");
      return false;
    }
    if (!confirm("是否确定删除该日期数据?")) {
      return false;
    }
  }
</script>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">

<body>
  <div id="tit" class="tit">
    <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
    <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;系统管理</span><span class="font_b">&nbsp;数据管理</span></div>
    <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
    <div class="biaoti_right floatright"></div>
  </div>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <form action="main.php?action=web_del&amp;uid=<?= $uid ?>&amp;act=del" method="post" name="testFrm" id="testFrm" onSubmit="return SubChk()">
      <tbody>
        <tr>
          <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_list_caption">删除数据</td>
        </tr>
        <tr>
          <td width="25%" height="30" bgcolor="#FFFFFF" class="t_edit_caption">日期：&nbsp;</td>
          <td width="65%" height="30" colspan="6" bgcolor="#FFFFFF" class="t_edit_td">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
              <tr>
                <td width="100"><input name="key" type="text" class="za_text" id="key" size="12" value="<?=date("Y-m-d")?>"/></td>
                <td>
                  <a href="javascript: void(0);" onClick="new Calendar(2021,2025).show($('key'));">&nbsp;&nbsp;<img src="/images/calendar.png" name="imgCalendar" width="16" height="16" border="0"></a>

                  <?
                  // 获取本周第一天（默认为周日）的时间戳
                  $timestamp = strtotime('this sunday');

                  // 计算上一周的同一天
                  $lastWeekTimestamp = $timestamp - (7 * 24 * 60 * 60); // 减去7天的秒数
                  $one_week_ago_date = date('Y-m-d', $lastWeekTimestamp);
                  // 计算上一周的同一天
                  $last_lastWeekTimestamp = $timestamp - (14 * 24 * 60 * 60); // 减去7天的秒数
                  $last_one_week_ago_date = date('Y-m-d', $last_lastWeekTimestamp);
                  $last_day = date('Y-m-t', strtotime('-1 month'));
                  $last_last_day = date('Y-m-t', strtotime('-2 month'));
                  ?>
                  <input name="Submit" type="Button" class="btn3" onClick="$('key').value='<?= $one_week_ago_date ?>'" value="本周之前">&nbsp;
                  <input name="Submit" type="Button" class="btn3" onClick="$('key').value='<?= $last_one_week_ago_date ?>'" value="上周之前">&nbsp;
                  <input name="Submit" type="Button" class="btn3" onClick="$('key').value='<?= $last_day ?>'" value="本月之前">&nbsp;
                  <input name="Submit" type="Button" class="btn3" onClick="$('key').value='<?= $last_last_day ?>'" value="上月之前"> &nbsp;
                </td>

              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">删除类型:&nbsp;</Td>
          <td bordercolor="cccccc" class="t_edit_td">
            <table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
              <tbody>
                <tr bgcolor="#ffffff">
                  <td width="100" height="40">
                    <input type="radio" name="baobiao" value="baobiao">报表数据
                    <input type="radio" name="baobiao" value="baobiaokj">开奖数据+报表数据
                  </td>
                </tr>
                <tr bgcolor="#ffffff">
                  <td width="100" height="30">
                    <input type="radio" name="log" value="loginlog">登录日志
                    <input type="radio" name="log" value="editlog">修改日志
                    <input type="radio" name="log" value="bllog">赔率日志
                    <input type="radio" name="log" value="gllog">管理日志
                    <input type="radio" name="log" value="alllog">全部日志
                  </td>
                </tr>
                <tr bgcolor="#ffffff">
                  <td width="100" height="30">
                    <input type="radio" name="user" value="hy">已停用会员
                    <input type="radio" name="user" value="dl">已停用代理
                    <input type="radio" name="user" value="alluser">已停用得的全部用户
                    <p size="14">
                      <font color="red">只会停用一个月以上的会员</font>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">操作密码:&nbsp;</td>
          <td bordercolor="cccccc" class="t_edit_td"><input name="password" class="inp1" id="password" value=""> </td>
        </tr>
        <tr bgcolor="#ffffff">
          <td align="center" colspan="3" bgcolor="#FFFFFF">
            <input type="submit" value="删除" name="B1" class="btn3" ;>
          </td>

        </tr>
        <tr bgcolor="#ffffff">
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">最近删除报表:&nbsp;</td>
          <td bordercolor="cccccc" class="t_edit_td">
            <font class="font_b">无</font>
          </td>
        </tr>
        <tr bgcolor="#ffffff">
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">会员用户:&nbsp;</td>
          <td bordercolor="cccccc" class="t_edit_td"><?= $hycount ?>个,其中<?= $hytcount ?>个已停用</td>
        </tr>
        <tr bgcolor="#ffffff">
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">代理用户:&nbsp;</td>
          <td bordercolor="cccccc" class="t_edit_td"><?= ($dlcount + $dlzcount) ?>个,子账户占<?= $dlzcount ?>个,其中<?= $dltcount ?>个已停用</td>
        </tr>

      </tbody>
    </form>
  </table>
  <p style="color:blue;" align="center"> 提示：如果一但清理就不可能再还原.请小心操作,建议操作前请自行做好备份.</p>
</body>