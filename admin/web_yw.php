<?php
header("Content-Type: text/html;charset=gb2312");
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "10")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
if ($_GET['save'] == "save") {
    if (!empty($_POST['pass'])) {
        $pass = md5($_POST['pass']);
        $db1->query("update web_yw set pass='{$pass}' where id=1");
    }


    $db1->query("update web_yw set pannums='" . $_POST['pannums'] . "',mpannums='" . $_POST['mpannums'] . "',jsxs=" . $_POST['jsxs'] . ",ytyq=" . $_POST['ytyq'] . ",usermobi=" . $_POST['usermobi'] . ",usergg=" . $_POST['usergg'] . ",wbsd='" . $_POST['wbsd'] . "',zcld='" . $_POST['zcld'] . "',skin='" . $_POST['skin'] . "',maxonline='" . $_POST['maxonline'] . "',blday='" . $_POST['blday'] . "',gsgg='" . $_POST['gsgg'] . "' where id=1");

    $sql = "INSERT INTO  web_user_log set adddate='" . $utime . "',adduser='" . $jxadmin . "',kauser='" . $jxadmin . "',lx=3,text1='ϵͳ����',text2='��ά����',ip='" . $userip . "'";
    $db1->query($sql);
    echo "<script language='javascript'>alert('���óɹ�!');window.location.href='main.php?action=web_yw&uid=" . $uid . "';</script>";
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
        /* ÿ����5���ȿ��� */
        gap: 0px;
        /* ������֮��ļ�϶ */
    }

    .box4 {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* ÿ����4���ȿ��� */
        gap: 0px;
        /* ������֮��ļ�϶ */
    }
</style>

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">ϵͳ����</span>&nbsp;<span class="font_b">��ά����</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"></div>
    </div>
    <table width="620" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="listTable">
        <form name='form1' action='main.php?action=web_yw&uid=<?= $uid ?>&save=save' method=post>
            <tbody>

                <tr>
                    <td height="25" align="center" colspan="2" nowrap="" class="t_list_caption">��ά����</td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�汾��Ϣ:&nbsp;</td>
                    <td bordercolor="cccccc" class="t_edit_td"><?= $row['systeminfo'] ?></td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">��������:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input type="password" name="pass" class="inp1" id="pass" value="" size="16" </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">������Ϣ��ʾ:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="jsxs" class="za_select" id="jsxs">
                            <option value="0" <? if ($row['jsxs'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>��ʾ</option>
                            <option value="1" <? if ($row['jsxs'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>����ʾ</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">һ��һ��:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="ytyq" class="za_select" id="ytyq">
                            <option value="0" <? if ($row['ytyq'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>����</option>
                            <option value="1" <? if ($row['ytyq'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>ͣ��</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">��Ա�ƶ����Ƿ���ʾ:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="usermobi" class="za_select" id="usermobi">
                            <option value="0" <? if ($row['usermobi'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>��ʾ</option>
                            <option value="1" <? if ($row['usermobi'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>����ʾ</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">��Ա�����Ƿ���ʾ:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="usergg" class="za_select" id="usergg">
                            <option value="0" <? if ($row['usergg'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>��ʾ</option>
                            <option value="1" <? if ($row['usergg'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>����ʾ</option>
                        </select>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�̿�����:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="pannums" class="za_select" id="pannums">
                            <option value="1" <? if ($row['pannums'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>A��(1��)</option>
                            <option value="2" <? if ($row['pannums'] == 2) {
                                                    echo "selected=selected";
                                                } ?>>B��(2��)</option>
                            <option value="3" <? if ($row['pannums'] == 3) {
                                                    echo "selected=selected";
                                                } ?>>C��(3��)</option>
                            <option value="4" <? if ($row['pannums'] == 4) {
                                                    echo "selected=selected";
                                                } ?>>D��(4��)</option>
                            <option value="5" <? if ($row['pannums'] == 5) {
                                                    echo "selected=selected";
                                                } ?>>E��(5��)</option>
                            <option value="6" <? if ($row['pannums'] == 6) {
                                                    echo "selected=selected";
                                                } ?>>F��(6��)</option>
                            <option value="7" <? if ($row['pannums'] == 7) {
                                                    echo "selected=selected";
                                                } ?>>G��(7��)</option>
                            <option value="8" <? if ($row['pannums'] == 8) {
                                                    echo "selected=selected";
                                                } ?>>H��(8��)</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">��Ա�̿�����:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="mpannums" class="za_select" id="mpannums">
                            <option value="0" <? if ($row['mpannums'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>���</option>
                            <option value="1" <? if ($row['mpannums'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>����</option>
                        </select>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�ⲹ�趨:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="wbsd" class="za_select" id="wbsd">
                            <option value="0" <? if ($row['wbsd'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>��˾����ѡ��</option>
                            <option value="1" <? if ($row['wbsd'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>����ʾ</option>
                        </select>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">ռ������:&nbsp;</Td>
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
                    <td height="30" align="right" class="t_edit_caption">Ƥ��:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="skin" class="za_select" id="skin">
                            <option value="0" <? if ($row['skin'] == 0) {
                                                    echo "selected=selected";
                                                } ?>>��</option>
                            <option value="1" <? if ($row['skin'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>��</option>
                            <option value="1" <? if ($row['skin'] == 1) {
                                                    echo "selected=selected";
                                                } ?>>��</option>
                        </select>
                    </td>
                </Tr>

                <!--��������-->

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�������û���:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz1" class="inp1" id="tmzz" value="" size="30"> </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">����������:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz2" class="inp1" id="tmzz" value="" size="30"> </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">������Url:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz3" class="inp1" id="tmzz" value="" size="50"> </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">������Secret:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz4" class="inp1" id="tmzz" value="" size="50"> </td>
                </Tr>


                <!--�������� end-->


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�����Ƿ���:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <select name="sx49" class="za_select" id="sx49">
                            <option value="0">��</option>
                            <option value="1">��</option>
                        </select>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">����������û���:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz5" class="inp1" id="tmzz" value="" size="30"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�������������:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz6" class="inp1" id="tmzz" value="" size="30"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">���������Url:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz7" class="inp1" id="tmzz" value="" size="50"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">���������Secret:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="tmzz8" class="inp1" id="tmzz" value="" size="50"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�����������:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="maxonline" class="inp1" id="maxonline" value="<?= $row['maxonline'] ?>" size="8"> </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�������ٱ�������:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"> <input name="blday" class="inp1" id="blday" value="<?= $row['blday'] ?>" size="8" </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">��˾����:&nbsp;</td>
                    <td bordercolor="cccccc" class="t_edit_td"><textarea id="gsgg" name="gsgg" rows="6" cols="50"><?= $row['gsgg'] ?></textarea></td>
                </tr>



                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">��ʷ��������:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input type="file" name="uploadFile" id="uploadFile">
                    </td>
                </Tr>



                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">ͬ��oc��ʷ��۽��:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="ͬ�����">
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">ͬ��oc��ʷ���Ž��:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"><input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="ͬ������"></td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">ͬ��oc��ʷ����2���:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"><input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="ͬ������2"></td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">ͬ��oc��ʷ̨����:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"><input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="ͬ��̨��"></td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">ͬ��oc��ʷ����կ���:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td"><input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="ͬ������կ"></td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">������ˮ����:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <button type="submit">����</button>
                    </td>
                </Tr>
                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">������ˮ����:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input type="file" name="uploadFile" id="uploadFile">
                        <button type="submit">����</button>
                </Tr>



                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">�淨����:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <div class="box5">

                            <div><input type="checkbox" name="options[]" value="option1">����</div>
                            <div><input type="checkbox" name="options[]" value="option2">����</div>
                            <div><input type="checkbox" name="options[]" value="option3">����</div>
                            <div><input type="checkbox" name="options[]" value="option3">����1-6</div>
                            <div><input type="checkbox" name="options[]" value="option3">����</div>

                            <div><input type="checkbox" name="options[]" value="option1">�벨</div>
                            <div><input type="checkbox" name="options[]" value="option2">��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">���ж�</div>

                            <div><input type="checkbox" name="options[]" value="option1">��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option2">������</div>
                            <div><input type="checkbox" name="options[]" value="option3">�ش�</div>
                            <div><input type="checkbox" name="options[]" value="option3">Ӳ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">һФ</div>

                            <div><input type="checkbox" name="options[]" value="option1">һФ����</div>
                            <div><input type="checkbox" name="options[]" value="option2">β��</div>
                            <div><input type="checkbox" name="options[]" value="option3">β������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф</div>

                            <div><input type="checkbox" name="options[]" value="option1">��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option2">��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф����</div>

                            <div><input type="checkbox" name="options[]" value="option1">��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option2">��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��β����</div>
                            <div><input type="checkbox" name="options[]" value="option3">��β������</div>

                            <div><input type="checkbox" name="options[]" value="option1">��β����</div>
                            <div><input type="checkbox" name="options[]" value="option2">��β������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��β����</div>
                            <div><input type="checkbox" name="options[]" value="option3">��β������</div>
                            <div><input type="checkbox" name="options[]" value="option3">�岻��</div>

                            <div><input type="checkbox" name="options[]" value="option1">������</div>
                            <div><input type="checkbox" name="options[]" value="option2">�߲���</div>
                            <div><input type="checkbox" name="options[]" value="option3">�˲���</div>
                            <div><input type="checkbox" name="options[]" value="option3">�Ų���</div>
                            <div><input type="checkbox" name="options[]" value="option3">ʮ����</div>

                            <div><input type="checkbox" name="options[]" value="option1">һ������</div>
                            <div><input type="checkbox" name="options[]" value="option2">��������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��������</div>

                            <div><input type="checkbox" name="options[]" value="option1">��Ф��</div>
                            <div><input type="checkbox" name="options[]" value="option2">β����</div>
                            <div><input type="checkbox" name="options[]" value="option3">����һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">����һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">����һ</div>

                            <div><input type="checkbox" name="options[]" value="option1">����һ</div>
                            <div><input type="checkbox" name="options[]" value="option2">����һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">ʮ��һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">ʮһ����</div>
                            <div><input type="checkbox" name="options[]" value="option3">ʮ������</div>
                            <div><input type="checkbox" onclick="selectAll" value="ȫѡ">ȫѡ</div>

                        </div>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">ռλ������:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <div class="box5">

                            <div><input type="checkbox" name="options[]" value="option1">����</div>
                            <div><input type="checkbox" name="options[]" value="option2">����</div>
                            <div><input type="checkbox" name="options[]" value="option3">����</div>
                            <div><input type="checkbox" name="options[]" value="option3">����1-6</div>
                            <div><input type="checkbox" name="options[]" value="option3">����</div>

                            <div><input type="checkbox" name="options[]" value="option1">�벨</div>
                            <div><input type="checkbox" name="options[]" value="option2">��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">���ж�</div>

                            <div><input type="checkbox" name="options[]" value="option1">��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option2">������</div>
                            <div><input type="checkbox" name="options[]" value="option3">�ش�</div>
                            <div><input type="checkbox" name="options[]" value="option3">Ӳ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">һФ</div>

                            <div><input type="checkbox" name="options[]" value="option1">һФ����</div>
                            <div><input type="checkbox" name="options[]" value="option2">β��</div>
                            <div><input type="checkbox" name="options[]" value="option3">β������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф</div>

                            <div><input type="checkbox" name="options[]" value="option1">��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option2">��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф����</div>

                            <div><input type="checkbox" name="options[]" value="option1">��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option2">��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option3">��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��β����</div>
                            <div><input type="checkbox" name="options[]" value="option3">��β������</div>

                            <div><input type="checkbox" name="options[]" value="option1">��β����</div>
                            <div><input type="checkbox" name="options[]" value="option2">��β������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��β����</div>
                            <div><input type="checkbox" name="options[]" value="option3">��β������</div>
                            <div><input type="checkbox" name="options[]" value="option3">�岻��</div>

                            <div><input type="checkbox" name="options[]" value="option1">������</div>
                            <div><input type="checkbox" name="options[]" value="option2">�߲���</div>
                            <div><input type="checkbox" name="options[]" value="option3">�˲���</div>
                            <div><input type="checkbox" name="options[]" value="option3">�Ų���</div>
                            <div><input type="checkbox" name="options[]" value="option3">ʮ����</div>

                            <div><input type="checkbox" name="options[]" value="option1">һ������</div>
                            <div><input type="checkbox" name="options[]" value="option2">��������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��������</div>
                            <div><input type="checkbox" name="options[]" value="option3">��������</div>

                            <div><input type="checkbox" name="options[]" value="option1">��Ф��</div>
                            <div><input type="checkbox" name="options[]" value="option2">β����</div>
                            <div><input type="checkbox" name="options[]" value="option3">����һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">����һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">����һ</div>

                            <div><input type="checkbox" name="options[]" value="option1">����һ</div>
                            <div><input type="checkbox" name="options[]" value="option2">����һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">ʮ��һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">ʮһ����</div>
                            <div><input type="checkbox" name="options[]" value="option3">ʮ������</div>
                            <div><input type="checkbox" onclick="selectAll" value="ȫѡ">ȫѡ</div>

                        </div>
                    </td>
                </Tr>


                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">ͬ����˾��ˮ:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <div class="box4">
                            <div><input type="checkbox" name="options[]" value="option1">��A</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ��B
                            </div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ���뵥˫</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                �����С</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                ���������˫</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ���������С</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ����β��βС</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ����ɫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                ����벨</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ��A</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ��B</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                �ֵܷ�˫</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                �ִܷ�С</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ����</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ����1-6��˫</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ����1-6��С</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                ����1-6������˫</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ����1-6������С</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ����1-6ɫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ����</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                ��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ���ж�</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ����ȫ</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ������</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                �ش�</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                һФ</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ��Ф</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ��Ф</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                β��</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                ��Ф����</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ��β����</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ��β����</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ��β����</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                �岻��</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ������</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                �߲���</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                �˲���</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                �Ų���</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ʮ����</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                һФ����</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                β������</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                ��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                Ӳ��</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ��ȫ��</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option3">


                                ��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ��Ф������</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ��β������</div>
                            <div><input type="checkbox" name="options[]" value="option3">


                                ��β������</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ��β������</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                һ������</div>
                            <div> <input type="checkbox" name="options[]" value="option3">
                                ��������</div>
                            <div><input type="checkbox" name="options[]" value="option3">


                                ��������</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ��������</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ��������</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ��Ф��</div>
                            <div><input type="checkbox" name="options[]" value="option3">

                                β����</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ����һ</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ����һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ����һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">


                                ����һ</div>
                            <div><input type="checkbox" name="options[]" value="option1">
                                ����һ</div>
                            <div><input type="checkbox" name="options[]" value="option2">
                                ʮ��һ</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ʮһ����</div>
                            <div><input type="checkbox" name="options[]" value="option3">
                                ʮ������</div>
                                <div></div>
                                <div></div>
                                <div></div>
                            <div><input type="checkbox" onclick="selectAll" value="ȫѡ">ȫѡ</div>

                        </div>
                    </td>
                </Tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right" class="t_edit_caption">������ˮ����:&nbsp;</Td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <button type="submit">����</button>
                    </td>
                </Tr>




                <tr bgcolor="#ffffff">
                    <td height="30" align="right">ͬ��Uos��������:&nbsp;</td>

                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="ͬ��Uos��������">
                    </td>
                </tr>
                <tr bgcolor="#ffffff">
                    <td height="30" align="right">���ý���״̬:&nbsp;</td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="ggwinsum2" class="inp1" id="ggwinsum2" value="" size="8" />
                        <input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="ͬ��Uos��������">
                    </td>
                </tr>

                <tr bgcolor="#ffffff">
                    <td height="30" align="right">
                        <font color="red">����Uos��������: (�����)</font>&nbsp;
                    </td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="btn1" id="btn1" type="submit" class="btn" onmouseover="this.className='btn'" onmouseout="this.className='btn'" value="����">
                    </td>
                </tr>
                <tr bgcolor="#ffffff">

                    <td height="30" align="right">��������ΪMax(id):&nbsp;</td>
                    <td bordercolor="cccccc" class="t_edit_td">
                        <input name="ggwinsum" class="inp1" id="ggwinsum" value="" size="8" />
                    </td>
                </tr>

                <tr bgcolor="#ffffff">
                    <td height="25" colspan="2" align="center" bgcolor="#FFFFFF">
                        <button class="btn2" type="submit">�޸�</button>
                        <button class="btn1" type="reset">����</button>
                    </td>
                </tr>

            </tbody>
        </form>
    </table>
</body>