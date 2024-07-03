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
    $rid = $_POST['drop_id'];
    $drop_name = $_POST['drop_name'];
    $rake_sj = $_POST['rake_sj'];
    $I = 0;
    for (; $I <= count($rid) - 1; $I += 1) {
        if (is_numeric($rake_sj[$I]) != 1 || $rake_sj[$I] < 0) {
            echo "<script>alert('" . $drop_name[$I] . "的数值填写有误，请输入数字1!');window.history.go(-1);</script>";
            exit;
        }
    }
    $I = 0;
    for (; $I < count($rid); $I += 1) {
        $db1->query("Update web_config_ds Set rake_sj=" . round($rake_sj[$I], 3) . " where ID=" . $rid[$I]);
    }
    echo "<script>alert('设置成功!');window.location.href='main.php?action=rake_sj&uid={$uid}';</script>";
    exit;
}
$result = $db1->query("select id,ds_lb,ds,rake_sj from web_config_ds  order by ID");
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
      <div class="tit_center floatleft font_bold"><span class="font_g">&nbsp;系统管理－</span><span class="font_b">升降值设置&nbsp;</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright"></div>
</div>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
    <form name=form1 action="main.php?action=rake_sj&uid=<?=$uid?>&save=save" method=post>
    <tbody>
        <tr>
            <Td align="center" colspan="2" nowrap="" class="t_list_caption">升降值设置</Td>
        </tr>
        <tr>
        <td height="20" align="center" class="t_list_tr_3">玩法名称</td>
        <td align="center" class="t_list_tr_3">每次按<img src="images/bvbv_01.gif" width="19"
                        height="17" border="0">和<img src="images/bvbv_02.gif" width="19" height="17"
                        border="0">调整赔率升降的数值</td>
            </tr>
            <? $I = 0;
for (; $I <= $drop_count; $I += 1) {?>
            <tr bgColor="#ffffff" onMouseOver="javascript:this.bgColor='#eef5fc'"
                onMouseOut="javascript:this.bgColor='#ffffff'">
                <td height="30" align="right"><?=$drop_table[$I][2]?>:&nbsp;
                </td>
                <td align="center" class="t_edit_td">
                    <input type="hidden" name="drop_name[]" value='<?=$drop_table[$I][2]?>' />
                    <input type="hidden" name="drop_id[]" value='<?=$drop_table[$I][0]?>' />
                    <input name="rake_sj[]" class="za_text" value='<?=$drop_table[$I][3]?>' size="10" />
                </td>
            </tr>
            <? }?>
            <tr>
                <td colspan="2" align="center" bgcolor="#FFFFFF">
                    <input type="submit" name="button" id="button" value="修改">
                </td>
            </tr>
            </tbody>
        </form>
        </table>


</body>