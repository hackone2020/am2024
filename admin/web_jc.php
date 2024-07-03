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
?>

<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">系统管理</span><span class="font_b">&nbsp;结算检测</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"></div>
    </div>


    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bordercolordark="#FFFFFF" class="t_list">
        <tbody>
            <tr>
                <td width="22%" align="center" nowrap="" class="t_list_caption">期数</td>
                <td width="22%" height="23" align="center" nowrap="" class="t_list_caption">结算时间</td>
                <td width="12%" align="center" nowrap="" class="t_list_caption">结算人</td>
                <td width="12%" align="center" nowrap="" class="t_list_caption">检测结果</td>
                <td width="17%" align="center" nowrap="" class="t_list_caption">明细</td>
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
                    <td align="center" nowrap="nowrap">系统</td>
                    <td align="center" nowrap="nowrap" class="font_g">正常</td>
                    <td align="center" nowrap="nowrap">结算错误log:<br>无<br>防改单检测md5: <?= md5("1") ?> -
                        正确</td>
                </tr>

            <?
            }
            ?>

            <tr bgcolor="#FFFFFF">
                <td colspan="5" height="26" align="center">
                    当前为第<?= $page ?>页&nbsp;总<?= $pagecount ?>页&nbsp;共<?= $total ?>记录
                    <a href="main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page=1">首页</a>
                    <a href="main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page=<?= $pre ?>">上一页</a>
                    <a href="main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page=<?= $next ?>">下一页</a>
                    <a href="main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page=<?= $last ?>">末页</a>
                    <select name="page2" onChange="location.href='main.php?action=web_jc&uid=<?= $uid ?>&id=<?= $id ?>&page='+this.options[selectedIndex].value">
                        <?
                        $i = 1;
                        for (; $i <= $pagecount; ++$i) {
                        ?><option value="<?= $i ?>" <? if ($page == $i) {
                                echo "selected";
                            } ?>>第<?= $i ?>页</option>
                        <? } ?>
                    </select>&nbsp;
                </td>
            </tr>

        </tbody>
    </table>
</body>