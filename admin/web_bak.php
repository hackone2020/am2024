<?php

class RunTime
{
    public function Rstartime()
    {
        $nowtime = explode(" ", microtime());
        $starttime = $nowtime[1] + $nowtime[0];
        return $starttime;
    }
    public function Rendtime()
    {
        global $starttime;
        $nowtime = explode(" ", microtime());
        $endtime = $nowtime[1] + $nowtime[0];
        $totaltime = $endtime - $starttime;
        return number_format($totaltime, 6);
    }
}
if (!defined("KK_VER")) {
    exit("��Ч�ķ���");
}
if (strpos($flag, "15")) {
} else {
    echo "<center>��û�и�Ȩ�޹���!</center>";
    exit;
}
include "../class/archive.php";
$time = new RunTime();
$starttime = $time->Rstartime();
$fsave = "";
if ($_GET['act'] == "data") {

    // ��ʼʱ��
    $time_start = microtime(true);

    $date_num = $_POST['date_num'];
    $sql_b = $db1->query("select * from web_bak where qishu='{$date_num}'");
    // ִ�в�ѯ
    if ($sql_b->num_rows > 0) {
        echo "<script language='javascript'>alert('�Ѵ��ڱ��ݼ�¼!');window.location.href='main.php?action=web_bak&uid=" . $uid . "';</script>";
        exit;
    }


    $path = "bak/";
    if (!file_exists($path)) {
        mkdir($path);
    }
    $file = date("YmdHis");
    $filetype = ".zip";
    $files = $file . $filetype;
    $filepahtname = $path . $files;
    if (!opendir($path)) {
        mkdir($path, 448);
    }
    $fpath = @fopen("bak/bak-" . $file . ".sql", "a");
    $fors = "//" . $utime . "��������";
    fwrite($fpath, $fors);
    $tbs = "web_tans";
    $sq = " where kithe='{$date_num}'";
    $sql_bill = $db1->query("select * from {$tbs} {$sq}");
    $ii = 0;
    while ($row = $sql_bill->fetch_row()) {
        $fds = "";
        $i = 0;
        for (; $i < count($row); ++$i) {
            $fds .= "'" . $row[$i] . "',";
        }
        $fm = "insert into {$tbs} values(" . substr($fds, 0, strlen($fds) - 1) . ")";
        $fin = "" . $fm . ";";
        fwrite($fpath, $fin);
    }
    fclose($fpath);
    $archive = new zip_file($filepahtname);
    $archive->add_files("bak/bak-" . $file . ".sql");
    $archive->create_archive();
    $fpath = $filepahtname;
    @unlink("bak/bak-" . $file . ".sql");

    // ����ʱ��
    $time_end = microtime(true);
    // ���㲢��ӡִ��ʱ��
    $execution_time = ($time_end - $time_start);
    $execution_time = round($execution_time, 2);
    $sql = "INSERT INTO web_bak set ttime='{$utime}',qishu='{$date_num}',user='{$jxadmin}',status='������ɣ���ʱ{$execution_time}��',path='{$fpath}'";
    $db1->query($sql);

    echo "<script language='javascript'>alert('���ݳɹ�!');window.location.href='main.php?action=web_bak&uid=" . $uid . "';</script>";
    exit;
}


?>

<script language="javascript">
    function fs() {
        myform.fsubmit.value = "���ڱ�������,���Ե�..";
        myform.fsubmit.disabled = true;
        myform.submit();
    }
</script>

<link rel="stylesheet" href="/stylesheets/main.css?t=1683715146" type="text/css">

<body style="min-width: 1200px;width: 100%">
    <div id="tit" class="tit">
        <div class="tit_left floatleft"><img src="/images/tit_01.png" width="5" height="31" alt=""></div>
        <div class="tit_center floatleft font_bold"><span class="font_g">ϵͳ����</span><span class="font_b">&nbsp;���ݱ���</span></div>
        <div class="tit_right floatleft"><img src="/images/tit_03.png" width="5" height="31" alt=""></div>
        <div class="biaoti_right floatright"></div>
    </div>
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <tbody>
            <tr>
                <td class="t_list_caption" style="color:blue">(�����ڷ��̺󿪽�ǰʹ��)</td>
            </tr>
            <tr>
                <form name="myform" method="post" action="main.php?action=web_bak&act=data&uid=<?= $uid ?>">
                    <td height="60" align="center" bgcolor="#FFFFFF">
                        ��ѡ�񱸷�����:
                        <select name="date_num" id="date_num">";
                            <? $result = $db1->query("select * from web_kithe order by nn desc limit 100");
                            while ($image = $result->fetch_array()) {
                                $weekdays = array('����', '��һ', '�ܶ�', '����', '����', '����', '����');

                                $timespan = strtotime($image['nd']);

                                $xtime = date('Y-m-d', $timespan);
                                $weekday = date('w', $timespan);
                                echo "<OPTION value=" . $image['nn'];
                                echo ">" . $xtime . " (" . $weekdays[$weekday] . ") (��" . $image['nn'] . "��) </OPTION>";
                            } ?>
                        </select>&nbsp;
                        <input name="fsubmit" type="submit" class="btn1" onClick="fs()" value="����">
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="1" class="t_list">
        <thead>
            <tr>
                <td class="t_list_caption">�ύʱ��</td>
                <td class="t_list_caption">����</td>
                <td class="t_list_caption">�ύ��</td>
                <td class="t_list_caption">״̬</td>
                <td class="t_list_caption">��ַ</td>
            </tr>
        </thead>
        <tbody>
            <? $sql_a = $db1->query("select * from web_bak");
            while ($item = $sql_a->fetch_array()) {
            ?>
            <tr>
                <td align="center" height="25" bgcolor="#FFFFFF"><?=$item['ttime']?></td>
                <td align="center" height="25" bgcolor="#FFFFFF"><?=$item['qishu']?></td>
                <td align="center" height="25" bgcolor="#FFFFFF"><?=$item['user']?></td>
                <td align="center" height="25" bgcolor="#FFFFFF"><?=$item['status']?></td>
                <td align="center" height="25" bgcolor="#FFFFFF"><a href="<?=$item['path']?>" >����</a></td>
            </tr>
            <?
            }
            ?>
        </tbody>
    </table>
</body>