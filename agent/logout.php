<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if ($vip == 1) {
    $db1->query("delete from web_online where username='" . $kazi . "' ");
    $sql = "update web_agent_zi set uid='' where username='" . $kazi . "'";
} else {
    $db1->query("delete from web_online where username='" . $kauser . "' ");
    $sql = "update web_agent set uid='' where username='" . $kauser . "'";
}
$db1->query($sql);
@deldir("../cache/" . $dblabel . "/agent/" . $uid . "/");
echo "<script>alert('�˳��ɹ���');window.open('index.php','_top');</script>";
echo "</HTML>";
exit;