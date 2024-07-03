<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "14")) {
} else {
    echo "<script>window.history.go(-1);</script>";
    exit;
}
$username = $_GET['username'];
if ($username != "") {
    $vvv = " where adduser='" . $username . "' or kauser='" . $username . "'";
} else {
    exit;
}?>
<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">
<body style="min-width: 1200px;width: 100%">
 <div id="tit" class="tit" >
      <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
      <div class="tit_center floatleft font_bold"><span class="font_g">用户管理</span><span class="font_b">用户日志</span></div>
      <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
      <div class="biaoti_right floatright">
          <div align="right">
              <!--<a href="#" onClick="javascript:history.go(-1)" ;>回上一页</a>-->
              <input name="button" type="button" class="btn5" onmouseover="this.className='btn5m'" onmouseout="this.className='btn5'" onclick="history.go(-1)" value="回上一页">
              </div>
</div>          

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list bet">
    <tbody>
        <tr>
            <td width="43" height="20" align="center" class="t_list_caption">ID</td>
            <td width="65" height="20" class="t_list_caption">操作者/期数</td>
            <td width="83" height="20" align="center" class="t_list_caption">IP</td>
            <td width="66" height="20" align="center" class="t_list_caption">用户</td>
            <td width="221" height="20" align="center" nowrap="nowrap" class="t_list_caption">操作内容 1</td>
            <td width="218" height="20" align="center" nowrap="nowrap" class="t_list_caption">操作内容 2</td>
            <td width="136" height="20" align="center" nowrap="nowrap" class="t_list_caption">操作时间</td>
        <tr>
            <? $pagesize = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$result = $db1->query("select count(*) from web_user_log  " . $vvv . "  order by id desc");
$num1 = $result->fetch_array();
$num=$num1[0];
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
$result = $db1->query("select * from web_user_log  " . $vvv . "  order by id desc limit " . $offset . "," . $pagesize);
while ($image = $result->fetch_array()) {?>
        <tr>
            <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['id']?>
            </td>
            <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['adduser']?>
            </td>
            <td align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['ip']?>
            </td>
            <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['kauser']?>
            </td>

            <td height="25" align="center" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['text1']?>
            </td>
            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['text2']?>
            </td>

            <td align="center" nowrap="nowrap" bordercolor="cccccc" bgcolor="#FFFFFF">
                <?=$image['adddate']?>
            </td>
        </tr>
        <?}?>
        <tr>
            <td height="25" colspan="7" bordercolor="cccccc" bgcolor="#FFFFFF">
                <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0" bordercolordark="#FFFFFF"
                    bordercolor="888888">
                    <tr>
                        <td height="26" align="center">当前为第<?=$page?>页&nbsp;总<?=$pagecount?>页&nbsp;共<?=$total?>记录&nbsp;
                            <a href="main.php?action=user_log&uid=<?=$uid?>&username=$username&page=1">首页</a>
                            <a href="main.php?action=user_log&uid=<?=$uid?>&username=<?=$username?>&page=<?=$pre?>">上一页</a>
                            <a href="main.php?action=user_log&uid=<?=$uid?>&username=<?=$username?>&page=<?=$next?>">下一页</a>
                            <a href="main.php?action=user_log&uid=<?=$uid?>&username=<?=$username?>&page=<?=$last?>">末页</a>
                            <select name="page2" onChange="location.href='main.php?action=user_log&uid=<?=$uid?>&username=<?=$username?>&page='+this.options[selectedIndex].value">
                                <? $i = 1;
for (; $i <= $pagecount; ++$i) {?>
                                <option value="<?=$i?>" <?if ($page==$i) {?>
                                    selected
                                    <?}?>
                                    >第
                                    <?=$i?>页
                                </option>
                                <?}?>
                            </select>&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</body>