<?php 
//������ҳ������ǰҳ����ʾ����ҳѡ��ť��HTML
function get_page_html($z,$d) {
  $html = '';
  //��ҳ
  if ( $d <= 1){
      $html.='<a disabled="disabled" style="margin-right:5px;">��ҳ</a>';
  }else{
      $html.='<a href="javascript:go_page(url,\'1\')" style="margin-right:5px;">��ҳ</a>';
  }
  //��һҳ
  if ( $d <= 1){
      $html.='<a disabled="disabled" style="margin-right:5px;">��һҳ</a>';
  }else{
      $html.='<a href="javascript:go_page(url,\''.($d-1).'\')" style="margin-right:5px;">��һҳ</a>';
  }
  //��ʼֵ
  $ksz = $d-2;
  if($ksz <= 0){$ksz=1;}
  //����ֵ
  $jsz = $ksz +5;
  if($jsz > $z){$jsz=$z;}
  for ($i = $ksz; $i <= $jsz; $i++){
	  if ($i == $d){
	  $html.='<span style="margin-right:5px;font-weight:Bold;color:red;">'.$i.'</span>';
	  }else{
	  $html.='<a href="javascript:go_page(url,\''.$i.'\')" style="margin-right:5px;">'.$i.'</a>';
	  }
  }
  //��һҳ
  if ( $z <= 1 || $z == $d){
      $html.='<a disabled="disabled" style="margin-right:5px;">��һҳ</a>';
  }else{
      $html.='<a href="javascript:go_page(url,\''.($d+1).'\')" style="margin-right:5px;">��һҳ</a>';
  }  //βҳ
  if ( $z <= 1 || $z == $d){
      $html.='<a disabled="disabled" style="margin-right:5px;">βҳ</a>';
  }else{
      $html.='<a href="javascript:go_page(url,\''.$z.'\')" style="margin-right:5px;">βҳ</a>';
  }
  //ѡ���
  $html.='&nbsp;&nbsp;��ת��:';
  $html.='<select name="pa" id="pa" onchange="go_page(url,this.options[this.selectedIndex].value)">';
  for ($i = 1; $i <= $z; $i++){
	  if ($i == $d){
	  $html.='<option value="'.$i.'" selected=selected '.'>'.$i.'</option>';
	  }else{
	  $html.='<option value="'.$i.'" '.'>'.$i.'</option>';
	  }
  }
  $html.='</select>';
  return $html;	
} 
?>