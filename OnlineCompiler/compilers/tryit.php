
<?php





?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css" media="screen">
	body{margin:0;background: #08F7FA}
	.header{height: 80px;}
	.menu{height: 50px; background:gold;}
	.content{height: 450px;background: white;}
	#browser{width: 55%; height:450px;   float: right ; border: 1px solid black;}
	#editor{width:40%;height:450px; float: left ;  border: 1px solid black; resize: none;}
	.menu input[type="button"] {margin-left:200px;width: 120px;height: 50px; }

		
	</style>
	<script>
		function myTRY()
		{
			var code= document.getElementById("editor").value;
			document.getElementById("browser").innerHTML=code;
		}




	</script>
</head>
<body>
	<div class="main">
		<div class="header"></div>
		<div class="menu">
			<input type="button" name="" value="RUN" onclick="myTRY()">
			<input type="submit" name="submit" value="submit">
		</div>
	
	<div class="content">
		<div id="browser"></div>
			<textarea name="" id="editor"></textarea>
			
			
		
	</div>
	</div>
</body>
</html>