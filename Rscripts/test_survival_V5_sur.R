Args <- commandArgs()


input_file=Args[6]
output_folder=Args[7]
gene=Args[8]
SurvivalType=Args[9]
km_type_order=Args[10]


gene=unlist(strsplit(gene, ","))
setwd(output_folder)

require(survival)
#Sys.putenv("DISPLAY"=":0.0")
###load functions
source("../../../Rscripts/Exp_selected_gene_revised.R")
source("../../../Rscripts/Exp_selected_gene_BRCA.R")
source("../../../Rscripts/kmplot_revised.R")
source("../../../Rscripts/Boxplot_clinical_without_survival.R")
require(ggplot2)

filename<- paste0("../../../data/exp_data/",input_file)
load(filename)#containing exp, Samples

Dataset_str=unlist(strsplit(input_file, "/"))
Dataset_str2=unlist(strsplit(Dataset_str[2], "."))
Dataset=Dataset_str2[1]

GeneSymbol=gene




#SurvivalType={"BCR_status"}#full name of the selected clinical survial type

km_type_arr=c("Q3Q1","Q3","Q1", "median","average")



##clinical infor boxplot
#for (i in 1:length(GeneSymbol)){
#########################################################
#Boxplot_clinical_without_survival(Samples,GeneSymbol[i],exp,Dataset)
#########################################################
#}

if(Dataset_str[1]=="Prostate"){
	test_final<-Exp_selected_gene_revised(exp,GeneSymbol,Samples,SurvivalType)
}
if(Dataset_str[1]=="Breast"){
	test_final<-Exp_selected_gene_BRCA(exp,GeneSymbol,Samples,SurvivalType)
}


##survival curve
kmplot_revised(test_final,km_type_arr[as.numeric(km_type_order)])

#########################################################
write.csv(test_final,"Input_gene_expression.csv")# save gene and clinical information
#########################################################





