<?php
if (!defined('KK_VER')) {
  exit('��Ч�ķ���');
}

if (strpos($flag, '10')) {
} else {
  echo "<center>��û�и�Ȩ�޹���!</center>";
  exit;
}
if ($_GET['act'] == "del") {
  if (!empty($_POST['password'])) {
    $pass = md5($_POST['password']);
    $sql = "select * from web_yw where pass='$pass' LIMIT 1";
    $result = $db1->query($sql) or die(mysql_error());
    $count = $result->num_rows;
    if ($count == 0) {
      echo "<script>alert('������Ĳ��������������������!');window.location.href = 'main.php?action=web_del&uid={$uid}';</script>";
      exit;
    } else {
      if ($_POST['key'] == "") {
        echo ("<script type='text/javascript'>alert('����ȷ����ɾ�����ڣ�'); history.back();</script>");
        exit;
      }
      if ($_POST['key'] == date("Y-m-d")) {
        echo ("<script type='text/javascript'>alert('����ɾ���������ݣ�����ȷ����ɾ�����ڣ�'); history.back();</script>");
        exit;
      }
      if ($_POST['user'] != "") {

        //ɾ����ͣ���û�
        if ($_POST['user'] == "hy" || $_POST['user'] == "alluser") {
          $resulthy = $db1->query("select kauser from web_member where stat=1");
          while ($image = $resulthy->fetch_array()) {
            $kauser = $image['kauser'];
            $db1->query("Delete from web_member where kauser='{$kauser}'");
            $db1->query("Delete from web_user_ds where lx=0  and username='{$kauser}'");
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='���ݹ���',text2='ɾ����Ա:" . $kauser . "',ip='" . $userip . "'";
            $db1->query($sql);
          }
        }
        //ɾ����ͣ�ô���
        elseif ($_POST['user'] == "dl" || $_POST['user'] == "alluser") {
          $resultdl = $db1->query("select kauser from web_agent where stat=1 and lx=1");
          while ($image = $resultdl->fetch_array()) {
            $kauser = $image['kauser'];
            $db1->query("Delete from web_agent where kauser='{$kauser}'");
            $db1->query("Delete from web_agent_zi where guan='{$kauser}'");
            $db1->query("Delete from web_member where dai='{$kauser}'");
            $db1->query("Delete from web_user_ds where lx=1  and username='{$kauser}'");
            $db1->query("Delete from web_user_ds where dai='{$kauser}'");
            $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='���ݹ���',text2='ɾ������:" . $kauser . "',ip='" . $userip . "'";
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
          $str1 = "ɾ��" . $_POST['key'] . "��ǰ����!!";
          $db1->query("INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='ϵͳ����',text2='" . $str1 . "',ip='" . $userip . "'");
        }elseif ($_POST['baobiao'] == "baobiaokj") {
          
        }
      }
      if ($_POST['log'] != "") {
        if ($_POST['log'] == "loginlog") {
          $db1->query("Delete from web_user_log where lx=0");
          $db1->query("INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='���ݹ���',text2='��յ�½��־',ip='" . $userip . "'");
        } elseif ($_POST['log'] == "editlog") {
        } elseif ($_POST['log'] == "bllog") {
        } elseif ($_POST['log'] == "gllog") {
          $db1->query("Delete from web_user_log where lx=3");
          $db1->query("INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='���ݹ���',text2='��չ�����־',ip='" . $userip . "'");
        } elseif ($_POST['log'] == "alllog") {
          $db1->query("Delete from web_user_log");
          $db1->query("INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='���ݹ���',text2='���ȫ����־',ip='" . $userip . "'");
        }
      }

      echo "<script>alert(" . $_POST['key'] . "֮ǰ�������ѱ�ɾ����!'); window.location.href = 'main.php?action=web_del&uid={$uid}';</script>";
      exit;
    }
  } else {
    echo "<script>alert('�������������!'); window.location.href = 'main.php?action=web_del&uid={$uid}';</script>";
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
      alert("�����ѡ��ʼ����!!");
      return false;
    }
    if (!confirm("�Ƿ�ȷ��ɾ������������?")) {
      return false;
    }
  }
</script>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">

<body>
  <div id="tit" class="tit">
    <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
    <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;ϵͳ����</span><span class="font_b">&nbsp;���ݹ���</span></div>
    <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
    <div class="biaoti_right floatright"></div>
  </div>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <form action="main.php?action=web_del&amp;uid=<?= $uid ?>&amp;act=del" method="post" name="testFrm" id="testFrm" onSubmit="return SubChk()">
      <tbody>
        <tr>
          <td height="30" colspan="3" bgcolor="#FFFFFF" class="t_list_caption">ɾ������</td>
        </tr>
        <tr>
          <td width="25%" height="30" bgcolor="#FFFFFF" class="t_edit_caption">���ڣ�&nbsp;</td>
          <td width="65%" height="30" colspan="6" bgcolor="#FFFFFF" class="t_edit_td">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
              <tr>
                <td width="100"><input name="key" type="text" class="za_text" id="key" size="12" value="<?=date("Y-m-d")?>"/></td>
                <td>
                  <a href="javascript: void(0);" onClick="new Calendar(2021,2025).show($('key'));">&nbsp;&nbsp;<img src="/images/calendar.png" name="imgCalendar" width="16" height="16" border="0"></a>

                  <?
                  // ��ȡ���ܵ�һ�죨Ĭ��Ϊ���գ���ʱ���
                  $timestamp = strtotime('this sunday');

                  // ������һ�ܵ�ͬһ��
                  $lastWeekTimestamp = $timestamp - (7 * 24 * 60 * 60); // ��ȥ7�������
                  $one_week_ago_date = date('Y-m-d', $lastWeekTimestamp);
                  // ������һ�ܵ�ͬһ��
                  $last_lastWeekTimestamp = $timestamp - (14 * 24 * 60 * 60); // ��ȥ7�������
                  $last_one_week_ago_date = date('Y-m-d', $last_lastWeekTimestamp);
                  $last_day = date('Y-m-t', strtotime('-1 month'));
                  $last_last_day = date('Y-m-t', strtotime('-2 month'));
                  ?>
                  <input name="Submit" type="Button" class="btn3" onClick="$('key').value='<?= $one_week_ago_date ?>'" value="����֮ǰ">&nbsp;
                  <input name="Submit" type="Button" class="btn3" onClick="$('key').value='<?= $last_one_week_ago_date ?>'" value="����֮ǰ">&nbsp;
                  <input name="Submit" type="Button" class="btn3" onClick="$('key').value='<?= $last_day ?>'" value="����֮ǰ">&nbsp;
                  <input name="Submit" type="Button" class="btn3" onClick="$('key').value='<?= $last_last_day ?>'" value="����֮ǰ"> &nbsp;
                </td>

              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">ɾ������:&nbsp;</Td>
          <td bordercolor="cccccc" class="t_edit_td">
            <table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
              <tbody>
                <tr bgcolor="#ffffff">
                  <td width="100" height="40">
                    <input type="radio" name="baobiao" value="baobiao">��������
                    <input type="radio" name="baobiao" value="baobiaokj">��������+��������
                  </td>
                </tr>
                <tr bgcolor="#ffffff">
                  <td width="100" height="30">
                    <input type="radio" name="log" value="loginlog">��¼��־
                    <input type="radio" name="log" value="editlog">�޸���־
                    <input type="radio" name="log" value="bllog">������־
                    <input type="radio" name="log" value="gllog">������־
                    <input type="radio" name="log" value="alllog">ȫ����־
                  </td>
                </tr>
                <tr bgcolor="#ffffff">
                  <td width="100" height="30">
                    <input type="radio" name="user" value="hy">��ͣ�û�Ա
                    <input type="radio" name="user" value="dl">��ͣ�ô���
                    <input type="radio" name="user" value="alluser">��ͣ�õõ�ȫ���û�
                    <p size="14">
                      <font color="red">ֻ��ͣ��һ�������ϵĻ�Ա</font>
                    </p>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">��������:&nbsp;</td>
          <td bordercolor="cccccc" class="t_edit_td"><input name="password" class="inp1" id="password" value=""> </td>
        </tr>
        <tr bgcolor="#ffffff">
          <td align="center" colspan="3" bgcolor="#FFFFFF">
            <input type="submit" value="ɾ��" name="B1" class="btn3" ;>
          </td>

        </tr>
        <tr bgcolor="#ffffff">
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">���ɾ������:&nbsp;</td>
          <td bordercolor="cccccc" class="t_edit_td">
            <font class="font_b">��</font>
          </td>
        </tr>
        <tr bgcolor="#ffffff">
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">��Ա�û�:&nbsp;</td>
          <td bordercolor="cccccc" class="t_edit_td"><?= $hycount ?>��,����<?= $hytcount ?>����ͣ��</td>
        </tr>
        <tr bgcolor="#ffffff">
          <td height="30" bgcolor="#FFFFFF" align="right" class="t_edit_caption">�����û�:&nbsp;</td>
          <td bordercolor="cccccc" class="t_edit_td"><?= ($dlcount + $dlzcount) ?>��,���˻�ռ<?= $dlzcount ?>��,����<?= $dltcount ?>����ͣ��</td>
        </tr>

      </tbody>
    </form>
  </table>
  <p style="color:blue;" align="center"> ��ʾ�����һ������Ͳ������ٻ�ԭ.��С�Ĳ���,�������ǰ���������ñ���.</p>
</body>