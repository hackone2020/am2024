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
			var arrResult = result.split("###");
			RemoveRow(); //ɾ����ǰ������.
			for (var i = 0; i < arrResult.length - 1; i++) {
				arrTmp = arrResult[i].split("@@@");
				num2 = "<strong><center>" + arrTmp[2] + "</center></strong>"; //�ֶ�num2��ֵ
				if (i == (arrResult.length - 2)) {
					num2 = "<center><font color=ff0000>�ܼ�</font></center>"
					num1 = "<center>&nbsp;</center>";
				} else {
					num1 = "<strong><center>" + arrTmp[0] + "</center></strong>"; //�ֶ�num1��ֵ
				}
				num3 = "<center>" + arrTmp[3] + "</center>"; //�ֶ�num3��ֵ
				//��ע���
				if (i != (arrResult.length - 2) && arrTmp[4] != "" && arrTmp[4] != 0) {
					var strtmp = "main.php?action=list_look&uid=" + uid + "&kithe=" + kithe + "&class1=" + ids + "&class3=" + arrTmp[1];
					num4 = "<center><button class=btn1 onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onClick=ops('" + strtmp + "',400,750) >" + arrTmp[4] + "</button></center>"; //�ֶ�num4��ֵ
				} else {
					num4 = "<center>" + arrTmp[4] + "</center>"; //�ֶ�num4��ֵ
				}
				num5 = "<center>" + arrTmp[5] + "</center>"; //�ֶ�num5��ֵ
				num6 = "<center>" + arrTmp[6] + "</center>"; //�ֶ�num6��ֵ
				//��ʾ�߷�
				if (kithe == kithe_num) {
					num7 = "<center>" + arrTmp[7] + "</center>"; //�ֶ�num7��ֵ
				} else {
					num7 = "<center>&nbsp;</center>"; //�ֶ�num7��ֵ
				}
				//�߷ɽ��
				if (i != (arrResult.length - 2) && arrTmp[8] != "" && arrTmp[8] != 0) {
					var strtmp = "look.html?action=list_look&uid=" + uid + "&kithe=" + kithe + "&lx=5&class1=" + ids + "&class3=" + arrTmp[1];
					num8 = "<center><button class=btn1 onmouseover=this.className='btn2';return true; onMouseOut=this.className='btn1';return true; onClick=ops('" + strtmp + "',400,750) >" + arrTmp[8] + "</button></center>"; //�ֶ�num8��ֵ
				} else {
					num8 = "<center>" + arrTmp[8] + "</center>"; //�ֶ�num8��ֵ
				}
				if (i < 21) {
					row1 = document.getElementById("tb10").insertRow(document.getElementById("tb10").rows.length);
					row1.bgColor = '#FFFFFF';
					row1.height = "28px";
					cell1 = row1.insertCell(0);
					cell1.innerHTML = num1;
					cell2 = row1.insertCell(1);
					cell2.innerHTML = num2;
					cell3 = row1.insertCell(2);
					cell3.innerHTML = num3;
					cell4 = row1.insertCell(3);
					cell4.innerHTML = num4;
					cell5 = row1.insertCell(4);
					cell5.innerHTML = num5;
					cell6 = row1.insertCell(5);
					cell6.innerHTML = num6;
					cell7 = row1.insertCell(6);
					cell7.innerHTML = num7;
					cell8 = row1.insertCell(7);
					cell8.innerHTML = num8;
				}
				// }else if (i < 20)
				// {
				// 	row1 = document.getElementById("tb20").insertRow(document.getElementById("tb20").rows.length);
				// 	row1.bgColor='#FFFFFF';
				// 	row1.height="28px";
				// 	cell1 = row1.insertCell(0);
				// 	cell1.innerHTML = num1;
				// 	cell2 = row1.insertCell(1);
				// 	cell2.innerHTML = num2;
				// 	cell3 = row1.insertCell(2);
				// 	cell3.innerHTML = num3;
				// 	cell4 = row1.insertCell(3);
				// 	cell4.innerHTML = num4;
				// 	cell5 = row1.insertCell(4);
				// 	cell5.innerHTML = num5;
				// 	cell6 = row1.insertCell(5);
				// 	cell6.innerHTML = num6;
				// 	cell7 = row1.insertCell(6);
				// 	cell7.innerHTML = num7;
				// 	cell8 = row1.insertCell(7);
				// 	cell8.innerHTML = num8;
				// }
				else if (i < 42) {
					row1 = document.getElementById("tb30").insertRow(document.getElementById("tb30").rows.length);
					row1.bgColor = '#FFFFFF';
					row1.height = "28px";
					cell1 = row1.insertCell(0);
					cell1.innerHTML = num1;
					cell2 = row1.insertCell(1);
					cell2.innerHTML = num2;
					cell3 = row1.insertCell(2);
					cell3.innerHTML = num3;
					cell4 = row1.insertCell(3);
					cell4.innerHTML = num4;
					cell5 = row1.insertCell(4);
					cell5.innerHTML = num5;
					cell6 = row1.insertCell(5);
					cell6.innerHTML = num6;
					cell7 = row1.insertCell(6);
					cell7.innerHTML = num7;
					cell8 = row1.insertCell(7);
					cell8.innerHTML = num8;
				} 
				// else if (i < 40) {
				// 	row1 = document.getElementById("tb40").insertRow(document.getElementById("tb40").rows.length);
				// 	row1.bgColor = '#FFFFFF';
				// 	row1.height = "28px";
				// 	cell1 = row1.insertCell(0);
				// 	cell1.innerHTML = num1;
				// 	cell2 = row1.insertCell(1);
				// 	cell2.innerHTML = num2;
				// 	cell3 = row1.insertCell(2);
				// 	cell3.innerHTML = num3;
				// 	cell4 = row1.insertCell(3);
				// 	cell4.innerHTML = num4;
				// 	cell5 = row1.insertCell(4);
				// 	cell5.innerHTML = num5;
				// 	cell6 = row1.insertCell(5);
				// 	cell6.innerHTML = num6;
				// 	cell7 = row1.insertCell(6);
				// 	cell7.innerHTML = num7;
				// 	cell8 = row1.insertCell(7);
				// 	cell8.innerHTML = num8;
				// } 
				else if (i < 49) {
					row1 = document.getElementById("tb50").insertRow(document.getElementById("tb50").rows.length);
					row1.bgColor = '#FFFFFF';
					row1.height = "28px";
					cell1 = row1.insertCell(0);
					cell1.innerHTML = num1;
					cell2 = row1.insertCell(1);
					cell2.innerHTML = num2;
					cell3 = row1.insertCell(2);
					cell3.innerHTML = num3;
					cell4 = row1.insertCell(3);
					cell4.innerHTML = num4;
					cell5 = row1.insertCell(4);
					cell5.innerHTML = num5;
					cell6 = row1.insertCell(5);
					cell6.innerHTML = num6;
					cell7 = row1.insertCell(6);
					cell7.innerHTML = num7;
					cell8 = row1.insertCell(7);
					cell8.innerHTML = num8;
				} else {
					if (i > 48 && i < 62) {
						row1 = document.getElementById("tb2").insertRow(document.getElementById("tb2").rows.length);
						row1.bgColor = '#FFFFFF';
						row1.height = "28px";
						cell1 = row1.insertCell(0);
						cell1.innerHTML = num1;
						cell2 = row1.insertCell(1);
						cell2.innerHTML = num2;
						cell3 = row1.insertCell(2);
						cell3.innerHTML = num3;
						cell4 = row1.insertCell(3);
						cell4.innerHTML = num4;
						cell5 = row1.insertCell(4);
						cell5.innerHTML = num6;
						cell6 = row1.insertCell(5);
						cell6.innerHTML = num7;
						cell7 = row1.insertCell(6);
						cell7.innerHTML = num8;
					} else {
						row1 = document.getElementById("tb3").insertRow(document.getElementById("tb3").rows.length);
						row1.bgColor = '#FFFFFF';
						row1.height = "28px";
						cell1 = row1.insertCell(0);
						cell1.innerHTML = num2;
						cell2 = row1.insertCell(1);
						cell2.innerHTML = num3;
						cell3 = row1.insertCell(2);
						cell3.innerHTML = num4;
						cell4 = row1.insertCell(3);
						cell4.innerHTML = num8;
					}
				}
			}

		} else {//http_request.status != 200

			return false;

		}

	}

}

function RemoveRow() {
	//������һ�б�ͷ,�������ݾ�ɾ��.
	var iRows = document.getElementById("tb10").rows.length;
	for (var i = 0; i < iRows - 1; i++) {
		document.getElementById("tb10").deleteRow(1);
	}
	// var iRows = document.getElementById("tb20").rows.length;
	// for (var i = 0; i < iRows - 1; i++) {
	// 	document.getElementById("tb20").deleteRow(1);
	// }
	var iRows = document.getElementById("tb30").rows.length;
	for (var i = 0; i < iRows - 1; i++) {
		document.getElementById("tb30").deleteRow(1);
	}
	// var iRows = document.getElementById("tb40").rows.length;
	// for (var i = 0; i < iRows - 1; i++) {
	// 	document.getElementById("tb40").deleteRow(1);
	// }
	var iRows = document.getElementById("tb50").rows.length;
	for (var i = 0; i < iRows - 1; i++) {
		document.getElementById("tb50").deleteRow(1);
	}
	iRows = document.getElementById("tb2").rows.length;
	for (var i = 0; i < iRows - 1; i++) {
		document.getElementById("tb2").deleteRow(1);
	}
	iRows = document.getElementById("tb3").rows.length;
	for (var i = 0; i < iRows - 1; i++) {
		document.getElementById("tb3").deleteRow(1);
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