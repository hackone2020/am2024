<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "02")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    
    if(!empty($_POST['password'])){
        $pass = md5($_POST['password']);
        $sql = "select * from web_yw where pass='$pass' LIMIT 1";
        $result = $db1->query($sql) or die(mysql_error());
        $count =$result->num_rows;
        if ($count == 0) {
            echo "<script>alert('������Ĳ��������������������!');window.location.href = 'main.php?action=rake_hy&uid={$uid}';</script>";
            exit;
        }else{
            $db1->query("update web_bl set rate=mrate,blrate=mrate,gold=0,blgold=0,adddate='" . $utime . "'");
            echo "<script>alert('Ĭ�����ʻ�ԭ�ɹ�!'); window.location.href = 'main.php?action=rake_hy&uid={$uid}';</script>";
            exit;
        }
    }else{
        echo "<script>alert('�������������!'); window.location.href = 'main.php?action=rake_hy&uid={$uid}';</script>";
        exit;
    }
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>

<body>
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;��ԭ���ʣ�</span><span class="font_b">��ԭĬ������&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>  

<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <form name="form1" action="main.php?action=rake_hy&uid=<?=$uid?>&save=save" method=post>
    <tbody>
        <tr>
           <td colspan="2" class="t_list_caption"></td>
        </tr>
        <tr bgColor="#ffffff">
            <td height="30" align="right" class="t_edit_caption">���������˺�����</td>
            <td><input name="password" class="za_text" id="password" /></td>
        </tr>
        <tr bgColor="#ffffff">
            <td colspan="2" height="30" align="center" bgcolor="#FFFFFF">
                <button class="btn1" onClick="javascript:if(confirm('��ȷ��Ҫ��ԭ�𣿱��������޷��ָ���')){submit();}">
                   ��ԭ
                </button></td>
        </tr>
        </tbody>
        </form>
    </table>
</body>