function init() {
 
    if (http_request.readyState == 4) {
   
        if (http_request.status == 0 || http_request.status == 200) {
			severtime= new Date(http_request.getResponseHeader("Date")); 
	        dq_time  = severtime;
			lj_time  = 1;
            var result = http_request.responseText;
            if(result==""){
           
                result = "Access failure ";
           
            }
		    var arrResult = result.split("###");	
		    RemoveRow(); //ɾ����ǰ������.
		    for(var i=0;i<arrResult.length-1;i++)
            {
				arrTmp = arrResult[i].split("@@@");
				num2 = "<strong><center>"+arrTmp[0]+"</center></strong>"; //�ֶ�num2��ֵ
				if (i==(arrResult.length-2)){
					num2="<center><font color=ff0000>�ܼ�</font></center>"
					num1 = "<center>&nbsp;</center>";
				}else{
					num1 = "<center>"+(i+1)+"</center>"; //�ֶ�num1��ֵ
				}
				num3 = "<center>"+arrTmp[1]+"</center>"; //�ֶ�num3��ֵ
				num4 = "<center>"+arrTmp[2]+"</center>"; //�ֶ�num4��ֵ
				num5 = "<center>"+arrTmp[3]+"</center>"; //�ֶ�num5��ֵ
				row1 = document.getElementById("tb1").insertRow(document.getElementById("tb1").rows.length);
				row1.bgColor='#FFFFFF';
				row1.height="28px";
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
            }
 
        } else {//http_request.status != 200
           
                return false;
       
        }
   
    }
 
}

function RemoveRow()
{
	//������һ�б�ͷ,�������ݾ�ɾ��.
	var iRows = document.getElementById("tb1").rows.length;
	for(var i=0;i<iRows-1;i++)
	{
		document.getElementById("tb1").deleteRow(1);
	}
}