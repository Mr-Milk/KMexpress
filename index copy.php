<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="#" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>KM-Express</title>
 
</head>
<style>.s1{ width: 250px;}</style>
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
#yuanjiao{
 font-family: Arial;
 border: 2px solid #379082;
 border-radius: 20px;
 padding: 10px 18px 10px 10px;
 width: 400px;
 }
 #yuanjiao3{
 font-family: Arial;
 border: 2px solid #379082;
 border-radius: 20px;
 padding: 10px 18px 10px 10px;
 width: 300px;
 }
 #yuanjiao2{
 font-family: Arial;
 border: 2px solid #379082;
 border-radius: 20px;
 padding: 10px 18px 10px 10px;
 width: 850px;
 }
</style>
<style>
.v-align {
float:left;
height: 30px;
width:auto;
text-align: center;
line-height: 30px;
border-radius:10px 10px 0 0;
}
</style>

<script type="text/javascript"> 
	 function change(){ 

	  
	 } 
	 function changecolor(ttt,ttt2)
		{
		  var tt=ttt;
		  var tt2=ttt2;
		  
		  if(document.getElementById("t1")!=null){
		  	document.getElementById("t1").style.background="#FFF"; 
		  	document.getElementById("t1").style.color="#000"; 
			document.getElementById("box1").style.display="none";
		  }
		  if(document.getElementById("t2")!=null){
		  	document.getElementById("t2").style.background="#FFF"; 
		  	document.getElementById("t2").style.color="#000"; 
			document.getElementById("box2").style.display="none";
		  }
		  if(document.getElementById("t3")!=null){
		  	document.getElementById("t3").style.background="#FFF"; 
		  	document.getElementById("t3").style.color="#000"; 
			document.getElementById("box3").style.display="none";
		  }
		  if(document.getElementById("t4")!=null){
		  	document.getElementById("t4").style.background="#FFF"; 
		  	document.getElementById("t4").style.color="#000"; 
			document.getElementById("box4").style.display="none";
		  }
		  if(document.getElementById("t5")!=null){
		  	document.getElementById("t5").style.background="#FFF"; 
		  	document.getElementById("t5").style.color="#000"; 
			document.getElementById("box5").style.display="none";
		  }
		  if(document.getElementById("t6")!=null){
		  	document.getElementById("t6").style.background="#FFF"; 
		  	document.getElementById("t6").style.color="#000"; 
			document.getElementById("box6").style.display="none";
		  }
		  if(document.getElementById("t7")!=null){
		  	document.getElementById("t7").style.background="#FFF"; 
		  	document.getElementById("t7").style.color="#000";
			document.getElementById("box7").style.display="none"; 
		  }
		  if(document.getElementById("t8")!=null){
		  	document.getElementById("t8").style.background="#FFF"; 
		  	document.getElementById("t8").style.color="#000"; 
			document.getElementById("box8").style.display="none";
		  }
		  if(document.getElementById("t9")!=null){
		  	document.getElementById("t9").style.background="#FFF"; 
		  	document.getElementById("t9").style.color="#000";
			document.getElementById("box9").style.display="none"; 
		  }
		  if(document.getElementById("t10")!=null){
		  	document.getElementById("t10").style.background="#FFF"; 
		  	document.getElementById("t10").style.color="#000"; 
			document.getElementById("box10").style.display="none";
		  }
		  if(document.getElementById("t11")!=null){
		  	document.getElementById("t11").style.background="#FFF"; 
		  	document.getElementById("t11").style.color="#000"; 
			document.getElementById("box11").style.display="none";
		  }
		  if(document.getElementById("t12")!=null){
		  	document.getElementById("t12").style.background="#FFF"; 
		  	document.getElementById("t12").style.color="#000"; 
			document.getElementById("box12").style.display="none";
		  }
		  if(document.getElementById("t13")!=null){
		  	document.getElementById("t13").style.background="#FFF"; 
		  	document.getElementById("t13").style.color="#000"; 
			document.getElementById("box13").style.display="none";
		  }
		  if(document.getElementById("t14")!=null){
		  	document.getElementById("t14").style.background="#FFF"; 
		  	document.getElementById("t14").style.color="#000";
			document.getElementById("box14").style.display="none"; 
		  }
		  if(document.getElementById("t15")!=null){
		  	document.getElementById("t15").style.background="#FFF"; 
		  	document.getElementById("t15").style.color="#000";
			document.getElementById("box15").style.display="none"; 
		  }
		  
		  
		  document.getElementById(tt).style.background="#CCC"; 
		  document.getElementById(tt).style.color="#FFF";
		  document.getElementById(tt2).style.display="block";
		  
		}
</script> 



<?php
$genes=$_GET['genes'];
$cancer=$_GET['cancer'];
$measure=$_GET['measure'];
$bifurcate=$_GET['bifurcate'];
#$color=$_GET['color'];

$database=$_GET['database'];



if($database!="" and $genes!=""){
	
	 
	 $gene_arr="";
	 $genes_tmp=explode("/\n/",$genes);
	 for($i=0;$i<count($genes_tmp);$i++){
			 $genes_tmp2=explode("/,/",$genes_tmp[$i]);
			 for($j=0;$j<count($genes_tmp2);$j++){
				$gene_arr.=$genes_tmp2[$j].",";	 
			}
		}
	 
	 
	 
	 
	 
	 
	 $day=date("d");
	$ss2=`Rscript ./Rscripts/main.R $cancer/$database.RData $gene_arr`;
	$nogene="";
	if(preg_match("\"ok\"",$ss2)){
	   $filesnames = scandir("./res_tmp"); 
	   for($i=0;$i<count($filesnames);$i++){
		  if(!preg_match("/^\./",$filesnames[$i])){
			  
			  if(($day-$filesnames[$i])>2){
				  rmdir("./res_tmp"."/".$filesnames[$i]);
				  
			  }
			  elseif(($day-$filesnames[$i])<0){
				  
				  if(($day-$filesnames[$i]+28)>1){
					  rmdir("./res_tmp"."/".$filesnames[$i]);
				  }	
			  }
		  }
	  }
	  
	  if(!file_exists("./res_tmp"."/".$day)){
		  mkdir("./res_tmp"."/".$day);	
	  }
	  
	  $output_name=time()."-".rand(1,100000)."-".rand(1,100000);
	  if(!file_exists("./res_tmp/$day/$output_name")){
		  mkdir("./res_tmp/$day/$output_name");	
	  }
	  else{
		  $output_name=time()."-".rand(1,100000)."-".rand(1,100000);	
		  mkdir("./res_tmp/$day/$output_name");
	  }
	  #echo("Rscript ./Rscripts/test_survival_V3.R $cancer/$database.txt ./res_tmp/$day/$output_name");
	  
	  $ss=`Rscript ./Rscripts/test_survival_V5.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate `;
	  #echo("Rscript ./Rscripts/test_survival_V5.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate<br>");
	}
	else{
		$nogene="There is no gene information in the database<br>";	
	}
	
	
	 
}


?>


<script type="text/javascript"> 
 function showfiles_auto(){ 
		<?php
		$filesnames = scandir("./data/exp_data"); 
		$cancer=$_GET['cancer'];
		echo "//$cancer\n";
		for($i=0;$i<count($filesnames);$i++){
			if(!preg_match("/^\./",$filesnames[$i])){
				echo "var id_tmp=\"".$filesnames[$i]."\";\n";
				
				if($cancer!=$filesnames[$i]){
					echo "document.getElementById(id_tmp).style.display=\"none\";\n";
				}
				else{
					echo "document.getElementById(id_tmp).style.display=\"block\";\n";
				}
				
			}
		}
		?>
       }
 function showfiles(id){ 
        
		var objS = id; 
		
		<?php
		$filesnames = scandir("./data/exp_data"); 
		echo "//$cancer\n";
		for($i=0;$i<count($filesnames);$i++){
			if(!preg_match("/^\./",$filesnames[$i])){
				echo "var id_tmp=\"".$filesnames[$i]."\";\n";
				echo "document.getElementById(id_tmp).style.display=\"none\";\n";
			}
		}
		?>
		document.getElementById(objS).style.display="block";
       }
 
</script>
<body onload="showfiles_auto()">

<form action="index.php" method="get">
<table width="100%" align="left">

    <tr>
        <td>
            <table width="100%" cellspacing="10">
                <tr>
                    <td height="45"><a href="index.php" class="a1"><span style=" color:#29807F; font-size:35px"><b>KM-Express</b></span></a>
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
                    <td>&nbsp;
                    </td>
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
            <table width="100%" cellspacing="5" border="0" >
                <tr>
                    <td width="300" align="center" valign="top">
                    <table>
                    <tr><td align="center">
                    <div id="yuanjiao3">
                    	<table width="100%">
                    	<tr>
                        	<td><img src="www/gene_Image.png" width="300" height="80"/><br><br>
                            </td>
                        </tr>
                        </table>
                        <table width="90%">
                        <tr>
                        	<td><span style="color:#29807F">Enter Symbols of genes to Analyse:</span>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                                <textarea name="genes" rows="3" cols="30"><?php echo "$genes";?></textarea><br>
                                <span style="color:gray;font-size:8px">## Genes seperated by "," eg. BRCA1,TP53</span>
                            </td>
                        </tr>
                        <tr>
                        	<td><span style="color:#29807F">Please select cancer type:</span>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<select name="cancer" class="s1" onchange="showfiles(this.value)">
                                	<option value="0">Select</option>
									<?php 
									$filesnames = scandir("./data/exp_data"); 
									$tmp=0;
									for($i=0;$i<count($filesnames);$i++){
										if(!preg_match("/^\./",$filesnames[$i])){
											echo "<option value=\"".$filesnames[$i]."\"";
											if($cancer==$filesnames[$i]){
												echo " selected=\"selected\"";
											}
											echo  ">".$filesnames[$i]."</option>";
												
										}
									}
									
									?>
                            		
                            	</select>
                            </td>
                        </tr>
                        <tr>
                        	<td><span style="color:#29807F">Please select survival measure:</span>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<select name="measure" class="s1">
                            		<option value="BCR_status" selected="selected">BCR_status</option>
                                    <option value="tumor_status">tumor_status</option>
                                    <!--<option value="Death">Death</option>-->
                            	</select>
                            </td>
                        </tr>
                        <tr>
                        	<td><span style="color:#29807F">Bifurcate gene expression at:</span>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<select name="bifurcate" class="s1">
                            		<option value="3" selected="selected">median</option>
                                    <option value="4">average</option>
                                    <option value="2">25%</option>
                                    <option value="1">75%</option>
                                    <option value="0">Q3Q1</option>
                                    
                           	  </select>
                            </td>
                        </tr>
                        <!--<tr>
                        	<td><span style="color:#29807F">Please select the color for plot:</span>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            	<select name="color" class="s1">
                            		<option value="Red" >Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Gray">Gray</option>
                                    <option value="Black" selected="selected">Black</option>
                            	</select>
                            </td>
                        </tr>-->
                        
                 
                        
                    </table>
                    </div>
                    </td></tr>
                    <tr><td><span style="font-size:1px">&nbsp;</span>
                    </td></tr>
                    <tr><td>
                
                    
                    </td></tr>
                    </table>
                     
                    </td>
               
                   
                  <td align="left" valign="top" width="300">
                  <div id="yuanjiao">
                    <table width="100%">
                    	<tr>
                        	<td align="left">
                            	<span style="color:#333;font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;Database</span>
                            </td>
                        </tr>
                        <tr>
                        	<td><hr />
                            </td>
                        </tr>
                        <tr>
                        	<td><span style="color:#29807F"><b>Select the database:</b></span>
                            </td>
                        </tr>
                        
                        
                        <tr>
                        	<td>
                            	
                                <span style="color:#29807F"> 
                                <?php
                                $filesnames = scandir("./data/exp_data"); 
								for($i=0;$i<count($filesnames);$i++){
									if(!preg_match("/^\./",$filesnames[$i])){
										$filesnames2 = scandir("./data/exp_data/".$filesnames[$i]); 
										echo "<div id=\"".$filesnames[$i]."\" style=\"display:none\">";
										for($ii=0;$ii<count($filesnames2);$ii++){
											if(preg_match("/RData$/",$filesnames2[$ii])){
												 $file=preg_replace("/\.RData$/","",$filesnames2[$ii]);
												 echo "<input name=\"database\" type=\"radio\" value=\"".$file."\" ";
												 if($file==$database){
													echo " checked ";
													}
												 echo " />$file<br>";
											}
										}
										echo "</div>";
		
									}
								}
								
								
								?>
                                
                                
                                </span>
                                 
                            
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
                    </table></div>
                    
                    <table width="100%"><tr><td>
                    <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" value="Reset" />
                    
                    </td></tr></table>
                    
                    
                    </td>
                    
                    <td align="left" valign="top" width="400">
                    
                     
                    </td>
                    <td>&nbsp;</td>
                
                </tr>
                
            </table>
        </td>
    </tr>
    <tr>
        <td><hr />
        
        </td>
    </tr>
    <tr>
        <td>
        
        <table width="100%" cellspacing="0" border="0" cellpadding="0" >
        <tr>
        <td>
        <?php
         if($database!="" and $genes!=""){
			 
			 
			 
			 echo "<div id=\"yuanjiao2\">";
				
			  echo "<table width=\"100%\">";
			  echo "<tr>";
			  echo "<td align=\"left\">";
			  echo "&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"color:#333;font-size:20px\">Result</span>";
			  echo "</td>";
			  echo "</tr>";
			  echo "<tr>";
			  echo "<td align=\"left\">";
			  echo "<hr />";
			  echo "</td>";
			  echo "</tr>";
			  echo "<tr>";
			  echo "<td>";
				
				
				if($nogene!=""){
					echo "$nogene<br>";
				}
				else{
					
					$filesnames = scandir("./res_tmp/$day/$output_name");
					$rr=1;
					$box="";
					$file_fra="";
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/survival.*png/",$filesnames[$i])){
							echo "<div id=\"t14\" class=\"v-align\" onclick=\"changecolor('t14','box14')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box14";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;survival&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/clinical.*png/",$filesnames[$i])){
							echo "<div id=\"t8\" class=\"v-align\" onclick=\"changecolor('t8','box8')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box8";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;clinical&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/gleason.*png/",$filesnames[$i])){
							echo "<div id=\"t1\"  class=\"v-align\" onclick=\"changecolor('t1','box1')\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box1";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;gleason&nbsp;</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/content.*png/",$filesnames[$i])){
							echo "<div id=\"t2\" class=\"v-align\" onclick=\"changecolor('t2','box2')\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box2";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;content&nbsp;</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/grade.*png/",$filesnames[$i])){
							echo "<div id=\"t3\" class=\"v-align\" onclick=\"changecolor('t3','box3')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box3";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;grade&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/status.*png/",$filesnames[$i])){
							echo "<div id=\"t4\" class=\"v-align\" onclick=\"changecolor('t4','box4')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box4";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;status&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/subtype.*png/",$filesnames[$i])){
							echo "<div id=\"t5\" class=\"v-align\" onclick=\"changecolor('t5','box5')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box5";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;subtype&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/CellLine.*png/",$filesnames[$i])){
							echo "<div id=\"t6\" class=\"v-align\" onclick=\"changecolor('t6','box6')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box6";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;CellLine&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/Phenotype.*png/",$filesnames[$i])){
							echo "<div id=\"t7\" class=\"v-align\" onclick=\"changecolor('t7','box7')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box7";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;Phenotype&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/stage.*png/",$filesnames[$i])){
							echo "<div id=\"t9\" class=\"v-align\" onclick=\"changecolor('t9','box9')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box9";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;stage&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/pathologic.*png/",$filesnames[$i])){
							echo "<div id=\"t10\" class=\"v-align\" onclick=\"changecolor('t10','box10')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box10";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;pathologic&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/psa.*png/",$filesnames[$i])){
							echo "<div id=\"t11\" class=\"v-align\" onclick=\"changecolor('t11','box11')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box11";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;psa&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/lymph.*png/",$filesnames[$i])){
							echo "<div id=\"t12\" class=\"v-align\" onclick=\"changecolor('t12','box12')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box12";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;lymph&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/residual.*png/",$filesnames[$i])){
							echo "<div id=\"t13\" class=\"v-align\" onclick=\"changecolor('t13','box13')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box13";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;residual&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
					for($i=0;$i<count($filesnames);$i++){
						if(preg_match("/Input_gene_expression/",$filesnames[$i])){
							echo "<div id=\"t15\" class=\"v-align\" onclick=\"changecolor('t15','box15')\"  align=\"center\"";
							if($rr==1){
								echo " style=\"background:#CCC;color:#FFF\"";
								$box="box15";
								$file_fra=$filesnames[$i];
							}
							echo ">";
							echo "&nbsp;&nbsp;RawData&nbsp;";
							echo "</div>";
							$rr=0;
							break;
						}
					}
	
				
				  if($rr==0){
					  echo "<br><div style=\"float:left;width:100%; height:6px; background:#CCC;\"></div>";
				  }
				  else{
					  echo "&nbsp;&nbsp;&nbsp;&nbsp;There is no information of your input<br>";	
				  }
					
				
				$rr=1;
				echo "<div id=\"box14\" style=\"display:";
				if($box=="box14"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/survival.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}  
				echo "</div>";
				
				
				echo "<div id=\"box8\" style=\"display:";
				if($box=="box8"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/clinical.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}  
				echo "</div>";
				
				
				echo "<div id=\"box1\" style=\"display:";
				if($box=="box1"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/gleason.*png/",$filesnames[$i])){
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}
				echo "</div>";
				
				echo "<div id=\"box2\" style=\"display:";
				if($box=="box2"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/content.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}
				echo "</div>";
				
				echo "<div id=\"box3\" style=\"display:";
				if($box=="box3"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/grade.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}			
				echo "</div>";
				
				echo "<div id=\"box4\" style=\"display:";
				if($box=="box4"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/status.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=strtr($filesnames[$i],"png","pdf");
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}
				echo "</div>";
				
				echo "<div id=\"box5\" style=\"display:";
				if($box=="box5"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/subtype.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}
				echo "</div>";
				
				echo "<div id=\"box6\" style=\"display:";
				if($box=="box6"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/CellLine.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}
				echo "</div>";
				
				echo "<div id=\"box7\" style=\"display:";
				if($box=="box7"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/Phenotype.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}  
				echo "</div>";
				
				echo "<div id=\"box9\" style=\"display:";
				if($box=="box9"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/stage.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}  
				echo "</div>";
				
				echo "<div id=\"box10\" style=\"display:";
				if($box=="box10"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/pathologic.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}  
				echo "</div>";
				
				echo "<div id=\"box11\" style=\"display:";
				if($box=="box11"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/psa.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}  
				echo "</div>";
				
				echo "<div id=\"box12\" style=\"display:";
				if($box=="box12"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/lymph.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}  
				echo "</div>";
				
				echo "<div id=\"box13\" style=\"display:";
				if($box=="box13"){
					echo "block";	
				}
				else{
					echo "none";	
				}
				echo ";width:100%;height:auto\"><br><br>";
				for($i=0;$i<count($filesnames);$i++){
					if(preg_match("/residual.*png/",$filesnames[$i])){
						$na=explode(".",$filesnames[$i]);
						echo "<a href=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\" target=\"ifr1\">$filesnames[$i]</a>&nbsp;&nbsp;";
						$pdf_file=str_replace("png","pdf",$filesnames[$i]);
						echo "<a href=\"show_pdf.php?file=./res_tmp/$day/$output_name/$pdf_file\">(PDF)</a><br>";
					}
				}  
				echo "</div>";
				
				
				echo "<div id=\"box15\" style=\"display:";
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
				echo "</div>";
			
			
			}
			echo "</td>";
			echo "</tr>";
			echo "</table>";
			echo "</div>";
	 }
		
		?>
       	</td>
        </tr>
        </table>
        
        <table width="100%" cellspacing="0" border="0" >
        <tr>
        <td>
         <?php
							
		if($database!="" and $genes!=""){
			echo "<iframe name=\"ifr1\" id=\"ifr1\" width=\"900\" height=\"750\" style=\"background-color:transparent\" frameborder=\"no\" ";
			
			/*$filesnames = scandir("./res_tmp/$day/$output_name");
			
			for($i=0;$i<count($filesnames);$i++){
				if(preg_match("/survival.*png/",$filesnames[$i])){
					echo "src=\"show_res.php?file=./res_tmp/$day/$output_name/$filesnames[$i]\"";
					break;
				}
			}*/
			echo "src=\"show_res.php?file=./res_tmp/$day/$output_name/$file_fra\"";
			echo "></iframe>";
			echo "<hr />";
		}
		?>
       
        
        </td>
      
        </tr>
        </table>
        
        </td>
    </tr>
    <tr>
        <td>
       <span style="font-size:12px;color:gray"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copyright @ 2016 Edwin's Lab. All rights reserved<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tech support: xinchen@umac.mo</span>
       
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
