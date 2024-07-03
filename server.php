<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
$class1 = $_GET['class1'];
$class2 = $_GET['class2'];


// var_dump($class2);

if ($class1 == "正码1-6" || $class1 == "过关" || $class1 == "半波" || $class1 == "特码") {
    if ($class1 == "正码1-6") {
        $result = $db1->query("select * from web_bl where  class1='正码1-6'  order by id");
    } else {
        if ($class1 == "特码") {
            $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='特码') order by id");
        } else {
            $result = $db1->query("select * from web_bl where   class1='" . $class1 . "'  order by id");
        }
    }
} else {
    if ($class2 == "特A" || $class2 == "特B") {
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "'   order by id");
    } else {
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
    }
}
while ($image = $result->fetch_array()) {
    $rate = round($image['rate'], 3);
    if ($class2 == "特A" || $class2 == "特B") {
        $xr = $image['xr'] - $image['gold'];
    } else {
        $xr = $image['xr'];
    }
    $blbl .= $image['class3'] . "@@@" . $rate . "@@@" . $image['blrate'] . "@@@0@@@" . $xr . "@@@" . $image['locked'] . "###";
}
if ($class1 == "正码") {
    $result = $db1->query("select * from web_bl where  class2='总分' and (class3='总单' or class3='总双' or class3='总大' or class3='总小') order by id");
    while ($image = $result->fetch_array()) {
        $rate = $image['rate'];
        $blbl .= $image['class3'] . "@@@" . $rate . "@@@" . $image['blrate'] . "@@@0@@@" . $image['xr'] . "@@@" . $image['locked'] . "###";
    }
}
echo $blbl;
$ddf = date("Y-m-d H:i:s", time() - 20);
$db1->query("update web_bl set blrate=rate where class1='" . $class1 . "' and blrate<>rate and adddate<'" . $ddf . "'");