<?php
//��ȡ��Ա��ˮ��Ϣ����������$iiΪUID,$bΪ�û���
//���ذ�����ˮ����
function get_member_ds($ii, $b)
{
	global $db1;
	if ($ii != "" && $b != "") {
		$result = $db1->query("select * from  web_user_ds where  username='" . $b . "' and lx=0 order by ds_id ");
		$ds_array = array();
		$y = 0;
		while ($us_ds = $result->fetch_assoc()) {
			$y++;
			$ds_array[$us_ds['ds_lb']] = $us_ds;
		}
		$array = $ds_array;
		return $array;
	} else {
		return false;
	}
}
//��ȡ��˾��ˮ��Ϣ����
//���ذ�����ˮ����
function get_config_ds($time = 20)
{
	global $db1;
	$result = $db1->query("select * from  web_config_ds order by id");
	$ds_array = array();
	$y = 0;
	while ($config_ds = $result->fetch_assoc()) {
		$y++;
		$ds_array[$config_ds['ds_lb']] = $config_ds;
	}
	$array = $ds_array;
	return $array;
}
//��ȡ��Ա�ϼ���ˮ��Ϣ����������$iiΪUID,$bΪ�ϼ��û���
//���ذ�����ˮ����
function get_agent_ds($ii, $b)
{
	global $dblabel, $db1;
	if ($ii != "" && $b != "") {
		$result = $db1->query("select * from  web_user_ds where  username='" . $b . "' and lx>0 order by ds_id ");
		$ds_array = array();
		$y = 0;
		while ($us_ds = $result->fetch_assoc()) {
			$y++;
			$ds_array[$us_ds['ds_lb']] = $us_ds;
		}
		$array = $ds_array;
		return $array;
	} else {
		return false;
	}
}
//��ȡ��Ա�ϼ��û���Ϣ����������$iiΪUID,$bΪ�ϼ��û���
//���ذ����û���Ϣ����
function get_agent($ii, $b)
{
	global $dblabel, $db1;
	if ($ii != "" && $b != "") {
		$result = $db1->query("select * from  web_agent where  kauser='" . $b . "'  order by id LIMIT 1");
		$user_array = array();
		$us = $result->fetch_assoc();
		$user_array = $us;
		$array = $user_array;
		return $array;
	} else {
		return false;
	}
}
//��ȡ������Ϣ����������$c(class2)Ϊ�ж�
//���ذ���������Ϣ����
function get_bl($c, $time = 6)
{
	global $db1;
	switch ($c) {
		case "��A":
			$sql = "select * from web_bl where  class1='����' and (class2='" . $c . "' or class2='����') order by id";
			break;
		case "��B":
			$sql = "select * from web_bl where  class1='����' and (class2='" . $c . "' or class2='����') order by id";
			break;
		case "��A":
			$sql = "select * from web_bl where  (class1='����' and class2='" . $c . "') or class2='�ܷ�' order by id";
			break;
		case "��B":
			$sql = "select * from web_bl where  (class1='����' and class2='" . $c . "') or class2='�ܷ�' order by id";
			break;
		case "�벨":
			$sql = "select * from web_bl where  class1='�벨' order by id";
			break;
		case "����1-6":
			$sql = "select * from web_bl where  class1='����1-6' order by id";
			break;
		case "����":
			$sql = "select * from web_bl where  class1='����' order by id";
			break;
		case "��1��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "��2��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "��3��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "��4��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "��5��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "��6��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "��ȫ��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "��ȫ��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "���ж�":
			$sql = "select * from web_bl where  class1='����' and (class2='���ж��ж�' or class2='���ж�����') order by id";
			break;
		case "���ж��ж�":
			$sql = "select * from web_bl where  class1='����' and class2='���ж��ж�' order by id";
			break;
		case "���ж�����":
			$sql = "select * from web_bl where  class1='����' and class2='���ж�����' order by id";
			break;
		case "��ȫ��":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "������":
			$sql = "select * from web_bl where  class1='����' and (class2='����������' or class2='�������ж�') order by id";
			break;
		case "����������":
			$sql = "select * from web_bl where  class1='����' and class2='����������' order by id";
			break;
		case "�������ж�":
			$sql = "select * from web_bl where  class1='����' and class2='�������ж�' order by id";
			break;
		case "�ش�":
			$sql = "select * from web_bl where  class1='����' and class2='" . $c . "' order by id";
			break;
		case "һФ":
		case "��Ф":
		case "��Ф":
		case "һФ����":
			$sql = "select * from web_bl where  class1='��Ф' and class2='" . $c . "' order by id";
			break;
		case "��Ф����":
		case "��Ф������":
		case "��Ф����":
		case "��Ф������":
		case "��Ф����":
		case "��Ф������":
		case "��Ф����":
		case "��Ф������":
			$sql = "select * from web_bl where  class1='��Ф��' and class2='" . $c . "' order by id";
			break;
		case "һФ��":
		case "��Ф��":
		case "��Ф��":
		case "��Ф��":
		case "��Ф��":
			$sql = "select * from web_bl where  class1='��Ф��' and class2='" . $c . "' order by id";
			break;
		case "β��":
		case "β������":
			$sql = "select * from web_bl where  class1='β��' and class2='" . $c . "' order by id";
			break;
		case "β����":
			$sql = "select * from web_bl where  class1='β����' and class2='" . $c . "' order by id";
			break;
		case "��β����":
		case "��β������":
		case "��β����":
		case "��β������":
		case "��β����":
		case "��β������":
			$sql = "select * from web_bl where  class1='β����' and class2='" . $c . "' order by id";
			break;
		case "�岻��":
		case "������":
		case "�߲���":
		case "�˲���":
		case "�Ų���":
		case "ʮ����":
		case "ʮһ����":
		case "ʮ������":
			$sql = "select * from web_bl where  class1='��ѡ����' and class2='" . $c . "' order by id";
			break;
		case "����һ":
		case "����һ":
		case "����һ":
		case "����һ":
		case "����һ":
		case "ʮ��һ":
		case "����һ":
			$sql = "select * from web_bl where  class1='����һ' and class2='" . $c . "' order by id";
			break;
		default:
			$sql = "select * from web_bl where   class2='" . $c . "' order by id";
			break;
	}
	$result = $db1->query($sql);
	$bl_array = array();
	$y = 0;
	while ($bl = $result->fetch_assoc()) {
		$y++;
		$bl_array[$y] = $bl;
	}
	$array = $bl_array;
	return $array;
}
