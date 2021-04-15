<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="shortcut icon" href="#" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Gene Data Analysis</title>

</head>
<style>
	.s1 {
		width: 250px;
	}
</style>
<style>
	.a1:link {
		color: #000;
		text-decoration: none;
	}

	.a1:visited {
		color: #000;
		text-decoration: none;
	}

	.a1:hover {
		color: #000;
		text-decoration: none;
	}

	.a1:active {
		color: #000;
		text-decoration: none;
	}

	.a2:link {
		color: #29807F;
		text-decoration: none;
	}

	.a2:visited {
		color: #29807F;
		text-decoration: none;
	}

	.a2:hover {
		color: #29807F;
		text-decoration: none;
	}

	.a2:active {
		color: #29807F;
		text-decoration: none;
	}
</style>
<style type="text/css">
	#yuanjiao {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 18px 10px 10px;
		width: 400px;
	}

	#yuanjiao3 {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 18px 10px 10px;
		width: 220px;
	}

	#yuanjiao5 {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 10px 10px 10px;
		width: 550px;
		height: 440px;
	}

	#yuanjiao6 {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 18px 10px 10px;
		width: 250px;
	}

	#yuanjiao2 {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 10px 10px 10px;
		width: 550px;
	}

	#yuanjiao4 {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 10px 10px 10px;
		width: 550px;
		height: 490px;
	}
</style>
<style>
	.v-align {
		float: left;
		height: 30px;
		width: auto;
		text-align: center;
		line-height: 30px;
		border-radius: 10px 10px 0 0;
	}
</style>

<script type="text/javascript">
	function change() {
		document.getElementById("yuanjiao4").style.display = "none";
	}

	function load1() {
		var text = document.getElementById("sample1");
		text.value = "3.821608182\n5.810959729\n5.418021241\n6.388590804\n5.315729242\n6.000950964\n5.888263488\n4.991113639\n6.175538573\n4.924964483\n4.821465324\n5.130663222\n5.811812654\n5.05696496";
	}

	function load2() {
		var text = document.getElementById("sample2");
		text.value = "4.439111123\n5.29520506\n4.398665036\n4.869126183\n5.816113265\n4.325127328\n5.071595363\n4.118409565\n5.216741979\n3.863353723\n4.612334804\n4.849153604\n4.62859281\n5.262139958";
	}
</script>



<?php

function del_dir($dir)
{
	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
		$str = `rmdir /s/q  $dir`;
	} else {
		$str = `rm -Rf  . $dir`;
	}
}

$sample1 = $_GET['sample1'];
$sample2 = $_GET['sample2'];
$group1 = $_GET['group1'];
$group2 = $_GET['group2'];
$show_intr = 0;
if (!isset($sample1) and !isset($sample2)) {
	$show_intr = 1;
}


#$def_val1="3.821608182\n5.810959729\n5.418021241\n6.388590804\n5.315729242\n6.000950964\n5.888263488\n4.991113639\n6.175538573\n4.924964483\n4.821465324\n5.130663222\n5.811812654\n5.05696496";
#$def_val2="4.439111123\n5.29520506\n4.398665036\n4.869126183\n5.816113265\n4.325127328\n5.071595363\n4.118409565\n5.216741979\n3.863353723\n4.612334804\n4.849153604\n4.62859281\n5.262139958";





if (!isset($group1)) {
	$group1 = "group1";
}
if (!isset($group2)) {
	$group2 = "group2";
}

if ($sample1 != "" and $sample2 != "") {


	$sample1_arr = "";
	preg_replace('/\t/', ',', $sample1);
	preg_replace('/\t/', ',', $sample2);
	preg_replace('/ /', ',', $sample1);
	preg_replace('/ /', ',', $sample2);
	preg_replace('/\r\n/', '', $sample1);
	preg_replace('/\r\n/', '', $sample2);
	preg_replace('/\n/', '', $sample1);
	preg_replace('/\n/', '', $sample2);
	preg_replace('/\r/', '', $sample1);
	preg_replace('/\r/', '', $sample2);

	$genes_tmp = explode("\n", $sample1);
	#preg_replace(' ','',$genes_tmp[0]);
	#echo "<br>$genes_tmp[0]<br>";
	#print_r($genes_tmp);
	for ($i = 0; $i < count($genes_tmp); $i++) {
		$genes_tmp2 = explode("/,/", $genes_tmp[$i]);
		for ($j = 0; $j < count($genes_tmp2); $j++) {
			#preg_replace('/ /','',$genes_tmp2[$j]);
			$sample1_arr .= $genes_tmp2[$j] . ",";
		}
	}



	$sample2_arr = "";
	$genes_tmp = explode("\n", $sample2);
	for ($i = 0; $i < count($genes_tmp); $i++) {
		$genes_tmp2 = explode("/,/", $genes_tmp[$i]);
		for ($j = 0; $j < count($genes_tmp2); $j++) {
			$sample2_arr .= $genes_tmp2[$j] . ",";
		}
	}


	#echo "<br>$sample1_arr<br>$sample2_arr<br>";

	$day = date("d");


	if (!file_exists("./res_tmp" . "/" . $day)) {
		mkdir("./res_tmp" . "/" . $day);
	}

	$output_name = time() . "-" . rand(1, 100000) . "-" . rand(1, 100000);
	if (!file_exists("./res_tmp/$day/$output_name")) {
		mkdir("./res_tmp/$day/$output_name");
	} else {
		$output_name = time() . "-" . rand(1, 100000) . "-" . rand(1, 100000);
		mkdir("./res_tmp/$day/$output_name");
	}

	#$sample1_arr=array_keys(array_flip($sample1_arr));
	#$sample2_arr=array_keys(array_flip($sample2_arr));
	#echo "1-$sample1_arr<br>2-$sample2_arr<br>";
	$ss = `Rscript ./Rscripts/t_test_and_MW_test.R $sample1_arr $sample2_arr ./res_tmp/$day/$output_name $group1 $group2`;
	#echo "Rscript ./Rscripts/t_test_and_MW_test.R $sample1_arr $sample2_arr ./res_tmp/$day/$output_name";
	#echo "$ss<br>";






}


?>


<script type="text/javascript">
	function showfiles_auto() {

		if (document.getElementById("cancer").value != "0") {
			document.getElementById("yuanjiao5").style.display = "block";
			document.getElementById("yuanjiao6").style.display = "none";
			var obj = document.getElementById("cancer").value;
			document.getElementById(obj).style.display = "block";

			var val = document.getElementsByName("database");
			var sur = /_sur/;

			for (var i = 0; i < val.length; i++) {
				if (val[i].checked == true) {
					var can = document.getElementById("cancer").value + "_sur_para";
					if (sur.test(val[i].value)) {
						document.getElementById(can).style.display = "block";
					} else {
						document.getElementById(can).style.display = "none";
					}

				}
			}

		}
	}

	function showfiles(id) {

		var objS = id;

		<?php
		$filesnames = scandir("./data/exp_data");
		echo "//$cancer\n";
		for ($i = 0; $i < count($filesnames); $i++) {
			if (!preg_match("/^\./", $filesnames[$i])) {
				echo "var id_tmp=\"" . $filesnames[$i] . "\";\n";
				echo "document.getElementById(id_tmp).style.display=\"none\";\n";
			}
		}
		?>
		document.getElementById(objS).style.display = "block";
		if (document.getElementById("cancer").value != "0") {
			document.getElementById("yuanjiao5").style.display = "block";
			document.getElementById("yuanjiao6").style.display = "none";
		}


		//if(document.getElementsByName("cancer").


	}
</script>

<body onload="showfiles_auto()">

	<form action="ttest.php" method="get" id="myForm">
		<table width="100%" align="left">

			<tr>
				<td>

					<?php require('head.php'); ?>

				</td>
			</tr>
			<tr>
				<td>
					<hr />
				</td>
			</tr>
			<tr>
				<td>
					<table width="100%" cellspacing="5" border="0">
						<tr>
							<td width="180" align="top" valign="top">
								<div id="yuanjiao3">
									<table>
										<tr>
											<td align="center">

												<table width="100%">
													<tr>
														<td align="left" colspan="2">
															<span style="color:#333;font-size:18px">&nbsp;Expression</span>
															<hr />
														</td>
													</tr>
													<tr>
														<td>
															<span style="font-size:12px">Group1:&nbsp;</span>
														</td>
														<td>
															<span style="font-size:12px"><input type="text" name="group1" value="<?php echo "$group1"; ?>" size="20" /></span>
														</td>
													</tr>

													<tr>
														<td align="left" colspan="2">

															<?php

															echo "<textarea name=\"sample1\" id=\"sample1\" rows=\"10\" cols=\"23\" style=\"text-transform:uppercase;color:#000000\"";
															echo ">$sample1</textarea>";

															?>

															<br /><span style="font-size:10px; color:gray">Splitted by ",", "\t" or "\n"</span><span style="font-size:10px;text-decoration:underline; color:gray" onclick="load1()">&nbsp;Example</span>

														</td>
													</tr>

												</table>

											</td>
										</tr>
										<tr>
											<td align="center">

												<table width="100%">
													<tr>
														<td align="left">
															<span style="font-size:12px">Group2:&nbsp;</span>
														</td>
														<td align="left">
															<span style="font-size:12px"><input type="text" name="group2" value="<?php echo "$group2"; ?>" size="20" /></span>
														</td>
													</tr>


													<tr>
														<td align="left" colspan="2">
															<?php

															echo "<textarea name=\"sample2\" id=\"sample2\" rows=\"10\" cols=\"23\" style=\"text-transform:uppercase;color:#000000\"";
															echo " onblur=\"change_color2()\" ";
															echo " onfocus=\"clear2()\" onclick=\"clear3()\"";
															echo ">$sample2</textarea>";

															?>
															<br /><span style="font-size:10px; color:gray">Splitted by ",", "\t" or "\n"</span><span style="font-size:10px;text-decoration:underline; color:gray" onclick="load2()">&nbsp;Example</span>
														</td>
													</tr>

												</table>

											</td>
										</tr>
										<tr>
											<td>
												<table width="100%" cellspacing="5">
													<tr>
														<td align="center">
															<hr />
															<input type="submit" value="Submit" onclick="change()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<input type="reset" value="Reset" />
														</td>
													</tr>
												</table>

								</div>
							</td>
						</tr>

					</table>

				</td>


				<td align="left" valign="top" width="250">
					<div id="yuanjiao4" <?php if ($show_intr == 0) {
											echo " style=\"display:none\"";
										} ?>>
						<table width="100%">
							<tr>
								<td align="left">
									<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Differential Expression</span>
								</td>
							</tr>
							<tr>
								<td>
									<hr />
								</td>
							</tr>
							<tr>
								<td>
									<p>The gene expression profiling could aid the physicians to better understand the role of interested genes in tumorigenesis and tumor progression. Different statistical tests are provided to determine the differential expression of the user-selected genes (Student’s t-test or Mann–Whitney U test) in two groups. Mann–Whitney U test is a nonparametric test. Gene expression distribution can also be shown in density plot.</p>
									<p>Input a list of number separated by line break to each of the box, then submit to run the statistic analysis. The output will show the gene expression distribution in group 1 and group 2. From the figure, it is easily to conclude which group highly expresses input gene, and the significance level will also be provided using both Student’s t-test or Mann–Whitney U test.
									</p>

									<br>
									<br>
									<br>
									<br>


								</td>
							</tr>
						</table>

					</div>
					<div id="yuanjiao5" <?php if ($show_intr == 1) {
											echo " style=\"display:none\"";
										} ?>>
						<table width="100%">
							<tr>
								<td align="left">
									<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Differential expression result</span>
								</td>
							</tr>
							<tr>
								<td>
									<hr />
								</td>
							</tr>
							<tr>
								<td><?php
									if (file_exists("./res_tmp/$day/$output_name/differential_p_value.png")) {
										echo "<img src=\"./res_tmp/$day/$output_name/differential_p_value.png\" width=\"400\" height=\"370\">";
									} else {
										echo "There is something wrong happened, <br>Please check your input list or contect us";
									}

									?>

								</td>
							</tr>
						</table>

					</div>

				</td>

				<td align="left" valign="top">&nbsp;


				</td>
				<td>&nbsp;</td>

			</tr>

		</table>
		</td>
		</tr>
		<tr>
			<td>
				<hr />

			</td>
		</tr>

		<tr>
			<td>
				<?php require('copyright.php'); ?>

			</td>
		</tr>
		<tr>
			<td>&nbsp;


			</td>
		</tr>
		<tr>
			<td>&nbsp;
			</td>
		</tr>
		</table>
	</form>







</body>

</html>