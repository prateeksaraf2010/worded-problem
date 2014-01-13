<?php
$file=fopen("suggestions.txt","r+");
	$statement=$_POST['statement'];
	$class_name=$_POST['class_name'];
	$fun_name=$_POST['fun_name'];
	$no_of_args=$_POST['args'];
	$return=$_POST['return'];
$dim_ret=$_POST['dim_ret'];
			$a="";$temp1="";$temp2="";
	$arg1_series="";$arg2_series="";
	$argr_series="";
	$arg1j_series="";$arg2j_series="";
	$argrj_series="";
	fseek($file,0);
	// for dimension 1
	  if(fgetc($file)=='1');
	  
  if(fgetc($file)=='-');
  {

  $a=fgetc($file);
  while($a!=';'&&!feof($file))
  {
  
   $temp1=$temp1.$a;
  
  $a=fgetc($file);
  }
  
  }
  
  //for dimension 2
	$a=fgetc($file);
  while($a!='2')
  $a=fgetc($file);
  
  
  if(fgetc($file)=='-');
  {

  $a=fgetc($file);
  while($a!=';'&&!feof($file))
  {
  

  $temp2=$temp2.$a;
   $a=fgetc($file);
  }
    }
	fclose($file);

	$arg1=$_POST['arg1'];
	$type1=$_POST['type_arg1'];
	$dim1=$_POST['dim1'];
	$arg1_series="$type1"." "."$arg1";
	$arg1j_series="$type1";
	if($arg1!=null){
		switch($dim1){
			case 0:			
				$arg1j_series=$arg1j_series." ".$arg1;
				break;
				
			case 1:			
				$arg1_series=$arg1_series.$temp1;
				 $arg1j_series=$arg1j_series.$temp1;
				 $arg1j_series= $arg1j_series." ".$arg1;	
				break;
		
			case 2:		
				$arg1_series=$arg1_series.$temp2;
				 $arg1j_series=$arg1j_series.$temp2;
				 $arg1j_series= $arg1j_series." ".$arg1;
				break;
		
	}}
	
	$arg2=$_POST['arg2'];
	$type2=$_POST['type_arg2'];
	$dim2=$_POST['dim2'];
	$arg2_series="$type2"." "."$arg2";
	$arg2j_series="$type2";
	
	if($arg2!=null){
		switch($dim2){
			case 0:				
				$arg2j_series=$arg2j_series." ".$arg2;
				break;
				
			case 1:			
				$arg2_series=$arg2_series.$temp1;
				 $arg2j_series=$arg2j_series.$temp1;
				 $arg2j_series= $arg2j_series." ".$arg1;
				break;
		
			case 2:		
				$arg2_series=$arg2_series.$temp2;
				 $arg2j_series=$arg2j_series.$temp2;
				 $arg2j_series= $arg2j_series." ".$arg1;
				break;
		
	}}
	
	$argr_series="$return" ;
	
if($return!=null){
		switch($dim_ret){
			case 1:
				$argr_series=$argr_series.$temp1." ";
				 break;
		
			case 2:
			$argr_series=$argr_series.$temp2." ";
			break;
		
	}
	
	}
	$arg_list="$arg1_series,$arg2_series";
	$argj_list="$arg1j_series,$arg2j_series";
	
	$c_format="$argr_series$fun_name($arg_list){\n\n//&nbsp;&nbsp;&nbsp;&nbsp;Type your code here\n\n}";
	$java_format="public class $class_name{\n\n&nbsp;&nbsp;public $return $fun_name($argj_list){\n\n&nbsp;&nbsp;//&nbsp;&nbsp;Type your code here\n\n&nbsp;&nbsp;}\n\n}//end of class";
   
	?>
<!doctype html>
<html>
	<head>
</head>
	<body>
		<input type="hidden" id="c_code" value="<?php echo $c_format;?>">
		<input type="hidden" id="java_code" value="<?php echo $java_format;?>">
		<div style="width:1000px;margin:20px auto 0px; padding:5px;">
			<h4><b>Problem Statement:</b></h4> <?php echo $statement;?><br><br>
			Enter your source code here:<br><br>
			<textarea style="width:600px; height:300px;font-size:18px;" id="area"><?php echo $c_format;?></textarea>
			<br><input type="button" id="c" value="C">&nbsp;&nbsp;<input type="button" id="java" value="Java">
		</div>
	</body>	
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var c_code=$('#c_code').val();
			java_code=$('#java_code').val();
			$('#c').click(function(){
				$('#area').html(c_code);
			});
			
			$('#java').click(function(){
				$('#area').html(java_code);
			});
			
		});
	</script>
</html>














