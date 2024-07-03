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
    $rid = $_POST['drop_id'];
    $drop_name = $_POST['drop_name'];
    $rate = $_POST['rate'];
    $ratedrop = $_POST['ratedrop'];
    $low_drop = $_POST['low_drop'];
    $I = 0;
    for (; $I <= count($rid) - 1; $I += 1) {
        if (is_numeric($rate[$I]) != 1 || $rate[$I] < 0) {
            echo "<script>alert('" . $drop_name[$I] . "的数值填写有误，请输入数字1!');window.history.go(-1);</script>";
            exit;
        }
        if (!is_numeric($ratedrop[$I]) || $ratedrop[$I] < 0) {
            echo "<script>alert('" . $drop_name[$I] . "的下调赔率填写有误，请输入数字2！');window.history.go(-1);</script>";
            exit;
        }
        if (!is_numeric($low_drop[$I]) || $low_drop[$I] < 0) {
            echo "<script>alert('" . $drop_name[$I] . "的最低赔率填写有误，请输入数字3！');window.history.go(-1);</script>";
            exit;
        }
    }
    $I = 0;
    for (; $I <= count($rid); $I += 1) {
        $temename = "lock_drop_" . $rid[$I];
        if (isset($_POST[$temename])) {
            $lock_drop = 0;
        } else {
            $lock_drop = 1;
        }
        $db1->query("Update web_config_ds Set drop_value=" . $rate[$I] . ",drop_unit=" . $ratedrop[$I] . ",low_drop=" . $low_drop[$I] . ",lock_drop=" . $lock_drop . " where ID=" . $rid[$I]);
    }
    echo "<script>alert('设置成功!');window.location.href='main.php?action=rake_drop&uid={$uid}';</script>";
    exit;
}
$result = $db1->query("select id,ds_lb,ds,drop_value,drop_unit,low_drop,lock_drop from web_config_ds where drop_value>0 order by ID");
$drop_table = array();
$y = 0;
while ($image = $result->fetch_array()) {
    ++$y;
    array_push($drop_table, $image);
}
$drop_count = $y - 1;
?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<script src="js/function.js" type="text/javascript"></script>
<body>
<div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">系统管理－</span><span class="font_b">自动降水设置&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
                <? if ($dssum == 0) {?>
                <font color="#fff">当前自动降水规则为:按下注总额(各级走飞注单不计入)</font>
                <? } else {?>
                <font color="#fff">当前自动降水规则为:按公司占成(各级走飞注单不计入)</font>
                <?}?>
      </div>
</div>  
<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <form name=form1 action="main.php?action=rake_drop&uid=<?=$uid?>&save=save" method=post>
            <tbody>
                <tr>
                    <td align="center" nowrap="" class="t_list_caption">玩法名称</td>
                    <td align="center" nowrap="" class="t_list_caption"><font class="font_r">自动降赔率的数值</font></td>
                    <td align="center" nowrap="" class="t_list_caption"><font class="font_g">每次下调赔率的值</font></td>
                    <td align="center" nowrap="" class="t_list_caption"><font class="font_g">最低赔率</font></td>
                    <td align="center" nowrap="" class="t_list_caption"><font class="font_b">开启/关闭自动降水</font></td>
                </tr>
                <? $I = 0;
for (; $I <= $drop_count; $I += 1) {?>
                <tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#fffff2'" onMouseOut="javascript:this.bgColor='#ffffff'">
                   <td height="30" align="center" class="t_edit_caption"><?=$drop_table[$I][2]?>:
                    </td>
                     <td align="center"><input type="hidden" name="drop_name[]" value='<?=$drop_table[$I][2]?>' />
                        <input type="hidden" name="drop_id[]" value='<?=$drop_table[$I][0]?>' />
                        <input name="rate[]" class="za_text" value='<?=$drop_table[$I][3]?>' size="10" />
                    </td>
                    <td align="center"><input name="ratedrop[]" class="za_text" value='<?=$drop_table[$I][4]?>' size="10" /></td>
                    <td align="center"><input name="low_drop[]" class="za_text" value='<?=$drop_table[$I][5]?>' size="10" /></td>
                    <td align="center"><input name='lock_drop_<?=$drop_table[$I][0]?>' type='checkbox' value='<?=$drop_table[$I][6]?>' 
    <? if ($drop_table[$I][6] == "0") {?>
                        checked="checked"
                        <?}?>
                        >
                    </td>
                </tr>
                <?}?>
                <tr>
                    <td colspan="5" align="center" bgcolor="#FFFFFF" >
                        <button class="btn1" onClick="submit()" ;>修改</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>