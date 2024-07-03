<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
@deldir("cache/" . $dblabel . "/member/" . $uid . "/");
$sql = "update web_member set uid='' where username='" . $username . "'";
$db1->query($sql);
$db1->query("delete from web_online where username='" . $username . "' ", $conn);
echo "<script>alert('退出成功！');window.open('index.php','_top');</script></HTML>";

exit;
?>