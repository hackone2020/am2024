<?php
//���ݿ���Ϣ
$dbhost    = '127.0.0.1';
$dbuser    = 'rx2024';
$dbpwd     = '8tLDy2PStiHDjJd7';
$dbname    = 'rx2024';
$dbport    ='3306';
$maxmem    = 150;
$dblabel   = 'kkb';
unset($db1);
$db1 = new MYSQLi($dbhost,$dbuser,$dbpwd,$dbname,$dbport);
$db1->query("set NAMES 'GBK'");
if($db1->connect_error)
{
 die("ϵͳ��ѻ���...���Ժ���ˢ�·���!");	
}
?>