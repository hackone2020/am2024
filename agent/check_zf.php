<?php

function makeDir($dir)
{
    if (!$dir) {
        return 0;
    }
    $dir = str_replace("\\", "/", $dir);
    $mdir = "";
    foreach (explode("/", $dir) as $val) {
        $mdir .= $val . "/";
        if ($val == ".." || $val == "." || trim($val) == "") {
            continue;
        }
        if (!file_exists($mdir)) {
            $oldumask = umask(0);
            if (!mkdir($mdir)) {
                return false;
            }
        }
    }
    return true;
}
$pzcachename = "../cache/" . $dblabel . "/agent/" . $uid . "/pzcache.php";
if (!file_exists($delcachename)) {
    $cacheof = 1;
} else {
    include $pzcachename;
    $cacheof = 0;
}
if ($cacheof == 1 || $pz_of == "" || $ty == "") {
    if ($lx == 4) {
        $result = $db1->query("select pz,ty,zc from web_agent  where kauser='" . $kauser . "' and lx=4 order by id LIMIT 1");
        $row = $result->fetch_assoc();
        $pz_of = $row['pz'];
        $ty = $row['ty'];
        if ($row['zc'] == 1) {
            $pz_of = 1;
        }
    }
    if ($lx == 3) {
        $pz_of = 0;
        $ty = 0;
        $result = $db1->query("select count(*) from web_agent  where (kauser='" . $kauser . "' or kauser='" . $dagu . "') and (pz=1 or ty=1)order by id LIMIT 1");
        $num1=$result->fetch_array();
        
        $num = $num1[0];
        if ($num != 0) {
            $pz_of = 1;
            $ty = 1;
        }
    }
    if ($lx == 2) {
        $pz_of = 0;
        $ty = 0;
        $result = $db1->query("select count(*) from web_agent  where (kauser='" . $kauser . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and (pz=1 or ty=1) order by id LIMIT 1");
        $num1=$result->fetch_array();
        
        $num = $num1[0];
        if ($num != 0) {
            $pz_of = 1;
            $ty = 1;
        }
    }
    if ($lx == 1) {
        $pz_of = 0;
        $ty = 0;
        $result = $db1->query("select count(*) from web_agent  where (kauser='" . $kauser . "' or kauser='" . $zong . "' or kauser='" . $guan . "' or kauser='" . $dagu . "') and (pz=1 or ty=1) order by id LIMIT 1");
        $num1=$result->fetch_array();
        
        $num = $num1[0];
        if ($num != 0) {
            $pz_of = 1;
            $ty = 1;
        }
    }
    $str = "<?php";
    $str .= "unset(\$pz_of);";
    $str .= "unset(\$ty);";
    $str .= "$pz_of =t'" . $pz_of . "';";
    $str .= "$tyt =t'" . $ty . "?>";
    if (makedir(dirname($pzcachename)) && ($fp = fopen($pzcachename, "w"))) {
        if (@fwrite($fp, $str)) {
            fclose($fp);
        } else {
            fclose($fp);
        }
    }
}