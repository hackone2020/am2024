<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
@deldir("cache/" . $dblabel . "/member/" . $uid . "/");
$sql = "update web_member set uid='' where username='" . $username . "'";
$db1->query($sql);
$db1->query("delete from web_online where username='" . $username . "' ", $conn);
echo "<script>alert('�˳��ɹ���');window.open('index.php','_top');</script></HTML>";

exit;
?>