<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
$class1 = $_GET['class1'];
$class2 = $_GET['class2'];
if ($class2 == "��ȫ��" || $class2 == "��ȫ��" || $class2 == "��ȫ��" || $class2 == "�ش�") {
    $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
} else {
    if ($class2 == "���ж�") {
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='���ж��ж�'   order by id");
        $result2 = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='���ж�����'   order by id");
    }
    if ($class2 == "������") {
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='����������'   order by id");
        $result2 = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='�������ж�'   order by id");
    }
    $rake_lm_temp = array();
    $x = 0;
    while ($Image2 = $result2->fetch_assoc()) {
        $rake_lm_temp[$Image2['class3']] = $Image2['rate'];
        ++$x;
    }
    $rake_lm_count = $x - 1;
}
while ($image = $result->fetch_array()) {
    if ($class2 == "���ж�" || $class2 == "������") {
        $rate = round($image['rate'], 3);
        $rate2 = round($rake_lm_temp[$image['class3']], 3);
    } else {
        $rate = round($image['rate'], 3);
        $rate2 = 0;
    }
    $blbl .= $image['class3'] . "@@@" . $rate . "@@@" . $image['blrate'] . "@@@" . $rate2 . "@@@" . $image['xr'] . "@@@" . $image['locked'] . "###";
}
echo $blbl;
$ddf = date("Y-m-d H:i:s", time() - 20);
$db1->query("update web_bl set blrate=rate where class1='" . $class1 . "' and blrate<>rate and adddate<'" . $ddf . "'");