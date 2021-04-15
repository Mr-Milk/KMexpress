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

	#mytable {
		border-collapse: collapse;
		border-bottom: 1px solid #ccc
	}

	#mytr.first {
		border-top: 1px solid #ccc;
		border-bottom: 1px solid #ccc
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
		width: 600px;
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
	function check_info() {

		//alert("hhhhhhhhhh");
		var AuthorName = document.getElementById("AuthorName");
		//alert(AuthorName.value);
		if (AuthorName.value == "") {
			alert("Please Fill AuthorName.");
			return false;
		}
		var Email = document.getElementById("Email");
		if (Email.value == "") {
			alert("Please Fill Email.");
			return false;
		}
		var Reference = document.getElementById("Reference");
		if (Reference.value == "") {
			alert("Please Fill Reference Title.");
			return false;
		}
		var Pubmed_Id = document.getElementById("Pubmed_Id");
		if (Pubmed_Id.value == "") {
			alert("Please fill Pubmed_Id.");
			return false;
		}
		var Information = document.getElementById("Information");
		if (Information.value == "") {
			alert("Please Select Sample Information data.");
			return false;
		}
		var Expression = document.getElementById("Expression");
		if (Expression.value == "") {
			alert("Please Select Sample Expression data.");
			return false;
		}
	}

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
						<form action="index.php" method="get" id="myForm">
							<td width="250" align="top" valign="top"><?php require("analysis_pane.php"); ?></td>
						</form>

						<td align="left" valign="top" width="250">
							<div id="yuanjiao4" <?php if ($database != "" and $genes != "") {
													echo " style=\"display:none\"";
												} ?>>
								<table width="100%">
									<tr>
										<td align="left">
											<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Data Submit</span>
										</td>
									</tr>
									<tr>
										<td>
											<hr />
										</td>
									</tr>
									<tr>
										<td>
											<?PHP
											$AuthorName = htmlentities($_POST['AuthorName'], ENT_QUOTES, 'UTF-8');
											$Email = htmlentities($_POST['Email'], ENT_QUOTES, 'UTF-8');
											$Reference = htmlentities($_POST['Reference'], ENT_QUOTES, 'UTF-8');
											$Pubmed_Id = htmlentities($_POST['Pubmed_Id'], ENT_QUOTES, 'UTF-8');
											$Description = htmlentities($_POST['Description'], ENT_QUOTES, 'UTF-8');

											#if(is_uploaded_file($_FILES['Information']['tmp_name']) and is_uploaded_file($_FILES['Expression']['tmp_name'])){
											if (is_uploaded_file($_FILES['Information']['tmp_name'])) {

												$Information_upfile = $_FILES["Information"];
												$Information_name = $Information_upfile["name"];
												$Information_type = $Information_upfile["type"];
												$Information_size = $Information_upfile["size"];
												$Information_tmp_name = $Information_upfile["tmp_name"];

												$Information_error = $Information_upfile["error"]; //uploaded file system value
												$Information_newfile = './upload/' . date('Y-m-d-H-i-s', time()) . '.' . $Information_name;

												$Expression_upfile = $_FILES["Expression"];
												$Expression_name = $Expression_upfile["name"];
												$Expression_type = $Expression_upfile["type"];
												$Expression_size = $Expression_upfile["size"];
												$Expression_tmp_name = $Expression_upfile["tmp_name"];

												$Expression_error = $Expression_upfile["error"]; //uploaded file system value
												$Expression_newfile = './upload/' . date('Y-m-d-H-i-s', time()) . '.' . $Expression_name;

												$Expression_array = explode('.', $Expression_name);
												$Information_array = explode('.', $Information_name);
												$Expression_array = $Expression_array[count($Expression_array) - 1];
												$Information_array = $Information_array[count($Information_array) - 1];


												#echo "$Information_tmp_name<br>$Information_newfile<br>$Information_type<br>$Information_array<br>";
												#echo "$Expression_tmp_name<br>$Expression_newfile<br>$Expression_type<br>$Expression_array<br>";

												#echo "AuthorName:$AuthorName<br>Email:$Email<br>Reference Title:$Reference<br>Pubmed_Id:$Pubmed_Id<br>Sample Information:$Information_name<br>Sample Expression:$Expression_name<br>";

												#echo "$Information_array<br>$Expression_array<br>";

												if (strtoupper($Information_array) != strtoupper("xls") and strtoupper($Information_array) != strtoupper("csv") and strtoupper($Information_array) != strtoupper("txt") and strtoupper($Expression_array) != strtoupper("xls") and strtoupper($Expression_array) != strtoupper("csv") and strtoupper($Expression_array) != strtoupper("txt") and strtoupper($Expression_array) != strtoupper("txt") and strtoupper($Expression_array) != strtoupper("xlsx") and strtoupper($Information_array) != strtoupper("xlsx") and strtoupper($Expression_array) != strtoupper("tar") and strtoupper($Information_array) != strtoupper("tar") and strtoupper($Expression_array) != strtoupper("gz") and strtoupper($Information_array) != strtoupper("gz") and strtoupper($Expression_array) != strtoupper("zip") and strtoupper($Information_array) != strtoupper("zip") and strtoupper($Expression_array) != strtoupper("rar") and strtoupper($Information_array) != strtoupper("rar")) {

													echo "<br><span style=\"font-size:12px;color:#F00\">Please transfer your data to XLS or TXT format</span><br><br>";



													echo "<form action=\"DataSubmit.php\" method=\"post\" enctype=\"multipart/form-data\">";
													echo "                          	<table cellpadding=\"0\" cellspacing=\"10\" border=\"0\">";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" align=\"right\">AuthorName&nbsp;&nbsp;</td>";
													echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"AuthorName\" id=\"AuthorName\" size=\"40\" value=\"$AuthorName\"/>*</td>";
													echo "                            </tr>";
													echo "                            ";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" align=\"right\">Email&nbsp;&nbsp;</td>";
													echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Email\" id=\"Email\" size=\"40\" value=\"$Email\"/>*</td>";
													echo "                            </tr>";
													echo "                            ";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" align=\"right\">Reference_Title&nbsp;&nbsp;</td>";
													echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Reference\" id=\"Reference\" size=\"40\" value=\"$Reference\"/>*</td>";
													echo "                            </tr>";
													echo "                            ";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" align=\"right\">Pubmed_Id&nbsp;&nbsp;</td>";
													echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Pubmed_Id\" id=\"Pubmed_Id\" size=\"40\" value=\"$Pubmed_Id\"/>*</td>";
													echo "                            </tr>";
													echo "                            ";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" align=\"right\">Sample_Information&nbsp;&nbsp;</td>";
													echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Information\" id=\"Information\" type=\"file\" />*<br><span style=\"font-size:10px\">(XLS or TXT)&nbsp;e.g.&nbsp;<a href=\"misc/samples.xlsx\">Samples</a></span></td>";
													echo "                            </tr>";
													echo "                            ";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" align=\"right\">Sample_Expression&nbsp;&nbsp;</td>";
													echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Expression\" id=\"Expression\" type=\"file\" />*<br><span style=\"font-size:10px\">(XLS or TXT)&nbsp;e.g.&nbsp;<a href=\"misc/expression.xlsx\">Expression</a></span></td>";
													echo "                            </tr>";
													echo "                            ";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" align=\"right\" valign=\"top\">Description&nbsp;&nbsp;</td>";
													echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<textarea name=\"Description\" id=\"Description\" rows=\"4\" cols=\"40\"></textarea></td>";
													echo "                            </tr>";
													echo "                            ";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" colspan=\"2\" align=\"left\"><span style=\"font-size:12px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* is required information</span></td>";
													echo "                               ";
													echo "                            </tr>";
													echo "                            ";
													echo "                            <tr>";
													echo "                            	<td width=\"50\">&nbsp;</td>";
													echo "                                <td width=\"200\" align=\"right\"><input type=\"submit\" value=\"Submit\"  onclick=\"check_info()\"/>&nbsp;&nbsp;</td>";
													echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input type=\"reset\" value=\"Cancel\" /></td>";
													echo "                            </tr>";
													echo "                            </table>";
													echo "                            </form>";
												} else {



													#$ttt=move_uploaded_file($Expression_tmp_name,$Expression_newfile);

													#echo "ttt:$ttt<br>";

													#if(file_exists($Information_tmp_name)){
													#	echo "exists11<br>";		
													#}
													#else{
													#	echo "not exists<br>";	
													#}




													#if(move_uploaded_file($Information_tmp_name,$Information_newfile) and move_uploaded_file($Expression_tmp_name,$Expression_newfile)){



													if (move_uploaded_file($Information_tmp_name, $Information_newfile) and move_uploaded_file($Expression_tmp_name, $Expression_newfile)) {

														echo "<br>Thanks for your sharing the data. We will add your data ASAP after checking.<br>We would contect you if we meet any confuse about the data.<br> For any queries, please contact the Tech-Support(Xin Chen: xinchen@gdut.edu.cn).<br><br>";

														$tomail = $Email;
														$CC = "xinchen@gdut.edu.cn"; #split by ,
														$tomail_arr = explode(',', $tomail);
														$main_mesg = "Dear $AuthorName,<br><br>Thanks for your sharing the data. We will add your data ASAP after checking. We would contect you if we meet any confuse about the data.<br>This is an automated email from the <a href=\"http://ec2-52-201-246-161.compute-1.amazonaws.com/kmexpress/index.php\">KM-Express</a>. Please do not reply to this email address. For any queries, please contact our Tech-Support(Xin Chen: xinchen@gdut.edu.cn).";

														$main_mesg .= "<br><br>AuthorName:$AuthorName<br>Email:$Email<br>Reference Title:$Reference<br>Pubmed_Id:$Pubmed_Id<br>Sample Information:$Information_name<br>Sample Expression:$Expression_name<br>Description:$Description<br>";


														$CC_arr = explode(',', $CC);

														if ($tomail != "") {

															$main_mesg .= "<br><br><br><br><br><a href=\"http://ec2-52-201-246-161.compute-1.amazonaws.com/kmexpress/index.php\">KM-Express</a><br>Tech Support:<br>Xin Chen: xinchen@gdut.edu.cn<br>";

															require './PHPMailer-master/PHPMailerAutoload.php';
															$mail = new PHPMailer;
															$mail->CharSet    = "UTF-8";
															$mail->IsSMTP();
															$mail->SMTPAuth   = true;
															$mail->SMTPSecure = "ssl";
															$mail->Host       = "smtp.gmail.com";
															$mail->Port       = 465;
															$mail->Username   = "km.express.database@gmail.com";
															$mail->Password   = "kmexpress";
															$mail->SetFrom('km.express.database@gmail.com', 'KM-Express');
															#$mail->AddReplyTo("miaozhengqiang1987@gmail.com"," ");                                      
															$mail->Subject    = "Data is uploaded";

															$mail->MsgHTML($main_mesg); #                       

															for ($i = 0; $i < count($tomail_arr); $i++) {
																$mail->AddAddress($tomail_arr[$i]);
															}
															for ($i = 0; $i < count($CC_arr); $i++) {
																$mail->AddCC($CC_arr[$i]);
															}

															if (!$mail->Send()) {
																echo "Email Faild<br>" . $mail->ErrorInfo;
															} else {
																#echo "Email Sent<br><br><br>Sent to: $tomail<br>CC:$CC<br>Record:<br>$hiseq_record<br><br>";
															}
														}
													} else {
														echo "<br><br>There is something wrong happened during the uploading.<br>";
														echo "please contect our Support to continue the uploading (Xin Chen: xinchen@gdut.edu.cn).<br><br><br>";
													}
												}
											} else {




												echo "<form action=\"DataSubmit.php\" method=\"post\" enctype=\"multipart/form-data\">";
												echo "                          	<table cellpadding=\"0\" cellspacing=\"10\" border=\"0\">";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" align=\"right\">AuthorName&nbsp;&nbsp;</td>";
												echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"AuthorName\" id=\"AuthorName\" size=\"40\" value=\"$AuthorName\"/>*</td>";
												echo "                            </tr>";
												echo "                            ";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" align=\"right\">Email&nbsp;&nbsp;</td>";
												echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Email\" id=\"Email\" size=\"40\" value=\"$Email\"/>*</td>";
												echo "                            </tr>";
												echo "                            ";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" align=\"right\">Reference_Title&nbsp;&nbsp;</td>";
												echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Reference\" id=\"Reference\" size=\"40\" value=\"$Reference\"/>*</td>";
												echo "                            </tr>";
												echo "                            ";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" align=\"right\">Pubmed_Id&nbsp;&nbsp;</td>";
												echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Pubmed_Id\" id=\"Pubmed_Id\" size=\"40\" value=\"$Pubmed_Id\"/>*</td>";
												echo "                            </tr>";
												echo "                            ";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" align=\"right\">Sample_Information&nbsp;&nbsp;</td>";
												echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Information\" id=\"Information\" type=\"file\" />*<br><span style=\"font-size:10px\">(XLS or TXT)&nbsp;e.g.&nbsp;<a href=\"misc/samples.xlsx\">Samples</a></span></td>";
												echo "                            </tr>";
												echo "                            ";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" align=\"right\">Sample_Expression&nbsp;&nbsp;</td>";
												echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input name=\"Expression\" id=\"Expression\" type=\"file\" />*<br><span style=\"font-size:10px\">(XLS or TXT)&nbsp;e.g.&nbsp;<a href=\"misc/expression.xlsx\">Expression</a></span></td>";
												echo "                            </tr>";
												echo "                            ";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" align=\"right\" valign=\"top\">Description&nbsp;&nbsp;</td>";
												echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<textarea name=\"Description\" id=\"Description\" rows=\"4\" cols=\"40\"></textarea></td>";
												echo "                            </tr>";
												echo "                            ";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" colspan=\"2\" align=\"left\"><span style=\"font-size:12px\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* is required information</span></td>";
												echo "                               ";
												echo "                            </tr>";
												echo "                            ";
												echo "                            <tr>";
												echo "                            	<td width=\"50\">&nbsp;</td>";
												echo "                                <td width=\"200\" align=\"right\"><input type=\"submit\" value=\"Submit\"  onclick=\"check_info()\"/>&nbsp;&nbsp;</td>";
												echo "                                <td width=\"400\" align=\"left\">&nbsp;&nbsp;<input type=\"reset\" value=\"Cancel\" /></td>";
												echo "                            </tr>";
												echo "                            </table>";
												echo "                            </form>";
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

</body>

</html>