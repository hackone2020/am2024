<?php
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
?>
<script src="js/function.js" type="text/javascript"></script>
<script src="js/left.js" type="text/javascript"></script>
<SCRIPT language="javascript">
    var uid = "<?= $uid ?>";
</script>
<link rel="stylesheet" href="/member/stylesheets/left.css?t=1683715146" type="text/css">

<body marginwidth="0" marginheight="0">
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tbody>
            <tr>
                <td width="50%" align="right" bgcolor="#FFFFFF">��Ա�˺ţ�</td>
                <td width="50%" align="center" bgcolor="#FFFFFF" id="userlogin" style="padding-bottom: 8px;">
                    <span><?= $username ?></span>
                    <span>
                        <select onchange="SelectPk(this.selectedIndex)">
                            <?
                            $kxabcd = explode(",",$kxabcd);
                            foreach ($kxabcd as $key => $item) {
                            ?>
                                <option id="option<?=$key?>" value="<?= $item ?>" <? if ($abcd == $item) echo "selected"; ?>>(<?= $item ?>��)</option>
                            <?
                            }
                            ?>
                        </select>
                    </span>
                </td>
            </tr>
            <tr>
                <td width="50%" align="right" bgcolor="#FFFFFF">���ö�ȣ�</td>
                <td width="50%" align="center" bgcolor="#FFFFFF" id="xinyong"><?= $cs ?></td>
            </tr>
            <tr>
                <td width="50%" align="right" bgcolor="#FFFFFF">���ö�ȣ�</td>
                <td width="50%" align="center" bgcolor="#FFFFFF" id="keyong"><?= $ts ?></td>
            </tr>
            <tr>
                <td width="50%" align="right" bgcolor="#FFFFFF">���ö�ȣ�</td>
                <td id="yiyong" align="center" bgcolor="#FFFFFF">
                    <?
                    $c = $cs - $ts;
                    echo $c;
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <div id="showtable1"></div>
    <table width="90%" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list" id="showtable2">
        <tbody>
            <tr>

                <td align="center" class="t_list_caption">�����¼</td>

            </tr>
            <tr>
                <td height="25" align="center" bgcolor="#FFFFFF"><a href="javascript:void(0);" onclick="ShowLimit();" style="color:#000000;">���ʮ�ʽ��׼�¼
                </td>
            </tr>
        </tbody>
    </table>
</body>