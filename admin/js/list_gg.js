function go_page(u, p) {
	if (u != null && p != null) {
		u = u + "&page=" + p;
		window.location.href = u;
	}
}
function show_win_gg(class3, sum_m, rate, ds, class1, class2) {
	$("ag_count").innerHTML = rate;
	var number_array = class2.split(",");
	var c3_array = class3.split(",");
	var number_count = number_array.length - 1;
	var showhtml = "����:" + number_count + "��1" + "<br>";
	for (var i = 0; i < number_count; i++) {
		var y = i * 2;
		showhtml = showhtml + "<font color='red' class='fontsize'>" + number_array[i] + "</font>-<font color='green' class='fontsize'>" + c3_array[y] + "</font>@<font color='blue' class='fontsize'>" + c3_array[y + 1] + "</font><br>";
	}
	$("ag1_c").innerHTML = showhtml;
	document.form1.sum_m.value = sum_m;
	document.form1.rate.value = rate;
	document.form1.ds.value = ds;
	document.form1.class1.value = class1;
	document.form1.class3.value = class3;
	document.form1.class2.value = class2;
	$("rs_window").style.top = Y;
	$("rs_window").style.left = X;
	$("rs_window").style.display = "block";
}
function init() {

	if (http_request.readyState == 4) {

		if (http_request.status == 0 || http_request.status == 200) {
			severtime = new Date(http_request.getResponseHeader("Date"));
			dq_time = severtime;
			lj_time = 1;
			var result = http_request.responseText;
			if (result == "") {

				result = "Access failure ";

			}
			var arrResult = result;
			$("list_div").innerHTML = arrResult;

		} else {//http_request.status != 200

			return false;

		}

	}

}
function UpdateRate(commandName, inputID, cellID, strPara) {

	//���ܣ���strPara���������͸�rake_updateҳ�棬�������ؽ���ش�
	//���������	inputID,cellID:Ҫ��ʾ�������ݵ�ҳ��ؼ���
	//		strPara���������͸�rake_updateҳ��Ĳ���
	//class1:���1
	//ids:(��class2)�������Ϊ��A����B��qtqt:�������ȣ�lxlx��������1Ϊ�ӣ�����Ϊ��
	//class3:���������

	switch (commandName) {
		case "MODIFYRATE":
			//��������
			{
				var strResult = sendCommand(commandName, "rake_update.php", strPara);
				clearTimeout(timeoutProcess);
				makeRequest("no");
				break;
			}
		default:
			//�������
			{
				break;
			}
	}
}