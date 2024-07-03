<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    $ygid = $_POST['ygid'];
    $yg = $_POST['yg'];
    $ygb = $_POST['ygb'];
    $ygc = $_POST['ygc'];
    $ygd = $_POST['ygd'];
    $yge = $_POST['yge'];
    $ygf = $_POST['ygf'];
    $ygg = $_POST['ygg'];
    $ygh = $_POST['ygh'];
    $xx = $_POST['mm'];
    $xxx = $_POST['mmm'];
    $blcb = $_POST['blcb'];
    $blcc = $_POST['blcc'];
    $blcd = $_POST['blcd'];
    $blcb = $_POST['blce'];
    $blcc = $_POST['blcf'];
    $blcd = $_POST['blcg'];
    $blcb = $_POST['blch'];
    $I = 0;
    for (; $I < count($ygid); $I += 1) {
        $db1->query("Update web_config_ds Set yg='" . $yg[$I] . "',ygb='" . $ygb[$I] . "',ygc='" . $ygc[$I] . "',ygd='" . $ygd[$I] . "',yge='" . $yge[$I] . "',ygf='" . $ygf[$I] . "',ygg='" . $ygg[$I] . "',ygh='" . $ygh[$I] . "',xx='" . $xx[$I] . "',xxx='" . $xxx[$I] . "',blcb='" . $blcb[$I] . "',blcc='" . $blcc[$I] . "',blcd='" . $blcd[$I] . "',blce='" . $blce[$I] . "',blcf='" . $blcf[$I] . "',blcg='" . $blcg[$I] . "',blch='" . $blch[$I] . "' where ID=" . $ygid[$I]);
        $db1->query("Update web_user_ds Set yg='{$yg[$I]}' WHERE ds_id='{$ygid[$I]}' AND yg>'{$yg[$I]}'");
        $db1->query("Update web_user_ds Set ygb='{$ygb[$I]}' WHERE ds_id='{$ygid[$I]}' AND ygb>'{$ygb[$I]}'");
        $db1->query("Update web_user_ds Set ygc='{$ygc[$I]}' WHERE ds_id='{$ygid[$I]}' AND ygc>'{$ygc[$I]}'");
        $db1->query("Update web_user_ds Set ygd='{$ygd[$I]}' WHERE ds_id='{$ygid[$I]}' AND ygd>'{$ygd[$I]}'");
        $db1->query("Update web_user_ds Set yge='{$yge[$I]}' WHERE ds_id='{$ygid[$I]}' AND yg>'{$yge[$I]}'");
        $db1->query("Update web_user_ds Set ygf='{$ygf[$I]}' WHERE ds_id='{$ygid[$I]}' AND ygb>'{$ygf[$I]}'");
        $db1->query("Update web_user_ds Set ygg='{$ygg[$I]}' WHERE ds_id='{$ygid[$I]}' AND ygc>'{$ygg[$I]}'");
        $db1->query("Update web_user_ds Set ygh='{$ygh[$I]}' WHERE ds_id='{$ygid[$I]}' AND ygd>'{$ygh[$I]}'");
        $db1->query("Update web_user_ds Set xx='{$xx[$I]}' WHERE ds_id='{$ygid[$I]}' AND xx>'{$xx[$I]}'");
        $db1->query("Update web_user_ds Set xxx='{$xxx[$I]}' WHERE ds_id='{$ygid[$I]}' AND xxx>'{$xxx[$I]}'");
    }
    $db1->query("Update web_config Set config_ds_update='" . $utime . "' where ID=1");
    echo "<script language='javascript'>alert('设置成功！'); window.location.href = 'main.php?action=web_ds&uid={$uid}';</script>";
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;系统管理－</span><span class="font_b">默认退水、限额、赔率差 &nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
          <input name="button" type="button" class="za_button" onClick="javascript:location.reload();" value="更新" />
      </div>
</div> 

    <table width="900" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <form name="form1" action="main.php?action=web_ds&uid=<?=$uid?>&save=save" method=post>
        <tbody>
            <tr>
                <td align="center" nowrap="" class="t_list_caption" width="100">类型 </td>
                <td align="center" nowrap="" class="t_list_caption" width="50"><font class="font_r">A盘退水</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">B盘退水</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">C盘退水</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">D盘退水</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">E盘退水</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">F盘退水</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">G盘退水</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">H盘退水</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">单注限额</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_r">单项(号)限额</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_g">B盘赔率差</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_g">C盘赔率差</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_g">D盘赔率差</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_g">E盘赔率差</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_g">F盘赔率差</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_g">G盘赔率差</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_g">H盘赔率差</font></td>
                <td align="center" nowrap="" class="t_list_caption"><font class="font_g">赔率预览</font></td>
            </tr>
            <?$t = 0;
$result = $db1->query("select * from  web_config_ds where lx=0 order by id");
while ($rst = $result->fetch_array()) {
    ++$t;?>
            <tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#eef5fc'"
                onMouseOut="javascript:this.bgColor='#ffffff'">

                <td height="30" align="right" class="t_edit_caption">
                    <?=$rst['ds']?>
                    <input name="ds[]" type="hidden" id="ds[]" value="<?=$rst['ds']?>" />
                    <input name="ygid[]" type="hidden" id="ygid[]" value="<?=$rst['id']?>" />
                    </td>
                <td align="center"><input name="yg[]" class="za_text" id="yg[]" value='<?=$rst['yg']?>' size="10" /></td>

                <td align="center"><input name="ygb[]" class="za_text" id="ygb[]" value='<?=$rst['ygb']?>' size="10" /></td>

                <td align="center"><input name="ygc[]" class="za_text" id="ygc[]" value='<?=$rst['ygc']?>' size="10" /></td>

                <td align="center"><input name="ygd[]" class="za_text" id="ygd[]" value='<?=$rst['ygd']?>' size="10" /></td>
                
                <td align="center"><input name="yge[]" class="za_text" id="yge[]" value='<?=$rst['yge']?>' size="10" /></td>

                <td align="center"><input name="ygf[]" class="za_text" id="ygf[]" value='<?=$rst['ygf']?>' size="10" /></td>

                <td align="center"><input name="ygg[]" class="za_text" id="ygg[]" value='<?=$rst['ygg']?>' size="10" /></td>

                <td align="center"><input name="ygh[]" class="za_text" id="ygh[]" value='<?=$rst['ygh']?>' size="10" /></td>

                <td align="center"><input name="mm[]" class="za_text" id="mm[]" value='<?=$rst['xx']?>' size="10" /></td>

                <td align="center"><input name="mmm[]" class="za_text" id="mmm[]" value='<?=$rst['xxx']?>' size="10" /></td>
                
                <td align="center"><input name="blcb[]" class="za_text" id="blcb[]" value='<?=$rst['blcb']?>' size="10"/></td>
                
                <td align="center"><input name="blcc[]" class="za_text" id="blcc[]" value='<?=$rst['blcc']?>' size="10"/></td>
                
                <td align="center"><input name="blcd[]" class="za_text" id="blcd[]" value='<?=$rst['blcd']?>' size="10" /></td>
                
                <td align="center"><input name="blce[]" class="za_text" id="blce[]" value='<?=$rst['blce']?>' size="10"/></td>
                
                <td align="center"><input name="blcf[]" class="za_text" id="blcf[]" value='<?=$rst['blcf']?>' size="10"/></td>
                
                <td align="center"><input name="blcg[]" class="za_text" id="blcg[]" value='<?=$rst['blcg']?>' size="10" /></td>
                
                <td align="center"><input name="blch[]" class="za_text" id="blch[]" value='<?=$rst['blch']?>' size="10"/></td>
                
                <td align="center"><a href="javascript:;">预览</a></td>
            </tr>
            <?}?>

            <tr>
                <td height="20" colspan="19" align="center" bgcolor="#FFFFFF">
                    <button class="btn1" onClick="submit()">修改</button>
                </td>
            </tr>
            </tbody>    
        </form>
    </table>
</body>