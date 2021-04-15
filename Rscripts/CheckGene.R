CheckGene<-function(exp,GeneSymbol){
GeneAnnotation=exp[,1]
Available_genes<-intersect(GeneAnnotation,GeneSymbol)
if (length(Available_genes)==0){
print("Nogene")
}
print("ok")
}
