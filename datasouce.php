<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="#" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Gene Data Analysis</title>
 
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
#mytable{border-collapse:collapse;border-bottom:1px solid #ccc}
#mytr.first{border-top:1px solid #ccc;border-bottom:1px solid #ccc}
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
 width: 800px;
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
                            	<span style="color:#333;font-size:18px">&nbsp;&nbsp;&nbsp;&nbsp;Data Source</span>
                            </td>
                        </tr>
                        <tr>
                        	<td><hr />
                            </td>
                        </tr>
                        <tr>
                       	  <td><p><b>1.  Prostate cancer</b></p>
                       	      a. Prostate cancer patients
                                <table  cellspacing="1" cellpadding="2">
                       	        <col width="171" />
                       	        <col width="121" />
                       	        <col width="152" />
                       	        <col width="107" />
                       	        <col width="221" />
                       	        <col width="129" />
                       	        <col width="167" />
                       	        <tr bgcolor="#999999" style="color:#FFF">
                       	          <th dir="ltr" width="171">Accession   ID </th>
                       	          <th dir="ltr" width="121">PMID</th>
                       	          <th dir="ltr" width="152">Phenotype</th>
                       	          <th dir="ltr" width="107">Sample Size</th>
                       	          <th dir="ltr" width="129">Features</th>
                       	          </tr>
                       	        <tr valign="middle" align="center" bgcolor="#E4E4E4">
                       	          <td dir="ltr" width="171"><a href="https://gdc-portal.nci.nih.gov/">TCGA</a></td>
                       	          <td width="121">-</td>
                       	          <td dir="ltr" width="152">tumor</td>
                       	          <td dir="ltr" width="107">384</td>
                       	          <td dir="ltr" width="129">survival,   TN, gleason score</td>
                       	          </tr>
                       	        <tr valign="middle" align="center" bgcolor="#CCCCCC">
                       	          <td dir="ltr" width="171"><a href="https://trace.ncbi.nlm.nih.gov/Traces/sra/?study=SRP011439">SRP0011439</a></td>
                       	          <td width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=21804560">21804560</a></td>
                       	          <td dir="ltr" width="152">benign/localized   tumor</td>
                       	          <td dir="ltr" width="107">114</td>
                       	          <td dir="ltr" width="129">Benign, localized</td>
                       	          </tr>
                       	        <tr valign="middle" align="center" bgcolor="#E4E4E4">
                       	          <td dir="ltr" width="171"><a href="https://trace.ncbi.nlm.nih.gov/Traces/sra/?study=SRP005908">SRP005908</a></td>
                       	          <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=21036922">21036922</a></td>
                       	          <td dir="ltr" width="152">prostate patients</td>
                       	          <td dir="ltr" width="107">28</td>
                       	          <td dir="ltr" width="129">gleason score, psa and   tnm</td>
                       	          </tr>
                       	        <tr valign="middle" align="center" bgcolor="#CCCCCC">
                       	          <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE24283">GSE24283</a></td>
                       	          <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=21261984">21261984</a></td>
                       	          <td dir="ltr" width="152">tumor/normal</td>
                       	          <td dir="ltr" width="107">3/3</td>
                       	          <td dir="ltr" width="129">Tumor and normal</td>
                       	          </tr>
                       	        <tr valign="middle" align="center" bgcolor="#E4E4E4">
                       	          <td dir="ltr" width="171"><a href="https://trace.ncbi.nlm.nih.gov/Traces/sra/?study=SRP002628">SRP002628</a></td>
                       	          <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=21571633">21571633</a></td>
                       	          <td dir="ltr" width="152">prostate tumors and   matched adjacent tissues</td>
                       	          <td dir="ltr" width="107">20/10</td>
                       	          <td dir="ltr" width="129">gleanson score </td>
                       	          </tr>
                       	        <tr valign="middle" align="center" bgcolor="#CCCCCC">
                       	          <td dir="ltr" width="171"><a href="https://trace.ncbi.nlm.nih.gov/Traces/sra/?study=ERP000550">ERP000550</a></td>
                       	          <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=22349460">22349460</a></td>
                       	          <td dir="ltr" width="152">prostate cancer and   adjacent normal tissues</td>
                       	          <td dir="ltr" width="107">14/14</td>
                       	          <td dir="ltr" width="129">TN, gleason score, PSA</td>
                       	          </tr>
                       	        <tr valign="middle" align="center" bgcolor="#E4E4E4">
                       	          <td dir="ltr" width="171"><a href="https://trace.ncbi.nlm.nih.gov/Traces/sra/?study=SRP026387">SRP026387</a></td>
                       	          <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=24054872">24054872</a></td>
                       	          <td dir="ltr" width="152">pre and post treatment</td>
                       	          <td dir="ltr" width="107">7/7 </td>
                       	          <td dir="ltr" width="129">gleason score,TNM </td>
                       	          </tr>
               	            </table>
                       	      <br />
                       	      b. Prostate cancer cell lines<br>
                       	      <table  cellspacing="1" cellpadding="2">
                       	        <col width="171" />
                       	        <col width="121" />
                       	        <col width="152" />
                       	        <col width="107" />
                       	        <col width="221" />
                       	        <col width="129" />
                       	        <col width="167" />
                       	        <tr bgcolor="#999999"  style="color:#FFF">
                       	          <th dir="ltr" width="171">Accession   ID </th>
                       	          <th dir="ltr" width="121">PMID</th>
                       	          <th dir="ltr" width="152">Phenotype</th>
                       	          <th dir="ltr" width="107">Sample Size</th>
                       	          <th dir="ltr" width="129">Features</th>
                   	            </tr>
                       	        <tr valign="middle" align="center"  bgcolor="#E4E4E4">
                       	          <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE48812">GSE48812</a></td>
                       	          <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=25044704">25044704</a></td>
                       	          <td dir="ltr" width="152">PrEC, LNCaP, PC3</td>
                       	          <td dir="ltr" width="107">12 /12 /12</td>
                       	          <td dir="ltr" width="129">time series   Sulforaphane, DMSO</td>
                   	            </tr>
                       	        <tr valign="middle" align="center" bgcolor="#CCCCCC">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=SRP013621">SRP013621</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=24012641">24012641</a></td>
<td dir="ltr" width="152">tumor</td>
<td dir="ltr" width="107">1/1</td>
<td dir="ltr" width="129">LNCaP, LNCaP-AI-F</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=SRP027258">SRP027258</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=26805894">26805894</a></td>
<td dir="ltr" width="152">PC3, LNCaP, PrEC</td>
<td dir="ltr" width="107">12 /12 /12</td>
<td dir="ltr" width="129">6h and 24h treated by DMSO, SFN</td>
</tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=SRP010054">SRP010054</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=25700553">25700553</a></td>
<td dir="ltr" width="152">LNCaP</td>
<td dir="ltr" width="107">3/3</td>
<td dir="ltr" width="129">LNCaP R1881 treatment</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=SRP014759">SRP014759</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=25274489">25274489</a></td>
<td dir="ltr" width="152">tumor</td>
<td dir="ltr" width="107">1/1</td>
<td dir="ltr" width="129">PC3E, GS689.Li</td>
</tr>
                       	        <tr bgcolor="#CCCCCC" valign="middle" align="center" >
                       	          <td dir="ltr"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE25183">GSE25183</a></td>
                       	          <td dir="ltr"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=21804560">21804560</a></td>
                       	          <td dir="ltr">normal/cancer</td>
                       	          <td dir="ltr">58</td>
                       	          <td dir="ltr">17 cell lines</td>
                   	            </tr>
                   	          </table>
                       	      <br><br />
                   	        <p><b>2. Breast cancer</b></p>
                            a. Breast cancer patients<br>
                            <table  cellspacing="1" cellpadding="2">
                              <col width="171" />
                              <col width="121" />
                              <col width="152" />
                              <col width="107" />
                              <col width="221" />
                              <col width="129" />
                              <col width="167" />
                              <tr bgcolor="#999999" style="color:#FFF">
                       	          <th dir="ltr" width="171">Accession   ID </th>
                       	          <th dir="ltr" width="121">PMID</th>
                       	          <th dir="ltr" width="152">Phenotype</th>
                       	          <th dir="ltr" width="107">Sample Size</th>
                       	          <th dir="ltr" width="129">Clinical Features</th>
                   	          </tr>
                              <tr valign="middle" align="center" bgcolor="#E4E4E4">
                                <td dir="ltr" width="171"><a href="https://gdc-portal.nci.nih.gov/">TCGA</a></td>
                                <td dir="ltr" width="121">-</td>
                                <td dir="ltr" width="152">normal/primary tumor/metastatic tumor</td>
                                <td dir="ltr" width="107">943</td>
                                <td dir="ltr" width="129">survival,tumor stage</td>
                              </tr>
                              <tr bgcolor="#CCCCCC" valign="middle" align="center" >
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE28866">GSE28866</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE28866">24904649</a></td>
                                <td dir="ltr" width="152">normal/tumor</td>
                                <td dir="ltr" width="107">6/5</td>
                                <td dir="ltr" width="129">-</td>
                              </tr>
                              <tr valign="middle" align="center" bgcolor="#E4E4E4">
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE58135">GSE58135</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE58135">24929677</a></td>
                                <td dir="ltr" width="152">normal/tumor</td>
                                <td dir="ltr" width="107">140</td>
                                <td dir="ltr" width="129">ER status, triple   negative</td>
                              </tr>
                              <tr bgcolor="#CCCCCC" valign="middle" align="center" >
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE60788">GSE60788</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE60788">25722745</a></td>
                                <td dir="ltr" width="152">tumor/normal</td>
                                <td dir="ltr" width="107">51/4</td>
                                <td dir="ltr" width="129">ER/PR/ERBB2 status and   grade </td>
                              </tr>
                              
                              <tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE30611">GSE30611</a></td>
<td dir="ltr" width="121">Illumina Human Body Map 2.0 Project</td>
<td dir="ltr" width="152">normal</td>
<td dir="ltr" width="107">2 for each</td>
<td dir="ltr" width="129">adipose, adrenal, brain, breast, colon, heart, kidney, liver, lung, lymph node,  ovary,  prostate,  skeletal muscle,  testes,  thyroid,  white blood cells</td>
</tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC">
  <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE47462">GSE47462</a></td>
  <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=24887547">24887547</a></td>
  <td dir="ltr" width="152">normal/tumor</td>
  <td dir="ltr" width="107">28/52</td>
  <td dir="ltr" width="129">normal/tumor tissue</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
  <td dir="ltr"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE52194">GSE52194</a></td>
  <td dir="ltr"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=23884293">23884293</a></td>
  <td dir="ltr">normal/tumor</td>
  <td dir="ltr">3/17</td>
  <td dir="ltr">17 breast tumor samples of three different subtypes (TNBC,  non-TNBC and HER2-positive) and 3 normal human breast organoids (epithelium) samples (NBS)</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
  <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE71651">GSE71651</a></td>
  <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=28738804">28738804</a></td>
  <td dir="ltr" width="152">normal/tumor</td>
  <td dir="ltr" width="107">18/15</td>
  <td dir="ltr" width="129">3 normal tissue, 15 adjacent normal samples, 15 tumor samples</td>
</tr>

                              
                              
                            </table>
                            <br>
                            b. Breast cancer cell lines<br>
                            <table  cellspacing="1" cellpadding="2">
                              <col width="171" />
                              <col width="121" />
                              <col width="152" />
                              <col width="107" />
                              <col width="221" />
                              <col width="129" />
                              <col width="167" />
                              <tr bgcolor="#999999" style="color:#FFF">
                       	          <th dir="ltr" width="171">Accession   ID </th>
                       	          <th dir="ltr" width="121">PMID</th>
                       	          <th dir="ltr" width="152">Phenotype</th>
                       	          <th dir="ltr" width="107">Sample Size</th>
                       	          <th dir="ltr" width="129">Clinical Features</th>
                   	          </tr>
                              <tr valign="middle" align="center" bgcolor="#E4E4E4">
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE28866">GSE28866</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE28866">22929540</a></td>
                                <td dir="ltr" width="152">cancer</td>
                                <td dir="ltr" width="107">6</td>
                                <td dir="ltr" width="129">CAMA-1, HCC1419, HCC1500, SUM-44PE, UACC-812, ZR-75-30</td>
                              </tr>
                              <tr valign="middle" align="center" bgcolor="#CCCCCC">
                                <td width="171" bgcolor="#CCCCCC" dir="ltr"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE36863">GSE36863</a></td>
                                <td width="121" bgcolor="#CCCCCC" dir="ltr"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE36863">23236365</a></td>
                                <td width="152" bgcolor="#CCCCCC" dir="ltr">normal/cancer</td>
                                <td width="107" bgcolor="#CCCCCC" dir="ltr">1/1/1/1</td>
                                <td width="129" bgcolor="#CCCCCC" dir="ltr">MCF10A, DCIS,   Sum102,Sum225</td>
                              </tr>
                              <tr valign="middle" align="center" bgcolor="#E4E4E4">
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE57243">GSE57243</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE57243">24840202</a></td>
                                <td dir="ltr" width="152">cancer</td>
                                <td dir="ltr" width="107">2 /2</td>
                                <td dir="ltr" width="129">MDA-MB-231 (hnRNPM KD/control)</td>
                              </tr>
                              <tr valign="middle" align="center" bgcolor="#CCCCCC">
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE58135">GSE58135</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE58135">24929677</a></td>
                                <td dir="ltr" width="152">cancer</td>
                                <td dir="ltr" width="107">28</td>
                                <td dir="ltr" width="129">28 different cell lines</td>
                              </tr>
                              <tr valign="middle" align="center" bgcolor="#E4E4E4">
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE62789">GSE62789</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE62789">26438844</a></td>
                                <td dir="ltr" width="152">cancer</td>
                                <td dir="ltr" width="107">1/9</td>
                                <td dir="ltr" width="129">MCF-7 untreated/E2-treatment (time-course)</td>
                              </tr>
                              <tr valign="middle" align="center" bgcolor="#CCCCCC">
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE73857">GSE73857</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE73857">26632845</a></td>
                                <td dir="ltr" width="152">cancer</td>
                                <td dir="ltr" width="107">2/3</td>
                                <td dir="ltr" width="129">MCF-7/MDA-MB-231</td>
                              </tr>
                              <tr valign="middle" align="center" bgcolor="#E4E4E4">
                                <td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE59536">GSE59536</a></td>
                                <td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE59536">25212499</a></td>
                                <td dir="ltr" width="152">cancer</td>
                                <td dir="ltr" width="107">1/1/1</td>
                                <td>E2- and tamoxifen treated MCF7</td>
                              </tr>
                              
                              <tr valign="middle" align="center" bgcolor="#CCCCCC">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE27003">GSE27003</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=21364760">21364760</a></td>
<td dir="ltr" width="152">normal/tumor</td>
<td dir="ltr" width="107">1/8</td>
<td dir="ltr" width="129">BT20, BT474, MCF10A, MCF7, MDAMB231, MDAMB468, T47D, ZR751</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=SRP003186">SRP003186</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=21835007">21835007</a></td>
<td dir="ltr" width="152">tumor</td>
<td dir="ltr" width="107">1/1/1/1</td>
<td dir="ltr" width="129">BT474,  SKBR3,  KPL4,  MCF7</td>
</tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE47043">GSE47043</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=25058159">25058159</a></td>
<td dir="ltr" width="152">tumor</td>
<td dir="ltr" width="107">2/2</td>
<td dir="ltr" width="129">MCF7 Nutlin-treated and untreated</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=SRP006726">SRP006726</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=24111759">24111759</a></td>
<td dir="ltr" width="152">normal/tumor</td>
<td dir="ltr" width="107">1/2</td>
<td dir="ltr" width="129">HMEC, SUM149, SUM191</td>
</tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE45419">GSE45419</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=26327458">26327458</a> / <a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=24223926">24223926</a></td>
<td dir="ltr" width="152">normal/tumor</td>
<td dir="ltr" width="107">8/24</td>
<td dir="ltr" width="129">HMEC, breast cancer tissue</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE58626">GSE58626</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=25387393">25387393</a></td>
<td dir="ltr" width="152">tumor</td>
<td dir="ltr" width="107">3/3/3/3</td>
<td dir="ltr" width="129">MCF7 0h, 3h, 6h and 9h after FDI-6 treatment</td>
</tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE74417">GSE74417</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=27879268">27879268</a></td>
<td dir="ltr" width="152">normal</td>
<td dir="ltr" width="107">3</td>
<td dir="ltr" width="129">primary normal breast epithelial cells</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=E-MTAB-4993">E-MTAB-4993</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=27685983">27685983</a></td>
<td dir="ltr" width="152">tumor</td>
<td dir="ltr" width="107">51/12</td>
<td dir="ltr" width="129">ER+,  triple negative from UCBS</td>
</tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE53532">GSE53532</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=24639548">24639548</a></td>
<td dir="ltr" width="152">tumor</td>
<td dir="ltr" width="107">1/1</td>
<td dir="ltr" width="129">siERalpha,  siCtrol on MCF7</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE78512">GSE78512</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=27602759">27602759</a></td>
<td dir="ltr" width="152">tumor</td>
<td dir="ltr" width="107">27</td>
<td dir="ltr" width="129">CKI and 5FU treated MCF-7 cell line</td>
</tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE48213">GSE48213</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=24176112">24176112</a></td>
<td dir="ltr" width="152">normal/tumor</td>
<td dir="ltr" width="107">6/52</td>
<td dir="ltr" width="129">non-tumor/tumor breast cancer cell line</td>
</tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4">
<td dir="ltr" width="171"><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE96860">GSE96860</a></td>
<td dir="ltr" width="121"><a href="https://www.ncbi.nlm.nih.gov/pubmed/?term=29273624">29273624</a></td>
<td dir="ltr" width="152">normal/tumor</td>
<td dir="ltr" width="107">4 for each</td>
<td dir="ltr" width="129">76NF2V, AU565, HCC1937, HCC1954, MB468, MCF10A, MCF-7, MDA MB-231, MDA MB-361, MDA MB-436,  SKBR3,  UACC812,  ZR751</td>
</tr>
                              
                            </table>
                            <br>
<p><b>3. Other cancer types from TCGA</b> </p>

<table width="611" cellpadding="2"  cellspacing="1">
<tr bgcolor="#999999" style="color:#FFF"><th dir="ltr" width="171">Cohort</th><th width="427" align="center" valign="middle">Disease Name</th></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-ACC</td><td align="center" valign="middle">Adrenocortical carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-BLCA</td><td align="center" valign="middle">Bladder urothelial carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-CESC</td><td align="center" valign="middle">Cervical and endocervical cancers</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-CHOL</td><td align="center" valign="middle">Cholangiocarcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-COAD</td><td align="center" valign="middle">Colon adenocarcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-DLBC</td><td align="center" valign="middle">Lymphoid Neoplasm Diffuse Large B-cell Lymphoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-ESCA</td><td align="center" valign="middle">Esophageal carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-GBM</td><td align="center" valign="middle">Glioblastoma multiforme</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-HNSC</td><td align="center" valign="middle">Head and Neck squamous cell carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-KICH</td><td align="center" valign="middle">Kidney Chromophobe</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-KIRC</td><td align="center" valign="middle">Kidney renal clear cell carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-KIRP</td><td align="center" valign="middle">Kidney renal papillary cell carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-LGG</td><td align="center" valign="middle">Brain Lower Grade Glioma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-LIHC</td><td align="center" valign="middle">Liver hepatocellular carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-LUAD</td><td align="center" valign="middle">Lung adenocarcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-LUSC</td><td align="center" valign="middle">Lung squamous cell carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-MESO</td><td align="center" valign="middle">Mesothelioma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-OV</td><td align="center" valign="middle">Ovarian serous cystadenocarcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-PAAD</td><td align="center" valign="middle">Pancreatic adenocarcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-PCPG</td><td align="center" valign="middle">Pheochromocytoma and Paraganglioma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-READ</td><td align="center" valign="middle">Rectum adenocarcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-SARC</td><td align="center" valign="middle">Sarcoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-SKCM</td><td align="center" valign="middle">Skin Cutaneous Melanoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-STAD</td><td align="center" valign="middle">Stomach adenocarcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-TGCT</td><td align="center" valign="middle">Testicular Germ Cell Tumors</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-THCA</td><td align="center" valign="middle">Thyroid carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-THYM</td><td align="center" valign="middle">Thymoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-UCEC</td><td align="center" valign="middle">Uterine Corpus Endometrial Carcinoma</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">TCGA-UCS</td><td align="center" valign="middle">Uterine Carcinosarcoma</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">TCGA-UVM</td><td align="center" valign="middle">Uveal Melanoma</td></tr>
</table>

<br>
<p><b>4. Cell line expression profiles from databases for other cancer types</b> </p>

<table width="612" cellpadding="2"  cellspacing="1">
<tr bgcolor="#999999" style="color:#FFF"><th dir="ltr" width="171">Cohort</th><th width="197" align="center" valign="middle">Number Of CellLines</th><th width="226" align="center" valign="middle">Number of Cancer Types</th></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">CCLE_GSE36133</td><td align="center" valign="middle">645</td><td align="center" valign="middle">17</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">CellLineNavigator_E-MTAB-37</td><td align="center" valign="middle">227</td><td align="center" valign="middle">18</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">CellMinerHCC</td><td align="center" valign="middle">17</td><td align="center" valign="middle">1</td></tr>
<tr valign="middle" align="center" bgcolor="#CCCCCC"> <td dir="ltr" width="171">COSMIC</td><td align="center" valign="middle">606</td><td align="center" valign="middle">19</td></tr>
<tr valign="middle" align="center" bgcolor="#E4E4E4"> <td dir="ltr" width="171">MERAV</td><td align="center" valign="middle">1318</td><td align="center" valign="middle">18</td></tr>
</table>
                            <br><br>
                            </td>
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
