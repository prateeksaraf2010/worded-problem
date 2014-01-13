<?php
$file=fopen("suggestions.txt","w+");
	$statement=$_POST['statement'];
	$class_name=$_POST['class_name'];
	$fun_name=$_POST['fun_name'];
	$no_of_args=$_POST['args'];
	$return=$_POST['return'];

	$add1c=$_POST['suggestfor1c'];
	$add2c=$_POST['suggestfor2c'];
	$add1j=$_POST['suggestfor1j'];
	$add2j=$_POST['suggestfor2j'];
$dim_ret=$_POST['dim_ret'];
	$add1c="1-".$add1c;
	$add2c="2-".$add2c;
	

		fwrite($file, $add1c);
			fwrite($file,";");
			fwrite($file,$add1j);
			fwrite($file,"|");
			fwrite($file, $add2c);
			fwrite($file,";");
			fwrite($file,$add2j);
			
			
  
			$a="";
	$arg1_series="";$arg2_series="";
	$argr_series="";
	fseek($file,0);
	$arg1=$_POST['arg1'];
	$type1=$_POST['type_arg1'];
	$dim1=$_POST['dim1'];
	if($arg1!=null){
		switch($dim1){
			case 0:
				$arg1_series="$type1 $arg1";
				break;
				
			case 1:

  if(fgetc($file)=='1');
  if(fgetc($file)=='-');
  {
  $arg1_series="$type1";
  $a=fgetc($file);
  while($a!=';'&&!feof($file))
  {
  

  $arg1_series=$arg1_series.$a;
  
  $a=fgetc($file);
  }
  $arg1_series= $arg1_series." ".$arg1;
  }
  
 		break;
		
			case 2:
			
  $a=fgetc($file);
  while($a!='2')
  $a=fgetc($file);
  
  
  if(fgetc($file)=='-');
  {
  $arg1_series="$type1";
  $a=fgetc($file);
  while($a!=';'&&!feof($file))
  {
  

  $arg1_series=$arg1_series.$a;
  
  $a=fgetc($file);
  }
  $arg1_series=$arg1_series." ".$arg1;
 
  }

 		break;
		
	}}
		
	fseek($file,0);
	$arg2=$_POST['arg2'];
	$type2=$_POST['type_arg2'];
	$dim2=$_POST['dim2'];
	if($arg2!=null){
		switch($dim2){
			case 0:
				$arg2_series="$type2 $arg2";
				break;
				
			case 1:

  if(fgetc($file)=='1');
  if(fgetc($file)=='-');
  {
  $arg2_series="$type2";
  $a=fgetc($file);
  while($a!=';'&&!feof($file))
  {
  

  $arg2_series=$arg2_series.$a;
  
  $a=fgetc($file);
  }
  $arg2_series= $arg2_series." ".$arg2;
  }
  
 		break;
			case 2:
			
  $a=fgetc($file);
  while($a!='2')
  $a=fgetc($file);
  
  
  if(fgetc($file)=='-');
  {
  $arg2_series="$type2";
  $a=fgetc($file);
  while($a!=';'&&!feof($file))
  {
  

  $arg2_series=$arg2_series.$a;
  
  $a=fgetc($file);
  }
  $arg2_series=$arg2_series." ".$arg2;
 
  }

 		break;
		
	}}
	
		fseek($file,0);
if($return!=null){
		switch($dim_ret){
			case 0:
				$argr_series="$return ";
				break;
				
			case 1:

  if(fgetc($file)=='1');
  if(fgetc($file)=='-');
  {
  $argr_series="$return ";
  $a=fgetc($file);
  while($a!=';'&&!feof($file))
  {
  

  $argr_series=$argr_series.$a;
  
  $a=fgetc($file);
  }
  $argr_series= $arg2_series." ";
  }
  
 		break;
			case 2:
			
  $a=fgetc($file);
  while($a!='2')
  $a=fgetc($file);
  
  
  if(fgetc($file)=='-');
  {
  $argr_series="$return ";
  $a=fgetc($file);
  while($a!=';'&&!feof($file))
  {
  

  $argr_series=$argr_series.$a;
  
  $a=fgetc($file);
  }
  $argr_series=$argr_series." ";
 
  }

 		break;
		
	}}
	
	
	$arg_list="$arg1_series,$arg2_series";
	
	$c_format="$argr_series$fun_name($arg_list){\n\n//&nbsp;&nbsp;&nbsp;&nbsp;Type your code here\n\n}";
	$java_format="public class $class_name{\n\n&nbsp;&nbsp;public $return $fun_name($arg_list){\n\n&nbsp;&nbsp;//&nbsp;&nbsp;Type your code here\n\n&nbsp;&nbsp;}\n\n}//end of class";
   fclose($file);
	?>
<!doctype html>
<html>
	<head></head>
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














