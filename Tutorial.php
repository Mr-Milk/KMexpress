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
		width: 280px;
	}

	#yuanjiao5 {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 18px 10px 10px;
		width: 280px;
	}

	#yuanjiao6 {
		font-family: Arial;
		border: 2px solid #379082;
		border-radius: 20px;
		padding: 10px 18px 10px 10px;
		width: 280px;
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

	function change_sur(cancer) {
		var val = document.getElementsByName("database");
		var sur = /_sur/;

		for (var i = 0; i < val.length; i++) {
			if (val[i].checked == true) {
				var can = cancer + "_sur_para";
				if (sur.test(val[i].value)) {
					document.getElementById(can).style.display = "block";
				} else {
					document.getElementById(can).style.display = "none";
				}

			}
		}
		//document.getElementById("myForm").submit();


	}

	function changecolor(ttt, ttt2, ttt3) {
		var tt = ttt;
		var tt2 = ttt2;

		if (document.getElementById("t1") != null) {
			document.getElementById("t1").style.background = "#FFF";
			document.getElementById("t1").style.color = "#000";
			document.getElementById("box1").style.display = "none";
		}
		if (document.getElementById("t2") != null) {
			document.getElementById("t2").style.background = "#FFF";
			document.getElementById("t2").style.color = "#000";
			document.getElementById("box2").style.display = "none";
		}
		if (document.getElementById("t3") != null) {
			document.getElementById("t3").style.background = "#FFF";
			document.getElementById("t3").style.color = "#000";
			document.getElementById("box3").style.display = "none";
		}
		if (document.getElementById("t4") != null) {
			document.getElementById("t4").style.background = "#FFF";
			document.getElementById("t4").style.color = "#000";
			document.getElementById("box4").style.display = "none";
		}
		if (document.getElementById("t5") != null) {
			document.getElementById("t5").style.background = "#FFF";
			document.getElementById("t5").style.color = "#000";
			document.getElementById("box5").style.display = "none";
		}
		if (document.getElementById("t6") != null) {
			document.getElementById("t6").style.background = "#FFF";
			document.getElementById("t6").style.color = "#000";
			document.getElementById("box6").style.display = "none";
		}
		if (document.getElementById("t7") != null) {
			document.getElementById("t7").style.background = "#FFF";
			document.getElementById("t7").style.color = "#000";
			document.getElementById("box7").style.display = "none";
		}
		if (document.getElementById("t8") != null) {
			document.getElementById("t8").style.background = "#FFF";
			document.getElementById("t8").style.color = "#000";
			document.getElementById("box8").style.display = "none";
		}
		if (document.getElementById("t9") != null) {
			document.getElementById("t9").style.background = "#FFF";
			document.getElementById("t9").style.color = "#000";
			document.getElementById("box9").style.display = "none";
		}
		if (document.getElementById("t10") != null) {
			document.getElementById("t10").style.background = "#FFF";
			document.getElementById("t10").style.color = "#000";
			document.getElementById("box10").style.display = "none";
		}
		if (document.getElementById("t11") != null) {
			document.getElementById("t11").style.background = "#FFF";
			document.getElementById("t11").style.color = "#000";
			document.getElementById("box11").style.display = "none";
		}
		if (document.getElementById("t12") != null) {
			document.getElementById("t12").style.background = "#FFF";
			document.getElementById("t12").style.color = "#000";
			document.getElementById("box12").style.display = "none";
		}
		if (document.getElementById("t13") != null) {
			document.getElementById("t13").style.background = "#FFF";
			document.getElementById("t13").style.color = "#000";
			document.getElementById("box13").style.display = "none";
		}
		if (document.getElementById("t14") != null) {
			document.getElementById("t14").style.background = "#FFF";
			document.getElementById("t14").style.color = "#000";
			document.getElementById("box14").style.display = "none";
		}
		if (document.getElementById("t15") != null) {
			document.getElementById("t15").style.background = "#FFF";
			document.getElementById("t15").style.color = "#000";
			document.getElementById("box15").style.display = "none";
		}


		document.getElementById(tt).style.background = "#CCC";
		document.getElementById(tt).style.color = "#FFF";
		document.getElementById(tt2).style.display = "block";
		document.getElementById("ifr1").src = ttt3;

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

$genes = strtoupper($_GET['genes']);
$cancer = $_GET['cancer'];
$str = $cancer . "_measure";
$measure = $_GET[$str];
$bifurcate = $_GET['bifurcate'];
#$color=$_GET['color'];

$database = $_GET['database'];

$sur = 0;
#echo "$database";
if (preg_match("/_sur/", $database)) {
	$database = str_replace("_sur", "", $database);
	$sur = 1;
}

#echo "$database<br>$genes<br>$sur<br>";

if ($database != "" and $genes != "") {


	$gene_arr = "";
	$genes_tmp = explode("/\n/", $genes);
	for ($i = 0; $i < count($genes_tmp); $i++) {
		$genes_tmp2 = explode("/,/", $genes_tmp[$i]);
		for ($j = 0; $j < count($genes_tmp2); $j++) {
			$gene_arr .= $genes_tmp2[$j] . ",";
		}
	}






	$day = date("d");
	$ss2 = `Rscript ./Rscripts/main.R $cancer/$database.RData $gene_arr`;
	$nogene = "";

	if (preg_match("\"ok\"", $ss2)) {
		$filesnames = scandir("./res_tmp");
		for ($i = 0; $i < count($filesnames); $i++) {
			if (!preg_match("/^\./", $filesnames[$i])) {
				if (($day - $filesnames[$i]) > 2) {
					del_dir("./res_tmp" . "/" . $filesnames[$i]);
				} elseif (($day - $filesnames[$i]) < 0) {
					if (($day - $filesnames[$i] + 28) > 1) {
						del_dir("./res_tmp" . "/" . $filesnames[$i]);
					}
				}
			}
		}

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
		#echo("Rscript ./Rscripts/test_survival_V3.R $cancer/$database.txt ./res_tmp/$day/$output_name");
		if ($sur == "1") {
			$ss = `Rscript ./Rscripts/test_survival_V5_sur.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate `;
			echo "Rscript ./Rscripts/test_survival_V5_sur.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate --1";

			$database .= "_sur";
		} else {
			$ss = `Rscript ./Rscripts/test_survival_V5.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate `;
			echo "Rscript ./Rscripts/test_survival_V5.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate --2";
		}
	} else {
		$nogene = "There is no gene information in the database<br>";
	}
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


	<form action="index.php" method="get" id="myForm">
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
							<td width="250" align="top" valign="top"><?php require("analysis_pane.php"); ?></td>


							<td align="left" valign="top" width="250">
								<div id="yuanjiao4" <?php if ($database != "" and $genes != "") {
														echo " style=\"display:none\"";
													} ?>>
									<table width="100%">
										<tr>
											<td align="left">
												<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Tutorial</span>
											</td>
										</tr>
										<tr>
											<td>
												<hr />
											</td>
										</tr>
										<tr>
											<td><span style="line-height:1.5">

													<b style="line-height:2.2">Step 1 Input gene(s) </b><br>
													The <b>Analysis</b> panel allows users to input one gene or multiple genes of interested. Users must input the official gene symbols to query its significance of prognostic marker or expression level in different subgroup of patients or different cell lines.


													<img src="images/Slide01.png" width="550" height="174" /><br><br>



													<b style="line-height:2.2">Step 2 Survival analysis based on TCGA dataset</b><br>
													For the survival analysis, the RNA-seq data available is from TCGA. The survival outcome is overall survival or/and recurrence free survival. Different bifurcates are used to divide the patients into two groups, one group highly express input gene, the other lowly express the input gene. For median/average/25%/75% cutoff, higher than the threshold corresponds to highly express group, others are lowly express group. For Q3Q1, highly expressed group represents patients with input gene expression >75% patients, while the lowly expressed group represent patients with input gene expression
													<25% patients. <img src="images/Slide02.png" width="550" height="311" /><br><br>
													<b style="line-height:2.2">Survival results</b><br>
													The <b>Result</b> panel shows all available clinical information. Click one tab will show detailed output information. Click any png file, it will appear at <b>Plot</b> panel. If you need to look at the high resolution figure, click PDF format figure and download it. <br>
													Kaplan-Miere plot shows the survival between patients highly express input gene and patients lowly express input genes. Hazard ratio (HR) and p value from log-rank test are provided. If input multiple genes, their expression value will be averaged. The survival analysis is performed for the averaged gene. Users can download the raw data to do survival analysis by themselves. There is no Kaplan-Miere plot if the survival time is not available for all those patients who are dead or experienced recurrence of the disease. For TCGA dataset, the expression of input gene(s) is also compared according to different clinicopathological groups.


													<img src="images/Slide03.png" width="550" height="306" /><br><br>
													<b style="line-height:2.2">Step 3 Expression analysis in patients</b><br>
													Select one patient dataset for expression analysis. Expression level of input gene can be shown in different groups of patients based on different clinicopathologic parameters. The raw data of gene expression is available to download for further differential analysis.




													<img src="images/Slide04.png" width="550" height="349" /><br><br>
													<b style="line-height:2.2">Results for expression analysis in patients</b><br>
													The figures show the input gene expression in each group of patients, according to different clinical information. For example, the users can compare the expression in patients with different pathologic stage, pT2c, pT3a and pT3b in dataset SRP005908. Users can download the raw data to do differential expression analysis using KM-Express. The fold change and p value is also provided via “PValue” for all pairwise comparisons when there are at least three samples in each group. The description of the clinicopathological parameters is also provided within the boxplot. Also, the expression can be compared in normal, tumor and metastatic groups. Narrow interquartile range (IQR) represents small variation or small sample size.


													<img src="images/Slide05.png" width="550" height="415" /><br><br>
													<b style="line-height:2.2">Step 4 Expression analysis in cell lines</b><br>
													Select one cell line dataset for expression analysis.



													<img src="images/Slide06.png" width="550" height="390" /><br><br>

													<b style="line-height:2.2">Results for expression analysis on cell lines</b><br>
													The <b>Result</b> panel shows all available cell line information. For example, in GSE25183 cell line dataset, the available information is fusion status, phenotype (benign or cancer) and cell line types. Click one tab will show detailed output information. Click any png file, it will appear at <b>Plot</b> panel. If you need to look at the high resolution figure, click PDF format figure and download it. Narrow interquartile range (IQR) represents small variation or small sample size. The fold change and p value is also provided via “PValue” for all pairwise comparisons when there are at least three samples in each group.


													<img src="images/Slide07.png" width="550" height="389" /><br><br>
													<img src="images/Slide08.png" width="550" height="381" /><br><br>

													<b style="line-height:2.2">Step 5 Differential significance</b><br>
													Once the expression value is downloaded from the KM-Express, differential significance can be used to evaluate the significance of the expression difference. Enter gene expression level in two groups in the two boxes, respectively. The gene expression level in samples can be split by comma "," , tab "\t" or enter "\n". The users can also download the expression of input genes from the "Gene expression analysis". After the expression data are ready, the users can start to run the differential significance analysis.


													<img src="images/Slide09.png" width="550" height="346" /><br><br>
													The <b>Result </b> panel shows the gene expression distribution in each group. p value is also provided, calculated from Mann Whitney U test and Student's t-test.
													<img src="images/Slide10.png" width="550" height="342" /><br><br>
												</span>





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