function init() {
 
    if (http_request.readyState == 4) {
   
        if (http_request.status == 0 || http_request.status == 200) {
       
            var result = http_request.responseText;
           
            if(result==""){
           
                result = "Access failure ";
           
            }
           
		    var arrResult = result.split("###");	
			for(var i=0;i<49;i++)
			{	   
				arrTmp = arrResult[i].split("@@@");
				num1 = arrTmp[0]; //�ֶ�num1��ֵ
				num2 = arrTmp[1]; //�ֶ�num2��ֵ
				num3 = arrTmp[2]; //�ֶ�num1��ֵ
				num4 = arrTmp[3]; //�ֶ�num2��ֵ
				var bl;
				bl="bl"+i;
				$(bl).innerHTML= num2;
				
				var gold;
				gold="gold"+i;
				$(gold).innerHTML= "<font color=ff6600>"+num4+"</font>";
			}
           
        } else {//http_request.status != 200
           
                return false;
       
        }
   
    }
 
}
function UpdateRate(commandName,inputID,cellID,strPara)
{
	//���ܣ���strPara���������͸�rake_updateҳ�棬�������ؽ���ش�
	//���������	inputID,cellID:Ҫ��ʾ�������ݵ�ҳ��ؼ���
	//		strPara���������͸�rake_updateҳ��Ĳ���
	//class1:���1
	//ids:(��class2)��ǲ���Ϊ��A����B��qtqt:�������ȣ�lxlx��������1Ϊ�ӣ�����Ϊ��
	//class3:���������
	switch(commandName)
	{
		case "MODIFYRATE":	//��������
			{
				var strResult = sendCommand(commandName,"rake_update.php",strPara);
				
				if (strResult!="")
				{
					clearTimeout(timeoutProcess);
					makeRequest("no");
					$(inputID).value=strResult;
					
				}
				break;
			}
		case "LOCK":		//�ر���Ŀ
			{


				var strResult=sendCommand(commandName,"rake_update.php",strPara);
				

				if (strResult!="")
				
				{
					if(strResult=='1')					
						$(inputID).checked=true;
					else
						$(inputID).checked=false;
				}else{
				
				
					$(inputID).checked=!$(inputID).checked;
				}
				break;
			}
		default:	//�������
	}
}