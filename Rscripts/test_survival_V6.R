Args <- commandArgs()


input_file=Args[6]
output_folder=Args[7]
gene=Args[8]
#SurvivalType=Args[9]
km_type_order=Args[9]


gene=unlist(strsplit(gene, ","))
#print(output_folder)
setwd(output_folder)

require(survival)

#Sys.putenv("DISPLAY"=":0.0")
###load functions
#source("../../../Rscripts/Exp_selected_gene_revised.R")
source("../../../Rscripts/Exp_selected_gene_Overall_survival.R")
source("../../../Rscripts/Exp_selected_gene_Recurrence_free_survival.R")
#source("../../../Rscripts/kmplot_revised.R")
source("../../../Rscripts/kmplot_OS.R")
source("../../../Rscripts/kmplot_RFS.R")
#source("../../../Rscripts/Boxplot_clinical_without_survival_revised.R")
source("../../../Rscripts/Boxplot_clinical_without_survival_revised_Log2.R")
source("../../../Rscripts/Boxplot_clinical_without_survival_revised_noLog2.R")
#source("../../../Rscripts/Exp_selected_gene_BRCA.R")
require(ggplot2)

filename<- paste0("../../../data/exp_data/",input_file)
load(filename)#containing exp, Samples

Dataset_str=unlist(strsplit(input_file, "/"))
Dataset_str2=unlist(strsplit(Dataset_str[2], "[.]"))
Dataset=Dataset_str2[1]

GeneSymbol=gene

log_label=c("GSE36133","CellLineNavigator","CellMinerHCC","COSMIC","MERAV")

log_label_value=0
#print(log_label_value)
for(i in 1:length(log_label)){
	tmpp=gregexpr(log_label[i], input_file)
	if(tmpp[[1]][1]>-1){
		log_label_value=1
	}
}

#print(log_label_value)
#print(log_label)



#SurvivalType={"BCR_status"}#full name of the selected clinical survial type

km_type_arr=c("Q3Q1","Q3","Q1", "median","average")


if(log_label_value==1){
	##clinical infor boxplot
	for (i in 1:length(GeneSymbol)){
	#########################################################
	Boxplot_clinical_without_survival_revised_noLog2(Samples,GeneSymbol[i],exp,Dataset)
	#########################################################
	}
	print("Boxplot_clinical_without_survival_revised_noLog2")
}else{
	for (i in 1:length(GeneSymbol)){
	#########################################################
	Boxplot_clinical_without_survival_revised_Log2(Samples,GeneSymbol[i],exp,Dataset)
	#########################################################
	}
	print("Boxplot_clinical_without_survival_revised_Log2")
}

#if(Dataset_str[1]!="Breast"){
#	test_final<-Exp_selected_gene_revised(exp,GeneSymbol,Samples,SurvivalType)
#}
#if(Dataset_str[1]=="Breast"){
#	test_final<-Exp_selected_gene_BRCA(exp,GeneSymbol,Samples,SurvivalType)
#}

##overall survival in default
#test_final<-Exp_selected_gene_Overall_survival(exp,GeneSymbol,Samples)
##overall survival in default


if(length(grep("Time|time", colnames(Samples)))!=0){
	test_final<-Exp_selected_gene_Overall_survival(exp,GeneSymbol,Samples)

	if (sum(test_final$Outcome)!=0)
	{kmplot_OS(test_final,km_type_arr[as.numeric(km_type_order)])
	write.csv(test_final,"Input_gene_expression_Overall_survival.csv")# save gene and clinical information
	}
}

##output km-plot figures "***_Overall_survival.pdf" and "***_Overall_survival.png"

##if RFS
if(length(grep("Recurrence_free_survival", colnames(Samples)))!=0)
{test_final1<-Exp_selected_gene_Recurrence_free_survival(exp,GeneSymbol,Samples)
kmplot_RFS(test_final1,km_type_arr[as.numeric(km_type_order)])
write.csv(test_final1,"Input_gene_expression_Recurrence_free_survival.csv")# save gene and clinical information
}
##output km-plot figures "***_Recurrence_free_survival.pdf" and "***_Recurrence_free_survival.png"






