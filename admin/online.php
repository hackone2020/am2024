<?php
if (!defined("KK_VER")) {
    exit("无效的访问");
}
$webname = $_SERVER['HTTP_HOST'];
if ($jxadmin != "admin") {
    $vv = " where username!='admin' ";
} else {
    $vv = "";
}
$str = 1;
$result = $db1->query("select * from web_online where  username='" . $jxadmin . "' and ip='" . $userip . "'  order by id LIMIT 1");
$row = $result->fetch_array();
if ($result->num_rows!= 0) {
    $db1->query("update web_online set adddate='" . $utime . "',username='" . $jxadmin . "',webname='" . $webname . "' where username='" . $jxadmin . "' and ip='" . $userip . "'");
} else {
    $sql = "INSERT INTO  web_online set addate='" . $utime . "',adddate='" . $utime . "',username='" . $jxadmin . "',zt='5',ip='" . $userip . "',webname='" . $webname . "'";
    $db1->query($sql);
}
$str = 0;
$time_temp = strtotime($utime) - strtotime($online_time);
if ($online_time == "" || $autodeltime <= $time_temp) {
    $deltime = date("Y-m-d H:i:s", time() - $autodeltime);
    set_config("online_time", $utime);
    $db1->query("delete from web_online where  adddate<='" . $deltime . "'  order by id");
}
$result = $db1->query("select count(*) from web_online" . $vv);
$num_online = $result->fetch_array();
$num = $num_online[0];
echo "###" . $str . "###" . $num . "###" . $Current_KitheTable[29] . "###" . $Current_KitheTable[11] . "###" . $Current_KitheTable[15] . "###";