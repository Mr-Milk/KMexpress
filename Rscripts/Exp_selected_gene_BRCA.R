Exp_selected_gene_BRCA<-function(exp,GeneSymbol,Samples,SurvivalType)
{
GeneAnnotation=exp[1]
exp<-exp[,-1]
if (length(GeneSymbol)==1){
##match KLK3_ 
#test_exp<-exp[grep(paste("^", GeneSymbol,"_",sep=""), rownames(exp)),]
test_exp<-exp[GeneAnnotation==GeneSymbol,]
test_exp<-t(test_exp)
test_exp<-data.frame(test_exp)
}

x=0;

if (length(GeneSymbol)>1) {
df<-data.frame(matrix(NA, nrow =dim(exp)[2], ncol = 1))
for (i in 1:length(GeneSymbol)) {

test_exp<-exp[GeneAnnotation==GeneSymbol[i],]
test_exp<-t(test_exp)
test_exp<-data.frame(test_exp)
df<-cbind(df,test_exp)
rm(test_exp)
x<-x+1;
    }
#}
test_exp1<-df[, colSums(is.na(df)) != nrow(df)]
test_temp<-rowMeans(test_exp1)
test_exp<-data.frame(test_temp)
rownames(test_exp)<-rownames(test_exp1)
colnames(test_exp)<-"Average_exp"
rm(test_temp)
rm(test_exp1)
rm(df)
}
###################################################################
test_clinical<-Samples[,grep(SurvivalType, colnames(Samples))]
###################################################################
###################################################################
x1<-grep(SurvivalType, colnames(Samples))#################################
test_clinical<-data.frame(test_clinical)
rownames(test_clinical)<-rownames(Samples)
colnames(test_clinical)<-colnames(Samples)[x1]
rm(x1)
new_test_clinical<-test_clinical
new_test_clinical <- new_test_clinical[order(row.names(new_test_clinical)), ]

test_SurvivalTime<-Samples[,grep("Time|time", colnames(Samples))]#time column
test_SurvivalTime<-data.frame(test_SurvivalTime)
rownames(test_SurvivalTime)<-rownames(Samples)
colnames(test_SurvivalTime)<-"Time"
new_test_SurvivalTime<-test_SurvivalTime
new_test_SurvivalTime<-new_test_SurvivalTime[order(row.names(new_test_SurvivalTime)), ]
new_test_exp<-test_exp[order(row.names(test_exp)), ]
new_test_exp<-data.frame(new_test_exp)
colnames(new_test_exp)<-colnames(test_exp)
#combines clinical info with expression
test<- cbind(new_test_SurvivalTime,new_test_clinical,new_test_exp) 
test<- cbind(new_test_SurvivalTime,new_test_clinical,new_test_exp)
#==================================================
a<-colnames(exp)
a_sort<-a[order(a)]
rownames(test)=a_sort
#==================================================

#colnames, new_test_SurvivalTime,new_test_clinical,KLK3_354,KLK3_7047
#remove samples without selected phenotype
#NA,[Not Available],[Unknown],[Discrepancy],
#toMatch<-c("NA","Not Available","Unknown","Discrepancy")
#test_final<-test[- grep(paste(toMatch,collapse="|"), test$new_test_clinical),]
test_final<-test
colnames(test_final)[1]="Time" #rename col,Survival Time
colnames(test_final)[2]="Censored"#rename outcome

#define status to 0 and 1
colnames(test_final)[1]="Time" #rename col,Survival Time
colnames(test_final)[2]="Censored"#rename outcome
test_final$Censored<-ifelse(test_final$Censored=='YES'|test_final$Censored=='WITH TUMOR'|test_final$Censored=='dead',1,0)
return(test_final)
#input data is test_final, similar as data in "Book3.csv"
}