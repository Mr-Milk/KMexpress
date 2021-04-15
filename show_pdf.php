<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="shortcut icon" href="#" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>KM-Express</title>
</head>
<style>
	.s1 {
		width: 250px;
	}
</style>
<style>
	.a1:link {
		text-decoration: none;
	}

	.a1:visited {
		text-decoration: none;
	}

	.a1:hover {
		text-decoration: none;
	}

	.a1:active {
		text-decoration: none;
	}
</style>
<style type="text/css">
	#yuanjiao {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 18px 10px 10px;
		width: 300px;
	}

	#yuanjiao2 {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 18px 10px 10px;
		width: 830px;
	}
</style>

<body>

	<?php
	$file = $_GET['file'];
	#echo "$file<br>";
	if (preg_match("/pdf$/", $file)) {
		echo "<embed src=\"$file\" width=\"800\" height=\"1000\"bgcolor=\"#FFF\">";
	}

	?>



</body>

</html>