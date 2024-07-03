<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$username = $_GET['username'];
if ($username != "") {
    $vvv = " where lx=2 and (adduser='" . $username . "' or kauser='" . $username . "') ";
} else {
    exit;
}?>
<link rel="stylesheet" href="css/control_main.css" type="text/css">

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" vlink="#0000FF" alink="#0000FF">

    <table width="720" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="m_tline" width="832">&nbsp;用户日志－<font color="#CC0000">
                    <?=$username?>日志
                </font>&nbsp;&nbsp;&nbsp;

                <input name="button" type="button" class="za_button" onClick="javascript:location.reload();"
                    value="更新" />
            </td>

            <td width="43"><img src="images/top_04.gif" width="30" height="24" /></td>
        </tr>
    </table>

    <table width="720" border="0" cellspacing="0" cellpadding="0">
        <tr>

            <td>&nbsp;</td>
        </tr>
    </table>

    <table width="720" border="0" cellpadding="0" cellspacing="1" bgcolor="006255">

        <tr>
            <td width="44" height="20" class="m_title_ft">操作者</td>


            <td width="45" height="20" align="center" class="m_title_ft">IP</td>

            <td width="58" height="20" align="center" class="m_title_ft">用户</td>
            <td width="194" height="20" align="center" nowrap="nowrap" class="m_title_ft">操作内容 1</td>
            <td width="192" height="20" align="center" nowrap="nowrap" class="m_title_ft">操作内容 2</td>
            <td width="140" height="20" align="center" nowrap="nowrap" class="m_title_ft">操作时间</td>
        </tr>
        <?$pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_user_log  " . $vvv . "  order by id desc");
$num1=$result->fetch_array();
$num = $num1[0];
$total = $num;
$pagecount = ceil($total / $pagesize);
if ($pagecount < $page) {
    $page = $pagecount;
}
if ($page <= 0) {
    $page = 1;
}?>
        <? $offset = ($page - 1) * $pagesize;
$pre = $page - 1;
$next = $page + 1;
$first = 1;
$last = $pagecount;
$result = $db1->query("select * from web_user_log  " . $vvv . "  order by id desc limit " . $offset . "," . $pagesize);
$cou = $result->num_rows;
if ($cou == 0) {?>
        <tr>
            <td height="25" colspan="6" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">暂无记录!</td>
        </tr>
        <?} else {
    while ($image = $result->fetch_array()) {?>
        <tr>
            <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['adduser']?></td>
            <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['ip']?>
            </td>
            <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['kauser']?>
              
            </td>
            <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['text1']?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['text2']?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF"><?=$image['adddate']?>
                
            </td>
        </tr>";
        <?}?>
        <tr>
            <td height="25" colspan="6" bordercolor="cccccc" bgcolor="#FFFFFF">
                <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" bordercolordark="#FFFFFF"
                    bordercolor="888888">
                    <tr>
                        <td height="26" align="center">当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录&nbsp;
                        <a href="main.php?action=user_log&uid=<?=$uid?>&vip=<?=$vip?>&username=<?=$username?>&page=1">首页</a>
                        <a href="main.php?action=user_log&uid=<?=$uid?>&vip=<?=$vip?>&username=<?=$username?>&page=<?=$pre?>">上一页</a>
                        <a href="main.php?action=user_log&uid=<?=$uid?>&vip=<?=$vip?>&username=<?=$username?>&page=<?=$next?>">下一页</a>
                        <a href="main.php?action=user_log&uid=<?=$uid?>&vip=<?=$vip?>&username=<?=$username?>&page=<?=$last?>">末页</a>
                               <select name="page2" onChange="location.href='main.php?action=user_log&uid=<?=$uid?>&vip=<?=$vip?>&username=<?=$username?>&page='+this.options[selectedIndex].value">
                                <? $i = 1;
    for (; $i <= $pagecount; ++$i) {?>
                                <option value="<?=$i?>"
                                    <?
        if ($page == $i) {?>
           selected
      <?  }?>
        >第<?=$i?>页
                                </option>
                             <?   }?>
                                </select>&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <?} ?>
    </table>
</body>