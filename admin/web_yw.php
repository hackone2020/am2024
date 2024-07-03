<?php
header("Content-Type: text/html;charset=gb2312");
if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>你没有该权限功能!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    if (!empty($_POST['pass'])) {
        $pass = md5($_POST['pass']);
        $db1->query("update web_yw set pass='{$pass}' where id=1");
    }


    $db1->query("update web_yw set pannums='" . $_POST['pannums'] . "',mpannums='" . $_POST['mpannums'] . "',jsxs=" . $_POST['jsxs'] . ",ytyq=" . $_POST['ytyq'] . ",usermobi=" . $_POST['usermobi'] . ",usergg=" . $_POST['usergg'] . ",wbsd='" . $_POST['wbsd'] . "',zcld='" . $_POST['zcld'] . "',skin='" . $_POST['skin'] . "',maxonline='" . $_POST['maxonline'] . "',blday='" . $_POST['blday'] . "',gsgg='" . $_POST['gsgg'] . "' where id=1");

    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='系统管理',text2='运维设置',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script language='javascript'>alert('设置成功!');window.location.href='main.php?action=web_yw&uid=" . $uid . "';</script>";
    exit;
}
$result = $db1->query("select * from web_yw order by id LIMIT 1");
$row = $result->fetch_array();
?>

<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<style>
    .box5 {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        /* 每行有5个等宽列 */
        gap: 0px;
        /* 网格项之间的间隙 */
    }

    .box4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* 每行有4个等宽列 */
        gap: 0px;
        /* 网格项之间的间隙 */
    }
</style>

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">系统管理</span>&nbsp;<span class="font_b">运维管理</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"></div>
    </div>
    <table width="620" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="listTable">
        <form name='form1' action='main.php?action=web_yw&uid=<?= $uid ?>&save=save' method=post>
            <tbody>

                <tr>
                    <td height="25" align="center" colspan="2" nowrap="" class="t_list_caption">运维管理</td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">版本信息:&nbsp;</td>
                    <td bordercolor="cccccc" class="t_edit_td"><?= $row['systeminfo'] ?></td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">操作密码:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input type="password" name="pass" class="inp1" id="pass" value="" size="16" </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">结算信息显示:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="jsxs" class="za_select" id="jsxs">
                            <option value="0" <? if ($row['jsxs'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>显示</option>
                            <option value="1" <? if ($row['jsxs'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>不显示</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">一天一期:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="ytyq" class="za_select" id="ytyq">
                            <option value="0" <? if ($row['ytyq'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>开启</option>
                            <option value="1" <? if ($row['ytyq'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>停用</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">会员移动端是否显示:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="usermobi" class="za_select" id="usermobi">
                            <option value="0" <? if ($row['usermobi'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>显示</option>
                            <option value="1" <? if ($row['usermobi'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>不显示</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">会员公告是否显示:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="usergg" class="za_select" id="usergg">
                            <option value="0" <? if ($row['usergg'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>显示</option>
                            <option value="1" <? if ($row['usergg'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>不显示</option>
                        </select>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">盘口数量:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="pannums" class="za_select" id="pannums">
                            <option value="1" <? if ($row['pannums'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>A盘(1个)</option>
                            <option value="2" <? if ($row['pannums'] == 2) {
                                                    echo "selected=selected";
                                                } ?>>B盘(2个)</option>
                            <option value="3" <? if ($row['pannums'] == 3) {
                                                    echo "selected=selected";
                                                } ?>>C盘(3个)</option>
                            <option value="4" <? if ($row['pannums'] == 4) {
                                                    echo "selected=selected";
                                                } ?>>D盘(4个)</option>
                            <option value="5" <? if ($row['pannums'] == 5) {
                                                    echo "selected=selected";
                                                } ?>>E盘(5个)</option>
                            <option value="6" <? if ($row['pannums'] == 6) {
                                                    echo "selected=selected";
                                                } ?>>F盘(6个)</option>
                            <option value="7" <? if ($row['pannums'] == 7) {
                                                    echo "selected=selected";
                                                } ?>>G盘(7个)</option>
                            <option value="8" <? if ($row['pannums'] == 8) {
                                                    echo "selected=selected";
                                                } ?>>H盘(8个)</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">会员盘口数量:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="mpannums" class="za_select" id="mpannums">
                            <option value="0" <? if ($row['mpannums'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>多个</option>
                            <option value="1" <? if ($row['mpannums'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>单个</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">外补设定:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="wbsd" class="za_select" id="wbsd">
                            <option value="0" <? if ($row['wbsd'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>公司自由选择</option>
                            <option value="1" <? if ($row['wbsd'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>不显示</option>
                        </select>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">占成粒度:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="zcld" class="za_select" id="zcld">
                            <option value="0" <? if ($row['zcld'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>5%</option>
                            <option value="1" <? if ($row['zcld'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>10%</option>
                            <option value="2" <? if ($row['zcld'] == 2) {
                                                    echo "selected=selected";
                                                } ?>>15%</option>
                            <option value="3" <? if ($row['zcld'] == 3) {
                                                    echo "selected=selected";
                                                } ?>>20%</option>
                        </select>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">皮肤:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="skin" class="za_select" id="skin">
                            <option value="0" <? if ($row['skin'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>黄</option>
                            <option value="1" <? if ($row['skin'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>蓝</option>
                            <option value="1" <? if ($row['skin'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>绿</option>
                        </select>
                    </td>
                </Tr>

                <!--发送数据-->

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发数据用户名:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz1" class="inp1" id="tmzz" value="" size="30"> </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发数据密码:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz2" class="inp1" id="tmzz" value="" size="30"> </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发数据Url:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz3" class="inp1" id="tmzz" value="" size="50"> </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发数据Secret:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz4" class="inp1" id="tmzz" value="" size="50"> </td>
                </Tr>


                <!--发送数据 end-->


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发单是否拆分:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="sx49" class="za_select" id="sx49">
                            <option value="0">是</option>
                            <option value="1">否</option>
                        </select>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发虚货数据用户名:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz5" class="inp1" id="tmzz" value="" size="30"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发虚货数据密码:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz6" class="inp1" id="tmzz" value="" size="30"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发虚货数据Url:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz7" class="inp1" id="tmzz" value="" size="50"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">发虚货数据Secret:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz8" class="inp1" id="tmzz" value="" size="50"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">最大人数在线:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="maxonline" class="inp1" id="maxonline" value="<?= $row['maxonline'] ?>" size="8"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">数据至少保留天数:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="blday" class="inp1" id="blday" value="<?= $row['blday'] ?>" size="8" </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">公司公告:&nbsp;</td>
                    <td bordercolor="cccccc" class="t_edit_td"><textarea id="gsgg" name="gsgg" rows="6" cols="50"><?= $row['gsgg'] ?></textarea></td>
                </tr>



                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">历史开奖导入:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input type="file" name="uploadFile" id="uploadFile">
                    </td>
                </Tr>



                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">同步oc历史香港结果:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="同步香港">
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">同步oc历史澳门结果:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"><input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="同步澳门"></td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">同步oc历史澳门2结果:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"><input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="同步澳门2"></td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">同步oc历史台湾结果:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"><input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="同步台湾"></td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">同步oc历史柬埔寨结果:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"><input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="同步柬埔寨"></td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">导出退水赔率:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <button type="submit">导入</button>
                    </td>
                </Tr>
                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">导入退水赔率:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input type="file" name="uploadFile" id="uploadFile">
                        <button type="submit">导入</button>
                </Tr>



                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">玩法配置:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <div class="box5">

                            <div><input type="checkbox" name="options[]" value="option1">特码</div>
                            <div><input type="checkbox" name="options[]" value="option2">正码</div>
                            <div><input type="checkbox" name="options[]" value="option3">正特</div>
                            <div><input type="checkbox" name="options[]" value="option3">正码1-6</div>
                            <div><input type="checkbox" name="options[]" value="option3">过关</div>

                            <div><input type="checkbox" name="options[]" value="option1">半波</div>
                            <div><input type="checkbox" name="options[]" value="option2">五全中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四全中</div>
                            <div><input type="checkbox" name="options[]" value="option3">三全中</div>
                            <div><input type="checkbox" name="options[]" value="option3">三中二</div>

                            <div><input type="checkbox" name="options[]" value="option1">二全中</div>
                            <div><input type="checkbox" name="options[]" value="option2">二中特</div>
                            <div><input type="checkbox" name="options[]" value="option3">特串</div>
                            <div><input type="checkbox" name="options[]" value="option3">硬特</div>
                            <div><input type="checkbox" name="options[]" value="option3">一肖</div>

                            <div><input type="checkbox" name="options[]" value="option1">一肖不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">尾数</div>
                            <div><input type="checkbox" name="options[]" value="option3">尾数不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">特肖</div>
                            <div><input type="checkbox" name="options[]" value="option3">六肖</div>

                            <div><input type="checkbox" name="options[]" value="option1">二肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option2">二肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">三肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">二肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四肖连中</div>

                            <div><input type="checkbox" name="options[]" value="option1">四肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">五肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">五肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">二尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">二尾连不中</div>

                            <div><input type="checkbox" name="options[]" value="option1">三尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option2">三尾连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四尾连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">五不中</div>

                            <div><input type="checkbox" name="options[]" value="option1">六不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">七不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">八不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">九不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">十不中</div>

                            <div><input type="checkbox" name="options[]" value="option1">一粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option2">二粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option3">三粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option3">五粒任中</div>

                            <div><input type="checkbox" name="options[]" value="option1">生肖量</div>
                            <div><input type="checkbox" name="options[]" value="option2">尾数量</div>
                            <div><input type="checkbox" name="options[]" value="option3">五中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">六中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">七中一</div>

                            <div><input type="checkbox" name="options[]" value="option1">八中一</div>
                            <div><input type="checkbox" name="options[]" value="option2">九中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">十中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">十一不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">十二不中</div>
                            <div><input type="checkbox" onclick="selectAll" value="全选">全选</div>

                        </div>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">占位符配置:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <div class="box5">

                            <div><input type="checkbox" name="options[]" value="option1">特码</div>
                            <div><input type="checkbox" name="options[]" value="option2">正码</div>
                            <div><input type="checkbox" name="options[]" value="option3">正特</div>
                            <div><input type="checkbox" name="options[]" value="option3">正码1-6</div>
                            <div><input type="checkbox" name="options[]" value="option3">过关</div>

                            <div><input type="checkbox" name="options[]" value="option1">半波</div>
                            <div><input type="checkbox" name="options[]" value="option2">五全中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四全中</div>
                            <div><input type="checkbox" name="options[]" value="option3">三全中</div>
                            <div><input type="checkbox" name="options[]" value="option3">三中二</div>

                            <div><input type="checkbox" name="options[]" value="option1">二全中</div>
                            <div><input type="checkbox" name="options[]" value="option2">二中特</div>
                            <div><input type="checkbox" name="options[]" value="option3">特串</div>
                            <div><input type="checkbox" name="options[]" value="option3">硬特</div>
                            <div><input type="checkbox" name="options[]" value="option3">一肖</div>

                            <div><input type="checkbox" name="options[]" value="option1">一肖不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">尾数</div>
                            <div><input type="checkbox" name="options[]" value="option3">尾数不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">特肖</div>
                            <div><input type="checkbox" name="options[]" value="option3">六肖</div>

                            <div><input type="checkbox" name="options[]" value="option1">二肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option2">二肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">三肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">二肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四肖连中</div>

                            <div><input type="checkbox" name="options[]" value="option1">四肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">五肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">五肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">二尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">二尾连不中</div>

                            <div><input type="checkbox" name="options[]" value="option1">三尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option2">三尾连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四尾连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">五不中</div>

                            <div><input type="checkbox" name="options[]" value="option1">六不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">七不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">八不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">九不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">十不中</div>

                            <div><input type="checkbox" name="options[]" value="option1">一粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option2">二粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option3">三粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option3">四粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option3">五粒任中</div>

                            <div><input type="checkbox" name="options[]" value="option1">生肖量</div>
                            <div><input type="checkbox" name="options[]" value="option2">尾数量</div>
                            <div><input type="checkbox" name="options[]" value="option3">五中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">六中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">七中一</div>

                            <div><input type="checkbox" name="options[]" value="option1">八中一</div>
                            <div><input type="checkbox" name="options[]" value="option2">九中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">十中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">十一不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">十二不中</div>
                            <div><input type="checkbox" onclick="selectAll" value="全选">全选</div>

                        </div>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">同步公司退水:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <div class="box4">
                            <div><input type="checkbox" name="options[]" value="option1">特A</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                特B
                            </div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                特码单双</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                特码大小</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                特码合数单双</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                特码合数大小</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                特码尾大尾小</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                特码色波</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                特码半波</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                正A</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                正B</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                总分单双</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                总分大小</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                正特</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                正码1-6单双</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                正码1-6大小</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                正码1-6合数单双</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                正码1-6合数大小</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                正码1-6色波</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                过关</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                三全中</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                二中二</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                二中全</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                二中特</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                特串</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                一肖</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                特肖</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                六肖</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                尾数</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                二肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                三肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                四肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                五肖连中</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                二尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                三尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                四尾连中</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                五不中</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                六不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                七不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                八不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                九不中</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                十不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                一肖不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                尾数不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                四全中</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                硬特</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                五全中</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                二肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">


                                三肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                四肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                五肖连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                二尾连不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">


                                三尾连不中</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                四尾连不中</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                一粒任中</div>
                            <div> <input type="checkbox" name="options[]" value="option3">
                                二粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option3">


                                三粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                四粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                五粒任中</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                生肖量</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                尾数量</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                五中一</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                六中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                七中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">


                                八中一</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                九中一</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                十中一</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                十一不中</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                十二不中</div>
                                <div></div>
                                <div></div>
                                <div></div>
                            <div><input type="checkbox" onclick="selectAll" value="全选">全选</div>

                        </div>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">导出退水赔率:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <button type="submit">导入</button>
                    </td>
                </Tr>




                <tr bgcolor="#ffffff">
                    <td height="30" align="right">同步Uos代理数据:&nbsp;</td>

                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="同步Uos代理数据">
                    </td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td height="30" align="right">重置结算状态:&nbsp;</td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="ggwinsum2" class="inp1" id="ggwinsum2" value="" size="8" />
                        <input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="同步Uos代理数据">
                    </td>
                </tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right">
                        <font color="red">更新Uos订单数据: (需封盘)</font>&nbsp;
                    </td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="更新">
                    </td>
                </tr>
                <tr bgcolor="#ffffff">

                    <td height="30" align="right">设置期数为Max(id):&nbsp;</td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="ggwinsum" class="inp1" id="ggwinsum" value="" size="8" />
                    </td>
                </tr>

                <tr bgcolor="#ffffff">
                    <td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
                        <button class="btn2" type="submit">修改</button>
                        <button class="btn1" type="reset">重置</button>
                    </td>
                </tr>

            </tbody>
        </form>
    </table>
</body>