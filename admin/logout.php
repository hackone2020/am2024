<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
$sql = "update web_admin set uid='' where username='" . $jxadmin . "'";
$db1->query($sql);
$db1->query("delete from web_online where username='" . $jxadmin . "' ", $conn);
@deldir("../cache/" . $dblabel . "/admin/" . $uid . "/");
echo "<script>alert('�˳��ɹ���');window.open('index.php','_top');</script>";
echo "</HTML>";
exit;