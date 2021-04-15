<?php
	if(isset($variable)) {
		$genes = "";
	}
?>
<table>
	<tr>
		<td align="center">
			<div id="yuanjiao3">
				<table width="90%">
					<tr>
						<td align="left">
							<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Analysis</span>
						</td>
					</tr>
					<tr>
						<td>
							<hr />
						</td>
					</tr>
					<tr>
						<td><span style="color:#29807F">Enter Symbols of genes to Analyse:</span>
						</td>
					</tr>
					<tr>
						<td>
							<textarea name="genes" rows="3" cols="30" style="text-transform:uppercase;"><?php echo "$genes"; ?></textarea><br>
							<span style="color:gray;font-size:8px">## Genes seperated by "," eg. BRCA1,TP53</span>
						</td>
					</tr>
					<tr>
						<td><span style="color:#29807F">Please select cancer type:</span>
						</td>
					</tr>
					<tr>
						<td>
							<select name="cancer" class="s1" onchange="showfiles(this.value)" id="cancer">
								<option value="0">Select</option>
								<?php
								$filesnames = scandir("./data/exp_data");
								$tmp = 0;
								for ($i = 0; $i < count($filesnames); $i++) {
									if (preg_match("/Breast/", $filesnames[$i]) or preg_match("/Prostate/", $filesnames[$i])) {
										if (!preg_match("/^\./", $filesnames[$i])) {
											echo "<option value=\"" . $filesnames[$i] . "\"";
											if ($cancer == $filesnames[$i]) {
												echo " selected=\"selected\"";
											}
											echo  ">" . $filesnames[$i] . "</option>";
										}
									}
								}
								for ($i = 0; $i < count($filesnames); $i++) {
									if (!preg_match("/Breast/", $filesnames[$i]) and !preg_match("/Prostate/", $filesnames[$i])) {
										if (!preg_match("/^\./", $filesnames[$i])) {
											echo "<option value=\"" . $filesnames[$i] . "\"";
											if ($cancer == $filesnames[$i]) {
												echo " selected=\"selected\"";
											}
											echo  ">" . $filesnames[$i] . "</option>";
										}
									}
								}

								?>

							</select>

						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div id="yuanjiao5" style="display:none">
				<table width="100%">
					<tr>
						<td align="left">
							<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Database</span>
						</td>
					</tr>
					<tr>
						<td>
							<hr />
						</td>
					</tr>
					<tr>
						<td>
							<span style="color:#29807F">

								<?php
								if ($cancer == "") {
									#echo "Please select cancer type.";	
								}

								$link = array();
								$myfile = fopen("misc/data_source_link.txt", "r");
								while (!feof($myfile)) {
									$arr = explode("\t", fgets($myfile));
									#$link[$arr[0]]=$arr[1];
									$link[$arr[0]] = isset($arr[1]) ? $arr[1] : null;
								}
								fclose($myfile);
								$filesnames = scandir("./data/exp_data");
								for ($i = 0; $i < count($filesnames); $i++) {
									if (!preg_match("/^\./", $filesnames[$i])) {
										$filesnames2 = scandir("./data/exp_data/" . $filesnames[$i]);

										echo "<div id=\"" . $filesnames[$i] . "\" style=\"display:none\" >";

										$k = 0;
										for ($ii = 0; $ii < count($filesnames2); $ii++) {
											if (preg_match("/TCGA.RData$/", $filesnames2[$ii])) {
												$k = 1;
												break;
											}
										}
										if ($k == 1) {
											echo "<b>>></b> TCGA data<br>";
											for ($ii = 0; $ii < count($filesnames2); $ii++) {
												if (preg_match("/TCGA.RData$/", $filesnames2[$ii])) {
													$file = preg_replace("/\.RData$/", "", $filesnames2[$ii]);

													$str = $filesnames2[$ii];
													$tmp_DEG_file_name = preg_replace("/.RData/", "_DEGs.xlsx", $str);

													if (file_exists("./data/DEGs/$tmp_DEG_file_name")) {

														echo "<table cellpadding=\"0\" cellspacing=\"4\" border=\"0\" width=\"100%\">";
														echo "<tr valign=\"middle\">";
														echo "<td width=\"10\">";
														echo "<input name=\"database\" type=\"radio\" value=\"" . $file . "\" ";
														if ($file == $database) {
															echo " checked ";
														}
														echo "  />";
														echo "</td>";
														echo "<td>";
														echo "<span style=\"font-size:14px\">";
														$tmp_file_name = preg_replace("/_/", " ", $file);
														echo "$tmp_file_name";
														echo "</span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./data/DEGs/$tmp_DEG_file_name\" target=\"_blank\">DEGs</a></span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$link[$str]\" target=\"_blank\">more</a></span><br>";
														echo "</td>";
														echo "</tr>";
														echo "</table>";
													}
												}
											}

											for ($ii = 0; $ii < count($filesnames2); $ii++) {
												if (preg_match("/TCGA.RData$/", $filesnames2[$ii])) {
													$file = preg_replace("/\.RData$/", "", $filesnames2[$ii]);

													$str = $filesnames2[$ii];
													$tmp_DEG_file_name = preg_replace("/.RData/", "_DEGs.xlsx", $str);

													if (!file_exists("./data/DEGs/$tmp_DEG_file_name")) {

														echo "<table cellpadding=\"0\" cellspacing=\"4\" border=\"0\" width=\"100%\">";
														echo "<tr valign=\"middle\">";
														echo "<td width=\"10\">";
														echo "<input name=\"database\" type=\"radio\" value=\"" . $file . "\" ";
														if ($file == $database) {
															echo " checked ";
														}
														echo "  />";
														echo "</td>";
														echo "<td>";
														echo "<span style=\"font-size:14px\">";
														$tmp_file_name = preg_replace("/_/", " ", $file);
														echo "$tmp_file_name";
														echo "</span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$link[$str]\" target=\"_blank\">more</a></span><br>";
														echo "</td>";
														echo "</tr>";
														echo "</table>";
													}
												}
											}

											#echo "<div id=\"".$filesnames[$i]."_sur_para\" style=\"display:block;width:100%;height:auto\">";

											/*echo "<br><span style=\"color:#29807F;font-size:14px\">&nbsp;&nbsp;&nbsp;&nbsp;Please select survival measure:</span><br>";
											
											echo "&nbsp;&nbsp;&nbsp;&nbsp;<select name=\"".$filesnames[$i]."_measure\" class=\"s2\">";
											if($filesnames[$i]=="Breast"){
												echo "<option value=\"Survival_status\" selected=\"selected\" >Survival_status</option>";
											}
											else{
												echo "<option value=\"BCR_status\" ";
												if($measure==="BCR_status"){
													echo " selected=\"selected\" ";
												}
												echo ">BCR_status</option>";
												
												echo "<option value=\"tumor_status\" ";
												if($measure==="tumor_status"){
													echo " selected=\"selected\" ";
												}
												echo ">tumor_status</option>";
												
											}
											echo "</select><br>";
											echo "</span>";*/

											echo "<span style=\"color:#29807F;font-size:14px\">&nbsp;&nbsp;&nbsp;&nbsp;Bifurcate gene expression at:</span><br>";


											echo "&nbsp;&nbsp;&nbsp;&nbsp;<select name=\"" . $filesnames[$i] . "_bifurcate\" class=\"s2\">";
											echo "<option value=\"4\" ";
											if ($bifurcate === "4") {
												echo " selected=\"selected\" ";
											}
											echo ">median</option>";
											echo "<option value=\"5\" ";
											if ($bifurcate === "5") {
												echo " selected=\"selected\" ";
											}
											echo ">average</option>";
											echo "<option value=\"3\" ";
											if ($bifurcate === "3") {
												echo " selected=\"selected\" ";
											}
											echo ">25%</option>";
											echo "<option value=\"2\" ";
											if ($bifurcate === "2") {
												echo " selected=\"selected\" ";
											}
											echo ">75%</option>";
											echo "<option value=\"1\" ";
											if ($bifurcate === "1") {
												echo " selected=\"selected\" ";
											}
											echo ">Q3Q1</option>";
											echo "</select><br>";
											echo "</span>";
										}




										$k = 0;
										for ($ii = 0; $ii < count($filesnames2); $ii++) {
											if (preg_match("/patients.RData$/", $filesnames2[$ii])) {
												$k = 1;
												break;
											}
										}
										if ($k == 1) {
											echo "<br><b>>></b> Expression in Patients<br>";
											for ($ii = 0; $ii < count($filesnames2); $ii++) {
												if (preg_match("/patients.RData$/", $filesnames2[$ii])) {
													$file = preg_replace("/\.RData$/", "", $filesnames2[$ii]);

													$str = $filesnames2[$ii];
													$tmp_DEG_file_name = preg_replace("/.RData/", "_DEGs.xlsx", $str);

													if (file_exists("./data/DEGs/$tmp_DEG_file_name")) {

														echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\" width=\"100%\">";
														echo "<tr valign=\"middle\">";
														echo "<td width=\"10\">";

														echo "<input name=\"database\" type=\"radio\" value=\"" . $file . "\" ";
														if ($file == $database) {
															echo " checked ";
														}
														echo "  />";

														echo "</td><td>";

														echo "<span style=\"font-size:14px\">";
														$tmp_file_name = preg_replace("/_/", " ", $file);
														$tmp_file_name = preg_replace("/ patients/", "", $tmp_file_name);
														echo "$tmp_file_name";
														echo "</span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./data/DEGs/$tmp_DEG_file_name\" target=\"_blank\">DEGs</a></span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$link[$str]\" target=\"_blank\">more</a></span><br>";

														echo "</td>";
														echo "</tr>";
														echo "</table>";
													}
												}
											}
											for ($ii = 0; $ii < count($filesnames2); $ii++) {
												if (preg_match("/patients.RData$/", $filesnames2[$ii])) {
													$file = preg_replace("/\.RData$/", "", $filesnames2[$ii]);

													$str = $filesnames2[$ii];
													$tmp_DEG_file_name = preg_replace("/.RData/", "_DEGs.xlsx", $str);

													if (!file_exists("./data/DEGs/$tmp_DEG_file_name")) {

														echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\" width=\"100%\">";
														echo "<tr valign=\"middle\">";
														echo "<td width=\"10\">";

														echo "<input name=\"database\" type=\"radio\" value=\"" . $file . "\" ";
														if ($file == $database) {
															echo " checked ";
														}
														echo "  />";

														echo "</td><td>";

														echo "<span style=\"font-size:14px\">";
														$tmp_file_name = preg_replace("/_/", " ", $file);
														$tmp_file_name = preg_replace("/ patients/", "", $tmp_file_name);
														echo "$tmp_file_name";
														echo "</span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$link[$str]\" target=\"_blank\">more</a></span><br>";

														echo "</td>";
														echo "</tr>";
														echo "</table>";
													}
												}
											}
										}
										$k = 0;
										for ($ii = 0; $ii < count($filesnames2); $ii++) {
											if (preg_match("/CellLine.RData$/", $filesnames2[$ii])) {
												$k = 1;
												break;
											}
										}
										if ($k == 1) {
											echo "<br><b>>></b> Expression in CellLine <br>";
											for ($ii = 0; $ii < count($filesnames2); $ii++) {
												if (preg_match("/CellLine.RData$/", $filesnames2[$ii])) {
													$file = preg_replace("/\.RData$/", "", $filesnames2[$ii]);

													$str = $filesnames2[$ii];
													$tmp_DEG_file_name = preg_replace("/.RData/", "_DEGs.xlsx", $str);

													if (file_exists("./data/DEGs/$tmp_DEG_file_name")) {

														echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\" width=\"100%\">";
														echo "<tr valign=\"middle\">";
														echo "<td width=\"10\">";

														echo "<input name=\"database\" type=\"radio\" value=\"" . $file . "\" ";
														if ($file == $database) {
															echo " checked ";
														}
														echo "  />";

														echo "</td><td>";

														echo "<span style=\"font-size:14px\">";
														$tmp_file_name = preg_replace("/_/", " ", $file);
														$tmp_file_name = preg_replace("/ CellLine/", "", $tmp_file_name);
														echo "$tmp_file_name";
														echo "</span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"./data/DEGs/$tmp_DEG_file_name\" target=\"_blank\">DEGs</a></span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$link[$str]\" target=\"_blank\">more</a></span><br>";

														echo "</td>";
														echo "</tr>";
														echo "</table>";
													}
												}
											}
											for ($ii = 0; $ii < count($filesnames2); $ii++) {
												if (preg_match("/CellLine.RData$/", $filesnames2[$ii])) {
													$file = preg_replace("/\.RData$/", "", $filesnames2[$ii]);

													$str = $filesnames2[$ii];
													$tmp_DEG_file_name = preg_replace("/.RData/", "_DEGs.xlsx", $str);

													if (!file_exists("./data/DEGs/$tmp_DEG_file_name")) {

														echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\" width=\"100%\">";
														echo "<tr valign=\"middle\">";
														echo "<td width=\"10\">";

														echo "<input name=\"database\" type=\"radio\" value=\"" . $file . "\" ";
														if ($file == $database) {
															echo " checked ";
														}
														echo "  />";

														echo "</td><td>";

														echo "<span style=\"font-size:14px\">";
														$tmp_file_name = preg_replace("/_/", " ", $file);
														$tmp_file_name = preg_replace("/ CellLine/", "", $tmp_file_name);
														echo "$tmp_file_name";
														echo "</span>";

														echo "<span style=\"color:gray;font-size:9px\">&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"$link[$str]\" target=\"_blank\">more</a></span><br>";

														echo "</td>";
														echo "</tr>";
														echo "</table>";
													}
												}
											}
										}
										echo "</div>";
									}
								}
								?>
							</span>
						</td>
					</tr>
				</table>
			</div>
			<div id="yuanjiao6">
				<table width="100%">
					<tr>
						<td align="left">
							<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Data Summary</span>
						</td>
					</tr>
					<tr>
						<td>
							<hr />
						</td>
					</tr>
					<tr>
						<td>
							<a href="datasouce.php" class="a2">
								<span style="color:#29807F">
									<table width="100%">
										<tr>
											<td width="57%" align="right">
												Cancer Type:
											</td>
											<td width="43%" align="left">
												&nbsp;32
											</td>
										</tr>
										<tr>
											<td align="right">
												Expression Data:
											</td>
											<td align="left">
												&nbsp;140
											</td>
										</tr>
										<tr>
											<td align="right">
												Suvival Data:
											</td>
											<td align="left">
												&nbsp;32
											</td>
										</tr>
									</table>
								</span></a>


						</td>
					</tr>


				</table>
			</div>

			<table width="100%" cellspacing="5">
				<tr align="center">
					<td><input type="submit" value="Submit" onclick="change(this.form)" /></td>
					<td><input type="reset" value="Reset" /></td>
				</tr>
			</table>


		</td>
	</tr>

</table>