<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>KM-Express</title>
	<link rel="shortcut icon" href="#" />
</head>
<style type="text/css">
	.s1 {
		width: 250px;
	}
	.s2 {
		width: 150px;
	}
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
		width: 750px;
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
	function change(form) {
		document.getElementById("yuanjiao4").style.display = "none";
		if (form.genes.value == '') {
			alert("Please input genes!");
			form.genes.focus();
			return false;
		}
		if (form.cancer.value == '0') {
			alert("Please select cancer type!");
			form.cancer.focus();
			return false;
		}


		var k = 0;
		for (i = 0; i < document.getElementsByName("database").length; i++) {

			if (document.getElementsByName("database").item(i).checked) {
				k = 1;
			}

		}


		if (k == 0) {
			alert("Please select database!");
			//form.database.focus();
			return false;
		}


	}
	/*function change_sur(cancer,file){ 
		//var val=document.getElementsByName("database");
		var sur=/_TCGA/;
		
		var can=cancer+"_sur_para";
		if(sur.test(file)){
			document.getElementById(can).style.display="block";	
		}
		else{
			document.getElementById(can).style.display="none";
		}
		
	 } */
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
		if (document.getElementById("t16") != null) {
			document.getElementById("t16").style.background = "#FFF";
			document.getElementById("t16").style.color = "#000";
			document.getElementById("box16").style.display = "none";
		}


		document.getElementById(tt).style.background = "#CCC";
		document.getElementById(tt).style.color = "#FFF";
		document.getElementById(tt2).style.display = "block";
		document.getElementById("ifr1").src = ttt3;

	}
</script>



<?php
$database = "";
$bifurcate = "";
$str = "";
$cancer = "";

function del_dir($dir)
{
	if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
		$str = `rmdir /s/q  $dir`;
	} else {
		$str = `rm -Rf $dir`;
	}
}

#old code
#$genes=strtoupper($_GET['genes']);
#$cancer=$_GET['cancer'];
#$str=$cancer."_measure";
#$measure=$_GET[$str];
#$str=$cancer."_bifurcate";
#$bifurcate=$_GET[$str];

if (isset($_GET['genes'])) {
	$genes = strtoupper(htmlentities($_GET['genes'], ENT_QUOTES, 'UTF-8'));
	#	echo $genes;
}
if (isset($_GET['cancer'])) {
	$cancer = htmlentities($_GET['cancer'], ENT_QUOTES, 'UTF-8');
	#   echo $cancer;
}
if (isset($cancer)) {
	$str = $cancer . "_measure";
	#  echo $str;
}

if (isset($_GET[$str])) {
	$measure = htmlentities($_GET[$str], ENT_QUOTES, 'UTF-8');
	# echo $measure;
}

if (isset($cancer)) {
	$str = $cancer . "_bifurcate";
	#echo $str;
}

if (isset($_GET[$str])) {
	$bifurcate = htmlentities($_GET[$str], ENT_QUOTES, 'UTF-8');
	#	echo $bifurcate;
}

#$color=$_GET['color'];

#echo "$bifurcate<br>";

if (isset($_GET['database'])) {
	$database = htmlentities($_GET['database'], ENT_QUOTES, 'UTF-8');
	#       echo $bifurcate;
}
#$database=$_GET['database'];

$sur = 0;
#echo "$database<br>";

#echo "$database<br>$genes<br>$sur<br>";
$nogene = "";
if ($database != "" and $genes != "") {
	$gene_arr = "";
	$genes_tmp = explode("/\n/", $genes);
	for ($i = 0; $i < count($genes_tmp); $i++) {
		$genes_tmp2 = explode("/,/", $genes_tmp[$i]);
		for ($j = 0; $j < count($genes_tmp2); $j++) {
			$gene_arr .= $genes_tmp2[$j] . ",";
		}
	}

	$day = date("i");
	$ss2 = shell_exec("Rscript ./Rscripts/main.R $cancer/$database.RData $gene_arr");
	#echo "Rscript ./Rscripts/main.R $cancer/$database.RData $gene_arr<br>";
	#echo "$ss2<br>";

	if (preg_match("\"ok\"", $ss2)) {
		$filesnames = scandir("./res_tmp");
		for ($i = 0; $i < count($filesnames); $i++) {
			if (!preg_match("/^\./", $filesnames[$i])) {
				if (($day - $filesnames[$i]) > 30) {
					del_dir("./res_tmp" . "/" . $filesnames[$i]);
				} elseif (($day - $filesnames[$i]) < 0) {
					if (($day - $filesnames[$i] + 60) > 30) {
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

		$ss = shell_exec("Rscript ./Rscripts/test_survival_V6.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $bifurcate");
		#echo "Rscript ./Rscripts/test_survival_V6.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr  $bifurcate";
		#echo "$ss<br/><br/>";
	} else {
		$nogene = "There is no information of your input, please search other genes.<br>";
	}
} else {
	echo "<input type=\"hidden\" value=\"haha\" id=\"haha\" name=\"haha\">";
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

			//for(var i=0;i<val.length;i++){
			//	if(val[i].checked==true){
			//		var can=document.getElementById("cancer").value+"_sur_para";
			//		if(sur.test(val[i].value)){
			//			document.getElementById(can).style.display="block";	
			//		}
			//		else{
			//			document.getElementById(can).style.display="none";
			//		}

			//	}
			//}

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

	<form action="index.php" method="get" id="myForm" name="myForm">
		<table width="100%" align="left" border="0">

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
							<td width="280" align="top" valign="top">

								<?php require("analysis_pane.php"); ?>

							</td>


							<td align="left" valign="top" width="250">
								<div id="yuanjiao4" <?php if ($database != "" and $genes != "") {
														echo " style=\"display:none\"";
													} ?>>
									<table width="100%">
										<tr>
											<td align="left">
												<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Introducion</span>
											</td>
										</tr>
										<tr>
											<td>
												<hr />
											</td>
										</tr>
										<tr>
											<td>
												<p align="justify">The identification and functional characterization of novel biomarkers in cancer requires survival analysis as well as gene expression analysis of both patient samples and cell line models. We present KM-Express as a hypothesis generation tool for researchers to identify potential new prognostic RNA biomarkers and targets for downstream functional studies in cell based assays. By simultaneously providing survival analysis, cross-dataset and subgroup expression comparison, statistical test, experimental support from cell line and visualization tools, KM-Express is a one-stop analysis from bench work to clinical prospects. We have used this tool to successfully evaluate the prognostic potential of previously published biomarkers for prostate cancer and breast cancer. KM-Express will accelerate the translation of biomedical research from bench to bed.</p>
												<p>Keywords: prognostic, RNA-seq, survival, patient, cell line, web-tool</p>
												<br>


											</td>
										</tr>
									</table>





								</div>





								<?php
								if ($database != "" and $genes != "") {
									echo "<table width=\"850\" cellspacing=\"0\" border=\"0\" cellpadding=\"0\" >";
									echo "<tr>";
									echo "	<td>";
									echo "<div id=\"yuanjiao2\">";
									echo "<table width=\"100%\">";
									echo "<tr>";
									echo "<td align=\"left\">";
									echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color:#333;font-size:18px\">Result</span>";
									echo "</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td align=\"left\">";
									echo "<hr />";
									echo "</td>";
									echo "</tr>";
									echo "<tr>";
									echo "<td>";

									if ($nogene != "") {
										echo "$nogene<br>";
									} else {

										$filesnames = scandir("./res_tmp/$day/$output_name");
										$rr = 1;
										$box = "";
										$type = "";
										$file_fra = "";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/survival.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t14\" class=\"v-align\" onclick=\"changecolor('t14','box14','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=survival')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box14";
													$type = "survival";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Survival&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/clinical.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t8\" class=\"v-align\" onclick=\"changecolor('t8','box8','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=clinical')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box8";
													$type = "clinical";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Clinical&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/gleason.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t1\"  class=\"v-align\" onclick=\"changecolor('t1','box1','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=gleason')\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box1";
													$type = "gleason";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Gleason&nbsp;</div>";
												$rr = 0;
												break;
											}
										}

										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/grade.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t3\" class=\"v-align\" onclick=\"changecolor('t3','box3','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=grade')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box3";
													$type = "grade";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Grade&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/status.*png/", $filesnames[$i]) and !preg_match("/Fusion_status.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t4\" class=\"v-align\" onclick=\"changecolor('t4','box4','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=status')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box4";
													$type = "status";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Status&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/subtype.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t5\" class=\"v-align\" onclick=\"changecolor('t5','box5','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=subtype')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box5";
													$type = "subtype";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Subtype&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}

										/*for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/tumor_stage.*png/",$filesnames[$i])){
							echo "<div style='cursor: pointer !important;' id=\"t6\" class=\"v-align\" onclick=\"changecolor('t6','box6','show_res.php?file=./res_tmp/$day/$output_name/".$filesnames[$i]."&type=tumor_stage')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box6";
								$type="tumor_stage";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;Tumor_stage&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}*/

										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/Fusion_status.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t7\" class=\"v-align\" onclick=\"changecolor('t7','box7','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=Fusion_status')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box7";
													$type = "Fusion_status";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Fusion_status&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}

										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/stage.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t9\" class=\"v-align\" onclick=\"changecolor('t9','box9','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=stage')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box9";
													$type = "stage";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Stage&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/pathologic.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t10\" class=\"v-align\" onclick=\"changecolor('t10','box10','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=pathologic')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box10";
													$type = "pathologic";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Pathologic&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}

										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/Phenotype.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t11\" class=\"v-align\" onclick=\"changecolor('t11','box11','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=Phenotype')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box11";
													$type = "Phenotype";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Phenotype&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}


										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/residual.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t13\" class=\"v-align\" onclick=\"changecolor('t13','box13','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=residual')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box13";
													$type = "residual";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Residual&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/CellLine.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t16\" class=\"v-align\" onclick=\"changecolor('t16','box16','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=CellLine')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box16";
													$type = "CellLine";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;CellLine&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}
										############
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/tumor_cell_content.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t2\" class=\"v-align\" onclick=\"changecolor('t2','box2','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=tumor_cell_content')\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box2";
													$type = "tumor_cell_content";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Content&nbsp;</div>";
												$rr = 0;
												break;
											}
										}
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/lymphocyte_content.*png/", $filesnames[$i])) {
												echo "<div style='cursor: pointer !important;' id=\"t12\" class=\"v-align\" onclick=\"changecolor('t12','box12','show_res.php?file=./res_tmp/$day/$output_name/" . $filesnames[$i] . "&type=lymphocyte_content')\"  align=\"center\"";
												if ($rr == 1) {
													echo " style=\"background:#CCC;color:#FFF\"";
													$box = "box12";
													$type = "lymphocyte_content";
													$file_fra = $filesnames[$i];
												}
												echo ">";
												echo "&nbsp;&nbsp;Lymph&nbsp;";
												echo "</div>";
												$rr = 0;
												break;
											}
										}


										/* for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/Input_gene_expression/",$filesnames[$i])){
							echo "<div style='cursor: pointer !important;' id=\"t15\" class=\"v-align\" onclick=\"changecolor('t15','box15','show_res.php?file=./res_tmp/$day/$output_name/".$filesnames[$i]."&type=Input_gene_expression')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box15";
								$type="Input_gene_expression";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;RawData&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					} */


										if ($rr == 0) {
											echo "<br><div style=\"float:left;width:100%; height:6px; background:#CCC;\"></div>";
										} else {
											echo "&nbsp;&nbsp;&nbsp;&nbsp;The queried gene is lowly expressed in most samples of the selected dataset.<br>&nbsp;&nbsp;&nbsp;&nbsp;Please search other gene(s).<br>";
										}


										$rr = 1;
										echo "<div id=\"box14\" style=\"display:";
										if ($box == "box14") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/Overall_survival.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=survival\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "Input_gene_expression_Overall_survival.csv";

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}

												echo ")<br>";
											}
											if (preg_match("/Recurrence_free_survival.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=survival\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "Input_gene_expression_Recurrence_free_survival.csv";

												#echo " ./res_tmp/$day/$output_name/$raw_file ";

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}

												echo ")<br>";
											}
										}
										echo "</div>";


										echo "<div id=\"box8\" style=\"display:";
										if ($box == "box8") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/clinical.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=clinical\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";


										echo "<div id=\"box1\" style=\"display:";
										if ($box == "box1") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/gleason.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=gleason\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box2\" style=\"display:";
										if ($box == "box2") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/tumor_cell_content.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);

												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=tumor_cell_content\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box3\" style=\"display:";
										if ($box == "box3") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/grade.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=grade\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box4\" style=\"display:";
										if ($box == "box4") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											#echo "$filesnames[$i]";
											if (preg_match("/status.*png/", $filesnames[$i]) and !preg_match("/Fusion_status.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=status\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box5\" style=\"display:";
										if ($box == "box5") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/subtype.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=subtype\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										/*echo "<div id=\"box6\" style=\"display:";
				if($box=="box6"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/tumor_stage.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						$na2=explode("_",$na[0]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=tumor_stage\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";
						
						$raw_file="";
						$pv_file="";
						
						$raw_file="$na2[0]_expression_in_".$na[count($na)-2]."_$database.csv";
						$pv_file=str_replace("png","fc_pvalue.csv",$filesnames[$i]);
						
						if(file_exists("./res_tmp/$day/$output_name/$raw_file")){
							echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";	
						}
						if(file_exists("./res_tmp/$day/$output_name/$pv_file")){
							echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";	
						}
						echo ")<br>";
					}
				}
				echo "</div>";*/

										echo "<div id=\"box7\" style=\"display:";
										if ($box == "box7") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/Fusion_status.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=Fusion_status\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box9\" style=\"display:";
										if ($box == "box9") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/stage.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=stage\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box10\" style=\"display:";
										if ($box == "box10") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/pathologic.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=pathologic\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box11\" style=\"display:";
										if ($box == "box11") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/Phenotype.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box12\" style=\"display:";
										if ($box == "box12") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/lymphocyte_content.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=lymphocyte_content\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";

												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box13\" style=\"display:";
										if ($box == "box13") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/residual.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=residual\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												$raw_file = "";
												$pv_file = "";
												$raw_file = "$na2[0]_expression_in_" . $na[count($na) - 2] . "_$database.csv";
												$pv_file = str_replace("png", "fc_pvalue.csv", $filesnames[$i]);



												/*for($iii=0;$iii<count($filesnames);$iii++){
							if(preg_match("/".$na2[0].".*expression_in.*".$na[count($na)-2]."\..*\.csv/",$filesnames[$iii])){
								echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$filesnames[$iii]\">$filesnames[$iii]-RawData</a>";
							}
						}*/

												if (file_exists("./res_tmp/$day/$output_name/$raw_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$raw_file\">RawData</a>";
												}
												if (file_exists("./res_tmp/$day/$output_name/$pv_file")) {
													echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$pv_file\">PValue</a>";
												}


												/*for($iii=0;$iii<count($filesnames);$iii++){
							
							if(preg_match("/".$na2[0].".*".$na[count($na)-2]."\..*\.fc_pvalue\.csv/",$filesnames[$iii])){
								echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$filesnames[$iii]\">$filesnames[$iii]-Pvalue</a>";
							}
						}*/
												echo ")<br>";
											}
										}
										echo "</div>";

										echo "<div id=\"box16\" style=\"display:";
										if ($box == "box16") {
											echo "block";
										} else {
											echo "none";
										}
										echo ";width:100%;height:auto\"><br><br>";
										for ($i = 0; $i < count($filesnames); $i++) {
											if (preg_match("/CellLine.*png/", $filesnames[$i])) {
												$na = explode(".", $filesnames[$i]);
												$na2 = explode("_", $na[0]);
												echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]&type=CellLine\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
												$pdf_file = str_replace("png", "pdf", $filesnames[$i]);
												echo "(<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">PDF</a>";

												for ($iii = 0; $iii < count($filesnames); $iii++) {
													if (preg_match("/" . $na2[0] . ".*" . $na[count($na) - 2] . "\..*\.csv/", $filesnames[$iii])) {
														echo ",&nbsp;<a href=\"./res_tmp/$day/$output_name/$filesnames[$iii]\">RawData</a>";
													}
												}
												echo ")<br>";
											}
										}
										echo "</div>";


										/* echo "<div id=\"box15\" style=\"display:";
				if($box=="box15"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";		
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/Input_gene_expression/",$filesnames[$i])){
						echo "<a href=\"./res_tmp/$day/$output_name/$filesnames[$i]\">$filesnames[$i]</a><br>";
					}
				} 
				echo "</div>"; */
									}
									echo "</td>";
									echo "</tr>";
									echo "</table>";
									echo "</div>";



									echo "</td>";
									echo "</tr>";
									echo "</table>";

									echo "<table width=\"100%\" cellspacing=\"0\" border=\"0\" >";
									echo "<tr>";
									echo "<td>";


									echo "<iframe name=\"ifr1\" id=\"ifr1\" width=\"800\" height=\"520\" style=\"background-color:transparent\" frameborder=\"no\" ";
									echo "src=\"show_res.php?file=./res_tmp/$day/$output_name/$file_fra&type=$type\"";
									echo "></iframe>";




									echo "</td>";
									echo "</tr>";
									echo "</table>";
								}
								?>


							</td>
							<td valign="top">

								<?php
								#echo "<iframe name=\"ifr1\" id=\"ifr1\" width=\"300\" height=\"700\" style=\"background-color:transparent\" frameborder=\"no\" ";
								#echo "src=\"show_res.php?file=./res_tmp/$day/$output_name/$file_fra\"";
								#echo "></iframe>";

								?>

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