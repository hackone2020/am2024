<?php

if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "02")) {
} else {
    exit;
}
$class1 = $_GET['class1'];
$class2 = $_GET['class2'];
switch ($class2) {
    case "��A":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='����') order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='����') group by class3 order by class3 DESC");
        break;
    case "��B":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='����') order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and (class2='" . $class2 . "' or class2='����') group by class3 order by class3 DESC");
        break;
    case "��A":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��B":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "�벨":
        $result = $db1->query("select * from web_bl where  class1='�벨' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='�벨' group by class3 order by class3 DESC");
        break;
    case "����1-6":
        $result = $db1->query("select * from web_bl where  class1='����1-6' order by id");
        $result8 = $db1->query("SELECT  class2,class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='����1-6' group by class2,class3 order by class3 DESC");
        break;
    case "����":
        $result = $db1->query("select * from web_bl where  class1='����' order by id");
        $tan_class = "����";
        break;
    case "��1��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��2��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��3��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��4��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��5��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��6��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='" . $class1 . "' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��ȫ��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
    case "��ȫ��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
        break;
    case "���ж��ж�":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='���ж��ж�' order by id");
        $tan_class = "����";
        break;
    case "���ж�����":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='���ж�����' order by id");
        $tan_class = "����";
        break;
    case "��ȫ��":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
        break;
    case "����������":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='����������' order by id");
        $tan_class = "����";
        break;
    case "�������ж�":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='�������ж�' order by id");
        $tan_class = "����";
        break;
    case "�ش�":
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='�ش�' order by id");
        $tan_class = "����";
        break;
    case "һФ":
        $result = $db1->query("select * from web_bl where  class1='��Ф' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='��Ф' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��Ф":
        $result = $db1->query("select * from web_bl where  class1='��Ф' and class2='" . $class2 . "' order by id");
        $result8 = $db1->query("SELECT  class3,round(SUM(sum_m),1) As sum_m FROM web_tan WHERE  Kithe='" . $Current_Kithe_Num . "' and class1='��Ф' and class2='" . $class2 . "' group by class3 order by class3 DESC");
        break;
    case "��Ф":
        $result = $db1->query("select * from web_bl where  class1='��Ф' and class2='" . $class2 . "' order by id");
        $tan_class = "��Ф";
        break;
    case "��Ф����":
        $result = $db1->query("select * from web_bl where  class1='��Ф��' and class2='" . $class2 . "' order by id");
        $tan_class = "��Ф��";
        break;
    case "��Ф������":
        $result = $db1->query("select * from web_bl where  class1='��Ф��' and class2='" . $class2 . "' order by id");
        $tan_class = "��Ф��";
        break;
    case "��Ф����":
        $result = $db1->query("select * from web_bl where  class1='��Ф��' and class2='" . $class2 . "' order by id");
        $tan_class = "��Ф��";
        break;
    case "��Ф������":
        $result = $db1->query("select * from web_bl where  class1='��Ф��' and class2='" . $class2 . "' order by id");
        $tan_class = "��Ф��";
        break;
    case "��Ф����":
        $result = $db1->query("select * from web_bl where  class1='��Ф��' and class2='" . $class2 . "' order by id");
        $tan_class = "��Ф��";
        break;
    case "��Ф������":
        $result = $db1->query("select * from web_bl where  class1='��Ф��' and class2='" . $class2 . "' order by id");
        $tan_class = "��Ф��";
        break;
    case "β��":
    case "β������":
        $result = $db1->query("select * from web_bl where  class1='β��' and class2='" . $class2 . "' order by id");
        break;
    case "β����":
        $result = $db1->query("select * from web_bl where  class1='β����' and class2='" . $class2 . "' order by id");
        break;
    case "��β����":
        $result = $db1->query("select * from web_bl where  class1='β����' and class2='" . $class2 . "' order by id");
        $tan_class = "β����";
        break;
    case "��β������":
        $result = $db1->query("select * from web_bl where  class1='β����' and class2='" . $class2 . "' order by id");
        $tan_class = "β����";
        break;
    case "��β����":
        $result = $db1->query("select * from web_bl where  class1='β����' and class2='" . $class2 . "' order by id");
        $tan_class = "β����";
        break;
    case "��β������":
        $result = $db1->query("select * from web_bl where  class1='β����' and class2='" . $class2 . "' order by id");
        $tan_class = "β����";
        break;
    case "��β����":
        $result = $db1->query("select * from web_bl where  class1='β����' and class2='" . $class2 . "' order by id");
        $tan_class = "β����";
        break;
    case "��β������":
        $result = $db1->query("select * from web_bl where  class1='β����' and class2='" . $class2 . "' order by id");
        $tan_class = "β����";
        break;
    case "�岻��":
        $result = $db1->query("select * from web_bl where  class1='��ѡ����' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
        break;
    case "������":
        $result = $db1->query("select * from web_bl where  class1='��ѡ����' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
        break;
    case "�߲���":
        $result = $db1->query("select * from web_bl where  class1='��ѡ����' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
        break;
    case "�˲���":
        $result = $db1->query("select * from web_bl where  class1='��ѡ����' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
        break;
    case "�Ų���":
        $result = $db1->query("select * from web_bl where  class1='��ѡ����' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
        break;
    case "ʮ����":
        $result = $db1->query("select * from web_bl where  class1='��ѡ����' and class2='" . $class2 . "' order by id");
        $tan_class = "����";
        break;
    case "����һ":
        $result = $db1->query("select * from web_bl where  class1='����һ' and class2='" . $class2 . "' order by id");
        $tan_class = "����һ";
        break;
    case "����һ":
        $result = $db1->query("select * from web_bl where  class1='����һ' and class2='" . $class2 . "' order by id");
        $tan_class = "����һ";
        break;
    case "Ӳ��":
        $result = $db1->query("select * from web_bl where  class1='Ӳ��' and class2='" . $class2 . "' order by id");
        $tan_class = "Ӳ��";
        break;
    case "һ������":
    case "��������":
    case "��������":
    case "��������":
    case "��������":
        $result = $db1->query("select * from web_bl where  class1='������' and class2='" . $class2 . "' order by id");
        $tan_class = "������";
        break;
    default:
        $result = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $class2 . "' order by id");
        break;
}
$rs1_table = array();
if ($result8 != "") {
    if ($class2 != "����1-6") {
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
    if ($tan_class == "����" || $tan_class == "��Ф" || $tan_class == "��Ф��" || $tan_class == "β����" || $tan_class == "����" || $tan_class == "����һ" || $tan_class == "Ӳ��") {
        if ($class2 == "���ж��ж�" || $class2 == "���ж�����") {
            $result1 = $db1->query("Select round( SUM(sum_m/(( char_length( class5 ) - char_length( replace( class5 , '|' , '' ) ) ) / ( char_length( '|' ) ) / 2 ) ),1) As sum_m from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class1='" . $image['class1'] . "' and  class2='���ж�' and class5 LIKE '%|" . $image['class3'] . "|%' and qx=0");
        } else {
            if ($class2 == "����������" || $class2 == "�������ж�") {
                $result1 = $db1->query("Select round( SUM(sum_m/(( char_length( class5 ) - char_length( replace( class5 , '|' , '' ) ) ) / ( char_length( '|' ) ) / 2 ) ),1) As sum_m from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class1='" . $image['class1'] . "' and  class2='������' and class5 LIKE '%|" . $image['class3'] . "|%' and qx=0");
            } else {
                $result1 = $db1->query("Select round( SUM(sum_m/(( char_length( class5 ) - char_length( replace( class5 , '|' , '' ) ) ) / ( char_length( '|' ) ) / 2 ) ),1) As sum_m from web_tan where Kithe='" . $Current_Kithe_Num . "' and  class1='" . $image['class1'] . "' and  class2='" . $image['class2'] . "' and class5 LIKE '%|" . $image['class3'] . "|%' and qx=0");
            }
        }
        $rs5 = $result1->fetch_array();
        $sum_m = isset($rs5['sum_m']) ? $rs5['sum_m'] : 0;
    } else {
        if ($tan_class != "����") {
            if ($class2 != "����1-6") {
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
if ($class1 == "����") {
    $result = $db1->query("select * from web_bl where  class1='�ܷ�' order by id");
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
if ($class1 == "����") {
    $db1->query("update web_bl set blrate=rate where class1='�ܷ�' and blrate<>rate and adddate<'" . $ddf . "'");
}
