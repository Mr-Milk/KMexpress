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

$genes = $_GET['genes'];
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