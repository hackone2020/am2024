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
?>

<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">ϵͳ����</span><span class="font_b">&nbsp;������</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"></div>
    </div>


    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" class="t_list">
        <tbody>
            <tr>
                <td width="22%" align="center" nowrap="" class="t_list_caption">����</td>
                <td width="22%" height="23" align="center" nowrap="" class="t_list_caption">����ʱ��</td>
                <td width="12%" align="center" nowrap="" class="t_list_caption">������</td>
                <td width="12%" align="center" nowrap="" class="t_list_caption">�����</td>
                <td width="17%" align="center" nowrap="" class="t_list_caption">��ϸ</td>
            </tr>
            <?
            $pagesize = 10;
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $result = $db1->query("select count(*) from web_kithe where na<>0 order by id desc");
            $pagenum = $result->fetch_array();
            $num = $pagenum[0];
            $total = $num;
            $pagecount = ceil($total / $pagesize);
            if ($pagecount < $page) {
                $page = $pagecount;
            }
            if ($page <= 0) {
                $page = 1;
            }
            $offset = ($page - 1) * $pagesize;
            $pre = $page - 1;
            $next = $page + 1;
            $first = 1;
            $last = $pagecount;
            $result = $db1->query("select * from web_kithe where na<>0 order by id desc limit " . $offset . "," . $pagesize);
            while ($image = $result->fetch_array()) {
            ?>
                <tr bgcolor="#ffffff" onmouseover="javascript:this.bgColor='&#39;#FFFFA2&#39;'" onmouseout="javascript:this.bgColor='&#39;#ffffff&#39;'">
                    <td align="center" nowrap="nowrap"><?= $image['nn'] ?></td>
                    <td height="30" align="center" nowrap="nowrap"><?= $image['nd'] ?></td>
                    <td align="center" nowrap="nowrap">ϵͳ</td>
                    <td align="center" nowrap="nowrap" class="font_g">����</td>
                    <td align="center" nowrap="nowrap">�������log:<br>��<br>���ĵ����md5: <?= md5("1") ?> -
                        ��ȷ</td>
                </tr>

            <?
            }
            ?>

            <tr bgcolor="#FFFFFF">
                <td colspan="5" height="26" align="center">
                    ��ǰΪ��<?= $page ?>ҳ&nbsp;��<?= $pagecount ?>ҳ&nbsp;��<?= $total ?>��¼
                    <a href="main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page=1">��ҳ</a>
                    <a href="main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page=<?= $pre ?>">��һҳ</a>
                    <a href="main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page=<?= $next ?>">��һҳ</a>
                    <a href="main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page=<?= $last ?>">ĩҳ</a>
                    <select name="page2" onChange="location.href='main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page='+this.options[selectedIndex].value">
                        <?
                        $i = 1;
                        for (; $i <= $pagecount; ++$i) {
                        ?><option value="<?= $i ?>" <? if ($page == $i) {
                                echo "selected";
                            } ?>>��<?= $i ?>ҳ</option>
                        <? } ?>
                    </select>&nbsp;
                </td>
            </tr>

        </tbody>
    </table>
</body>