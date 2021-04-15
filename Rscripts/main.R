Args <- commandArgs()
input_file=Args[6]
gene=Args[7]
gene=unlist(strsplit(gene, ","))

filename<- paste0("./data/exp_data/",input_file)
source("./Rscripts/CheckGene.R")
load(filename)
#GeneSymbol=c("KLK3","NPY","FN1","ACPP")#input multiple genes
GeneSymbol=gene
CheckGene(exp,GeneSymbol)
