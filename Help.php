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
color:#000; 
text-decoration: none;
}
.a1:visited {
	color:#000; 
text-decoration: none;
}
.a1:hover {
	color:#000; 
text-decoration: none;
}
.a1:active {
	color:#000; 
text-decoration: none;
}
.a2:link {
color:#29807F; 
text-decoration: none;
}
.a2:visited {
	color:#29807F; 
text-decoration: none;
}
.a2:hover {
	color:#29807F; 
text-decoration: none;
}
.a2:active {
	color:#29807F; 
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
 width: 280px;
 }
 #yuanjiao5{
 font-family: Arial;
 border: 2px solid #379082;
 border-radius: 20px;
 padding: 10px 18px 10px 10px;
 width: 280px;
 }
 #yuanjiao6{
 font-family: Arial;
 border: 2px solid #379082;
 border-radius: 20px;
 padding: 10px 18px 10px 10px;
 width: 280px;
 }
 #yuanjiao2{
 font-family: Arial;
 border: 2px solid #379082;
 border-radius: 20px;
 padding: 10px 10px 10px 10px;
 width: 550px;
 }
  #yuanjiao4{
 font-family: Arial;
 border: 2px solid #379082;
 border-radius: 20px;
 padding: 10px 10px 10px 10px;
 width: 550px;
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
		document.getElementById("yuanjiao4").style.display="none";
	 } 
	 function change_sur(cancer){ 
		var val=document.getElementsByName("database");
		var sur=/_sur/;
	
		for(var i=0;i<val.length;i++){
			if(val[i].checked==true){
				var can=cancer+"_sur_para";
				if(sur.test(val[i].value)){
					document.getElementById(can).style.display="block";	
				}
				else{
					document.getElementById(can).style.display="none";
				}
				
			}
		}
		//document.getElementById("myForm").submit();
	
		
	 } 
	 function changecolor(ttt,ttt2,ttt3)
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
		  document.getElementById("ifr1").src=ttt3;
		  
		}
</script> 



<?php

function del_dir($dir)
{
if(strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
       $str = `rmdir /s/q  $dir`;
} else {
       $str = `rm -Rf  . $dir`;
}
}

$genes=strtoupper($_GET['genes']);
$cancer=$_GET['cancer'];
$str=$cancer."_measure";
$measure=$_GET[$str];
$bifurcate=$_GET['bifurcate'];
#$color=$_GET['color'];

$database=$_GET['database'];

$sur=0;
#echo "$database";
if(preg_match("/_sur/",$database)){
	$database=str_replace("_sur","",$database);
	$sur=1;
}

#echo "$database<br>$genes<br>$sur<br>";

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
				  del_dir("./res_tmp"."/".$filesnames[$i]);
					
			  }
			  elseif(($day-$filesnames[$i])<0){
				  if(($day-$filesnames[$i]+28)>1){
					  del_dir("./res_tmp"."/".$filesnames[$i]);
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
	  if($sur=="1"){
		    $ss=`Rscript ./Rscripts/test_survival_V5_sur.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate `;
			echo "Rscript ./Rscripts/test_survival_V5_sur.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate --1";
			
			$database.="_sur";
			
			
	   }
	   else{
	  		$ss=`Rscript ./Rscripts/test_survival_V5.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate `;
			echo "Rscript ./Rscripts/test_survival_V5.R $cancer/$database.RData ./res_tmp/$day/$output_name $gene_arr $measure $bifurcate --2";
	   }
	
	}
	else{
		$nogene="There is no gene information in the database<br>";	
	}
	
	
	 
}


?>


<script type="text/javascript"> 
 function showfiles_auto(){ 
		
		if(document.getElementById("cancer").value!="0"){
				document.getElementById("yuanjiao5").style.display="block";
				document.getElementById("yuanjiao6").style.display="none";
				var obj=document.getElementById("cancer").value;
				document.getElementById(obj).style.display="block";
				
				var val=document.getElementsByName("database");
				var sur=/_sur/;
			
				for(var i=0;i<val.length;i++){
					if(val[i].checked==true){
						var can=document.getElementById("cancer").value+"_sur_para";
						if(sur.test(val[i].value)){
							document.getElementById(can).style.display="block";	
						}
						else{
							document.getElementById(can).style.display="none";
						}
						
					}
				}

		}
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
		if(document.getElementById("cancer").value!="0"){
				document.getElementById("yuanjiao5").style.display="block";
				document.getElementById("yuanjiao6").style.display="none";
		}
		
		
		//if(document.getElementsByName("cancer").
		
		
       }
 
</script>
<body onload="showfiles_auto()">


<form action="index.php" method="get" id="myForm">
<table width="100%" align="left">

    <tr>
        <td>
            <?php require('head.php');?>
            
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
                    <td width="250" align="top" valign="top"><?php require("analysis_pane.php");?></td>
               
                   
                  <td align="left" valign="top" width="250">
                  <div id="yuanjiao4" <?php if($database!="" and $genes!=""){echo " style=\"display:none\"";}?>>
                  <table width="100%">
                    	<tr>
                        	<td align="left">
                            	<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Help</span>
                            </td>
                        </tr>
                        <tr>
                        	<td><hr />
                            </td>
                        </tr>
                        <tr>
                        	<td>
                            <br>
                            
                        	  <span style="font-size:18px"><strong>1. Tumor stage (Breast cancer)</strong></span>
                      	
                        	  <br><br><strong>Stage 0</strong> is used to describe non-invasive breast cancers. In stage 0, there is no evidence of cancer cells or non-cancerous abnormal cells breaking out of the part of the primary site in which they started, or getting through to or invading neighboring normal tissue.<br /><br />
                        	    <strong>Stage I</strong> describes invasive cancer (cancer cells are breaking through to or invading normal surrounding primary tissue). <strong>Stage I</strong> is divided into subcategories known as IA and IB.<br /><br />
                        	    <strong>Stage IA</strong> describes invasive breast cancer in which:
                              <ul>
                                <li>the tumor measures up to 2 centimeters AND</li>
                                <li>the cancer has not spread outside the breast; no lymph nodes are involved</li>
                              </ul>
                              <p align="left"><strong>Stage IB</strong> describes invasive breast cancer in which:</p>
                              <ul>
                                <li>there is no tumor in the breast; instead, small groups of cancer cells – larger than 0.2 millimeter but not larger than 2 millimeters – are found in the lymph nodes OR</li>
                                <li>there is a tumor in the breast that is no larger than 2 centimeters, and there are small groups of cancer cells – larger than 0.2 millimeter but not larger than 2 millimeters – in the lymph nodes.</li>
                              </ul>
                              <p align="left">Microscopic invasion is possible in stage I breast cancer. In microscopic invasion, the cancer cells have just started to invade the tissue outside the lining of the duct or lobule, but the invading cancer cells can't measure more than 1 millimeter.<br /><br />
                                <strong>Stage II</strong> is divided into subcategories known as IIA and IIB.<br /><br />
                                <strong>Stage IIA </strong>describes invasive breast cancer in which:</p>
                              <ul>
                                <li>no tumor can be found in the breast, but cancer (larger than 2 millimeters) is found in 1 to 3 axillary lymph nodes (the lymph nodes under the arm) or in the lymph nodes near the breast bone (found during a sentinel node biopsy) OR</li>
                                <li>the tumor measures 2 centimeters or smaller and has spread to the axillary lymph nodes OR</li>
                                <li>the tumor is larger than 2 centimeters but not larger than 5 centimeters and has not spread to the axillary lymph nodes</li>
                              </ul>
                              <p align="left"><strong>Stage IIB</strong> describes invasive breast cancer in which:</p>
                              <ul>
                                <li>the tumor is larger than 2 centimeters but no larger than 5 centimeters; small groups of breast cancer cells -- larger than 0.2 millimeter but not larger than 2 millimeters -- are found in the lymph nodes OR</li>
                                <li>the tumor is larger than 2 centimeters but no larger than 5 centimeters; cancer has spread to 1 to 3 axillary lymph nodes or to lymph nodes near the breastbone (found during a sentinel node biopsy) OR</li>
                                <li>the tumor is larger than 5 centimeters but has not spread to the axillary lymph nodes.</li>
                              </ul>
                              <p align="left"><strong>Stage III</strong> is divided into subcategories known as IIIA, IIIB, and IIIC.<br /><br />
                                <strong>Stage IIIA</strong> describes invasive breast cancer in which either:</p>
                              <ul>
                                <li>no tumor is found in the breast or the tumor may be any size; cancer is found in 4 to 9 axillary lymph nodes or in the lymph nodes near the breastbone (found during imaging tests or a physical exam) OR</li>
                                <li>the tumor is larger than 5 centimeters; small groups of breast cancer cells (larger than 0.2 millimeter but not larger than 2 millimeters) are found in the lymph nodes OR</li>
                                <li>the tumor is larger than 5 centimeters; cancer has spread to 1 to 3 axillary lymph nodes or to the lymph nodes near the breastbone (found during a sentinel lymph node biopsy)</li>
                              </ul>
                              <p align="left"><strong>Stage IIIB</strong> describes invasive breast cancer in which:</p>
                              <ul>
                                <li>the tumor may be any size and has spread to the chest wall and/or skin of the breast and caused swelling or an ulcer AND</li>
                                <li>may have spread to up to 9 axillary lymph nodes OR</li>
                                <li>may have spread to lymph nodes near the breastbone</li>
                              </ul>
                              <p align="left">Stage IIIC describes invasive breast cancer in which:<br />
                                there may be no sign of cancer in the breast or, if there is a tumor, it may be any size and may have spread to the chest wall and/or the skin of the breast AND</p>
                              <ul>
                                <li>the cancer has spread to 10 or more axillary lymph nodes OR</li>
                                <li>the cancer has spread to lymph nodes above or below the collarbone OR</li>
                                <li>the cancer has spread to axillary lymph nodes or to lymph nodes near the breastbone</li>
                              </ul>
                              <p align="left"><strong>Stage IV</strong> describes invasive breast cancer that has spread beyond the breast and nearby lymph nodes to other organs of the body, such as the lungs, distant lymph nodes, skin, bones, liver, or brain.</p>
                              
                                <span style="font-size:18px"><strong>2. Pathological/Clinical TNM</strong></span>
                              
                              <p align="left">TNM is a dual system that includes <strong>a clinical</strong> (pretreatment) and a pathological (postsurgical histopathological) classification. It is imperative to differentiate between these classifications because they are based on different methods of examination and serve different purposes. The clinical classification is designated TNM or cTNM; the pathological, pTNM. When the abbreviation TNM is used without a prefix, it implies the clinical classification (cTNM). Microscopic confirmation does not in itself justify the use of pTNM. The requirements for pathological classification are described in site-specific recommendations for pT and pN.<br /><br />
                                <strong>TNM (Tumor, Node, Metastasis)</strong>&nbsp;is another staging system researchers use to provide more details about how the cancer looks and behaves. The TNM system is based on three characteristics:</p>
                              <ul>
                                <li><strong>size</strong>&nbsp;(<strong>T</strong>&nbsp;stands for tumor)</li>
                                <li><strong>lymph node involvement</strong>&nbsp;(<strong>N</strong>&nbsp;stands for node)</li>
                                <li><strong>whether the cancer has metastasized</strong>&nbsp;(<strong>M</strong>&nbsp;stands for metastasis), or moved beyond the primary site to other parts of the body.</li>
                              </ul>
                              <p align="left">The T (size) category describes the original (primary) tumor:</p>
                              <ul>
                                <li><strong>TX</strong>&nbsp;means the tumor can't be measured or found.</li>
                                <li><strong>T0</strong>&nbsp;means there isn't any evidence of the primary tumor.</li>
                                <li><strong>Tis</strong>&nbsp;means the cancer is &quot;in situ&quot; (the tumor has not started growing into healthy breast tissue).</li>
                                <li><strong>T1, T2, T3, T4:</strong>&nbsp;These numbers are based on the size of the tumor and the extent to which it has grown into neighboring primary tissue. The higher the T number, the larger the tumor and/or the more it may have grown into the primary tissue.</li>
                              </ul>
                              <p align="left"><strong>T1a</strong>: tumor was incidentally found in 5% or less of prostate tissue resected (for other reasons); <strong>T1b</strong>: tumor was incidentally found in greater than 5% of prostate tissue resected; <strong>T1c</strong>: tumor was found in a needle biopsy performed due to an elevated serum PSA.<br />
                                <strong>T2a</strong>: the tumor is in half or less than half of one of the prostate gland's two lobes; <strong>T2b</strong>: the tumor is in more than half of one lobe, but not both; <strong>T2c</strong>: the tumor is in both lobes but within the prostatic capsule.<br />
                                <strong>T3a</strong>: the tumor has spread through the capsule on one or both sides; <strong>T3b</strong>: the tumor has invaded one or both seminal vesicles.<br />
                                <strong>T4</strong>: the tumor has invaded other nearby structures<br />
                                <strong>The N (lymph node involvement)</strong> category describes whether or not the cancer has reached nearby lymph nodes:</p>
                              <ul>
                                <li><strong>NX</strong>&nbsp;means the nearby lymph nodes can't be measured or found.</li>
                                <li><strong>N0</strong>&nbsp;means nearby lymph nodes do not contain cancer.</li>
                                <li><strong>N1, N2, N3:</strong>&nbsp;These numbers are based on the number of lymph nodes involved and how much cancer is found in them. The higher the N number, the greater the extent of the lymph node involvement.</li>
                              </ul>
                              <p align="left"><strong>The M (metastasis)</strong> category tells whether or not there is evidence that the cancer has traveled to other parts of the body:</p>
                              <ul>
                                <li><strong>MX</strong>&nbsp;means metastasis can't be measured or found.</li>
                                <li><strong>M0</strong>&nbsp;means there is no distant metastasis.</li>
                                <li><strong>M1</strong>&nbsp;means that distant metastasis is present. <strong>M1a</strong>: non-regional lymph node(s); <strong>M1b</strong>: bone(s); <strong>M1c</strong>: other site(s).</li>
                              </ul>
                             <span style="font-size:18px"><strong>3. The Gleason Score</strong></span><br /><br />
                                A &lsquo;Gleason&rsquo; score is given after a pathologist has examined under a microscope cancerous tissue obtained from the needle biopsy. The cells identified are given a grade number from 1 to 5, depending on the abnormality of the cells, 1 being the lowest, 5 the highest. The grades of the two most common patterns are added together to give a score from 2 to 10. The higher the score, the more aggressive and fast-growing the cancer.</p>
                              <ul>
                                <li>A Gleason score of 2 – 5 is now rarely reported</li>
                                <li>A Gleason score of 6 (cells are well differentiated) is &lsquo;favorable&rsquo;</li>
                                <li>A Gleason score of 7 (cells are moderately differentiated) is &lsquo;average&rsquo;</li>
                                <li>A Gleason Score of 8 – 10 (cells are poorly differentiated) is &lsquo;adverse&rsquo;.</li>
                              </ul>
                              <span style="font-size:18px"><strong>4. BCR Status</strong><br /></span><br />
                                Biochemical recurrence (BCR) is defined by PSA level after initial treatment.<br /><br />
							<span style="font-size:18px"><strong>5. Residual tumor</strong><br /></span><br />
                            The tumor status following treatment is described by the residual tumor (R) classification: <strong>R0</strong>, no residual tumor; <strong>R1</strong>, microscopic residual tumor; <strong>R2</strong>, macroscopic residual tumor. <strong>RX</strong><strong>.</strong>&nbsp;Presence of residual tumour cannot be assessed.</p></td>
                        </tr>
                  </table>
                  
                  
                  
                  
                  
                  </div></td>
                    
                    <td align="left" valign="top">&nbsp;
                    
                     
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
       <?php require('copyright.php');?>
       
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
