<!DOCTYPE html>
<html>
<head>
	<title>读取并显示文件</title>
	<?php 
	$file = fopen('names.txt','r');
	$content = fread($file,filesize('names.txt'));
	var_dump($content);
	 ?>
	 <script type="text/javascript">
	 	window.onload() = function(){
	 		//开始替换文本
	 	}
	 </script>
</head>
<body>

	<table>
		<tr>
			<th>&nbsp;&nbsp;&nbsp;id &nbsp;&nbsp;&nbsp; </th>
			<th>&nbsp;&nbsp;&nbsp;姓名&nbsp;&nbsp;&nbsp;  </th>
			<th> &nbsp;&nbsp;&nbsp;年龄 &nbsp;&nbsp;&nbsp; </th>
			<th>&nbsp;&nbsp;&nbsp;个人主页&nbsp;&nbsp;&nbsp;</th>
		</tr>
	</table>

</body>
</html>