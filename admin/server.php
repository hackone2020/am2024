<?php

if (!defined("KK_VER")) {
    exit("无效的访问");
}
if (strpos($flag, "02")) {
} else {
    exit;
}
$class1 = $_GET['class1'];
$class2 = $_GET['class2'];
switch ($class2) {
    case "特A":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='特码') order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='特码') group by class3 order by class3 DESC");
        break;
    case "特B":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='特码') order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='特码') group by class3 order by class3 DESC");
        break;
    case "正A":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "正B":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "半波":
        $result = $db1->query("select * from web_bl where  class1='半波' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='半波' group by class3 order by class3 DESC");
        break;
    case "正码1-6":
        $result = $db1->query("select * from web_bl where  class1='正码1-6' order by id");
        $result8 = $db1->query("SELECT  class2,class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='正码1-6' group by class2,class3 order by class3 DESC");
        break;
    case "过关":
        $result = $db1->query("select * from web_bl where  class1='过关' order by id");
        $tan_class = "过关";
        break;
    case "正1特":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "正2特":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "正3特":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "正4特":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "正5特":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "正6特":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "四全中":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $tan_class = "连码";
    case "三全中":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $tan_class = "连码";
        break;
    case "三中二中二":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='三中二中二' order by id");
        $tan_class = "连码";
        break;
    case "三中二中三":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='三中二中三' order by id");
        $tan_class = "连码";
        break;
    case "二全中":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $tan_class = "连码";
        break;
    case "二中特中特":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='二中特中特' order by id");
        $tan_class = "连码";
        break;
    case "二中特中二":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='二中特中二' order by id");
        $tan_class = "连码";
        break;
    case "特串":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='特串' order by id");
        $tan_class = "连码";
        break;
    case "一肖":
        $result = $db1->query("select * from web_bl where  class1='生肖' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='生肖' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "特肖":
        $result = $db1->query("select * from web_bl where  class1='生肖' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='生肖' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "六肖":
        $result = $db1->query("select * from web_bl where  class1='生肖' and class2='" . $class2 . "' order by id");
        $tan_class = "六肖";
        break;
    case "二肖连中":
        $result = $db1->query("select * from web_bl where  class1='生肖连' and class2='" . $class2 . "' order by id");
        $tan_class = "生肖连";
        break;
    case "二肖连不中":
        $result = $db1->query("select * from web_bl where  class1='生肖连' and class2='" . $class2 . "' order by id");
        $tan_class = "生肖连";
        break;
    case "三肖连中":
        $result = $db1->query("select * from web_bl where  class1='生肖连' and class2='" . $class2 . "' order by id");
        $tan_class = "生肖连";
        break;
    case "三肖连不中":
        $result = $db1->query("select * from web_bl where  class1='生肖连' and class2='" . $class2 . "' order by id");
        $tan_class = "生肖连";
        break;
    case "四肖连中":
        $result = $db1->query("select * from web_bl where  class1='生肖连' and class2='" . $class2 . "' order by id");
        $tan_class = "生肖连";
        break;
    case "四肖连不中":
        $result = $db1->query("select * from web_bl where  class1='生肖连' and class2='" . $class2 . "' order by id");
        $tan_class = "生肖连";
        break;
    case "尾数":
    case "尾数不中":
        $result = $db1->query("select * from web_bl where  class1='尾数' and class2='" . $class2 . "' order by id");
        break;
    case "尾数量":
        $result = $db1->query("select * from web_bl where  class1='尾数量' and class2='" . $class2 . "' order by id");
        break;
    case "二尾连中":
        $result = $db1->query("select * from web_bl where  class1='尾数连' and class2='" . $class2 . "' order by id");
        $tan_class = "尾数连";
        break;
    case "二尾连不中":
        $result = $db1->query("select * from web_bl where  class1='尾数连' and class2='" . $class2 . "' order by id");
        $tan_class = "尾数连";
        break;
    case "三尾连中":
        $result = $db1->query("select * from web_bl where  class1='尾数连' and class2='" . $class2 . "' order by id");
        $tan_class = "尾数连";
        break;
    case "三尾连不中":
        $result = $db1->query("select * from web_bl where  class1='尾数连' and class2='" . $class2 . "' order by id");
        $tan_class = "尾数连";
        break;
    case "四尾连中":
        $result = $db1->query("select * from web_bl where  class1='尾数连' and class2='" . $class2 . "' order by id");
        $tan_class = "尾数连";
        break;
    case "四尾连不中":
        $result = $db1->query("select * from web_bl where  class1='尾数连' and class2='" . $class2 . "' order by id");
        $tan_class = "尾数连";
        break;
    case "五不中":
        $result = $db1->query("select * from web_bl where  class1='自选不中' and class2='" . $class2 . "' order by id");
        $tan_class = "不中";
        break;
    case "六不中":
        $result = $db1->query("select * from web_bl where  class1='自选不中' and class2='" . $class2 . "' order by id");
        $tan_class = "不中";
        break;
    case "七不中":
        $result = $db1->query("select * from web_bl where  class1='自选不中' and class2='" . $class2 . "' order by id");
        $tan_class = "不中";
        break;
    case "八不中":
        $result = $db1->query("select * from web_bl where  class1='自选不中' and class2='" . $class2 . "' order by id");
        $tan_class = "不中";
        break;
    case "九不中":
        $result = $db1->query("select * from web_bl where  class1='自选不中' and class2='" . $class2 . "' order by id");
        $tan_class = "不中";
        break;
    case "十不中":
        $result = $db1->query("select * from web_bl where  class1='自选不中' and class2='" . $class2 . "' order by id");
        $tan_class = "不中";
        break;
    case "四中一":
        $result = $db1->query("select * from web_bl where  class1='多中一' and class2='" . $class2 . "' order by id");
        $tan_class = "多中一";
        break;
    case "五中一":
        $result = $db1->query("select * from web_bl where  class1='多中一' and class2='" . $class2 . "' order by id");
        $tan_class = "多中一";
        break;
    case "硬特":
        $result = $db1->query("select * from web_bl where  class1='硬特' and class2='" . $class2 . "' order by id");
        $tan_class = "硬特";
        break;
    case "一粒任中":
    case "二粒任中":
    case "三粒任中":
    case "四粒任中":
    case "五粒任中":
        $result = $db1->query("select * from web_bl where  class1='粒任中' and class2='" . $class2 . "' order by id");
        $tan_class = "粒任中";
        break;
    default:
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        break;
}
$rs1_table = array();
if ($result8 != "") {
    if ($class2 != "正码1-6") {
        while ($row = $result8->fetch_assoc()) {
            $rs1_table[$row['class3']] = $row['sum_m'];
        }
    } else {
        if ($row = $result8->fetch_assoc()) {
            while ($row = $result8->fetch_assoc()) {
                $rs1_table[$row['class2']][$row['class3']] = $row['sum_m'];
            }
        }
    }
}
while ($image = $result->fetch_array()) {
    if ($tan_class == "连码" || $tan_class == "六肖" || $tan_class == "生肖连" || $tan_class == "尾数连" || $tan_class == "不中" || $tan_class == "多中一" || $tan_class == "硬特") {
        if ($class2 == "三中二中二" || $class2 == "三中二中三") {
            $result1 = $db1->query("Select round( SUM(sum_m/(( char_length( class5 ) - char_length( replace( class5 , '|' , '' ) ) ) / ( char_length( '|' ) ) / 2 ) ),1) As sum_m from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class1='" . $image['class1'] . "' and  class2='三中二' and class5 LIKE '%|" . $image['class3'] . "|%' and qx=0");
        } else {
            if ($class2 == "二中特中特" || $class2 == "二中特中二") {
                $result1 = $db1->query("Select round( SUM(sum_m/(( char_length( class5 ) - char_length( replace( class5 , '|' , '' ) ) ) / ( char_length( '|' ) ) / 2 ) ),1) As sum_m from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class1='" . $image['class1'] . "' and  class2='二中特' and class5 LIKE '%|" . $image['class3'] . "|%' and qx=0");
            } else {
                $result1 = $db1->query("Select round( SUM(sum_m/(( char_length( class5 ) - char_length( replace( class5 , '|' , '' ) ) ) / ( char_length( '|' ) ) / 2 ) ),1) As sum_m from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class1='" . $image['class1'] . "' and  class2='" . $image['class2'] . "' and class5 LIKE '%|" . $image['class3'] . "|%' and qx=0");
            }
        }
        $rs5 = $result1->fetch_array();
        $sum_m = isset($rs5['sum_m']) ? $rs5['sum_m'] : 0;
    } else {
        if ($tan_class != "过关") {
            if ($class2 != "正码1-6") {
                $sum_m = isset($rs1_table[$image['class3']]) ? $rs1_table[$image['class3']] : 0;
            } else {
                $sum_m = isset($rs1_table[$image['class2']][$image['class3']]) ? $rs1_table[$image['class2']][$image['class3']] : 0;
            }
        } else {
            $sum_m = 0;
        }
    }
    $rate = $image['rate'];
    if ($image['rate'] != $image['blrate']) {
        $blbl .= $image['class3'] . "@@@<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span style='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>" . $rate . "@@@" . $image['blrate'] . "</b></font></span>@@@" . $sum_m . "###";
    } else {
        $blbl .= $image['class3'] . "@@@" . $rate . "@@@" . $image['blrate'] . "@@@" . $sum_m . "###";
    }
}
if ($class1 == "正码") {
    $result = $db1->query("select * from web_bl where  class1='总分' order by id");
    while ($image = $result->fetch_array()) {
        $result2 = $db1->query("Select round(SUM(sum_m),1) As sum_m from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class1='" . $image['class1'] . "' and  class2='" . $image['class2'] . "' and class3='" . $image['class3'] . "' and qx=0 ");
        $rs5 = $result2->fetch_array();
        if ($rs5['sum_m'] == "") {
            $sum_m = 0;
        } else {
            $sum_m = $rs5['sum_m'];
        }
        $rate = $image['rate'];
        if ($image['rate'] != $image['blrate']) {
            $blbl .= $image['class3'] . "@@@<SPAN STYLE='background-color:ffff00;WIDTH: 100%;height:25px;vertical-align:middle;' ><span style='display:inline-block;height:100%;vertical-align:middle;'></span><font color=ff0000><b>" . $rate . "@@@" . $image['blrate'] . "</b></font></span>@@@" . $sum_m . "###";
        } else {
            $blbl .= $image['class3'] . "@@@" . $rate . "@@@" . $image['blrate'] . "@@@" . $sum_m . "###";
        }
    }
}
echo $blbl;
$ddf = date("Y-m-d H:i:s", time() - 20);
$db1->query("update web_bl set blrate=rate where class1='" . $class1 . "' and blrate<>rate and adddate<'" . $ddf . "'");
if ($class1 == "正码") {
    $db1->query("update web_bl set blrate=rate where class1='总分' and blrate<>rate and adddate<'" . $ddf . "'");
}
