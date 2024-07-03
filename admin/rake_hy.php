<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "02")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    
    if(!empty($_POST['password'])){
        $pass = md5($_POST['password']);
        $sql = "select * from web_yw where pass='$pass' LIMIT 1";
        $result = $db1->query($sql) or die(mysql_error());
        $count =$result->num_rows;
        if ($count == 0) {
            echo "<script>alert('您输入的操作密码错误，请重新输入!');window.location.href = 'main.php?action=rake_hy&uid={$uid}';</script>";
            exit;
        }else{
            $db1->query("update web_bl set rate=mrate,blrate=mrate,gold=0,blgold=0,adddate='" . $utime . "'");
            echo "<script>alert('默认赔率还原成功!'); window.location.href = 'main.php?action=rake_hy&uid={$uid}';</script>";
            exit;
        }
    }else{
        echo "<script>alert('请输入操作密码!'); window.location.href = 'main.php?action=rake_hy&uid={$uid}';</script>";
        exit;
    }
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>

<body>
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;还原赔率－</span><span class="font_b">还原默认赔率&nbsp;</span></div>
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
            <td height="30" align="right" class="t_edit_caption">输入您的账号密码</td>
            <td><input name="password" class="za_text" id="password" /></td>
        </tr>
        <tr bgColor="#ffffff">
            <td colspan="2" height="30" align="center" bgcolor="#FFFFFF">
                <button class="btn1" onClick="javascript:if(confirm('您确定要还原吗？本操作将无法恢复！')){submit();}">
                   还原
                </button></td>
        </tr>
        </tbody>
        </form>
    </table>
</body>