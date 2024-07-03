<?php 
//根据总页数，当前页数显示出分页选择按钮的HTML
function get_page_html($z,$d) {
  $html = '';
  //首页
  if ( $d <= 1){
      $html.='<a disabled="disabled" style="margin-right:5px;">首页</a>';
  }else{
      $html.='<a href="javascript:go_page(url,\'1\')" style="margin-right:5px;">首页</a>';
  }
  //上一页
  if ( $d <= 1){
      $html.='<a disabled="disabled" style="margin-right:5px;">上一页</a>';
  }else{
      $html.='<a href="javascript:go_page(url,\''.($d-1).'\')" style="margin-right:5px;">上一页</a>';
  }
  //开始值
  $ksz = $d-2;
  if($ksz <= 0){$ksz=1;}
  //结束值
  $jsz = $ksz +5;
  if($jsz > $z){$jsz=$z;}
  for ($i = $ksz; $i <= $jsz; $i++){
	  if ($i == $d){
	  $html.='<span style="margin-right:5px;font-weight:Bold;color:red;">'.$i.'</span>';
	  }else{
	  $html.='<a href="javascript:go_page(url,\''.$i.'\')" style="margin-right:5px;">'.$i.'</a>';
	  }
  }
  //下一页
  if ( $z <= 1 || $z == $d){
      $html.='<a disabled="disabled" style="margin-right:5px;">下一页</a>';
  }else{
      $html.='<a href="javascript:go_page(url,\''.($d+1).'\')" style="margin-right:5px;">下一页</a>';
  }  //尾页
  if ( $z <= 1 || $z == $d){
      $html.='<a disabled="disabled" style="margin-right:5px;">尾页</a>';
  }else{
      $html.='<a href="javascript:go_page(url,\''.$z.'\')" style="margin-right:5px;">尾页</a>';
  }
  //选择框
  $html.='&nbsp;&nbsp;跳转到:';
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