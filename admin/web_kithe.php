<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "01")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['act'] == "edit") {
    if (empty($_POST['nn'])) {
        echo "<script>alert('��������Ϊ��!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    }
    if (empty($_POST['nd'])) {
        echo "<script>alert('����ʱ�䲻��Ϊ�˿�!');window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['zfbdate'])) {
        echo "<script>alert('�ܷ���ʱ�䲻��Ϊ��!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    }
    if (empty($_POST['zfbdate1'])) {
        echo "<script>alert('����ʱ�䲻��Ϊ��!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    }
    $sql = "update web_kithe set nn='" . $_POST['nn'] . "',nd='" . $_POST['nd'] . "',kitm='" . $_POST['kitm'] . "',kizt='" . $_POST['kizm'] . "',kizm='" . $_POST['kizm'] . "',kilm='" . $_POST['kizm'] . "',kisx='" . $_POST['kizm'] . "',kibb='" . $_POST['kizm'] . "',kiws='" . $_POST['kizm'] . "',zfbdate='" . $_POST['zfbdate'] . "',kitm1='" . $_POST['kitm1'] . "',kizt1='" . $_POST['kizm1'] . "',kizm1='" . $_POST['kizm1'] . "',kilm1='" . $_POST['kizm1'] . "',kisx1='" . $_POST['kizm1'] . "',kibb1='" . $_POST['kizm1'] . "',kiws1='" . $_POST['kizm1'] . "',zfbdate1='" . $_POST['zfbdate1'] . "' where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���2");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='�̿ڹ���',text2='�޸��̿���Ϣ',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('�̿��޸ĳɹ�!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
    exit;
}
if ($_GET['t0'] == "y") {
    $sql = "update web_kithe set best=1 where id=" . $_GET['newsid'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='�̿ڹ���',text2='���������Զ�����',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('�����Զ�����!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
    exit;
}
if ($_GET['t0'] == "n") {
    $sql = "update web_kithe set best=0 where id=" . $_GET['newsid'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='�̿ڹ���',text2='���ò������Զ�����',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('�������Զ�����!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
    exit;
}
if ($_GET['t1'] == "y") {
    $sql = "update web_kithe set zfb='" . $_GET['zfb'] . "' where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("���ݿ��޸ĳ���1");
    }
    if ($_GET['zfb'] == 1) {
        $sql = "update web_kithe set kitm=1,kizt=1,kizm=1,kizm6=1,kigg=1,kilm=1,kisx=1,kibb=1,kiws=1,zfb=1 where id=" . $_GET['id'];
        if (!$db1->query($sql)) {
            exit("���ݿ��޸ĳ���1");
        }
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='�̿ڹ���',text2='�ֶ�����',ip='" . $userip . "'";
        $db1->query($sql);
        echo "<script>alert('���̳ɹ�!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    } else {
        $sql = "update web_kithe set kitm=0,kizt=0,kizm=0,kizm6=0,kigg=0,kilm=0,kisx=0,kibb=0,kiws=0,zfb=0 where id=" . $_GET['id'];
        if (!$db1->query($sql)) {
            exit("���ݿ��޸ĳ���1");
        }
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='�̿ڹ���',text2='�ֶ�����',ip='" . $userip . "'";
        $db1->query($sql);
        echo "<script>alert('���̳ɹ�!');window.location.href='main.php?action=web_kithe&uid={$uid}';</script>";
        exit;
    }
}
if ($_GET['svave'] == "svave") {
    if (!empty($_POST['na']) && $_POST['na'] != 0) {
        $fa = $_POST['na'];
        $fb = (int) $fa;
        $sx = get_sx_name($fb);
        $sql = "update web_kithe set na='" . $_POST['na'] . "',sx='" . $sx . "' where id=" . $_GET['id'];
        if (!$db1->query($sql)) {
            exit("���ݿ��޸ĳ���1");
        }
    }
    if (!empty($_POST['n1']) && $_POST['n1'] != 0) {
        $fa1 = $_POST['n1'];
        $fb1 = (int) $fa1;
        $sx1 = get_sx_name($fb1);
        $sql1 = "update web_kithe set n1='" . $_POST['n1'] . "',sx1='" . $sx1 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("���ݿ��޸ĳ���1");
        }
    }
    if (!empty($_POST['n2']) && $_POST['n2'] != 0) {
        $fa2 = $_POST['n2'];
        $fb2 = (int) $fa2;
        $sx2 = get_sx_name($fb2);
        $sql1 = "update web_kithe set n2='" . $_POST['n2'] . "',sx2='" . $sx2 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("���ݿ��޸ĳ���1");
        }
    }
    if (!empty($_POST['n3']) && $_POST['n3'] != 0) {
        $fa3 = $_POST['n3'];
        $fb3 = (int) $fa3;
        $sx3 = get_sx_name($fb3);
        $sql1 = "update web_kithe set n3='" . $_POST['n3'] . "',sx3='" . $sx3 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("���ݿ��޸ĳ���1");
        }
    }
    if (!empty($_POST['n4']) && $_POST['n4'] != 0) {
        $fa4 = $_POST['n4'];
        $fb4 = (int) $fa4;
        $sx4 = get_sx_name($fb4);
        $sql1 = "update web_kithe set n4='" . $_POST['n4'] . "',sx4='" . $sx4 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("���ݿ��޸ĳ���1");
        }
    }
    if (!empty($_POST['n5']) && $_POST['n5'] != 0) {
        $fa5 = $_POST['n5'];
        $fb5 = (int) $fa5;
        $sx5 = get_sx_name($fb5);
        $sql1 = "update web_kithe set n5='" . $_POST['n5'] . "',sx5='" . $sx5 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("���ݿ��޸ĳ���1");
        }
    }
    if (!empty($_POST['n6']) && $_POST['n6'] != 0) {
        $fa6 = $_POST['n6'];
        $fb6 = (int) $fa6;
        $sx6 = get_sx_name($fb6);
        $sql1 = "update web_kithe set n6='" . $_POST['n6'] . "',sx6='" . $sx6 . "' where id=" . $_GET['id'];
        if (!$db1->query($sql1)) {
            exit("���ݿ��޸ĳ���1");
        }
    }
    if (!empty($_POST['na']) && $_POST['na'] != 0) {
        $sql = "SELECT * FROM web_kithe WHERE id=" . $_GET['id'] . " order by nn desc LIMIT 1";
        $result = $db1->query($sql);
        $row = $result->fetch_array();
        $kithe = $row['nn'];
        $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $Current_Kithe_Num . "',kauser='" . $jxadmin . "',lx=3,text1='�̿ڹ���',text2='¼�뿪������',ip='" . $userip . "'";
        $db1->query($sql);
        echo "<script>alert('�����ɹ�,����֤û�п�����ٽ��㣡!');window.location.href='main.php?action=web_kithe_list&uid={$uid}';</script>";
        exit;
    }
}
$nana = 1;
$result = $db1->query("select * from web_kithe  order by nn desc LIMIT 1");
$row = $result->fetch_array();
$id = $row['id'];
$nn = $row['nn'];
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
$nana = $row['na'];
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<script src="js/web_kithe.js" type="text/javascript"></script>
<body style="min-width: 1200px;width: 100%">
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;�̿ڹ���</span><span class="font_b">��ǰ���̿�����&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>  
<table width="900"  border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
	 <tbody><tr>
	     <td class="t_list_caption">������̿�</td></tr>
          <?if ($nana!= 0) {?>
				<tr>
					 <td height="60" align="center" bgcolor="#FFFFFF"><button onClick="javascript:location.href='main.php?action=web_kithe_add&uid=<?=$uid?>'"><font color="ff0000">������̿�</font></button></td>
				</tr>      
			</table>
		 <? } else {?>
    <table width="900"  border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
     			<tr >
					<td width="92%" height="30" align="center" bgcolor="#ffffff"> 
						<? if ($row['kizt'] == 0 && $row['kizm'] == 0 && $row['kibb'] == 0 && $row['kiws'] == 0 && $row['kizm6'] == 0 && $row['kisx'] == 0 && $row['kilm'] == 0) {?>
        				<table border="0" align="center" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" class="m_tab_ed" id="glist_table">
		
						<form action="main.php?action=web_kithe&uid=<?=$uid?>&svave=svave&id=<?=$id?>"  method="post" name="testFrm" id="testFrm">
							<tr>
								<td height="20" colspan="8" align="center" class="t_list_caption" ><span class="STYLE1">��������</span></td>
							</tr>
							<tr>
								<td height="15" align="center" class="t_list_tr_3" >��1</td>
        					<? if($row['n1'] != "0" && $row['n1'] != "") {?><td height="15" align="center" class="t_list_tr_3" >��2</td><?}?>
            				<? if($row['n2'] != "0" && $row['n2'] != "") {?><td height="15" align="center" class="t_list_tr_3" >��3</td><?}?>
        					<? if($row['n3'] != "0" && $row['n3'] != "") {?><td height="15" align="center" class="t_list_tr_3" >��4</td><?}?>
                            <? if($row['n4'] != "0" && $row['n4'] != "") {?><td height="15" align="center" class="t_list_tr_3" >��5</td><?}?>
        					<? if($row['n5'] != "0" && $row['n5'] != "") {?><td height="15" align="center" class="t_list_tr_3" >��6</td><?}?>
                            <? if($row['n6'] != "0" && $row['n6'] != "") {?><td height="15" align="center" class="t_list_tr_3" >����</td><?}?>
        						<td align="center" class="t_list_tr_3" >����</td>
							</tr>
							<tr>
								<td height="25" align="center" class="m_cen"><input onBlur="return CountGold(this,'blur','SP');" onKeyUp="return CountGold(this,'keyup');"  name="n1" type="text" class="za_text"  id="n1" value="<?=$row['n1']?>" size="4" /></td>        
 <? if($row['n1'] != "0" && $row['n1'] != "") {?><td height="25" align="center" class="m_cen"><input name="n2" onBlur="return CountGold(this,'blur','SP');" onKeyUp="return CountGold(this,'keyup');"  type="text" class="za_text"  id="n2" value="<?=$row['n2']?>" size="4" /></td><?}?>
 <? if ($row['n2'] != "0" && $row['n2'] != "") {?><td height="25" align="center" class="m_cen"><input onBlur="return CountGold(this,'blur','SP');" onKeyUp="return CountGold(this,'keyup');"  name="n3" type="text" class="za_text"  id="n3" value="<?=$row['n3']?>" size="4" /></td><?}?>
 <? if ($row['n3'] != "0" && $row['n3'] != "") {?><td height="25" align="center" class="m_cen"><input onBlur="return CountGold(this,'blur','SP');" onKeyUp="return CountGold(this,'keyup');"  name="n4" type="text" class="za_text"  id="n4" value="<?=$row['n4']?>" size="4" /></td><?}?>
 <? if ($row['n4'] != "0" && $row['n4'] != "") {?><td height="25" align="center" class="m_cen"><? if ($row['zfb'] != 0) {?>���ȷ���<?} else {?><input onBlur="return CountGold(this,'blur','SP');" onKeyUp="return CountGold(this,'keyup');"  name="n5" type="text" class="za_text"  id="n5" value="<?=$row['n5']?>" size="4" />
            <?}?>
            </td>
        <?}?>
<? if ($row['n5'] != "0" && $row['n5'] != "") {?><td height="25" align="center" class="m_cen"><input onBlur="return CountGold(this,'blur','SP');" onKeyUp="return CountGold(this,'keyup');"  name="n6" type="text" class="za_text"  id="n6" value="<?=$row['n6']?>" size="4" /></td><?}?>
                         
<? if ($row['n6'] != "0" && $row['n6'] != "") {?><td height="25" align="center" class="m_cen"><input onBlur="return CountGold(this,'blur','SP');" onKeyUp="return CountGold(this,'keyup');"  name="na" type="text" class="za_text"  id="na" value="<?=$row['na']?>" size="4" /></td> <?}?>
        <td align="center" class="m_cen"><input  type="submit" name="Submit2" value="����" /></td>                    
       </tr> 
       <tr>
       	 <td height="25" colspan="8" align="center" class="m_bc_ed"><span class="STYLE2">�����δ�����������������뱣��Ϊ0��</span></td></tr>
		</form>
		</table>
    <?} else {?>
       <font color="ff000">���ȷ����ٿ�����</font>
    <?}?>
   </td></tr></table>
   <table width="900"  border="0" align="center" cellpadding="0" cellspacing="1"  class="t_list" >
   
   <form action="main.php?action=web_kithe&uid=<?=$uid?>&act=edit&id=<?=$id?>" method="post" name="testFrm" id="testFrm" onSubmit="return SubChk()">
	
	<tr>
		<td height="20" colspan="2" align="center" class="t_list_caption" >�̿���Ϣ�޸�</td>
	</tr>
	<tr>
		<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
		<td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input  <? if ($row['zfb'] == 1) {?> readonly="readonly" <?}?>  name="nn" type="text" class="za_text"  id="nn" value="<?=$nn?>" size="8" />&nbsp;(��������ʱ�����޸�!)</td>
	</tr>
	<tr>
		<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�̿�״̬:</td>
		<td height="30" bgcolor="#FFFFFF" class="t_edit_td"><button type="button" onClick="javascript:location.href='main.php?action=web_kithe&uid=<?=$uid?>&t1=y&id=<?=$id?>&zfb=<?
    if ( $row['zfb'] == 0 )
    {
        echo "1";
    }
    else
    {
        echo "0";
    }?>'" style="width:150;height:22;" >
    <? if ($row['zfb'] == 0) {?>
        <font color="#0000FF">������...</font>
    <?} else {?>
        <font color="#ff0000">������...</font>
    <?}?>
    </button>
	</td></tr>
	<tr><td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ʱ��:</td>
	<td height="30" bgcolor="#FFFFFF" class="t_edit_td"><table border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td><input name="zfbdate1" type="text" class="za_text"  id="zfbdate1" value="<?=$zfbdate1?>" size="30" /></td>	
	<td width="25"><a href="main.php?action=web_kithe&uid=<?=$uid?>&newsid=<?=$id?>&t0=<?if ($row['best'] == 1) {?>n<? } else {?>y<?}?>" ><img src="images/<? if($row['best'] == 1) {?>i<? } else {?>j<?}?>.jpg" name="test_b" <?$row['id']?> width="18" height="18" border="0" id="test_b<?=$row['id']?>" value=<? if ($row['best'] == 1) {?>True<? } else {?>False<?}?> /></a></td>
	<td>&nbsp;</td>
	</tr>
	</table></td>
	</tr>
	<tr>
	<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
	<td height="30" bgcolor="#FFFFFF" class="t_edit_td">
	<input name="kitm" type="radio" value="0" 
    <? if ($row['kitm'] == 0) {?>
        checked="checked"
    <?} ?> />
    <?if ($row['kitm'] == 0) {?>
        <font color="#CC0000">��</font>
    <?} else {?>
        ��
    <?}?>
    <input name="kitm" type="radio" value="1" 
   <? if ($row['kitm'] == 1) {?>
         checked="checked"
    <?}?>
    />
    <?if ($row['kitm'] == 1) {?>
        <font color="#CC0000">��</font>
    <?} else {?>
        ��
    <?}?>
    </td></tr><tr>
	<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����:</td>
	<td height="30" bgcolor="#FFFFFF" class="t_edit_td">
	<input name="kizm" type="radio" value="0" 
   <? if ($row['kizm'] == 0) {?>
         checked="checked"
    <?}?>
     />
    <?if ($row['kizm'] == 0) {?>
        <font color="#CC0000">��</font>
    <?} else {?>
         ��
   <? }?>
    <input name="kizm" type="radio" value="1"
    <? if ($row['kizm'] == 1) {?>
         checked="checked"
    <?}?>
     />
    <?if ($row['kizm'] == 1) {?>
        <font color="#CC0000">��</font>
    <?} else {?>
        ��
    <?}?>
    </td></tr><tr>
	<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">ͳһ�޸�:</td>
	<td height="30" bgcolor="#FFFFFF" class="t_edit_td">
	<input name="money" class="za_text" value="<?=$zfbdate?>" size="24" />
	<input name="button2" class="buttonnor" type="button" onClick="quick0()" value="����" /></td></tr>
	<tr>
	<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">����ʱ��:</td>
	<td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="nd" class="za_text" id="nd" value="<?=$nd?>" size="24" /></td>
	</tr>
	<tr>
	<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�ܷ���ʱ��:</td>
	
	<td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="zfbdate" type="text" class="za_text"  id="zfbdate" value="<?=$zfbdate?>" size="30" /></td>
	</tr>
	<tr>
	<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�������ʱ��:</td>
	<td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="kitm1" type="text" class="za_text"  id="kitm1" value="<?=$kitm1?>" size="30" /></td>
	</tr>
	<tr>
	<td width="16%" height="30" align="right" bgcolor="#FFFFFF" class="t_edit_caption">�������ʱ��:</td>
	<td height="30" bgcolor="#FFFFFF" class="t_edit_td"><input name="kizm1" type="text" class="za_text"  id="kizm1" value="<?=$kizm1?>" size="30" /></td></tr>
	<tr>
	<td height="30" colspan="2" class="m_cen" align="center" bgcolor="#FFFFFF">
	<input  type="submit"  class="btn1" name="Submit" value="����" /><br />
	</td>
	</tr>
	</form>
	</table>
<? }?>
</td>
</tr>
</table>
</body>