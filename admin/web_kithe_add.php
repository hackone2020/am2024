<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "01")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['act'] == "add") {
    if (empty($_POST['nn'])) {
        echo "<script>alert('��������Ϊ��!');window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['nd'])) {
        echo "<script>alert('����ʱ�䲻��Ϊ�˿�!');window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['zfbdate'])) {
        echo "<script>alert('�ܷ���ʱ�䲻��Ϊ�˿�!');window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['zfbdate1'])) {
        echo "<script>alert('�Զ�����ʱ�䲻��Ϊ�˿�!');window.history.go(-1);</script>";
        exit;
    }
    if ($_POST['tv5'] == "y") {
        $best = 1;
    } else {
        $best = 0;
    }
    $result = $db1->query("select * from web_kithe where nn=" . $_POST['nn'] . "   order by id LIMIT 1");
    $row11 =  $result->fetch_array();
    if ($row11 != "") {
        echo "<script>alert('�Բ�����һ���ڡ��ѱ�����������������!');window.history.go(-1);</script>";
        exit;
    }
    $result = $db1->query("select * from web_kithe where na=0  order by id LIMIT 1");
    $row11 =  $result->fetch_array();
    if ($row11 != "") {
        echo "<script>alert('�Բ��𣡵�[" . $row11['nn'] . "]�ڻ�δ���������ȿ��꽱������µ��̿�!');window.history.go(-1);</script>";
        exit;
    }
    $sql = "INSERT INTO  web_kithe set best='" . $best . "',nn='" . $_POST['nn'] . "',nd='" . $_POST['nd'] . "',kitm='" . $_POST['kitm'] . "',kizt='" . $_POST['kizm'] . "',kizm='" . $_POST['kizm'] . "',kilm='" . $_POST['kizm'] . "',kisx='" . $_POST['kizm'] . "',kibb='" . $_POST['kizm'] . "',kiws='" . $_POST['kizm'] . "',zfbdate='" . $_POST['zfbdate'] . "',kitm1='" . $_POST['kitm1'] . "',kizt1='" . $_POST['kizm1'] . "',kizm1='" . $_POST['kizm1'] . "',kilm1='" . $_POST['kizm1'] . "',kisx1='" . $_POST['kizm1'] . "',kibb1='" . $_POST['kizm1'] . "',kiws1='" . $_POST['kizm1'] . "',zfbdate1='" . $_POST['zfbdate1'] . "',n1=0,n2=0,n3=0,n4=0,n5=0,n6=0,na=0,lx=0 ";
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    //������̿ھ�ִ��Ĭ�ϻָ�����
    //$db1->query("update web_bl set rate=mrate,blrate=mrate,gold=0,blgold=0,adddate='" . $utime . "'");
    $db1->query("update web_member set ts=cs");
    $db1->query("TRUNCATE TABLE web_tan");
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='�̿ڹ���',text2='���������',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('Ĭ�����ʻ�ԭ�ɹ�!\\n��Ա���ö��̿ڻ�ԭ�ɹ�!\\n�µ��̿���ӳɹ�!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
    exit;
}
$result = $db1->query("select * from web_kithe where na=0  order by id LIMIT 1");
$row11 =  $result->fetch_array();
if ($row11 != "") {
    echo "<script>alert('�Բ��𣡵�[" . $row11['nn'] . "]�ڻ�δ���������ȿ��꽱������µ��̿�!');window.history.go(-1);</script>";
    exit;
}
$result = $db1->query("select * from web_kithe where na<>0 order by nn desc LIMIT 1");
$row = $result->fetch_array();
$nn = $row['nn'] + 1;
$nd = $row['nd'];
$zfbdate = $row['zfbdate'];
$zfbdate1 = $row['zfbdate1'];
$kitm1 = $row['kitm1'];
$kizt1 = $row['kizt1'];
$kizm1 = $row['kizm1'];
$kizm61 = $row['kizm61'];
$kigg1 = $row['kigg1'];
$kilm1 = $row['kilm1'];
$kisx1 = $row['kisx1'];
$kibb1 = $row['kibb1'];
$kiws1 = $row['kiws1'];
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/web_kithe_add.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;�̿ڹ���</span><span class="font_b">������̿�&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>  
<form name=testFrm onSubmit="return SubChk()" method="post" action="main.php?action=web_kithe_add&uid=<?=$uid?>&act=add">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
    <tbody>
        <tr>
         <td height="20" colspan="4" align="center" class="t_list_caption">������̿�</td>
        </tr>
        <tr>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">
            ������</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="nn" type="text" class="inp1"  id="nn" value="<?=$nn?>" size="8" />
            <span> *</span></td>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">
            <span >����ʱ�䣺</span></td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="nd" type="text" class="inp1"  id="nd" value="<?=$nd?>" size="35" />
            <span>*</span> </td>
        </tr>
        <tr>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">
            <span >����ʱ�䣺</span></td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="zfbdate1" type="text" class="inp1"  id="zfbdate1" value="<?=$zfbdate1?>" size="35" />
            <input name="tv5" type="hidden" id="tv5" value="n" /></td>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ʱ�䣺</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="zfbdate" type="text" class="inp1"  id="zfbdate" value="
            <?=$zfbdate?>" size="35" /><span>*</span></td>
        </tr>
        <tr>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ܷ��̣�</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="zfb" type="radio" value="0" checked="checked" />����
            <input name="zfb" type="radio" value="1" />����</td>
            <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ͳһ�޸ģ�</td>
            <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="money" class="inp1" value="<?=$zfbdate?>" size="35" />
            <input name="button2"  type="button" onClick="quick0()" value="����" /></td>
        </tr>
        <tr>
        <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">���룺</td>
        <td height="30" bgcolor="#FFFFFF" class="t_edit_td">
        <input name="kitm" type="radio" value="0" checked="checked" />��
        <input name="kitm" type="radio" value="1" />��</td>
        <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�������ʱ�䣺</td>
        <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="kitm1" type="text" class="inp1"  id="kitm1" value="
        <?=$kitm1?>" size="35" /></td>
    </tr>
        <tr>
        <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">���룺</td>
        <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="kizm" type="radio" value="0" checked="checked" />��<input name="kizm" type="radio" value="1" />��</td>
        <td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�������ʱ�䣺</td>
        <td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="kizm1" type="text" class="inp1"  id="kizm1" value="
    <?=$kizm1?>" size="35" /></td>
    </tr>
        <tr>
        <td height="30" colspan="4" align="center" bgcolor="#FFFFFF">
        <input  type="submit" class="btn1" name="Submit" value="����" /></td>
    </tr> 
    </tbody>    
</table>
<form>
<br> 
</body>