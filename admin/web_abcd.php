<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    $dsid = $_POST['dsid'];
    $blcb = $_POST['blcb'];
    $blcc = $_POST['blcc'];
    $blcd = $_POST['blcd'];
    $I = 0;
    for (; $I < count($dsid); $I += 1) {
       $db1->query("Update web_config_ds Set blcb='" . $blcb[$I] . "',blcc='" . $blcc[$I] . "',blcd='" . $blcd[$I] . "' where ID=" . $dsid[$I]);
    }
   $db1->query("Update web_config Set config_ds_update='" . $utime . "' where ID=1");
    echo "<script language='javascript'>alert('���óɹ���');window.location.href='main.php?action=web_abcd&uid={$uid}';</script>";
    exit;
}?>


<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;ϵͳ����</span><span class="font_b">ABCD�����ʲ�����&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>  
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
<form name=form1 action=main.php?action=web_abcd&uid=<?=$uid?>&save=save method=post> 
  <tbody>
      <tr>
          <td class="t_list_tr_3" colspan="4" align="center">��A��Ϊ��׼��A�����ʸ�1���ã�1������A�����ʵ�1���ã�-1��</td>
      </tr>
      <tr>
                <td class="t_list_caption">����</td>
                <td class="t_list_caption">B�����ʲ�</span>
                </td>
                <td class="t_list_caption">C�����ʲ�</span>
                </td>
                <td class="t_list_caption">D�����ʲ�</span>
                </td>
            </tr> 

            <?
            $t = 0;
$result =$db1->query("select id,ds_lb,ds,blcb,blcc,blcd  from  web_config_ds order by id");
while ($rst = $result->fetch_array()) {
            ++$t;?>
            <tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#FFFFA2'"
                onMouseOut="javascript:this.bgColor='#ffffff'">
                <td height="30" align="right">
                    <?=$rst['ds']?>
                    <input name="ds[]" type="hidden" id="ds[]" value="<?=$rst['ds']?>" />
                    <input name="dsid[]" type="hidden" id="dsid[]" value="<?=$rst['id']?>" />
                </td>
                <td align="center"><input name="blcb[]" class="za_text" id="blcb[]" value='<?=$rst['blcb']?>' size="10"
                    /></td>
                <td align="center"><input name="blcc[]" class="za_text" id="blcc[]" value='<?=$rst['blcc']?>' size="10"
                    /></td>

                <td align="center"><input name="blcd[]" class="za_text" id="blcd[]" value='
    <?=$rst['blcd']?>' size="10" /></td>
            </tr>
            <?}?>
            <tr>
                <td height="20" colspan="4" align="center" bgColor="#ffffff"><label>
                        <input type="submit" class="btn1" name="button" id="button" value="�޸�"></label></td>
            </tr>
        </form>
    </table>
</body>