<!DOCTYPE html>
<html>

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
	body {
		margin-left: 0px;
		margin-right: 0px;
	}

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
		width: 730px;
	}
</style>

<body>
	<div id="yuanjiao2">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="left">
					&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#333;font-size:18px">
						<?php
						$file = $_GET['file'];
						$type = $_GET['type'];
						if (preg_match("/csv$/", $file)) {
							echo "RawData";
						} else {
							echo "Plot";
						}
						?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<hr />
				</td>
			</tr>
			<tr>
				<td valign="top">
					<?php
					if (preg_match("/csv$/", $file)) {
						echo "<a href=\"$file\">RawData</a>";
					}
					if (preg_match("/png$/", $file)) {
						$paramater_description = array();
						$myfile = fopen("misc/paramater_description.txt", "r");
						while (!feof($myfile)) {
							$arr = explode("\t", fgets($myfile));
							#$paramater_description[$arr[0]]=$arr[1];
							$paramater_description[$arr[0]] = isset($arr[1]) ? $arr[1] : null;
						}

						fclose($myfile);
						echo "<table cellspacing=\"3\"><tr>";
						echo "<td width=\"450\" valign=\"top\">";
						echo "  ";
						echo "<img src=\"$file\" width=\"450\" height=\"400\" bgcolor=\"#FFF\" >";
						echo "</td>";

						if (array_key_exists($type, $paramater_description)) {
							echo "<td width=\"280\" valign=\"bottom\">";
							echo "<span style=\"font-size:12px\"><b>$type</b><br>";
							echo $paramater_description[$type];
							echo "</span><br><br>";
						} else {
							echo "<td width=\"300\" valign=\"bottom\"\">";
						}
						echo "</td></table>";
					}
					?>
				</td>
			</tr>
			<tr>
				<td>


				</td>
			</tr>
			<tr>
				<td>&nbsp;
				</td>
			</tr>
		</table>
	</div>
</body>

</html>