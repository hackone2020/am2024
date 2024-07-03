<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "01")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['act'] == "add") {
    if (empty($_POST['nn'])) {
        echo "<script>alert('期数不能为空!');window.history.go(-1);</script>";
        exit;
    }
    if (empty($_POST['nd'])) {
        echo "<script>alert('开奖时间不能为空!');window.history.go(-1);</script>";
        exit;
    }
    $sx1 = get_sx_name($_POST['n1']);
    $sx2 = get_sx_name($_POST['n2']);
    $sx3 = get_sx_name($_POST['n3']);
    $sx4 = get_sx_name($_POST['n4']);
    $sx5 = get_sx_name($_POST['n5']);
    $sx6 = get_sx_name($_POST['n6']);
    $sx = get_sx_name($_POST['na']);
    
    $sql = "update web_kithe set nn='" . $_POST['nn'] . "',nd='" . $_POST['nd'] . "',na='" . $_POST['na'] . "',sx='" . $sx . "',n1='" . $_POST['n1'] . "',n2='" . $_POST['n2'] . "',n3='" . $_POST['n3'] . "',n4='" . $_POST['n4'] . "',n5='" . $_POST['n5'] . "',n6='" . $_POST['n6'] . "',sx1='" . $sx1 . "',sx2='" . $sx2 . "',sx3='" . $sx3 . "',sx4='" . $sx4 . "',sx5='" . $sx5 . "',sx6='" . $sx6 . "' where id=" . $_GET['id'];
    if (!$db1->query($sql)) {
        exit("数据库修改出错");
    }
    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $_POST['nn'] . "',kauser='" . $jxadmin . "',lx=3,text1='盘口管理',text2='修改开奖号码',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script>alert('盘口修改成功!');window.location.href='main.php?action=web_kithe_edit&uid={$uid}&id=" . $_GET['id'] . "';</script>";
    exit;
}
$result = $db1->query("select * from web_kithe where id=" . $_GET['id'] . " order by id desc LIMIT 1");
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
<script src="js/web_kithe_edit.js" type="text/javascript"></script>
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;历史</span><span class="font_b">盘口修改&nbsp;&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
      </div>
</div>      
   <table width="40%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
        <form action="main.php?action=web_kithe_edit&act=add&uid=<?=$uid?>&id=<?=$id?>" method="post" name="testFrm" id="testFrm" onSubmit="return SubChk()">
            <tbody></tbody>
            <tr>
                <td width="35%" align="right" class="t_list_tr_3" >期数<input name="nn" type="text" class="za_text" id="nn" value="<?=$nn?>" size="8" />          
                <span>*</span></td>
                <td width="15%" height="30" align="right" class="t_list_tr_3" >开奖时间：</td>
                <td width="45%" bordercolor="#CCCCCC" class="t_list_tr_3"><input name="nd" type="text" class="za_text" id="nd" value="<?=$nd?>" size="35" />
                <span>*</span></td>
            </tr>
            <tr>
                <td height="30" colspan="3" align="center" class="t_list_tr_3">
                <table border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" align="center" >
                <tr>
                    <td width="50" height="20" align="center" class="t_list_caption" >正1</td>
                    <td width="50" height="20" align="center" class="t_list_caption">正2</td>
                    <td width="50" height="20" align="center" class="t_list_caption">正3</td>
                    <td width="50" height="20" align="center" class="t_list_caption">正4</td>
                    <td width="50" height="20" align="center" class="t_list_caption">正5</td>
                    <td width="50" height="20" align="center" class="t_list_caption">正6</td>
                    <td width="50" height="20" align="center" class="t_list_caption">特码</td>
                </tr>
                <tr>
                    <td height="25" align="center" class="m_cen">
                    <input onblur="return CountGold(this,'blur','SP');" onkeyup="return CountGold(this,'keyup');" name="n1" type="text" id="n1" value="<?=$row['n1']?>" size="8" />
                    </td>
                    
                    
                    <td height="25" align="center" class="m_cen"><input name="n2" onblur="return CountGold(this,'blur','SP');" onkeyup="return CountGold(this,'keyup');"  type="text" id="n2" value="<?=$row['n2']?>" size="8" /></td>
                    
                    
                    <td height="25" align="center" class="m_cen"><input onblur="return CountGold(this,'blur','SP');"   onkeyup="return CountGold(this,'keyup');"  name="n3" type="text" id="n3" value="
                    <?=$row['n3']?>" size="8" /></td>
                    
                    
                    
                    <td height="25" align="center" class="m_cen"><input onblur="return CountGold(this,'blur','SP');"    onkeyup="return CountGold(this,'keyup');"  name="n4" type="text" id="n4" value="<?=$row['n4']?>" size="8" /></td>
                    
                    
                    
                    
                    <td height="25" align="center" class="m_cen"><input onblur="return CountGold(this,'blur','SP');"    onkeyup="return CountGold(this,'keyup');"  name="n5" type="text" id="n5" value="<?=$row['n5']?>" size="8" /></td>
                    
                    
                    
                    <td height="25" align="center" class="m_cen">
                    
                    <input onblur="return CountGold(this,'blur','SP');"    onkeyup="return CountGold(this,'keyup');"  name="n6" type="text" id="n6" value="
                    <?=$row['n6']?>" size="8" /></td>
                    
                    
                    <td height="25" align="center" class="m_cen"><input onblur="return CountGold(this,'blur','SP');"  onkeyup="return CountGold(this,'keyup');" name="na" type="text" id="na" value="<?=$row['na']?>" size="8" /></td>
                </tr>
                </table>
                <p>注意：对已经开奖期数的球号修改，必须修改相应的生肖。并且修改保存后必须重新结算，以确保注单结果准确</p>
            </td>
            </tr>
            <tr>
                <td colspan="3" align="center" valign="middle" bgcolor="#FFFFFF" ><input type="submit" class="btn1" name="Submit" value="保存" /></td>
            </tr>
        </form>
     </tbody>    
    </table>
</body>