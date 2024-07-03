<?php

header("Cache-Control: no-cache， must-revalidate");
require_once "../include/global.php";
require_once "../include/function.php";
$uid = $_GET['uid'];
if (!preg_match("/^[0-9a-zA-Z\\_]*\$/", $uid)) {
    echo "UID error!!";
    exit;
}
if ($uid) {
    $sql = "select id,uid,username,flag from web_admin where uid='{$uid}' LIMIT 1";
    $result = $db1->query($sql);
    $row = $result->fetch_array();
    $cou = $result->num_rows;
    if ($cou == 0) {
        echo "<script>alert('请先登录!');window.open('index.php','_top');</script>";
        exit;
    }
    $jxadmin = $row['username'];
    $flag = $row['flag'];
} else {
    echo "<script>alert('请先登录!'); window.open('index.php', '_top');</script>";
    exit;
}
if (strpos($flag, "02")) {
} else {
    echo "<script>alert('你没有该权限功能!!'); window.open('index.php', '_top');</script>";
    exit;
}
$commandName = $_GET['commandName'];
$class1 = $_GET['class1'];
$ids = $_GET['ids'];
$class3 = $_GET['class3'];
$qtqt = $_GET['qtqt'];
$lxlx = $_GET['lxlx'];
if ($commandName == "MODIFYRATE") {
    if ($lxlx == 1) {
        if ($class1 == "特码" || $class1 == "正码" || $class1 == "总分") {
            $db1->query("update web_bl set adddate='" . $utime . "',rate=round(rate+" . $qtqt . ",3) where class1='" . $class1 . "'  and   class3='" . $class3 . "'");
        } else {
            if ($class1 == "正特") {
                if ($class3 == "单" || $class3 == "双" || $class3 == "大" || $class3 == "小" || $class3 == "红波" || $class3 == "蓝波" || $class3 == "绿波") {
                    $db1->query("update web_bl set adddate='" . $utime . "',rate=round(rate+" . $qtqt . ",3)  where class1='" . $class1 . "' and class2='" . $ids . "'  and   class3='" . $class3 . "'");
                } else {
                    $db1->query("update web_bl set adddate='" . $utime . "',rate=round(rate+" . $qtqt . ",3)  where class1='" . $class1 . "' and class2='" . $ids . "'  and   class3='" . $class3 . "'");
                }
            } else {
                $db1->query("update web_bl set adddate='" . $utime . "',rate=round(rate+" . $qtqt . ",3) where class1='" . $class1 . "' and class2='" . $ids . "'  and   class3='" . $class3 . "'");
                if ($class1 == "正码1-6" && $class3 != "合单" && $class3 != "合双") {
                    $db1->query("update web_bl  set adddate='" . $utime . "',rate=round(rate+" . $qtqt . ",3)  where class1='过关' and class2='" . $ids . "' and  class3='" . $class3 . "'");
                }
                if ($class1 == "过关") {
                    $db1->query("update web_bl  set adddate='" . $utime . "',rate=round(rate+" . $qtqt . ",3)  where class1='正码1-6' and class2='" . $ids . "' and  class3='" . $class3 . "'");
                }
            }
        }
    } else {
        if ($class1 == "特码" || $class1 == "正码" || $class1 == "总分") {
            $db1->query("update web_bl set adddate='" . $utime . "',rate=round(rate-" . $qtqt . ",3) where class1='" . $class1 . "'  and   class3='" . $class3 . "'");
        } else {
            if ($class1 == "正特") {
                if ($class3 == "单" || $class3 == "双" || $class3 == "大" || $class3 == "小" || $class3 == "红波" || $class3 == "蓝波" || $class3 == "绿波") {
                    $db1->query("update web_bl set adddate='" . $utime . "',rate=roun(rate-" . $qtqt . ",2) where class1='" . $class1 . "' and class2='" . $ids . "'  and   class3='" . $class3 . "'");
                } else {
                    $db1->query("update web_bl set adddate='" . $utime . "',rate=round(rate-" . $qtqt . ",3) where class1='" . $class1 . "' and class2='" . $ids . "'  and   class3='" . $class3 . "'");
                }
            } else {
                $db1->query("update web_bl set adddate='" . $utime . "',rate=round(rate-" . $qtqt . ",3) where class1='" . $class1 . "' and class2='" . $ids . "' and   class3='" . $class3 . "'");
                if ($class1 == "正码1-6" && $class3 != "合单" && $class3 != "合双" && $class3 != "合大" && $class3 != "合小") {
                    $db1->query("update web_bl  set adddate='" . $utime . "',rate=round(rate-" . $qtqt . ",3)  where class1='过关' and class2='" . $ids . "' and  class3='" . $class3 . "'");
                }
                if ($class1 == "过关") {
                    $db1->query("update web_bl  set adddate='" . $utime . "',rate=round(rate-" . $qtqt . ",3)  where class1='正码1-6' and class2='" . $ids . "' and  class3='" . $class3 . "'");
                }
            }
        }
    }
    $result3 = $db1->query("select * from web_bl where  class1='" . $class1 . "' and class2='" . $ids . "' and class3='" . $class3 . "' order by id");
    $image = $result3->fetch_array();
    $rate = $image['rate'];
    echo $rate;
    exit;
}
if ($commandName == "LOCK") {
    $lock = $_GET['lock'];
    if ($lock == "true") {
        $lock1 = 1;
    } else {
        $lock1 = 0;
    }
    if ($ids == "三中二中二" || $ids == "三中二中三") {
        $db1->query("update web_bl set adddate='" . $utime . "',locked=" . $lock1 . " where class1='" . $class1 . "' and class2='三中二中二' and   class3='" . $class3 . "'");
        $db1->query("update web_bl set adddate='" . $utime . "',locked=" . $lock1 . " where class1='" . $class1 . "' and class2='三中二中三' and   class3='" . $class3 . "'");
    } else {
        if ($ids == "二中特中特" || $ids == "二中特中二") {
            $db1->query("update web_bl set adddate='" . $utime . "',locked=" . $lock1 . " where class1='" . $class1 . "' and class2='二中特中特' and   class3='" . $class3 . "'");
            $db1->query("update web_bl set adddate='" . $utime . "',locked=" . $lock1 . " where class1='" . $class1 . "' and class2='二中特中二' and   class3='" . $class3 . "'");
        } else {
            $db1->query("update web_bl set adddate='" . $utime . "',locked=" . $lock1 . " where class1='" . $class1 . "' and class2='" . $ids . "' and   class3='" . $class3 . "'");
        }
    }
    echo $lock1;
    exit;
}