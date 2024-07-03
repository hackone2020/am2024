<?php
if (!defined("KK_VER")) {
    exit("无效的访问");
}
$webname = $_SERVER['HTTP_HOST'];
$str = 1;
$result = $db1->query("select * from web_online where  username='" . $username . "' and ip='" . $userip . "'  order by id LIMIT 1");
$row = $result->fetch_array();
if ($result->num_rows != 0) {
    $db1->query("update web_online set adddate='" . $utime . "',webname='" . $webname . "' where username='" . $username . "' and ip='" . $userip . "'");
    $str = 0;
} else {
    $sql = "INSERT INTO  web_online set addate='" . $utime . "',adddate='" . $utime . "',ag='',dai='" . $dai . "',zong='" . $zong . "',guan='" . $guan . "',dagu='" . $dagu . "',username='" . $username . "',zt='0',ip='" . $userip . "',webname='" . $webname . "'";
    $db1->query($sql);
    $str = 0;
}
if ($opwww == 1) {
    $str = 1;
}
$time_temp = strtotime($utime) - strtotime($online_time);
if ($online_time == "" || $autodeltime <= $time_temp) {
    $deltime = date("Y-m-d H:i:s", time() - $autodeltime);
    set_config("online_time", $utime);
    $db1->query("delete from web_online where  adddate<='" . $deltime . "'  order by id");
}
$a8 = get_config("a8");
echo "###" . $str . "###" . $a8 . "###";
exit();
?>